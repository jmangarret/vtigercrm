<?php /* Smarty version Smarty-3.1.7, created on 2015-02-05 22:21:20
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Currency/EditAjax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146593739354d3ece093b180-45493729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d1a3d399ee8bf71c0cf9ef3ad0cadbb2211208e' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Currency/EditAjax.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146593739354d3ece093b180-45493729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD_MODEL' => 0,
    'CURRENCY_ID' => 0,
    'CURRENCY_MODEL_EXISTS' => 0,
    'QUALIFIED_MODULE' => 0,
    'ALL_CURRENCIES' => 0,
    'CURRENCY_MODEL' => 0,
    'BASE_CURRENCY_MODEL' => 0,
    'OTHER_EXISTING_CURRENCIES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d3ece0c02b4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d3ece0c02b4')) {function content_54d3ece0c02b4($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['CURRENCY_MODEL_EXISTS'] = new Smarty_variable(true, null, 0);?><?php $_smarty_tpl->tpl_vars['CURRENCY_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD_MODEL']->value->getId(), null, 0);?><?php if (empty($_smarty_tpl->tpl_vars['CURRENCY_ID']->value)){?><?php $_smarty_tpl->tpl_vars['CURRENCY_MODEL_EXISTS'] = new Smarty_variable(false, null, 0);?><?php }?><div class="currencyModalContainer"><div class="modal-header contentsBackground"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><?php if ($_smarty_tpl->tpl_vars['CURRENCY_MODEL_EXISTS']->value){?><h3><?php echo vtranslate('LBL_EDIT_CURRENCY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><?php }else{ ?><h3><?php echo vtranslate('LBL_ADD_NEW_CURRENCY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><?php }?></div><form id="editCurrency" class="form-horizontal"><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_ID']->value;?>
" /><div class="modal-body"><div class="row-fluid"><div class="control-group"><label class="muted control-label"><span class="redColor">*</span>&nbsp;<?php echo vtranslate('LBL_CURRENCY_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls row-fluid"><select class="select2 span6" name="currency_name"><?php  $_smarty_tpl->tpl_vars['CURRENCY_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['CURRENCY_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_CURRENCIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->key => $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value){
$_smarty_tpl->tpl_vars['CURRENCY_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['CURRENCY_ID']->value = $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->key;
 $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->index++;
 $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->first = $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['currencyIterator']['first'] = $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->first;
?><?php if (!$_smarty_tpl->tpl_vars['CURRENCY_MODEL_EXISTS']->value&&$_smarty_tpl->getVariable('smarty')->value['foreach']['currencyIterator']['first']){?><?php $_smarty_tpl->tpl_vars['RECORD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value, null, 0);?><?php }?><option value="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_name');?>
" data-code="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_code');?>
"data-symbol="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_symbol');?>
" <?php if ($_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('currency_name')==$_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_name')){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_name'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;(<?php echo $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_symbol');?>
)</option><?php } ?></select></div></div><div class="control-group"><label class="muted control-label"><span class="redColor">*</span>&nbsp;<?php echo vtranslate('LBL_CURRENCY_CODE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><input type="text" name="currency_code" readonly value="<?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('currency_code');?>
" data-validation-engine='validate[required]]' /></div></div><div class="control-group"><label class="muted control-label"><span class="redColor">*</span>&nbsp;<?php echo vtranslate('LBL_CURRENCY_SYMBOL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><input type="text" name="currency_symbol" readonly  value="<?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('currency_symbol');?>
" data-validation-engine='validate[required]' /></div></div><div class="control-group"><label class="muted control-label"><span class="redColor">*</span>&nbsp;<?php echo vtranslate('LBL_CONVERSION_RATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><input type="text" name="conversion_rate" placeholder="<?php echo vtranslate('LBL_ENTER_CONVERSION_RATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"value="<?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('conversion_rate');?>
" data-validation-engine='validate[required, funcCall[Vtiger_GreaterThanZero_Validator_Js.invokeValidation]]' /><br><span class="muted">(<?php echo vtranslate('LBL_BASE_CURRENCY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 - <?php echo $_smarty_tpl->tpl_vars['BASE_CURRENCY_MODEL']->value->get('currency_name');?>
)</span></div></div><div class="control-group"><label class="muted control-label"><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><label class="checkbox"><input type="hidden" name="currency_status" value="Inactive" /><input type="checkbox" name="currency_status" value="Active" class="currencyStatus alignBottom"<?php if (!$_smarty_tpl->tpl_vars['CURRENCY_MODEL_EXISTS']->value){?> checked <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('currency_status');?>
<?php if ($_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('currency_status')=='Active'){?> checked <?php }?><?php }?> /><span>&nbsp;<?php echo vtranslate('LBL_CURRENCY_STATUS_DESC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></label></div></div><div class="control-group transferCurrency hide"><label class="muted control-label"><span class="redColor">*</span>&nbsp;<?php echo vtranslate('LBL_TRANSFER_CURRENCY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;<?php echo vtranslate('LBL_TO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls row-fluid"><select class="select2 span6" name="transform_to_id"><?php  $_smarty_tpl->tpl_vars['CURRENCY_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['CURRENCY_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OTHER_EXISTING_CURRENCIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->key => $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value){
$_smarty_tpl->tpl_vars['CURRENCY_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['CURRENCY_ID']->value = $_smarty_tpl->tpl_vars['CURRENCY_MODEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_ID']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['CURRENCY_MODEL']->value->get('currency_name'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php } ?></select></div></div></div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }} ?>