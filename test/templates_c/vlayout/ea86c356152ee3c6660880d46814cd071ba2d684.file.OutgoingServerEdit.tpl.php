<?php /* Smarty version Smarty-3.1.7, created on 2015-02-18 02:18:38
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/OutgoingServerEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196233207154e3f67e743847-00264357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea86c356152ee3c6660880d46814cd071ba2d684' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/OutgoingServerEdit.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196233207154e3f67e743847-00264357',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODEL' => 0,
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e3f67e8a75e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3f67e8a75e')) {function content_54e3f67e8a75e($_smarty_tpl) {?>
<div class="container-fluid"><div class="contents row-fluid"><form id="OutgoingServerForm" class="form-horizontal" data-detail-url="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->getDetailViewUrl();?>
"><div class="widget_header row-fluid"><div class="span8"><h3><?php echo vtranslate('LBL_OUTGOING_SERVER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3>&nbsp;<?php echo vtranslate('LBL_OUTGOING_SERVER_DESC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="span4 btn-toolbar"><div class="pull-right"><button class="btn btn-success saveButton" type="submit" title="<?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><button class="btn resetButton" type="button" title="<?php echo vtranslate('LBL_RESET_TO_DEFAULT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><strong><?php echo vtranslate('LBL_RESET_TO_DEFAULT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><a type="reset" class="cancelLink" title="<?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></div></div></div><hr><input type="hidden" name="default" value="false" /><input type="hidden" name="server_port" value="0" /><input type="hidden" name="server_type" value="email" /><input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('id');?>
" /><div class="row-fluid hide errorMessage"><div class="alert alert-error"><?php echo vtranslate('LBL_TESTMAILSTATUS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<strong><?php echo vtranslate('LBL_MAILSENDERROR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></div></div><table class="table table-bordered table-condensed themeTableColor"><thead><tr class="blockHeader"><th colspan="2" class="mediumWidthType"><?php echo vtranslate('LBL_MAIL_SERVER_SMTP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><tr><td width="20%"><label class="muted pull-right marginRight10px"><span class="redColor">*</span><?php echo vtranslate('LBL_SERVER_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td style="border-left: none;"><input type="text" name="server" data-validation-engine='validate[required]' value="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('server');?>
" /></td></tr><tr><td><label class="muted pull-right marginRight10px"><span class="redColor">*</span><?php echo vtranslate('LBL_USER_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td style="border-left: none;"><input type="text" name="server_username" data-validation-engine='validate[required]' value="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('server_username');?>
"</td></tr><tr><td><label class="muted pull-right marginRight10px"><span class="redColor">*</span><?php echo vtranslate('LBL_PASSWORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td style="border-left: none;"><input type="password" name="server_password" data-validation-engine='validate[required]' value="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('server_password');?>
"</td></tr><tr><td><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_FROM_EMAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td style="border-left: none;"><input type="text" name="from_email_field" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" data-validator='<?php echo Zend_Json::encode(array(array('name'=>'Email')));?>
' value="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('from_email_field');?>
"</td></tr><tr><td><label class="muted pull-right marginRight10px"><?php echo vtranslate('LBL_REQUIRES_AUTHENTICATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td style="border-left: none;"><input type="checkbox" name="smtp_auth" <?php if ($_smarty_tpl->tpl_vars['MODEL']->value->isSmtpAuthEnabled()){?>checked<?php }?>/></td></tr></tbody></table><span class="alert alert-info"><?php echo vtranslate('LBL_OUTGOING_SERVER_FROM_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></form></div></div><?php }} ?>