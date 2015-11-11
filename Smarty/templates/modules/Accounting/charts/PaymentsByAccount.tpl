{* CHARTS *}

<div id="PaymentsByAccount_chart" ></div>
<table align="center">
	<tr align="center">
		<td><div id="PaymentsByAccount_table" ></div></td>
	</tr>
</table>


<br /><br />
<font color="grey"><strong><div align="center" id="div_empty_result_PaymentsByAccount"></div></strong></font>
<div><img id="notesimg_{$section}" align="right" src="modules/Accounting/images/toggle_plus.png" onclick="showHideIncomeVSexpense('{$section}');" /></div>
<div style="display: none" id="notes_{$section}" align="right" style="padding-right:30px">
	<table align="right">
		<tr><td><font size="1">* {$CHART_LANG.LBL_DUE_DATE_REFERENCE}</font></td></tr>
		<tr><td><font size="1">** {$CHART_LANG.LBL_CURRENCY_CONVERSION} <span id="currency"></span>.</font></td></tr>
	</table>
</div>