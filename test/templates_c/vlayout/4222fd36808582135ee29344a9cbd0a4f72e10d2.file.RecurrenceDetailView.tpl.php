<?php /* Smarty version Smarty-3.1.7, created on 2015-02-18 02:25:48
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/RecurrenceDetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71710311554e3f82c2bd511-31584334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4222fd36808582135ee29344a9cbd0a4f72e10d2' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/RecurrenceDetailView.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71710311554e3f82c2bd511-31584334',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECURRING_INFORMATION' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e3f82c3291c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3f82c3291c')) {function content_54e3f82c3291c($_smarty_tpl) {?>
<div id="addEventRepeatUI">
	<div><span><?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['recurringcheck'];?>
</span></div>
	<?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeat_str']!=''){?>
	<div>
		<span><?php echo vtranslate('LBL_REPEATEVENT',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeat_frequency'];?>
&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['recurringtype'],$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</span>
	</div>
	<div>
		<span><?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeat_str'];?>
</span>
	</div>
	<?php }?>
</div><?php }} ?>