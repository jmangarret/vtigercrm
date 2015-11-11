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


$smarty = new vtigerCRM_Smarty();

$smarty->assign('APP', $app_strings);
$smarty->assign('MOD', $mod_strings);

$smarty->display(vtlib_getModuleTemplate("Accounting", 'AddPayment.tpl'));
?>