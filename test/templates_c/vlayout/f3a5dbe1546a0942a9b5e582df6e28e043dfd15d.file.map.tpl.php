<?php /* Smarty version Smarty-3.1.7, created on 2015-07-17 15:20:24
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Google/map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58735842755a95c80e213f1-82921799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3a5dbe1546a0942a9b5e582df6e28e043dfd15d' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Google/map.tpl',
      1 => 1423065975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58735842755a95c80e213f1-82921799',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
    'SOURCE_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55a95c80edb6d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a95c80edb6d')) {function content_55a95c80edb6d($_smarty_tpl) {?>
<script type="text/javascript" src="layouts/vlayout/modules/Google/resources/map.js"></script>

<span id="map_record" class="hide"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value;?>
</span>
<span id="map_module" class="hide"><?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
</span>
<div id="map_canvas">
    <span id="map_address" class="hide"></span>
    <img id="map_link" class="pull-right icon-share cursorPointer"></img>
</div>

<?php }} ?>