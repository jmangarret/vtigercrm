<?php /* Smarty version Smarty-3.1.7, created on 2015-11-16 15:05:49
         compiled from "/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/RelatedLists.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171760991564a301552a810-44794298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84c0c34212ca37bf92107bec674c9640a3c0b681' => 
    array (
      0 => '/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/RelatedLists.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171760991564a301552a810-44794298',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'LIST_MODULES' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_564a301554a17',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564a301554a17')) {function content_564a301554a17($_smarty_tpl) {?><table id="md-related-lists-table">
<tr>
<td>
<div id="md-related-list-toolbar">
	<h2><?php echo vtranslate('LBL_MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	
	<ul id="md-modules-list">
	<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LIST_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value){
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['module']->value['tablabel'];?>
</li>
	<?php } ?>
	</ul>	
	<div id="md-related-list-other-module">
		<button id="md_related_list_other_module"><?php echo vtranslate('LBL_RELATED_LIST_OTHER_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
	</div>
</div>
</td>
<td>
<div>
<ul id="md-related-lists-ul" class="md-related-lists-ul">
<!-- Related lists added with JS -->
</ul>
</div>
</td>
</table>

<div id="md_related_list_dialog_form" title="<?php echo vtranslate('LBL_RELATED_LIST_OTHER_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"> 
  <form>
  <fieldset>
    <label for="md_related_list_custom_name"><?php echo vtranslate('LBL_RELATED_LIST_OTHER_MODULE_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label>
    <input type="text" name="md_related_list_custom_name" id="md_related_list_custom_name" class="text ui-widget-content ui-corner-all">
  </fieldset>
  </form>
</div><?php }} ?>