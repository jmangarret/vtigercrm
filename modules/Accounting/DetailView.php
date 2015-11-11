<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
require_once('Smarty_setup.php');
require_once('user_privileges/default_module_view.php');
require_once('modules/Accounting/Accounting.php');


global $mod_strings, $app_strings, $currentModule, $current_user, $theme, $singlepane_view;

$focus = CRMEntity::getInstance($currentModule);

$tool_buttons = Button_Check($currentModule);
$smarty = new vtigerCRM_Smarty();

$record = $_REQUEST['record'];
$isduplicate = vtlib_purify($_REQUEST['isDuplicate']);
$tabid = getTabid($currentModule);
$category = getParentTab($currentModule);

if($record != '') {
	$focus->id = $record;
	$focus->retrieve_entity_info($record, $currentModule);
}
if($isduplicate == 'true') $focus->id = '';

// Identify this module as custom module.
$smarty->assign('CUSTOM_MODULE', true);

$smarty->assign('APP', $app_strings);
$smarty->assign('MOD', $mod_strings);
$smarty->assign('MODULE', $currentModule);
// TODO: Update Single Module Instance name here.
$smarty->assign('SINGLE_MOD', getTranslatedString('SINGLE_'.$currentModule));
$smarty->assign('CATEGORY', $category);
$smarty->assign('IMAGE_PATH', "themes/$theme/images/");
$smarty->assign('THEME', $theme);
$smarty->assign('ID', $focus->id);
$smarty->assign('MODE', $focus->mode);

$recordName = array_values(getEntityName($currentModule, $focus->id));
$recordName = $recordName[0];
$smarty->assign('NAME', $recordName);
$smarty->assign('UPDATEINFO',updateInfo($focus->id));

// Module Sequence Numbering
$mod_seq_field = getModuleSequenceField($currentModule);
if ($mod_seq_field != null) {
	$mod_seq_id = $focus->column_fields[$mod_seq_field['name']];
} else {
	$mod_seq_id = $focus->id;
}
$smarty->assign('MOD_SEQ_ID', $mod_seq_id);
// END

$validationArray = split_validationdataArray(getDBValidationData($focus->tab_name, $tabid));
$smarty->assign('VALIDATION_DATA_FIELDNAME',$validationArray['fieldname']);
$smarty->assign('VALIDATION_DATA_FIELDDATATYPE',$validationArray['datatype']);
$smarty->assign('VALIDATION_DATA_FIELDLABEL',$validationArray['fieldlabel']);

$smarty->assign('EDIT_PERMISSION', isPermitted($currentModule, 'EditView', $record));
$smarty->assign('CHECK', $tool_buttons);

if(PerformancePrefs::getBoolean('DETAILVIEW_RECORD_NAVIGATION', true) && isset($_SESSION[$currentModule.'_listquery'])){
	$recordNavigationInfo = ListViewSession::getListViewNavigation($focus->id);
	VT_detailViewNavigation($smarty,$recordNavigationInfo,$focus->id);
}

$smarty->assign('IS_REL_LIST', isPresentRelatedLists($currentModule));
$smarty->assign('SinglePane_View', $singlepane_view);

if($singlepane_view == 'true') {
	$related_array = getRelatedLists($currentModule,$focus);
	$smarty->assign("RELATEDLISTS", $related_array);
}

if(isPermitted($currentModule, 'EditView', $record) == 'yes')
	$smarty->assign('EDIT_DUPLICATE', 'permitted');
if(isPermitted($currentModule, 'Delete', $record) == 'yes')
	$smarty->assign('DELETE', 'permitted');

$smarty->assign('BLOCKS', getBlocks($currentModule,'detail_view','',$focus->column_fields));

// Gather the custom link information to display
include_once('vtlib/Vtiger/Link.php');
$customlink_params = Array('MODULE'=>$currentModule, 'RECORD'=>$focus->id, 'ACTION'=>vtlib_purify($_REQUEST['action']));
$smarty->assign('CUSTOM_LINKS', Vtiger_Link::getAllByType(getTabid($currentModule), Array('DETAILVIEWBASIC','DETAILVIEW'), $customlink_params));
// END

// Record Change Notification
$focus->markAsViewed($current_user->id);
// END

$payments = array();
$payments = Accounting::getPayments($focus->id);

$config = array();
$config['npayments'] = count($payments);
$config['decimalseparator'] = ".";

global $current_user;
$paid = 0;

foreach($payments as &$payment) {
	$payment_date = $payment["paymentduedate"];
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

	$exp_date = $payment_date;
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	$expiration_date = strtotime((String)$exp_date);

	if ($expiration_date < $today) {
		$payment["expired"] = "1";
	} else {
		$payment["expired"] = "0";
	}
}

$config = Accounting::loadConfigParams();
$smarty->assign('PAYMENTS', $payments);
$smarty->assign('CONFIG', $config);


$smarty->assign('DETAILVIEW_AJAX_EDIT', PerformancePrefs::getBoolean('DETAILVIEW_AJAX_EDIT', true));

$smarty->display(vtlib_getModuleTemplate($currentModule, 'DetailView.tpl'));

?>