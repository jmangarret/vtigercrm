<?php /* Smarty version Smarty-3.1.7, created on 2015-02-05 20:27:21
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/Step1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169778114354d3d229afd4c7-58818779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b114723ca4ba5544e99f5b63156a7412632c4e09' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/Step1.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169778114354d3d229afd4c7-58818779',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORDID' => 0,
    'QUALIFIED_MODULE' => 0,
    'MODE' => 0,
    'MODULE_MODEL' => 0,
    'ALL_MODULES' => 0,
    'SELECTED_MODULE' => 0,
    'WORKFLOW_MODEL' => 0,
    'TRIGGER_TYPES' => 0,
    'WORKFLOW_MODEL_OBJ' => 0,
    'LABEL_ID' => 0,
    'SCHEDULED_WORKFLOW_COUNT' => 0,
    'MAX_ALLOWED_SCHEDULED_WORKFLOWS' => 0,
    'LABEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d3d229c29d0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d3d229c29d0')) {function content_54d3d229c29d0($_smarty_tpl) {?>
<div class="workFlowContents" style="padding-left: 3%;padding-right: 3%"><form name="EditWorkflow" action="index.php" method="post" id="workflow_step1" class="form-horizontal"><input type="hidden" name="module" value="Workflows"><input type="hidden" name="view" value="Edit"><input type="hidden" name="mode" value="Step2" /><input type="hidden" name="parent" value="Settings" /><input type="hidden" class="step" value="1" /><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORDID']->value;?>
" /><div class="padding1per" style="border:1px solid #ccc;"><label><strong><?php echo vtranslate('LBL_STEP_1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
: <?php echo vtranslate('LBL_ENTER_BASIC_DETAILS_OF_THE_WORKFLOW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></label><br><div class="control-group"><div class="control-label"><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="controls"><?php if ($_smarty_tpl->tpl_vars['MODE']->value=='edit'){?><input type='text' disabled='disabled' value="<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName(),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName());?>
" ><input type='hidden' name='module_name' value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name');?>
" ><?php }else{ ?><select class="chzn-select" id="moduleName" name="module_name" required="true" data-placeholder="Select Module..."><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['TABID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['TABID']->value = $_smarty_tpl->tpl_vars['MODULE_MODEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName();?>
" <?php if ($_smarty_tpl->tpl_vars['SELECTED_MODULE']->value==$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName()){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName(),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName());?>
</option><?php } ?></select><?php }?></div></div><div class="control-group"><div class="control-label"><?php echo vtranslate('LBL_DESCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></div><div class="controls"><input type="text" name="summary" class="span5" data-validation-engine='validate[required]' value="<?php echo $_smarty_tpl->tpl_vars['WORKFLOW_MODEL']->value->get('summary');?>
" id="summary" /></div></div></div><div class="controls"><?php $_smarty_tpl->tpl_vars['WORKFLOW_MODEL_OBJ'] = new Smarty_variable($_smarty_tpl->tpl_vars['WORKFLOW_MODEL']->value->getWorkflowObject(), null, 0);?><?php  $_smarty_tpl->tpl_vars['LABEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LABEL']->_loop = false;
 $_smarty_tpl->tpl_vars['LABEL_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['TRIGGER_TYPES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LABEL']->key => $_smarty_tpl->tpl_vars['LABEL']->value){
$_smarty_tpl->tpl_vars['LABEL']->_loop = true;
 $_smarty_tpl->tpl_vars['LABEL_ID']->value = $_smarty_tpl->tpl_vars['LABEL']->key;
?><div><label><input type="radio" class="alignTop" name="execution_condition" <?php if ($_smarty_tpl->tpl_vars['WORKFLOW_MODEL_OBJ']->value->executionCondition==$_smarty_tpl->tpl_vars['LABEL_ID']->value){?> checked="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['LABEL_ID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['WORKFLOW_MODEL']->value->getId()==''&&$_smarty_tpl->tpl_vars['SCHEDULED_WORKFLOW_COUNT']->value>=$_smarty_tpl->tpl_vars['MAX_ALLOWED_SCHEDULED_WORKFLOWS']->value&&$_smarty_tpl->tpl_vars['LABEL_ID']->value==6){?> disabled <?php }?> />&nbsp;&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['LABEL']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><br><div class="clearfix"></div></div><?php } ?></div><div class="pull-right"><button class="btn btn-success" type="submit" disabled="disabled"><strong><?php echo vtranslate('LBL_NEXT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button><a class="cancelLink" type="reset" onclick="javascript:window.history.back();"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></div><div class="clearfix"></div></form></div><br><?php }} ?>