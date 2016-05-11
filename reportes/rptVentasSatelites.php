<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Tickets Satelites</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
include("librerias.php");
?>
</head>
<body>
	<div align="center"><h3>Tickets Satelites</h3>
	<div id="container">
	<table border=1>
	<form>
		<?
		include("conexion.php");
		$options="";
		$sqlOrg="SELECT DISTINCT org_rif, org_name from osticket1911.ost_crm";
		$qryOrg=mysql_query($sqlOrg);
		while ($rowOrg=mysql_fetch_row($qryOrg)){
			$rif=$rowOrg[0];
			$sat=$rowOrg[1];
			$options.="<option value='$sat'>$sat</option>";
		}
		?>
		<tr><th>Satelite: <select name="org"><option value="">-- Seleccione --</option><?=$options?></select>
		<tr><th>Desde: <input id="date1" type="text" name="desde" value="<?=$_REQUEST['desde']?>">
		<tr><th>Hasta: <input id="date2" type="text" name="hasta" value="<?=$_REQUEST['hasta']?>">
		<tr><th><input type="submit" Value="Consultar"> <input type="button" value="Cancelar" onclick="location.href='rptVentasSatelites.php'">
 		<script type="text/javascript">
            $(document).ready(function () {                
                $('#date1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            	$('#date2').datepicker({
                    format: "dd/mm/yyyy"
                });  
            });
        </script>
	</form>
	</table>	
	</div>
	<?
	date_default_timezone_set("America/Caracas");
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
	
	$sql = "select ticket_number as Ticket, org_name as Satelite, localizador as LOC, gds as GDS, ticket_creado as Fecha, ";
	$sql.= "paymentmethod as FormaPago, asesor as Asesora, localizador_status as Status_LOC ";
	$sql.= "from osticket1911.ost_crm where ticket_status_id=3 ";
	//POR ORG
	if ($_REQUEST['org'])
		$sql.=" AND org_name='".$_REQUEST['org']."' ";
	//POR FECHA
	if ($_REQUEST['desde'] && $_REQUEST['hasta']){
		$f1=fecha_mysql($_REQUEST['desde']);
		$f2=fecha_mysql($_REQUEST['hasta']);
		$sql.= "and CAST(ticket_creado AS DATE)>= '".$f1."' AND CAST(ticket_creado AS DATE)<='".$f2."' ";	
		echo "<div align=center><strong>Mostrando: ".$_REQUEST['org']." Desde el ".$_REQUEST['desde']." Hasta el ".$_REQUEST['hasta']."</strong></div>";
	}else{
		echo "<div align=center><strong>Mostrando: ".$_REQUEST['org']." Todos los Registros...</strong></div>";
	}	
	$sql.= "order by ticket_number, org_name";
	//echo $sql;
	$res = mysql_query($sql);
	$prg->mysql_resource = $res;	
	$prg->title = "Listado de Ventas";
	$prg->generateReport();
	
	?>
</body>
</html>
