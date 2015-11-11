<?php /* Smarty version Smarty-3.1.7, created on 2015-05-21 12:57:30
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Project/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:456764198555e158254b9a0-78732096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '153ba1748732aad0f9e888adbbce31fc79ac873e' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Project/ModuleSummaryView.tpl',
      1 => 1423065972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '456764198555e158254b9a0-78732096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'SUMMARY_INFORMATION' => 0,
    'FIELD_NAME' => 0,
    'FIELD_VALUE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_555e15825dab9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e15825dab9')) {function content_555e15825dab9($_smarty_tpl) {?>
<div class="recordDetails"><div><label><strong><?php echo vtranslate('LBL_RECORD_SUMMARY',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></label></div><div class="row-fluid textAlignCenter roundedCorners"><?php  $_smarty_tpl->tpl_vars['FIELD_VALUE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_VALUE']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUMMARY_INFORMATION']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_VALUE']->key => $_smarty_tpl->tpl_vars['FIELD_VALUE']->value){
$_smarty_tpl->tpl_vars['FIELD_VALUE']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_NAME']->value = $_smarty_tpl->tpl_vars['FIELD_VALUE']->key;
?><span class="shade7 well squeezedWell marginLeftZero span" style='width:100px'><div><label class="font-x-small"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></div><div><label class="font-x-x-large"><?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
</label></div></span><?php } ?></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>