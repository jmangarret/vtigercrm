<?php /* Smarty version Smarty-3.1.7, created on 2015-02-18 02:53:52
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/MailManager/FolderOpen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178937225754e3fec0436e73-19327869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab5573423a38c4fb6a454a2d5c4ed4644a8f4053' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/MailManager/FolderOpen.tpl',
      1 => 1423065968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178937225754e3fec0436e73-19327869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FOLDER' => 0,
    'MODULE' => 0,
    'FOLDERLIST' => 0,
    'folder' => 0,
    'QUERY' => 0,
    'SEARCHOPTIONS' => 0,
    'arr' => 0,
    'TYPE' => 0,
    'option' => 0,
    'MAIL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e3fec06365a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3fec06365a')) {function content_54e3fec06365a($_smarty_tpl) {?>
<div class="listViewPageDiv" id="email_con" name="email_con"><input type="hidden" id="jscal_dateformat" name="jscal_dateformat" value="yyyy-mm-dd" /><div class="listViewTopMenuDiv noprint"><div class="listViewActionsDiv row-fluid" style="padding: 0px;"><span class="btn-toolbar span12"><strong><?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
</strong><?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->mails()){?><span class="pull-right listViewActions"><span class="pageNumbers alignTop"><?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->pageInfo();?>
</span><span class="btn-group alignTop"><span class="btn-group"><?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->hasPrevPage()){?><button class="btn" href="#<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
/page/<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->pageCurrent(-1);?>
" onclick="MailManager.folder_open('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
', <?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->pageCurrent(-1);?>
);"><span class="icon-chevron-left"></span></button><?php }?><?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->hasNextPage()){?><button class="btn" href="#<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
/page/<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->pageCurrent(1);?>
" onclick="MailManager.folder_open('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
', <?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->pageCurrent(1);?>
);"><span class="icon-chevron-right"></span></button><?php }?></span></span></span><?php }?>&nbsp;</span></div></div><div class="listViewContentDiv"><div class="listViewEntriesDiv"><table class="table table-bordered listViewEntriesTable"><thead><tr class="listViewHeaders"><th colspan="2" class="narrowWidthType"><input align="left" type="checkbox" class='small'  name="selectall" id="parentCheckBox" onClick='MailManager.toggleSelect(this.checked,"mc_box");'/>&nbsp;<input type=button class='crmbutton small delete' onclick="MailManager.massMailDelete('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
');" value="<?php echo vtranslate('LBL_Delete',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" style="margin-bottom:0px !important;"/>&nbsp;<select style="width:auto;margin-bottom: 0px !important;" id="moveFolderList" onchange="MailManager.moveMail(this);" style="margin-bottom:0px !important;"><option value=""><?php echo vtranslate('LBL_MOVE_TO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['folder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['folder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FOLDERLIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['folder']->key => $_smarty_tpl->tpl_vars['folder']->value){
$_smarty_tpl->tpl_vars['folder']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['folder']->value;?>
</option><?php } ?></select></th><th colspan="2" class="narrowWidthType"><div class="pull-right"><?php echo vtranslate('LBL_Search',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<input type="text" id='search_txt' class='small' value="<?php echo $_smarty_tpl->tpl_vars['QUERY']->value;?>
" style="margin-bottom:0px !important;"/>&nbsp;<img id="jscal_trigger_fval" width="20" align="absmiddle" height="20" src="" style="display:none"><?php echo vtranslate('LBL_IN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<select style="width:auto; margin-bottom: 0px !important;" id="search_type" onchange="MailManager.addRequiredElements()" style="margin-bottom:0px !important;"><?php  $_smarty_tpl->tpl_vars['arr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arr']->_loop = false;
 $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SEARCHOPTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->key => $_smarty_tpl->tpl_vars['arr']->value){
$_smarty_tpl->tpl_vars['arr']->_loop = true;
 $_smarty_tpl->tpl_vars['option']->value = $_smarty_tpl->tpl_vars['arr']->key;
?><?php if ($_smarty_tpl->tpl_vars['arr']->value==$_smarty_tpl->tpl_vars['TYPE']->value){?><option value="<?php echo $_smarty_tpl->tpl_vars['arr']->value;?>
" selected ><?php echo getTranslatedString($_smarty_tpl->tpl_vars['option']->value);?>
</option><?php }else{ ?><option value="<?php echo $_smarty_tpl->tpl_vars['arr']->value;?>
" ><?php echo getTranslatedString($_smarty_tpl->tpl_vars['option']->value);?>
</option><?php }?><?php } ?></select>&nbsp;<input type=submit class="crmbutton small edit" onclick="MailManager.search_mails('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
');" value="<?php echo vtranslate('LBL_FIND',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" id="mm_search" style="margin-bottom:0px !important;"/></div></th></tr></thead><tbody><?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->mails()){?><?php  $_smarty_tpl->tpl_vars['MAIL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MAIL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FOLDER']->value->mails(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MAIL']->key => $_smarty_tpl->tpl_vars['MAIL']->value){
$_smarty_tpl->tpl_vars['MAIL']->_loop = true;
?><tr class="listViewEntries <?php if ($_smarty_tpl->tpl_vars['MAIL']->value->isRead()){?>mm_normal<?php }else{ ?>fontBold<?php }?> mm_clickable"id="_mailrow_<?php echo $_smarty_tpl->tpl_vars['MAIL']->value->msgNo();?>
" onmouseover='MailManager.highLightListMail(this);' onmouseout='MailManager.unHighLightListMail(this);'><td width="3%" class="narrowWidthType"><input type='checkbox' value = "<?php echo $_smarty_tpl->tpl_vars['MAIL']->value->msgNo();?>
" name = 'mc_box' class='small'onclick='MailManager.toggleSelectMail(this.checked, this);'></td><td width="27%" class="narrowWidthType" onclick="MailManager.mail_open('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
', <?php echo $_smarty_tpl->tpl_vars['MAIL']->value->msgNo();?>
);"><?php echo $_smarty_tpl->tpl_vars['MAIL']->value->from(30);?>
</td><td class="narrowWidthType" onclick="MailManager.mail_open('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
', <?php echo $_smarty_tpl->tpl_vars['MAIL']->value->msgNo();?>
);"><?php echo $_smarty_tpl->tpl_vars['MAIL']->value->subject();?>
</td><td width="17%" class="narrowWidthType" align="right" onclick="MailManager.mail_open('<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
', <?php echo $_smarty_tpl->tpl_vars['MAIL']->value->msgNo();?>
);"><?php echo $_smarty_tpl->tpl_vars['MAIL']->value->date(true);?>
</td></tr><?php } ?><?php }else{ ?><tr><td>&nbsp;</td><td>&nbsp;</td><td><b><?php echo vtranslate('LBL_No_Mails_Found',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></td></tr><?php }?></tbody></table></div></div></div><?php }} ?>