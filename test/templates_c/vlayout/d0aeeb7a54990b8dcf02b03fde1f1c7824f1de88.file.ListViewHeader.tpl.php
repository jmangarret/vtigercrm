<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 20:24:38
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Users/ListViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47746686154d28006223ef2-15116391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0aeeb7a54990b8dcf02b03fde1f1c7824f1de88' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Users/ListViewHeader.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47746686154d28006223ef2-15116391',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
    'LISTVIEW_LINKS' => 0,
    'LISTVIEW_BASICACTION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d280062de37',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d280062de37')) {function content_54d280062de37($_smarty_tpl) {?>
<div class="container-fluid"><div class="widget_header row-fluid"><h3><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><hr><div class="row-fluid"><span class="span8 btn-toolbar"><?php  $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEWBASIC']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->key => $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->_loop = true;
?><button class="btn addButton" <?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value->getUrl(),'javascript:')===0){?> onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value->getUrl(),strlen("javascript:"));?>
;'<?php }else{ ?> onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_BASICACTION']->value->getUrl();?>
"' <?php }?>><i class="icon-plus icon-white"></i>&nbsp;<strong><?php echo vtranslate('LBL_ADD_RECORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><?php } ?></span><span class="span4 btn-toolbar"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListViewActions.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</span></div><div class="listViewContentDiv" id="listViewContents"><?php }} ?>