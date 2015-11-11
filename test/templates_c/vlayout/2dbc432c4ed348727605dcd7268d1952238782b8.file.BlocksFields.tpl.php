<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:35:57
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/BlocksFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123235426754d24a6dc5fcb5-99475637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dbc432c4ed348727605dcd7268d1952238782b8' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/BlocksFields.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123235426754d24a6dc5fcb5-99475637',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d24a6dc9efb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d24a6dc9efb')) {function content_54d24a6dc9efb($_smarty_tpl) {?><table id="md-block-fields">
<tr>
<td>
<div id="md-fields-toolbar">
	<h2><?php echo vtranslate('LBL_UITYPE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>
	<ul id="md-fields-list" class="droptrue">
	<!-- Fields list generated with JS -->
	</ul>
</div>
</td>
<td>

<div id="md-add-block-btn">
	<img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/block.png" alt="<?php echo vtranslate('LBL_ADD_BLOCK_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"/> <a href="#" onclick="md_addBlock(); return false;"><?php echo vtranslate('LBL_ADD_BLOCK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>
</div>

<div>
<ul id="md-blocks-ul">
<!-- Blocks added with JS -->
</ul>
</div>
</td>
</table><?php }} ?>