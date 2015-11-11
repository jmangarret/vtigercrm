
INSERT INTO `vtiger_pdfmaker_settings` (`templateid`, `margin_top`, `margin_bottom`, `margin_left`, `margin_right`, `format`, `orientation`, `decimals`, `decimal_point`, `thousands_separator`, `header`, `footer`, `encoding`, `file_name`, `owner`, `sharingtype`, `disp_header`, `disp_footer`) VALUES
(4, 2.0, 2.0, 2.0, 2.0, 'A4', 'portrait', 2, ',', '', '<p>\r\n	##PAGE##/##PAGES##</p>\r\n', '<p style="text-align: center">\r\n	<span style="font-size: 10px">$COMPANY_NAME$ <small>&bull; </small>$COMPANY_ADDRESS$ <small>&bull; </small>$COMPANY_ZIP$<small> </small>$COMPANY_CITY$<small> &bull; </small>$COMPANY_STATE$</span></p>\r\n', 'auto', NULL, 1, 'public', 3, 7);

