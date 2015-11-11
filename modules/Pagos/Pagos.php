<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class Pagos extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_pagos';
	var $table_index= 'pagosid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_pagoscf', 'pagosid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_pagos', 'vtiger_pagoscf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_pagos' => 'pagosid',
		'vtiger_pagoscf'=>'pagosid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = array (
		'LBL_ACCOUNTINGID' => array('pagos', 'accountingid'),
		'LBL_REF' => array('pagos', 'ref'),
		'LBL_PAYMENTMETHOD' => array('pagos', 'paymentmethod'),
		'LBL_PAYMENTDATE' => array('pagos', 'paymentdate'),
		'LBL_PAGOSBANCOEMISOR' => array('pagos', 'pagosbancoemisor'),
		'LBL_AMOUNT' => array('pagos', 'amount'),

);
	var $list_fields_name = array (
		'LBL_ACCOUNTINGID' => 'accountingid',
		'LBL_REF' => 'ref',
		'LBL_PAYMENTMETHOD' => 'paymentmethod',
		'LBL_PAYMENTDATE' => 'paymentdate',
		'LBL_PAGOSBANCOEMISOR' => 'pagosbancoemisor',
		'LBL_AMOUNT' => 'amount',

);

	// Make the field link to detail view
	var $list_link_field = 'accountingid';

	// For Popup listview and UI type support
	var $search_fields = array (
		'LBL_ACCOUNTINGID' => array('pagos', 'accountingid'),
		'LBL_REF' => array('pagos', 'ref'),
		'LBL_PAYMENTDATE' => array('pagos', 'paymentdate'),

);
	var $search_fields_name = array (
		'LBL_ACCOUNTINGID' => 'accountingid',
		'LBL_REF' => 'ref',
		'LBL_PAYMENTDATE' => 'paymentdate',

);

	// For Popup window record selection
	var $popup_fields = array('accountingid');

	// For Alphabetical search
	var $def_basicsearch_col = 'accountingid';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'accountingid';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = array('createdtime', 'modifiedtime', 'accountingid');

	var $default_order_by = 'accountingid';
	var $default_sort_order='ASC';

	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/
	function vtlib_handler($moduleName, $eventType) {
		global $adb;
		$module = Vtiger_Module::getInstance($moduleName);
		
 		if($eventType == 'module.postinstall') {
			// TODO Handle actions after this module is installed.
		} else if($eventType == 'module.disabled') {
			// TODO Handle actions before this module is being uninstalled.
		} else if($eventType == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
			// TODO Handle actions after this module is updated.
			
		}
 	}
}
