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

class TiposdeComisiones extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_tiposdecomisiones';
	var $table_index= 'tiposdecomisionesid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_tiposdecomisionescf', 'tiposdecomisionesid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_tiposdecomisiones', 'vtiger_tiposdecomisionescf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_tiposdecomisiones' => 'tiposdecomisionesid',
		'vtiger_tiposdecomisionescf'=>'tiposdecomisionesid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		'LBL_CODIGO' => array('tiposdecomisiones', 'codigo'),		
		'LBL_GDS' => array('tiposdecomisiones', 'gds'),		
		'LBL_NOMBRE' => array('tiposdecomisiones', 'nombre'),
		'LBL_TIPODEVUELO' => array('tiposdecomisiones', 'tipodevuelo'),
		'LBL_TIPODETRANSACCION' => array('tiposdecomisiones', 'tipotransaccion'),
		'LBL_TIPODEUSUARIO' => array('tiposdecomisiones', 'tipousuario'),
	);
	var $list_fields_name = Array (
		'LBL_CODIGO' => 'codigo',	
		'LBL_GDS' => 'gds',	
		'LBL_NOMBRE' => 'nombre',	
		'LBL_TIPODEVUELO' => 'tipodevuelo',	
		'LBL_TIPODETRANSACCION' => 'tipotransaccion',	
		'LBL_TIPODEUSUARIO' => 'tipousuario',	

	);

	// Make the field link to detail view
	var $list_link_field = 'nombre';

	// For Popup listview and UI type support
	var $search_fields = Array(
		'LBL_CODIGO' => array('tiposdecomisiones', 'codigo'),		
		'LBL_GDS' => array('tiposdecomisiones', 'gds'),		
		'LBL_NOMBRE' => array('tiposdecomisiones', 'nombre'),
		'LBL_TIPODEVUELO' => array('tiposdecomisiones', 'tipodevuelo'),
		'LBL_TIPODETRANSACCION' => array('tiposdecomisiones', 'tipotransaccion'),
		'LBL_TIPODEUSUARIO' => array('tiposdecomisiones', 'tipousuario'),
	);
	var $search_fields_name = Array (
		'LBL_CODIGO' => 'codigo',	
		'LBL_GDS' => 'gds',	
		'LBL_NOMBRE' => 'nombre',
		'LBL_TIPODEVUELO' => 'tipodevuelo',	
		'LBL_TIPODETRANSACCION' => 'tipotransaccion',	
		'LBL_TIPODEUSUARIO' => 'tipousuario',	

	);

	// For Popup window record selection
	var $popup_fields = Array ('nombre');

	// For Alphabetical search
	var $def_basicsearch_col = 'nombre';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'nombre';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('nombre','assigned_user_id');

	var $default_order_by = 'nombre';
	var $default_sort_order='ASC';

	function TiposdeComisiones() {
		$this->log =LoggerManager::getLogger('TiposdeComisiones');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('TiposdeComisiones');
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