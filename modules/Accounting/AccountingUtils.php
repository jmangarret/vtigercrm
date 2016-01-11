<?php
////error_reporting(E_ALL);
require_once("include/Webservices/Utils.php");
require_once("modules/Accounting/Accounting.php");
require_once("include/utils/CommonUtils.php");

//require_once('data/CRMEntity.php');

function _getCustomFieldTrans($module, &$trans_array)
{
	global $log;
	$log->debug("Entering getCustomFieldTrans(".$module.",". $trans_array.") method ...");
	global $adb;
	$tab_id = getTabid($module);
	$custquery = "select columnname,fieldlabel from vtiger_field where generatedtype=2 and vtiger_field.presence in (0,2) and tabid=?";
	$custresult = $adb->pquery($custquery, array($tab_id));
	$custFldArray = Array();
	$noofrows = $adb->num_rows($custresult);
	for($i=0; $i<$noofrows; $i++)
	{
		$colName=$adb->query_result($custresult,$i,"columnname");
		$fldLbl = $adb->query_result($custresult,$i,"fieldlabel");
		$trans_array[$colName] = $fldLbl;
	}
	$log->debug("Exiting getCustomFieldTrans method ...");
}

function acc_doPostRequest($request, $params=false, $proxy=false, $auth=false)
{
	require_once('modules/Accounting/sasl/http.php');

	$authentication = "";
	$realm = "";
	$workstation = "";

	set_time_limit(120);
	$http = new http_class;
	$http->timeout=0;
	$http->data_timeout=0;
	$http->follow_redirect = 1;
	$http->debug=0;
	$http->html_debug=1;

	if ($auth !== false || $proxy !== false)
		require_once("modules/Accounting/sasl/sasl.php");

	// Basic Authentication
	if ($auth !== false)
	{
		$user = $auth["user"];
		$password = $auth["password"];
		$realm = $auth["realm"];       // Authentication realm or domain
		$workstation = $auth["workstation"]; // Workstation for NTLM authentication
		$authentication=(strlen($user) ? UrlEncode($user).":".UrlEncode($password)."@" : "");
	}

	$url = $request['scheme']."://".$authentication.$request['url'];
	$url = trim($url, " ");

	$error = $http->GetRequestArguments($url, $arguments);
	if ($error != "")
		return false;

	$arguments["RequestMethod"] = $request['method'];
	if ($request['method'] == 'POST')
		$arguments["PostValues"] = $params;
	else
	{
		$url .= "?";
		foreach ($params as $param => $value)
			$url .= $param."=".$value."&";
		$url = rtrim($url, "&");
	}

	// Auth
	if ($auth !== false)
		$arguments["AuthRealm"] = $realm;
	if ($auth !== false)
		$arguments["AuthWorkstation"] = $workstation;


	$arguments["Headers"]["Pragma"] = "nocache";

	// Proxy
	if ($proxy !== false)
	{
		$arguments["ProxyHostName"] = (isset($proxy["host"])) ? $proxy["host"] : "";
		$arguments["ProxyHostPort"] = (isset($proxy["port"])) ? $proxy["port"] : 0;
		$arguments["ProxyUser"] = (isset($proxy["user"])) ? $proxy["user"] : "";
		$arguments["ProxyPassword"] = (isset($proxy["password"])) ? $proxy["password"] : "";
		$arguments["ProxyRealm"] = (isset($proxy["realm"])) ? $proxy["realm"] : "";  // Proxy authentication realm or domain
		$arguments["ProxyWorkstation"] = (isset($proxy["workstation"])) ? $proxy["workstation"] : ""; // Workstation for NTLM proxy authentication
		$http->proxy_authentication_mechanism = (isset($proxy["mechanism"])) ? $proxy["mechanism"] : ""; // force a given proxy authentication mechanism;
	}

	$result = false;
	$error = $http->Open($arguments);

	if($error == "")
	{
		$error = $http->SendRequest($arguments);
		if($error == "")
		{
			$headers = array();
			$error = $http->ReadReplyHeaders($headers);
			if($error == "")
			{
				for(;;)
				{
					$error = $http->ReadReplyBody($body,1000);
					if($error != "" || strlen($body) == 0)
						break;
					$result .= $body;
				}
			}
		}
		$http->Close();
	}

	return $result;
}


function acc_prepareReq(&$req, &$proxy, $action, $useproxy, $action_is_url=false)
{
	$config = Accounting::loadConfigParams();

	$url = ($action_is_url == false) ? base64_decode("d3d3LmF4aWFsYmx1ZS5jb20vZVNlTWVTZS9hcGkv").$config[$action] : base64_decode("d3d3LmF4aWFsYmx1ZS5jb20vZVNlTWVTZS9hcGkv").$action;

	$req = array (
					'method' => 'POST',
					'scheme' => 'http',
					'url' => $url
				);

	if ($useproxy == 'true')
	{
		$proxy = array (
						'user' => isset($config['proxyusername']) ? $config['proxyusername'] : "",
						'password' =>  isset($config['proxypassword']) ? $config['proxypassword'] : "",
						'host' =>  isset($config['proxyhost']) ? $config['proxyhost'] : "",
						'port' =>  isset($config['proxyport']) ? $config['proxyport'] : "",
						'mechanism' =>  isset($config['proxymechanism']) ? $config['proxymechanism'] : "",
						'realm' =>  isset($config['proxyrealm']) ? $config['proxyrealm'] : "",
						'workstation' =>  isset($config['proxyworkstation']) ? $config['proxyworkstation'] : "",
					);
	}
	else
		$proxy = false;
}

function _detectModulenameFromRecordId($wsrecordid) {
	global $adb;
	$idComponents = vtws_getIdComponents($wsrecordid);
	$result = $adb->pquery("SELECT name FROM vtiger_ws_entity WHERE id=?", array($idComponents[0]));
	if($result && $adb->num_rows($result)) {
		return $adb->query_result($result, 0, 'name');
	}
	return false;
}

function acc_testConn($config, $connid, $connseed, $type)
{
	acc_prepareReq($req, $proxy, "testconn_acc.php", $config["useproxy"], true);
	$params = array(
				 "connid" => $connid,
				 "smscod" => $connseed,
				 "type" => $type
				);

	$status = acc_doPostRequest($req, $params, $proxy);
}

function updatePaymentStatus($entity) {
	global $adb, $current_language;

	$lang = return_module_language($current_language, "Accounting");

	$inv_id = $entity->data['id'];
	$inv_id = explode("x", $entity->data['id']);
	$inv_id = $inv_id[1];



	$acc_config = Accounting::loadConfigParams();
	$status = '';
	if ($acc_config['paymentwf']) {
		if($entity->data['invoicestatus'] == $acc_config['paymentwfpaid']) {
			$status = '1';
		} else {
			$status = '0';
		}

		if ($status != '') {
			if ($acc_config['associnvoice'] == "true") {
				$q = "update vtiger_accounting set accountingstate=? where vtiger_accounting.accountingrelated2=?";
				if ($status == '1') {
					$paid_str = "Paid";
				} else {
					$paid_str = "Pending";
				}
				$res = $adb->pquery($q, array($paid_str, $inv_id));

				$q = "update vtiger_accounting_payments set paid=? where associnv=?";
				$res = $adb->pquery($q, array($status, $inv_id));
			} else {
				if($status == '1') {
					$q = "update vtiger_accounting_payments, vtiger_accounting set paid=? where vtiger_accounting_payments.idtransaction=vtiger_accounting.accountingid AND vtiger_accounting.accountingrelated2=?";
					$res = $adb->pquery($q, array($status, $inv_id));
				}
				$q = "update vtiger_accounting set accountingstate=? where vtiger_accounting.accountingrelated2=?";
				if ($status == '1') {
					$paid_str = "Paid";
				} else {
					$paid_str = "Pending";
				}
				$res = $adb->pquery($q, array($paid_str, $inv_id));
			}
		}
	}
}

function updatePaymentTotalAmount($entity) {
	global $adb, $current_language;

	$lang = return_module_language($current_language, "Accounting");

	$inv_id = $entity->data['id'];
	$inv_id = explode("x", $entity->data['id']);
	$inv_id = $inv_id[1];

	$acc_config = Accounting::loadConfigParams();
	$status = '';
	if ($acc_config['populateamount'] == "true") {
		$q = "update vtiger_accounting set accountingamount=? where vtiger_accounting.accountingrelated2=?";
		$res = $adb->pquery($q, array($entity->data['hdnGrandTotal'], $inv_id));		
	}
}


function updateInvoiceStatus($entity) {
	global $mod_strings;

	if($entity->data['accountingrelated2'] != "") {
		$rel = explode("x", $entity->data['accountingrelated2']);

		$id = vtws_getIdComponents($entity->data['accountingrelated2']);
		$id = $id[1];
		$module = _detectModulenameFromRecordId($entity->data['accountingrelated2']);
		if ($module && $module == "Invoice") {
			global $adb;

			$lang = return_module_language($current_language, "Invoice");
			$config = Accounting::loadConfigParams();

			if($entity->data['accountingstate'] == "Paid") {
				$invoicestatus = $config['invoicewfpaid'];
			} else {
				$invoicestatus = $config['invoicewfpending'];
			}

			if ($invoicestatus != "---") {
				$sql = "update vtiger_invoice set invoicestatus=? where invoiceid=?";
				$res=$adb->pquery($sql, array($invoicestatus, $id));
			}

			/*

			require_once("modules/$module/$module.php");
			$focus = new $module();
			$focus->id=$id;
			$focus->retrieve_entity_info($id, $module);

			$lang = return_module_language($current_language, $module);

			if($paid == true) {
				$invoicestatus = $lang['Paid'];
			} else {
				$invoicestatus = $lang['Credit Invoice'];
			}
			$focus->column_fields['invoicestatus'] = $invoicestatus;
			$focus->mode = 'edit';
			$focus->save($module);*/
		}

		$q = "select associnv, paid from vtiger_accounting_payments where assoc_mod = ? and associnv IS NOT NULL and associnv <> ''";
		$result=$adb->pquery($sql, array('Invoice'));
		$nPayments = $adb->num_rows($result);

		$payments = array();
		for($i=0; $i<$nPayments; $i++) {
			$invid = $adb->query_result($result, $i, 'associnv');
			$paid = $adb->query_result($result, $i, 'paid');

			if($paid == '1') {
				$invoicestatus = $config['invoicewfpaid'];
			} else {
				$invoicestatus = $config['invoicewfpending'];
			}

			$sql = "update vtiger_invoice set invoicestatus=? where invoiceid=?";
			$res=$adb->pquery($sql, array($invoicestatus, $invid));
		}
	}
}

function setObjectValuesFromArray($focus, $arr)
{
	global $log;
	$log->debug("Entering setObjectValuesFromRequest(".get_class($focus).") method ...");
	global $current_user;


	if(isset($arr['record']))
	{
		$focus->id = $arr['record'];
	}
	if(isset($arr['mode']))
	{
		$focus->mode = $arr['mode'];
	}
	foreach($focus->column_fields as $fieldname => $val)
	{
		if(isset($arr[$fieldname]))
		{
			if(is_array($arr[$fieldname]))
				$value = $arr[$fieldname];
			else
				$value = trim($arr[$fieldname]);
			$focus->column_fields[$fieldname] = $value;
			echo $fieldname." ";
		}
	}
	$log->debug("Exiting setObjectValuesFromRequest method ...");
}

function createPayment($entity){
	$config = Accounting::loadConfigParams();

	if ($config['createpaymentwf'] != 'true')
		return;

	$inv_id = $entity->data['id'];
	$inv_id = explode("x", $entity->data['id']);
	$inv_id = $inv_id[1];

	if ($entity->data['account_id'] != '') {
		$account_id = $entity->data['account_id'];
		$account_id = explode("x", $entity->data['account_id']);
		$account_id = $account_id[1];
	} else {
		$account_id = $entity->data['contact_id'];
		$account_id = explode("x", $entity->data['contact_id']);
		$account_id = $account_id[1];
	}

	if ($entity->data['assigned_user_id'] != '') {
		$assigned = 'assigned_user_id';
		$assigned_user_id = $entity->data['assigned_user_id'];
		$assigned_user_id = explode("x", $entity->data['assigned_user_id']);
		$assigned_user_id = $assigned_user_id[1];
	} else {
		$assigned = 'assigned_group_id';
		$assigned_user_id = $entity->data['assigned_group_id'];
		$assigned_user_id = explode("x", $entity->data['assigned_group_id']);
		$assigned_user_id = $assigned_user_id[1];
	}

	$params = array(
					'module' => 'Accounting',
					'action' => 'Save',
					'accounting_id' => 'AUTO GEN ON SAVE',
					'paymentref' => $entity->data['subject'],
					'assigntype' => $assigned == 'assigned_user_id' ? 'U' : 'G',
					$assigned => $assigned_user_id,
					'accountingtype' => 'Income',
					'accountingrelated2_type' => 'Invoice',
					'accountingrelated2' => $inv_id,
					'accountingrelated1_type' => $entity->data['account_id'] != "" ? "Accounts" : "Contacts",
					'accountingrelated1' => $account_id,
					'accountingcategory' => '',
					'accountingamount' => $entity->data['hdnGrandTotal'],
					'accountingstate' => 'Pending',
					'accountingcurrency' => $current_user->currency_code,
					'accountingpaidamount' => 0,
					'accountingpaidoustanding' => $entity->data['hdnGrandTotal'],
					'nPayments' => 1,
					'paymentref_0' => '',
					'paymentmethod_0' => '',
					'paymentamount_0' => $entity->data['hdnGrandTotal'],
					'paymentduedate_0' => $entity->data['hdnGrandTotal'],
					'paymentdate_0' => '',
					'description' => ''
				);

	$focus = new Accounting();
	$focus->column_fields = $params;
	$focus->save("Accounting");

	global $adb;

	if ($config['createpaymentwf'] == true) {
		if (!(!isset($config['wf_nopayments']) || !isset($config['wf_firstpaymentdate']) ||
				!isset($config['wf_firstpaymentamount']) || !isset($config['wf_frecuency']))) {

			if (!isset($entity->data[$config['wf_nopayments']]) || $entity->data[$config['wf_nopayments']] == "" || (int)$entity->data[$config['wf_nopayments']] < 1) {
				$entity->data[$config['wf_nopayments']] = 1;
			}
			if (!isset($entity->data[$config['wf_firstpaymentamount']]) || $entity->data[$config['wf_firstpaymentamount']] == "") {
				$entity->data[$config['wf_firstpaymentamount']] = 0;
			}
			if (!isset($entity->data[$config['wf_firstpaymentdate']]) || $entity->data[$config['wf_firstpaymentdate']] == "") {
				$entity->data[$config['wf_firstpaymentdate']] = '';
			}
			if (!isset($entity->data[$config['wf_frecuency']]) || $entity->data[$config['wf_frecuency']] == "") {
				$entity->data[$config['wf_frecuency']] = '';
			}

			$total = $entity->data['hdnGrandTotal'] == "" ? 0 : $entity->data['hdnGrandTotal'];
			$nopayments = $entity->data[$config['wf_nopayments']];
			if ($nopayments > 1) {
				$payment_amount1 = $entity->data[$config['wf_firstpaymentamount']];

				if($payment_amount1 == 0) {
					$payment_amountn = ($total - $payment_amount1) / $nopayments;
					$payment_amount1 = $payment_amountn;
				} else {
					$payment_amountn = ($total - $payment_amount1) / ($nopayments-1);
				}

				$payment_duedate = $entity->data[$config['wf_firstpaymentdate']];
				$payment_frecuency = $entity->data[$config['wf_frecuency']];

				for($i=0; $i<$nopayments; $i++) {
					$sql = "INSERT INTO vtiger_accounting_payments (idtransaction, amount, paymentduedate, paymentdate, paid, ref, associnv, assoc_display, assoc_mod, paymentmethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

					if ($i == 0) {
						$data_arr = array($focus->id, $payment_amount1, $payment_duedate, '', '0', '', '', '', '', '---');
					} else {
						$data_arr = array($focus->id, $payment_amountn, $payment_duedate, '', '0', '', '', '', '', '---');
					}

					if ($payment_frecuency != '' && $payment_duedate != '') {
						$payment_duedate = strtotime ( '+'.$payment_frecuency.' day' , strtotime ( $payment_duedate ) ) ;
						$payment_duedate = date ( 'Y-m-j' , $payment_duedate );
					}

					foreach($data_arr as &$param) {
						if (!isset($param)) {
							$param = "";
						}
					}

					$res = $adb->pquery($sql, $data_arr);
				}
			} else {
				$sql = "INSERT INTO vtiger_accounting_payments (idtransaction, amount, tax, paymentduedate, paymentdate, paid, ref, associnv, assoc_display, assoc_mod, paymentmethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$tax = '';
				$data_arr = array($focus->id, $entity->data['hdnGrandTotal'], $tax, $entity->data['duedate'], $date, '0',
						'', '', '', '', '');
				foreach($data_arr as &$param) {
					if (!isset($param)) {
						$param = "";
					}
				}

				$res = $adb->pquery($sql, $data_arr);
			}
		}
	}
}

function __checkInvoice($record) {
	global $adb,$log,$app_strings;
    $result = Array();

	$modObj = CRMEntity::getInstance("Invoice");

    foreach($modObj->tab_name_index as $table_name=>$index)
    {
	    $result[$table_name] = $adb->pquery("select * from $table_name where $index=?", array($record));
	    if($adb->query_result($result["vtiger_crmentity"],0,"deleted") == 1) {
			return false;
		}
    }

    /* Prasad: Fix for ticket #4595 */
	if (isset($modObj->table_name)) {
    	$mod_index_col = $modObj->tab_name_index[$modObj->table_name];
    	if($adb->query_result($result[$modObj->table_name],0,$mod_index_col) == '')
    		return false;
	}

	return true;
}

function return_chart_language($language)
{
	global $default_language;
	static $cachedModuleStrings;

	if(!empty($cachedModuleStrings)) {
		return $cachedModuleStrings;
	}

	$language_used = $language;

	@include("modules/Accounting/charts/language/$language.lang.php");
	if(!isset($chart_strings))
	{
		if($default_language == 'en_us') {
			require("modules/Accounting/charts/language/$default_language.lang.php");
			$language_used = $default_language;
		} else {
			@include("modules/Accounting/charts/language/$default_language.lang.php");
			if(!isset($chart_strings)) {
				require("modules/Accounting/charts/language/en_us.lang.php");
				$language_used = 'en_us';
			} else {
				$language_used = $default_language;
			}
		}
	}

	if(!isset($chart_strings))
	{
		return null;
	}

	$return_value = $chart_strings;

	$cachedModuleStrings = $return_value;
	return $return_value;
}

function diff_dates($date1, $date2){
	$date1 = strtotime($date1." 00:00:00");
	$date2 = strtotime($date2." 00:00:00");
	return round(($date1-$date2)/60/60/24);
}

function diff_date_today($date2){
	$date1 = strtotime(date("Y-m-d")." 00:00:00");
	$date2 = strtotime($date2." 00:00:00");
	return round(($date1-$date2)/60/60/24);
}

function str_replace_first($search, $replace, $subject) {
	return implode($replace, explode($search, $subject, 2));
}

function str_replace_second($search, $replace, $subject) {
	return implode($replace, explode($search, $subject, 2));
}

function str_replace_first_field_select($search, $replace, $subject) {
	$fields = explode(" FROM ", $subject, 2);
	if(count($fields) >= 2) {
		return str_replace($search, $replace, $fields[0])." FROM ".$fields[1];
	} else {
		return $subject;
	}
}

?>