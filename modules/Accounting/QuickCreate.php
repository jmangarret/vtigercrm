<?php
/*+********************************************************************************
   * The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
   *********************************************************************************/

require_once("Smarty_setup.php");
require_once("modules/Accounting/Accounting.php");

$config = Accounting::loadConfigParams();


if ($config['licenseok'] != "true") {
	echo "<script>location.href='index.php?module=Accounting&action=AccountingSettings&parenttab=Settings&formodule=Accounting';</script>";
	exit;
}

$smarty = new vtigerCRM_Smarty;
$smarty->display(vtlib_getModuleTemplate("Accounting", 'QuickCreate.tpl'));

?>