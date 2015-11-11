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

class RegistroDePagos extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_registrodepagos';
	var $table_index= 'registrodepagosid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_registrodepagoscf', 'registrodepagosid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_registrodepagos', 'vtiger_registrodepagoscf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_registrodepagos' => 'registrodepagosid',
		'vtiger_registrodepagoscf'=>'registrodepagosid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		'LBL_FECHAPAGO' => array('registrodepagos', 'fechapago'),
		'LBL_PAYMENTMETHOD' => array('registrodepagos', 'paymentmethod'),
		'LBL_REFERENCIA' => array('registrodepagos', 'referencia'),
		'LBL_CURRENCY' => array('registrodepagos', 'currency'),
		'LBL_AMOUNT' => array('registrodepagos', 'amount'),
		'LBL_BANCOEMISOR' => array('registrodepagos', 'bancoemisor'),
		'LBL_BANCORECEPTOR' => array('registrodepagos', 'bancoreceptor'),
		'LBL_REGISTRODEVENTASID' => array('registrodepagos', 'registrodeventasid'),


	);
	var $list_fields_name = Array (
		'LBL_FECHAPAGO' => 'fechapago',
		'LBL_PAYMENTMETHOD' => 'paymentmethod',
		'LBL_REFERENCIA' => 'referencia',
		'LBL_CURRENCY' => 'currency',
		'LBL_AMOUNT' => 'amount',
		'LBL_BANCOEMISOR' => 'bancoemisor',
		'LBL_BANCORECEPTOR' => 'bancoreceptor',
		'LBL_REGISTRODEVENTASID' => 'registrodeventasid',


	);

	// Make the field link to detail view
	var $list_link_field = 'registrodeventasid';

	// For Popup listview and UI type support
	var $search_fields = Array(
		'LBL_REFERENCIA' => array('registrodepagos', 'referencia'),
		'LBL_CURRENCY' => array('registrodepagos', 'currency'),
		'LBL_AMOUNT' => array('registrodepagos', 'amount'),
		'LBL_VOUCHER' => array('registrodepagos', 'voucher'),
		'LBL_BANCORECEPTOR' => array('registrodepagos', 'bancoreceptor'),
		'LBL_BANCOEMISOR' => array('registrodepagos', 'bancoemisor'),
		'LBL_PAYMENTMETHOD' => array('registrodepagos', 'paymentmethod'),
		'LBL_FECHAPAGO' => array('registrodepagos', 'fechapago'),
		'LBL_REGISTRODEVENTASID' => array('registrodepagos', 'registrodeventasid'),

	);
	var $search_fields_name = Array (
		'LBL_REFERENCIA' => 'referencia',
		'LBL_CURRENCY' => 'currency',
		'LBL_AMOUNT' => 'amount',
		'LBL_VOUCHER' => 'voucher',
		'LBL_BANCORECEPTOR' => 'bancoreceptor',
		'LBL_BANCOEMISOR' => 'bancoemisor',
		'LBL_PAYMENTMETHOD' => 'paymentmethod',
		'LBL_FECHAPAGO' => 'fechapago',
		'LBL_REGISTRODEVENTASID' => 'registrodeventasid',

	);

	// For Popup window record selection
	var $popup_fields = Array ('registrodeventasid');

	// For Alphabetical search
	var $def_basicsearch_col = 'registrodeventasid';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'registrodeventasid';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('registrodeventasid','assigned_user_id');

	var $default_order_by = 'registrodeventasid';
	var $default_sort_order='ASC';

	function RegistroDePagos() {
		$this->log =LoggerManager::getLogger('RegistroDePagos');
		$this->db = PearDatabase::getInstance();
		$this->column_fields = getColumnFields('RegistroDePagos');
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
	
	function get_ventas_list($id, $cur_tab_id, $rel_tab_id, $actions=false) {
		global $adb;
		$this_module = $currentModule;
        	$related_module = vtlib_getModuleNameById($rel_tab_id);
		require_once("modules/$related_module/$related_module.php");
		$other = new $related_module();
	        vtlib_setup_modulevars($related_module, $other);
		$singular_modname = vtlib_toSingular($related_module);

		$parenttab = getParentTab();

		if($singlepane_view == 'true')
			$returnset = '&return_module='.$this_module.'&return_action=DetailView&return_id='.$id;
		else
			$returnset = '&return_module='.$this_module.'&return_action=CallRelatedList&return_id='.$id;

		$button = '';

		$button .= '<input type="hidden" name="email_directing_module"><input type="hidden" name="record">';
	
		$sql="SELECT registrodeventasid FROM vtiger_registrodepagos WHERE registrodepagosid = ?";
		$result = $adb->pquery($sql, array($id));	
		$row = $adb->fetchByAssoc($result);
		$ventaid=$row["registrodeventasid"];

		$query='SELECT vtiger_crmentity.crmid,vtiger_registrodeventas.contacto, vtiger_registrodeventas.registrodeventastype, vtiger_crmentity.smownerid, vtiger_registrodeventas.registrodeventasname FROM vtiger_registrodeventas INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_registrodeventas.registrodeventasid INNER JOIN vtiger_crmentityrel ON (vtiger_crmentityrel.relcrmid = vtiger_crmentity.crmid OR vtiger_crmentityrel.crmid = vtiger_crmentity.crmid) LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid  WHERE vtiger_crmentity.deleted = 0 AND (vtiger_crmentityrel.crmid = '. $ventaid.' OR vtiger_crmentityrel.relcrmid = '.$ventaid.')  
';
//var_dump($query); exit;
		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);	
		return $return_value;
	}
}
