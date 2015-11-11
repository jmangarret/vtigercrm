<?php /* Smarty version Smarty-3.1.7, created on 2015-02-18 02:24:21
         compiled from "/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/Recurrence.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24657449154e3f7d59f0ff1-83198174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '590a2b6809670e95577ff83cf909075a5ee0772b' => 
    array (
      0 => '/var/www/vhosts/registro.tuagencia24.com/vtigercrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/Recurrence.tpl',
      1 => 1423065964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24657449154e3f7d59f0ff1-83198174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECURRING_INFORMATION' => 0,
    'MODULE' => 0,
    'FREQUENCY' => 0,
    'USER_MODEL' => 0,
    'TOMORROWDATE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54e3f7d5c77eb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3f7d5c77eb')) {function content_54e3f7d5c77eb($_smarty_tpl) {?>
<div><div><input type="checkbox" name="recurringcheck" value="" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['recurringcheck']=='Yes'){?>checked<?php }?>/>&nbsp;&nbsp;</div><div class="<?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['recurringcheck']=='Yes'){?>show<?php }else{ ?>hide<?php }?>" id="repeatUI"><div class="row-fluid"><div class="span"><span class="alignMiddle"><?php echo vtranslate('LBL_REPEATEVENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></div><div class="span"><select class="select2 input-mini" name="repeat_frequency"><?php $_smarty_tpl->tpl_vars['FREQUENCY'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['FREQUENCY']->step = 1;$_smarty_tpl->tpl_vars['FREQUENCY']->total = (int)ceil(($_smarty_tpl->tpl_vars['FREQUENCY']->step > 0 ? 14+1 - (1) : 1-(14)+1)/abs($_smarty_tpl->tpl_vars['FREQUENCY']->step));
if ($_smarty_tpl->tpl_vars['FREQUENCY']->total > 0){
for ($_smarty_tpl->tpl_vars['FREQUENCY']->value = 1, $_smarty_tpl->tpl_vars['FREQUENCY']->iteration = 1;$_smarty_tpl->tpl_vars['FREQUENCY']->iteration <= $_smarty_tpl->tpl_vars['FREQUENCY']->total;$_smarty_tpl->tpl_vars['FREQUENCY']->value += $_smarty_tpl->tpl_vars['FREQUENCY']->step, $_smarty_tpl->tpl_vars['FREQUENCY']->iteration++){
$_smarty_tpl->tpl_vars['FREQUENCY']->first = $_smarty_tpl->tpl_vars['FREQUENCY']->iteration == 1;$_smarty_tpl->tpl_vars['FREQUENCY']->last = $_smarty_tpl->tpl_vars['FREQUENCY']->iteration == $_smarty_tpl->tpl_vars['FREQUENCY']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['FREQUENCY']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FREQUENCY']->value==$_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeat_frequency']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['FREQUENCY']->value;?>
</option><?php }} ?></select></div><div class="span"><select class="select2 input-medium" name="recurringtype" id="recurringType"><option value="Daily" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['eventrecurringtype']=='Daily'){?> selected <?php }?>><?php echo vtranslate('LBL_DAYS_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="Weekly" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['eventrecurringtype']=='Weekly'){?> selected <?php }?>><?php echo vtranslate('LBL_WEEKS_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="Monthly" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['eventrecurringtype']=='Monthly'){?> selected <?php }?>><?php echo vtranslate('LBL_MONTHS_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="Yearly" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['eventrecurringtype']=='Yearly'){?> selected <?php }?>><?php echo vtranslate('LBL_YEAR_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div><div class="span"><span class="alignMiddle"><?php echo vtranslate('LBL_UNTIL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></div><div class="span"><div class="input-append date"><input type="text" id="calendar_repeat_limit_date" class="dateField input-small" name="calendar_repeat_limit_date" data-date-format="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('date_format');?>
"value="<?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['recurringcheck']!='Yes'){?><?php echo $_smarty_tpl->tpl_vars['TOMORROWDATE']->value;?>
<?php }?>" data-validation-engine='validate[funcCall[Vtiger_Date_Validator_Js.invokeValidation]]'/><span class="add-on"><i class="icon-calendar"></i></span></div></div></div><div class="<?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['eventrecurringtype']=='Weekly'){?>show<?php }else{ ?>hide<?php }?>" id="repeatWeekUI"><label class="checkbox inline"><input name="sun_flag" value="sunday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week0'];?>
 type="checkbox"/><?php echo vtranslate('LBL_SM_SUN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox inline"><input name="mon_flag" value="monday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week1'];?>
 type="checkbox"><?php echo vtranslate('LBL_SM_MON',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox inline"><input name="tue_flag" value="tuesday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week2'];?>
 type="checkbox"><?php echo vtranslate('LBL_SM_TUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox inline"><input name="wed_flag" value="wednesday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week3'];?>
 type="checkbox"><?php echo vtranslate('LBL_SM_WED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox inline"><input name="thu_flag" value="thursday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week4'];?>
 type="checkbox"><?php echo vtranslate('LBL_SM_THU',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox inline"><input name="fri_flag" value="friday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week5'];?>
 type="checkbox"><?php echo vtranslate('LBL_SM_FRI',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><label class="checkbox inline"><input name="sat_flag" value="saturday" <?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['week6'];?>
 type="checkbox"><?php echo vtranslate('LBL_SM_SAT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></div><div class="<?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['eventrecurringtype']=='Monthly'){?>show<?php }else{ ?>hide<?php }?>" id="repeatMonthUI"><div class="row-fluid"><div class="span"><input type="radio" id="repeatDate" name="repeatMonth" checked value="date" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth']=='date'){?> checked <?php }?>/></div><div class="span"><span class="alignMiddle"><?php echo vtranslate('LBL_ON',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></div><div class="span"><input type="text" id="repeatMonthDate" class="input-mini" name="repeatMonth_date" data-validation-engine='validate[funcCall[Calendar_RepeatMonthDate_Validator_Js.invokeValidation]]' value="<?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_date']==''){?>2<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_date'];?>
<?php }?>"/></div><div class="span alignMiddle"><?php echo vtranslate('LBL_DAY_OF_THE_MONTH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</div></div><div class="clearfix"></div><div class="row-fluid" id="repeatMonthDayUI"><div class="span"><input type="radio" id="repeatDay" name="repeatMonth" value="day" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth']=='day'){?> checked <?php }?>/></div><div class="span"><span class="alignMiddle"><?php echo vtranslate('LBL_ON',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></div><div class="span"><select id="repeatMonthDayType" class="select2 input-small" name="repeatMonth_daytype"><option value="first" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_daytype']=='first'){?> selected <?php }?>><?php echo vtranslate('LBL_FIRST',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="last" <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_daytype']=='last'){?> selected <?php }?>><?php echo vtranslate('LBL_LAST',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div><div class="span"><select id="repeatMonthDay" class="select2 input-medium" name="repeatMonth_day"><option value=0 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==0){?> selected <?php }?>><?php echo vtranslate('LBL_DAY0',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value=1 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==1){?> selected <?php }?>><?php echo vtranslate('LBL_DAY1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value=2 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==2){?> selected <?php }?>><?php echo vtranslate('LBL_DAY2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value=3 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==3){?> selected <?php }?>><?php echo vtranslate('LBL_DAY3',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value=4 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==4){?> selected <?php }?>><?php echo vtranslate('LBL_DAY4',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value=5 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==5){?> selected <?php }?>><?php echo vtranslate('LBL_DAY5',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value=6 <?php if ($_smarty_tpl->tpl_vars['RECURRING_INFORMATION']->value['repeatMonth_day']==6){?> selected <?php }?>><?php echo vtranslate('LBL_DAY6',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div></div></div></div></div><?php }} ?>