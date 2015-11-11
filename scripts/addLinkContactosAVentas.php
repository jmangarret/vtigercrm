<?php
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include_once('vtlib/Vtiger/Module.php');
$moduleEnvios = Vtiger_Module::getInstance('Contacts');
$moduleEnvios->setRelatedList(Vtiger_Module::getInstance('RegistroDeVentas'), 'Ventas',Array('ADD','SELECT'),'get_related_list');
//CREA UN LINK RELACIONADO CON EL MODULO INDICADO
?>
