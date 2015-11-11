UPDATE `vtiger_field` SET `uitype` = '16' WHERE `vtiger_field`.`columnname` ='currency' AND  `tablename` LIKE 'vtiger_boletos';
UPDATE `vtiger_field` SET `uitype` = '16' WHERE `vtiger_field`.`columnname` ='cf_1605' AND  `tablename` LIKE 'vtiger_boletos';
UPDATE `vtiger_field` SET `uitype` = '16' WHERE `vtiger_field`.`columnname` ='tipopasajero' AND  `tablename` LIKE 'vtiger_boletos';
DELETE FROM `vtiger_currency` WHERE `vtiger_currency`.`currencyid` = 3;
DELETE FROM vtiger_field where columnname='registrodeventaid';

CREATE TABLE IF NOT EXISTS `vtiger_tipopasajero` (
  `tipopasajeroid` int(11) NOT NULL AUTO_INCREMENT,
  `tipopasajero` varchar(200) NOT NULL,
  `sortorderid` int(11) DEFAULT NULL,
  `presence` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tipopasajeroid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `vtiger_tipopasajero`
--
truncate vtiger_tipopasajero;
INSERT INTO `vtiger_tipopasajero` (`tipopasajeroid`, `tipopasajero`, `sortorderid`, `presence`) VALUES
(1, 'ADT', 1, 1),
(2, ' CHD', 2, 1),
(3, ' INF', 3, 1);

truncate vtiger_cf_1605;
INSERT INTO `vtiger_cf_1605` (`cf_1605id`, `cf_1605`, `presence`, `picklist_valueid`, `sortorderid`) VALUES
(1, 'Amadeus', 1, 509, NULL),
(2, 'Kiu', 1, 510, NULL),
(3, 'Servi', 1, 511, NULL),
(4, 'Web Aerolinea', 1, 512, NULL);
UPDATE `vtiger_field` SET `uitype` = '7' WHERE `vtiger_field`.`columnname` ='fee';
UPDATE `vtiger_field` SET `uitype` = '7' WHERE `vtiger_field`.`fieldid` ='amount';
UPDATE `vtiger_field` SET `uitype` = '7' WHERE `vtiger_field`.`fieldid` ='totalboletos';
ALTER TABLE `vtiger_boletos` CHANGE `fee` `fee` DECIMAL( 25, 2 ) NULL DEFAULT NULL ,
CHANGE `amount` `amount` DECIMAL( 25, 2 ) NULL DEFAULT NULL ,
CHANGE `totalboletos` `totalboletos` DECIMAL( 25, 2 ) NULL DEFAULT NULL ;


