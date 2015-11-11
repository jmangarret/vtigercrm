<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 17:27:35
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleManager/UpdateUserModuleStep3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103888061554d25687cac661-94426675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6b1e597f478364ea22a6a1b8fa73b01462d16ef' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleManager/UpdateUserModuleStep3.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103888061554d25687cac661-94426675',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'UPDATE_MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d25687d3b36',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d25687d3b36')) {function content_54d25687d3b36($_smarty_tpl) {?>
<div class="container-fluid" id="importModules"><div class="widget_header row-fluid"><h3><?php echo vtranslate('LBL_UPDATE_MODULE_FROM_FILE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><hr><div class="contents"><div class="row-fluid"><div id="vtlib_modulemanager_import_div"><form method="POST" action="index.php"><table class="table table-bordered"><thead><tr class="blockHeader"><th colspan="2"><strong><?php echo vtranslate('LBL__UPDATING_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></th></tr></thead><tbody><tr valign=top><td class='cellText small'><?php echo $_smarty_tpl->tpl_vars['UPDATE_MODULE_NAME']->value;?>
 <?php echo vtranslate('LBL_UPDATED_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr></tbody></table><div class="modal-footer"><input type="hidden" name="module" value="ModuleManager"><input type="hidden" name="parent" value="Settings"><input type="hidden" name="view" value="List"><button  class="btn btn-success" type="submit" ><strong><?php echo vtranslate('LBL_FINISH',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></form></div></div></div></div><?php }} ?>