<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:51:25
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditCustomLinkPopup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130152950254d24e0d21c087-43286350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dba85b0720d2d3f4bfdee1175f3162b9de510b3' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditCustomLinkPopup.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130152950254d24e0d21c087-43286350',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
    'a_customLink' => 0,
    'a_languages' => 0,
    'language' => 0,
    'label' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d24e0d43a8c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d24e0d43a8c')) {function content_54d24e0d43a8c($_smarty_tpl) {?><!DOCTYPE html>
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
<h2><?php echo vtranslate('LBL_CUSTOM_LINK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 - <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['type'];?>
<?php $_tmp1=ob_get_clean();?><?php echo vtranslate($_tmp1,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>

<table id="form" style="font-size:12px;">
<tr><td colspan="2"><h3><?php echo vtranslate("LBL_CUSTOM_LINK_DESCRIPTION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></td></tr>
<tr>
	<td><?php echo vtranslate("LBL_CUSTOM_LINK_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="label" value="<?php if (!empty($_smarty_tpl->tpl_vars['a_customLink']->value['label'])){?><?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['label'];?>
<?php }else{ ?>LBL_<?php }?>" size="50" onkeyup="md_setLabel(this, 'label', '')" /></td>
</tr>
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars["label"] = new Smarty_variable(('label_').($_smarty_tpl->tpl_vars['language']->value), null, 0);?>
<tr>
	<td><?php echo vtranslate("LBL_CUSTOM_LINK_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <em><?php echo $_smarty_tpl->tpl_vars['language']->value;?>
</em></td>
	<td><input type="text" name="label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value[$_smarty_tpl->tpl_vars['label']->value];?>
" /></td>
</tr>
<?php } ?>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_CUSTOM_LINK_URL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="url" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['url'];?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/icon.png" alt="<?php echo vtranslate('LBL_CUSTOM_LINK_ICON_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_CUSTOM_LINK_ICON",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="icon" size="50" value="<?php echo vtranslate($_smarty_tpl->tpl_vars['a_customLink']->value['icon']);?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/handler-path.png" alt="<?php echo vtranslate('LBL_CUSTOM_LINK_HANDLER_PATH_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_CUSTOM_LINK_HANDLER_PATH",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="handler_path" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['handlerPath'];?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/handler-class.png" alt="<?php echo vtranslate('LBL_CUSTOM_LINK_HANDLER_CLASS_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_CUSTOM_LINK_HANDLER_CLASS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="handler_class" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['handlerClass'];?>
" /></td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_CUSTOM_LINK_HANDLER",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="handler" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['handler'];?>
" /></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type="button" onclick="md_popupSave();" value="<?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></td>
</tr>
</table>
</div>

<script type="text/javascript">
function md_popupSave()
{
	var o_data = new Object();
	o_data.id				= <?php if (!empty($_smarty_tpl->tpl_vars['a_customLink']->value['id'])){?>'<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['id'];?>
'<?php }else{ ?>undefined<?php }?>;
	o_data.index			= <?php if (!empty($_smarty_tpl->tpl_vars['a_customLink']->value['index'])){?><?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['index'];?>
<?php }else{ ?>undefined<?php }?>;
	o_data.type				= '<?php echo $_smarty_tpl->tpl_vars['a_customLink']->value['type'];?>
';
	o_data.label			= $("input[name='label']").val();
	o_data.url				= $("input[name='url']").val();
	o_data.icon				= $("input[name='icon']").val();
	o_data.handlerPath		= $("input[name='handler_path']").val();
	o_data.handlerClass		= $("input[name='handler_class']").val();
	o_data.handler			= $("input[name='handler']").val();

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
	
	if(o_data.label == '' || o_data.label == 'LBL_')
		field = '<?php echo addslashes(vtranslate("LBL_CUSTOM_LINK_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	else if(o_data.label_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 == '')
		field = '<?php echo addslashes(((vtranslate("LBL_CUSTOM_LINK_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value)).(' ')).($_smarty_tpl->tpl_vars['language']->value));?>
';
<?php } ?>
	else if(o_data.url == '')
		field = '<?php echo vtranslate("LBL_CUSTOM_LINK_URL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
';
	else
		valid = true;

	if(!valid)
		alert("<?php echo vtranslate('LBL_FIELD_VALUE_HAS_TO_BE_DEFINED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 "+field);
	else
	{
		window.parent.md_addCustomLink(o_data, false);
		window.parent.md_closePopup();
	}
}
</script>
</body>
</html><?php }} ?>