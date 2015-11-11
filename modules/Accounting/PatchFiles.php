<?php

global $vtiger_current_version;

$restore = $_REQUEST["restore"];

$path = "modules/Accounting/files/".str_replace(".", "", $vtiger_current_version)."/";

if ($vtiger_current_version != "5.2.1") {
	die ("There isn't any patch for this vtiger version");
	return;
}

if ($restore != "true") {
	@rename("modules/Invoice/Invoice.php", "modules/Invoice/Invoice.php.bk");
	@rename("modules/PurchaseOrder/PurchaseOrder.php", "modules/PurchaseOrder/PurchaseOrder.php.bk");
	@rename("modules/SalesOrder/SalesOrder.php", "modules/SalesOrder/SalesOrder.php.bk");
	@rename("modules/Accounts/Accounts.php", "modules/Accounts/Accounts.php.bk");
	@rename("modules/Contacts/Contacts.php", "modules/Contacts/Contacts.php.bk");
	@rename("modules/Vendors/Vendors.php", "modules/Vendors/Vendors.php.bk");
	@rename("modules/Leads/Leads.php", "modules/Leads/Leads.php.bk");
	@rename("include/ListView/RelatedListViewContents.php", "include/ListView/RelatedListViewContents.php.bk");


	@copy($path."Invoice.php", "modules/Invoice/Invoice.php");
	@copy($path."PurchaseOrder.php", "modules/PurchaseOrder/PurchaseOrder.php");
	@copy($path."SalesOrder.php", "modules/SalesOrder/SalesOrder.php");
	@copy($path."Accounts.php", "modules/Accounts/Accounts.php");
	@copy($path."Contacts.php", "modules/Contacts/Contacts.php");
	@copy($path."Vendors.php", "modules/Vendors/Vendors.php");
	@copy($path."Leads.php", "modules/Leads/Leads.php");
	@copy($path."RelatedListViewContents.php", "include/ListView/RelatedListViewContents.php");
} else {
	@copy("modules/Invoice/Invoice.php.bk", "modules/Invoice/Invoice.php");
	@copy("modules/PurchaseOrder/PurchaseOrder.php.bk", "modules/PurchaseOrder/PurchaseOrder.php");
	@copy("modules/SalesOrder/SalesOrder.php.bk", "modules/SalesOrder/SalesOrder.php");
	@copy("modules/Accounts/Accounts.php.bk", "modules/Accounts/Accounts.php");
	@copy("modules/Contacts/Contacts.php.bk", "modules/Contacts/Contacts.php");
	@copy("modules/Vendors/Vendors.php.bk", "modules/Vendors/Vendors.php");
	@copy("modules/Leads/Leads.php.bk", "modules/Leads/Leads.php");
	@copy("include/ListView/RelatedListViewContents.php.bk", "include/ListView/RelatedListViewContents.php");
}

echo "All files were patched. There is a backup copy of files in each folder";

?>