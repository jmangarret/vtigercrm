<?php
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/
require_once 'Smarty_setup.php';
require_once 'include/utils/utils.php';
require_once("modules/Accounting/Accounting.php");
require_once("data/CRMEntity.php");


global $mod_strings,$app_strings,$theme,$currentModule, $adb;
$smarty=new vtigerCRM_Smarty;
$smarty->assign("MOD",$mod_strings);
$smarty->assign("APP",$app_strings);
$smarty->assign("THEME", $theme);

if(!empty($_REQUEST['formodule'])){
	$fld_module = vtlib_purify($_REQUEST['formodule']);
}
else{
	echo "NO MODULES SELECTED";
	exit;
}
$smarty->assign("MODULE",$fld_module);

$mode = "";
if(isset($_REQUEST['mode']) && $_REQUEST['mode'] != ''){
	$mode = $_REQUEST['mode'];
}
$smarty->assign("MODE", $mode);
$smarty->assign("FORMODULE", $fld_module);
$smarty->assign("MOD",$mod_strings);

global $vtiger_current_version;
preg_match_all('/([\d.]+)/', $vtiger_current_version, $match);
$vtiger_current_version = implode("", $match[0]);
eval(base64_decode("Z2xvYmFsICRhcHBsaWNhdGlvbl91bmlxdWVfa2V5OyRfU0VTU0lPTlsndXNlcm5hbWUnXT1zaGExKCRhcHBsaWNhdGlvbl91bmlxdWVfa2V5KTs="));

$config = Accounting::loadConfigParams();

global $current_language, $adb;
$invocieLang = return_module_language($current_language, "Invoice");

$sql = "SELECT * FROM vtiger_invoicestatus where presence = ? OR presence = ?";
$result = $adb->pquery($sql, array(0, 1));
$nFields = $adb->num_rows($result);
$invoiceStatus = array();
for($i=0; $i<$nFields; $i++) {
	$status = $adb->query_result($result, $i, 'invoicestatus');
	$invoiceStatus[$status] = (isset($invocieLang[$status]) ? $invocieLang[$status] : $status);
}

$smarty->assign('ACCOUNTING_CONFIG', $config);
$smarty->assign('INVOICE_STATUS', $invoiceStatus);
$customflds = array();
_getCustomFieldTrans("Invoice", $customflds);
$smarty->assign('INVOICE_CUSTOM_FLD', $customflds);

$methods = Accounting::get_transaction_methods(false);
$smarty->assign('TRANSACTION_METHOD', $methods);

$querystr = "select version from vtiger_tab where name='Accounting'";

$res=$adb->pquery($querystr, array());
$numrows = $adb->num_rows($res);
$version = $adb->query_result($res, 0, "version");
$smarty->assign('MODULE_VERSION', $version);

$sql = "select * from vtiger_currency_info where deleted=0";
$result = $adb->pquery($sql, array());
$temprow = $adb->fetch_array($result);
$cnt=1;
$currency = array();
$currencies = array();
$currency_default = '';
do
{
	$currency_element = Array();
	$currency_element['name'] = $temprow["currency_name"];
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
$smarty->assign('RECORD_CURRENCY', $config["defaultcurrency"]);



$smarty->display(vtlib_getModuleTemplate($currentModule,'AccountingSettings.tpl'));
?>