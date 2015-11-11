<?php /* Smarty version Smarty-3.1.7, created on 2015-03-05 19:52:04
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Users/DeleteUser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4268425454f8b3e4b89e46-06235920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '864161c5431a1ccd2f90d13e16b0d1b0c9d86fe6' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Users/DeleteUser.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4268425454f8b3e4b89e46-06235920',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'USERID' => 0,
    'DELETE_USER_NAME' => 0,
    'OCCUPY_COMPLETE_WIDTH' => 0,
    'USER_LIST' => 0,
    'USER_ID' => 0,
    'USER_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54f8b3e4cdfa1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f8b3e4cdfa1')) {function content_54f8b3e4cdfa1($_smarty_tpl) {?>
<div id="massEditContainer" class='modelContainer'><div class="modal-header contentsBackground"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">&times;</button><h3 id="massEditHeader"><?php echo vtranslate('Transfer records to user',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h3></div><form class="form-horizontal" id="deleteUser" name="deleteUser" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" /><div name='massEditContent'><div class="modal-body tabbable"><div class="tab-content massEditContent"><table class="massEditTable table table-bordered"><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('User to be deleted',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td><td class="fieldValue"><?php echo $_smarty_tpl->tpl_vars['DELETE_USER_NAME']->value;?>
</td></tr><tr><td class="fieldLabel alignMiddle"><?php echo vtranslate('Transfer records to user',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td><td class="fieldValue"><select class="chzn-select <?php if ($_smarty_tpl->tpl_vars['OCCUPY_COMPLETE_WIDTH']->value){?> row-fluid <?php }?>" name="tranfer_owner_id" data-validation-engine="validate[ required]" ><?php  $_smarty_tpl->tpl_vars['USER_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['USER_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['USER_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['USER_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['USER_MODEL']->key => $_smarty_tpl->tpl_vars['USER_MODEL']->value){
$_smarty_tpl->tpl_vars['USER_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['USER_ID']->value = $_smarty_tpl->tpl_vars['USER_MODEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['USER_ID']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getName();?>
</option><?php } ?></select></td></tr></table></div></div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div>
<?php }} ?>