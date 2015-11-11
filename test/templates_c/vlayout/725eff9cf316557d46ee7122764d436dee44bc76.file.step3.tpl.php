<?php /* Smarty version Smarty-3.1.7, created on 2015-02-20 16:47:38
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/step3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150101417254e7652a974512-38603741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '725eff9cf316557d46ee7122764d436dee44bc76' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/step3.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150101417254e7652a974512-38603741',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'RECORD_ID' => 0,
    'REPORT_MODEL' => 0,
    'PRIMARY_MODULE' => 0,
    'SECONDARY_MODULES' => 0,
    'IS_DUPLICATE' => 0,
    'DATE_FILTERS' => 0,
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
  'unifunc' => 'content_54e7652ab3f68',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e7652ab3f68')) {function content_54e7652ab3f68($_smarty_tpl) {?>
<form class="form-horizontal recordEditView" id="report_step3" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="Save" /><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><input type="hidden" name="reportname" value="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('reportname');?>
" /><input type="hidden" name="folderid" value="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('folderid');?>
" /><input type="hidden" name="reports_description" value="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('description');?>
" /><input type="hidden" name="primary_module" value="<?php echo $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value;?>
" /><input type="hidden" name="secondary_modules" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SECONDARY_MODULES']->value);?>
 /><input type="hidden" name="selected_fields" id="seleted_fields" value='<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('selected_fields');?>
' /><input type="hidden" name="selected_sort_fields" id="selected_sort_fields" value=<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('selected_sort_fields');?>
 /><input type="hidden" name="selected_calculation_fields" id="calculation_fields" value=<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->get('calculation_fields');?>
 /><input type="hidden" name="advanced_filter" id="advanced_filter" value="" /><input type="hidden" name="isDuplicate" value="<?php echo $_smarty_tpl->tpl_vars['IS_DUPLICATE']->value;?>
" /><input type="hidden" class="step" value="3" /><input type="hidden" name="date_filters" data-value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATE_FILTERS']->value));?>
' /><?php $_smarty_tpl->tpl_vars['RECORD_STRUCTURE'] = new Smarty_variable(array(), null, 0);?><?php $_smarty_tpl->tpl_vars['PRIMARY_MODULE_LABEL'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value), null, 0);?><?php  $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = false;
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
$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value[$_smarty_tpl->tpl_vars['key']->value] = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value;?><?php } ?><?php } ?><div class="padding1per contentsBackground"><div class="row-fluid"><h4><strong><?php echo vtranslate('LBL_CHOOSE_FILTER_CONDITIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></h4><span class="span10 well contentsBackground"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('AdvanceFilter.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'ADVANCE_CRITERIA'=>$_smarty_tpl->tpl_vars['SELECTED_ADVANCED_FILTER_FIELDS']->value,'COLUMNNAME_API'=>'getReportFilterColumnName'), 0);?>
</span></div></div><div class="pull-right block"><button type="button" class="btn btn-danger backStep"><strong><?php echo vtranslate('LBL_BACK',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<button type="submit" class="btn btn-success" id="generateReport"><strong><?php echo vtranslate('LBL_GENERATE_REPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>&nbsp;&nbsp;<a  class="cancelLink" onclick="window.history.back()"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>&nbsp;&nbsp;</div></form>
<?php }} ?>