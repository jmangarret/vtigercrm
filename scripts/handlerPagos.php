<?php
require_once 'include/utils/utils.php';
require 'include/events/include.inc';
$em = new VTEventsManager($adb);
$em->registerHandler("vtiger.entity.aftersave", "modules/RegistroDePagos/RegistroDePagosHandler.php", "RegistroDePagosHandler");
$em->registerHandler("vtiger.entity.beforedelete", "modules/RegistroDePagos/RegistroDePagosHandler.php", "RegistroDePagosHandler");
echo 'Custom Handler Registered !';
?>
