<?php /* Smarty version Smarty-3.1.7, created on 2015-02-04 16:07:37
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/DashBoardHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49197600954d243c9aaef38-18258715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b974da17910ba67f2db2ee3db370ca5a0f7fc7' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/DashBoardHeader.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49197600954d243c9aaef38-18258715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DASHBOARDHEADER_TITLE' => 0,
    'WIDGETS' => 0,
    'WIDGET' => 0,
    'MODULE_NAME' => 0,
    'MINILISTWIDGET' => 0,
    'NOTEBOOKWIDGET' => 0,
    'MODULE_PERMISSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54d243c9c02b5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d243c9c02b5')) {function content_54d243c9c02b5($_smarty_tpl) {?>

<div style='padding:10px;padding-left:20px;'>
	<?php if ($_smarty_tpl->tpl_vars['DASHBOARDHEADER_TITLE']->value){?>
		<h2 class="pull-left"><?php echo $_smarty_tpl->tpl_vars['DASHBOARDHEADER_TITLE']->value;?>
</h2>
	<?php }?>
	<span class="btn-toolbar pull-right" style="margin: 0;">
		<span class="btn-group">
			<?php if (count($_smarty_tpl->tpl_vars['WIDGETS']->value)>0){?>
			<button class='btn addButton dropdown-toggle' data-toggle='dropdown'>
				<strong><?php echo vtranslate('LBL_ADD_WIDGET');?>
</strong>
				<i class="caret"></i>
			</button>

			<ul class="dropdown-menu widgetsList pull-right" style="min-width:100%;text-align:left;">
				<?php $_smarty_tpl->tpl_vars["MINILISTWIDGET"] = new Smarty_variable('', null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['WIDGET'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['WIDGET']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['WIDGETS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['WIDGET']->key => $_smarty_tpl->tpl_vars['WIDGET']->value){
$_smarty_tpl->tpl_vars['WIDGET']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['WIDGET']->value->getName()=='MiniList'){?>
						<?php $_smarty_tpl->tpl_vars["MINILISTWIDGET"] = new Smarty_variable($_smarty_tpl->tpl_vars['WIDGET']->value, null, 0);?> 
					<?php }elseif($_smarty_tpl->tpl_vars['WIDGET']->value->getName()=='Notebook'){?>
						<?php $_smarty_tpl->tpl_vars["NOTEBOOKWIDGET"] = new Smarty_variable($_smarty_tpl->tpl_vars['WIDGET']->value, null, 0);?> 
					<?php }else{ ?>
					<li>
						<a onclick="Vtiger_DashBoard_Js.addWidget(this, '<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
')" href="javascript:void(0);"
							data-linkid="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getName();?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getWidth();?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getHeight();?>
">
							<?php echo vtranslate($_smarty_tpl->tpl_vars['WIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a>
					</li>
					<?php }?>
				<?php } ?>
				
				<?php if ($_smarty_tpl->tpl_vars['MINILISTWIDGET']->value&&$_smarty_tpl->tpl_vars['MODULE_NAME']->value=='Home'){?>
				<li class="divider"></li>
				<li>
					<a onclick="Vtiger_DashBoard_Js.addMiniListWidget(this, '<?php echo $_smarty_tpl->tpl_vars['MINILISTWIDGET']->value->getUrl();?>
')" href="javascript:void(0);"
						data-linkid="<?php echo $_smarty_tpl->tpl_vars['MINILISTWIDGET']->value->get('linkid');?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['MINILISTWIDGET']->value->getName();?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['MINILISTWIDGET']->value->getWidth();?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['MINILISTWIDGET']->value->getHeight();?>
">
						<?php echo vtranslate($_smarty_tpl->tpl_vars['MINILISTWIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a>
				</li>
				<li>
					<a onclick="Vtiger_DashBoard_Js.addNoteBookWidget(this, '<?php echo $_smarty_tpl->tpl_vars['NOTEBOOKWIDGET']->value->getUrl();?>
')" href="javascript:void(0);"
						data-linkid="<?php echo $_smarty_tpl->tpl_vars['NOTEBOOKWIDGET']->value->get('linkid');?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['NOTEBOOKWIDGET']->value->getName();?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['NOTEBOOKWIDGET']->value->getWidth();?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['NOTEBOOKWIDGET']->value->getHeight();?>
">
						<?php echo vtranslate($_smarty_tpl->tpl_vars['NOTEBOOKWIDGET']->value->getTitle(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a>
				</li>
				<?php }?>
				
			</ul>
			<?php }elseif($_smarty_tpl->tpl_vars['MODULE_PERMISSION']->value){?>
				<button class='btn addButton dropdown-toggle' disabled="disabled" data-toggle='dropdown'>
					<strong><?php echo vtranslate('LBL_ADD_WIDGET');?>
</strong> &nbsp;&nbsp;
				<i class="caret"></i>
			</button>
			<?php }?>
		</span>
	</span>
	<hr class="clearfix" style="margin: 0;"/>
</div>
<?php }} ?>