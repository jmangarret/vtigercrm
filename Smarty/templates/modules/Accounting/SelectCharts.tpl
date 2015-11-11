{foreach key=section item=value from=$SECTIONS}
	<table border="0" cellspacing="1" cellpadding="3" width="90%" style="background-color:#eaeaea; margin-left:10px; margin-right:10px;" class="small">
		<tbody>
			<tr style="height:25px" bgcolor="white">
				<td class="lvtCol">
						<font size="-1">{$value.literal}</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div><font color="grey">{$value.help}</font></div>
				</td>
				{if $value.log eq "true"}
					<td align="right">
						<input type="checkbox" name="logScale{$section}" id="logScale{$section}" onclick="changeLogScale(this, '{$section}');">{$CHART_LANG.LBL_LOG_DATA}</input>
					</td>
				{/if}
			</tr>
		</tbody>
	</table>

	{assign var="SMARTY_TAB" value='modules/Accounting/charts/'}
	{assign var="SMARTY_TAB" value=$SMARTY_TAB|cat:$section}
	{assign var="SMARTY_TAB" value=$SMARTY_TAB|cat:'.tpl'}

	{include file=$SMARTY_TAB}

	<br /><br /><br />
	<script type="text/javascript">
		{foreach key=label item=value from=$CHART}
			var {$label} = "{$value|replace:'"':'\"'}";
		{/foreach}

		eval("drawCharts('{$section}')")
	</script>
{/foreach}