<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:38:33
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditFieldPopup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40448015154d24b0989f911-35095082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef094d85e09121b9aefecdc0b70074d09c8e5165' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/ModuleDesigner/EditFieldPopup.tpl',
      1 => 1423067389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40448015154d24b0989f911-35095082',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'a_field' => 0,
    'QUALIFIED_MODULE' => 0,
    'a_languages' => 0,
    'language' => 0,
    'label' => 0,
    'relatedModule' => 0,
    'a_modules' => 0,
    'module' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d24b09f0ff8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d24b09f0ff8')) {function content_54d24b09f0ff8($_smarty_tpl) {?><!DOCTYPE html>
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
<h2><?php echo $_smarty_tpl->tpl_vars['a_field']->value['UITypeNum'];?>
 - <?php echo vtranslate($_smarty_tpl->tpl_vars['a_field']->value['UITypeName'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h2>

<form action="index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=EditField" method="post">
<table style="font-size:12px;">
<tr>
	<td colspan="3"><h3><?php echo vtranslate("LBL_FIELD_DESCRIPTION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_NAME",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="field_name" size="25" maxlength="25" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['fieldName'];?>
" onkeyup=" md_setFieldName(this, 'entity_identifier_fieldname'); md_setLabel(this, 'label', 'LBL_'); md_setColumnName(this, 'column_name', 'LBL_')"/></td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="label" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['label'];?>
" /></td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_TABLE_NAME",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="table_name" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['tableName'];?>
" /></td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_COLUMN_NAME",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="column_name" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['columnName'];?>
" /></td>
</tr>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_COLUMN_TYPE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="column_type" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['UITypeDBType'];?>
" /></td>
</tr>
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars['label'] = new Smarty_variable(('label_').($_smarty_tpl->tpl_vars['language']->value), null, 0);?>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <em><?php echo $_smarty_tpl->tpl_vars['language']->value;?>
</em></td>
	<td colspan="2"><input type="text" name="label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value[$_smarty_tpl->tpl_vars['label']->value];?>
" /></td>
</tr>
<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==10){?>
<?php  $_smarty_tpl->tpl_vars['relatedModule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['relatedModule']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_field']->value['relatedModule']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['relatedModule']->key => $_smarty_tpl->tpl_vars['relatedModule']->value){
$_smarty_tpl->tpl_vars['relatedModule']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['relatedModule']->key;
?>
<tr class="related_module">
	<td><?php echo vtranslate("LBL_RELATED_MODULE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2">
		<select name="related_modules[]" onchange="md_showOrHideCustomField(this)">
			<option value="">&nbsp;</option>
			<option value="CUSTOM" <?php if (!in_array($_smarty_tpl->tpl_vars['relatedModule']->value,$_smarty_tpl->tpl_vars['a_modules']->value)){?>selected="selected"<?php }?>><?php echo vtranslate('LBL_CUSTOM_RELATED_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
			<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value){
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
" <?php if (!empty($_smarty_tpl->tpl_vars['a_field']->value['relatedModule'])&&$_smarty_tpl->tpl_vars['relatedModule']->value==$_smarty_tpl->tpl_vars['module']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['module']->value;?>
 (<?php echo vtranslate($_smarty_tpl->tpl_vars['module']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)</option>
			<?php } ?>
		</select>
		<a href="#" onclick="md_deleteRelatedModule(this); return false;" <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>style="display:none;"<?php }?> class="delete-related-module"><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/delete.png" alt="<?php echo vtranslate('LBL_DELETE_RELATED_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></a>
	</td>
</tr>
<tr class="custom_related_module" <?php if (empty($_smarty_tpl->tpl_vars['a_field']->value['relatedModule'])||in_array($_smarty_tpl->tpl_vars['relatedModule']->value,$_smarty_tpl->tpl_vars['a_modules']->value)){?>style="display:none;"<?php }?>>
	<td>&nbsp;</td>
	<td><input type="text" name="related_modules[]" size="30" <?php if (!in_array($_smarty_tpl->tpl_vars['relatedModule']->value,$_smarty_tpl->tpl_vars['a_modules']->value)){?>value="<?php echo $_smarty_tpl->tpl_vars['relatedModule']->value;?>
"<?php }?> /></td>
</tr>
<?php } ?>
<tr>
	<td colspan="3"><a href="javascript:md_addRelatedModule()"><?php echo vtranslate("LBL_ADD_RELATED_MODULE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></td>
</tr>
<?php }elseif($_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==15||$_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==16||$_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==33){?>
<tr>
	<td><?php echo vtranslate("LBL_PICKLIST_OPTIONS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="picklist_values" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['pickListValues'];?>
" /><br /><em><?php echo vtranslate("LBL_PICKLIST_OPTIONS_TOOLTIP",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</em></td>
</tr>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==7){?>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_NUMERIC_TYPE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td>
	<input type="radio" name="numeric_type" value="I" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['UITypeDataType']=='I'||empty($_smarty_tpl->tpl_vars['a_field']->value['UITypeDataType'])){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_FIELD_INTEGER",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 
	<input type="radio" name="numeric_type" value="N" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['UITypeDataType']=='N'){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_FIELD_DECIMAL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 
	<input type="radio" name="numeric_type" value="NN" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['UITypeDataType']=='NN'){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_FIELD_NEGATIVE_NUMBER",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

	</td>
</tr>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==5||$_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==6||$_smarty_tpl->tpl_vars['a_field']->value['UITypeNum']==23){?>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_DEFAULT_DATE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2">
	<input type="radio" name="generated_type" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['generatedType']==1){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_GENERATED_TYPE_1",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 
	<input type="radio" name="generated_type" value="2" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['generatedType']==2||empty($_smarty_tpl->tpl_vars['a_field']->value['generatedType'])){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_GENERATED_TYPE_2",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

	</td>
</tr>
<?php }else{ ?>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_DEFAULT_VALUE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="default_value" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['defaultValue'];?>
" /></td>
</tr>
<?php }?>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_HELP_INFO_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="text" name="help_info_label" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value['helpInfoLabel'];?>
" onkeyup="md_setLabel(this, 'help_info_label', jQuery('input[name=\'label\']').val()+'_INFO'); md_showOrHideHelpInfoTranslation(this, 'LBL_', 'help-info-translation');"/></td>
</tr>
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars['label'] = new Smarty_variable(('helpInfoLabel_').($_smarty_tpl->tpl_vars['language']->value), null, 0);?>
<tr class="help-info-translation" <?php if (empty($_smarty_tpl->tpl_vars['a_field']->value['helpInfoLabel'])){?>style="display: none"<?php }?>>
	<td><?php echo vtranslate("LBL_FIELD_HELP_INFO_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <em><?php echo $_smarty_tpl->tpl_vars['language']->value;?>
</em></td>
	<td colspan="2"><input type="text" name="help-info-label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
" size="50" value="<?php echo $_smarty_tpl->tpl_vars['a_field']->value[$_smarty_tpl->tpl_vars['label']->value];?>
" /></td>
</tr>
<?php } ?>
<tr>
	<td><?php echo vtranslate("LBL_FIELD_DISPLAY_TYPE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2">
	<input type="radio" name="display_type" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['displayType']==1){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_DISPLAY_TYPE_1",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 
	<input type="radio" name="display_type" value="2" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['displayType']==2){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_DISPLAY_TYPE_2",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 
	<input type="radio" name="display_type" value="3" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['displayType']==3){?>checked="checked"<?php }?> /><?php echo vtranslate("LBL_DISPLAY_TYPE_3",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 
	</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="2"><input type="button" onclick="md_popupSave();" value="<?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /></td>
</tr>
<tr>
	<td colspan="3"><h3><?php echo vtranslate("LBL_OPTIONS",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/mandatory.png" alt="<?php echo vtranslate('LBL_MANDATORY_ALT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate('LBL_MANDATORY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="checkbox" name="mandatory" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['mandatory']){?>checked="checked"<?php }?> /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/entityidentifier.png" alt="<?php echo vtranslate("LBL_ENTITY_IDENTIFIER_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_ENTITY_IDENTIFIER",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="checkbox" name="is_entity_identifier" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['isEntityIdentifier']){?>checked="checked"<?php }?> onclick="md_showOrHidenEntityIdentifierFieldName(this, 'entity_identifier_fieldname')" />
	<td><input type="text" name="entity_identifier_fieldname" value="<?php if (!empty($_smarty_tpl->tpl_vars['a_field']->value['entityIdentifierFieldName'])){?><?php echo $_smarty_tpl->tpl_vars['a_field']->value['entityIdentifierFieldName'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['a_field']->value['fieldName'];?>
<?php }?>" onkeyup="md_setEntityIdentifierFieldName(this)" <?php if (empty($_smarty_tpl->tpl_vars['a_field']->value['isEntityIdentifier'])){?>style="display: none;"<?php }?> /> <span id="entity_identifier_fieldname"  <?php if (empty($_smarty_tpl->tpl_vars['a_field']->value['isEntityIdentifier'])){?>style="display: none;"<?php }?>><?php echo vtranslate('LBL_ENTITY_IDENTIFIER_FIELD_NAME_HELPINFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/filterall.png" alt="<?php echo vtranslate("LBL_FILTER_ALL_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_IN_FILTER_ALL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="checkbox" name="in_filter_all" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['inFilterAll']){?>checked="checked"<?php }?> /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/popup.png" alt="<?php echo vtranslate("LBL_IN_POPUP_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_IN_POPUP",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="checkbox" name="in_popup" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['inPopup']){?>checked="checked"<?php }?> /></td>
	<td>Position : <input type ="text" name="popupSequence" size="4"value="<?php if (isset($_smarty_tpl->tpl_vars['a_field']->value['popupSequence'])){?><?php echo $_smarty_tpl->tpl_vars['a_field']->value['popupSequence'];?>
<?php }?>" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/related.png" alt="<?php echo vtranslate("LBL_RELATED_LIST_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_IN_RELATED_LIST",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td><input type="checkbox" name="in_related_list" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['inRelatedList']){?>checked="checked"<?php }?> value="1" /></td>
	<td>Position : <input type ="text" name="relatedListSequence" size="4" value="<?php if (isset($_smarty_tpl->tpl_vars['a_field']->value['relatedListSequence'])){?><?php echo $_smarty_tpl->tpl_vars['a_field']->value['relatedListSequence'];?>
<?php }?>" /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/create.png" alt="<?php echo vtranslate("LBL_QUICK_CREATE_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_QUICK_CREATE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="checkbox" name="quick_create" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['quickCreate']){?>checked="checked"<?php }?> /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/massedit.png" alt="<?php echo vtranslate("LBL_MASS_EDIT_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_MASS_EDITABLE",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="checkbox" name="mass_editable" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['massEditable']){?>checked="checked"<?php }?> /></td>
</tr>
<tr>
	<td><img src="layouts/vlayout/modules/Settings/<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
/assets/images/readonly.png" alt="<?php echo vtranslate("LBL_READ_ONLY_ALT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" /> <?php echo vtranslate("LBL_READ_ONLY",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
	<td colspan="2"><input type="checkbox" name="read_only" value="1" <?php if ($_smarty_tpl->tpl_vars['a_field']->value['readOnly']){?>checked="checked"<?php }?> /></td>
</tr>
</table>
</form>
</div>

<script type="text/javascript">
function md_addRelatedModule()
{
	var row = $(".related_module:first").html();
	var row1 = $(".custom_related_module:first").html();

	$(".custom_related_module:last").after('<tr class="related_module">'+row+'</tr><tr class="custom_related_module" style="display:none">'+row1+'</tr>');
	
	$(".delete-related-module:gt(0)").show();
}

function md_deleteRelatedModule(a)
{
	$(a).parent().parent().next().remove();
	$(a).parent().parent().remove();
}

function md_showOrHideCustomField(cb)
{
	if($(cb).val() == 'CUSTOM')
		$(cb).parent().parent().next().show();
	else
	{
		$(cb).parent().parent().next().find("input[type='text']").val('');
		$(cb).parent().parent().next().hide();
	}
}

function deleteCustomValues(array)
{
    var output=[];
    
    for(var i=0; i<array.length; i++)
    {
        if(array[i] != 'CUSTOM' && array[i] != '' && array[i] != undefined)
            output.push(array[i]);
    }
    
    return output;
}

function md_popupSave()
{
	var o_data = new Object();
	o_data.id							= <?php if (!empty($_smarty_tpl->tpl_vars['a_field']->value['id'])){?>'<?php echo $_smarty_tpl->tpl_vars['a_field']->value['id'];?>
'<?php }else{ ?>undefined<?php }?>;
	o_data.index						= <?php if (!empty($_smarty_tpl->tpl_vars['a_field']->value['index'])){?><?php echo $_smarty_tpl->tpl_vars['a_field']->value['index'];?>
<?php }else{ ?>undefined<?php }?>;
	o_data.UITypeNum					= <?php echo $_smarty_tpl->tpl_vars['a_field']->value['UITypeNum'];?>
;
	o_data.UITypeName					= '<?php echo addslashes($_smarty_tpl->tpl_vars['a_field']->value['UITypeName']);?>
';
	o_data.UITypeDBType					= o_data.UITypeNum == 7 && $("input[name='numeric_type']:checked").val() != 'I' ? 'DECIMAL(25,3)' : $("input[name='column_type']").val();
	o_data.UITypeDataType				= o_data.UITypeNum == 7 ? $("input[name='numeric_type']:checked").val() : '<?php echo addslashes($_smarty_tpl->tpl_vars['a_field']->value['UITypeDataType']);?>
';
	o_data.twoColumns					= <?php if ($_smarty_tpl->tpl_vars['a_field']->value['twoColumns']){?>true<?php }else{ ?>false<?php }?>;
	o_data.fieldName					= $("input[name='field_name']").val();
	o_data.oldFieldName					= '<?php echo addslashes($_smarty_tpl->tpl_vars['a_field']->value['fieldName']);?>
';
	o_data.label						= $("input[name='label']").val();
	o_data.columnName					= $("input[name='column_name']").val();
	o_data.tableName					= $("input[name='table_name']").val();
	o_data.helpInfoLabel				= $("input[name='help_info_label']").val() != 'LBL_' ? $("input[name='help_info_label']").val() : '';
	o_data.defaultValue					= o_data.UITypeNum != 5 && o_data.UITypeNum != 6 && o_data.UITypeNum != 23 ? $("input[name='default_value']").val() : '';
	o_data.generatedType				= o_data.UITypeNum == 5 || o_data.UITypeNum == 6 || o_data.UITypeNum == 23 ? $("input[name='generated_type']:checked").val() : 1;
	o_data.displayType					= $("input[name='display_type']:checked").val();
	o_data.mandatory					= $("input[name='mandatory']").attr("checked") == "checked";
	o_data.isEntityIdentifier			= $("input[name='is_entity_identifier']").attr("checked") == "checked";
	o_data.entityIdentifierFieldName	= o_data.isEntityIdentifier ? $("input[name='entity_identifier_fieldname']").val() : '';
	o_data.inFilterAll					= $("input[name='in_filter_all']").attr("checked") == "checked";
	o_data.inPopup						= $("input[name='in_popup']").attr("checked") == "checked";
	o_data.popupSequence                = $("input[name='popupSequence']").val();
	o_data.inRelatedList				= $("input[name='in_related_list']").attr("checked") == "checked";
	o_data.relatedListSequence          = $("input[name='relatedListSequence']").val();
	o_data.quickCreate					= $("input[name='quick_create']").attr("checked") == "checked";
	o_data.massEditable					= $("input[name='mass_editable']").attr("checked") == "checked";
	o_data.readOnly						= $("input[name='read_only']").attr("checked") == "checked";
	o_data.relatedModule				= o_data.UITypeNum == 10 ? $("*[name='related_modules\\[\\]']").map(function(){return $(this).val();}).get() : undefined;
	o_data.pickListValues				= o_data.UITypeNum == 15 || o_data.UITypeNum == 16 || o_data.UITypeNum == 33 ? $("input[name='picklist_values']").val() : undefined;

	if(o_data.UITypeNum == 10)
		o_data.relatedModule = deleteCustomValues(o_data.relatedModule);

<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	o_data.label_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 = $("input[name='label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
']").val();	
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	o_data.helpInfoLabel_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 = $("input[name='help-info-label-<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
']").val();
<?php } ?>
	
	var valid = false;
	var field = '';
	
	if(o_data.label == '' || o_data.label == 'LBL_')
		field = '<?php echo addslashes(vtranslate("LBL_FIELD_LABEL",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	else if(o_data.label_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
 == '')
		field = '<?php echo addslashes(((vtranslate("LBL_FIELD_LABEL_TRANSLATION",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value)).(' ')).($_smarty_tpl->tpl_vars['language']->value));?>
';
<?php } ?>
else if(o_data.isEntityIdentifier && o_data.entityIdentifierFieldName == '')
	field = '<?php echo addslashes(vtranslate('LBL_FIELD_ENTITY_IDENTIFIER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
	else if(o_data.helpInfoLabel != '' && o_data.helpInfoLabel_<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
  == '')
		field = '<?php echo addslashes(vtranslate('LBL_FIELD_HELP_INFO_LABEL_TRANSLATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
 <?php echo $_smarty_tpl->tpl_vars['language']->value;?>
';
<?php } ?>
	else if((o_data.UITypeNum == 15 || o_data.UITypeNum == 16 || o_data.UITypeNum == 33) && (o_data.pickListValues == ''))
                field = '<?php echo addslashes(vtranslate('LBL_OPTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));?>
';
    else
		valid = true;

	if(!valid)
		alert("<?php echo vtranslate('LBL_FIELD_VALUE_HAS_TO_BE_DEFINED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 "+field);
	else
	{
		window.parent.md_addField(o_data, false);
		window.parent.md_closePopup();
	}
}
</script>
</body>
</html><?php }} ?>