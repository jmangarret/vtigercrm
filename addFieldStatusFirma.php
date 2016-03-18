<?php
$Vtiger_Utils_Log = true;
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Utils.php');
include_once('vtlib/Vtiger/Menu.php');
require_once('vtlib/Vtiger/Block.php');
require_once('vtlib/Vtiger/Field.php');
$Vtiger_Utils_Log = true;
// Define instances
$users = Vtiger_Module::getInstance('Terminales');
// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('Información General', $users);
// Add field
$fieldInstance = new Vtiger_Field();
$fieldInstance->name = 'asignada'; //Usually matches column name
$fieldInstance->table = 'vtiger_terminales';
$fieldInstance->column = 'asignada'; //Must be lower case
$fieldInstance->label = 'Firma Asignada'; //Upper case preceeded by LBL_
$fieldInstance->columntype = 'VARCHAR(3)'; //
$fieldInstance->displaytype = 2; //textCampo mandatory
$fieldInstance->uitype = 56; //textCampo mandatory
$fieldInstance->typeofdata = 'V~O'; //V=Varchar?, M=Mandatory, O=Optional
$block->addField($fieldInstance);

$block->save($users);
$users->initWebservice();
?>
