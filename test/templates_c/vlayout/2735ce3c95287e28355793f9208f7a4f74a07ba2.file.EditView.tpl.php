<?php /* Smarty version Smarty-3.1.7, created on 2015-02-05 20:59:44
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/PickListDependency/EditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102605068254d3d9c0cc1430-67606787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2735ce3c95287e28355793f9208f7a4f74a07ba2' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/PickListDependency/EditView.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102605068254d3d9c0cc1430-67606787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'MAPPED_VALUES' => 0,
    'PICKLIST_MODULES_LIST' => 0,
    'MODULE_MODEL' => 0,
    'MODULE_NAME' => 0,
    'SELECTED_MODULE' => 0,
    'PICKLIST_FIELDS' => 0,
    'FIELD_NAME' => 0,
    'RECORD_MODEL' => 0,
    'FIELD_LABEL' => 0,
    'DEPENDENCY_GRAPH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d3d9c0e4ca8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d3d9c0e4ca8')) {function content_54d3d9c0e4ca8($_smarty_tpl) {?>
<div class="container-fluid"><div class="widget_header"><h3><?php echo vtranslate('LBL_PICKLIST_DEPENDENCY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><hr><div class="contents row-fluid"><form id="pickListDependencyForm" class="form-horizontal"><?php if (!empty($_smarty_tpl->tpl_vars['MAPPED_VALUES']->value)){?><input type="hidden" class="editDependency" value="true"/><?php }?><div class="row-fluid"><div class="control-group"><label class="muted control-label"><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><span class="row-fluid"><select name="sourceModule" class="select2 span3"><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_MODULES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value==$_smarty_tpl->tpl_vars['SELECTED_MODULE']->value){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'));?>
</option><?php } ?></select></span></div></div></div><div class="row-fluid"><div class="span4 control-group"><label class="muted control-label"><?php echo vtranslate('LBL_SOURCE_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><span class="row-fluid"><select id="sourceField" name="sourceField" class="select2 row-fluid" data-placeholder="<?php echo vtranslate('LBL_SELECT_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><option value=''></option><?php  $_smarty_tpl->tpl_vars['FIELD_LABEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_LABEL']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_LABEL']->key => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value){
$_smarty_tpl->tpl_vars['FIELD_LABEL']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_NAME']->value = $_smarty_tpl->tpl_vars['FIELD_LABEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('sourcefield')==$_smarty_tpl->tpl_vars['FIELD_NAME']->value){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SELECTED_MODULE']->value);?>
</option><?php } ?></select></span></div></div><div class="span4 control-group marginLeftZero"><label class="muted control-label"><?php echo vtranslate('LBL_TARGET_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls"><span class="row-fluid"><select id="targetField" name="targetField" class="select2 row-fluid" data-placeholder="<?php echo vtranslate('LBL_SELECT_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><option value=''></option><?php  $_smarty_tpl->tpl_vars['FIELD_LABEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_LABEL']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_LABEL']->key => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value){
$_smarty_tpl->tpl_vars['FIELD_LABEL']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_NAME']->value = $_smarty_tpl->tpl_vars['FIELD_LABEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('targetfield')==$_smarty_tpl->tpl_vars['FIELD_NAME']->value){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SELECTED_MODULE']->value);?>
</option><?php } ?></select></span></div></div></div><div class="row-fluid hide errorMessage"><div class="alert alert-error"><strong><?php echo vtranslate('LBL_ERR_CYCLIC_DEPENDENCY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></div></div><div id="dependencyGraph"><?php if ($_smarty_tpl->tpl_vars['DEPENDENCY_GRAPH']->value){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DependencyGraph.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?></div></form></div></div></div>
<?php }} ?>