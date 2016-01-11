<?php
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
include_once('vtlib/Vtiger/Module.php');
$_module = Vtiger_Module::getInstance('Accounts');
$_module->setRelatedList(Vtiger_Module::getInstance('ComisionSatelites'), 'Tipos de Comisiones',Array('ADD','SELECT'),'get_related_list');
//CREA UN LINK RELACIONADO CON EL MODULO INDICADO
?>
