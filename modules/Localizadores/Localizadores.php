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

class Localizadores extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_localizadores';
	var $table_index= 'localizadoresid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_localizadorescf', 'localizadoresid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_localizadores', 'vtiger_localizadorescf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_localizadores' => 'localizadoresid',
		'vtiger_localizadorescf'=>'localizadoresid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = array (
		'LBL_REGISTRODEVENTASID' => array('localizadores', 'registrodeventasid'),
		'LBL_LOCALIZADOR' => array('localizadores', 'localizador'),
		'LBL_CONTACTOID' => array('localizadores', 'contactoid'),
		'LBL_GDS' => array('localizadores', 'gds'),		
		'LBL_PROCESADO' => array('localizadores', 'procesado'),

);
	var $list_fields_name = array (
		'LBL_REGISTRODEVENTASID' => 'registrodeventasid',
		'LBL_LOCALIZADOR' => 'localizador',
		'LBL_CONTACTOID' => 'contactoid',
		'LBL_GDS' => 'gds',		
		'LBL_PROCESADO' => 'procesado',

);

	// Make the field link to detail view
	var $list_link_field = 'localizador';

	// For Popup listview and UI type support
	var $search_fields = array (
		'LBL_PAYMENTMETHOD' => array('localizadores', 'paymentmethod'),
		'LBL_STATUS' => array('localizadores', 'status'),
		'LBL_PROCESADO' => array('localizadores', 'procesado'),
		'LBL_GDS' => array('localizadores', 'gds'),
		'LBL_LOCALIZADOR' => array('localizadores', 'localizador'),
		'LBL_CONTACTOID' => array('localizadores', 'contactoid'),

);
	var $search_fields_name = array (
		'LBL_PAYMENTMETHOD' => 'paymentmethod',
		'LBL_STATUS' => 'status',
		'LBL_PROCESADO' => 'procesado',
		'LBL_GDS' => 'gds',
		'LBL_LOCALIZADOR' => 'localizador',
		'LBL_CONTACTOID' => 'contactoid',

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

	function Localizadores() {
		$this->log =LoggerManager::getLogger('Localizadores');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('Localizadores');
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