<?php
require_once("modules/Accounting/Accounting.php");

global $current_language;

$lang = return_module_language($current_language, "Accounting");
$smarty->assign("ACC_LANG", $lang);

$recordEntry = array_keys($relatedListData['entries']);

$payments_arr = array();
$keys = array_keys($relatedListData['entries']);
$replacesIndex = array();
for($i=0; $i<count($keys); $i++)
{
	if ($keys[$i] == 'accountingtype' || $keys[$i] == 'accountingstate')
		array_push($replacesIndex, $i);
}
array_push($replacesIndex, 1);
array_push($replacesIndex, 2);
array_push($replacesIndex, 7);

foreach($relatedListData['entries'] as $entryKey => &$entry) {
	foreach($replacesIndex as $index)
	{
		if ($index == 1) {
			$type = explode("<", $entry[$index]);
			$type = trim($type[0]);

			if ($type == $lang['LBL_INCOME_COMBOBOX']) {
				$type = '<font color="#005E00">'.$type.'</font>';
			} else {
				$type = '<font color="#9D0000">'.$type.'</font>';
			}

			$entry[$index] = $type;
		} else if ($index == 2) {
			$recordpos1 = strpos($entry[0], "record=");
			$recordpos2 = strpos($entry[0], "&", $recordpos1);
			$record = substr($entry[0], $recordpos1+7, $recordpos2-$recordpos1-7);

			$payments2 = array();
			$payments2 = Accounting::getPayments($record);
			$expired = false;

			foreach($payments2 as $pay) {
				if ($pay["paid"] == "0") {
					$exp_date = $payment["paymentduedate"];
					$todays_date = date("Y-m-d");
					$today = strtotime($todays_date);
					$expiration_date = strtotime((String)$exp_date);

					if ($expiration_date < $today) {
						$expired = true;
						break;
					}
				}
			}


			$type = explode("<", $entry[$index]);
			$type = trim($type[0]);

			if ($type == $lang['LBL_PAID_STATE_COMBOBOX']) {
				$type = '<strong><font color="#009900">'.$type.'</font></strong>';
			} else if ($expired == false) {
				$type = '<strong><font color="#CC6600">'.$type.'</font></strong>';
			} else {
				$type = '<strong><font color="#FF0000">'.$type.'</font></strong> ('.$lang['LBL_OUT_OF_DATE_LIST'].')';
			}

			$entry[$index] = $type;
		} else if ($index == 7) {
			$recordpos1 = strpos($entry[7], ">");
			$recordpos2 = strpos($entry[7], "<", $recordpos1);
			$record = substr($entry[7], $recordpos1+1, $recordpos2-$recordpos1-7);
			$entry[7] = substr($entry[7], 0, $recordpos1+1).$lang['LBL_ADD_A_PAYMENT'].substr($entry[7], $recordpos2);
		}
	}

	$id = $entryKey;

	$payments = array();
	$payments = Accounting::getPayments($id);

	$config = Accounting::loadConfigParams();
	$config['npayments'] = count($payments);
	$config['decimalseparator'] = ".";


	global $current_user;
	$paid = 0;

	foreach($payments as &$payment) {
		$payment_date = $payment["paymentduedate"];
		if ($payment["paid"] == "1") {
			$paid += $payment["amount"];
		}

		if ($payment["paymentduedate"] == "" || $payment["paymentduedate"] == "0000-00-00") {
			$payment["paymentduedate"] = $current_user->date_format;
			$payment["paymentduedate"] = str_replace("yyyy", "0000", $payment["paymentduedate"]);
			$payment["paymentduedate"] = str_replace("mm", "00", $payment["paymentduedate"]);
			$payment["paymentduedate"] = str_replace("dd", "00", $payment["paymentduedate"]);
		} else {
			$date_format = $current_user->date_format;
			$date_format = str_replace("yyyy", "Y", $date_format);
			$date_format = str_replace("mm", "m", $date_format);
			$date_format = str_replace("dd", "d", $date_format);
			$date = explode("-", $payment["paymentduedate"]);

			$payment["paymentduedate"] = date($date_format, mktime(0, 0, 0, $date[1], $date[2], $date[0]));
		}

		if ($payment["date"] == "" || $payment["date"] == "0000-00-00") {
			$payment["date"] = $current_user->date_format;
			$payment["date"] = str_replace("yyyy", "0000", $payment["date"]);
			$payment["date"] = str_replace("mm", "00", $payment["date"]);
			$payment["date"] = str_replace("dd", "00", $payment["date"]);
		} else {
			$date_format = $current_user->date_format;
			$date_format = str_replace("yyyy", "Y", $date_format);
			$date_format = str_replace("mm", "m", $date_format);
			$date_format = str_replace("dd", "d", $date_format);
			$date = explode("-", $payment["date"]);

			$payment["date"] = date($date_format, mktime(0, 0, 0, $date[1], $date[2], $date[0]));
		}

		$exp_date = $payment_date;
		$todays_date = date("Y-m-d");
		$today = strtotime($todays_date);
		$expiration_date = strtotime((String)$exp_date);

		if ($expiration_date < $today) {
			$payment["expired"] = "1";
		} else {
			$payment["expired"] = "0";
		}
	}

	array_push($payments_arr, $payments);
}

$smarty->assign("RELATEDLISTDATA", $relatedListData);
$smarty->assign('PAYMENTS', $payments_arr);
$smarty->assign('CONFIG', $config);
$smarty->display(vtlib_getModuleTemplate($relatedModule, 'RelatedListDataContents.tpl'));

?>