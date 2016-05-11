<?php
include_once('../config.inc.php');   
$con = mysql_connect($dbconfig['db_server'],$dbconfig['db_username'],$dbconfig['db_password']);
$db  = mysql_select_db($dbconfig['db_name']);

function fecha_mysql($fecha){
	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	return $lafecha;
}

?>
