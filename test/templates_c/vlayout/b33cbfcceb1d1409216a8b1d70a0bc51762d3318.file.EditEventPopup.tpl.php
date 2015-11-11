<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:53:46
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditEventPopup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25655631354d24e9ae945c3-08101647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b33cbfcceb1d1409216a8b1d70a0bc51762d3318' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditEventPopup.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25655631354d24e9ae945c3-08101647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
    'a_event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d24e9b10639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d24e9b10639')) {function content_54d24e9b10639($_smarty_tpl) {?><!DOCTYPE html>
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
<h2><?php echo vtranslate('LBL_EVENT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 - <?php echo vtranslate($_smarty_tpl->tpl_vars['a_event']->value['eventName'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>

<table id="form" style="font-size:12px;">
<tr>
	<td colspan="2"><h3><?php echo vtranslate("LBL_EVENT_DESCRIPTION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/handler-path.png" alt="<?php echo vtranslate("LBL_EVENT_HANDLER_PATH_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_EVENT_HANDLER_PATH",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="handler_path" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_event']->value['handlerPath'];?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/handler-class.png" alt="<?php echo vtranslate("LBL_EVENT_HANDLER_CLASS_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_EVENT_HANDLER_CLASS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="handler_class" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_event']->value['handlerClass'];?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/cond.png" alt="<?php echo vtranslate("LBL_EVENT_COND_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_EVENT_COND",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="cond" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_event']->value['cond'];?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/dependent.png" alt="<?php echo vtranslate("LBL_EVENT_DEPENDENT_ON_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_EVENT_DEPENDENT_ON",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="text" name="dependent_on" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_event']->value['dependentOn'];?>
" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/active.png" alt="<?php echo vtranslate("LBL_EVENT_IS_ACTIVE_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_EVENT_IS_ACTIVE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="checkbox" name="is_active" value="1" <?php if ($_smarty_tpl->tpl_vars['a_event']->value['isActive']){?>checked="checked"<?php }?> /></td>
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
	o_data.id				= <?php if (!empty($_smarty_tpl->tpl_vars['a_event']->value['id'])){?>'<?php echo $_smarty_tpl->tpl_vars['a_event']->value['id'];?>
'<?php }else{ ?>undefined<?php }?>;
	o_data.index			= <?php if (!empty($_smarty_tpl->tpl_vars['a_event']->value['index'])){?><?php echo $_smarty_tpl->tpl_vars['a_event']->value['index'];?>
<?php }else{ ?>undefined<?php }?>;
	o_data.eventName		= '<?php echo $_smarty_tpl->tpl_vars['a_event']->value['eventName'];?>
';
	o_data.handlerPath		= $("input[name='handler_path']").val();
	o_data.handlerClass		= $("input[name='handler_class']").val();
	o_data.cond				= $("input[name='cond']").val();
	o_data.dependentOn		= $("input[name='dependent_on']").val();
	o_data.isActive			= $("input[name='is_active']").attr("checked") == "checked";

	var valid = false;
	var field = '';

	if(o_data.handlerPath == '')
		field = '<?php echo addslashes(vtranslate("LBL_EVENT_HANDLER_PATH",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
	else if(o_data.handlerClass == '')
		field = '<?php echo addslashes(vtranslate("LBL_EVENT_HANDLER_CLASS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
	else
		valid = true;

	if(!valid)
		alert("<?php echo vtranslate('LBL_FIELD_VALUE_HAS_TO_BE_DEFINED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 "+field);
	else
	{
		window.parent.md_addEvent(o_data, false);
		window.parent.md_closePopup();
	}
}
</script>
</body>
</html><?php }} ?>