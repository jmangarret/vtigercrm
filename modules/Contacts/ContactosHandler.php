<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
class ContactosHandler extends VTEventHandler {
    function handleEvent($eventName, $entityData) { 
		$adb = PearDatabase::getInstance();
		$moduleName = $entityData->getModuleName();
		$homephone = $entityData->get('homephone');
		 if ($entityData->isNew()){
			 	$id=$entityData->getId();            
				$sql="UPDATE vtiger_contactdetails SET fax=? WHERE contactid = ?";
				$result = $adb->pquery($sql, array($homephone,$id));	
        }		
	
   }
}	

?>
