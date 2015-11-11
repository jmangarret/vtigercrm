<?php /* Smarty version Smarty-3.1.7, created on 2015-02-20 16:43:49
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/EditHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103935535754e76445f422f6-46888989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfc5a2a5773f8ad9093d44491a7d9276b6310103' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Reports/EditHeader.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103935535754e76445f422f6-46888989',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e764460912d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e764460912d')) {function content_54e764460912d($_smarty_tpl) {?>
<ul id="reportBreadCrumbs" class="breadcrumb"><li class="step1"><?php echo vtranslate('LBL_STEP_1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
: <?php echo vtranslate('LBL_REPORT_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="divider">></span></li><li class="step2"><?php echo vtranslate('LBL_STEP_2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
: <?php echo vtranslate('LBL_SELECT_COLUMNS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="divider">></span></li><li class="step3"><?php echo vtranslate('LBL_STEP_3',$_smarty_tpl->tpl_vars['MODULE']->value);?>
: <?php echo vtranslate('LBL_FILTERS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li></ul>	<?php }} ?>