<?
include("../../config.inc.php");
$user=$dbconfig['db_username'];
$pass=$dbconfig['db_password'];
$bd=$dbconfig['db_name'];
mysql_connect("localhost",$user,$pass);
mysql_select_db($bd);
$id= $_GET["id"];
$userid= $_GET["userid"];
$accion= $_GET["accion"];

if ($accion=="procesarLocalizadores"){		
	if (isset($id))
	foreach ($id as $idLoc) {
		/// CREACION DEL REGISTO DE VENTAS ///
		$sqlIdCrm=mysql_query("CALL getCrmId();");
		$sqlIdCrm=mysql_query("SELECT @idcrm;");
		$resIdCrm=mysql_fetch_row($sqlIdCrm);
		$crmId=$resIdCrm[0];
		$fhoy=date("Y-m-d h:i:s");

		//Obtenemos correlativo del registro de ventas
		$sqlRecordNumber="CALL getRecordNumber('RegistroDeVentas')";
		$qryRecordNumber=mysql_query($sqlRecordNumber);
		$qryRecordNumber=mysql_query("SELECT @id_entity, @cur_prefix");
		$rowRecordNumber=mysql_fetch_row($qryRecordNumber);
		$idRecord=$rowRecordNumber[0];
		$moduleRecord=$rowRecordNumber[1];

		//Seteamos crmEntity
		$sqlSetCrm="CALL setCrmEntity('RegistroDeVentas','$moduleRecord','".$fhoy."',$crmId,$userid)";
		$setCrm=mysql_query($sqlSetCrm);

		//Buscamos contacto para el registro de venta si el contacto del Localizaodr pertenece a un Satelite
		$sqlContacto ="SELECT c.contactid FROM vtiger_account AS a ";
		$sqlContacto.="INNER JOIN vtiger_contactdetails 	AS c ON a.accountid=c.accountid ";
		$sqlContacto.="INNER JOIN vtiger_localizadores 	AS l ON l.contactoid=c.contactid ";		
		$sqlContacto.="WHERE a.account_type='Satelite' AND localizadoresid=".$idLoc;	
		$qryContacto=mysql_query($sqlContacto);
		$resContacto=mysql_fetch_row($qryContacto);		
		$contactid = (isset($resContacto[0]) ? $resContacto[0] : '');

		//Creamos registro de venta
		$sqlVenta ="insert into vtiger_registrodeventas(registrodeventasid,registrodeventasname,registrodeventastype,fecha,contacto) ";
		$sqlVenta.="values($crmId,'$moduleRecord','Boleto',NULL,$contactid)";
		$qryVenta=mysql_query($sqlVenta);
		$insert_venta=mysql_affected_rows();

		$sqlReg2="insert into vtiger_registrodeventascf(registrodeventasid,cf_1621,cf_1627) values($crmId,'Pendiente de Pago','Venta generada desde Procesar Localizadores')";
		$qryReg2=mysql_query($sqlReg2);

		$idRecordSig=($idRecord+1);
		$sqlEnt="UPDATE vtiger_modentity_num SET cur_id=CONCAT('0',$idRecordSig) WHERE cur_id='$idRecord' AND active=1 AND semodule='RegistroDeVentas'";
		$qryEnt=mysql_query($sqlEnt);
		/// FIN CREACION DEL REGISTO DE VENTAS///

		//$sql="UPDATE vtiger_boletos SET status='Procesado' WHERE boletosid=".$i;		
		$qryUpdLoc=mysql_query("UPDATE vtiger_localizadores SET procesado=1 WHERE localizadoresid=".$idLoc);			
		$update_loc=mysql_affected_rows();
		if ($insert_venta>0 && $update_loc>0){
			//Actualizamos venta asociada en Localizador					
			$qryVtaLoc=mysql_query("UPDATE vtiger_localizadores SET registrodeventasid=$crmId WHERE localizadoresid=".$idLoc);
			//Insertamos relacion entre modulos vtiger
			$qryInsertRel=mysql_query("INSERT INTO vtiger_crmentityrel values($crmId,'RegistroDeVentas',$idLoc,'Localizadores');");
			//Buscamos boletos del localizador para actualizar status.
			$qryBoletos=mysql_query("SELECT boletosid FROM vtiger_boletos WHERE localizadorid=".$idLoc);			
			while ($rowBoletos=mysql_fetch_row($qryBoletos)){
				$idBoleto=$rowBoletos[0];	
				$sql=mysql_query("UPDATE vtiger_boletos SET status='Procesado' WHERE boletosid=".$idBoleto);		
			}
			$cont++;						
		}
	}
	if ($cont>0){
		$link= "<a href='index.php?module=Localizadores&view=List'>Actualizar Lista</a>";		
		echo "Se han procesado TODOS LOS BOLETOS asociados de los LOCALIZADORES seleccionados. $link";
	}
}

?>
