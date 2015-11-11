<?php /* Smarty version 2.6.18, created on 2015-02-04 15:51:04
         compiled from Login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "LoginHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class="loginWrapper" width="100%" height="100%" cellpadding="10" cellspacing="0" border="0">
	<tr valign="top">
		<td valign="top" align="left" colspan="2">
			<img align="absmiddle" src="test/logo/<?php echo $this->_tpl_vars['COMPANY_DETAILS']['logo']; ?>
" alt="logo"/>
			<br />
			<a target="_blank" href="http://<?php echo $this->_tpl_vars['COMPANY_DETAILS']['website']; ?>
"><?php echo $this->_tpl_vars['COMPANY_DETAILS']['name']; ?>
</a>
			<br />
		</td>
	</tr>

	<tr>
		<td valign="top" align="center" width="50%">
			<div>
				<table border="0" cellspacing="0" cellpadding="10" class="small pluginsPromotionDiv">
					<tr>
						<td colspan="2" align="center" class="small">
							Get more out of vtiger CRM
						</td>
					</tr>
					<tr>
						<td width="50%" align="center" class=small>
							<a target="_blank" href="http://www.vtiger.com/crm/official-add-ons/#Outlook">
								<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/OutlookPlugin.png" alt="Outlook Plugin">
							</a>
						</td>
						<td width="50%" align="center" class=small>
							<a target="_blank" href="http://www.vtiger.com/crm/official-add-ons/#Exchange">
								<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/ExchangeConnector.png" alt="Exchange Connector">
							</a>
						</td>
					</tr>

					<tr>
						<td width="50%" align="center" class=small>
							<a target="_blank" href="http://itunes.apple.com/us/app/vtiger-crm-mobile/id381259792?mt=8">
								<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/AppStoreQRCode.png" alt="vtiger iPhone Application">
								<br/>
								<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/AppStore.png" alt="vtiger iPhone Application">
							</a>
						</td>
						<td width="50%" align="center" class=small>
							<a target="_blank" href="https://market.android.com/details?id=com.vtiger.apps.gvtigerpro&feature=search_result">
								<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/GooglePlayQRCode.png" alt="vtiger Android Application">
								<br/>
								<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/GooglePlay.png" alt="vtiger Android Application">
							</a>
						</td>
					</tr>
				</table>
			</div>
		</td>

		<td valign="top" align="center" width="50%">
			<div class="loginForm">
				<div class="poweredBy">Powered by vtiger CRM - <?php echo $this->_tpl_vars['VTIGER_VERSION']; ?>
</div>
				<form action="index.php" method="post" name="DetailView" id="form">
					<input type="hidden" name="module" value="Users" />
					<input type="hidden" name="action" value="Authenticate" />
					<input type="hidden" name="return_module" value="Users" />
					<input type="hidden" name="return_action" value="Login" />
					<div class="inputs">
						<div class="label">User Name</div>
						<div class="input"><input type="text" name="user_name"/></div>
						<br />
						<div class="label">Password</div>
						<div class="input"><input type="password" name="user_password"/></div>
						<?php if ($this->_tpl_vars['LOGIN_ERROR'] != ''): ?>
						<div class="errorMessage">
							<?php echo $this->_tpl_vars['LOGIN_ERROR']; ?>

						</div>
						<?php endif; ?>
						<br />
						<div class="button">
							<input type="submit" id="submitButton" value="Login" />
						</div>
					</div>
				</form>
			</div>
			<div class="importantLinks">
			<a href='javascript:mypopup()'><?php echo $this->_tpl_vars['APP']['LNK_READ_LICENSE']; ?>
</a>
			|
			<a href='http://www.vtiger.com/products/crm/privacy_policy.html' target='_blank'><?php echo $this->_tpl_vars['APP']['LNK_PRIVACY_POLICY']; ?>
</a>
			|
			&copy; 2004- <?php  echo date('Y');  ?>
			</div>
		</td>
	</tr>
	<tr valign="bottom">
		<td class="communityLinks">
			Connect with us
			<br />
			<a target="_blank" href="http://www.facebook.com/pages/vtiger/226866697333578?sk=app_143539149057867">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Facebook.png" alt="Facebook">
			</a>
			<a target="_blank" href="http://twitter.com/#!/vtigercrm">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Twitter.png" alt="Twitter">
			</a>
			<a target="_blank" href="http://www.linkedin.com/company/1270573?trk=tyah">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Linkedin.png" alt="Linkedin">
			</a>
			<a target="_blank" href="http://www.youtube.com/user/vtigercrm">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Youtube.png" alt="Videos">
			</a>
			<a target="_blank" href="http://wiki.vtiger.com/">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Manuals.png" alt="Manuals">
			</a>
			<a target="_blank" href="http://forums.vtiger.com/">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Forums.png" alt="Forums">
			</a>
			<a target="_blank" href="http://blogs.vtiger.com/">
				<img align="absmiddle" border="0" src="<?php echo $this->_tpl_vars['IMAGE_PATH']; ?>
/Blogs.png" alt="Blogs">
			</a>
		</td>
	</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "LoginFooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>