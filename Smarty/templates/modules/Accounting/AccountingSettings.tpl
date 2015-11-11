<script language="JavaScript" type="text/javascript" src="modules/Tooltip/TooltipSettings.js"></script>
<script language="JavaScript" type="text/javascript" src="modules/Accounting/Accounting.js"></script>


<br />

<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody>
<tr>
	<td valign="top"><img src="{'showPanelTopLeft.gif'|@vtiger_imageurl:$THEME}"></td>
	<td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
	<br>
		{include file='SetMenu.tpl'}
		<table class="settingsSelUITopLine" border="0" cellpadding="5" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td rowspan="5" valign="top" width="50"><img src="modules/Accounting/images/settings.png" title="{$MOD.LBL_USERS}" border="0" height="48" width="48"></td>
				<td class="heading2" valign="bottom">
					<b><a href="index.php?module=Settings&action=ModuleManager&parenttab=Settings">{'VTLIB_LBL_MODULE_MANAGER'|@getTranslatedString:'Settings'}</a> >
					<a href="index.php?module=Settings&action=ModuleManager&module_settings=true&formodule={$FORMODULE}&parenttab=Settings">{$FORMODULE|@getTranslatedString:$FORMODULE}</a> >
						{$MOD.LBL_SETTINGS_SINGLE_PARAMETERS}
				</td>
			</tr>

			<tr>
				<td class="small" valign="top">{$MOD.LBL_SETTINGS_PARAMETERS_DESCRIPTION}</td>
			</tr>
            <tr>
				<td class="small" valign="top">{$MOD.LBL_MODULE_VERSION} v{$MODULE_VERSION}</td>
			</tr>
			<tr>
            	<td class="small" valign="top">{$MOD.LBL_MODULE_POWERED} <a href="http://www.axialblue.com" target="_blank"><strong> AXIALBLUE</strong></a></td>
            <!--	<td align="right"><input type="button" onclick="updateConfiguration('{$MOD.LBL_SETTINGS_SAVE_OK}');" value="{$MOD.LBL_SETTING_SAVE}" class="crmbutton small create" name="update" /></td> -->
			</tr>
			<tr>
				<td class="small" valign="top">
					Support:
					<strong> <a href="http://support.axialblue.com" target="_blank">Axialblue Support</a></strong> and
					<strong><a href="http://wiki.axialblue.com" target="_blank">Wiki</a></strong>
				</td>
			</tr>
		</tbody>
		</table>

		<br />

				<table cellspacing="0" cellpadding="10" border="0" width="100%">
					<tbody>
					{*	<tr>
							<td>
								<table cellspacing="0" cellpadding="5" border="0" width="100%" class="tableHeading">
									<tbody>
										<tr>
											<td width="70%">
												<table cellspacing="0" cellpadding="5" border="0" width="100%">
													<tbody>
														<tr>
															<td height="20px;" width="75%" class="" id="asterisk">
																{if $ACCOUNTING_CONFIG.licenseok eq 'true'}
																	{assign var="licenseimg" value="modules/Accounting/images/check.png"}
																{else}
																	{assign var="licenseimg" value="modules/Accounting/images/invalid.png"}
																{/if}
																<img id="imglic" width="20px" src="{$licenseimg}" />&nbsp;&nbsp;
																<font size="2"><strong>{$MOD.LBL_SETTING_LICENSE}</strong></font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>

								<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_LICENSE_CODE}</strong></td>
                           			  	<td width="80%" class="small cellText">
								        {if $ACCOUNTING_CONFIG.licenseok neq 'true'}
								        	<input type="text" title="" value="{$ACCOUNTING_CONFIG.licensecode}" style="width: 30%;" class="small" name="licensecode" id="licensecode" />
											<input id="installlicbutton" type="button" onclick="onInstallLic('{$MOD.LBL_SETTINGS_LIC_OK}', '{$MOD.LBL_SETTINGS_LIC_ERR}');" value="{$MOD.LBL_SAVE_LICENSE}" class="crmbutton small create" name="update" />
										{else}
											&nbsp;&nbsp;&nbsp;&nbsp;{$ACCOUNTING_CONFIG.licensecode} &nbsp;&nbsp;&nbsp;
											<input align="right" class="crmbutton small delete" type="button" title="" onclick="onRemoveLicense('{$MOD.LBL_SETTINGS_LIC_REMOVE_CONFIRMATION}');" value="{$MOD.LBL_SETTINGS_LIC_REMOVE}" />
										{/if}
				                        </td>
                        			</tr>
                        		</table>
                        	</td>
                        </tr>
*}
                        <tr>
							<td>
								<table cellspacing="0" cellpadding="5" border="0" width="100%" class="tableHeading">
									<tbody>
										<tr>
											<td width="70%">
												<table cellspacing="0" cellpadding="5" border="0" width="100%">
													<tbody>
														<tr>
															<td height="20px;" width="75%" class="" id="asterisk">
																<font size="2"><strong>{$MOD.LBL_SETTINGS_REL_MODULES}</strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	{$MOD.LBL_SETTINGS_REL_MODULES_INFO} (<strong><a target="_blank" href="http://wiki.axialblue.com/index.php?title=Accounting_configuration#Related_modules">{$MOD.LBL_SETTINGS_MORE_INFO}</a></strong>)
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>

								{*<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_ACTIVATE_REL_MODULES}</td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.relmodules eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onRelModulesCheck();"><img id="relmodules" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_REL_MODULES}" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>
                        		</table>
*}
								<img style="display: none" id="relmodules" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_REL_MODULES}" src="themes/images/enabled.gif">
								
                        		<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_ADD_CUSTOM_LINKS}</td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.customlinks eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onCustomLink();"><img id="customlink" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_REL_MODULES}" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>
                        		</table>
                        	</td>
                        </tr>




                        <tr>
							<td>
								<table cellspacing="0" cellpadding="5" border="0" width="100%" class="tableHeading">
									<tbody>
										<tr>
											<td width="70%">
												<table cellspacing="0" cellpadding="5" border="0" width="100%">
													<tbody>
														<tr>
															<td height="20px;" width="75%" class="" id="asterisk">
																<font size="2"><strong>{$MOD.LBL_SETTINGS_WF_INVOICE}</strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	(<strong><a target="_blank" href="http://wiki.axialblue.com/index.php?title=Accounting_configuration#Invoice_integration">{$MOD.LBL_SETTINGS_WF_INVOICE_INFO}</a></strong>)
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>

								<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
									<tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_ACTIVATE_INVOICE_WF}</strong></td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.invoicewf eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onInvoiceWfCheck();"><img id="invoicewf" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_INVOICE_WF}" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>

                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_INVOICE_PAID} <strong>{$MOD.LBL_PAID_STATE_COMBOBOX}</strong> {$MOD.LBL_SETTINGS_WF_INVOICE_CHANGE_TO}:</td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.invoicewf neq "true"}
                       			  			{assign var="selectDisabled" value="disabled"}
                       			  		{else}
                       			  			{assign var="selectDisabled" value=""}
                       			  		{/if}
                           			  	<select id="InvoiceStatusPaid" {$selectDisabled}>
                           			  		<option value="---">{$APP.LBL_NONE}</option>
	                           			  	{foreach from=$INVOICE_STATUS key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.invoicewfpaid eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>
                        			<tr style="display:">
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_INVOICE_PAID} <strong>{$MOD.LBL_PENDING_STATE_COMBOBOX}</strong> {$MOD.LBL_SETTINGS_WF_INVOICE_CHANGE_TO}:</td>
                           			  	<td width="80%" class="small cellText">
                           			  	<select id="InvoiceStatusPending" {$selectDisabled}>
                           			  		<option value="---">{$APP.LBL_NONE}</option>
	                           			  	{foreach from=$INVOICE_STATUS key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.invoicewfpending eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>

                        			<tr>
                            			<td>&nbsp;</td>
                           			  	<td>&nbsp;</td>
                        			</tr>

                        			<tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_ACTIVATE_PAYMENT_WF}</strong></td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.paymentwf eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onPaymentWfCheck();"><img id="paymentwf" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_INVOICE_WF}" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>

                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_PAYMENT_PAID1} <strong>{$MOD.LBL_PAID_STATE_COMBOBOX}</strong> {$MOD.LBL_SETTINGS_WF_PAYMENT_PAID2}:</td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.paymentwf neq "true"}
                       			  			{assign var="selectDisabled" value="disabled"}
                       			  		{else}
                       			  			{assign var="selectDisabled" value=""}
                       			  		{/if}
                           			  	<select id="PaymentStatusPaid" {$selectDisabled}>
	                           			  	{foreach from=$INVOICE_STATUS key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.paymentwfpaid eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>
                        			
                        			<tr style="display: none">
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_PAYMENT_PAID1} <strong>{$MOD.LBL_PENDING_STATE_COMBOBOX}</strong> {$MOD.LBL_SETTINGS_WF_PAYMENT_PAID2}:</td>
                           			  	<td width="80%" class="small cellText">
                           			  	<select id="PaymentStatusPending" {$selectDisabled}>
                           			  		<option value="---">{$APP.LBL_NONE}</option>
	                           			  	{foreach from=$INVOICE_STATUS key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.paymentwfpending eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>
                        			
                        			<tr>
                            			<td>&nbsp;</td>
                           			  	<td>&nbsp;</td>
                        			</tr>
                        			
                        			<tr style="display: ">
                            			<td nowrap="" width="20%" class="small cellLabel">Update payment 'Total amount' when the invoice is modified</td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.populateamount eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onAutoPopulateAmount();"><img id="populateamount" border="0" align="absmiddle" title="" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>

                        			<tr>
                            			<td>&nbsp;</td>
                           			  	<td>&nbsp;</td>
                        			</tr>

                        			<tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT}</strong></td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.createpaymentwf eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onCreatePaymentWfCheck();"><img id="createpaymentwf" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_INVOICE_WF}" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>

                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_NO_OF_PAYMENTS} {$MOD.LBL_SETTINGS_FIELD}: </td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.createpaymentwf neq "true"}
                       			  			{assign var="selectDisabled" value="disabled"}
                       			  		{else}
                       			  			{assign var="selectDisabled" value=""}
                       			  		{/if}
                           			  	<select id="PaymentAutoCreate_No" {$selectDisabled}>
	                           			  	{foreach from=$INVOICE_CUSTOM_FLD key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.wf_nopayments eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>

                        			<tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_FRECUENCY} {$MOD.LBL_SETTINGS_FIELD}: </td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.createpaymentwf neq "true"}
                       			  			{assign var="selectDisabled" value="disabled"}
                       			  		{else}
                       			  			{assign var="selectDisabled" value=""}
                       			  		{/if}
                           			  	<select id="PaymentAutoCreate_Frec" {$selectDisabled}>
	                           			  	{foreach from=$INVOICE_CUSTOM_FLD key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.wf_frecuency eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>

                        			<tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_DATE} {$MOD.LBL_SETTINGS_FIELD}: </td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.createpaymentwf neq "true"}
                       			  			{assign var="selectDisabled" value="disabled"}
                       			  		{else}
                       			  			{assign var="selectDisabled" value=""}
                       			  		{/if}
                           			  	<select id="PaymentAutoCreate_Date" {$selectDisabled}>
	                           			  	{foreach from=$INVOICE_CUSTOM_FLD key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.wf_firstpaymentdate eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>

                        			<tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_SETTINGS_WF_CREATE_PAYMENT_INITIAL_AMOUNT} {$MOD.LBL_SETTINGS_FIELD}: </td>
                           			  	<td width="80%" class="small cellText">
                           			  	{if $ACCOUNTING_CONFIG.createpaymentwf neq "true"}
                       			  			{assign var="selectDisabled" value="disabled"}
                       			  		{else}
                       			  			{assign var="selectDisabled" value=""}
                       			  		{/if}
                           			  	<select id="PaymentAutoCreate_Amount" {$selectDisabled}>
	                           			  	{foreach from=$INVOICE_CUSTOM_FLD key=k item=v}
	                           			  		{if $ACCOUNTING_CONFIG.wf_firstpaymentamount eq $k}
	                           			  			{assign var="selectStatus" value="selected"}
	                           			  		{else}
	                           			  			{assign var="selectStatus" value=""}
	                           			  		{/if}
	                           			  		<option value="{$k}" {$selectStatus}>{$v}</option>
	                           			  	{/foreach}
										</select>
				                        </td>
                        			</tr>
                        		</table>
                        	</td>
                        </tr>

                        <tr>
							<td>
								<table cellspacing="0" cellpadding="5" border="0" width="100%" class="tableHeading">
									<tbody>
										<tr>
											<td width="70%">
												<table cellspacing="0" cellpadding="5" border="0" width="100%">
													<tbody>
														<tr>
															<td height="20px;" width="75%" class="" id="asterisk">
																<font size="2"><strong>{$MOD.LBL_SETTINGS_PAYMENT_PARAMETERS}</strong></font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>

								<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel">{$MOD.LBL_WORK_MODE}</td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.associnvoice eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onAssocInvoiceCheck();"><img id="associnvoice" border="0" align="absmiddle" title="{$MOD.LBL_SETTINGS_ACTIVATE_REL_MODULES}" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>
                        		</table>

								<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_TRANSACTION_METHOD2}</strong></td>
                           			  	<td width="80%" class="small cellText">
                           			  		<table>
                           			  			<tr>
                           			  				<td>
			                           			  		<select id="methodSelect" size=6>
			                           			  			{foreach from=$TRANSACTION_METHOD item=v}
			                           			  				<option>{$v}</option>
			                           			  			{/foreach}
			                           			  		</select>
			                           			  	</td>
			                           			  	<td>
			                           			  		<input class="crmbutton small delete" type="button" value="{$APP.LBL_DELETE_BUTTON}" onclick="onDeleteMethod();" /><br />
			                           			  		<input id="newMethod" type="text" value="" />
														<input class="crmbutton small save" type="button" value="{$APP.LBL_ADD_NEW}" onclick="onAddNewMethod();" />
			                           			  	</td>
			                           			  </tr>
	                           			  	</table>
				                        </td>
                        			</tr>
                        		</table>
                        	</td>
                        </tr>

                        <tr>
							<td>
								<table cellspacing="0" cellpadding="5" border="0" width="100%" class="tableHeading">
									<tbody>
										<tr>
											<td width="70%">
												<table cellspacing="0" cellpadding="5" border="0" width="100%">
													<tbody>
														<tr>
															<td height="20px;" width="75%" class="" id="asterisk">
																<font size="2"><strong>{$MOD.LBL_SETTINGS_OTHER_PARAMETERS}</strong></font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>

								<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_FILL_VAT}</strong></td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.showvat eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onShowVatCheck();"><img id="showvat" border="0" align="absmiddle" title="" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>
                        		</table>

                        		<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_SHOW_ALERTS}</strong></td>
                           			  	<td width="80%" class="small cellText">
							        		{if $ACCOUNTING_CONFIG.hidepopup eq "true"}
								                    {assign var="checkImgButton" value="themes/images/enabled.gif"}
											{else}
								                    {assign var="checkImgButton" value="themes/images/disabled.gif"}
								            {/if}

								            <a onclick="" href="javascript:onHidePopupCheck();"><img id="hidepopup" border="0" align="absmiddle" title="" src="{$checkImgButton}"></a>
				                        </td>
                        			</tr>
                        		</table>

								<table cellspacing="0" cellpadding="0" border="0" width="100%" class="listRow">
                                    <tr>
                            			<td nowrap="" width="20%" class="small cellLabel"><strong>{$MOD.LBL_SETTINGS_DEFAULT_CURRENCY}</strong></td>
                           			  	<td width="80%" class="small cellText">
                           			  		<input id="accountingcurrency" name="accountingcurrency" size=6 />
				                        </td>
                        			</tr>
                        		</table>
                        	</td>
                        </tr>

                        <tr align="center">
                        	<td>
                        		<input type="button" onclick="onSaveSettings('{$MOD.LBL_SETTINGS_SAVE_OK}');" value="{$MOD.LBL_SETTING_SAVE}" class="crmbutton small create" name="update" />
                        	</td>
                        </tr>

							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
<br>

<script language="javascript">
var LBL_SETTINGS_AUTO_CREATE_PAYMENT_WARN = "{$MOD.LBL_SETTINGS_AUTO_CREATE_PAYMENT_WARN}";
{foreach item=opt from=$FAX_TEMPLATES}
_onFaxBodyKeyUp("template_body_{$opt[0]}", "template_chars_{$opt[0]}");
{/foreach}

addCurrencies('{$CURRENCIES}', '{$RECORD_CURRENCY}');
</script>