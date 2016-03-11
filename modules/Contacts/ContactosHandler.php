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
    	global $log;
		$adb = PearDatabase::getInstance();
		$moduleName = $entityData->getModuleName();
		$homephone = $entityData->get('homephone');
		$id=$entityData->getId();  
		if ($entityData->isNew()){
			 	$id=$entityData->getId();            
				$sql="UPDATE vtiger_contactdetails SET fax=? WHERE contactid = ?";
				$result = $adb->pquery($sql, array($homephone,$id));	
        }			
		//// ACTUALIZAR STATUS DE FIRMAS
		$postFirmas = $entityData->get('firma');
		$sql="select firmas_satelite from vtiger_contactdetails where contactid=?";			
		$qry=$adb->pquery($sql, array($id));
		$result=$adb->fetch_row($qry);
		$firmasContacto=explode(" |##| ", $result[0]);
		//VALIDAMOS ANTES DE GUARDAR SI HAY FIRMAS YA ASIGNADAS
		if ($eventName=="vtiger.entity.beforesave"){
			$firmasAsig=array();
			$FirmasNew = array_diff($postFirmas, $firmasContacto);			
			foreach ($FirmasNew as $firma) {				
				$sql="SELECT COUNT(*) FROM vtiger_firma WHERE status=1 AND firma=?";				
				$qry=$adb->pquery($sql, array(trim($firma)));	
				$result=$adb->fetch_row($qry);						
				if ($result[0]>0){
					$firmasAsig[]=$firma;
					$cont++;
				}
			}
			if ($cont>0){
				$firmas=implode(",", $firmasAsig);
				echo "<script>";
				echo "alert('Firma(s) ya asignada(s): $firmas');";
				echo "history.back();";				
				echo "</script>";				
				die();					
			}
			///SI NO HAY FIRMAS Y ASIGNADAS VERIFICAMOS SI SE ELIMINO ALGUNA
			$firmasSinAsignar = array_diff($firmasContacto, $postFirmas);
			foreach ($firmasSinAsignar as $f2) {				
				$log->debug("FIRMA ELIMINADA : ".$f2);
				$sql="CALL updfirma(?,?)";
				$adb->pquery($sql, array(trim($f2),0));				
			}

		}///FIN BEFORE SAVE
		//ACTUALIZAMOS STATUS DE FIRMAS DESPUES DE GUARDAR
		if ($eventName=="vtiger.entity.aftersave"){			
			foreach ($postFirmas as $firma) {
				$log->debug("FIRMA ASIGNADA: ".$firma);
				$sql="CALL updfirma(?,?)";
				$adb->pquery($sql, array(trim($firma),1));				
			}			
		}
		//// FIN ACTUALIZAR FIRMAS 
	
   }
}	

?>
