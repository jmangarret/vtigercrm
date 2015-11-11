<?php
include_once 'modules/RegistroDeVentas/RegistroDeVentasHandler.php';
class VentaDeProductosHandler extends VTEventHandler {
    function handleEvent($eventName, $entityData) {  
    	global $log;
        $moduleName = $entityData->getModuleName();
        if ($moduleName == 'VentaDeProductos') {  
        	if ($eventName == 'vtiger.entity.aftersave' || $eventName == 'vtiger.entity.beforedelete') {          
				// Get the account name		
				$idVenta = $entityData->get('registrodeventasid');
				$idVentaDeProducto=$entityData->getId(); //OBTIENE ID DE LA VENTA
				$this->updateVentaDeProductos($idVentaDeProducto,$idVenta,NULL);
        	}
    	}
    	return true;
    }


    function updateVentaDeProductos($idVentaDeProducto, $idVenta, $action=""){
		global $log, $current_module, $adb, $current_user;
		
	    if ($action=="DELETE"){
        	$log->debug("Entering handle delete sotos");
			$sql="UPDATE vtiger_ventadeproductos SET registrodeventasid=NULL where ventadeproductosid = ? ";
			$result = $adb->pquery($sql, array($idVentaDeProducto));	
		}

		RegistroDeVentasHandler::updateVentas($idVenta);
		
		$log->debug("Entering handle ventaproductos");

		return true;
    }
}

?>