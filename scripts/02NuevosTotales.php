<?php
ini_set('display_errors', true);
ini_set('error_reporting', ~E_NOTICE);
require_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Utils.php');
include_once('vtlib/Vtiger/Menu.php');
require_once('vtlib/Vtiger/Block.php');
require_once('vtlib/Vtiger/Field.php');
$Vtiger_Utils_Log = true;
$module=Vtiger_Module::getInstance('RegistroDeVentas');
$block = Vtiger_Block::getInstance('Resumen',$module);

$field=new Vtiger_Field();
$field->label='Total Venta Bs.';
$field->name='totalventabs';
$field->table='vtiger_registrodeventas';
$field->column='totalventabs';
$field->columntype = 'DOUBLE(8,2)';
$field->uitype = 7; //MONTO
$field->displaytype = 2; //MONTO
$field->typeofdata = 'NN~O~8,2';
$block->addField($field);

$field=new Vtiger_Field();
$field->label='Total Venta Dolares.';
$field->name='totalventadolares';
$field->table='vtiger_registrodeventas';
$field->column='totalventadolares';
$field->columntype = 'DOUBLE(8,2)';
$field->uitype = 7; //MONTO
$field->displaytype = 2; //MONTO
$field->typeofdata = 'NN~O~8,2';
$block->addField($field);

$field=new Vtiger_Field();
$field->label='Total Pagado Bs.';
$field->name='totalpagadobs';
$field->table='vtiger_registrodeventas';
$field->column='totalpagadobs';
$field->columntype = 'DOUBLE(8,2)';
$field->uitype = 7; //MONTO
$field->displaytype = 2; //MONTO
$field->typeofdata = 'NN~O~8,2';
$block->addField($field);

$field=new Vtiger_Field();
$field->label='Total Pagado Dolares.';
$field->name='totalpagadodolares';
$field->table='vtiger_registrodeventas';
$field->column='totalpagadodolares';
$field->columntype = 'DOUBLE(8,2)';
$field->uitype = 7; //MONTO
$field->typeofdata = 'NN~O~8,2';
$field->displaytype = 2; //MONTO
$block->addField($field);

$field=new Vtiger_Field();
$field->label='Total Pendiente Bs.';
$field->name='totalpendientebs';
$field->table='vtiger_registrodeventas';
$field->column='totalpendientebs';
$field->columntype = 'DOUBLE(8,2)';
$field->uitype = 7; //MONTO
$field->displaytype = 2; //MONTO
$field->typeofdata = 'NN~O~8,2';
$block->addField($field);

$field=new Vtiger_Field();
$field->label='Total Pendiente Dolares.';
$field->name='totalpendientedolares';
$field->table='vtiger_registrodeventas';
$field->column='totalpendientedolares';
$field->columntype = 'DOUBLE(8,2)';
$field->uitype = 7; //MONTO
$field->typeofdata = 'NN~O~8,2';
$field->displaytype = 2; //MONTO
$block->addField($field);

$block->save($module);
$module->initWebservice();
echo 'Code successfully executed';
?>
