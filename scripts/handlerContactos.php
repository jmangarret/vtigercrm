<?php
require_once 'include/utils/utils.php';
require 'include/events/include.inc';
$em = new VTEventsManager($adb);
$em->registerHandler("vtiger.entity.aftersave", "modules/Contacts/ContactosHandler.php", "ContactosHandler", "ModuleName in ['Contacts']");
echo 'Custom Handler Registered !';

?>
