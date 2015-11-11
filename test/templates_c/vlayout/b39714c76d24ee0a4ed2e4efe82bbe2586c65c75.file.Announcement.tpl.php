<?php /* Smarty version Smarty-3.1.7, created on 2015-02-18 02:20:34
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/Announcement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85228178554e3f6f28375c6-46031869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b39714c76d24ee0a4ed2e4efe82bbe2586c65c75' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Vtiger/Announcement.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85228178554e3f6f28375c6-46031869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'ANNOUNCEMENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e3f6f291c84',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3f6f291c84')) {function content_54e3f6f291c84($_smarty_tpl) {?>
<div class="container-fluid" id="AnnouncementContainer"><div class="widget_header row-fluid"><div class="row-fluid"><h3><?php echo vtranslate('LBL_ANNOUNCEMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div></div><hr><div class="contents row-fluid"><div class="span11 padding10"><textarea class="input-xxlarge announcementContent textarea-autosize" rows="3" placeholder="<?php echo vtranslate('LBL_ENTER_ANNOUNCEMENT_HERE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" ><?php echo $_smarty_tpl->tpl_vars['ANNOUNCEMENT']->value->get('announcement');?>
</textarea></div><div class="row-fluid"><div class="span11 padding1per"><button class="btn btn-success pull-right saveAnnouncement hide"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></div></div></div><?php }} ?>