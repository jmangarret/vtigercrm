<?php /* Smarty version Smarty-3.1.7, created on 2015-02-20 16:43:50
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/Step1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12845630154e764461f7f37-67735408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec487a07da45b997bd2b469b0a7e52f62dd29a47' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/Step1.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12845630154e764461f7f37-67735408',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'IS_DUPLICATE' => 0,
    'RECORD_ID' => 0,
    'RELATED_MODULES' => 0,
    'REPORT_MODEL' => 0,
    'REPORT_FOLDERS' => 0,
    'REPORT_FOLDER' => 0,
    'MODULELIST' => 0,
    'RELATED_MODULE_KEY' => 0,
    'PRIMARY_MODULE' => 0,
    'PARENT' => 0,
    'PRIMARY_RELATED_MODULES' => 0,
    'PRIMARY_RELATED_MODULE' => 0,
    'SECONDARY_MODULES_ARR' => 0,
    'PRIMARY_RELATED_MODULE_LABEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e764463c561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e764463c561')) {function content_54e764463c561($_smarty_tpl) {?>
<div class="reportContents"><form class="form-horizontal recordEditView" id="report_step1" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="view" value="Edit" /><input type="hidden" name="mode" value="step2" /><input type="hidden" class="step" value="1" /><input type="hidden" name="isDuplicate" value="<?php echo $_smarty_tpl->tpl_vars['IS_DUPLICATE']->value;?>
" /><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><input type=hidden id="relatedModules" data-value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['RELATED_MODULES']->value);?>
' /><div class="well contentsBackground"><div class="row-fluid padding1per"><span class="span3"><?php echo vtranslate('LBL_REPORT_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></span><span class="span7 row-fluid"><input class="span6" data-validation-engine='validate[required]' type="text" name="reportname" value="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('reportname');?>
"/></span></div><div class="row-fluid padding1per"><span class="span3"><?php echo vtranslate('LBL_REPORT_FOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></span><span class="span7 row-fluid"><select class="chzn-select span6" name="folderid"><optgroup><?php  $_smarty_tpl->tpl_vars['REPORT_FOLDER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['REPORT_FOLDER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['REPORT_FOLDERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['REPORT_FOLDER']->key => $_smarty_tpl->tpl_vars['REPORT_FOLDER']->value){
$_smarty_tpl->tpl_vars['REPORT_FOLDER']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['REPORT_FOLDER']->value->getId();?>
"<?php if ($_smarty_tpl->tpl_vars['REPORT_FOLDER']->value->getId()==$_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('folderid')){?>selected=""<?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['REPORT_FOLDER']->value->getName(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php } ?></optgroup></select></span></div><div class="row-fluid padding1per"><span class="span3"><?php echo vtranslate('LBL_DESCRIPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span><span class="span7"><textarea class="span6" type="text" name="description" ><?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('description');?>
</textarea></span></div><div class="row-fluid padding1per"><span class="span3"><?php echo vtranslate('PRIMARY_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span></span><span class="span7 row-fluid"><select class="span6 chzn-select" id="primary_module" name="primary_module"><optgroup><?php  $_smarty_tpl->tpl_vars['RELATED_MODULE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED_MODULE']->_loop = false;
 $_smarty_tpl->tpl_vars['RELATED_MODULE_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MODULELIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_MODULE']->key => $_smarty_tpl->tpl_vars['RELATED_MODULE']->value){
$_smarty_tpl->tpl_vars['RELATED_MODULE']->_loop = true;
 $_smarty_tpl->tpl_vars['RELATED_MODULE_KEY']->value = $_smarty_tpl->tpl_vars['RELATED_MODULE']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE_KEY']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getPrimaryModule()==$_smarty_tpl->tpl_vars['RELATED_MODULE_KEY']->value){?> selected="selected" <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['RELATED_MODULE_KEY']->value,$_smarty_tpl->tpl_vars['RELATED_MODULE_KEY']->value);?>
</option><?php } ?></optgroup></select></span></div><div class="row-fluid padding1per"><span class="span3"><div><?php echo vtranslate('LBL_SELECT_RELATED_MODULES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><div>(<?php echo vtranslate('LBL_MAX',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;2)</div></span><span class="span7 row-fluid"><?php $_smarty_tpl->tpl_vars['SECONDARY_MODULES_ARR'] = new Smarty_variable(explode(':',$_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getSecondaryModules()), null, 0);?><?php $_smarty_tpl->tpl_vars['PRIMARY_MODULE'] = new Smarty_variable($_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getPrimaryModule(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value==''){?><?php  $_smarty_tpl->tpl_vars['RELATED'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RELATED']->_loop = false;
 $_smarty_tpl->tpl_vars['PARENT'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RELATED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['relatedlist']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['RELATED']->key => $_smarty_tpl->tpl_vars['RELATED']->value){
$_smarty_tpl->tpl_vars['RELATED']->_loop = true;
 $_smarty_tpl->tpl_vars['PARENT']->value = $_smarty_tpl->tpl_vars['RELATED']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['relatedlist']['index']++;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['relatedlist']['index']==0){?><?php $_smarty_tpl->tpl_vars['PRIMARY_MODULE'] = new Smarty_variable($_smarty_tpl->tpl_vars['PARENT']->value, null, 0);?><?php }?><?php } ?><?php }?><?php $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULES'] = new Smarty_variable($_smarty_tpl->tpl_vars['RELATED_MODULES']->value[$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value], null, 0);?><select class="span6 select2-container" id="secondary_module" multiple name="secondary_modules[]" data-placeholder="<?php echo vtranslate('LBL_SELECT_RELATED_MODULES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php  $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL']->_loop = false;
 $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL']->key => $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL']->value){
$_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL']->_loop = true;
 $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE']->value = $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL']->key;
?><option <?php if (in_array($_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULES_ARR']->value)){?> selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PRIMARY_RELATED_MODULE_LABEL']->value;?>
</option><?php } ?></select></span></div></div><div class="pull-right"><button type="submit" class="btn btn-success nextStep"><strong><?php echo vtranslate('LBL_NEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<a onclick='window.history.back()' class="cancelLink cursorPointer"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div></form></div><?php }} ?>