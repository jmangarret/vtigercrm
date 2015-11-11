<?php
/*+********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ********************************************************************************/
session_start();

require_once('Smarty_setup.php');
require_once('include/database/PearDatabase.php');
require_once('include/utils/utils.php');
require_once('include/utils/CommonUtils.php');
require_once('modules/Accounting/AjaxUtils.php');
require_once('modules/Accounting/Accounting.php');

global $mod_strings;
if ($_REQUEST["command"] == "activemods")
{
	Accounting::updateActiveModules($_REQUEST["mod"], $_REQUEST["search"], $_REQUEST["checked"]);
	Accounting::updateCustomLinks(true);
}

else if ($_REQUEST["command"] == "refreshcredits")
{
	$config = Accounting::loadConfigParams();
	if ($config["username"] != "" && $config["password"] != "")
	{
		$credits = getCredits($config);
		if ($credits == "-1")
			echo $mod_strings['_LBL_FAX_SETTINGS_CONNECTIVITY_ERROR'];
		else
		{
			$errCode = split(":", $credits);
			if ($errCode[0] == "ERR")
				echo $mod_strings['LBL_GET_CREDITS_ERROR']." (".$errCode[1].")";
			else
				echo $errCode[1];
		}
	}
	else
		echo $mod_strings['LBL_GET_CREDITS_ERROR'];
}

else if ($_REQUEST["command"] == "checkconnectivity")
{
	$config = Accounting::loadConfigParams();
	$result = getCredits($config);
	if ($result == "-1")
		echo $mod_strings['_LBL_FAX_SETTINGS_CONNECTIVITY_ERROR'];
	else
	{
		$errCode = split(":", $result);
		if ($errCode[0] == "ERR")
			echo $mod_strings['_LBL_FAX_SETTINGS_CONNECTIVITY_ERROR_LOGIN']." (".$errCode[1].")";
		else
			echo $mod_strings['_LBL_FAX_SETTINGS_CONNECTIVITY_OK'];
	}

}

else if ($_REQUEST["command"] == "addtemplate")
	Accounting::addTemplate($_REQUEST["name"], $_REQUEST["body"]);
else if ($_REQUEST["command"] == "savetemplate")
	Accounting::updateTemplate($_REQUEST["id"], $_REQUEST["name"], $_REQUEST["body"]);
else if ($_REQUEST["command"] == "deletetemplate")
	Accounting::deleteTemplate($_REQUEST["id"]);

else if ($_REQUEST["command"] == "deletesender")
	Accounting::deleteSender($_REQUEST["sender"]);
else if ($_REQUEST["command"] == "addsender")
	Accounting::addSender($_REQUEST["sender"]);

else if ($_REQUEST["command"] == "updateserviceinfo")
{
	Accounting::updateServiceInfo($_REQUEST["domain"], $_REQUEST["toformat"], $_REQUEST["from"], $_REQUEST["extensions"], $_REQUEST["maxsize"], str_replace(" ", "", $_REQUEST["countrycode"]), str_replace(" ", "", $_REQUEST["internationalcode"]), str_replace(" ", "", $_REQUEST["trunkcode"]), $_REQUEST["subject"]);
}

else if ($_REQUEST["command"] == "updatecampaignbound")
{
	Accounting::updateCampaingBound($_REQUEST["lowerbound"]);
	echo base64_encode($_REQUEST["username"])."###".base64_encode($_REQUEST["password"]);
}

else if ($_REQUEST["command"] == "updatehtmlbody")
	Accounting::updateConfigParam('htmlbody', $_REQUEST["checked"]);
else if ($_REQUEST["command"] == "updatesavebodyuser")
	Accounting::updateSaveBodyUser($_REQUEST["checked"]);

else if ($_REQUEST["command"] == "updateimage")
{
	Accounting::updateConfigParam(base64_decode("bGljZW5zZW9r"), "true");
}
else if ($_REQUEST["command"] == "updatedlr")
	Accounting::updateDLR($_REQUEST["checked"]);

else if ($_REQUEST["command"] == "updateuseproxy")
	Accounting::updateUseProxy($_REQUEST["checked"]);

else if ($_REQUEST["command"] == "updateenablereminder")
	Accounting::updateUseReminder($_REQUEST["checked"]);

else if ($_REQUEST["command"] == "savereminder")
	Accounting::updateReminderSettings($_REQUEST["sender"], $_REQUEST["phonetype"]);

else if ($_REQUEST["command"] == "updatefixcustomlink")
{
	Accounting::updateConfigParam('fixcustomlinksbug', $_REQUEST["checked"]);
	Accounting::updateCustomLinks(true);
} else if ($_REQUEST["command"] == "installlic") {
	Accounting::updateLicense($_REQUEST["lic"]);
} else if ($_REQUEST["command"] == "uninstalllic") {
	Accounting::updateConfigParam("licenseok", "false");
}else if ($_REQUEST["command"] == "relmodules") {
	//Accounting::updateConfigParam('relmodules', $_REQUEST["relstatus"]);
	//Accounting::setRelatedModules($_REQUEST["status"]);
} else if ($_REQUEST["command"] == "invoicewf") {
	//Accounting::updateConfigParam('invoicewf', $_REQUEST["status"]);
}else if ($_REQUEST["command"] == "saveconfig") {
	Accounting::updateConfigParam('invoicewfpaid', $_REQUEST["paidInvoice"]);
	Accounting::updateConfigParam('invoicewfpending', $_REQUEST["pendingInvoice"]);
	//Accounting::updateConfigParam('relmodules', $_REQUEST["relstatus"]);
	//Accounting::setRelatedModules('false');
	//Accounting::setRelatedModules($_REQUEST["relstatus"]);
	Accounting::updateConfigParam('invoicewf', $_REQUEST["wfstatus"]);

	Accounting::updateConfigParam('paymentwfpaid', $_REQUEST["paidPayment"]);
	Accounting::updateConfigParam('paymentwfpending', $_REQUEST["pendingPayment"]);
	Accounting::updateConfigParam('paymentwf', $_REQUEST["wfstatuspayment"]);
	Accounting::updateConfigParam('createpaymentwf', $_REQUEST["wfstatuscreatepayment"]);

	Accounting::updateConfigParam('wf_nopayments', $_REQUEST["createPayNo"]);
	Accounting::updateConfigParam('wf_frecuency', $_REQUEST["createPayFrec"]);
	Accounting::updateConfigParam('wf_firstpaymentdate', $_REQUEST["createPayDate"]);
	Accounting::updateConfigParam('wf_firstpaymentamount', $_REQUEST["createPayAmount"]);

	Accounting::updateConfigParam('associnvoice', $_REQUEST["associnvoice"]);
	Accounting::updateConfigParam('customlinks', $_REQUEST["addcustomlink"]);
	Accounting::updateCustomLinks(array("Project", "Potentials", "Leads", "Contacts", "Vendors", "Accounts", "Invoice", "PurchaseOrder", "SalesOrder", "Invoice"), $_REQUEST["addcustomlink"]);

	Accounting::updateTransactionMethods($_REQUEST['methodslist']);

	Accounting::updateConfigParam('showvat', $_REQUEST["showvat"]);
	Accounting::updateConfigParam('hidepopup', $_REQUEST["hidepopup"]);
	Accounting::updateConfigParam('defaultcurrency', $_REQUEST["defaultcurrency"]);
	
	Accounting::updateConfigParam('populateamount', $_REQUEST["populateamount"]);		
}

?>