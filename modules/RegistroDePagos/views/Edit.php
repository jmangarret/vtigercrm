<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class RegistroDePagos_Edit_View extends Vtiger_Edit_View {

	public function process(Vtiger_Request $request) {
	global $current_user, $adb;
	$roleid = $current_user->roleid;

	$moduleName = $request->getModule();

	$recordId = $request->get('record');
        $recordModel = $this->record;
        if(!$recordModel){
           if (!empty($recordId)) {
               $recordModel = Vtiger_Record_Model::getInstanceById($recordId, $moduleName);
           } else {
               $recordModel = Vtiger_Record_Model::getCleanInstance($moduleName);
			echo '
			<script>
			$(document).ready(function()
			{
				var f = new Date();
				var dia = f.getDate();
				var mes = f.getMonth()+1;
				var anio= f.getFullYear();
				if (dia<10) dia = "0" + dia;
				if (mes<10) mes = "0" + mes;
				var hoy= dia + "-" + mes + "-" + anio;
				$("#RegistroDePagos_editView_fieldName_fechapago").val(hoy);
				
				$("select[name=paymentmethod]").change(function () {
	     			var optionSelected = $(this).find("option:selected");
	     			var valueSelected  = optionSelected.val();	     			
	     			var textSelected   = optionSelected.text();
	     			if (valueSelected=="Efectivo"){
	     				$("select[name=bancoemisor]" > option[value="Efectivo"]).attr("selected", "selected");
	     			}
	 			});			
			
			});	
			</script>';

			//jmangarret 29jun2015 voucher mandatory para perfil satelites.
			if ($roleid=="H9"){
				echo '
				<script>
				$(document).ready(function()
				{
					$("input:file").attr("data-validation-engine", "validate[ required,funcCall[Vtiger_Base_Validator_Js.invokeValidation]]");
				});	
				</script>';
			}

           }
            $this->record = $recordModel;
        }

		$viewer = $this->getViewer($request);

		$viewer->assign('IMAGE_DETAILS', $recordModel->getImageDetails());

		parent::process($request);
	}

}
