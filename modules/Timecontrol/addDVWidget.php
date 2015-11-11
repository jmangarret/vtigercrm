<?php
$Vtiger_Utils_Log=true;
include_once('vtlib/Vtiger/Module.php');

$module = Vtiger_Module::getInstance('Timecontrol');
$module->addLink('DETAILVIEWWIDGET',
                 'Stopwatch',
                 'module=Timecontrol&action=TimecontrolAjax&file=StopWatch&record=$RECORD$'
                );

?>
