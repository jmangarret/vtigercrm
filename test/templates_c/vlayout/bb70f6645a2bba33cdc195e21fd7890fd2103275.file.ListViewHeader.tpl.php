<?php /* Smarty version Smarty-3.1.7, created on 2015-02-05 20:27:18
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/ListViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89617162554d3d2263ee667-33407918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb70f6645a2bba33cdc195e21fd7890fd2103275' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Workflows/ListViewHeader.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89617162554d3d2263ee667-33407918',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
    'CRON_RECORD_MODEL' => 0,
    'MODULE_MODEL' => 0,
    'SUPPORTED_MODULE_MODELS' => 0,
    'SOURCE_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d3d2265733c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d3d2265733c')) {function content_54d3d2265733c($_smarty_tpl) {?>
<div class="listViewPageDiv"><div class="listViewTopMenuDiv"><div class="row-fluid"><label class=" pull-left themeTextColor font-x-x-large"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="pull-right"><b><?php if ($_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->isDisabled()){?><?php echo vtranslate('LBL_DISABLED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->isRunning()){?><?php echo vtranslate('LBL_RUNNING',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->isEnabled()){?><?php if ($_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->hadTimedout){?><?php echo vtranslate('LBL_LAST_SCAN_TIMED_OUT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
.<?php }elseif($_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->getLastEndDateTime()!=''){?><?php echo vtranslate('LBL_LAST_SCAN_AT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php echo $_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->getLastEndDateTime();?>
&<?php echo vtranslate('LBL_TIME_TAKEN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:<?php echo $_smarty_tpl->tpl_vars['CRON_RECORD_MODEL']->value->getTimeDiff();?>
<?php echo vtranslate('LBL_SHORT_SECONDS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php }?><?php }?></b></div></div><hr><div class="row-fluid"><span class="span4 btn-toolbar"><button class="btn addButton" <?php if (stripos($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateViewUrl(),'javascript:')===0){?> onclick="<?php echo substr($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateViewUrl(),strlen('javascript:'));?>
;"<?php }else{ ?> onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateViewUrl();?>
"' <?php }?>><i class="icon-plus icon-white"></i>&nbsp;<strong><?php echo vtranslate('LBL_NEW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php echo vtranslate('LBL_WORKFLOW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></span><span class="span4 btn-toolbar"><select class="chzn-select" id="moduleFilter" ><option value=""><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['TAB_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SUPPORTED_MODULE_MODELS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->key => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value){
$_smarty_tpl->tpl_vars['MODULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['TAB_ID']->value = $_smarty_tpl->tpl_vars['MODULE_MODEL']->key;
?><option <?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value==$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName()){?> selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName();?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName(),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName());?>
</option><?php } ?></select></span><span class="span4 btn-toolbar"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListViewActions.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</span></div><div class="clearfix"></div></div><div class="listViewContentDiv" id="listViewContents">
<?php }} ?>