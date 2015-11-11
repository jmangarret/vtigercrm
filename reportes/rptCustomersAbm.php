<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Reportes ABM 2015</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<div align="center"><h3>Listado de Ventas SOTO 2015</h3>
	<?
	include_once("phpReportGenOdbc.php");
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
	
	$conn = odbc_connect('datasourcename', 'sa', 'ECUADOR');
	$rsSQLS = odbc_exec($conn,"SELECT TOP 100 * FROM Customer ORDER BY CustomerId DESC");											
	//$result = odbc_fetch_array($rsSQLS);	
	//$res = mysql_query($sql);
	$prg->odbc_resource = $rsSQLS;	
	$prg->title = "Listado de Customers ABM";
	$prg->generateReport();	
	?>
</body>
</html>
