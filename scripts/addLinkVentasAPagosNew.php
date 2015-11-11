<?php
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include_once('vtlib/Vtiger/Module.php');
$module = Vtiger_Module::getInstance('RegistroDeVentas');
$module->setRelatedList(Vtiger_Module::getInstance('RegistroDePagos'), 'Pagos',Array('ADD','SELECT'),'get_dependents_list');
//CREA UN LINK RELACIONADO CON EL MODULO INDICADO
?>
