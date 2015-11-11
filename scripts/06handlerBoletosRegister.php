<?php
require_once 'include/utils/utils.php';
require 'include/events/include.inc';
$em = new VTEventsManager($adb);
$em->registerHandler("vtiger.entity.aftersave", "modules/Boletos/BoletosHandler.php", "BoletosHandler");
echo 'Custom Handler Registered !';
?>
