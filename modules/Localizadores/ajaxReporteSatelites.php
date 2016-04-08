<?php 
include("../../config.inc.php");
$user=$dbconfig['db_username'];
$pass=$dbconfig['db_password'];
$bd=$dbconfig['db_name'];
mysql_connect("localhost",$user,$pass);
mysql_select_db($bd);

//SELECT SATELITE
if ($_REQUEST["accion"]=="select_satelite"){
	$query = "SELECT accountid, accountname FROM `vtiger_account` WHERE `account_type` LIKE 'Satelite' ";
	if($filtro = mysql_query($query))
		{
		    if (mysql_num_rows($filtro) > 0)
		    {
		        while ($row = mysql_fetch_array($filtro)) 
		        {	
		        	if ($row["accountname"]!=NULL) {
		        		echo"<option value=".$row["accountid"].">".$row["accountname"]."</option>";
		        	}
		        }
		    }
		}
}
//SELECT GDS
if ($_REQUEST["accion"]=="select_gds"){
	$query = "SELECT gds FROM vtiger_gds";
	if($filtro = mysql_query($query))
		{
		    if (mysql_num_rows($filtro) > 0)
		    {
		        while ($row = mysql_fetch_array($filtro)) 
		        {	
		        	if ($row["gds"]!=NULL) {
		        	echo"<option>".$row["gds"]."</option>";
		        	}
		        }
		    }
		}
}
//SELECT ESTATUS
if ($_REQUEST["accion"]=="select_status"){
	$query = "SELECT DISTINCT status FROM vtiger_boletos";
	if($filtro = mysql_query($query))
		{
		    if (mysql_num_rows($filtro) > 0)
		    {
		        while ($row = mysql_fetch_array($filtro)) 
		        {	
		        	if ($row["status"]!=NULL) {
		        		 echo"<option>".$row["status"]."</option>";
		        	}
		        }
		    }
		}
}

///RESPONSE LISTAR RESULTADOS DE LA BUSQUEDA
if ($_REQUEST["accion"]=="listarBusqueda"){

	
if ($_REQUEST["proc"])	$p = "1";
if (!$_REQUEST["proc"])	$p = "0";

if ($_REQUEST["satelite"]!=""){
	$query="SELECT loc.localizadoresid,loc.localizador, con.contactid, con.firstname, con.lastname, loc.paymentmethod, loc.registrodeventasid, loc.procesado, loc.gds, bol.monto_base, bol.fecha_emision, bol.boleto1, bol.status
	FROM vtiger_account AS acc 
	INNER JOIN vtiger_contactdetails AS con ON acc.accountid=con.accountid 
	INNER JOIN vtiger_localizadores AS loc ON loc.contactoid=con.contactid 
	INNER JOIN vtiger_boletos AS bol ON bol.localizadorid=loc.localizadoresid 
	WHERE procesado=".$_REQUEST['proc']." AND acc.accountid='".$_REQUEST["satelite"]."' ";
	if ($_REQUEST["gds"])
		$query.=" AND loc.gds= '".$_REQUEST["gds"]."' ";
	if ($_REQUEST["fecha_desde"] && $_REQUEST["fecha_hasta"])
		$query.=" AND bol.fecha_emision BETWEEN '".$_REQUEST["fecha_desde"]."' AND '".$_REQUEST["fecha_hasta"]."' ";
	if ($_REQUEST["localizador"])
		$query.=" AND loc.localizador = '".$_REQUEST["localizador"]."' ";
	if ($_REQUEST["boleto"])
		$query.=" AND bol.boleto1 = '".$_REQUEST["boleto"]."' ";
	if ($_REQUEST["estatus"])
		$query.=" AND bol.status = '".$_REQUEST["estatus"]."' ";
	$query.=" ORDER BY loc.gds, bol.fecha_emision ASC ";
}else{
	$else = 1;
	$query="SELECT loc.localizadoresid,loc.localizador, loc.contactoid, loc.paymentmethod, loc.registrodeventasid, loc.procesado, loc.gds, bol.monto_base, bol.fecha_emision, bol.boleto1, bol.status
	FROM vtiger_localizadores AS loc 
	INNER JOIN vtiger_boletos AS bol ON bol.localizadorid=loc.localizadoresid 
	WHERE procesado=".$_REQUEST['proc'];
	if ($_REQUEST["gds"])
		$query.=" AND loc.gds= '".$_REQUEST["gds"]."' ";
	if ($_REQUEST["fecha_desde"] && $_REQUEST["fecha_hasta"])
		$query.=" AND bol.fecha_emision BETWEEN '".$_REQUEST["fecha_desde"]."' AND '".$_REQUEST["fecha_hasta"]."' ";
	if ($_REQUEST["localizador"])
		$query.=" AND loc.localizador = '".$_REQUEST["localizador"]."' ";
	if ($_REQUEST["boleto"])
		$query.=" AND bol.boleto1 = '".$_REQUEST["boleto"]."' ";
	if ($_REQUEST["estatus"])
		$query.=" AND bol.status = '".$_REQUEST["estatus"]."' ";
	$query.=" ORDER BY loc.gds, bol.fecha_emision ASC ";
}


?>
<div class="bottomscroll-div">
		<input type="hidden" value="" id="orderBy">
		<input type="hidden" value="" id="sortOrder">
		<span class="listViewLoadingImageBlock hide modal noprint" id="loadingListViewModal">
			<img class="listViewLoadingImage" src="layouts/vlayout/skins/softed/images/loading.gif" alt="no-image" title="Cargando..."/>
			<p class="listViewLoadingMsg">Cargando, por favor espera.........</p>
		</span>

	<table class="table table-bordered listViewEntriesTable">
		<thead>
		<tr class="listViewHeaders">
			<th width="5%" class="wide">
			<input type="checkbox" id="listViewEntriesMainCheckBox" /></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="localizador">Localizador&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="contactoid">Contacto&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="boleto1">Nº de Boletos&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="fecha_emision">Fecha de Emisión&nbsp;&nbsp;</a></th>			
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="paymentmethod">Forma de Pago&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="procesado">Procesado&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="gds">Sistema GDS&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="status">Estatus&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="monto_base">Tarifa&nbsp;&nbsp;</a></th>
			<th nowrap  colspan="2"  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="registrodeventasid">Registro de Venta&nbsp;&nbsp;</a></th>

		</tr>
	</thead>
<?php

if($filtro = mysql_query($query))
		{
		    if (mysql_num_rows($filtro) > 0)
		    {
		        while ($row = mysql_fetch_array($filtro)) 
		        {	
		        	$orig_fecha_emision=strtotime($row["fecha_emision"]);
		        	$format_fecha_emision=date("d-m-Y",$orig_fecha_emision);
		        	$query2="SELECT registrodeventasname FROM vtiger_registrodeventas WHERE registrodeventasid = '".$row["registrodeventasid"]."'";
		        	$resultado = mysql_query($query2);
		        	$registro_de_venta = mysql_fetch_assoc($resultado);
		        	if (isset($else)) {
		        		$query3="SELECT firstname, lastname FROM vtiger_contactdetails WHERE contactid = '".$row["contactoid"]."'";
			        	$resultado = mysql_query($query3);
			        	$nombre = mysql_fetch_assoc($resultado);
		        	}
		        	

?>
	<tr class="listViewEntries" data-id='<?=$row["localizadoresid"]?>' data-recordUrl='index.php?module=Localizadores&view=Detail&record=<?=$row["localizadoresid"]?>' id="Localizadores_listView_row_1">
		<td  width="5%" class="wide"><input type="checkbox" value="<?=$row["localizadoresid"]?>" class="listViewEntriesCheckBox"/></td>
		<td class="listViewEntryValue wide" data-field-type="string" data-field-name="localizador" nowrap><?=$row["localizador"]?></td>
		<td class="listViewEntryValue wide" data-field-type="reference" data-field-name="contactoid" nowrap>
		<?php
			if ($else==1) {
		        $query3="SELECT firstname, lastname FROM vtiger_contactdetails WHERE contactid = '".$row["contactoid"]."'";
			    $resultado = mysql_query($query3);
			    $nombre = mysql_fetch_assoc($resultado);		    
		?>
		<a href='?module=Contacts&view=Detail&record=<?=$row["contactid"]?>' title='Contactos'><?=$nombre["firstname"]." ".$nombre["lastname"]?></a></td>
		<?php
			}else{			
		?>
		<a href='?module=Contacts&view=Detail&record=<?=$row["contactid"]?>' title='Contactos'><?=$row["firstname"]." ".$row["lastname"]?></a></td>
		<?php
			}
		?>		
		<td class="listViewEntryValue wide" data-field-type="string" data-field-name="boleto1" nowrap><?=$row["boleto1"]?></td>
		<td class="listViewEntryValue wide" data-field-type="string" data-field-name="fecha_emision" nowrap><?=$format_fecha_emision?></td>
		<td class="listViewEntryValue wide" data-field-type="picklist" data-field-name="paymentmethod" nowrap><?=$row["paymentmethod"]?></td>
		<td class="listViewEntryValue wide" data-field-type="boolean" data-field-name="procesado" nowrap><?=($row["procesado"] == "0") ?  "No" : "Si"?></td>
		<td class="listViewEntryValue wide" data-field-type="picklist" data-field-name="gds" nowrap><?=$row["gds"]?></td>
		<td class="listViewEntryValue wide" data-field-type="picklist" data-field-name="status" nowrap><?=$row["status"]?></td>
		<td class="listViewEntryValue wide" data-field-type="double" data-field-name="monto_base" nowrap><span align='right'><?=$row["monto_base"]?></div></td>
		<td class="listViewEntryValue wide" data-field-type="reference" data-field-name="registrodeventasid" nowrap>
			<a href='?module=RegistroDeVentas&view=Detail&record=<?=$row["registrodeventasid"]?>' title='Registro De Ventas'><?=$registro_de_venta["registrodeventasname"]?></a></td>
		<td nowrap class="wide">
			<div class="actions pull-right"><span class="actionImages">
			<a href="index.php?module=Localizadores&view=Detail&record=<?=$row["localizadoresid"]?>&mode=showDetailViewByMode&requestMode=full">
				<i title="Complete Details" class="icon-th-list alignMiddle"></i></a>&nbsp;
			<a href='index.php?module=Localizadores&view=Edit&record=<?=$row["localizadoresid"]?>'>
				<i title="Editar" class="icon-pencil alignMiddle"></i></a>&nbsp;
				<a class="deleteRecordButton"><i title="Eliminar" class="icon-trash alignMiddle"></i></a></span>
			</div>
		</td>
	</tr>
<?php
		        }
		    }
		}else{
			echo "Error en la consulta SQL: ".mysql_error();
		}
?>
	</table>	
</div>
<?php 	
}
///FIN RESPONSE LISTAR RESULTADOS DE LA BUSQUEDA
?>
		