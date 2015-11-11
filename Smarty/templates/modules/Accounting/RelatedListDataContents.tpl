{*<!--
/*+********************************************************************************
  * The contents of this file are subject to the vtiger CRM Public License Version 1.0
  * ("License"); You may not use this file except in compliance with the License
  * The Original Code is:  vtiger CRM Open Source
  * The Initial Developer of the Original Code is vtiger.
  * Portions created by vtiger are Copyright (C) vtiger.
  * All Rights Reserved.
  *********************************************************************************/
-->*}
<table border=0 cellspacing=0 cellpadding=0 width=100% class="small"
	style="border-bottom:1px solid #999999;padding:5px; background-color: #eeeeff;">
	<tr>
		<td align="left">
			{$RELATEDLISTDATA.navigation.0}
			{if $MODULE eq 'Campaigns' && ($RELATED_MODULE eq 'Contacts' || $RELATED_MODULE eq
				'Leads' || $RELATED_MODULE eq 'Accounts') && $RELATEDLISTDATA.entries|@count > 0}
				<br>{$APP.LBL_SELECT_BUTTON_LABEL}: <a href="javascript:void(0);"
					onclick="clear_checked_all('{$RELATED_MODULE}');">{$APP.LBL_NONE_NO_LINE}</a>
			{/if}
		</td>
		<td align="center">{$RELATEDLISTDATA.navigation.1} </td>
		<td align="right">
			{$RELATEDLISTDATA.CUSTOM_BUTTON}

			{if $HEADER eq 'Contacts' && $MODULE neq 'Campaigns' && $MODULE neq 'Accounts' && $MODULE neq 'Potentials' && $MODULE neq 'Products' && $MODULE neq 'Vendors'}
				{if $MODULE eq 'Calendar'}
					<input alt="{$APP.LBL_SELECT_CONTACT_BUTTON_LABEL}" title="{$APP.LBL_SELECT_CONTACT_BUTTON_LABEL}" accessKey="" class="crmbutton small edit" value="{$APP.LBL_SELECT_BUTTON_LABEL} {$APP.Contacts}" LANGUAGE=javascript onclick='return window.open("index.php?module=Contacts&return_module={$MODULE}&action=Popup&popuptype=detailview&select=enable&form=EditView&form_submit=false&recordid={$ID}{$search_string}","test","width=640,height=602,resizable=0,scrollbars=0");' type="button"  name="button"></td>
				{elseif $MODULE neq 'Services'}
					<input title="{$APP.LBL_NEW_FORM_TITLE} {$APP.Contact}" accessyKey="F" class="crmbutton small create" onclick="this.form.action.value='EditView';this.form.module.value='Contacts'" type="submit" name="button" value="{$APP.LBL_ADD_NEW} {$APP.Contact}"></td>
				{/if}
			{elseif $HEADER eq 'Users' && $MODULE eq 'Calendar'}
				<input title="Change" accessKey="" tabindex="2" type="button" class="crmbutton small edit" value="{$APP.LBL_SELECT_USER_BUTTON_LABEL}" name="button" LANGUAGE=javascript onclick='return window.open("index.php?module=Users&return_module=Calendar&return_action={$return_modname}&activity_mode=Events&action=Popup&popuptype=detailview&form=EditView&form_submit=true&select=enable&return_id={$ID}&recordid={$ID}","test","width=640,height=525,resizable=0,scrollbars=0")';>
            {/if}

		</td>
	</tr>
</table>

<table border=0 cellspacing=1 cellpadding=3 width=100% style="background-color:#eaeaea;" class="small">
	<tr style="height:25px" bgcolor=white>
        {if $MODULE eq 'Campaigns' && ($RELATED_MODULE eq 'Contacts' || $RELATED_MODULE eq 'Leads' || $RELATED_MODULE eq 'Accounts')
			&& $RELATEDLISTDATA.entries|@count > 0}
		<td class="lvtCol">
			<input name ="{$RELATED_MODULE}_selectall" onclick="rel_toggleSelect(this.checked,'{$RELATED_MODULE}_selected_id','{$RELATED_MODULE}');"  type="checkbox">
		</td>
        {/if}
		{foreach key=index item=_HEADER_FIELD from=$RELATEDLISTDATA.header}
		<td class="lvtCol">{$_HEADER_FIELD}</td>
		{/foreach}
	</tr>
	{foreach key=_RECORD_ID item=_RECORD from=$RELATEDLISTDATA.entries name=foo}
			<tr bgcolor=white>
	        	{if $MODULE eq 'Campaigns' && ($RELATED_MODULE eq 'Contacts' || $RELATED_MODULE eq 'Leads' || $RELATED_MODULE eq 'Accounts')}
				<td><input name="{$RELATED_MODULE}_selected_id" id="{$_RECORD_ID}" value="{$_RECORD_ID}" onclick="rel_check_object(this,'{$RELATED_MODULE}');" type="checkbox"  {$RELATEDLISTDATA.checked.$_RECORD_ID}></td>
	        	{/if}
				{foreach key=index item=_RECORD_DATA from=$_RECORD}
					 {* vtlib customization: Trigger events on listview cell *}
	                 <td onmouseover="vtlib_listview.trigger('cell.onmouseover', $(this))" onmouseout="vtlib_listview.trigger('cell.onmouseout', $(this))">{$_RECORD_DATA}</td>
	                 {* END *}
				{/foreach}
			</tr>
			<tr width="100%"><td COLSPAN=7>
				<table id="payments_table" width="60%" style="background-color:white;">
					<tr>
						<td>
							{if $CONFIG.showvat eq 'true'}
								{assign var="displayVAT" value=""}
							{else}
								{assign var="displayVAT" value="none"}
							{/if}

							{if $CONFIG.associnvoice eq 'true'}
								{assign var="displayInv" value=""}
							{else}
								{assign var="displayInv" value="none"}
							{/if}
							<table width="100%">
							 	<tr>
									<th>#</th>
									<th>{$ACC_LANG.LBL_PAYMENT_REF}</th>
									<th>{$ACC_LANG.LBL_TRANSACTION_METHOD}</th>
									<th>{$ACC_LANG.LBL_PARTIAL_AMOUNT}</th>
									<th style="display: {$displayVAT}">{$MOD.LBL_PARTIAL_TAX}</th>
									<th>{$ACC_LANG.LBL_TRANSACTION_DUE_DATE}</th>
									<th>{$ACC_LANG.LBL_TRANSACTION_DATE}</th>
									<th style="display: {$displayInv}">Related to</th>
									<th>{$ACC_LANG.LBL_PARTIAL_PAID_AMOUNT}</th>
								</tr>
								{foreach from=$PAYMENTS[$smarty.foreach.foo.index] item=PAYMENT name=foo2}
									{if $PAYMENT.paid eq "1"}
										{assign var="bgColor" value="#D7FFD7"}
									{elseif $PAYMENT.expired eq "1"}
										{assign var="bgColor" value="#FF9D9D"}
									{else}
										{assign var="bgColor" value="#FFFFFF"}
									{/if}
							  		<tr bgcolor="{$bgColor}">
							  			<td name="nPayment"><font size="+1">{$smarty.foreach.foo2.index+1}</font></td>
							  			<td align="center">{$PAYMENT.ref}</td>
							   			<td align="center">{$PAYMENT.method}</td>
							   			<td align="center">{$PAYMENT.amount}</td>
							   			<td style="display: {$displayVAT}">{$PAYMENT.tax}</td>
							   			<td align="center">{$PAYMENT.paymentduedate}</td>
							   			<td align="center">{$PAYMENT.date}</td>
							   			<td style="display: {$displayInv}" align="center"><strong><a href="index.php?module={$PAYMENT.assoc_mod}&parenttab=Sales&action=DetailView&record={$PAYMENT.associnv}">{$PAYMENT.assoc_display}</a></strong></td>
							  			{if $PAYMENT.paid eq "1"}
							  				{assign var="paidImg" value="themes/images/enabled.gif"}
							  			{else}
							  				{assign var="paidImg" value="themes/images/disabled.gif"}
							  			{/if}
							  			<td align="center"><img src="{$paidImg}"></td>
							  		</tr>
							   	{/foreach}
							</table>
						</td>
					</tr>
</table>
			</td></tr>
			<tr><td> </td></tr>
	{foreachelse}
		<tr style="height: 25px;" bgcolor="white"><td><i>{$APP.LBL_NONE_INCLUDED}</i></td></tr>
	{/foreach}
</table>

<table align="right" CELLSPACING=5>
	<tr>
		<td bgcolor="#D7FFD7" width="12px" style="border: 1px; border-style: solid;border-color: grey"></td><td>{$ACC_LANG.LBL_PAID_STATE_COMBOBOX}</td>
		<td bgcolor="#FF9D9D" width="12px" style="border: 1px; border-style: solid;border-color: grey"><td>{$ACC_LANG.LBL_OUT_OF_DATE}</td>
		<td bgcolor="#FFFFFF" width="12px" style="border: 1px; border-style: solid;border-color: grey"><td>{$ACC_LANG.LBL_PENDING_STATE_COMBOBOX}</td>
	</tr>
</table>