<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
global $app_strings, $mod_strings, $current_language, $currentModule, $theme;
global $list_max_entries_per_page;


require_once('Smarty_setup.php');
require_once('include/ListView/ListView.php');
require_once('modules/CustomView/CustomView.php');
require_once('include/DatabaseUtil.php');
require_once('modules/Accounting/ListViewUtils2.php');

checkFileAccess("modules/$currentModule/$currentModule.php");
require_once("modules/$currentModule/$currentModule.php");


function cleanEntityList($entityId){
	$entityId = explode("_", $entityId);
	return $entityId[0];
}


$config = Accounting::loadConfigParams();

/*
if ($config['licenseok'] != "true") {
	echo "<script>location.href='index.php?module=Accounting&action=AccountingSettings&parenttab=Settings&formodule=Accounting';</script>";
	exit;
}
*/

$category = getParentTab();
$url_string = '';

$tool_buttons = Button_Check($currentModule);
$list_buttons = Array();

if(isPermitted($currentModule,'Delete','') == 'yes') $list_buttons['del'] = $app_strings[LBL_MASS_DELETE];
if(isPermitted($currentModule,'EditView','') == 'yes') {
	$list_buttons['mass_edit'] = $app_strings[LBL_MASS_EDIT];
	// Mass Edit could be used to change the owner as well!
	//$list_buttons['c_owner'] = $app_strings[LBL_CHANGE_OWNER];
}

$focus = new $currentModule();
$focus->initSortbyField($currentModule);

$sorder = $focus->getSortOrder();
$order_by = $focus->getOrderBy();

$_SESSION[$currentModule."_Order_by"] = $order_by;
$_SESSION[$currentModule."_Sort_Order"]=$sorder;

$smarty = new vtigerCRM_Smarty();

// Identify this module as custom module.
$smarty->assign('CUSTOM_MODULE', true);

$smarty->assign('MOD', $mod_strings);
$smarty->assign('APP', $app_strings);
$smarty->assign('MODULE', $currentModule);
$smarty->assign('SINGLE_MOD', getTranslatedString('SINGLE_'.$currentModule));
$smarty->assign('CATEGORY', $category);
$smarty->assign('BUTTONS', $list_buttons);
$smarty->assign('CHECK', $tool_buttons);
$smarty->assign('THEME', $theme);
$smarty->assign('IMAGE_PATH', "themes/$theme/images/");

$smarty->assign('CHANGE_OWNER', getUserslist());
$smarty->assign('CHANGE_GROUP_OWNER', getGroupslist());

global $vtiger_current_version;
$version = version_compare($vtiger_current_version, "5.3.0");
$search_53 = ($version == -1) ? "false" : "true";
$smarty->assign('SEARCH_53', $search_53);



$customView = new CustomView($currentModule);
$viewid = $customView->getViewId($currentModule);

global $current_user;
$queryGenerator = new QueryGenerator($currentModule, $current_user);
if ($viewid != "0") {
	$queryGenerator->initForCustomViewById($viewid);
} else {
	$queryGenerator->initForDefaultCustomView();
}



// Enabling Module Search
$url_string = '';
if($_REQUEST['query'] == 'true') {
	list($where, $ustring) = split('#@@#', getWhereCondition($currentModule));
	if($search_53 == "true") {
		$queryGenerator->addUserSearchConditions($_REQUEST);
	}
	$url_string .= "&query=true$ustring&".getBasic_Advance_SearchURL();
	$smarty->assign('SEARCH_URL', $url_string);
}



if($search_53 == "true") {
	$list_query = $queryGenerator->getQuery();
	$where = $queryGenerator->getConditionalWhere();
}


// Custom View
$customView = new CustomView($currentModule);
$viewid = $customView->getViewId($currentModule);
$customview_html = $customView->getCustomViewCombo($viewid);
$viewinfo = $customView->getCustomViewByCvid($viewid);

// Feature available from 5.1
if(method_exists($customView, 'isPermittedChangeStatus')) {
	// Approving or Denying status-public by the admin in CustomView
	$statusdetails = $customView->isPermittedChangeStatus($viewinfo['status']);

	// To check if a user is able to edit/delete a CustomView
	$edit_permit = $customView->isPermittedCustomView($viewid,'EditView',$currentModule);
	$delete_permit = $customView->isPermittedCustomView($viewid,'Delete',$currentModule);

	$smarty->assign("CUSTOMVIEW_PERMISSION",$statusdetails);
	$smarty->assign("CV_EDIT_PERMIT",$edit_permit);
	$smarty->assign("CV_DELETE_PERMIT",$delete_permit);
}
// END

$smarty->assign("VIEWID", $viewid);

if($viewinfo['viewname'] == 'All') $smarty->assign('ALL', 'All');

if($viewid ==0)
{
	echo "<table border='0' cellpadding='5' cellspacing='0' width='100%' height='450px'><tr><td align='center'>";
	echo "<div style='border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 55%; position: relative; z-index: 10000000;'>

		<table border='0' cellpadding='5' cellspacing='0' width='98%'>
		<tbody><tr>
		<td rowspan='2' width='11%'><img src='". vtiger_imageurl('denied.gif', $theme) ."' ></td>
		<td style='border-bottom: 1px solid rgb(204, 204, 204);' nowrap='nowrap' width='70%'><span clas
		s='genHeaderSmall'>$app_strings[LBL_PERMISSION]</span></td>
		</tr>
		<tr>
		<td class='small' align='right' nowrap='nowrap'>
		<a href='javascript:window.history.back();'>$app_strings[LBL_GO_BACK]</a><br>
		</td>
		</tr>
		</tbody></table>
		</div>";
	echo "</td></tr></table>";
	exit;
}

$listquery = getListQuery($currentModule);
$list_query= $customView->getModifiedCvListQuery($viewid, $listquery, $currentModule);

if($where != '') {
	$list_query = "$list_query AND $where";
}

// Sorting
if(!empty($order_by)) {
	if($order_by == 'smownerid') $list_query .= ' ORDER BY user_name '.$sorder;
	else {
		$tablename = getTableNameForField($currentModule, $order_by);
		$tablename = ($tablename != '')? ($tablename . '.') : '';
		$list_query .= ' ORDER BY ' . $tablename . $order_by . ' ' . $sorder;
	}
}

$list_query = str_replace_first("concat(lastname,' ',firstname)", "concat(vtiger_contactdetails.lastname,' ',vtiger_contactdetails.firstname)", $list_query);
$list_query = str_replace_first("concat(lastname,' ',firstname)", "concat(vtiger_leaddetails.lastname,' ',vtiger_leaddetails.firstname)", $list_query);

$partialchange = false;
if($_SESSION['partialpaymentview'] != $_REQUEST['partialpaymentview']) {
	$partialchange = true;
}

if(isset($_REQUEST['partialpaymentview'])) {
	$_SESSION['partialpaymentview'] = $_REQUEST['partialpaymentview'];
}

$partialpaymentview = $_SESSION['partialpaymentview'];
if(!isset($_SESSION['partialpaymentview'])) {
	$partialpaymentview = 'false';
}


//if($partialpaymentview == 'true') {
$list_query = str_replace_first("INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_accounting.accountingid",
									"INNER JOIN vtiger_crmentity ON vtiger_accounting.accountingid = vtiger_crmentity.crmid INNER JOIN vtiger_accounting_payments ON vtiger_accounting_payments.idtransaction=vtiger_accounting.accountingid", $list_query);

$list_query = str_replace_first_field_select("vtiger_accounting.accountingduedate", "vtiger_accounting_payments.paymentduedate AS accountingduedate", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.accountingpaymentdate", "vtiger_accounting_payments.paymentdate AS accountingpaymentdate", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.accountingamountpartial", "vtiger_accounting_payments.amount AS accountingamountpartial", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.accountingpaymentmethod", "vtiger_accounting_payments.paymentmethod AS accountingpaymentmethod", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.paymentrefpartial", "vtiger_accounting_payments.ref AS paymentrefpartial", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.paymentpaidpartial", "vtiger_accounting_payments.paid AS paymentpaidpartial", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.paymentvatpartial", "vtiger_accounting_payments.tax AS paymentvatpartial", $list_query);
$list_query = str_replace_first_field_select("vtiger_accounting.paymentassocpartial", "vtiger_accounting_payments.associnv AS paymentassocpartial", $list_query);

$list_query = str_replace("vtiger_accounting.accountingduedate", "vtiger_accounting_payments.paymentduedate", $list_query);
$list_query = str_replace("vtiger_accounting.accountingpaymentdate", "vtiger_accounting_payments.paymentdate", $list_query);
$list_query = str_replace("vtiger_accounting.accountingamountpartial", "vtiger_accounting_payments.amount", $list_query);
$list_query = str_replace("vtiger_accounting.accountingpaymentmethod", "vtiger_accounting_payments.paymentmethod", $list_query);
$list_query = str_replace("vtiger_accounting.paymentrefpartial", "vtiger_accounting_payments.ref", $list_query);
$list_query = str_replace("vtiger_accounting.paymentpaidpartial", "vtiger_accounting_payments.paid", $list_query);
$list_query = str_replace("vtiger_accounting.paymentvatpartial", "vtiger_accounting_payments.tax", $list_query);
$list_query = str_replace("vtiger_accounting.paymentassocpartial", "vtiger_accounting_payments.associnv", $list_query);
//}

if($partialpaymentview == 'false') {
	if(strpos($list_query, "ORDER BY") !== false) {		
		$list_query = str_replace("ORDER BY", "GROUP BY vtiger_accounting.accounting_id ORDER BY", $list_query);
	} else {
		$list_query .= " GROUP BY vtiger_accounting.accounting_id ORDER BY vtiger_accounting.accountingid";
	}
} else {
	if(strpos($list_query, "ORDER BY") !== false) {
		//$list_query = str_replace("ORDER BY", "ORDER BY vtiger_accounting.accountingid", $list_query);
	} else {
		$list_query .= " ORDER BY vtiger_accounting.accountingid";
	}
}

$list_query = str_replace("ORDER BY vtiger_accounting.accounting_id", "ORDER BY vtiger_accounting.accountingid", $list_query);

// Fix to related to searchs
$list_query = str_replace_first("concat(firstname,' ',lastname)", "concat(vtiger_contactdetails.firstname,' ',vtiger_contactdetails.lastname)", $list_query);
$list_query = str_replace_second("concat(firstname,' ',lastname)", "concat(vtiger_leaddetails.firstname,' ',vtiger_leaddetails.lastname)", $list_query);


//Postgres 8 fixes
if( $adb->dbType == "pgsql")
	$list_query = fixPostgresQuery( $list_query, $log, 0);

if(PerformancePrefs::getBoolean('LISTVIEW_COMPUTE_PAGE_COUNT', false) === true){
	$count_result = $adb->query( mkCountQuery( $list_query));
	$noofrows = $adb->query_result($count_result,0,"count");
}else{
	$noofrows = null;
}

if($partialpaymentview !== 'true') {
	$res = $adb->query($list_query);
	$noofrows = $adb->num_rows($res);
}

$queryMode = (isset($_REQUEST['query']) && $_REQUEST['query'] == 'true');
$start = ListViewSession::getRequestCurrentPage($currentModule, $list_query, $viewid, $queryMode);

if($partialpaymentview == 'false') {
	if((($start-1) * $list_max_entries_per_page) >= $noofrows) {
		$start = 1;
	}
}

$navigation_array = VT_getSimpleNavigationValues($start,$list_max_entries_per_page,$noofrows);
$limit_start_rec = ($start-1) * $list_max_entries_per_page;

if( $adb->dbType == "pgsql")
	$list_result = $adb->pquery($list_query. " OFFSET $limit_start_rec LIMIT $list_max_entries_per_page", array());
else
	$list_result = $adb->pquery($list_query. " LIMIT $limit_start_rec, $list_max_entries_per_page", array());

$recordListRangeMsg = getRecordRangeMessage($list_result, $limit_start_rec, $noofrows);
$smarty->assign('recordListRange',$recordListRangeMsg);

$smarty->assign("CUSTOMVIEW_OPTION",$customview_html);

// Navigation
$navigationOutput = getTableHeaderSimpleNavigation($navigation_array, $url_string, $currentModule, 'index', $viewid);
$smarty->assign("NAVIGATION", $navigationOutput);

$listview_header = getListViewHeader($focus,$currentModule,$url_string,$sorder,$order_by,'',$customView);
if($partialpaymentview == 'true') {
	$listview_header2 = array();
	foreach ($listview_header as $header) {
		if(strpos($header, $mod_strings['TransactionStatus']) === false) {
			array_push($listview_header2, $header);
		}
	}

	$listview_header = $listview_header2;
} else {
	$listview_header2 = array();
	foreach ($listview_header as $header) {
		if(strpos($header, $mod_strings['DueDate']) === false &&
			strpos($header, $mod_strings['PaymentDate']) === false &&
			strpos($header, $mod_strings['Method']) === false &&
			strpos($header, $mod_strings['PartialAmount']) === false &&
			strpos($header, $mod_strings['PaymentReferencePartial']) === false &&
			strpos($header, $mod_strings['PaymentPaidPartial']) === false &&
			strpos($header, $mod_strings['PartialVat']) === false &&
		strpos($header, $mod_strings['PartialAssoc']) === false){
			array_push($listview_header2, $header);
		}
	}

	$listview_header = $listview_header2;
}

$listview_entries = getListViewEntries2($focus,$currentModule,$list_result,$navigation_array,'','','EditView','Delete',$customView);
$listview_header_search = getSearchListHeaderValues($focus,$currentModule,$url_string,$sorder,$order_by,'',$customView);

$keys = array_keys($listview_header_search);
$replacesIndex = array();
for($i=0; $i<count($keys); $i++)
{
	if ($keys[$i] == 'accounting_id' || $keys[$i] == 'accountingtype' || $keys[$i] == 'accountingstate'
		|| $keys[$i] == 'accountingduedate' || $keys[$i] == 'accountingpaymentdate' || $keys[$i] == 'accountingpaymentmethod'
		|| $keys[$i] == 'accountingamountpartial' || $keys[$i] == 'paymentrefpartial' || $keys[$i] == 'paymentpaidpartial'
		|| $keys[$i] == 'paymentvatpartial' || $keys[$i] == 'paymentassocpartial')
		array_push($replacesIndex, $i);
}



$hideheaders = array();
foreach($listview_entries as $entryKey => &$entry)
{
	$acc_record = false;
	foreach($replacesIndex as $index2) {
		$textPos = strpos($entry[$index2], "<span type='vtlib_metainfo'");
		if ($textPos !== false) {
			if ($keys[$index2] == 'accounting_id') {
				$recordpos1 = strpos($entry[0], "record=");
				$recordpos2 = strpos($entry[0], "'", $recordpos1);
				$acc_record = substr($entry[0], $recordpos1+7, $recordpos2-$recordpos1-7);
				break;
			}
		}
	}

	if($acc_record === false) {
		echo "<script>alert('".$mod_strings['LBL_PAYMENT_ID_OBLIGATORY']."');window.location='index.php?module=Accounting&action=CustomView&record=".$viewid."&parenttab=Sales';</script>";
	}

	foreach($replacesIndex as $index) {
		$textPos = strpos($entry[$index], "<span type='vtlib_metainfo'");
		if ($textPos !== false)
		{
			if($partialpaymentview != 'true') {
				if ($keys[$index] == 'accountingduedate' || $keys[$index] == 'accountingpaymentdate' || $keys[$index] == 'accountingpaymentmethod' ||
					$keys[$index] == 'accountingamountpartial' || $keys[$index] == 'paymentrefpartial' || $keys[$index] == 'paymentpaidpartial' ||
				$keys[$index] == 'paymentvatpartial' || $keys[$index] == 'paymentassocpartial') {
					array_push($hideheaders, $index);
				}
			}

			if ($keys[$index] == 'paymentpaidpartial') {
				if($partialpaymentview != 'true') {
					$payments = array();
					$payments = Accounting::getPayments($acc_record);

					$paid = true;
					foreach($payments as $payment) {
						if ($payment["paid"] == "0") {
							$paid = false;
							break;
						}
					}

					$entry[$index] = ($paid == true) ? $app_strings['yes'] : $app_strings['no'];
				}
			}
			else if ($keys[$index] == 'accountingtype') {
				$type = explode("<", $entry[$index]);
				$type = trim($type[0]);

				if ($type == $mod_strings['LBL_INCOME_COMBOBOX']) {
					$type = '<font color="#005E00">'.$type.'</font>';
				} else {
					$type = '<font color="#9D0000">'.$type.'</font>';
				}

				$entry[$index] = $type;
			} else if($keys[$index] == 'paymentassocpartial') {
				if($entry[$index] != "") {
					$assocrecord = explode("<", $entry[$index]);
					$assocrecord = trim($assocrecord[0]);

					$q = "SELECT setype, assoc_display ".
	    					"FROM vtiger_crmentity INNER JOIN vtiger_accounting_payments ".
	          							"ON vtiger_crmentity.crmid = vtiger_accounting_payments.associnv ".
	    					"WHERE vtiger_crmentity.crmid = ? LIMIT 1";

					$res = $adb->pquery($q, array($assocrecord));
					$nassoc = $adb->num_rows($res);
					$assocmod = "";
					$assocdisplay = "";
					if($nassoc > 0) {
						$assocmod = $adb->query_result($res, 0, "setype");
						$assocdisplay = $adb->query_result($res, 0, "assoc_display");
					}

					$entry[$index] = '<a href="index.php?module='.$assocmod.'&parenttab='.$assocmod.'&action=DetailView&record='.$assocrecord.'">'.$assocdisplay.'</a>';
				}
			} else if ($keys[$index] == 'accountingstate') {
				$payments = array();
				$payments = Accounting::getPayments($acc_record);
				$expired = false;

				if($partialpaymentview == 'true') {
					$hideheaders = array($index);
				}

				foreach($payments as $payment) {
					if ($payment["paid"] == "0") {
						$exp_date = $payment["paymentduedate"];
						$todays_date = date("Y-m-d");
						$today = strtotime($todays_date);
						$expiration_date = strtotime((String)$exp_date);

						if ($expiration_date < $today) {
							$expired = true;
							break;
						}
					}
				}

				$type = explode("<", $entry[$index]);
				$type = trim($type[0]);

				if ($type == $mod_strings['LBL_PAID_STATE_COMBOBOX']) {
					$type = '<strong><font color="#009900">'.$type.'</font></strong>';
				} else if ($type == $mod_strings['LBL_CANCELLED_STATE_COMBOBOX']) {
					$type = '<strong><font color="#000088">'.$type.'</font></strong>';
				} else if ($expired == false) {
					$type = '<strong><font color="#CC6600">'.$type.'</font></strong>';
				} else {
					$type = '<strong><font color="#FF0000">'.$type.'</font></strong> ('.$mod_strings['LBL_OUT_OF_DATE_LIST'].')';
				}

				$entry[$index] = $type;
			}
		}
	}
}


$smarty->assign('OMIT_HEADERS', $hideheaders);
$smarty->assign('LISTHEADER', $listview_header);
$smarty->assign('LISTENTITY', $listview_entries);
$smarty->assign('SEARCHLISTHEADER',$listview_header_search);

// Module Search
$alphabetical = AlphabeticalSearch($currentModule,'index',$focus->def_basicsearch_col,'true','basic','','','','',$viewid);
$fieldnames = getAdvSearchfields($currentModule);
$criteria = getcriteria_options();
$smarty->assign("ALPHABETICAL", $alphabetical);
$smarty->assign("FIELDNAMES", $fieldnames);
$smarty->assign("CRITERIA", $criteria);

$smarty->assign("AVALABLE_FIELDS", getMergeFields($currentModule,"available_fields"));
$smarty->assign("FIELDS_TO_MERGE", getMergeFields($currentModule,"fileds_to_merge"));

$_SESSION[$currentModule.'_listquery'] = $list_query;

global $current_user;
if(is_admin($current_user)) {
	$smarty->assign("ISADMIN", "true");
} else {
	$smarty->assign("ISADMIN", "false");
}

if($partialpaymentview == 'true') {
	$smarty->assign('PARTIAL_PAYMENT_VIEW', 'checked');
} else {
	$smarty->assign('PARTIAL_PAYMENT_VIEW', '');
}

if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] != '')
	$smarty->display(vtlib_getModuleTemplate("Accounting", "ListViewEntries.tpl"));
else
	$smarty->display(vtlib_getModuleTemplate("Accounting", 'ListView.tpl'));

?>