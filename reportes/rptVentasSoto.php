<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Ventas Soto 2015</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<div align="center"><h3>Listado de Ventas SOTO 2015</h3>
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
	$sql ="select registrodeventasname as Venta,  createdtime as Fecha, cf_879 as TipoVenta, cf_881 as TasaCambio, cf_862 as MontoTotal$, cf_867 as MontoTotalBs, cf_880 as TotalLOC ";
	$sql.="from vtiger_registrodeventas as r1 inner join vtiger_registrodeventascf as r2 ";
	$sql.=" on r1.registrodeventasid=r2.registrodeventasid ";
	$sql.=" inner join vtiger_crmentity as c on c.crmid=r2.registrodeventasid";	
	$sql.=" where setype='RegistroDeVentas' and cf_854<>'' and createdtime like '2015%'";
	$res = mysql_query($sql);
	$prg->mysql_resource = $res;
	
	$prg->title = "Listado de Ventas";
	$prg->generateReport();
	
	?>
</body>
</html>
