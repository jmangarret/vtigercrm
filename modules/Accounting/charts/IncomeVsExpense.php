<?php

$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$groupby = $_REQUEST['groupby'];

$sql = "SELECT vtiger_accounting.accountingcurrency, YEAR(paymentduedate) as year, $groupby(paymentduedate) as periodgroup,vtiger_accounting.accountingtype, SUM(vtiger_accounting_payments.amount) as amount ".
	"FROM vtiger_accounting_payments, vtiger_accounting, vtiger_crmentity ".
	"WHERE ".
	"vtiger_accounting_payments.idtransaction=vtiger_accounting.accountingid AND ".
	"vtiger_crmentity.crmid=vtiger_accounting_payments.idtransaction AND ".
	"deleted=0 AND ".
	"paid=1 AND ".
	"paymentduedate BETWEEN ? AND ? ".
	"GROUP BY vtiger_accounting.accountingtype, YEAR(paymentduedate),$groupby(paymentduedate) ".
	"ORDER BY year, periodgroup";


$prefix = "";
switch($groupby) {
	case "YEAR":
		$prefix = "";
		break;
	case "QUARTER":
		$prefix = "Q";
		break;
	case "MONTH":
		$prefix = "";
		break;
	case "WEEKOFYEAR":
		$prefix = "W";
		break;

}


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

$payments = array();
$last_period = "";
while ( $row = $adb->fetchByAssoc($result)){
	if($last_period != "" && $last_period+1 != $row['periodgroup']) {
		for($i=$last_period+1; $i<$row['periodgroup']; $i++) {
			$row_aux = $row;
			$row_aux['amount'] = 0;
			$payments[$row_aux['year'].'_'.$prefix.$i][$row_aux['accountingtype']] = $row_aux;
		}
	}

	if (isset($currencies[$row['accountingcurrency']])) {
		$row['amount'] /= $currencies[$row['accountingcurrency']];
	}

	$payments[$row['year'].'_'.$prefix.$row['periodgroup']][$row['accountingtype']] = $row;
	$payments[$row['year'].'_'.$prefix.$row['periodgroup']]['default_currency'] = $default_currency;
	$last_period = $row['periodgroup'];
}

echo json_encode($payments);


?>