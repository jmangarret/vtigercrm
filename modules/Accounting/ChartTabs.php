<?php

require_once('modules/Accounting/AccountingUtils.php');
$chart_strings = return_chart_language($_SESSION["authenticated_user_language"]);



$tabs = array(
	"GlobalCharts" => array (
				"date_filter" => true,
				"literal" => $chart_strings["LBL_CHART_GLOBAL_CHARTS"],
				"sections" => array (
						"IncomeVsExpense" => array(
											"literal" => $chart_strings["LBL_CHART_BALANCE_TITLE"],
											"help" => $chart_strings["LBL_CHART_HELP_INCOMEVSEXPENSE"],
										),
						"PendingPayments" =>  array(
											"literal" => $chart_strings["LBL_CHART_PENDING_TITLE"],
											"help" => $chart_strings["LBL_CHART_HELP_PENDINGPAYMENTS"],
										),
						"UnpaidPayments" =>  array(
											"literal" => $chart_strings["LBL_CHART_UNPAID_TITLE"],
											"help" => $chart_strings["LBL_CHART_HELP_UNPAIDPAYMENTS"],
										),
					),
			),


	"ByAccount" => array (
				"date_filter" => true,
				"literal" => $chart_strings["LBL_CHART_BY_ACCOUNT_CHARTS"],
				"sections" => array (
						"PaymentsByAccount" => array(
											"literal" => $chart_strings["LBL_CHART_BY_ACCOUNT_TITLE"],
											"help" => $chart_strings["LBL_CHART_HELP_BY_ACCOUNT"],
											"log" => "true"
										),
				/*		"PaymentsByContact" => array(
											"literal" => $chart_strings["LBL_CHART_BY_CONTACT_TITLE"],
											"help" => $chart_strings["LBL_CHART_HELP_BY_CONTACT"],
										),*/
				/*		"ForecastOutstanding" =>  array(
											"literal" => $chart_strings["LBL_CHART_FORESCAST_OUTSTANDING_CHARTS"],
											"help" => $chart_strings["LBL_CHART_HELP_FORESCAST_OUTSTANDING"],
										),*/
							),
			),

	"MoreCharts" => array (
				"date_filter" => false,
				"literal" => $chart_strings["LBL_CHART_MORE_CHARTS"],
				"sections" => array (
						"MoreCharts" => array(
												"literal" => $chart_strings["LBL_CHART_PURCHASE_TITLE"],
												"help" => ""
											),
									),
						),
);


?>