<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:35:58
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23389588354d24a6e0969b9-52918318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d96a2bf00dd48dd38fb71718e1800a21d99577b' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/Export.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23389588354d24a6e0969b9-52918318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d24a6e0b815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d24a6e0b815')) {function content_54d24a6e0b815($_smarty_tpl) {?><button onclick="md_makePackage(false)"><?php echo vtranslate('LBL_MAKE_PACKAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><br /><br />
<button onclick="md_makePackage(true)"><?php echo vtranslate('LBL_CREATE_AND_INSTALL_PACKAGE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }} ?>