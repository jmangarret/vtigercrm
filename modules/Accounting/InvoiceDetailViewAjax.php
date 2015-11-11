<?php
/*+********************************************************************************
   * The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
   *********************************************************************************/

require_once('include/logging.php');
require_once('include/database/PearDatabase.php');
require_once('modules/Accounting/Accounting.php');
global $adb;


$local_log =& LoggerManager::getLogger('InvoiceAjax');

$modObj = CRMEntity::getInstance("Invoice");

$ajaxaction = $_REQUEST["ajxaction"];
if($ajaxaction == "DETAILVIEW")
{
	$crmid = $_REQUEST["recordid"];
//	$tablename = $_REQUEST["tableName"];
	$fieldname = $_REQUEST["fldName"];
	$fieldvalue = utf8RawUrlDecode($_REQUEST["fieldValue"]);

	if($crmid != "")
	{
		if (__checkInvoice($crmid) == true) {
			$modObj->retrieve_entity_info($crmid,"Invoice");
			$modObj->column_fields[$fieldname] = $fieldvalue;
			$modObj->id = $crmid;
			$modObj->mode = "edit";
			$modObj->save("Invoice");
			//die(print_r($modObj->column_fields, true));
			if($modObj->id != "")
			{
			//	echo ":#:SUCCESS";
			}else
			{
			//	echo ":#:FAILURE";
			}
		}
	}else
	{
		//echo ":#:FAILURE";
	}
}
?>