<?php /* Smarty version Smarty-3.1.7, created on 2015-06-25 11:50:11
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/CommentsListIteration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260128575558c2a3b2d8fa7-54690770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd4792a59020e955c33f64385cf888114a760c14' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/CommentsListIteration.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260128575558c2a3b2d8fa7-54690770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CHILD_COMMENTS_MODEL' => 0,
    'COMMENT' => 0,
    'CHILD_COMMENTS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_558c2a3b4060b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558c2a3b4060b')) {function content_558c2a3b4060b($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value)){?><ul class="liStyleNone"><?php  $_smarty_tpl->tpl_vars['COMMENT'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['COMMENT']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CHILD_COMMENTS_MODEL']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['COMMENT']->key => $_smarty_tpl->tpl_vars['COMMENT']->value){
$_smarty_tpl->tpl_vars['COMMENT']->_loop = true;
?><li class="commentDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CommentThreadList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('COMMENT'=>$_smarty_tpl->tpl_vars['COMMENT']->value), 0);?>
<?php $_smarty_tpl->tpl_vars['CHILD_COMMENTS'] = new Smarty_variable($_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments(), null, 0);?><?php if (!empty($_smarty_tpl->tpl_vars['CHILD_COMMENTS']->value)){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('CommentsListIteration.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('CHILD_COMMENTS_MODEL'=>$_smarty_tpl->tpl_vars['COMMENT']->value->getChildComments()), 0);?>
<?php }?></li><?php } ?></ul><?php }?><?php }} ?>