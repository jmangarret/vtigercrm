<?php
$moduleTitle="TSolucio::vtiger CRM Timecontrol Module";

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
echo "<html><head><title>vtlib $moduleTitle</title>";
echo '<style type="text/css">@import url("themes/softed/style.css");br { display: block; margin: 2px; }</style>';
echo '</head><body class=small style="font-size: 12px; margin: 2px; padding: 2px; background-color:#f7fff3; ">';
echo '<table width=100% border=0><tr><td align=left>';
echo '<a href="index.php"><img src="themes/softed/images/vtiger-crm.gif" alt="vtiger CRM" title="vtiger CRM" border=0></a>';
echo '</td><td align=center style="background-image: url(\'vtlogowmg.png\'); background-repeat: no-repeat; background-position: center;">';
echo "<b><H1>$moduleTitle</H1></b>";
echo '</td><td align=right>';
echo '<a href="www.vtiger-spain.com"><img src="vtspain.gif" alt="vtiger-spain" title="vtiger-spain" border=0 height=100></a>';
echo '</td></tr></table>';
echo '<hr style="height: 1px">';

// Turn on debugging level
$Vtiger_Utils_Log = true;

include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');

$module = Vtiger_Module::getInstance('Timecontrol');

$pdoModule = Vtiger_Module::getInstance('Products');
$pdoModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$pdoModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&product_id=$RECORD$');

$srvModule = Vtiger_Module::getInstance('Services');
$srvModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$srvModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&product_id=$RECORD$');

$helpdeskModule = Vtiger_Module::getInstance('HelpDesk');
$helpdeskModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$helpdeskModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$quotesModule = Vtiger_Module::getInstance('Quotes');
$quotesModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$quotesModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$salesorderModule = Vtiger_Module::getInstance('SalesOrder');
$salesorderModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$salesorderModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$purchaseorderModule = Vtiger_Module::getInstance('PurchaseOrder');
$purchaseorderModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$purchaseorderModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$invoiceModule = Vtiger_Module::getInstance('Invoice');
$invoiceModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$invoiceModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$potentialsModule = Vtiger_Module::getInstance('Potentials');
$potentialsModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$potentialsModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$campaignsModule = Vtiger_Module::getInstance('Campaigns');
$campaignsModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$campaignsModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$vendorsModule = Vtiger_Module::getInstance('Vendors');
$vendorsModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$vendorsModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$contactsModule = Vtiger_Module::getInstance('Contacts');
$contactsModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$contactsModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$accountsModule = Vtiger_Module::getInstance('Accounts');
$accountsModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$accountsModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$leadsModule = Vtiger_Module::getInstance('Leads');
$leadsModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$leadsModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$prjModule = Vtiger_Module::getInstance('Project');
$prjModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$prjModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$prjmModule = Vtiger_Module::getInstance('ProjectMilestone');
$prjmModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$prjmModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$prjtModule = Vtiger_Module::getInstance('ProjectTask');
$prjtModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$prjtModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$astModule = Vtiger_Module::getInstance('Assets');
$astModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$astModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

$sctoModule = Vtiger_Module::getInstance('ServiceContracts');
$sctoModule->setRelatedList($module, 'Timecontrol', Array('ADD'), 'get_dependents_list');
$sctoModule->addLink('DETAILVIEWBASIC', 'Timecontrol', 'index.php?module=Timecontrol&action=EditView&relatedto=$RECORD$');

echo '</body></html>';

?>
