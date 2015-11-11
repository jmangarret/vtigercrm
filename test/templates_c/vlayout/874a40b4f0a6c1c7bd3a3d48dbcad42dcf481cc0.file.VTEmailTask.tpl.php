<?php /* Smarty version Smarty-3.1.7, created on 2015-04-21 15:47:25
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/Tasks/VTEmailTask.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18504353295536710db92496-77569955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '874a40b4f0a6c1c7bd3a3d48dbcad42dcf481cc0' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/Tasks/VTEmailTask.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18504353295536710db92496-77569955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'TASK_OBJECT' => 0,
    'FROM_EMAIL_FIELD_OPTION' => 0,
    'EMAIL_FIELD_OPTION' => 0,
    'ALL_FIELD_OPTIONS' => 0,
    'META_VARIABLES' => 0,
    'META_VARIABLE_KEY' => 0,
    'META_VARIABLE_VALUE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5536710dda2ea',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5536710dda2ea')) {function content_5536710dda2ea($_smarty_tpl) {?>
<div id="VtEmailTaskContainer"><div class="row-fluid"><div class="row-fluid padding-bottom1per"><span class="span7 row-fluid"><span class="span2"><?php echo vtranslate('LBL_FROM',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><input data-validation-engine='validate[]' name="fromEmail" class="span9 fields" type="text" value="<?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->fromEmail;?>
" /></span><span class="span5"><select id="fromEmailOption" style="min-width: 300px" class="chzn-select" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option><?php echo $_smarty_tpl->tpl_vars['FROM_EMAIL_FIELD_OPTION']->value;?>
</select></span></div><div class="row-fluid padding-bottom1per"><span class="span7 row-fluid"><span class="span2"><?php echo vtranslate('LBL_TO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></span><input data-validation-engine='validate[required]' name="recepient" class="span9 fields" type="text" value="<?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->recepient;?>
" /></span><span class="span5"><select style="min-width: 300px" class="task-fields chzn-select" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option><?php echo $_smarty_tpl->tpl_vars['EMAIL_FIELD_OPTION']->value;?>
</select></span></div><div class="row-fluid padding-bottom1per <?php if (empty($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailcc)){?>hide <?php }?>" id="ccContainer"><span class="span7 row-fluid"><span class="span2"><?php echo vtranslate('LBL_CC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><input class="span9 fields" type="text" name="emailcc" value="<?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailcc;?>
" /></span><span class="span5"><select class="task-fields" data-placeholder='<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
' style="min-width: 300px"><option></option><?php echo $_smarty_tpl->tpl_vars['EMAIL_FIELD_OPTION']->value;?>
</select></span></div><div class="row-fluid padding-bottom1per <?php if (empty($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailbcc)){?>hide <?php }?>" id="bccContainer"><span class="span7 row-fluid"><span class="span2"><?php echo vtranslate('LBL_BCC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span><input class="span9 fields" type="text" name="emailbcc" value="<?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailbcc;?>
" /></span><span class="span5"><select class="task-fields" data-placeholder='<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
' style="min-width: 300px"><option></option><?php echo $_smarty_tpl->tpl_vars['EMAIL_FIELD_OPTION']->value;?>
</select></span></div><div class="row-fluid padding-bottom1per <?php if ((!empty($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailcc))&&(!empty($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailbcc))){?> hide <?php }?>"><span class="span8 row-fluid"><span class="span2">&nbsp;</span><span class="span9"><a class="cursorPointer <?php if ((!empty($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailcc))){?>hide<?php }?>" id="ccLink"><?php echo vtranslate('LBL_ADD_CC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>&nbsp;&nbsp;<a class="cursorPointer <?php if ((!empty($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->emailbcc))){?>hide<?php }?>" id="bccLink"><?php echo vtranslate('LBL_ADD_BCC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></span></span></div><div class="row-fluid padding-bottom1per"><span class="span7 row-fluid"><span class="span2"><?php echo vtranslate('LBL_SUBJECT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<span class="redColor">*</span></span><input data-validation-engine='validate[required]' name="subject" class="span9 fields" type="text" name="subject" value="<?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->subject;?>
" id="subject"/></span><span class="span5"><select style="min-width: 300px" class="task-fields chzn-select" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option><?php echo $_smarty_tpl->tpl_vars['ALL_FIELD_OPTIONS']->value;?>
</select></span></div><div class="row-fluid padding-bottom1per"><span class="span7 row-fluid"><span style="margin-top: 7px" class="span2"><?php echo vtranslate('LBL_ADD_FIELD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>&nbsp;&nbsp;<span class="span8"><select style="min-width: 250px" id="task-fieldnames" class="chzn-select" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option><?php echo $_smarty_tpl->tpl_vars['ALL_FIELD_OPTIONS']->value;?>
</select></span></span><span class="span5 row-fluid"><span style="margin-top: 7px" class="span3"><?php echo vtranslate('LBL_ADD_TIME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>&nbsp;&nbsp;<span class="span8"><select style="width: 215px" id="task_timefields" class="chzn-select" data-placeholder=<?php echo vtranslate('LBL_SELECT_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
><option></option><?php  $_smarty_tpl->tpl_vars['META_VARIABLE_KEY'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->_loop = false;
 $_smarty_tpl->tpl_vars['META_VARIABLE_VALUE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['META_VARIABLES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->key => $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->value){
$_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->_loop = true;
 $_smarty_tpl->tpl_vars['META_VARIABLE_VALUE']->value = $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->key;
?><option value="$<?php echo $_smarty_tpl->tpl_vars['META_VARIABLE_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['META_VARIABLE_VALUE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php } ?></select></span></span></div><div class="row-fluid padding-bottom1per"><textarea id="content" name="content"><?php echo $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->content;?>
</textarea></div></div></div>	<?php }} ?>