<?
include("../../config.inc.php");
$user=$dbconfig['db_username'];
$pass=$dbconfig['db_password'];
$bd=$dbconfig['db_name'];
mysql_connect("localhost",$user,$pass);
mysql_select_db($bd);
$ref= $_GET["ref"];
$ref=substr($ref, -5);
$sql ="select registrodepagosid, registrodeventasid, bancoemisor, paymentmethod, fechapago ";
$sql.="from vtiger_registrodepagos";
$sql.=" where referencia like '%".$ref."'";
$res = mysql_query($sql);
if($res)
if (mysql_num_rows($res)>0){
	$row=mysql_fetch_row($res);
	$pago= "<a target='_blank' href='index.php?module=RegistroDePagos&view=Detail&record=".$row[0]."'>".$row[0]."</a>";
	$venta="<a target='_blank' href='index.php?module=RegistroDeVentas&view=Detail&record=".$row[1]."'>".$row[1]."</a>";
	$banco=$row[2];
	$metodo=$row[3];
	$fpago=new DateTime($row[4]);
	echo "El Num. de Referencia parece coincidir con un(a) $metodo del Pago: $pago, Registro de Venta: $venta, por el banco $banco del dia ".date_format($fpago,"d/m/Y");
}

?>
