<?php
require_once 'include/utils/utils.php';
require 'include/events/include.inc';
$em = new VTEventsManager($adb);
$em->registerHandler("vtiger.entity.aftersave", "modules/ComisionSatelites/ComisionSatelitesHandler.php", "ComisionSatelitesHandler", "ModuleName in ['ComisionSatelites']");
echo 'Custom Handler Registered !';

?>
