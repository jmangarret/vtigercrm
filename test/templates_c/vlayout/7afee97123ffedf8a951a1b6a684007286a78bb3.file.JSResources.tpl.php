<?php /* Smarty version Smarty-3.1.7, created on 2015-11-13 09:25:27
         compiled from "/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/JSResources.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10624600765645ebcf01dbe7-89424360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7afee97123ffedf8a951a1b6a684007286a78bb3' => 
    array (
      0 => '/var/www/vhosts/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/JSResources.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10624600765645ebcf01dbe7-89424360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPTS' => 0,
    'jsModel' => 0,
    'VTIGER_VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5645ebcf0358c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5645ebcf0358c')) {function content_5645ebcf0358c($_smarty_tpl) {?>



	<script type="text/javascript" src="libraries/html5shim/html5.js"></script>

	<script type="text/javascript" src="libraries/jquery/jquery.blockUI.js"></script>
	<script type="text/javascript" src="libraries/jquery/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/select2/select2.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/jquery.class.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/defunkt-jquery-pjax/jquery.pjax.js"></script>
	<script type="text/javascript" src="libraries/jquery/jstorage.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/autosize/jquery.autosize-min.js"></script>

	<script type="text/javascript" src="libraries/jquery/rochal-jQuery-slimScroll/slimScroll.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/pnotify/jquery.pnotify.min.js"></script>
	<script type="text/javascript" src="libraries/jquery/jquery.hoverIntent.minified.js"></script>

	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-alert.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-tab.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootbox.min.js"></script>
	<script type="text/javascript" src="resources/jquery.additions.js"></script>
	<script type="text/javascript" src="resources/app.js"></script>
	<script type="text/javascript" src="resources/helper.js"></script>
	<script type="text/javascript" src="resources/Connector.js"></script>
	<script type="text/javascript" src="resources/ProgressIndicator.js" ></script>
	<script type="text/javascript" src="libraries/jquery/posabsolute-jQuery-Validation-Engine/js/jquery.validationEngine.js" ></script>
	<script type="text/javascript" src="libraries/guidersjs/guiders-1.2.6.js"></script>
	<script type="text/javascript" src="libraries/jquery/datepicker/js/datepicker.js"></script>
	<script type="text/javascript" src="libraries/jquery/dangrossman-bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="libraries/jquery/jquery.ba-outside-events.min.js"></script>

	<?php  $_smarty_tpl->tpl_vars['jsModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsModel']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SCRIPTS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsModel']->key => $_smarty_tpl->tpl_vars['jsModel']->value){
$_smarty_tpl->tpl_vars['jsModel']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['jsModel']->key;
?>
		<script type="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getType();?>
" src="<?php echo $_smarty_tpl->tpl_vars['jsModel']->value->getSrc();?>
?&v=<?php echo $_smarty_tpl->tpl_vars['VTIGER_VERSION']->value;?>
"></script>
	<?php } ?>

	<!-- Added in the end since it should be after less file loaded -->
	<script type="text/javascript" src="libraries/bootstrap/js/less.min.js"></script><?php }} ?>