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
$users = Vtiger_Module::getInstance('Users');
// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('LBL_USERLOGIN_ROLE', $users);
// Add field
$fieldInstance = new Vtiger_Field();
$fieldInstance->name = 'cedula'; //Usually matches column name
$fieldInstance->table = 'vtiger_users';
$fieldInstance->column = 'cedula'; //Must be lower case
$fieldInstance->label = 'Cedula'; //Upper case preceeded by LBL_
$fieldInstance->columntype = 'VARCHAR(12)'; //
$fieldInstance->uitype = 2; //textCampo mandatory
$fieldInstance->typeofdata = 'V~M'; //V=Varchar?, M=Mandatory, O=Optional
$block->addField($fieldInstance);

$fieldInstance2 = new Vtiger_Field();
$fieldInstance2->name = 'firma'; //Usually matches column name
$fieldInstance2->table = 'vtiger_users';
$fieldInstance2->column = 'agenteid'; //Must be lower case
$fieldInstance2->label = 'Agente ID'; //Upper case preceeded by LBL_
$fieldInstance2->columntype = 'VARCHAR(100)'; //
$fieldInstance2->uitype = 33; //textCampo mandatory
$fieldInstance2->typeofdata = 'V~M'; //V=Varchar?, M=Mandatory, O=Optional
$block->addField($fieldInstance2);

$block->save($users);
$users->initWebservice();
?>
