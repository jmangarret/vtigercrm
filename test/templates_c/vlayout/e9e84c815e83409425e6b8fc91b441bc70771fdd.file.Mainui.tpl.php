<?php /* Smarty version Smarty-3.1.7, created on 2015-02-18 02:53:52
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/MailManager/Mainui.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86947648354e3fec0b3ba70-21266239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9e84c815e83409425e6b8fc91b441bc70771fdd' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/MailManager/Mainui.tpl',
      1 => 1423065968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86947648354e3fec0b3ba70-21266239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MAILBOX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e3fec0bb4aa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3fec0bb4aa')) {function content_54e3fec0bb4aa($_smarty_tpl) {?>
<div id="_folderdiv_"><?php echo $_smarty_tpl->getSubTemplate ("modules/MailManager/FolderList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<input type="hidden" name="refresh_timeout" id="refresh_timeout" value="<?php echo $_smarty_tpl->tpl_vars['MAILBOX']->value->refreshTimeOut();?>
"/>
<?php }} ?>