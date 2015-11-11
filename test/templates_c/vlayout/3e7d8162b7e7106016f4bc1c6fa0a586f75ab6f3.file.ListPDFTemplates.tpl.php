<?php /* Smarty version Smarty-3.1.7, created on 2015-04-27 19:48:01
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ListPDFTemplates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1822852151553ed1b9e8eae9-63148611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e7d8162b7e7106016f4bc1c6fa0a586f75ab6f3' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/PDFMaker/ListPDFTemplates.tpl',
      1 => 1430180220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1822852151553ed1b9e8eae9-63148611',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_553ed1b9f027c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553ed1b9f027c')) {function content_553ed1b9f027c($_smarty_tpl) {?>
<script type="text/javascript" src="layouts/vlayout/modules/PDFMaker/resources/PDFMakerActions.js"></script><script type="text/javascript" src="layouts/vlayout/modules/PDFMaker/resources/PDFMaker.js"></script><div class="contentsDiv marginLeftZero"><div class="listViewPageDiv"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListPDFHeader.tpl','PDFMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="listViewContentDiv" id="listViewContents"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ListPDFTemplatesContents.tpl','PDFMaker'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php }} ?>