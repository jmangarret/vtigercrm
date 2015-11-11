<?php

global $app_strings, $mod_strings, $current_language, $currentModule, $theme;

require_once('modules/Accounting/AccountingUtils.php');
$chart_strings = return_chart_language($_SESSION["authenticated_user_language"]);

require_once('Smarty_setup.php');
require_once('modules/Accounting/ChartTabs.php');


$smarty = new vtigerCRM_Smarty();
$smarty->assign('MOD', $mod_strings);
$smarty->assign('APP', $app_strings);
$smarty->assign('MODULE', $currentModule);
$smarty->assign('CHART_LANG', $chart_strings);


$charttab = $_REQUEST['charttab'];


$tab = $tabs[$charttab];
$tab_sections = $tabs[$charttab]['sections'];
$smarty->assign('SECTIONS', $tab_sections);
$smarty->assign('CHART', $chart_strings);
$smarty->display(vtlib_getModuleTemplate("Accounting", 'SelectCharts.tpl'));


?>