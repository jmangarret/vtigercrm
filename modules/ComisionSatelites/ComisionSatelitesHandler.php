<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
class ComisionSatelitesHandler extends VTEventHandler {
    function handleEvent($eventName, $entityData) { 
    	global $log;
		$adb = PearDatabase::getInstance();
		$moduleName 	= $entityData->getModuleName();		
		$aplicarTodo 	= $entityData->get('aplicartodo');
		$log->debug("Entering handle ComisionSatelitesHandler 1, aplicartodo: ". $aplicarTodo);
		// if ($entityData->isNew() && $aplicarTodo=="on"){
		 if ($aplicarTodo=="on"){
			 	$id=$entityData->getId();            
				$sql="CALL setTipoDeComisionTodos(".$id.")";
				$result = mysql_query($sql);	
				$log->debug("Entering handle ComisionSatelitesHandler 2 ".$sql.mysql_error());
        }			
   }
}	
?>
