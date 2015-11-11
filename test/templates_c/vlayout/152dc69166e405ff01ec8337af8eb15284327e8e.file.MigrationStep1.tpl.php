<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:06:06
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Migration/MigrationStep1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207164739854d2436e739b49-79664526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '152dc69166e405ff01ec8337af8eb15284327e8e' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Migration/MigrationStep1.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207164739854d2436e739b49-79664526',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d2436e7e4fa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d2436e7e4fa')) {function content_54d2436e7e4fa($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Header.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid page-container"><div class="row-fluid"><div class="span6"><div class="logo"><img src="<?php echo vimage_path('vt1.png');?>
" alt="Vtiger Logo"/></div></div><div class="span6"><div class="head pull-right"><h3><?php echo vtranslate('LBL_MIGRATION_WIZARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div></div></div><div class="row-fluid main-container"><div class="span12 inner-container"><div class="row-fluid"><div id="running" class="alignCenter"><br><br><br><br><br><h4> <?php echo vtranslate('LBL_WAIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h4><br><img src="<?php echo vimage_path('migration_loading.gif');?>
"/><h5> <?php echo vtranslate('LBL_INPROGRESS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h5></div><div id="success" class="hide"><h4> <?php echo vtranslate('LBL_DATABASE_CHANGE_LOG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h4><hr></div></div><div id="showDetails" style="max-height:350px; overflow: auto;"></div><br><div id="nextButton" class="button-container hide"><form action='index.php' method="POST"><input type="hidden" id="module" name="module" value="Migration"><input type="hidden" id="view" name="view" value="Index"><input type="hidden" name="mode" value="step2"><input type="submit" class="btn btn-large btn-primary" value="Next"/></form></div></div></div></div><?php }} ?>