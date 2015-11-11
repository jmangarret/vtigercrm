<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 22:49:35
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Picklist/PickListValueByRole.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88079263654d2a1ff5b5a97-01343012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d1a34e9e96983b4816601efd09f7805c562b282' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Settings/Picklist/PickListValueByRole.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88079263654d2a1ff5b5a97-01343012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ALL_PICKLIST_VALUES' => 0,
    'PICKLIST_VALUE' => 0,
    'ROLE_PICKLIST_VALUES' => 0,
    'SELECTED_MODULE_NAME' => 0,
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d2a1ff68472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d2a1ff68472')) {function content_54d2a1ff68472($_smarty_tpl) {?>
<br><br><div class="row-fluid"><div class="span2">&nbsp;</div><div class="span3" style="overflow: hidden"><div id="assignToRolepickListValuesTable" class="row-fluid fontBold textAlignCenter" style="border: 1px solid grey;"><?php  $_smarty_tpl->tpl_vars['PICKLIST_VALUE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->_loop = false;
 $_smarty_tpl->tpl_vars['PICKLIST_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_PICKLIST_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->key => $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value){
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->_loop = true;
 $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value = $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->key;
?><div data-value="<?php echo $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value;?>
" style="border-bottom: 1px solid grey;padding: 4%;overflow: hidden;text-overflow: ellipsis;" class="cursorPointer assignToRolePickListValue <?php if (in_array($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['ROLE_PICKLIST_VALUES']->value)){?>selectedCell<?php }else{ ?>unselectedCell<?php }?>"><?php if (in_array($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['ROLE_PICKLIST_VALUES']->value)){?><i class="icon-ok pull-left"></i><?php }?><?php echo vtranslate($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value);?>
</div><?php } ?></div></div><div class="span6"><div><i class="icon-info-sign"></i>&nbsp;&nbsp;<span class="selectedCell padding1per"><?php echo vtranslate('LBL_SELECTED_VALUES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span>&nbsp;<span><?php echo vtranslate('LBL_SELECTED_VALUES_MESSGAE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div><br><div><i class="icon-info-sign"></i>&nbsp;&nbsp;<span><?php echo vtranslate('LBL_ENABLE/DISABLE_MESSGAE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div><br>&nbsp;&nbsp;<button id="saveOrder" disabled="" class="btn btn-success"><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div>	<?php }} ?>