<?php

require_once('modules/Accounting/Accounting.php');

global $current_user, $app_strings;

$config = Accounting::loadConfigParams();
$show_balance = $config['showbalancetoall'];
if ($show_balance != 'true') {
	if (is_admin($current_user )) {
		$show_balance = 'true';
	}
}

$show_balance = 'true';
if ($show_balance != 'true') {
?>
	<script type='text/javascript'>
		alert("<?php echo $app_strings['LBL_PERMISSION']?>");
		window.location="index.php";
	</script>

<?php
 exit;
}
?>

<?php


global $app_strings, $mod_strings, $current_language, $currentModule, $theme;

require_once('Smarty_setup.php');
require_once('modules/Accounting/ChartTabs.php');

$smarty = new vtigerCRM_Smarty();
$smarty->assign('MOD', $mod_strings);
$smarty->assign('APP', $app_strings);
$smarty->assign('MODULE', $currentModule);

$smarty->assign('CHARTTABS', $tabs);

$smarty->display(vtlib_getModuleTemplate("Accounting", 'AccountingCharts.tpl'));


?>