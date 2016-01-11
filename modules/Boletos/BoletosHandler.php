<?php
include_once 'modules/RegistroDeVentas/RegistroDeVentasHandler.php';
class BoletosHandler extends VTEventHandler {
    function handleEvent($eventName, $entityData) {  
    	global $log;
        $moduleName = $entityData->getModuleName();
        if ($moduleName == 'Boletos') {  
        	if ($eventName == 'vtiger.entity.aftersave' || $eventName == 'vtiger.entity.beforedelete') {          
				// Get the account name		
				$idVenta = $entityData->get('registrodeventasid');
				$idBoleto=$entityData->getId(); //OBTIENE ID DE LA VENTA
				//$this->updateBoletos($idBoleto,$idVenta,NULL);
        	}
    	}
    	return true;
    }
    function updateBoletos($idBoleto, $idVenta, $action=""){
		global $log, $current_module, $adb, $current_user;
	    if ($action=="DELETE"){
        	$log->debug("Entering handle delete sotos");
			$sql="UPDATE vtiger_boletos SET registrodeventasid=NULL where boletosid = ? ";
			$result = $adb->pquery($sql, array($idBoleto));	
		}


		$log->debug("Entering handleboletos ");

		RegistroDeVentasHandler::updateVentas($idVenta);

		$sqlTotal="UPDATE vtiger_boletos SET totalboletos=amount*cantidad where boletosid=?";
		$result=$adb->pquery($sqlTotal,array($idBoleto));

		return true;
    }
}

?>