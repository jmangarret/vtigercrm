<?php /* Smarty version Smarty-3.1.7, created on 2015-02-05 15:23:22
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/LayoutEditor/RelatedList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95655502554d38aea2a7f25-45822980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcada654d6a4818c5170563ae87e409f28f57e04' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/LayoutEditor/RelatedList.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95655502554d38aea2a7f25-45822980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RELATED_MODULES' => 0,
    'QUALIFIED_MODULE' => 0,
    'MODULE_MODEL' => 0,
    'removedModuleIds' => 0,
    'ModulesList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d38aea46195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d38aea46195')) {function content_54d38aea46195($_smarty_tpl) {?>
<div class="relatedTabModulesList"><?php if (empty($_smarty_tpl->tpl_vars['RELATED_MODULES']->value)){?><div class="emptyRelatedTabs"><div class="recordDetails"><p class="textAlignCenter"><?php echo vtranslate('LBL_NO_RELATED_INFORMATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p></div></div><?php }else{ ?><div class="relatedListContainer"><div class="row-fluid"><div class="span2"><strong><?php echo vtranslate('LBL_ARRANGE_RELATED_LIST',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></div><div class="span10 row-fluid"><span class="span5"><ul class="relatedModulesList" style="list-style: none;"><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()){?><li class="relatedModule module_<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId();?>
 border1px contentsBackground" style="width: 200px; padding: 5px;" data-relation-id="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId();?>
"><a><img src="<?php echo vimage_path('drag.png');?>
" title="<?php echo vtranslate('LBL_DRAG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"/></a>&nbsp;&nbsp;<span class="moduleLabel"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getRelationModuleName());?>
</span><button class="close" data-dismiss="modal" title="<?php echo vtranslate('LBL_CLOSE');?>
">x</button></li><?php }?><?php } ?></ul></span><span class="span7"><i class="icon-info-sign alignMiddle"></i>&nbsp;<?php echo vtranslate('LBL_RELATED_LIST_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
.<br><br><i class="icon-info-sign alignMiddle"></i>&nbsp;<?php echo vtranslate('LBL_REMOVE_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
.<br><br><i class="icon-info-sign alignMiddle"></i>&nbsp;<?php echo vtranslate('LBL_ADD_MODULE_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div></div><div class="row-fluid"><div class="span2"><strong><?php echo vtranslate('LBL_SELECT_MODULE_TO_ADD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></div><div class="span10"><?php $_smarty_tpl->tpl_vars['ModulesList'] = new Smarty_variable(array(), null, 0);?><?php $_smarty_tpl->tpl_vars['removedModuleIds'] = new Smarty_variable(array(), null, 0);?><ul style="list-style: none;"><li><span class="row-fluid"><select class="select2 span3" multiple name="addToList" placeholder="<?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['RELATED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
?><?php $_smarty_tpl->createLocalArrayVariable('ModulesList', null, 0);
$_smarty_tpl->tpl_vars['ModulesList']->value[$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId()] = vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getRelationModuleName());?><?php if (!$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()){?><?php echo array_push($_smarty_tpl->tpl_vars['removedModuleIds']->value,$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId());?>
<option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getId();?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getRelationModuleName());?>
</option><?php }?><?php } ?></select></span></li></ul><input type="hidden" class="ModulesListArray" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['ModulesList']->value);?>
' /><input type="hidden" class="RemovedModulesListArray" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['removedModuleIds']->value);?>
' /></div></div><li class="moduleCopy hide border1px contentsBackground" style="width: 200px; padding: 5px;"><a><img src="<?php echo vimage_path('drag.png');?>
" title="<?php echo vtranslate('LBL_DRAG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"/></a>&nbsp;&nbsp;<span class="moduleLabel"></span><button class="close" data-dismiss="modal" title="<?php echo vtranslate('LBL_CLOSE');?>
">x</button></li><div class="row-fluid"><span class="pull-right"><button class="btn btn-success saveRelatedList" type="button" disabled="disabled"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span></div></div><?php }?></div><?php }} ?>