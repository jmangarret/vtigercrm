<?php /* Smarty version Smarty-3.1.7, created on 2015-05-29 12:49:52
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/MiniListWizard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57515728955689fb8975422-35334008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6804307fc95b1aa914b2e7c04720d1db1c559dfe' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/MiniListWizard.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57515728955689fb8975422-35334008',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'WIZARD_STEP' => 0,
    'MODULE' => 0,
    'MODULES' => 0,
    'MODULE_NAME' => 0,
    'ALLFILTERS' => 0,
    'FILTERGROUP' => 0,
    'FILTERS' => 0,
    'FILTER' => 0,
    'LIST_VIEW_CONTROLLER' => 0,
    'FIELD_NAME' => 0,
    'FIELD' => 0,
    'SELECTED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55689fb8ae3cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55689fb8ae3cf')) {function content_55689fb8ae3cf($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['WIZARD_STEP']->value=='step1'){?><div id="minilistWizardContainer" class='modelContainer'><div class="modal-header contentsBackground"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">&times;</button><h3 id="massEditHeader"><?php echo vtranslate('LBL_MINI_LIST',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><form class="form-horizontal" method="post" action="javascript:;"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="MassSave" /><table class="table table-bordered"><tbody><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('LBL_SELECT_MODULE');?>
</td><td class="fieldValue"><select class="span4" name="module"><option></option><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_NAME']->value = $_smarty_tpl->tpl_vars['MODULE_MODEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } ?></select></td></tr><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('LBL_FILTER');?>
</td><td class="fieldValue"><select class="span4" name="filterid"><option></option></select></td></tr><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('LBL_EDIT_FIELDS');?>
</td><td class="fieldValue"><select class="span4" name="fields" size="2" multiple="true"><option></option></select></td></tr></tbody></table><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }elseif($_smarty_tpl->tpl_vars['WIZARD_STEP']->value=='step2'){?><option></option><?php  $_smarty_tpl->tpl_vars['FILTERS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FILTERS']->_loop = false;
 $_smarty_tpl->tpl_vars['FILTERGROUP'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALLFILTERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FILTERS']->key => $_smarty_tpl->tpl_vars['FILTERS']->value){
$_smarty_tpl->tpl_vars['FILTERS']->_loop = true;
 $_smarty_tpl->tpl_vars['FILTERGROUP']->value = $_smarty_tpl->tpl_vars['FILTERS']->key;
?><optgroup label="<?php echo $_smarty_tpl->tpl_vars['FILTERGROUP']->value;?>
"><?php  $_smarty_tpl->tpl_vars['FILTER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FILTER']->_loop = false;
 $_smarty_tpl->tpl_vars['FILTERNAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['FILTERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FILTER']->key => $_smarty_tpl->tpl_vars['FILTER']->value){
$_smarty_tpl->tpl_vars['FILTER']->_loop = true;
 $_smarty_tpl->tpl_vars['FILTERNAME']->value = $_smarty_tpl->tpl_vars['FILTER']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['FILTER']->value->get('viewname');?>
</option><?php } ?></optgroup><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['WIZARD_STEP']->value=='step3'){?><option></option><?php  $_smarty_tpl->tpl_vars['FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LIST_VIEW_CONTROLLER']->value->getListViewHeaderFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD']->key => $_smarty_tpl->tpl_vars['FIELD']->value){
$_smarty_tpl->tpl_vars['FIELD']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_NAME']->value = $_smarty_tpl->tpl_vars['FIELD']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value->getFieldLabelKey(),$_smarty_tpl->tpl_vars['SELECTED_MODULE']->value);?>
</option><?php } ?><?php }?><?php }} ?>