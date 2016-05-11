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
$users = Vtiger_Module::getInstance('Contacts');
// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('LBL_CONTACT_INFORMATION', $users);
// Add field
$fieldInstance = new Vtiger_Field();
$fieldInstance->name = 'firma'; //Usually matches column name
$fieldInstance->table = 'vtiger_contactdetails';
$fieldInstance->column = 'firmas_satelite'; //Must be lower case
$fieldInstance->label = 'Firmas Satelite'; //Upper case preceeded by LBL_
$fieldInstance->columntype = 'VARCHAR(100)'; //
$fieldInstance->uitype = 33; //textCampo mandatory
$fieldInstance->displaytype = 2; //readonly
$fieldInstance->typeofdata = 'V~O'; //V=Varchar?, M=Mandatory, O=Optional
$block->addField($fieldInstance);

$block->save($users);
$users->initWebservice();
?>
