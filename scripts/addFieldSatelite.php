<?php
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Utils.php');
include_once('vtlib/Vtiger/Menu.php');
require_once('vtlib/Vtiger/Block.php');
require_once('vtlib/Vtiger/Field.php');
$Vtiger_Utils_Log = true;
$module=Vtiger_Module::getInstance('Contacts');
$block = Vtiger_Block::getInstance('LBL_CONTACT_INFORMATION',$module);
$field=new Vtiger_Field();
$field->label='Es Satelite';
$field->name='isSatelite';
$field->table='vtiger_contactdetails';
$field->column='isSatelite';
$field->columntype = 'VARCHAR(5)';
$field->uitype = 56; //Checkbox
$field->typeofdata = 'V~M';
$block->addField($field);
$block->save($module);
$module->initWebservice();
echo 'Code successfully executed';
?>