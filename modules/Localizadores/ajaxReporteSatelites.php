<?php 
include("../../config.inc.php");
$user=$dbconfig['db_username'];
$pass=$dbconfig['db_password'];
$bd=$dbconfig['db_name'];
mysql_connect("localhost",$user,$pass);
mysql_select_db($bd);


///RESPONSE LISTAR RESULTADOS DE LA BUSQUEDA
if ($_REQUEST["accion"]=="listarBusqueda"){
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
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="paymentmethod">Forma de Pago&nbsp;&nbsp;</a>
			</th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="procesado">Procesado&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="gds">Sistema GDS&nbsp;&nbsp;</a></th>
			<th nowrap  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="totalloc">Total LOC&nbsp;&nbsp;</a></th>
			<th nowrap  colspan="2"  class="wide"><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="registrodeventasid">Registro de Venta&nbsp;&nbsp;</a></th>
		</tr>
	</thead>

	<tr class="listViewEntries" data-id='12726' data-recordUrl='index.php?module=Localizadores&view=Detail&record=12726' id="Localizadores_listView_row_1">
		<td  width="5%" class="wide"><input type="checkbox" value="12726" class="listViewEntriesCheckBox"/></td>
		<td class="listViewEntryValue wide" data-field-type="string" data-field-name="localizador" nowrap></td>
		<td class="listViewEntryValue wide" data-field-type="reference" data-field-name="contactoid" nowrap>
			<a href='?module=Contacts&view=Detail&record=12672' title='Contactos'>GLADYS CARDENAS</a></td>
		<td class="listViewEntryValue wide" data-field-type="picklist" data-field-name="paymentmethod" nowrap>Transferencia</td>
		<td class="listViewEntryValue wide" data-field-type="boolean" data-field-name="procesado" nowrap>yes</td>
		<td class="listViewEntryValue wide" data-field-type="picklist" data-field-name="gds" nowrap>Amadeus</td>
		<td class="listViewEntryValue wide" data-field-type="double" data-field-name="totalloc" nowrap><span align='right'>312000.000</div></td>
		<td class="listViewEntryValue wide" data-field-type="reference" data-field-name="registrodeventasid" nowrap>
			<a href='?module=RegistroDeVentas&view=Detail&record=12730' title='Registro De Ventas'>VEN02712</a></td>
		<td nowrap class="wide">
			<div class="actions pull-right"><span class="actionImages">
			<a href="index.php?module=Localizadores&view=Detail&record=12726&mode=showDetailViewByMode&requestMode=full">
				<i title="Complete Details" class="icon-th-list alignMiddle"></i></a>&nbsp;
			<a href='index.php?module=Localizadores&view=Edit&record=12726'>
				<i title="Editar" class="icon-pencil alignMiddle"></i></a>&nbsp;
				<a class="deleteRecordButton"><i title="Eliminar" class="icon-trash alignMiddle"></i></a></span>
			</div>
		</td>
	</tr>


	
	</table>	
</div>
<?php 	
}
///FIN RESPONSE LISTAR RESULTADOS DE LA BUSQUEDA
?>
		