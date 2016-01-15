<?php /* Smarty version Smarty-3.1.7, created on 2016-01-15 12:16:01
         compiled from "/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/AdvanceSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83119539256992249935ab8-65614483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89424cc0680f9b8a57f8345fc0efe1d127ff48bb' => 
    array (
      0 => '/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/AdvanceSearch.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83119539256992249935ab8-65614483',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'SEARCHABLE_MODULES' => 0,
    'MODULE_NAME' => 0,
    'SOURCE_MODULE' => 0,
    'SOURCE_MODULE_MODEL' => 0,
    'SAVE_FILTER_PERMITTED' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_56992249a3c8d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56992249a3c8d')) {function content_56992249a3c8d($_smarty_tpl) {?>
<div id="advanceSearchContainer"><div class="row-fluid padding1per"><div class="span"> &nbsp; </div><div class="span11 paddingTop10"><div class="row-fluid"><span class="span3">&nbsp;</span><span class="span"><label class="highLight pushDown"><strong><?php echo vtranslate('LBL_SEARCH_IN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></label></span><span class="span"><select class="chzn-select" id="searchModuleList" data-placeholder="<?php echo vtranslate('LBL_SELECT_MODULE');?>
"><option></option><?php  $_smarty_tpl->tpl_vars['fieldObject'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldObject']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SEARCHABLE_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldObject']->key => $_smarty_tpl->tpl_vars['fieldObject']->value){
$_smarty_tpl->tpl_vars['fieldObject']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_NAME']->value = $_smarty_tpl->tpl_vars['fieldObject']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value==$_smarty_tpl->tpl_vars['SOURCE_MODULE']->value){?>selected="selected"<?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } ?></select></span></div><div class="filterElements"><form name="advanceFilterForm"><?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value=='Home'){?><div class="textAlignCenter marginBottom10px well contentsBackground"><?php echo vtranslate('LBL_PLEASE_SELECT_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div><?php }else{ ?><input type="hidden" name="labelFields" data-value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SOURCE_MODULE_MODEL']->value->getNameFields());?>
' /><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('AdvanceFilter.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?></form><div class="row-fluid actions"><!-- TODO: should be done in better way to show right elements --><div class="span5"><?php if ($_smarty_tpl->tpl_vars['SAVE_FILTER_PERMITTED']->value){?><div class="row-fluid"><span class="span4">&nbsp;</span><span class="span7"><input class="zeroOpacity row-fluid" type="text" value="" name="viewname"/></span></div><?php }else{ ?>&nbsp;<?php }?></div><div class="span7"><span class="btn-toolbar"><span class="btn-group"></span><span class="btn-group  pull-right pushDown"><a class="cancelLink" type="reset" id="advanceSearchCancel" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></span><span class="btn-group pull-right"><button class="btn" id="advanceSearchButton" <?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value=='Home'){?> disabled="" <?php }?>  type="submit"><strong><?php echo vtranslate('LBL_SEARCH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span><?php if ($_smarty_tpl->tpl_vars['SAVE_FILTER_PERMITTED']->value){?><span class="btn-group pull-right "><button class="btn hide" <?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value=='Home'){?> disabled="" <?php }?> id="advanceSave"><strong><?php echo vtranslate('LBL_SAVE_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span><span class="btn-group pull-right"><button class="btn" <?php if ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value=='Home'){?> disabled="" <?php }?> id="advanceIntiateSave"><strong><?php echo vtranslate('LBL_SAVE_AS_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span><?php }?></span></div></div></div></div></div></div><?php }} ?>