<?php
include_once('../../config.inc.php');   
$con = mysql_connect($dbconfig['db_server'],$dbconfig['db_username'],$dbconfig['db_password']);
$db  = mysql_select_db($dbconfig['db_name']);
$qry=mysql_query("select boleto1 from vtiger_boletos where localizadorid=".$_REQUEST["loc"]);
$cont=0;
while ($row=mysql_fetch_row($qry)){
	$cont++;
	$boletos.=$row[0]. "  ";
	
}
echo "$cont Boleto(s): ".$boletos;
?>
