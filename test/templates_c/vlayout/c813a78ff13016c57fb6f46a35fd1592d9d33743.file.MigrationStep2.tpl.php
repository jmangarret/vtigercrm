<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:07:31
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Migration/MigrationStep2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172746420954d243c3b5b815-27094697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c813a78ff13016c57fb6f46a35fd1592d9d33743' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Migration/MigrationStep2.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172746420954d243c3b5b815-27094697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d243c3c29e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d243c3c29e3')) {function content_54d243c3c29e3($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Header.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid page-container"><div class="row-fluid"><div class="span6"><div class="logo"><img src="<?php echo vimage_path('vt1.png');?>
" alt="Vtiger Logo"/></div></div><div class="span6"><div class="head pull-right"><h3> <?php echo vtranslate('LBL_MIGRATION_WIZARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div></div></div><div class="row-fluid main-container"><div class="span12 inner-container"><div class="row-fluid"><div class="span10"><h4> <?php echo vtranslate('LBL_MIGRATION_COMPLETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h4></div></div><hr><div class="row-fluid"><div class="span4 welcome-image"><img src="<?php echo vimage_path('migration_screen.png');?>
" alt="Vtiger Logo"/></div><div class="span1"></div><div class="span6"><br><br><h5><?php echo vtranslate('LBL_MIGRATION_COMPLETED_SUCCESSFULLY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
  </h5><br><br><?php echo vtranslate('LBL_RELEASE_NOTES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><?php echo vtranslate('LBL_CRM_DOCUMENTATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><?php echo vtranslate('LBL_TALK_TO_US_AT_FORUMS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><?php echo vtranslate('LBL_DISCUSS_WITH_US_AT_BLOGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<br><br>Connect with us &nbsp;&nbsp;<a href="https://www.facebook.com/vtiger" target="_blank"><img src="<?php echo vimage_path('facebook.png');?>
"></a>&nbsp;&nbsp;<a href="https://twitter.com/vtigercrm" target="_blank"><img src="<?php echo vimage_path('twitter.png');?>
"></a>&nbsp;&nbsp;<a href="//www.vtiger.com/products/crm/privacy_policy.html" target="_blank"><img src="<?php echo vimage_path('linkedin.png');?>
"></a><br><br><div class="button-container"><input type="button" onclick="window.location.href='index.php'" class="btn btn-large btn-primary" value="Finish"/></div></div></div></div></div></div></div><?php }} ?>