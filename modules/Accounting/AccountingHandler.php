<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
require_once("modules/Accounting/Accounting.php");

class AccountingHandler extends VTEventHandler {

	function handleEvent($eventName, $data) {

		if($eventName == 'vtiger.entity.beforesave.modifiable') {
			Accounting::sv_payments($data->getModuleName());
		}

		if($eventName == 'vtiger.entity.aftersave') {
			global $adb, $current_user;

			$nPayments = $_REQUEST['nPayments'];

			$payments = array();
			$config = Accounting::loadConfigParams();

			if ($_REQUEST['action'] == 'Save') {
				$sql = "DELETE FROM vtiger_accounting_payments WHERE idtransaction=?";
				$res = $adb->pquery($sql, array($data->getId()));

				if ($nPayments == "2") {
					if ($_REQUEST['paymentref_0'] == "" && $_REQUEST['paymentamount_0'] == "" && $_REQUEST['paymentdate_0'] == "" && $_REQUEST['paymentduedate_0'] == "" &&
							$_REQUEST['paymentassoc_0_display'] == "" && $_REQUEST['paymenttax_0'] == "") {
						$_REQUEST['paymentamount_0'] = $_REQUEST['accountingamount'];
						$_REQUEST['paymentref_0'] = $_REQUEST['paymentref'];
					}
				}

				for($i=0; $i<=$nPayments; $i++) {
					if (!isset($_REQUEST['paymentamount_'.$i])) {
						continue;
					}

					$payment = array();

					$payment['amount'] = round($_REQUEST['paymentamount_'.$i], $config['decimals']);

					$payment['date'] = $_REQUEST['paymentdate_'.$i];
					$payment['duedate'] = $_REQUEST['paymentduedate_'.$i];
					$payment['ref'] = $_REQUEST['paymentref_'.$i];
					$payment['associnv'] = $_REQUEST['paymentassoc_'.$i];
					$payment['associnv_display'] = $_REQUEST['paymentassoc_'.$i.'_display'];
					$payment['paymentassoc_mod'] = $_REQUEST['paymentassoc_'.$i.'_mod'];
					$payment['paymentmethod'] = $_REQUEST['paymentmethod_'.$i];
					$payment['paymenttax'] = $_REQUEST['paymenttax_'.$i];

					if($payment['paymentmethod'] == "") {
						$payment['paymentmethod'] = "---";
					}

					Accounting::sv_payments($data->getModuleName());
					$date_format = explode("-", $current_user->date_format);
					$date_aux = explode("-", $payment['date']);
					$date = array();

					if ($payment['date'] != "") {
						for($j=0; $j<3; $j++) {
							if (($date_format[$j] == "yyyy")) {
								$date[0] = $date_aux[$j];
							} else if (($date_format[$j] == "mm")) {
								$date[1] = $date_aux[$j];
							} else if (($date_format[$j] == "dd")) {
								$date[2] = $date_aux[$j];
							}
						}

						$date = $date[0]."-".$date[1]."-".$date[2];
					} else {
						$date = "0000-00-00";
					}

					$date_aux = explode("-", $payment['duedate']);
					$duedate = array();
					if ($payment['duedate'] != "") {
						for($j=0; $j<3; $j++) {
							if (($date_format[$j] == "yyyy")) {
								$duedate[0] = $date_aux[$j];
							} else if (($date_format[$j] == "mm")) {
								$duedate[1] = $date_aux[$j];
							} else if (($date_format[$j] == "dd")) {
								$duedate[2] = $date_aux[$j];
							}
						}

						$duedate = $duedate[0]."-".$duedate[1]."-".$duedate[2];
					} else {
						$duedate = "0000-00-00";
					}

					if (isset($_REQUEST['partial_paid_'.$i])) {
						$payment['paid'] = '1';
					} else {
						$payment['paid'] = '0';
					}

					$sql = "INSERT INTO vtiger_accounting_payments (idtransaction, amount, tax, paymentduedate, paymentdate, paid, ref, associnv, assoc_display, assoc_mod, paymentmethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

					$data_arr = array($data->getId(), $payment['amount'], $payment['paymenttax'], $duedate, $date, $payment['paid'], $payment['ref'], $payment['associnv'], $payment['associnv_display'], $payment['paymentassoc_mod'], $payment['paymentmethod']);

					foreach($data_arr as &$param) {
						if (!isset($param)) {
							$param = "";
						}
					}

					$res = $adb->pquery($sql, $data_arr);
				}

				if ($config['invoicewf'] == "true" && $_REQUEST['accountingrelated2_type'] == "Invoice" && $_REQUEST['accountingrelated2'] != "") {
					global $mod_strings;
					if($_REQUEST['accountingstate'] == "Paid") {
						$invoicestatus = $config['invoicewfpaid'];
					} else {
						$invoicestatus = $config['invoicewfpending'];
					}

					$_REQUEST['file'] = 'DetailViewAjax';
					$_REQUEST['module'] = 'Invoice';
					$_REQUEST['action'] = 'InvoiceAjax';
					$_REQUEST['record'] = $_REQUEST['accountingrelated2'];
					$_REQUEST['recordid'] = $_REQUEST['accountingrelated2'];
					$_REQUEST['fldName'] = 'invoicestatus';
					$_REQUEST['fieldValue'] = $invoicestatus;
					$_REQUEST['ajxaction'] = 'DETAILVIEW';
					$_REQUEST["tableName"] = "";

					include("modules/Accounting/InvoiceDetailViewAjax.php");
				}

				if ($config['invoicewf'] == "true") {
					global $mod_strings;
					if($_REQUEST['accountingstate'] == "Paid") {
						$invoicestatus = $config['invoicewfpaid'];
					} else {
						$invoicestatus = $config['invoicewfpending'];
					}

					$q = "select associnv, paid from vtiger_accounting_payments where idtransaction = ? and assoc_mod = ? and associnv IS NOT NULL and associnv <> ''";
					$result=$adb->pquery($q, array($data->getId(), 'Invoice'));
					$nPayments = $adb->num_rows($result);
					$payments = array();
					for($i=0; $i<$nPayments; $i++) {
						$invid = $adb->query_result($result, $i, 'associnv');
						$paid = $adb->query_result($result, $i, 'paid');
						if($paid == '1') {
							$invoicestatus = $config['invoicewfpaid'];
						} else {
							$invoicestatus = $config['invoicewfpending'];
						}

						$_REQUEST['file'] = 'DetailViewAjax';
						$_REQUEST['module'] = 'Invoice';
						$_REQUEST['action'] = 'InvoiceAjax';
						$_REQUEST['record'] = $invid;
						$_REQUEST['recordid'] = $invid;
						$_REQUEST['fldName'] = 'invoicestatus';
						$_REQUEST['fieldValue'] = $invoicestatus;
						$_REQUEST['ajxaction'] = 'DETAILVIEW';
						$_REQUEST["tableName"] = "";

						include("modules/Accounting/InvoiceDetailViewAjax.php");
					}
				}
			}
		}

		global $adb;
		$q = "UPDATE vtiger_accounting SET accountingduedate = ".
							   "(SELECT MIN(vtiger_accounting_payments.paymentduedate) FROM vtiger_accounting_payments ".
							      "WHERE vtiger_accounting_payments.idtransaction = vtiger_accounting.accountingid AND ".
							           "vtiger_accounting_payments.paymentduedate <> '0000-00-00' AND vtiger_accounting.accountingid=?) ".
							   "WHERE vtiger_accounting.accountingid=?";

		$adb->pquery($q, array($data->getId(), $data->getId()));

		$q = "UPDATE vtiger_accounting SET accountingpaymentdate = ".
							   "(SELECT MIN(vtiger_accounting_payments.paymentdate) FROM vtiger_accounting_payments ".
							      "WHERE vtiger_accounting_payments.idtransaction = vtiger_accounting.accountingid AND ".
							           "vtiger_accounting_payments.paymentdate <> '0000-00-00' AND vtiger_accounting.accountingid=?) ".
							   "WHERE vtiger_accounting.accountingid=?";

		$adb->pquery($q, array($data->getId(), $data->getId()));
	}
}
?>