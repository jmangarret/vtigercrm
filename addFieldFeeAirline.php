<?php
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Utils.php');
include_once('vtlib/Vtiger/Menu.php');
require_once('vtlib/Vtiger/Block.php');
require_once('vtlib/Vtiger/Field.php');
$Vtiger_Utils_Log = true;
$module=Vtiger_Module::getInstance('Boletos');
$block = Vtiger_Block::getInstance('LBL_BLOCK_GENERAL_INFORMATION',$module);

// Add field
$field7=new Vtiger_Field();
$field7->label='Fee Aerolinea';
$field7->name='fee_airline';
$field7->table='vtiger_boletos';
$field7->column='fee_airline';
$field7->columntype = 'DOUBLE(8,2)';
$field7->uitype = 7; //money
$field7->typeofdata = 'N~O'; //optinal
$block->addField($field7);

$block->save($module);
$module->initWebservice();
?>
