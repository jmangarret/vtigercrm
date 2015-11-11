<?php /* Smarty version 2.6.18, created on 2015-02-04 15:52:06
         compiled from Header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getTranslatedString', 'Header.tpl', 15, false),array('modifier', 'vtiger_imageurl', 'Header.tpl', 85, false),array('modifier', 'escape', 'Header.tpl', 171, false),array('modifier', 'vtlib_purify', 'Header.tpl', 365, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo $this->_tpl_vars['USER']; ?>
 - <?php echo getTranslatedString($this->_tpl_vars['MODULE_NAME'], $this->_tpl_vars['MODULE_NAME']); ?>
 - <?php echo $this->_tpl_vars['APP']['LBL_BROWSER_TITLE']; ?>
</title>
	<link REL="SHORTCUT ICON" HREF="themes/images/vtigercrm_icon.ico">
	<style type="text/css">@import url("themes/<?php echo $this->_tpl_vars['THEME']; ?>
/style.css?v=<?php echo $this->_tpl_vars['VERSION']; ?>
");</style>
	<link rel="stylesheet" type="text/css" media="all" href="jscalendar/calendar-win2k-cold-1.css">
<?php if ($this->_tpl_vars['HEADERCSS']): ?>
	<!-- Custom Header CSS -->
	<?php $_from = $this->_tpl_vars['HEADERCSS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['HDRCSS']):
?>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['HDRCSS']->linkurl; ?>
" />
	<?php endforeach; endif; unset($_from); ?>
	<!-- END -->
<?php endif; ?>
	<!-- ActivityReminder customization for callback -->
<?php echo '
	<style type="text/css">div.fixedLay1 { position:fixed; }</style>
	<!--[if lte IE 6]>
	<style type="text/css">div.fixedLay { position:absolute; }</style>
	<![endif]-->
	<style type="text/css">div.drop_mnu_user { position:fixed; }</style>
	<!--[if lte IE 6]>
	<style type="text/css">div.drop_mnu_user { position:absolute; }</style>
	<![endif]-->
'; ?>

	<!-- End -->
</head>
	<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 class=small>
	<a name="top"></a>
	<!-- header -->
	<!-- header-vtiger crm name & RSS -->
	<script language="JavaScript" type="text/javascript" src="include/js/json.js"></script>
	<script language="JavaScript" type="text/javascript" src="include/js/general.js?v=<?php echo $this->_tpl_vars['VERSION']; ?>
"></script>
	<!-- vtlib customization: Javascript hook -->
	<script language="JavaScript" type="text/javascript" src="include/js/vtlib.js?v=<?php echo $this->_tpl_vars['VERSION']; ?>
"></script>
	<!-- END -->
	<script language="JavaScript" type="text/javascript" id="_current_language_" src="include/js/<?php  echo $_SESSION['authenticated_user_language']; ?>.lang.js?<?php  echo $_SESSION['vtiger_version']; ?>"></script>
	<script language="JavaScript" type="text/javascript" src="include/js/QuickCreate.js"></script>
	<script language="javascript" type="text/javascript" src="include/scriptaculous/prototype.js"></script>
	<script language="JavaScript" type="text/javascript" src="include/js/menu.js?v=<?php echo $this->_tpl_vars['VERSION']; ?>
"></script>
	<script language="JavaScript" type="text/javascript" src="include/calculator/calc.js"></script>
	<script language="JavaScript" type="text/javascript" src="modules/Calendar/script.js"></script>
	<script language="javascript" type="text/javascript" src="include/scriptaculous/dom-drag.js"></script>
	<script language="JavaScript" type="text/javascript" src="include/js/notificationPopup.js"></script>
	<script type="text/javascript" src="jscalendar/calendar.js"></script>
	<script type="text/javascript" src="jscalendar/calendar-setup.js"></script>
	<script type="text/javascript" src="jscalendar/lang/calendar-<?php echo $this->_tpl_vars['APP']['LBL_JSCALENDAR_LANG']; ?>
.js"></script>
	<script type="text/javascript" src="include/jquery/jquery-1.6.2.min.js"></script>
   	<script type="text/javascript">
		jQuery.noConflict();
	</script>
    <!-- asterisk Integration -->
<?php if ($this->_tpl_vars['USE_ASTERISK'] == 'true'): ?>
	<script type="text/javascript" src="include/js/asterisk.js"></script>
	<script type="text/javascript">
	if(typeof(use_asterisk) == 'undefined') use_asterisk = true;
	</script>
<?php endif; ?>
    <!-- END -->

<?php if ($this->_tpl_vars['HEADERSCRIPTS']): ?>
	<!-- Custom Header Script -->
	<?php $_from = $this->_tpl_vars['HEADERSCRIPTS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['HEADERSCRIPT']):
?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['HEADERSCRIPT']->linkurl; ?>
"></script>
	<?php endforeach; endif; unset($_from); ?>
	<!-- END -->
<?php endif; ?>

	    <img src="<?php echo vtiger_imageurl('layerPopupBg.gif', $this->_tpl_vars['THEME']); ?>
" style="display: none;"/>
    
<TABLE border=0 cellspacing=0 cellpadding=0 width=100% class="small">
	<tr>
		<td valign=top align=left><img src="test/logo/<?php echo $this->_tpl_vars['LOGO']; ?>
" alt="<?php echo $this->_tpl_vars['LOGO']; ?>
" title="<?php echo $this->_tpl_vars['LOGO']; ?>
" border=0 style="width: 15em;height: 4.2em;"></td>
		<td align="center" valign=bottom  >
			<div align ="center" width ="50%" border='3' style="padding:5px;">
				<table border=0 cellspacing=0 cellpadding=0 id="search" align="center">
			   		<tr>
					<form name="UnifiedSearch" method="post" action="index.php" style="margin:0px" onsubmit="VtigerJS_DialogBox.block();">
						<td style="background-color:#ffffef;border:1px;border-color:black;vertical-align:middle;" nowrap>
							<input type="hidden" name="action" value="UnifiedSearch" style="margin:0px">
							<input type="hidden" name="module" value="Home" style="margin:0px">
							<input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['CATEGORY']; ?>
" style="margin:0px">
							<input type="hidden" name="search_onlyin" value="--USESELECTED--" style="margin:0px">
							<input type="text" name="query_string" value="<?php echo $this->_tpl_vars['QUERY_STRING']; ?>
" class="searchBox" onFocus="this.value=''" >
						</td>
                        <td align ="right" style="background-color:#FFFFEF; vertical-align:middle;padding:5px;" onclick="UnifiedSearch_SelectModuleForm(this);">
                                <a href='javascript:void(0);' ><img src="<?php echo vtiger_imageurl('arrow_down_black.png', $this->_tpl_vars['THEME']); ?>
" align='left' border=0></a>
                        </td>
						<td style="background-color:#cccccc">
							<input type="image" class="searchBtn"  alt="<?php echo $this->_tpl_vars['APP']['LBL_FIND']; ?>
" title="<?php echo $this->_tpl_vars['APP']['LBL_FIND']; ?>
" width = "70%;" height="70%" src="<?php echo vtiger_imageurl('searchicon.PNG', $this->_tpl_vars['THEME']); ?>
" align='left' border=1 onsubmit ="submit-form();">
						</td>
					</form>
		   			</tr>
				</table>
			</div>
		</td>
		<td class=small nowrap align="right" style="padding-right:10px;">
			<table border=0 cellspacing=0 cellpadding=0>
			<tr>
				<td valign="top" class="genHeaderSmall" style="padding-left:10px;padding-top:3px;">
					<span class="userName"><?php echo $this->_tpl_vars['USER']; ?>
</span>
				</td>
								<td class="small"  onmouseover="fnDropDownUser(this,'ondemand_sub','~<?php echo $this->_tpl_vars['CURRENT_USER_MAIL']; ?>
`');" onmouseout="fnHideDrop('ondemand_sub');" valign="bottom" nowrap style="padding-bottom: 1em;"><img src="<?php echo $this->_tpl_vars['IMAGEPATH']; ?>
user.PNG" border=0 style="padding: 0px;padding-left:5px"></td>
												<?php if ($this->_tpl_vars['HEADERLINKS']): ?>
				<td style="padding-left:10px;padding-right:5px" class=small nowrap>
					<a href="javascript:;" onmouseover="fnvshobj(this,'vtlib_headerLinksLay');" onclick="fnvshobj(this,'vtlib_headerLinksLay');"><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
</a> <img src="<?php echo vtiger_imageurl('arrow_down.gif', $this->_tpl_vars['THEME']); ?>
" border=0>
					<div style="display: none; left: 193px; top: 106px;width:155px; position:absolute;" id="vtlib_headerLinksLay"
					onmouseout="fninvsh('vtlib_headerLinksLay')" onmouseover="fnvshNrm('vtlib_headerLinksLay')">
					<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="border-bottom: 1px solid rgb(204, 204, 204); padding: 5px;"><b><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
</b></td>
					</tr>
					<tr>
						<td>
						<?php $_from = $this->_tpl_vars['HEADERLINKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['HEADERLINK']):
?>
						<?php $this->assign('headerlink_href', $this->_tpl_vars['HEADERLINK']->linkurl); ?>
						<?php $this->assign('headerlink_label', $this->_tpl_vars['HEADERLINK']->linklabel); ?>
						<?php if ($this->_tpl_vars['headerlink_label'] == ''): ?>
							<?php $this->assign('headerlink_label', $this->_tpl_vars['headerlink_href']); ?>
						<?php else: ?>
													<?php $this->assign('headerlink_label', getTranslatedString($this->_tpl_vars['headerlink_label'], $this->_tpl_vars['HEADERLINK']->module())); ?>
						<?php endif; ?>
						<a href="<?php echo $this->_tpl_vars['headerlink_href']; ?>
" class="drop_down"><?php echo $this->_tpl_vars['headerlink_label']; ?>
</a>
						<?php endforeach; endif; unset($_from); ?>
						</td>
					</tr>
					</table>
					</div>
				</td>
				<?php endif; ?>
								<td  onmouseout="fnHideDrop('usersettings');" onmouseover="fnDropDownUser(this,'usersettings');"  valign="bottom" nowrap style="padding-bottom: 1em;" class="small" nowrap> <a> <img src="<?php echo $this->_tpl_vars['IMAGEPATH']; ?>
info.PNG" border=0 style="padding: 0px;padding-left:5px"></a></td>
				<?php if ($this->_tpl_vars['ADMIN_LINK'] != ''): ?>
					<?php $_from = $this->_tpl_vars['HEADERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['maintabs'] => $this->_tpl_vars['detail']):
?>
						<?php if ($this->_tpl_vars['maintabs'] == 'Settings'): ?>
							<td  valign="bottom" nowrap style="padding-bottom: 1em;" class="small" onmouseout="fnHideDrop('mainsettings');" onmouseover="fnDropDown(this,'mainsettings');" nowrap><img src="<?php echo $this->_tpl_vars['IMAGEPATH']; ?>
mainSettings.PNG"  border=0 style="padding: 0px;padding-left:5px "></td>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
			</tr>
			</table>
        </td>
	</tr>
</TABLE>
<?php if ($this->_tpl_vars['ANNOUNCEMENT']): ?>
	<table width ="100%">
	<tr  colspan="3" width="100%">
		<td width="90%" align=center>
			<?php if ($this->_tpl_vars['APP'][$this->_tpl_vars['MODULE_NAME']] == 'Dashboards'): ?>
				<marquee id="rss" direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onMouseOver="javascript:stop();" onMouseOut="javascript:start();">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['ANNOUNCEMENT'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</marquee>
			<?php else: ?>
				<marquee id="rss" direction="left" scrolldelay="10" scrollamount="3" behavior="scroll" class="marStyle" onMouseOver="javascript:stop();" onMouseOut="javascript:start();">&nbsp;<?php echo $this->_tpl_vars['ANNOUNCEMENT']; ?>
</marquee>
			<?php endif; ?>
		</td>
		<td width="10%" align="right" style="padding-right:38px;"><img src="<?php echo vtiger_imageurl('Announce.PNG', $this->_tpl_vars['THEME']); ?>
"></td>
	</tr>
	</table>
<?php endif; ?>

<div id='miniCal' style='width:300px; position:absolute; display:none; left:100px; top:100px; z-index:100000'></div>

<?php if ($this->_tpl_vars['MODULE_NAME'] == 'Calendar'): ?>
	<div id="CalExport" style="width:300px; position:absolute; display:none; left:500px; top:100px; z-index:100000" class="layerPopup">
		<table border=0 cellspacing=0 cellpadding=5 width=100% class=layerHeadingULine>
		<tr>
			<td class="genHeaderSmall" nowrap align="left" width="30%" ><?php echo $this->_tpl_vars['APP']['LBL_EXPORT']; ?>
 </td>
			<td align="right"><a href='javascript:ghide("CalExport");'><img src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
" align="right" border="0"></a></td>
		</tr>
		</table>
		<table border=0 cellspacing=0 cellpadding=5 width=95% align=center>
		<tr>
			<td class="small">
				<table border=0 celspacing=0 cellpadding=5 width=100% align=center bgcolor=white>
				<tr>
					<td align="right" nowrap class="cellLabel small">
						<input class="small" type='radio' name='exportCalendar' value = 'iCal' onclick="$('ics_filename').removeAttribute('disabled');" checked /> iCal Format
					</td>
					<td align="left">
						<input class="small" type='text' name='ics_filename' id='ics_filename' size='25' value='vtiger.calendar'/>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		<table border=0 cellspacing=0 cellpadding=5 width=100% class="layerPopupTransport">
		<tr>
			<td class="small" align="center">
				<input type="button" onclick="return exportCalendar();" value="Export" class="crmbutton small edit" name="button"/>
			</td>
		</tr>
		</table>
	</div>
	<div id='CalImport' style='width:300px; position:absolute; display:none; left:500px; top:100px; z-index:100000' class="layerPopup">
		<?php $this->assign('label_filename', 'LBL_FILENAME'); ?>
		<form name='ical_import' id='ical_import' onsubmit="VtigerJS_DialogBox.block();" enctype="multipart/form-data" action="index.php" method="POST">
		<input type='hidden' name='module' value=''>
		<input type='hidden' name='action' value=''>
		<table border=0 cellspacing=0 cellpadding=5 width=100% class=layerHeadingULine>
		<tr>
			<td class="genHeaderSmall" nowrap align="left" width="30%" id="editfolder_info"><?php echo $this->_tpl_vars['APP']['LBL_IMPORT']; ?>
</td>
			<td align="right"><a href='javascript:ghide("CalImport");'><img src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
" align="absmiddle" border="0"></a></td>
		</tr>
		</table>
		<table border=0 cellspacing=0 cellpadding=5 width=95% align=center>
		<tr>
			<td class="small">
				<table border=0 celspacing=0 cellpadding=5 width=100% align=center bgcolor=white>
				<tr>
					<td align="right" nowrap class="cellLabel small"><b><?php echo getTranslatedString($this->_tpl_vars['label_filename']); ?>
 </b></td>
					<td align="left">
						<input class="small" type='file' name='ics_file' id='ics_file'/>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		<table border=0 cellspacing=0 cellpadding=5 width=100% class="layerPopupTransport">
		<tr>
			<td class="small" align="center">
				<input type="button" onclick="return importCalendar();" value="Import" class="crmbutton small edit" name="button"/>
			</td>
		</tr>
		</table>
	</form>
	</div>
<?php endif; ?>

<!-- header - master tabs -->
<TABLE border=0 cellspacing=0 cellpadding=0 width=100% class="hdrTabBg">
<tr>
	<?php if ($this->_tpl_vars['MODULE_NAME'] == 'Home'): ?>
		<td style="width:50px" class='tabSelected' align = "center"><a href= "index.php?module=Home&action=index"><img src="<?php echo $this->_tpl_vars['IMAGEPATH']; ?>
Home.PNG" style="width:16px;height:16px;" border="0" /></a></td>
	<?php else: ?>
		<td style="width:50px" class='tabUnSelected' align = "center"><a href= "index.php?module=Home&action=index&parenttab=My Home Page"><img src="<?php echo $this->_tpl_vars['IMAGEPATH']; ?>
Home.PNG" style="width:16px;height:16px;" border="0" /></a></td>
	<?php endif; ?>
	<td class=small nowrap>
		<table border=0 cellspacing=0 cellpadding=0>
		<tr>
			<td class=tabSeperator ><img src="<?php echo vtiger_imageurl('spacer.gif', $this->_tpl_vars['THEME']); ?>
" width=2px height=28px align="right"></td>
				<?php $this->assign('count', 1); ?>
                <?php $_from = $this->_tpl_vars['MENUSTRUCTURE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['maintabs'] => $this->_tpl_vars['detail']):
?>
					<?php if ($this->_tpl_vars['maintabs'] == 'top'): ?>
                    <?php $_from = $this->_tpl_vars['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['number'] => $this->_tpl_vars['name']):
?>
						<?php $this->assign('modulename', getTranslatedString($this->_tpl_vars['name'][1], $this->_tpl_vars['name'][0])); ?>
                        <?php $this->assign('modulelabel', $this->_tpl_vars['name'][0]); ?>
                        <?php if ($this->_tpl_vars['modulelabel'] != $this->_tpl_vars['MODULE_NAME']): ?>
							<td class="tabUnSelected"  align="center" nowrap><a href="index.php?module=<?php echo $this->_tpl_vars['name'][0]; ?>
&action=index"><?php echo $this->_tpl_vars['modulename']; ?>
</a></td>
                            <td class="tabSeperator"><img src="<?php echo vtiger_imageurl('spacer.gif', $this->_tpl_vars['THEME']); ?>
"></td>
						<?php else: ?>
							<td class="tabSelected"  align="center" nowrap><a href="index.php?module=<?php echo $this->_tpl_vars['name'][0]; ?>
&action=index"><?php echo $this->_tpl_vars['modulename']; ?>
</a></td>
                            <td class="tabSeperator"><img src="<?php echo vtiger_imageurl('spacer.gif', $this->_tpl_vars['THEME']); ?>
"></td>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php $_from = $this->_tpl_vars['MENUSTRUCTURE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['maintabs'] => $this->_tpl_vars['detail']):
?>
					<?php if ($this->_tpl_vars['maintabs'] == 'more' && $this->_tpl_vars['detail'] != null): ?>
						<td class="tabUnSelected"  align="center" onmouseout="fnHide_Event('allMenu');" onmouseover="fnvshobjMore(this,'allMenu','<?php echo $this->_tpl_vars['ANNOUNCEMENT']; ?>
');"nowrap><a href="javascript:;" ><?php echo $this->_tpl_vars['APP']['LBL_MORE']; ?>
<img src="<?php echo vtiger_imageurl('menuDnArrow.gif', $this->_tpl_vars['THEME']); ?>
" border=0 style="padding-left:5px" /></a></td>
						<td class="tabSeperator"><img src="<?php echo vtiger_imageurl('spacer.gif', $this->_tpl_vars['THEME']); ?>
"></td>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<td style="padding-left:10px" nowrap>
				<?php if ($this->_tpl_vars['CNT'] == 1): ?>
					<select class=small id="qccombo" style="width:110px"  onclick="QCreate(this);">
						<option value="none"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_CREATE']; ?>
...</option>
							<?php $_from = $this->_tpl_vars['QCMODULE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['detail']):
?>
								<option value="<?php echo $this->_tpl_vars['detail']['1']; ?>
"><?php echo $this->_tpl_vars['APP']['NEW']; ?>
&nbsp;<?php echo $this->_tpl_vars['detail']['0']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
					</select>
				<?php else: ?>
					<select class=small id="qccombo" style="width:110px"  onchange="QCreate(this);">
						<option value="none"><?php echo $this->_tpl_vars['APP']['LBL_QUICK_CREATE']; ?>
...</option>
						<?php $_from = $this->_tpl_vars['QCMODULE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['detail']):
?>
							<option value="<?php echo $this->_tpl_vars['detail']['1']; ?>
"><?php echo $this->_tpl_vars['APP']['NEW']; ?>
&nbsp;<?php echo $this->_tpl_vars['detail']['0']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				<?php endif; ?>
				</td>
			</tr>
			</table>
		</td>
		<td align=right style="padding-right:10px" nowrap >
		</td>
	</tr>
	</TABLE>


<div id="calculator_cont" style="position:absolute; z-index:10000" ></div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Clock.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="qcform" style="position:absolute;width:700px;top:80px;left:450px;z-index:90000;"></div>

<!-- Unified Search module selection feature -->
<div id="UnifiedSearch_moduleformwrapper" style="position:absolute;width:417px;z-index:100002;display:none;"></div>
<script type='text/javascript'>
<?php echo '
function UnifiedSearch_SelectModuleForm(obj) {
	if($(\'UnifiedSearch_moduleform\')) {
		// If we have loaded the form already.
		UnifiedSearch_SelectModuleFormCallback(obj);
	} else {
		$(\'status\').show();
		new Ajax.Request(
		\'index.php\',
		{queue: {position: \'end\', scope: \'command\'},
			method: \'post\',
			postBody: \'module=Home&action=HomeAjax&file=UnifiedSearchModules&ajax=true\',
			onComplete: function(response) {
				$(\'status\').hide();
				$(\'UnifiedSearch_moduleformwrapper\').innerHTML = response.responseText;
				UnifiedSearch_SelectModuleFormCallback(obj);
			}
		});
	}
}
function UnifiedSearch_SelectModuleFormCallback(obj) {
	fnvshobjsearch(obj, \'UnifiedSearch_moduleformwrapper\');
}
function UnifiedSearch_SelectModuleToggle(flag) {
	Form.getElements($(\'UnifiedSearch_moduleform\')).each(
		function(element) {
			if(element.type == \'checkbox\') {
				element.checked = flag;
			}
		}
	);
}
function UnifiedSearch_SelectModuleCancel() {
	$(\'UnifiedSearch_moduleformwrapper\').hide();
}
function UnifiedSearch_SelectModuleSave() {
	var UnifiedSearch_form = document.forms.UnifiedSearch;
	UnifiedSearch_form.search_onlyin.value = Form.serialize($(\'UnifiedSearch_moduleform\')).replace(/search_onlyin=/g, \'\').replace(/&/g,\',\');
	UnifiedSearch_SelectModuleCancel();
}

'; ?>

</script>
<!-- End -->

<script>
var gVTModule = '<?php echo vtlib_purify($_REQUEST['module']); ?>
';
var gVTTheme  = '<?php echo $this->_tpl_vars['THEME']; ?>
';
function fetch_clock()
{
	new Ajax.Request(
		'index.php',
		{queue: {position: 'end', scope: 'command'},
			method: 'post',
			postBody: 'module=Utilities&action=UtilitiesAjax&file=Clock',
			onComplete: function(response)
				    {
					$("clock_cont").innerHTML=response.responseText;
					execJS($('clock_cont'));
				    }
		}
	);

}

function fetch_calc()
{
	new Ajax.Request(
		'index.php',
		{queue: {position: 'end', scope: 'command'},
			method: 'post',
			postBody: 'module=Utilities&action=UtilitiesAjax&file=Calculator',
			onComplete: function(response)
					{
						$("calculator_cont").innerHTML=response.responseText;
						execJS($('calculator_cont'));
					}
		}
	);
}
</script>

<script type="text/javascript">
<?php echo '
function QCreate(qcoptions){
	var module = qcoptions.options[qcoptions.options.selectedIndex].value;
	if(module != \'none\'){
		$("status").style.display="inline";
		if(module == \'Events\'){
			module = \'Calendar\';
			var urlstr = \'&activity_mode=Events\';
		}else if(module == \'Calendar\'){
			module = \'Calendar\';
			var urlstr = \'&activity_mode=Task\';
		}else{
			var urlstr = \'\';
		}
		new Ajax.Request(
			\'index.php\',
				{queue: {position: \'end\', scope: \'command\'},
				method: \'post\',
				postBody: \'module=\'+module+\'&action=\'+module+\'Ajax&file=QuickCreate\'+urlstr,
				onComplete: function(response){
					$("status").style.display="none";
					$("qcform").style.display="inline";
					$("qcform").innerHTML = response.responseText;
					// Evaluate all the script tags in the response text.
					var scriptTags = $("qcform").getElementsByTagName("script");
					for(var i = 0; i< scriptTags.length; i++){
						var scriptTag = scriptTags[i];
						eval(scriptTag.innerHTML);
					}
                    eval($("qcform"));
                    posLay(qcoptions, "qcform");
				}
			}
		);
	}else{
		hide(\'qcform\');
	}
}

function getFormValidate(divValidate)
{
  var st = document.getElementById(\'qcvalidate\');
  eval(st.innerHTML);
  for (var i=0; i<qcfieldname.length; i++) {
		var curr_fieldname = qcfieldname[i];
		if(window.document.QcEditView[curr_fieldname] != null)
		{
			var type=qcfielddatatype[i].split("~")
			var input_type = window.document.QcEditView[curr_fieldname].type;
			if (type[1]=="M") {
					if (!qcemptyCheck(curr_fieldname,qcfieldlabel[i],input_type))
						return false
				}
			switch (type[0]) {
				case "O"  : break;
				case "V"  : break;
				case "C"  : break;
				case "DT" :
					if (window.document.QcEditView[curr_fieldname] != null && window.document.QcEditView[curr_fieldname].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\').length!=0)
					{
						if (type[1]=="M")
							if (!qcemptyCheck(type[2],qcfieldlabel[i],getObj(type[2]).type))
								return false
						if(typeof(type[3])=="undefined") var currdatechk="OTH"
						else var currdatechk=type[3]

						if (!qcdateTimeValidate(curr_fieldname,type[2],qcfieldlabel[i],currdatechk))
							return false
						if (type[4]) {
							if (!dateTimeComparison(curr_fieldname,type[2],qcfieldlabel[i],type[5],type[6],type[4]))
								return false

						}
					}
				break;
				case "D"  :
					if (window.document.QcEditView[curr_fieldname] != null && window.document.QcEditView[curr_fieldname].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\').length!=0)
					{
						if(typeof(type[2])=="undefined") var currdatechk="OTH"
						else var currdatechk=type[2]

							if (!qcdateValidate(curr_fieldname,qcfieldlabel[i],currdatechk))
								return false
									if (type[3]) {
										if (!qcdateComparison(curr_fieldname,qcfieldlabel[i],type[4],type[5],type[3]))
											return false
									}
					}
				break;
				case "T"  :
					if (window.document.QcEditView[curr_fieldname] != null && window.document.QcEditView[curr_fieldname].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\').length!=0)
					{
						if(typeof(type[2])=="undefined") var currtimechk="OTH"
						else var currtimechk=type[2]

							if (!timeValidate(curr_fieldname,qcfieldlabel[i],currtimechk))
								return false
									if (type[3]) {
										if (!timeComparison(curr_fieldname,qcfieldlabel[i],type[4],type[5],type[3]))
											return false
									}
					}
				break;
				case "I"  :
					if (window.document.QcEditView[curr_fieldname] != null && window.document.QcEditView[curr_fieldname].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\').length!=0)
					{
						if (window.document.QcEditView[curr_fieldname].value.length!=0)
						{
							if (!qcintValidate(curr_fieldname,qcfieldlabel[i]))
								return false
							if (type[2]) {
								if (!qcnumConstComp(curr_fieldname,qcfieldlabel[i],type[2],type[3]))
									return false
							}
						}
					}
				break;
				case "N"  :
					case "NN" :
					if (window.document.QcEditView[curr_fieldname] != null && window.document.QcEditView[curr_fieldname].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\').length!=0)
					{
						if (window.document.QcEditView[curr_fieldname].value.length!=0)
						{
							if (typeof(type[2])=="undefined") var numformat="any"
							else var numformat=type[2]

								if (type[0]=="NN") {

									if (!numValidate(curr_fieldname,qcfieldlabel[i],numformat,true))
										return false
								} else {
									if (!numValidate(curr_fieldname,qcfieldlabel[i],numformat))
										return false
								}
							if (type[3]) {
								if (!numConstComp(curr_fieldname,qcfieldlabel[i],type[3],type[4]))
									return false
							}
						}
					}
				break;
				case "E"  :
					if (window.document.QcEditView[curr_fieldname] != null && window.document.QcEditView[curr_fieldname].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\').length!=0)
					{
						if (window.document.QcEditView[curr_fieldname].value.length!=0)
						{
							var etype = "EMAIL"
								if (!qcpatternValidate(curr_fieldname,qcfieldlabel[i],etype))
									return false
						}
					}
				break;
			}
		}
	}
       //added to check Start Date & Time,if Activity Status is Planned.//start
        for (var j=0; j<qcfieldname.length; j++)
		{
			curr_fieldname = qcfieldname[j];
			if(window.document.QcEditView[curr_fieldname] != null)
			{
				if(qcfieldname[j] == "date_start")
				{
					var datelabel = qcfieldlabel[j]
						var datefield = qcfieldname[j]
						var startdatevalue = window.document.QcEditView[datefield].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\')
				}
				if(qcfieldname[j] == "time_start")
				{
					var timelabel = qcfieldlabel[j]
						var timefield = qcfieldname[j]
						var timeval=window.document.QcEditView[timefield].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\')
				}
				if(qcfieldname[j] == "eventstatus" || qcfieldname[j] == "taskstatus")
				{
					var statusvalue = window.document.QcEditView[curr_fieldname].options[window.document.QcEditView[curr_fieldname].selectedIndex].value.replace(/^\\s+/g, \'\').replace(/\\s+$/g, \'\')
					var statuslabel = qcfieldlabel[j++]
				}
			}
		}
	if(statusvalue == "Planned")
        {
               var dateelements=splitDateVal(startdatevalue)
	       var hourval=parseInt(timeval.substring(0,timeval.indexOf(":")))
               var minval=parseInt(timeval.substring(timeval.indexOf(":")+1,timeval.length))
               var dd=dateelements[0]
               var mm=dateelements[1]
               var yyyy=dateelements[2]

               var chkdate=new Date()
               chkdate.setYear(yyyy)
               chkdate.setMonth(mm-1)
               chkdate.setDate(dd)
	       chkdate.setMinutes(minval)
               chkdate.setHours(hourval)
		if(!comparestartdate(chkdate)) return false;


	 }//end
	return true;
}
</script>
'; ?>


<div id="allMenu" onmouseout="fnHide_Event('allMenu');" onMouseOver="fnvshNrm('allMenu');" style="z-index: 2147483647;visibility:hidden;display:block;overflow-x:auto;">
	<table border=0 cellpadding="0" cellspacing="0" class="allMnuTable" padding="0" style="width:20px;">
	<tr>
                <?php $_from = $this->_tpl_vars['MENUSTRUCTURE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modulelist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modulelist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['more'] => $this->_tpl_vars['childmodules']):
        $this->_foreach['modulelist']['iteration']++;
?>
                    <?php if ($this->_tpl_vars['more'] == 'more'): ?>
                        <?php $_from = $this->_tpl_vars['childmodules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parent'] => $this->_tpl_vars['childs']):
?>
                            <td valign="top"><table stye="width:20px;">
                            <tr><th><a class="drop_downnew_parent"> <?php echo $this->_tpl_vars['APP'][$this->_tpl_vars['parent']]; ?>
</a></th></tr>
                            <?php $_from = $this->_tpl_vars['childs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['number'] => $this->_tpl_vars['modules']):
?>
        			<?php $this->assign('modulelabel', getTranslatedString($this->_tpl_vars['modules'][1], $this->_tpl_vars['modules'][0])); ?>
        			<tr><td><a id = "more" name = "<?php echo $this->_tpl_vars['modulelabel']; ?>
"  href="index.php?module=<?php echo $this->_tpl_vars['modules']['0']; ?>
&action=index"  class="drop_downnew"><?php echo $this->_tpl_vars['modulelabel']; ?>
</a></td></tr>
                            <?php endforeach; endif; unset($_from); ?>
                            </table></td>
                        <?php endforeach; endif; unset($_from); ?>
                   <?php endif; ?>
        	<?php endforeach; endif; unset($_from); ?>
	</tr>
        </table>
</div>

<div id="status" style="position:absolute;display:none;left:850px;top:95px;height:27px;white-space:nowrap;"><img src="<?php echo vtiger_imageurl('status.gif', $this->_tpl_vars['THEME']); ?>
"></div>
<script>
function openwin()
{
            window.open("index.php?module=Users&action=about_us","aboutwin","height=520,width=515,top=200,left=300")
}

</script>


<div id="tracker" style="display:none;position:absolute;z-index:100000001;" class="layerPopup">

	<table border="0" cellpadding="5" cellspacing="0" width="200">
	<tr style="cursor:move;">
		<td colspan="2" class="mailClientBg small" id="Track_Handle"><strong><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</strong></td>
		<td align="right" style="padding:5px;" class="mailClientBg small">
		<a href="javascript:;"><img src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
" border="0"  onClick="fninvsh('tracker')" hspace="5" align="absmiddle"></a>
		</td></tr>
	</table>
	<table border="0" cellpadding="5" cellspacing="0" width="200" class="hdrNameBg">
	<?php $_from = $this->_tpl_vars['TRACINFO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['trackinfo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['trackinfo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['trackelements']):
        $this->_foreach['trackinfo']['iteration']++;
?>
	<tr>
		<td class="trackerListBullet small" align="center" width="12"><?php echo $this->_foreach['trackinfo']['iteration']; ?>
</td>
		<td class="trackerList small"> <a href="index.php?module=<?php echo $this->_tpl_vars['trackelements']['module_name']; ?>
&action=DetailView&record=<?php echo $this->_tpl_vars['trackelements']['crmid']; ?>
&parenttab=<?php echo $this->_tpl_vars['CATEGORY']; ?>
"><?php echo $this->_tpl_vars['trackelements']['item_summary']; ?>
</a> </td><td class="trackerList small">&nbsp;</td></tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>

<script>
	var THandle = document.getElementById("Track_Handle");
	var TRoot   = document.getElementById("tracker");
	Drag.init(THandle, TRoot);
</script>

<!--for admin users-->
<div class="drop_mnu_user" id="ondemand_sub" onmouseout="fnHideDrop('ondemand_sub')" onmouseover="fnShowDrop('ondemand_sub')" >
	<table border="0" cellpadding="0" cellspacing="0" border="0" cellpadding="0" cellspacing="0">
		<tr><td style="padding-left:0px;padding-right:10px font-weight:bold"  nowrap> <a id="_my_preferences_" href="index.php?module=Users&action=DetailView&record=<?php echo $this->_tpl_vars['CURRENT_USER_ID']; ?>
&modechk=prefview" class="drop_down_usersettings" ><?php echo $this->_tpl_vars['APP']['LBL_MY_PREFERENCES']; ?>
</a></td></tr>
		<tr><td style="padding-left:0px;padding-right:10px font-weight:bold"  nowrap> <a href="index.php?module=Users&action=Logout" class="drop_down_usersettings" ><?php echo $this->_tpl_vars['APP']['LBL_LOGOUT']; ?>
</a> </td></tr>
	</table>
</div>
<div  id="usersettings" class="drop_mnu_user" onmouseout="fnHideDrop('usersettings');" onmouseover="fnvshNrm('usersettings');"  style="width:110px;left:1226px;">
	<table border=0 width="100%" border="0" cellpadding="0" cellspacing="0" >
        <tr >
			<td style="padding-left:0px;padding-right:10px font-weight:bold"  nowrap> <a href="http://wiki.vtiger.com/index.php/Main_Page" target="_blank" class="drop_down_usersettings"><?php echo $this->_tpl_vars['APP']['LNK_HELP']; ?>
</a> </td>
        </tr>
        <tr>
			<td style="padding-left:0px;padding-right:10px font-weight:bold" nowrap> <a href="javascript:void(0);" onclick="vtiger_feedback();" class="drop_down_usersettings"><?php echo $this->_tpl_vars['APP']['LBL_FEEDBACK']; ?>
</a></td>
        </tr>
	</table>
</div>
<div  id="mainsettings" class="drop_mnu_user" onmouseout="fnHideDrop('mainsettings');" onmouseover="fnvshNrm('mainsettings');" style="width:110px;left:1226px;" >
	<table border=0 width="100%" border="0" cellpadding="0" cellspacing="0" >
        <?php $_from = $this->_tpl_vars['HEADERS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['maintabs'] => $this->_tpl_vars['detail']):
?>
				<?php if ($this->_tpl_vars['maintabs'] == 'Settings'): ?>
				<tr><td style="padding-left:0px;padding-right:10px font-weight:bold"  nowrap><a href="index.php?module=<?php echo $this->_tpl_vars['detail'][0]; ?>
&action=index&parenttab=" class="drop_down_usersettings"><?php echo getTranslatedString('LBL_CRM_SETTINGS', $this->_tpl_vars['MODULE_NAME']); ?>
</a></td></tr>
                                <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['ONDEMANDLINKS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ONDEMANDLINK']):
?>
		<?php $this->assign('headerlink_href', $this->_tpl_vars['ONDEMANDLINK']->linkurl); ?>
		<?php $this->assign('headerlink_label', $this->_tpl_vars['ONDEMANDLINK']->linklabel); ?>
		<?php if ($this->_tpl_vars['headerlink_label'] == ''): ?>
			<?php $this->assign('headerlink_label', $this->_tpl_vars['headerlink_href']); ?>
		<?php else: ?>
						<?php $this->assign('headerlink_label', getTranslatedString($this->_tpl_vars['headerlink_label'], $this->_tpl_vars['ONDEMANDLINK']->module())); ?>
		<?php endif; ?>
                                            <?php if ($this->_tpl_vars['headerlink_label'] != 'Profile' && $this->_tpl_vars['headerlink_label'] != 'Plugin Setup'): ?>

						<tr><td><a href="<?php echo $this->_tpl_vars['headerlink_href']; ?>
" class="drop_down_usersettings"><?php echo getTranslatedString($this->_tpl_vars['headerlink_label'], $this->_tpl_vars['MODULE_NAME']); ?>
</a></td></tr>
                                            <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
        </table>
</div>
<!-- vtiger Feedback -->
<script type="text/javascript">
<?php echo '
function vtiger_feedback() {
	window.open("http://vtiger.com/products/crm/feedback.php?uid='; ?>
<?php global $application_unique_key; echo $application_unique_key; ?>&version=<?php global $vtiger_current_version; echo $vtiger_current_version; ?>&email=<?php echo $this->_tpl_vars['CURRENT_USER_MAIL']; ?>
<?php echo '","feedbackwin","height=300,width=515,top=200,left=300")
}
'; ?>

</script>
<script type="text/javascript">
<?php echo '
function vtiger_news(obj) {
	$(\'status\').style.display = \'inline\';
	new Ajax.Request(
		\'index.php\',
		{queue: {position: \'end\', scope: \'command\'},
			method: \'post\',
			postBody: \'module=Home&action=HomeAjax&file=HomeNews\',
			onComplete: function(response) {
				$("vtigerNewsPopupLay").innerHTML=response.responseText;
				fnvshobj(obj, \'vtigerNewsPopupLay\');
				$(\'status\').style.display = \'none\';
			}
		}
	);

}
'; ?>

</script>
<div class="lvtCol fixedLay1" id="vtigerNewsPopupLay" style="display: none; height: 250px; bottom: 2px; padding: 2px; z-index: 12; font-weight: normal;" align="left">
</div>
<!-- END -->

<!-- ActivityReminder Customization for callback -->
<div class="lvtCol fixedLay1" id="ActivityRemindercallback" style="border: 0; right: 0px; bottom: 2px; display:none; padding: 2px; z-index: 10; font-weight: normal;" align="left">
</div>
<!-- End -->

<!-- divs for asterisk integration -->
<div class="lvtCol fixedLay1" id="notificationDiv" style="float: right;  padding-right: 5px; overflow: hidden; border-style: solid; right: 0px; border-color: rgb(141, 141, 141); bottom: 0px; display: none; padding: 2px; z-index: 10; font-weight: normal;" align="left">
</div>

<div id="OutgoingCall" style="display: none;position: absolute;z-index:200;" class="layerPopup">
	<table  border='0' cellpadding='5' cellspacing='0' width='100%'>
		<tr style='cursor:move;' >
			<td class='mailClientBg small' id='outgoing_handle'>
				<b><?php echo $this->_tpl_vars['APP']['LBL_OUTGOING_CALL']; ?>
</b>
			</td>
		</tr>
	</table>
	<table  border='0' cellpadding='0' cellspacing='0' width='100%' class='hdrNameBg'>
		</tr>
		<tr><td style='padding:10px;' colspan='2'>
			<?php echo $this->_tpl_vars['APP']['LBL_OUTGOING_CALL_MESSAGE']; ?>

		</td></tr>
	</table>
</div>
<!-- divs for asterisk integration :: end-->