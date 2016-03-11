<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Ventas Soto 2015</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<div align="center"><h3>Listado de Firmas Satelites</h3>
	<?
	include_once("phpReportGen.php");
	$prg = new phpReportGenerator();
        $prg->width = "auto";
	$prg->cellpad = "0";
	$prg->cellspace = "0";
	$prg->border = "1";
	$prg->header_color = "#666666";
	$prg->header_textcolor="#FFFFFF";
	$prg->body_alignment = "left";
	$prg->body_color = "#CCCCCC";
	$prg->body_textcolor = "black";
	$prg->surrounded = '1';

	include("conexion.php");
	$sql ="select accountname,CONCAT(firstname,'_',lastname), firmas_satelite ";	
	$sql.="from vtiger_account a inner join vtiger_contactdetails c ";
	$sql.=" where a.accountid=c.accountid and firmas_satelite<>''";
	$res = mysql_query($sql);
	$prg->mysql_resource = $res;
	
	$prg->title = "Listado de Firmas Satelites";
	$prg->generateReport();
	
	?>
</body>
</html>
