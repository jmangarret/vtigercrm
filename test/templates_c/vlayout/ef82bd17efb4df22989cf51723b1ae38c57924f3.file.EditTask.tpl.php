<?php /* Smarty version Smarty-3.1.7, created on 2015-02-05 20:29:01
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/EditTask.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128989218554d3d28d245bd3-07876190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef82bd17efb4df22989cf51723b1ae38c57924f3' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/EditTask.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128989218554d3d28d245bd3-07876190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'TASK_TYPE_MODEL' => 0,
    'MODULE' => 0,
    'WORKFLOW_ID' => 0,
    'TASK_ID' => 0,
    'TASK_MODEL' => 0,
    'TASK_OBJECT' => 0,
    'trigger' => 0,
    'days' => 0,
    'direction' => 0,
    'DATETIME_FIELDS' => 0,
    'DATETIME_FIELD' => 0,
    'TASK_TEMPLATE_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d3d28d41376',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d3d28d41376')) {function content_54d3d28d41376($_smarty_tpl) {?>
<div class='modelContainer' id="addTaskContainer"><div class="modal-header contentsBackground"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3><?php echo vtranslate('LBL_ADD_TASKS_FOR_WORKFLOW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 -> <?php echo $_smarty_tpl->tpl_vars['TASK_TYPE_MODEL']->value->get('label');?>
</h3></div><form class="form-horizontal" id="saveTask" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="parent" value="Settings" /><input type="hidden" name="action" value="TaskAjax" /><input type="hidden" name="mode" value="Save" /><input type="hidden" name="for_workflow" value="<?php echo $_smarty_tpl->tpl_vars['WORKFLOW_ID']->value;?>
" /><input type="hidden" name="task_id" value="<?php echo $_smarty_tpl->tpl_vars['TASK_ID']->value;?>
" /><input type="hidden" name="taskType" id="taskType" value="<?php echo $_smarty_tpl->tpl_vars['TASK_TYPE_MODEL']->value->get('tasktypename');?>
" /><div id="scrollContainer"><div class="modal-body tabbable"><div class="row-fluid padding-bottom1per"><span class="span8 row-fluid"><div class="span3"><?php echo vtranslate('LBL_TASK_TITLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></div><div class="span9 row-fluid"><input name="summary" class="span12" data-validation-engine='validate[required]' type="text" value="<?php echo $_smarty_tpl->tpl_vars['TASK_MODEL']->value->get('summary');?>
" /></div></span><span class="span">&nbsp;</span><span class="span3 row-fluid"><div class="span3"><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="span9"><input type="radio" name="active" class="alignTop" <?php if ($_smarty_tpl->tpl_vars['TASK_MODEL']->value->get('status')==1){?> checked="" <?php }?> value="true">&nbsp;<?php echo vtranslate('LBL_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;<input type="radio" name="active" class="alignTop" <?php if ($_smarty_tpl->tpl_vars['TASK_MODEL']->value->get('status')!=1){?> checked="" <?php }?> value="false" />&nbsp;<?php echo vtranslate('LBL_IN_ACTIVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></span></div><?php if (($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->trigger!=null)){?><?php $_smarty_tpl->tpl_vars['trigger'] = new Smarty_variable($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->trigger, null, 0);?><?php $_smarty_tpl->tpl_vars['days'] = new Smarty_variable($_smarty_tpl->tpl_vars['trigger']->value['days'], null, 0);?><?php if (($_smarty_tpl->tpl_vars['days']->value<0)){?><?php $_smarty_tpl->tpl_vars['days'] = new Smarty_variable($_smarty_tpl->tpl_vars['days']->value*-1, null, 0);?><?php $_smarty_tpl->tpl_vars['direction'] = new Smarty_variable('before', null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['direction'] = new Smarty_variable('after', null, 0);?><?php }?><?php }?><div class="row-fluid padding-bottom1per"><div class="span2"><input type="checkbox" class="alignTop" name="check_select_date" <?php if ($_smarty_tpl->tpl_vars['trigger']->value!=null){?>checked<?php }?>/>&nbsp;<?php echo vtranslate('LBL_EXECUTE_TASK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="span10 row-fluid <?php if ($_smarty_tpl->tpl_vars['trigger']->value!=null){?>show <?php }else{ ?> hide <?php }?>" id="checkSelectDateContainer"><span class="span2 row-fluid"><input class="span6" type="text" name="select_date_days" value="<?php echo $_smarty_tpl->tpl_vars['days']->value;?>
" data-validation-engine="validate[funcCall[Vtiger_WholeNumber_Validator_Js.invokeValidation]]" >&nbsp;<span class="alignMiddle"><?php echo vtranslate('LBL_DAYS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></span><span class="span2 marginLeftZero"><select class="chzn-select" name="select_date_direction" style="width: 100px"><option <?php if ($_smarty_tpl->tpl_vars['direction']->value=='after'){?> selected="" <?php }?> value="after"><?php echo vtranslate('LBL_AFTER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><option <?php if ($_smarty_tpl->tpl_vars['direction']->value=='before'){?> selected="" <?php }?> value="before"><?php echo vtranslate('LBL_BEFORE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option></select></span><span class="span">&nbsp;</span><span class="span6 marginLeftZero"><select class="chzn-select" name="select_date_field"><?php  $_smarty_tpl->tpl_vars['DATETIME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATETIME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DATETIME_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATETIME_FIELD']->key => $_smarty_tpl->tpl_vars['DATETIME_FIELD']->value){
$_smarty_tpl->tpl_vars['DATETIME_FIELD']->_loop = true;
?><option <?php if ($_smarty_tpl->tpl_vars['trigger']->value['field']==$_smarty_tpl->tpl_vars['DATETIME_FIELD']->value->get('name')){?> selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['DATETIME_FIELD']->value->get('name');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['DATETIME_FIELD']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php } ?></select></span></div></div><div class="taskTypeUi well"><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['TASK_TEMPLATE_PATH']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div><?php }} ?>