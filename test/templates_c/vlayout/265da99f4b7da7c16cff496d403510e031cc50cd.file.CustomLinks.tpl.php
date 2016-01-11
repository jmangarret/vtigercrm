<?php /* Smarty version Smarty-3.1.7, created on 2015-11-16 15:05:49
         compiled from "/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/CustomLinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:460410799564a30154ec681-48375513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '265da99f4b7da7c16cff496d403510e031cc50cd' => 
    array (
      0 => '/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/CustomLinks.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '460410799564a30154ec681-48375513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_564a3015523d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564a3015523d5')) {function content_564a3015523d5($_smarty_tpl) {?><table id="md-custom-links-table">
<tr>
<td>
<div id="md-custom-links-toolbar">
	<h2><?php echo vtranslate('LBL_CUSTOM_LINKS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	
	<ul id="md-custom-links-list">
	<li><?php echo vtranslate('HEADERSCRIPT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('HEADERCSS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('HEADERLINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('LISTVIEW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('LISTVIEWBASIC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('DETAILVIEW',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('DETAILVIEWBASIC',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('DETAILVIEWWIDGET',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('SIDEBARLINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	<li><?php echo vtranslate('SIDEBARWIDGET',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li>
	</ul>
</div>
</td>
<td>
<div>
<ul id="md-custom-links-ul" class="md-custom-links-ul">
<!-- Custom links added with JS -->
</ul>
</div>
</td>
</table><?php }} ?>