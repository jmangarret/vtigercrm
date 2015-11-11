<?php
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include_once('vtlib/Vtiger/Module.php');
$modulePagos = Vtiger_Module::getInstance('Accounting');
//Setrelatedlist Crea un link en el menu derecho del formulario, no asocia campos. Parametros 'modulo relacionado', 'etiqueta del link', 'acciones', 'metodo'
$modulePagos->setRelatedList(Vtiger_Module::getInstance('Pagos'), 'Detall de Pagos',Array(),'get_dependents_list');

?>
