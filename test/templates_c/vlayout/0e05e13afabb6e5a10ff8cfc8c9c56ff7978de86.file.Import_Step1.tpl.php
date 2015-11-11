<?php /* Smarty version Smarty-3.1.7, created on 2015-08-14 12:37:06
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Step1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202979861855ce203a566c77-40149094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e05e13afabb6e5a10ff8cfc8c9c56ff7978de86' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Step1.tpl',
      1 => 1423065968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202979861855ce203a566c77-40149094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'IMPORT_UPLOAD_SIZE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55ce203a5b3be',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ce203a5b3be')) {function content_55ce203a5b3be($_smarty_tpl) {?>
<table width="100%" cellspacing="0" cellpadding="2">
	<tr>
		<td><strong><?php echo vtranslate('LBL_IMPORT_STEP_1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</strong></td>
		<td class="big"><?php echo vtranslate('LBL_IMPORT_STEP_1_DESCRIPTION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td data-import-upload-size="<?php echo $_smarty_tpl->tpl_vars['IMPORT_UPLOAD_SIZE']->value;?>
">
			<input type="hidden" name="type" value="csv" />
			<input type="hidden" name="is_scheduled" value="1" />
			<input type="file" name="import_file" id="import_file" onchange="ImportJs.checkFileType()"/>
			<!-- input type="hidden" name="userfile_hidden" value=""/ -->
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo vtranslate('LBL_IMPORT_SUPPORTED_FILE_TYPES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
	</tr>
</table><?php }} ?>