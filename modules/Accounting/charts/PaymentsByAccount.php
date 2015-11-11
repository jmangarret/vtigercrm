<?php

require_once("include/utils/CommonUtils.php");
require_once("modules/Accounting/AccountingUtils.php");

$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$groupby = $_REQUEST['groupby'];

$account = $_REQUEST['accountid'];


$sql = "SELECT vtiger_account.accountname, vtiger_accounting_payments.paid, vtiger_accounting.accountingcurrency, vtiger_accounting_payments.amount,vtiger_accounting_payments.paymentduedate,vtiger_accounting_payments.paymentdate ".
			"FROM vtiger_accounting ".
				"INNER JOIN vtiger_accounting_payments ".
					"ON vtiger_accounting_payments.idtransaction=vtiger_accounting.accountingid ".
				"INNER JOIN vtiger_crmentity ".
					"ON vtiger_crmentity.crmid=vtiger_accounting_payments.idtransaction ".
				"INNER JOIN vtiger_account ".
					"ON vtiger_account.accountid = vtiger_accounting.accountingrelated1 ".
			"WHERE ".
				"vtiger_crmentity.deleted=0 AND ".
				"vtiger_accounting.accountingtype='Income' AND ".
				"vtiger_accounting_payments.paymentduedate BETWEEN ? and ? ".
				"ORDER BY vtiger_account.accountname, vtiger_accounting_payments.paid,vtiger_accounting.accountingcurrency";

/* $sql = "SELECT vtiger_account.accountname, vtiger_accounting.accountingcurrency, vtiger_accounting_payments.amount ".
			"Sum(CASE WHEN (vtiger_accounting_payments.paid = 0) then vtiger_accounting_payments.amount else 0 end) AS oustanding, ".
			"Sum(CASE WHEN (vtiger_accounting_payments.paid = 1) then vtiger_accounting_payments.amount else 0 end) AS paid ".
		  		"FROM vtiger_accounting ".
		        	"INNER JOIN vtiger_accounting_payments ".
		       		   "ON vtiger_accounting_payments.idtransaction=vtiger_accounting.accountingid ".
		        	"INNER JOIN vtiger_crmentity ".
		          		"ON vtiger_crmentity.crmid=vtiger_accounting_payments.idtransaction ".
		        	"INNER JOIN vtiger_account ".
		          		"ON vtiger_account.accountid = vtiger_accounting.accountingrelated1 ".
		  		"WHERE ".
		    		"vtiger_crmentity.deleted=0 AND ".
		    		"vtiger_accounting.accountingtype='Income' AND ".
		    		"vtiger_accounting_payments.paymentduedate BETWEEN ? and ? ".
		  		"GROUP BY vtiger_account.accountid ".
		  		"ORDER BY vtiger_account.accountname";
*/


global $adb, $current_user;
$sql_currency = "SELECT id, conversion_rate, currency_code FROM vtiger_currency_info";

$currencies = array();
$result = $adb->pquery($sql_currency, array());

$default_currency = "";
while ( $row = $adb->fetchByAssoc($result)){
	if($row['id'] == $current_user->currency_id) {
		$default_currency = $row['currency_code'];
	}
	$currencies[$row['currency_code']] = $row['conversion_rate'];
}

$result = $adb->pquery($sql, array($start_date, $end_date));
$nPayments = $adb->num_rows($result);

$payments['parameters']['default_currency'] = $default_currency;

while ( $row = $adb->fetchByAssoc($result)){
	if (isset($currencies[$row['accountingcurrency']])) {
		$row['amount'] /= $currencies[$row['accountingcurrency']];
	}

	if($row['paid'] == '1') {
		$payments['payments'][$row['accountname']]['paid'] += $row['amount'];
	} else {
		$diffdays = diff_date_today($row['paymentduedate']);
		if($diffdays > 0) {
			$payments['payments'][$row['accountname']]['unpaid'] += $row['amount'];
		} else {
			$payments['payments'][$row['accountname']]['pending'] += $row['amount'];
		}
	}

//	$payments[$row['accountname']] = $row;
}

echo json_encode($payments);


?>