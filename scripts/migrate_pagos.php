<?php
$server="localhost";
//$db="vtigercrm530";
$db="vtigercrm600";
//$user="vtigercrm";
$user="root";
//$pass="AvzHricg4ejxA";
$pass="ip15x0";
$port="3306";

$conex=mysql_connect($server, $user, $pass) or die ("Error en conexion...");
$data=mysql_select_db($db) or die ("Error en seleccion de bd... ". $db . "Usuario: " . $user);

//VACIAMOS TABLA PAGOS
mysql_query("delete from vtiger_pagos");
mysql_query("delete from vtiger_pagoscf");
//CONSULTAMOS PAGOS
$sqlAccountingPayments ="select idpayment, idtransaction, amount, paymentdate, paid, paymentduedate, associnv,ref, paymentmethod, tax";
$sqlAccountingPayments.=" from vtiger_accounting_payments";
$qry1=mysql_query($sqlAccountingPayments);
echo $sqlAccountingPayments;
echo "<pre>";
var_dump(mysql_fetch_array($qry1));
while ($payments=mysql_fetch_array($qry1)){
	$cont++;
	$idpayment=$payments["idpayment"];
	$accontingid=$payments["idtransaction"];
	$amount=$payments["amount"];
	$pdate=$payments["paymentdate"];
	$paid=$payments["paid"];
	$pduedate=$payments["paymentduedate"];
	$associnv=$payments["associnv"];
	$ref=$payments["ref"];
	$method=$payments["paymentmethod"];
	$tax=$payments["tax"];
	//INSERTAMOS NUEVOS PAGOS
	$sqlp="insert into vtiger_pagos values($idpayment,$accontingid, '$ref', '$method', $amount, $tax, '$pdate', '$pduedate', '$associnv', $paid, '','')";	
	$qry2=mysql_query($sqlp);
	
	//ACTUALIZAMOS PAGOSCF
	if (mysql_affected_rows()>0){
		$qrymax=mysql_query("select MAX(pagosid) from vtiger_pagos");
		$idmax=mysql_fetch_row($qrymax);
		$idpago=$idmax[0];
		mysql_query("insert into vtiger_pagoscf values ($idpago)");
		//VERIFICAMOS SI EXISTE EL REGISTRO DE AUDITORIA
		$sql1="select * from vtiger_crmentity where crmid=$idpayment";
		$qrycrm=mysql_query($sql1);
		if (mysql_num_rows($qrycrm)==0){
		   $sql2="select * from vtiger_crmentity where crmid=$accontingid";
		   $qry2=mysql_query($sql2);			
		   $row2=mysql_fetch_row($qry2);			
		   $sql3 ="insert into vtiger_crmentity values ";
		   $sql3.= "($idpayment,$row2[1],$row2[2],$row2[3],'$row2[4]','$row2[5]','$row2[6]','$row2[7]','$row2[8]',";
		   $sql3.= "'$row2[9]',$row2[10],$row2[11],$row2[12],'$row2[13]')";
		   mysql_query($sql3);
		   
		}
		//FIN VERIFICACION AUDITORIA	
		$ins++;
		
	}else{
		echo "<h3>Error al procesar payment id $idpayment ". mysql_error(). $sqlp." </h3>";
	}
	
}
echo "<h2 align='center'>$cont Pagos leidos, $ins Procesados para bd $db.</h2>";


//consulta de transferencias entre bancos
$sqlBancos ="select accountingid, cf_694 as bcoreceptor1, cf_696 as bcoreceptor2, cf_697 as bcoemisor1, cf_698 as bcoemisor2";
$sqlBancos.=" from vtiger_accountingcf";
$qry3=mysql_query($sqlBancos);
while ($pagos=mysql_fetch_array($qry3)){
	$idaco=	$pagos["accountingid"];
	$bcor1=$pagos["bcoreceptor1"];
	$bcor2=$pagos["bcoreceptor2"];
	$bcoe1=$pagos["bcoemisor1"];	
	$bcoe2=$pagos["bcoemisor2"];
	$sqlpagos="select * from vtiger_pagos where accountingid=$idaco";
	$qry4=mysql_query($sqlpagos);
	$vueltas=0;
	while ($p=mysql_fetch_array($qry4)){
		$vueltas++;
		$idpago=$p["pagosid"];
		if ($vueltas==1){
			$updPagos ="update vtiger_pagos set pagosbancoemisor='$bcoe1', pagosbancoreceptor='$bcor1' ";
			$updPagos.=" where pagosid=$idpago; ";
		}
		if ($vueltas==2){
			$updPagos ="update vtiger_pagos set pagosbancoemisor='$bcoe2', pagosbancoreceptor='$bcor2' ";
			$updPagos.=" where pagosid=$idpago; ";
		}		
		mysql_query($updPagos);
		if (mysql_affected_rows()>0){
			$upds++;		
		}
	}
	
}
	echo "<h2 align='center'>$upds Pagos actualizados con sus bancos...</h2>";
?>
