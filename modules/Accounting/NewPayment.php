<?php
session_start();

require_once('modules/Accounting/Accounting.php');
$config = Accounting::loadConfigParams();
?>

<?php
$multiple = isset($_REQUEST['nopayments']);
$payment_amount1 = "";
$payment_amountn = "";
$payment_duedate = "";
$payment_frecuency = "";
$rest = 0;

if ($multiple == true) {
	$total = $_REQUEST['hdnGrandTotal'] == "" ? 0 : $_REQUEST['hdnGrandTotal'];
	$nopayments = $_REQUEST['nopayments'] == "" ? 0 : $_REQUEST['nopayments'];
	if ($nopayments >= 1) {
		$payment_amount1 = $_REQUEST['amountfirstpayment'];

		if($payment_amount1 == 0) {
			$payment_amountn = $total == 0 ? 0 : ($total - $payment_amount1) / $nopayments;
			$payment_amount1 = $total == 0 ? 0 : $payment_amountn;
		} else {
			$payment_amountn = $total == 0 ? 0 : ($total - $payment_amount1) / ($nopayments-1);
		}

		$payment_amount1 = round($payment_amount1, $config["decimals"]);
		$payment_amountn = round($payment_amountn, $config["decimals"]);

		$rest = $total-($payment_amount1+($payment_amountn*($nopayments-1)));

		$payment_duedate = $_REQUEST['datefirstpayment'];
		$payment_frecuency = $_REQUEST['frecpayments'];
	} else {
		$nopayments = 0;
	}
} else {
	$nopayments = 1;
}

$frecpayments = $_REQUEST['frecpayments'];
$datefirstpayment = $_REQUEST['datefirstpayment'];
$amountfirstpayment = $_REQUEST['amountfirstpayment'];
for($i=0; $i<$nopayments;$i++) {

	if ($multiple == true) {
		if ($i == 0) {
			$paymentamountn = $payment_amount1;
		} else {
			$paymentamountn = $payment_amountn;
		}

		if ($total > 0 && $i == $nopayments-1) {
			$paymentamountn += round($rest, $config["decimals"]);
			$paymentamountn = round($paymentamountn, $config["decimals"]);
		}

		if ($frecpayments != '' && $payment_duedate != "") {
			$payment_duedate = strtotime ( '+'.$frecpayments.' day' , strtotime ( $payment_duedate ) ) ;
			$payment_duedate = date ( 'Y-m-j' , $payment_duedate );
		}
	}

?>
<td class="nPayment" name="nPayment"></td>
<td><input size="10" class="paymentref" name="paymentref_<?php echo $i; ?>" id="paymentref_<?php echo $i; ?>" value="" /></td>
<td>
	<select class="paymentmethod" name="paymentmethod_<?php echo $i; ?>" id="paymentmethod_<?php echo $i; ?>">
		<?php
			foreach ($_SESSION['methods_select'] as $v)
				echo "<option>".$v."</option>";
		?>
</select>
</td>
<td><input size="10" class="paymentamount" name="paymentamount_<?php echo $i; ?>" id="paymentamount_<?php echo $i; ?>" value="<?php echo $paymentamountn; ?>" onkeypress="onKeypressAmountField(this, event);" onKeyup="calculatePaidAndBalance();" /></td>
<td <?php
		if($config['showvat'] != "true") echo 'style="display: none"';
	?>
  ><input size="4" class="paymenttax" name="paymenttax_<?php echo $i; ?>" id="paymenttax_<?php echo $i; ?>" value="" /></td>
<td><input size="8" onchange="calculatePaidAndBalance();" class="paymentduedate" id="jscal_field_paymentduedate_<?php echo $i; ?>" name="paymentduedate_<?php echo $i; ?>" readonly="readonly" value="<?php echo $payment_duedate; ?>" type="text" style="border:1px solid #bababa;"></td>
<td>
	<img src="modules/Accounting/images/btnL3Calendar.gif" id="jscal_trigger_paymentduedate_<?php echo $i; ?>">
	<input type="image" src="themes/images/clear_field.gif" alt="Clear" title="Clear" language="javascript" onclick="document.getElementById('jscal_field_paymentduedate_<?php echo $i; ?>').value='';return false;">
</td>
<td><input size="8" onchange="calculatePaidAndBalance();" class="paymentdate" id="jscal_field_paymentdate_<?php echo $i; ?>" name="paymentdate_<?php echo $i; ?>" value="" readonly="readonly" type="text" style="border:1px solid #bababa;"></td>
<td>
	<img src="modules/Accounting/images/btnL3Calendar.gif" id="jscal_trigger_paymentdate_<?php echo $i; ?>">
	<input type="image" src="themes/images/clear_field.gif" alt="Clear" title="Clear" language="javascript" onclick="document.getElementById('jscal_field_paymentdate_<?php echo $i; ?>').value='';return false;">
</td>

<?php if ($_SESSION['associnvoice'] == 'true') { ?>
<td>
		<a class="assoc_link" id="paymentassoc_link_<?php echo $i; ?>" href="javascript:void(0)" onclick="javascript: onAssocInvoice(<?php echo $i; ?>, '<?php  global $mod_strings; echo 'Income' ?>');"><?php  global $mod_strings; echo $mod_strings['LBL_PARTIAL_INV_ASSOC'] ?></a>
		<div class="assoc_div" id="paymentassoc_div_<?php echo $i; ?>" style="display: none">
			<input class="assoc_mod" id="paymentassoc_<?php echo $i; ?>_mod" name="paymentassoc_<?php echo $i; ?>_mod" type="hidden" value="">
			<input class="assoc_id" id="paymentassoc_<?php echo $i; ?>" name="paymentassoc_<?php echo $i; ?>" type="hidden" value="">
			<input class="assoc_display" id="paymentassoc_<?php echo $i; ?>_display" name="paymentassoc_<?php echo $i; ?>_display" readonly="" type="text" style="border:1px solid #bababa;" value="">
			<input type="image" src="themes/images/clear_field.gif" alt="Clear" title="Clear" language="javascript" onclick="document.getElementById('paymentassoc_div_<?php echo $i; ?>').style.display='none';document.getElementById('paymentassoc_link_<?php echo $i; ?>').style.display='';document.getElementById('paymentassoc_<?php echo $i; ?>_display').value='';document.getElementById('paymentassoc_<?php echo $i; ?>').value='';return false;">
		</div>
</td>
<?php } ?>
<td><input type="checkbox" class="partial_paid" id="partial_paid_<?php echo $i; ?>" name="partial_paid_<?php echo $i; ?>" onClick="calculatePaidAndBalance();"><td>
<td>
	<?php
	if ($multiple == false) {
	?>
		<img width="16" height="16" src="modules/Accounting/images/delete.png" onclick="onDeletePayment(this);">
	<?php
	} else if ($_REQUEST['removeall'] == "false" || ($_REQUEST['removeall'] == "true" && $i > 0)){
	?>
		<img width="16" height="16" src="modules/Accounting/images/delete.png" onclick="onDeletePayment(this);">
	<?php
	}
	?>
</td>

<script type="text/javascript" name="massedit_calendar_paymentdate" id="massedit_calendar_paymentdate_<?php echo $i; ?>">
	Calendar.setup ({
		inputField : "jscal_field_paymentdate_<?php echo $i; ?>", ifFormat : "<?php echo $_REQUEST['dateFormat']; ?>", showsTime : false, button : "jscal_trigger_paymentdate_<?php echo $i; ?>", singleClick : true, step : 1
	});

	Calendar.setup ({
		inputField : "jscal_field_paymentduedate_<?php echo $i; ?>", ifFormat : "<?php echo $_REQUEST['dateFormat']; ?>", showsTime : false, button : "jscal_trigger_paymentduedate_<?php echo $i; ?>", singleClick : true, step : 1
	});
</script>
<?php
//if ($multiple == true) {
?>
###
<?php
//}
}
?>