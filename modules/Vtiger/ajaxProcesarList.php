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

if ($accion=="anularBoleto"){
	$sqlBoleto="UPDATE vtiger_boletos SET status='Anulado' WHERE boletosid=".$id;
	$qryBoleto=mysql_query($sqlBoleto);
	if (mysql_affected_rows()>0){
		$link= "<a href='index.php?module=Boletos&view=List'>Actualizar Lista</a>";		
		echo "Boleto Anulado con éxito!. $link";
	}	
}


if ($accion=="buscarClientePorBoletoId"){	
	$sqlCliente ="SELECT CONCAT(accountname,'/ ',firstname,' ',lastname) FROM vtiger_account AS a ";
	$sqlCliente.="INNER JOIN vtiger_contactdetails 	AS c ON a.accountid=c.accountid ";
	$sqlCliente.="INNER JOIN vtiger_localizadores 	AS l ON l.contactoid=c.contactid ";
	$sqlCliente.="INNER JOIN vtiger_boletos 		AS b ON b.localizadorid=l.localizadoresid ";
	$sqlCliente.="WHERE boletosid=".$id;	
	$qryCliente=mysql_query($sqlCliente);
	$resCliente=mysql_fetch_row($qryCliente);
	$rowCliente=$resCliente[0];
	echo $rowCliente;
}

if ($accion=="procesarBoletos"){
	foreach ($id as $i) {
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

		//Creamos registro de venta
		$sqlVenta ="insert into vtiger_registrodeventas(registrodeventasid,registrodeventasname,registrodeventastype,fecha,contacto) ";
		$sqlVenta.="values($crmId,'$moduleRecord','Boleto',NULL,'')";
		$qryVenta=mysql_query($sqlVenta);

		$sqlReg2="insert into vtiger_registrodeventascf(registrodeventasid,cf_1621,cf_1627) values($crmId,'Pendiente de Pago','Venta generada desde procesar Boletos')";
		$qryReg2=mysql_query($sqlReg2);

		$idRecordSig=$idRecord+1;
		$sqlEnt="UPDATE vtiger_modentity_num SET cur_id=CONCAT('0',$idRecordSig) WHERE cur_id='$idRecord' AND active=1 AND semodule='RegistroDeVentas'";
		$qryEnt=mysql_query($sqlEnt);

		/// FIN ///
		$sql="UPDATE vtiger_boletos SET status='Procesado' WHERE boletosid=".$i;		
		$res=mysql_query($sql);		
		if (mysql_affected_rows()>0){					
			$qryLoc=mysql_query("SELECT localizadorid FROM vtiger_boletos WHERE boletosid=".$i);
			$rowLoc=mysql_fetch_row($qryLoc);
			$idLoc=$rowLoc[0];
			$qryVtaLoc=mysql_query("UPDATE vtiger_localizadores SET registrodeventasid=$crmId WHERE localizadoresid=".$idLoc);
			$sqlTotProc="SELECT count(*) FROM vtiger_boletos WHERE status<>'Procesado' AND localizadorid=$idLoc";
			$qryTotLoc=mysql_query($sqlTotProc);
			if (mysql_num_rows($qryTotLoc)>0){
				$qryUpdLoc=mysql_query("UPDATE vtiger_localizadores SET procesado=1 WHERE localizadoresid=".$idLoc);
			}
			$cont++;
		}
	}
	if ($cont>0){
		$link= "<a href='index.php?module=Boletos&view=List'>Actualizar Lista</a>";		
		echo "Se han procesado todos los boletos seleccionados. $link";
	}
}

?>
