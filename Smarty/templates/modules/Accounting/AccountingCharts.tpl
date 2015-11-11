<html>
<head>
	<title>aXaccounting - Charts</title>
	<link REL="SHORTCUT ICON" HREF="themes/images/vtigercrm_icon.ico">
	<style type="text/css">@import url("themes/softed/style.css");</style>

	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<link type="text/css" href="modules/Accounting/jscal/css/smoothness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="modules/Accounting/jscal/js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="modules/Accounting/jscal/js/jquery-ui-1.8.10.custom.min.js"></script>
	<script type="text/javascript" src="modules/Accounting/Charts.js"></script>

	{foreach key=tabid item=data from=$CHARTTABS name=tabs}
		{foreach key=section item=data2 from=$data.sections}
			<script type="text/javascript" src="modules/Accounting/charts/{$section}.js"></script>
		{/foreach}

		{if $smarty.foreach.tabs.first}
			{assign var="CURRENT_TAB" value=$tabid}
		{/if}
	{/foreach}
</head>
<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 class=small>
	<a href="#top"></a>
	<span id="current_tab" style="display: none">{$CURRENT_TAB}</span>
	<table border="0" cellspacing="0" cellpadding="0" width="100%" class="hdrNameBg">
	<tbody><tr>
		<td valign="top"><img src="themes/softed/images/vtiger-crm.gif" alt="vtiger CRM" title="vtiger CRM" border="0"></td>
		<td width="100%" align="center">


		</td>
		<td class="small" nowrap="">
			<table border="0" cellspacing="0" cellpadding="0">
			 <tbody><tr>


			</tr>
			</tbody></table>
		</td>
	</tr>
	</tbody></table>




	<table border="0" cellspacing="0" cellpadding="0" width="100%" class="hdrTabBg">
<tbody><tr>
	<td style="width:50px" class="small">&nbsp;</td>
	<td class="small" nowrap="">
		<table  border="0" cellspacing="0" cellpadding="0">

		<tbody><tr>
			<td class="tabSeperator"><img src="themes/images/spacer.gif" width="2px" height="28px"></td>
			<td class="tabSelected" align="center" nowrap="" style="color:#ffffff; font-size:14px;">aXaccounting Charts</td>
			<td align="right" width="100%"><a href="javascript:window.close()"><img src="themes/images/windowClose.gif" border="0" alt="Close" title="Close" hspace="5" align="absmiddle"></a></td>
		</tr>

		</tbody></table>
	</td>
	<td align="right" style="padding-right:10px" nowrap="">&nbsp;</td>

</tr>
</tbody></table>

	<br>

<table border="0" cellspacing="0" cellpadding="0" width="98%" align="center">
<tbody>
<tr>
	<td valign="top"><img src="themes/softed/images/showPanelTopLeft.gif"></td>
	<td class="showPanelBg" valign="top" width="100%">
		<!-- PUBLIC CONTENTS STARTS-->
		<div class="small" style="padding:10px">

			<br>



			<table border="0" cellspacing="0" cellpadding="0" width="95%" align="center">
		<tbody><tr>
			<td>
				<table border="0" cellspacing="0" cellpadding="3" width="100%" class="small">
				<tbody>
					<tr>
						{foreach key=tabid item=data from=$CHARTTABS name="charttabs"}
							<td class="dvtTabCache" style="width:10px" nowrap="">&nbsp;</td>
							{if $smarty.foreach.charttabs.first}
								<td name="chart_tabs" id="{$tabid}_tab" class="dvtSelectedCell" align="center" nowrap=""><a onclick="onChangeChart('{$tabid}');return false;" href="javascript:void(0);">{$data.literal}</a></td>
							{else}
								<td name="chart_tabs" id="{$tabid}_tab" class="dvtUnSelectedCell" align="center" nowrap=""><a onclick="onChangeChart('{$tabid}');return false;" href="javascript:void(0);">{$data.literal}</a></td>
							{/if}
						{/foreach}

						<td class="dvtTabCache" align="right" style="width:100%"></td>
					</tr>
				</tbody></table>
			</td>
		</tr>

		<tr>

		<td valign="top" align="left">
<table border="0" cellspacing="0" cellpadding="3" width="100%" class="dvtContentSpace" style="border-bottom:0;">
						<tbody><tr>
							<td align="left" style="padding:15px;">

		<!-- START CONTENT-->

<table id="contenttable" name="contenttable" width="100%" cellspacing="0" cellpadding="0" border="0" class="small lvt">
	<tbody>
	<tr>
		<td class="dvInnerHeader">
			<div style="font-weight: bold;height: 1.75em;">
				&nbsp;Search options&nbsp;
			</div>
		</td>
	</tr>
	<tr>
	<td style="border:1px solid #dedede; border-top:none;">
	<!-- START PACO SEARCH -->


	<div style="padding-left: 20px;  ">

	<table class="small">
	<tbody>
	<tr>
		<td>
			<select id="daterange" class="small">
				<option value="customrange">{$MOD.LBL_CHART_CUSTOM_RANGE}</option>
				<option value="thismonth">{$MOD.LBL_CHART_THIS_MONTH}</option>
				<option value="thisquarter">{$MOD.LBL_CHART_THIS_QUARTER}</option>
			{*	<option value="this4month">{$MOD.LBL_CHART_4MONTH}</option>  *}
				<option value="thissemester">{$MOD.LBL_CHART_THIS_SEMESTER}</option>
				<option value="thisyear">{$MOD.LBL_CHART_THIS_YEAR}</option>
				<option value="pasttwoyears">{$MOD.LBL_CHART_PAST_TWO_YEAR}</option>
			</select>
		</td>
		<td name="daterangefields"><strong>{$MOD.LBL_CHART_START_DATE}: </strong> <input class="small" size="10" type="text" id="from"></td>
		<td name="daterangefields" width="10"></td>
		<td name="daterangefields" ><strong>{$MOD.LBL_CHART_END_DATE}:</strong> <input class="small" size="10" type="text" id="to"></td>
		<td width="10"></td>
		<td>
			<strong>{$MOD.LBL_CHART_GROUP_BY}:</strong>
				<select id="groupby" name="groupby" class="small">
{*		   			<option value="DAY">{$MOD.LBL_CHART_GROUP_BY_DAY}</option> *}
		   			<option value="WEEKOFYEAR">{$MOD.LBL_CHART_GROUP_BY_WEEK}</option>
		   			<option value="MONTH">{$MOD.LBL_CHART_GROUP_BY_MONTH}</option>
		   			<option value="QUARTER">{$MOD.LBL_CHART_GROUP_BY_QUARTER}</option>
		   			<option value="YEAR">{$MOD.LBL_CHART_GROUP_BY_YEAR}</option>
				</select>
		</td>
		<td width="10"></td>
		<td>
		<input id="generete_btn" title="{$MOD.LBL_CHART_GENERATE_CHART}" class="crmbutton small create" onclick="onChangeChart();" type="button" name="button" value="  Generate Charts  " >
		</td>
	</tr>
	</tbody>
	</table>

	</div>



	<!-- END PACO SEARCH -->
	</td>
	</tr>
	</tbody>
</table>

<br>


<table width="100%" cellspacing="0" cellpadding="0" border="0" class="small lvt">
	<tbody>
	<tr>
		<td class="dvInnerHeader">
			<div style="font-weight: bold;height: 1.75em;">
				&nbsp;{$MOD.LBL_CHART_CHART}&nbsp;
			</div>
		</td>
	</tr>
	<tr>
	<td style="background-color:#ffffff; border:1px solid #dedede; border-top:none;">
	<!-- START PACO CHARTS  -->


	<div id="chart_content"></div>


	<!-- END PACO CHARTS -->
	</td>
	</tr>
	</tbody>
</table>








			<!-- END CONTENT-->

</td></tr></tbody></table>

		</td>


		</tr>

	<tr>
		<td>
			<table border="0" cellspacing="0" cellpadding="3" width="100%" class="small">
				<tbody>
					<tr>
						{foreach key=tabid item=data from=$CHARTTABS name="charttabs"}
							<td class="dvtTabCacheBottom" style="width:10px" nowrap="">&nbsp;</td>
							{if $smarty.foreach.charttabs.first}
								<td name="chart_tabs2" id="{$tabid}_tab2" class="dvtSelectedCellBottom" align="center" nowrap=""><a onclick="onChangeChart('{$tabid}');return false;" href="javascript:void(0);">{$data.literal}</a></td>
							{else}
								<td name="chart_tabs2" id="{$tabid}_tab2" class="dvtUnSelectedCell" align="center" nowrap=""><a onclick="onChangeChart('{$tabid}');return false;" href="javascript:void(0);">{$data.literal}</a></td>
							{/if}
						{/foreach}

						<td class="dvtTabCacheBottom" align="right" style="width:100%"></td>
					</tr>
				</tbody>

			</table>
		</td>
	</tr>
</tbody></table>




		</div></td>

	<td align="right" valign="top"><img src="themes/softed/images/showPanelTopRight.gif"></td>
</tr></tbody></table>

	<br>

	<table border="0" cellspacing="0" cellpadding="5" width="100%" class="settingsSelectedUI"><tbody><tr><td class="small" align="left"><span style="color: rgb(153, 153, 153);">vtiger CRM 5.2.0</span></td><td class="small" align="right"></td></tr></tbody></table>


  	<script type="text/javascript">
  				$(function() {ldelim}
				var dates = $( "#from, #to" ).datepicker({ldelim}
					defaultDate: "+1w",
					changeMonth: true,
					changeYear: true,
					numberOfMonths: 1,
					showOn: "button",
					buttonImage: "modules/Accounting/images/calendar.gif",
					buttonImageOnly: true,
					buttonText: "{$MOD.LBL_CHART_CLICK_TO_SELECT}",
					dateFormat: "yy-mm-dd",
					onSelect: function( selectedDate ) {ldelim}
						var option = this.id == "from" ? "minDate" : "maxDate",
							instance = $( this ).data( "datepicker" ),
							date = $.datepicker.parseDate(
								instance.settings.dateFormat ||
								$.datepicker._defaults.dateFormat,
								selectedDate, instance.settings );
						dates.not( this ).datepicker( "option", option, date );
						$("#daterange").val("customrange");
					{rdelim}
				{rdelim});
			{rdelim});

			$( "#from, #to" ).attr('disabled', true);

			{literal}

			$("#daterange").change(function () {
					var cdate = new Date();
					var year = cdate.getFullYear();
					var month = cdate.getMonth()+1;
					var day = cdate.getDate();
					var quartermonth1;
					var quartermonth2;

					if (month < 4) {
						quartermonth1 = 1;
						quartermonth2 = 3;
					} else if (month < 7) {
						quartermonth1 = 4;
						quartermonth2 = 6;
					} else if (month < 10) {
						quartermonth1 = 7;
						quartermonth2 = 9;
					} else {
						quartermonth1 = 10;
						quartermonth2 = 12;
					}

					var semestermonth1;
					var semestermonth2;

					if (month < 7) {
						semestermonth1 = 1;
						semestermonth2 = 6;
					} else {
						semestermonth1 = 7;
						semestermonth2 = 12;
					}

					day = (day < 10) ? "0"+day : day;
					month = (month < 10) ? "0"+month : month;
					semestermonth1 = (semestermonth1 < 10) ? "0"+semestermonth1 : semestermonth1;
					semestermonth2 = (semestermonth2 < 10) ? "0"+semestermonth2 : semestermonth2;
					quartermonth1 = (quartermonth1 < 10) ? "0"+quartermonth1 : quartermonth1;
					quartermonth2 = (quartermonth2 < 10) ? "0"+quartermonth2 : quartermonth2;

					switch($("#daterange").val()) {
						case "customrange":
							$("#from, #to").val("");
							break;
						case "thismonth":
							$("#from").val(year+"-"+month+"-"+"01");
							$("#to").val(year+"-"+month+"-"+"31");
							break;
						case "thisquarter":
							$("#from").val(year+"-"+quartermonth1+"-"+"01");
							$("#to").val(year+"-"+quartermonth2+"-"+"31");
							break;
						case "thissemester":
							$("#from").val(year+"-"+semestermonth1+"-"+"01");
							$("#to").val(year+"-"+semestermonth2+"-"+"31");
							break;
						case "thisyear":
							$("#from").val(year+"-"+"01"+"-"+"01");
							$("#to").val(year+"-"+"12"+"-"+"31");
							break;
						case "pasttwoyears":
							$("#from").val(year-1+"-"+"01"+"-"+"01");
							$("#to").val(year+"-"+"12"+"-"+"31");
							break;
					}
				});
			{/literal}

			var LBL_CHART_DATE_RANGE_ERROR = "{$MOD.LBL_CHART_DATE_RANGE_ERROR}";
			var LBL_CHART_NO_RESULT = "{$MOD.LBL_CHART_NO_RESULT}";
			var LBL_CHART_GROUP_BY_YEAR = "{$MOD.LBL_CHART_GROUP_BY_YEAR}";
			var LBL_CHART_GROUP_BY_QUARTER = "{$MOD.LBL_CHART_GROUP_BY_QUARTER}";
			var LBL_CHART_GROUP_BY_MONTH = "{$MOD.LBL_CHART_GROUP_BY_MONTH}";
			var LBL_CHART_GROUP_BY_WEEK = "{$MOD.LBL_CHART_GROUP_BY_WEEK}";
	</script>


     <script type="text/javascript">

     {literal}
	     function initCharts() {
	     	var ccdate = new Date();
			$("#daterange").val("thisyear");
			$("#groupby").val("MONTH");
			$("#from").val(ccdate.getFullYear()+"-01-01");
			$("#to").val(ccdate.getFullYear()+"-12-31");
	     	$("#generete_btn").click();
	     }

	      google.load("visualization", "1", {packages:["corechart", "table"]});
	      google.setOnLoadCallback(initCharts);
	  {/literal}
    </script>


</body>
</html>