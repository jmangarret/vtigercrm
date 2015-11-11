<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:37:58
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditBlockPopup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99993216954d24ae6d62ce4-24713664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '408e7624833eecec6b2a32a6eea36728ec9cf3d7' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditBlockPopup.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99993216954d24ae6d62ce4-24713664',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
    'a_block' => 0,
    'a_languages' => 0,
    'language' => 0,
    'label' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d24ae70b81d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d24ae70b81d')) {function content_54d24ae70b81d($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/resources/PopupUtils.js"></script>
<script type="text/javascript" src="libraries/jquery/jquery.min.js"></script>
<script type="text/javascript" src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/resources/jqueryCaret.js"></script>
</head>

<body>
<div style="font-family: Arial,Verdana,'Times New Roman',sans-serif;">
<h2><?php echo vtranslate("LBL_BLOCK",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>

<table id="form" style="font-size:12px;">
<tr><td colspan="2"><h3><?php echo vtranslate("LBL_BLOCK_DESCRIPTION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></td></tr>
<tr><td><?php echo vtranslate("LBL_BLOCK_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td><input type="text" size="50" name="label" value="<?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['label'])){?><?php echo $_smarty_tpl->tpl_vars['a_block']->value['label'];?>
<?php }?>" onkeyup="md_setLabel(this, 'label', 'LBL_')" /></td></tr>

<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars["label"] = new Smarty_variable(("label_").($_smarty_tpl->tpl_vars['language']->value), null, 0);?>
<tr>
	<td><?php echo vtranslate("LBL_BLOCK_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <em><?php echo $_smarty_tpl->tpl_vars['language']->value;?>
</em></td>
	<td colspan="2"><input type="text" name="label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" size="50" value="<?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value[$_smarty_tpl->tpl_vars['label']->value])){?><?php echo $_smarty_tpl->tpl_vars['a_block']->value[$_smarty_tpl->tpl_vars['label']->value];?>
<?php }?>" /></td>
</tr>
<?php } ?>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><h3><?php echo vtranslate("LBL_BLOCK_OPTIONS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></td></tr>
<tr><td><input type="checkbox" name="show_title" <?php if (!isset($_smarty_tpl->tpl_vars['a_block']->value['showTitle'])||$_smarty_tpl->tpl_vars['a_block']->value['showTitle']==1){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_SHOW_TITLE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td><input type="button" value="<?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" onclick="md_popupSave()" /></td></tr>
<tr><td colspan="2"><input type="checkbox" name="visible" <?php if (!isset($_smarty_tpl->tpl_vars['a_block']->value['visible'])||$_smarty_tpl->tpl_vars['a_block']->value['visible']==1){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_VISIBLE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
<tr><td colspan="2"><input type="checkbox" name="create_view" <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['createView'])){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_CREATE_VIEW",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
<tr><td colspan="2"><input type="checkbox" name="edit_view" <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['editView'])){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_EDIT_VIEW",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
<tr><td colspan="2"><input type="checkbox" name="detail_view" <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['detailView'])){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_DETAIL_VIEW",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
<tr><td colspan="2"><input type="checkbox" name="display_status" <?php if (!isset($_smarty_tpl->tpl_vars['a_block']->value['displayStatus'])||$_smarty_tpl->tpl_vars['a_block']->value['displayStatus']==1){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_DISPLAY_STATUS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
<tr><td colspan="2"><input type="checkbox" name="is_custom" <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['isCustom'])){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_IS_CUSTOM",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
<tr><td colspan="2"><input type="checkbox" name="is_list" <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['isList'])){?>checked="checked"<?php }?> /> <?php echo vtranslate("LBL_BLOCK_IS_LIST",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td></tr>
</table>
</div>

<script type="text/javascript">
function md_popupSave()
{
	var o_data = new Object();
	o_data.id				= <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['id'])){?>'<?php echo $_smarty_tpl->tpl_vars['a_block']->value['id'];?>
'<?php }else{ ?>'undefined'<?php }?>;
	o_data.index			= <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['index'])){?><?php echo $_smarty_tpl->tpl_vars['a_block']->value['index'];?>
<?php }else{ ?>'undefined'<?php }?>;
	o_data.label			= $("input[name='label']").val();
	o_data.showTitle		= $("input[name='show_title']").attr("checked") == "checked";
	o_data.visible			= $("input[name='visible']").attr("checked") == "checked";
	o_data.createView		= $("input[name='create_view']").attr("checked") == "checked";
	o_data.editView			= $("input[name='edit_view']").attr("checked") == "checked";
	o_data.detailView		= $("input[name='detail_view']").attr("checked") == "checked";
	o_data.displayStatus	= $("input[name='display_status']").attr("checked") == "checked";
	o_data.isCustom			= $("input[name='is_custom']").attr("checked") == "checked";
	o_data.isList			= $("input[name='is_list']").attr("checked") == "checked";
	o_data.maxFieldId		= <?php if (!empty($_smarty_tpl->tpl_vars['a_block']->value['maxFieldId'])){?><?php echo $_smarty_tpl->tpl_vars['a_block']->value['maxFieldId'];?>
<?php }else{ ?>0<?php }?>

<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	o_data.label_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 = $("input[name='label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
']").val();	
<?php } ?>

	var valid = false;
	var field = '';

	if(o_data.label == '')
		field = '<?php echo addslashes(vtranslate("LBL_BLOCK_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	else if(o_data.label_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 == '')
		field = '<?php echo addslashes(((vtranslate("LBL_BLOCK_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value)).(' ')).($_smarty_tpl->tpl_vars['language']->value));?>
';
<?php } ?>
	else
		valid = true;
	
	if(!valid)
		alert("<?php echo vtranslate('LBL_FIELD_VALUE_HAS_TO_BE_DEFINED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 "+field);
	else
	{
		window.parent.md_editBlock(o_data);
		window.parent.md_closePopup();
	}
}
</script>
</body>
</html><?php }} ?>