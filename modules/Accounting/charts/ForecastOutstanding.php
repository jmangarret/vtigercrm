<?php



require_once("include/utils/CommonUtils.php");

$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$groupby = $_REQUEST['groupby'];

$account = $_REQUEST['accountid'];


$sql = "SELECT ".
			  "vtiger_account.accountname, ".
			  "Sum(CASE WHEN (TO_DAYS(NOW()) - TO_DAYS(vtiger_accounting_payments.paymentduedate)) BETWEEN 0 and 29 then vtiger_accounting.accountingpaidoustanding else 0 end) AS current, ".
			  "Sum(CASE WHEN (TO_DAYS(NOW()) - TO_DAYS(vtiger_accounting_payments.paymentduedate)) BETWEEN 30 and 59 then vtiger_accounting.accountingpaidoustanding else 0 end) AS days30, ".
			  "Sum(CASE WHEN (TO_DAYS(NOW()) - TO_DAYS(vtiger_accounting_payments.paymentduedate)) BETWEEN 60 and 89 then vtiger_accounting.accountingpaidoustanding else 0 end) AS days60, ".
			  "Sum(CASE WHEN (TO_DAYS(NOW()) - TO_DAYS(vtiger_accounting_payments.paymentduedate)) BETWEEN 90 and 119 then vtiger_accounting.accountingpaidoustanding else 0 end) AS days90, ".
			  "Sum(CASE WHEN (TO_DAYS(NOW()) - TO_DAYS(vtiger_accounting_payments.paymentduedate)) BETWEEN 120 and 10000 then vtiger_accounting.accountingpaidoustanding else 0 end) AS days120, ".
			  "Sum(vtiger_accounting.accountingpaidoustanding) AS totaloutstanding ".
			"FROM ".
			  "vtiger_accounting ".
			    "INNER JOIN vtiger_account ON vtiger_accounting.accountingrelated1 = vtiger_account.accountid ".
			    "INNER JOIN vtiger_accounting_payments ON vtiger_accounting_payments.idtransaction = vtiger_accounting.accountingid ".
			"WHERE vtiger_accounting.accountingtype=?".
			"GROUP BY vtiger_account.accountid ".
			"ORDER BY vtiger_account.accountname";

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


$result = $adb->pquery($sql, array('Income'));
$nPayments = $adb->num_rows($result);

$payments = array();

while ( $row = $adb->fetchByAssoc($result)){
	if (isset($currencies[$row['accountingcurrency']])) {
		$row['current'] /= $currencies[$row['accountingcurrency']];
		$row['days30'] /= $currencies[$row['accountingcurrency']];
		$row['days60'] /= $currencies[$row['accountingcurrency']];
		$row['days90'] /= $currencies[$row['accountingcurrency']];
		$row['days120'] /= $currencies[$row['accountingcurrency']];
		$row['totaloutstanding'] /= $currencies[$row['accountingcurrency']];
	}

	$row['default_currency'] = $default_currency;
	$payments[$row['accountname']] = $row;
}

echo json_encode($payments);


?>