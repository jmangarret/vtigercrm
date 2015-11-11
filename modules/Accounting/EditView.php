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


require_once('Smarty_setup.php');
require_once('modules/Accounting/Accounting.php');

////error_reporting(E_ALL);

$focus = CRMEntity::getInstance($currentModule);
$smarty = new vtigerCRM_Smarty();

$category = getParentTab($currentModule);
$record = $_REQUEST['record'];
$isduplicate = vtlib_purify($_REQUEST['isDuplicate']);

//added to fix the issue4600
$searchurl = getBasic_Advance_SearchURL();
$smarty->assign("SEARCH", $searchurl);
//4600 ends

if($record) {
	$focus->id = $record;
	$focus->mode = 'edit';
	$focus->retrieve_entity_info($record, $currentModule);
}
if($isduplicate == 'true') {
	$focus->id = '';
	$focus->mode = '';
}
if(empty($_REQUEST['record']) && $focus->mode != 'edit'){
	setObjectValuesFromRequest($focus);
}

$disp_view = getView($focus->mode);
if(!isset($focus->column_fields['paymentref']) || $focus->column_fields['paymentref'] == "") {
	$focus->column_fields['paymentref'] = "---";
}
if($disp_view == 'edit_view')
	$smarty->assign('BLOCKS', getBlocks($currentModule, $disp_view, $focus->mode, $focus->column_fields));
else
	$smarty->assign('BASBLOCKS', getBlocks($currentModule, $disp_view, $focus->mode, $focus->column_fields, 'BAS'));

$smarty->assign('OP_MODE',$disp_view);
$smarty->assign('APP', $app_strings);
$smarty->assign('MOD', $mod_strings);
$smarty->assign('MODULE', $currentModule);
// TODO: Update Single Module Instance name here.
$smarty->assign('SINGLE_MOD', getTranslatedString('SINGLE_'.$currentModule));
$smarty->assign('CATEGORY', $category);
$smarty->assign("THEME", $theme);
$smarty->assign('IMAGE_PATH', "themes/$theme/images/");
$smarty->assign('ID', $focus->id);
$smarty->assign('MODE', $focus->mode);

$smarty->assign('CHECK', Button_Check($currentModule));
$smarty->assign('DUPLICATE', $isduplicate);

if($focus->mode == 'edit' || $isduplicate) {
	$recordName = array_values(getEntityName($currentModule, $record));
	$recordName = $recordName[0];
	$smarty->assign('NAME', $recordName);
	$smarty->assign('UPDATEINFO',updateInfo($record));
}

if(isset($_REQUEST['return_module']))    $smarty->assign("RETURN_MODULE", vtlib_purify($_REQUEST['return_module']));
if(isset($_REQUEST['return_action']))    $smarty->assign("RETURN_ACTION", vtlib_purify($_REQUEST['return_action']));
if(isset($_REQUEST['return_id']))        $smarty->assign("RETURN_ID", vtlib_purify($_REQUEST['return_id']));
if (isset($_REQUEST['return_viewname'])) $smarty->assign("RETURN_VIEWNAME", vtlib_purify($_REQUEST['return_viewname']));

$accountname = '';
$accountid = '';
$subject = '';
$id = '';
$key1 = '';
$key2 = '';
$total_amount = "";
$inv_ord_due_date = "";$currency_id = "";

$accref = "---";
if (($_REQUEST['return_action'] == "DetailView" && $_REQUEST['return_id'] != "") || ($_REQUEST['return_action'] == "CallRelatedList" && $_REQUEST['return_id'] != "") || $_REQUEST['detailslink'] == 'true') {
	$module = $_REQUEST['return_module'];
	$id = $_REQUEST['return_id'];

	require_once("modules/$module/$module.php");
	$focus1 = new $module();
	$focus1->id=$id;
	$focus1->retrieve_entity_info($id, $module);
	$subject = $focus1->column_fields['subject'];

	$total_amount = $focus1->column_fields['hdnGrandTotal'];
	$inv_ord_due_date = $focus1->column_fields['duedate'];

	$accountid = "";
	$accountname = "";
	$accref = "---";

	$key2 = $module;		$currency_id = isset($focus1->column_fields['currency_id']) ? $focus1->column_fields['currency_id'] : "";
	if ($module == "Invoice" || $module == "SalesOrder") {
		$module_rel = "Accounts";
		$accountid = $focus1->column_fields['account_id'];
		$accountname_fld = "accountname";
		$accref = $focus1->column_fields['subject'];
	} else if ($module == "PurchaseOrder") {
		$module_rel = "Vendors";
		$accountid = $focus1->column_fields['vendor_id'];
		$accountname_fld = "vendorname";		$focus->column_fields['accountingtype'] = "Expense";		if($disp_view == 'edit_view')			$smarty->assign('BLOCKS', getBlocks($currentModule, $disp_view, $focus->mode, $focus->column_fields));		else			$smarty->assign('BASBLOCKS', getBlocks($currentModule, $disp_view, $focus->mode, $focus->column_fields, 'BAS'));
		$accref = $focus1->column_fields['subject'];
	} else if($module == "Contacts" || $module == "Leads") {
		$accountid = $id;
		$module_rel = $module;
		$accountname_fld = "lastname";
		$id = '';
	} else if($module == "Accounts") {
		$accountid = $id;
		$module_rel = "Accounts";
		$accountname_fld = "accountname";
		$id = '';
	} else if($module == "Vendors") {
		$accountid = $id;
		$module_rel = "Vendors";
		$accountname_fld = "vendorname";
		$id = '';
	} else if($module == "Project") {
		$accountid = $id;
		$module_rel = "Project";
		$accountname_fld = "projectname";
		$accref = $focus1->column_fields['projectname'];
		$id = '';
	} else if($module == "Potentials") {
		$accountid = $id;
		$module_rel = "Potentials";
		$accountname_fld = "potentialname";
		$id = '';
	}

	$accountname = "";

	if ($accountid != "" && $accountid > 0) {
		$key1 = $module_rel;
		require_once("modules/$module_rel/$module_rel.php");

		$focus1 = new $module_rel();
		$focus1->id=$accountid;

		$focus1->retrieve_entity_info($accountid, $module_rel);
		$accountname = $focus1->column_fields[$accountname_fld];
		if ($module_rel == "Contacts" || $module_rel == "Leads") {
			$accountname .= " ".$focus1->column_fields["firstname"];
		}
	} else {
		$id = "";
	}
}

$smarty->assign("RELATED_SUBJECT1", $accountname);
$smarty->assign("RELATED_ID1", $accountid);
$smarty->assign("RELATED_KEY1", $key1);
$smarty->assign("RELATED_SUBJECT2", $subject);
$smarty->assign("RELATED_ID2", $id);
$smarty->assign("RELATED_KEY2", $key2);
$smarty->assign("TOTAL_AMOUNT", $total_amount);
$smarty->assign("ACCOUNTING_REF", str_replace("'", '"', $accref));

// Field Validation Information
$tabid = getTabid($currentModule);
$validationData = getDBValidationData($focus->tab_name,$tabid);
$validationArray = split_validationdataArray($validationData);

$smarty->assign("VALIDATION_DATA_FIELDNAME",$validationArray['fieldname']);
$smarty->assign("VALIDATION_DATA_FIELDDATATYPE",$validationArray['datatype']);
$smarty->assign("VALIDATION_DATA_FIELDLABEL",$validationArray['fieldlabel']);

// In case you have a date field
$smarty->assign("CALENDAR_LANG", $app_strings['LBL_JSCALENDAR_LANG']);

global $adb;
// Module Sequence Numbering
$mod_seq_field = getModuleSequenceField($currentModule);
if($focus->mode != 'edit' && $mod_seq_field != null) {
		$autostr = getTranslatedString('MSG_AUTO_GEN_ON_SAVE');
		$mod_seq_string = $adb->pquery("SELECT prefix, cur_id from vtiger_modentity_num where semodule = ? and active=1",array($currentModule));
        $mod_seq_prefix = $adb->query_result($mod_seq_string,0,'prefix');
        $mod_seq_no = $adb->query_result($mod_seq_string,0,'cur_id');
        if($adb->num_rows($mod_seq_string) == 0 || $focus->checkModuleSeqNumber($focus->table_name, $mod_seq_field['column'], $mod_seq_prefix.$mod_seq_no))
                echo '<br><font color="#FF0000"><b>'. getTranslatedString('LBL_DUPLICATE'). ' '. getTranslatedString($mod_seq_field['label'])
                	.' - '. getTranslatedString('LBL_CLICK') .' <a href="index.php?module=Settings&action=CustomModEntityNo&parenttab=Settings&selmodule='.$currentModule.'">'.getTranslatedString('LBL_HERE').'</a> '
                	. getTranslatedString('LBL_TO_CONFIGURE'). ' '. getTranslatedString($mod_seq_field['label']) .'</b></font>';
        else
                $smarty->assign("MOD_SEQ_ID",$autostr);
} else {
	$smarty->assign("MOD_SEQ_ID", $focus->column_fields[$mod_seq_field['name']]);
}
// END

// Gather the help information associated with fields
$smarty->assign('FIELDHELPINFO', vtlib_getFieldHelpInfo($currentModule));
// END

$payments = array();
if (isset($_REQUEST['record'])) {
	$payments = Accounting::getPayments($_REQUEST['record']);
}

$config = Accounting::loadConfigParams();
$config['npayments'] = count($payments);
$config['decimalseparator'] = ".";
$_SESSION['associnvoice'] = $config['associnvoice'];

global $current_user;
$paid = 0;

foreach($payments as &$payment) {
	if ($payment["paid"] == "1") {
		$paid += $payment["amount"];
	}

	if ($payment["paymentduedate"] == "" || $payment["paymentduedate"] == "0000-00-00") {
		$payment["paymentduedate"] = $current_user->date_format;
		$payment["paymentduedate"] = str_replace("yyyy", "0000", $payment["paymentduedate"]);
		$payment["paymentduedate"] = str_replace("mm", "00", $payment["paymentduedate"]);
		$payment["paymentduedate"] = str_replace("dd", "00", $payment["paymentduedate"]);
	} else {
		$date_format = $current_user->date_format;
		$date_format = str_replace("yyyy", "Y", $date_format);
		$date_format = str_replace("mm", "m", $date_format);
		$date_format = str_replace("dd", "d", $date_format);
		$date = explode("-", $payment["paymentduedate"]);

		$payment["paymentduedate"] = date($date_format, mktime(0, 0, 0, $date[1], $date[2], $date[0]));
	}

	if ($payment["date"] == "" || $payment["date"] == "0000-00-00") {
		$payment["date"] = $current_user->date_format;
		$payment["date"] = str_replace("yyyy", "0000", $payment["date"]);
		$payment["date"] = str_replace("mm", "00", $payment["date"]);
		$payment["date"] = str_replace("dd", "00", $payment["date"]);
	} else {
		$date_format = $current_user->date_format;
		$date_format = str_replace("yyyy", "Y", $date_format);
		$date_format = str_replace("mm", "m", $date_format);
		$date_format = str_replace("dd", "d", $date_format);
		$date = explode("-", $payment["date"]);

		$payment["date"] = date($date_format, mktime(0, 0, 0, $date[1], $date[2], $date[0]));
	}
}


if (count($payments) == 0 && $focus->mode != 'edit') {
	array_push($payments, array('amount' => $total_amount, 'paymentduedate' => $inv_ord_due_date));
} else if (count($payments) == 0) {
		array_push($payments, array('amount' => '', 'paymentduedate' => ''));
}

$oustanding = $focus->accountingamount-$paid;
$smarty->assign('OUSTANDING', $oustanding);
$smarty->assign('PAID', $paid);
$smarty->assign('PAYMENTS', $payments);

$methods = Accounting::get_transaction_methods();
$_SESSION['methods_select'] = $methods;
$smarty->assign('TRANSACTION_METHOD', $methods);

$smarty->assign('CONFIG', $config);

if(isset($_REQUEST['RLreturn_module']) && $_REQUEST['RLreturn_module'] != "") {
	$rel_mod = $_REQUEST['RLreturn_module'];
	$rel_id = $_REQUEST['RLparent_id'];

	require_once("modules/$rel_mod/$rel_mod.php");
	$focus = new $rel_mod();
	$focus->id=$rel_id;
	$focus->retrieve_entity_info($rel_id, $rel_mod);
	$name_fld = "";
	$name_fld2 = "";
	switch($rel_mod) {
		case "Contacts":
			$name_fld = "lastname";
			$name_fld2 = "firstname";
			break;
		case "Accounts":
			$name_fld = "accountname";
			break;
		case "Leads":
			$name_fld = "lastname";
			$name_fld2 = "firstname";
			break;
		case "Vendor":
			$name_fld = "vendorname";
			break;
		default:
			$name_fld = "";
			break;
	}

	if ($name_fld != "") {
		if ($name_fld2 != "") {
			$smarty->assign('REL_NAME', $focus->column_fields[$name_fld2]." ".$focus->column_fields[$name_fld]);
		} else {
			$smarty->assign('REL_NAME', $focus->column_fields[$name_fld]);
		}

		$smarty->assign('REL_MOD', $rel_mod);
		$smarty->assign('REL_ID', $rel_id);
	}
}



$sql = "select * from vtiger_currency_info where deleted=0";
$result = $adb->pquery($sql, array());
$temprow = $adb->fetch_array($result);
$cnt=1;
$currency = array();
$currencies = array();
$currency_default = '';
do
{
	$currency_element = Array();	$currency_element['id'] = $temprow["id"];
	$currency_element['name'] = $temprow["currency_name"];	if ($temprow["id"] == $currency_id) {		$currency_id = $temprow["currency_code"];	}
	$currency_element['code'] = $temprow["currency_code"];
	$currency_element['symbol'] = $temprow["currency_symbol"];
	$currency_element['crate'] = $temprow["conversion_rate"];
	$currency_element['status'] = $temprow["currency_status"];
	if($temprow["defaultid"] != '-11') {
		array_push($currencies, $temprow["currency_code"]);
		$currency_element['default'] = 'false';
	} else {
		$currency_element['default']= 'true';
		$currency_default = $currency_element['code'];
	}
	$currency[] = $currency_element;
	$cnt++;
}while($temprow = $adb->fetch_array($result));



$smarty->assign('CURRENCIES', rtrim($currency_default.",".implode(",", $currencies), ","));
$smarty->assign('RECORD_CURRENCY', $focus->column_fields["accountingcurrency"]);$currency_code = ($currency_id == "") ? $config["defaultcurrency"] : $currency_id ;
$smarty->assign('DEFAULT_CURRENCY', $currency_code);

if($focus->mode == 'edit') {
	$smarty->display(vtlib_getModuleTemplate($currentModule, 'EditView.tpl'));
} else {
	$smarty->display(vtlib_getModuleTemplate($currentModule, 'CreateView.tpl'));
}

?>