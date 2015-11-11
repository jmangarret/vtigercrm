<?php

global $current_user;

$module=$_REQUEST['relatedMod'];
$id=$_REQUEST['relatedId'];

require_once("modules/$module/$module.php");

$focus = new $module();
$focus->id=$id;
$focus->retrieve_entity_info($id, $module);
$totalamount = $focus->column_fields['hdnGrandTotal'];

$accountid = "";
$accountname = "";
$accountname_fld = "";
$duedate = "";
$date_format = $current_user->date_format;
$date_format = $current_user->date_format;
$date_format = str_replace("yyyy", "Y", $date_format);
$date_format = str_replace("mm", "m", $date_format);
$date_format = str_replace("dd", "d", $date_format);


if ($module == "Invoice" || $module == "SalesOrder") {
	$module_rel = "Accounts";
	$accountid = $focus->column_fields['account_id'];
	$accountid = $accountid == "0" ? "" : $accountid;

	// -> AX: B2C
	if ($accountid == "") {
		$module_rel = "Contacts";
		$accountid = $focus->column_fields['contact_id'];
		$accountid = $accountid == "0" ? "" : $accountid;

		if ($accountid != "") {
			require_once("modules/$module_rel/$module_rel.php");
			$focus = new $module_rel();
			$focus->id=$accountid;
			$focus->retrieve_entity_info($accountid, $module_rel);
			$accountname = $focus->column_fields['lastname']." ".$focus->column_fields['firstname'];
		}
	} else {
		require_once("modules/$module_rel/$module_rel.php");
		if ($accountid != "") {
			$focus = new $module_rel();
			$focus->id=$accountid;
			$focus->retrieve_entity_info($accountid, $module_rel);
			$accountname = $focus->column_fields['accountname'];
		}
	}

	$module_rel2 = $module;
	require_once("modules/$module_rel2/$module_rel2.php");
	$focus = new $module_rel2();
	$focus->id=$id;
	$focus->retrieve_entity_info($id, $module_rel2);
	$duedate = $focus->column_fields['duedate'];

//	print_r($focus->column_fields);exit;
	if ($duedate != "") {
		$duedate = explode("-", $duedate);
		$duedate = date($date_format, mktime(0, 0, 0, (int)$duedate[1], (int)$duedate[2], (int)$duedate[0]));
	}
} else if ($module == "PurchaseOrder") {
	$module_rel = "Vendors";
	$accountid = $focus->column_fields['vendor_id'];
	$accountid = $accountid == "0" ? "" : $accountid;
	$accountname_fld = "vendorname";
	$duedate = $focus->column_fields['duedate'];
	if ($duedate != "") {
		$duedate = explode("-", $duedate);
		$duedate = date($date_format, mktime(0, 0, 0, (int)$duedate[1], (int)$duedate[2], (int)$duedate[0]));
	}

	if ($accountid != "") {
		require_once("modules/$module_rel/$module_rel.php");
		$focus = new $module_rel();
		$focus->id=$accountid;
		$focus->retrieve_entity_info($accountid, $module_rel);
		$accountname = $focus->column_fields[$accountname_fld];
	}
}

include ("modules/Accounting/Accounting.php");
$config = Accounting::loadConfigParams();
$totalamount = round($totalamount, $config['decimals']);
echo "$totalamount$$$$accountid$$$$accountname$$$$module_rel$$$$duedate$$$";

?>