<?php
/***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class Boletos extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_boletos';
	var $table_index= 'boletosid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_boletoscf', 'boletosid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_boletos', 'vtiger_boletoscf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_boletos' => 'boletosid',
		'vtiger_boletoscf'=>'boletosid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = array (				
		'LBL_PASS' => array('boletos', 'passenger'),		
		'LBL_FECHA' => array('boletos', 'fecha_emision'),		
		'LBL_MONTOBASE' => array('boletos', 'monto_base'),
		'LBL_FEE' => array('boletos', 'fee'),		
		'LBL_AMOUNT' => array('boletos', 'amount'),		
		'LBL_TOTAL' => array('boletos', 'totalboletos'),		
		'LBL_CURRENCY' => array('boletos', 'currency'),
		'LBL_LOCALIZADOR' => array('boletos', 'localizadorid'),		

);
	var $list_fields_name = array (				
		'LBL_PASS' => 'passenger',		
		'LBL_FECHA' => 'fecha_emision',		
		'LBL_MONTOBASE' => 'monto_base',
		'LBL_FEE' => 'fee',		
		'LBL_AMOUNT' => 'amount',		
		'LBL_TOTAL' => 'totalboletos',		
		'LBL_CURRENCY' => 'currency',		
		'LBL_LOCALIZADOR' => 'localizadorid',		
);

	// Make the field link to detail view
	var $list_link_field = 'localizador';

	// For Popup listview and UI type support
	var $search_fields = array (
		'LBL_BOLETO6' => array('boletos', 'boleto6'),
		'LBL_CANTIDAD' => array('boletos', 'cantidad'),
		'LBL_BOLETO5' => array('boletos', 'boleto5'),
		'LBL_TIPOPASAJERO' => array('boletos', 'tipopasajero'),
		'LBL_BOLETO7' => array('boletos', 'boleto7'),
		'LBL_FEE' => array('boletos', 'fee'),
		'LBL_AMOUNT' => array('boletos', 'amount'),
		'LBL_BOLETO8' => array('boletos', 'boleto8'),
		'LBL_BOLETO4' => array('boletos', 'boleto4'),
		'LBL_CF_1605' => array('boletos', 'cf_1605'),
		'LBL_BOLETO1' => array('boletos', 'boleto1'),
		'LBL_REGISTRODEVENTASID' => array('boletos', 'registrodeventasid'),		
		'LBL_BOLETO2' => array('boletos', 'boleto2'),
		'LBL_LOCALIZADOR' => array('boletos', 'localizador'),
		'LBL_CURRENCY' => array('boletos', 'currency'),
		'LBL_BOLETO3' => array('boletos', 'boleto3'),

);
	var $search_fields_name = array (
		'LBL_BOLETO6' => 'boleto6',
		'LBL_CANTIDAD' => 'cantidad',
		'LBL_BOLETO5' => 'boleto5',
		'LBL_TIPOPASAJERO' => 'tipopasajero',
		'LBL_BOLETO7' => 'boleto7',
		'LBL_FEE' => 'fee',
		'LBL_AMOUNT' => 'amount',
		'LBL_BOLETO8' => 'boleto8',
		'LBL_BOLETO4' => 'boleto4',
		'LBL_CF_1605' => 'cf_1605',
		'LBL_BOLETO1' => 'boleto1',
		'LBL_REGISTRODEVENTASID' => 'registrodeventasid',		
		'LBL_BOLETO2' => 'boleto2',
		'LBL_LOCALIZADOR' => 'localizador',
		'LBL_CURRENCY' => 'currency',
		'LBL_BOLETO3' => 'boleto3',

);

	// For Popup window record selection
	var $popup_fields = array('localizador');

	// For Alphabetical search
	var $def_basicsearch_col = 'localizador';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'localizador';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = array('createdtime', 'modifiedtime', 'localizador');

	var $default_order_by = 'localizador';
	var $default_sort_order='ASC';

	function Boletos() {
		$this->log =LoggerManager::getLogger('Boletos');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('Boletos');
	}

	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/
	function vtlib_handler($moduleName, $eventType) {
 		if($eventType == 'module.postinstall') {
			//Delete duplicates from all picklist
			static::deleteDuplicatesFromAllPickLists($moduleName);
		} else if($eventType == 'module.disabled') {
			// TODO Handle actions before this module is being uninstalled.
		} else if($eventType == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
			//Delete duplicates from all picklist
			static::deleteDuplicatesFromAllPickLists($moduleName);
		}
 	}
	
	/**
	 * Delete doubloons from all pick list from module
	 */
	public static function deleteDuplicatesFromAllPickLists($moduleName)
	{
		global $adb,$log;

		$log->debug("Invoking deleteDuplicatesFromAllPickList(".$moduleName.") method ...START");

		//Deleting doubloons
		$query = "SELECT columnname FROM `vtiger_field` WHERE uitype in (15,16,33) "
				. "and tabid in (select tabid from vtiger_tab where name = '$moduleName')";
		$result = $adb->pquery($query, array());

		$a_picklists = array();
		while($row = $adb->fetchByAssoc($result))
		{
			$a_picklists[] = $row["columnname"];
		}
		
		foreach ($a_picklists as $picklist)
		{
			static::deleteDuplicatesFromPickList($picklist);
		}
		
		$log->debug("Invoking deleteDuplicatesFromAllPickList(".$moduleName.") method ...DONE");
	}
	
	public static function deleteDuplicatesFromPickList($pickListName)
	{
		global $adb,$log;
		
		$log->debug("Invoking deleteDuplicatesFromPickList(".$pickListName.") method ...START");
	
		//Deleting doubloons
		$query = "SELECT {$pickListName}id FROM vtiger_{$pickListName} GROUP BY {$pickListName}";
		$result = $adb->pquery($query, array());
	
		$a_uniqueIds = array();
		while($row = $adb->fetchByAssoc($result))
		{
			$a_uniqueIds[] = $row[$pickListName.'id'];
		}
	
		if(!empty($a_uniqueIds))
		{
			$query = "DELETE FROM vtiger_{$pickListName} WHERE {$pickListName}id NOT IN (".implode(",", $a_uniqueIds).")";
			$adb->pquery($query, array());
		}
		
		$log->debug("Invoking deleteDuplicatesFromPickList(".$pickListName.") method ...DONE");
	}
}
