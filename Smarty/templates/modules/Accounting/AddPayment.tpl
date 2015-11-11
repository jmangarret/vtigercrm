{*<!--

/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/

-->*}
<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-win2k-cold-1.css">
<script type="text/javascript" src="jscalendar/calendar.js"></script>
<script type="text/javascript" src="jscalendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="jscalendar/calendar-setup.js"></script>

<table>
<tr>
	<td>{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_NO_OF_PAYMENTS}</td>
	<td><input size="10" id="paymenyno" value="" onkeypress="validNumberField(this, false)"></input></td>
	<td>{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_FRECUENCY}</td>
	<td><input size="10" id="paymenyfrec" value="" onkeypress="validNumberField(this, false)"></input></td>
</tr>
<tr>
	<td>{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_DATE}</td>
	<td>
		<input size="10" id="jscal_field_firstpaymentdate" name="firstpaymentdate" value="" readonly="readonly" type="text" style="border:1px solid #bababa;">
		<img src="modules/Accounting/images/btnL3Calendar.gif" id="jscal_trigger_firstpaymentdate">
		<input type="image" src="themes/images/clear_field.gif" alt="Clear" title="Clear" language="javascript" onclick="document.getElementById('jscal_field_firstpaymentdate').value='';return false;">
	</td>
	<td>
		{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_INITIAL_AMOUNT}<br />
		<font size="-3">-{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_INITIAL_AMOUNT_INFO}-</font>
	</td>
	<td><input size="10" id="paymenyinitialamount" value="" onkeypress="validNumberField(this, true)"></input></td>
</tr>
<tr>
	<td colspan=4 align="right">
		<font color="red">***</font>{$MOD.LBL_REMOVE_PREVIOUS_PAYMENTS}
	</td>
</tr>
<tr>
	<td colspan=4 align="center">
		<input onclick="onAddMultiplePayments();fninvsh('sendmail_cont');" type="button" class="crmbutton small save" value="{$APP.LBL_ADD_ITEM}">
		<input onclick="fninvsh('sendmail_cont');" type="button" class="crmbutton small cancel" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"></input>
	</td>
</tr>



</table>