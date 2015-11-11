<?php /* Smarty version Smarty-3.1.7, created on 2015-02-09 19:51:43
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Calendar/CalendarView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118686242354d90fcf64ca41-84316980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6a88e65bfac2297b0e17a5fba5303984f2df89d' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Calendar/CalendarView.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118686242354d90fcf64ca41-84316980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CURRENT_USER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d90fcf720bf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d90fcf720bf')) {function content_54d90fcf720bf($_smarty_tpl) {?>
<input type="hidden" id="currentView" value="<?php echo $_REQUEST['view'];?>
" /><input type="hidden" id="activity_view" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('activity_view');?>
" /><input type="hidden" id="time_format" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('hour_format');?>
" /><input type="hidden" id="start_hour" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('start_hour');?>
" /><div class="container-fluid"><div class="row-fluid"><div class="span12"><p><!-- Divider --></p><div id="calendarview"></div></div></div></div><?php }} ?>