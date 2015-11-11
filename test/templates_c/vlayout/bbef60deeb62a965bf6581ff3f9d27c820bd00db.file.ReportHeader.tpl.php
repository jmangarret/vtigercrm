<?php /* Smarty version Smarty-3.1.7, created on 2015-02-20 16:48:46
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/ReportHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117380263654e7656eac6ea7-71214720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbef60deeb62a965bf6581ff3f9d27c820bd00db' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/ReportHeader.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117380263654e7656eac6ea7-71214720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LEFTPANELHIDE' => 0,
    'DATE_FILTERS' => 0,
    'REPORT_MODEL' => 0,
    'MODULE' => 0,
    'COUNT' => 0,
    'DETAILVIEW_LINKS' => 0,
    'DETAILVIEW_LINK' => 0,
    'RECORD_ID' => 0,
    'PRIMARY_MODULE' => 0,
    'PRIMARY_MODULE_RECORD_STRUCTURE' => 0,
    'BLOCK_LABEL' => 0,
    'LINEITEM_FIELD_IN_CALCULATION' => 0,
    'key' => 0,
    'BLOCK_FIELDS' => 0,
    'SECONDARY_MODULE_RECORD_STRUCTURES' => 0,
    'MODULE_LABEL' => 0,
    'SECONDARY_MODULE_RECORD_STRUCTURE' => 0,
    'RECORD_STRUCTURE' => 0,
    'SELECTED_ADVANCED_FILTER_FIELDS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e7656ecc607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e7656ecc607')) {function content_54e7656ecc607($_smarty_tpl) {?>
<div id="toggleButton" class="toggleButton" title="Left Panel Show/Hide"><i id="tButtonImage" class="<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value!='1'){?>icon-chevron-left<?php }else{ ?>icon-chevron-right<?php }?>"></i></div><div class="reportsDetailHeader row-fluid"><input type="hidden" name="date_filters" data-value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATE_FILTERS']->value);?>
' /><div class="reportHeader row-fluid span12"><div class='span4' style="position:relative;left:10px"><?php if ($_smarty_tpl->tpl_vars['REPORT_MODEL']->value->isEditable()==true){?><button onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getEditViewUrl();?>
"' type="button" class="cursorPointer btn"><strong><?php echo vtranslate('LBL_CUSTOMIZE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>&nbsp;<i class="icon-pencil"></i></button>&nbsp;<?php }?><button onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getDuplicateRecordUrl();?>
"' type="button" class="cursorPointer btn"><strong><?php echo vtranslate('LBL_DUPLICATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div><div class='span4 textAlignCenter'><h3><?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getName();?>
</h3><div id="noOfRecords"><?php echo vtranslate('LBL_NO_OF_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <span id="countValue"><?php echo $_smarty_tpl->tpl_vars['COUNT']->value;?>
</span></div></div><div class='span4'><span class="pull-right" style='margin-right:50px;'><?php  $_smarty_tpl->tpl_vars['DETAILVIEW_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->key => $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value){
$_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->_loop = true;
?><img class="cursorPointer alignBottom" onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getUrl();?>
"' src="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->get('linkicon');?>
<?php $_tmp1=ob_get_clean();?><?php echo vimage_path($_tmp1);?>
" alt="<?php echo vtranslate($_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
" title="<?php echo vtranslate($_smarty_tpl->tpl_vars['DETAILVIEW_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
" />&nbsp;<?php } ?></span></div></div><div class="well contentsBackground span11"><input type="hidden" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><?php $_smarty_tpl->tpl_vars['RECORD_STRUCTURE'] = new Smarty_variable(array(), null, 0);?><?php $_smarty_tpl->tpl_vars['PRIMARY_MODULE_LABEL'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value), null, 0);?><?php  $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = false;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['PRIMARY_MODULE_RECORD_STRUCTURE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value){
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = true;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key;
?><?php $_smarty_tpl->tpl_vars['PRIMARY_MODULE_BLOCK_LABEL'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable(($_smarty_tpl->tpl_vars['PRIMARY_MODULE_LABEL']->value)." ".($_smarty_tpl->tpl_vars['PRIMARY_MODULE_BLOCK_LABEL']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['LINEITEM_FIELD_IN_CALCULATION']->value==false&&$_smarty_tpl->tpl_vars['BLOCK_LABEL']->value=='LBL_ITEM_DETAILS'){?><?php }else{ ?><?php $_smarty_tpl->createLocalArrayVariable('RECORD_STRUCTURE', null, 0);
$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value[$_smarty_tpl->tpl_vars['key']->value] = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value;?><?php }?><?php } ?><?php  $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_LABEL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE']->key => $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE']->value){
$_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_LABEL']->value = $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE']->key;
?><?php $_smarty_tpl->tpl_vars['SECONDARY_MODULE_LABEL'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['MODULE_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE_LABEL']->value), null, 0);?><?php  $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = false;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SECONDARY_MODULE_RECORD_STRUCTURE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value){
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = true;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key;
?><?php $_smarty_tpl->tpl_vars['SECONDARY_MODULE_BLOCK_LABEL'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE_LABEL']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable(($_smarty_tpl->tpl_vars['SECONDARY_MODULE_LABEL']->value)." ".($_smarty_tpl->tpl_vars['SECONDARY_MODULE_BLOCK_LABEL']->value), null, 0);?><?php $_smarty_tpl->createLocalArrayVariable('RECORD_STRUCTURE', null, 0);
$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value[$_smarty_tpl->tpl_vars['key']->value] = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value;?><?php } ?><?php } ?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('AdvanceFilter.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'ADVANCE_CRITERIA'=>$_smarty_tpl->tpl_vars['SELECTED_ADVANCED_FILTER_FIELDS']->value,'COLUMNNAME_API'=>'getReportFilterColumnName'), 0);?>
<div class="row"><div class="span4 offset5"><input type="button" class="btn generateReport" data-mode="generate" value="<?php echo vtranslate('LBL_GENERATE_NOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"/>&nbsp;<input type="button" class="btn btn-success generateReport" data-mode="save" value="<?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" /></div></div></div></div><div id="reportContentsDiv"><?php }} ?>