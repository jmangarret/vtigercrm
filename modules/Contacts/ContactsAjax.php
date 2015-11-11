<?php
header('Content-Type: text/html; charset=UTF-8');
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
*
 ********************************************************************************/

    //require_once('include/Ajax/CommonAjax.php');
   
    $cliente = $_GET["cliente"];	//Obteniendo el ID de Cliente

    $opcion = $_GET["accion"];		//Accion del Switch; se puede usar para otras acciones a realizar
    $user = $_GET["user"];		//Accion del Switch; se puede usar para otras acciones a realizar
    
    
    switch ($opcion) {  
        case 0: 	//esta opción del case, toma el valor del contacto para sacar los datos de BD MySQL
            
            $cliente = $_GET["cliente"];
            
            include('/var/www/vhosts/registro.tuagencia24.com/vtigercrm/libraries/adodb/adodb.inc.php');		//ojo con esta direccion hay que cambiarla en el Server
            // include('/home/www/vtiger/vtigerCRM/libraries/adodb/adodb.inc.php');
            
            $db = ADONewConnection('mysql');
            
            $db->Connect('localhost', 'vtigercrm', 'AvzHricg4ejxA', 'vtigercrm600');	//cambiar el nombre de la base de datos, usuario y clave
            //$db->Connect('localhost', 'vtiger', '', 'vtigercrm530');
            //REEMPLAZAR CAMPO cf_9206 POR cf_829 o viceversa            
            $query = "SELECT 
            		vtiger_contactscf.cf_614 AS NUM_DOCUMENTO,
            		vtiger_contactscf.cf_829 AS TIPO_DOCUMENTO,
                        vtiger_contactdetails.firstname AS NOMBRE,
                        vtiger_contactdetails.lastname AS APELLIDO,
                        vtiger_contactsubdetails.homephone AS TLF,
                        vtiger_contactdetails.fax AS FAX,
                        vtiger_contactdetails.mobile AS CELULAR,
                        vtiger_contactdetails.email AS EMAIL,
                        vtiger_contactaddress.mailingstreet AS DIRECCION,
                        vtiger_contactaddress.mailingzip AS CODIGO_POSTAL,
						vtiger_contactaddress.mailingcity AS CityIataCode,
                        vtiger_crmentity.createdtime AS FECHA_CREACION
                    FROM vtiger_contactdetails
                        INNER JOIN vtiger_contactaddress ON vtiger_contactdetails.contactid = vtiger_contactaddress.contactaddressid
                        INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_contactaddress.contactaddressid
                        INNER JOIN vtiger_contactscf ON vtiger_contactscf.contactid = vtiger_contactaddress.contactaddressid                        
                        INNER JOIN vtiger_contactsubdetails ON vtiger_contactdetails.contactid = vtiger_contactsubdetails.contactsubscriptionid
                    WHERE 
                        vtiger_contactdetails.contactid =$cliente";
						
	    	//echo $query;
            $rs = $db->Execute($query);
            
            #Valores traidos del Query
            
            $nombre     		= strtoupper(utf8_decode($rs->Fields('NOMBRE')));
            $apellido   		= strtoupper(utf8_decode($rs->Fields('APELLIDO')));
            $telefono_vtiger	= $rs->Fields('TLF');
            $fax_vtiger       	= $rs->Fields('FAX');
            $celular_vtiger   	= $rs->Fields('CELULAR');
            $email_vtiger      	= strtoupper($rs->Fields('EMAIL'));
            $direccion_vtiger  	= strtoupper(utf8_decode($rs->Fields('DIRECCION')));
            $cod_postal_vtiger 	= $rs->Fields('CODIGO_POSTAL');
            $fecha		= $rs->Fields('FECHA_CREACION');
            $DocumentTypeID 	= strtoupper($rs->Fields('TIPO_DOCUMENTO'));

	    //El codigo de ciudad se registra por defecto Caracas si el registro no tiene definida una ciudad o si la cadena tiene + de 3 caracteres
	    $city_iata_vtiger = explode(",",$rs->Fields('CityIataCode'));
	    $city_iata_vtiger = (strlen($city_iata_vtiger[0])==3 && !empty($city_iata_vtiger[0]) ? $city_iata_vtiger[0] : "CCS");
	    
            /*
             * Validacion de Campos
             */
			
			
		if(empty($DocumentTypeID)){
			echo "Se debe Actualizar el Tipo de Documento (V) (P) (E) (J) (G) de este Contacto";
			break;
		}else if(empty($telefono_vtiger)){
			echo 'Contacto no tiene registrado Teléfono Particular. Se debe Actualizar!';
			break;
		}else if(empty($fax_vtiger)){
			echo "Contacto no tiene registrado FAX. Se debe Actualizar!";
			break;
		}else if(empty($celular_vtiger)){
			echo "Contacto no tiene registrado Celular/Telf.Movil. Se debe Actualizar!";
			break;
		}else if(empty($email_vtiger)){
			echo "Contacto no tiene registrado E-mail. Se debe Actualizar!";
			break;
		}else if(empty($direccion_vtiger)){
			echo "Contacto no tiene registrada Dirección. Se debe Actualizar!";
			break;
		}else if(empty($cod_postal_vtiger)){
			echo "Contacto no tiene registrado Código Postal. Se debe Actualizar!";
			break;
		}else{
		
			if($DocumentTypeID == 'V')
				$TipoDocumento = 1;
				
			if($DocumentTypeID == 'P')
				$TipoDocumento = 2;
			
			if($DocumentTypeID == 'E')
				$TipoDocumento = 3;
			
			if($DocumentTypeID == 'J' || $DocumentTypeID == 'G')
				$TipoDocumento = 5;
		
			//preguntar que pasa cuando es pasaporte extranjero
			/*if($DocumentTypeID ==6)
				$TipoDocumento = 'P';*/
				
			//El Numero de Documento quede asi V00.000.000 se anida letra con numero de documento
		        //$DocumentNumber = $rs->Fields('TIPO_DOCUMENTO').str_replace(".","",$rs->Fields('NUM_DOCUMENTO'));
		        $DocumentNumber = $rs->Fields('TIPO_DOCUMENTO').preg_replace("/[^0-9]/","",$rs->Fields('NUM_DOCUMENTO'));
		        		        
		        $TaxPayerId     = 1;	#Dato Fijo
		        
		        /*Creando Conexión a SQL Server*/
			$conn = odbc_connect('datasourcename', 'sa', 'ECUADOR');	//conectado a traves de driver ODBC; 
			//$conn = odbc_connect('datasourcename', 'sa', '1234');
			if (!$conn) {
				die("Conexión Fallida ... Posiblemente, cambio la direccion IP del Server Lecherias"); 
				break;
			}else{ 

				//Crear el query de busqueda para saber si ya el registro existe
				$rsSQLS = odbc_exec($conn,"SELECT Count(*) AS contador_abm FROM ThirdParties WHERE DocumentNumber = '$DocumentNumber'");
												
					$result = odbc_fetch_array($rsSQLS);
					
					odbc_free_result($rsSQLS);
			
					if ($result['contador_abm']>=1){ 
					
						//manejamos una variable para enviar los mensajes
						$mensaje = "";
			        	
			        	$rs_datos_abm = odbc_exec($conn,"SELECT 
										PhoneNumber,
										FaxNumber,
										Address,
										MobilePhoneNumber,
										Email,
										POBox,
										CityIataCode
									FROM ThirdParties WHERE DocumentNumber = '$DocumentNumber'");
						
						$result_abm = odbc_fetch_array($rs_datos_abm);
						
						$telefono_abm	= $result_abm['PhoneNumber'];
						$fax_abm	= $result_abm['FaxNumber'];
						$celular_abm	= $result_abm['MobilePhoneNumber'];
						$email_abm	= $result_abm['Email'];
						$direccion_abm	= $result_abm['Address'];
						$cod_postal_abm	= $result_abm['POBox'];
						$city_iata_abm	= $result_abm['CityIataCode'];
						
						odbc_free_result($rs_datos_abm);
													
						echo "<br> <b> Ya existe el registro en el ABM :..</b><br>";
						
						//Actualizacion de datos si son diferentes, en vtiger al ABM...
						
						if($telefono_vtiger != $telefono_abm){	// Actualizacion de Tlf
							$update_telefono = odbc_exec($conn,"UPDATE ThirdParties SET [PhoneNumber] = '$telefono_vtiger'
												WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje = "<br>- Se actualiz&oacute; el Nro. de Tel&eacute;fono del Contacto. <br>";
						}
						
						if($fax_vtiger != $fax_abm){			// Actualizacion de fax
							$update_fax = odbc_exec($conn,"UPDATE ThirdParties SET 
																[FaxNumber] = '$fax_vtiger'
																WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje .= "<br>- Se actualiz&oacute; el Nro. de Fax del Contacto. <br>";
						}
						
						if($celular_vtiger != $celular_abm){	// Actualizacion de celular
							$update_celular = odbc_exec($conn,"UPDATE ThirdParties SET 
																[MobilePhoneNumber] = '$celular_vtiger'
																WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje .= "<br>- Se actualiz&oacute; el Nro. Celular del Contacto. <br>";
						}
						
						if($email_vtiger != $email_abm){		// Actualizacion de Email
							$update_email = odbc_exec($conn,"UPDATE ThirdParties SET 
																[Email] = '$email_vtiger'
																WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje .= "<br>- Se actualiz&oacute; el E-mail del Contacto. <br>";
						}
						
						if($direccion_vtiger != $direccion_abm){// Actualizacion de Direccion
							$update_direccion = odbc_exec($conn,"UPDATE ThirdParties SET 
																[Address] = '$direccion_vtiger'
																WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje .= "<br>- Se actualiz&oacute; la Direcci&oacute;n del Contacto. <br>";
						}
						
						if($cod_postal_vtiger != $cod_postal_abm){// Actualizacion de Cod Postal
							$update_cod_postal = odbc_exec($conn,"UPDATE ThirdParties SET 
																[POBox] = '$cod_postal_vtiger'
																WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje .= "<br>- Se actualiz&oacute; el Cod. Postal del Contacto. <br>";
						}

						if($city_iata_vtiger != $city_iata_abm){	// Actualizacion de City
							$update_city = odbc_exec($conn,"UPDATE ThirdParties SET [CityIataCode] = '$city_iata_vtiger'
												WHERE [DocumentNumber] = '$DocumentNumber'");
							$mensaje .= "<br>- Se actualiz&oacute; el Cod. de Ciudad del Contacto. <br>";
						}

						
						echo $mensaje;	//Se muestran los datos actualizados; en caso de que los haya!
			        	
			        	odbc_close($conn);
						break; 
				    }else{
			
						/*Insert en ThirdParties*/
						$insert_TP = "
							INSERT INTO ThirdParties ( 
							   DocumentTypeID,
							   DocumentNumber,
							   FirstName,
							   LastName,
							   CityIataCode,
							   PhoneNumber,
							   FaxNumber,
							   Address,
							   MobilePhoneNumber,
							   Email,
							   POBox, 
							   TaxPayerTypeID
							   )
							   VALUES("
							   .$TipoDocumento.",
							   '".$DocumentNumber."',
							   '".$nombre."',
							   '".$apellido."',
							   '".$city_iata_vtiger."',
							   '".$telefono_vtiger."',
							   '".$fax_vtiger."',
							   '".strtoupper($direccion_vtiger)."',
							   '".$celular_vtiger."',
							   '".strtoupper($email_vtiger)."',
							   '".$cod_postal_vtiger."',".
							   $TaxPayerId.")";
							   
						//echo $insert_TP;
						//break;
						
						/*Ejecuntando el Query de Inserción ThirdParties*/
						$rs_TP = odbc_exec($conn, $insert_TP);	
				
						/*Mostrando el resultado del Insert*/
						if (!$rs_TP){ 
							echo "Se han presentado problema en la inserción, Tabla  ThirdParties";
							echo odbc_errormsg($conn);
							break;  
						}
				
						//Obteniendo el valor ID ThirdParties
						$rs_NTP = odbc_exec($conn, "SELECT IDENT_CURRENT('ThirdParties') AS ID_TP");
						$ThirdPartyId = odbc_result($rs_NTP,1);
				
						/*Tabla Customer*/
						$FechaCreacion      = "GetDate()";
						$EconomicActivitiID = 56;           	#
						$CreditDays         = 0;            	#
						$ConditionOfSale    = 'Contado';    	#
						$CustomerGroupID    = 3;            	#
						$CustomerTypeID     = 1;            	#
						$CustomerCode       = $DocumentNumber;	# Letra del tipo de documento (v)(E); Numero de documento 00.000.000						
						$SalesManID 		= 15;  
						$AgentID 			= 15;
						//Modify By jmangarret 08jun2015
						if ($user==5)		{$SalesManID = 6;  $AgentID = 6;}  
						if ($user==8)		{$SalesManID = 9;  $AgentID = 9;}  
						if ($user==7)		{$SalesManID = 13;  $AgentID = 13;}  
						if ($user==18)		{$SalesManID = 15;  $AgentID = 15;}  						
						if ($user==12)		{$SalesManID = 23;  $AgentID = 23;}  
						if ($user==26)		{$SalesManID = 30;  $AgentID = 30;}  
						if ($user==25)		{$SalesManID = 32;  $AgentID = 32;}  
						if ($user==16)		{$SalesManID = 25;  $AgentID = 25;}  
						           	


				
						/*Insert en Customer*/

						$insert_Customer = "INSERT INTO Customer 

											(
											ThirdPartyId,
											FechaCreacion,
											EconomicActivitiID,
											CreditDays,
											ConditionOfSale,
											CustomerGroupID,
											CustomerTypeID,
											CustomerCode,
											SalesManID,
											AgentID,
											HReasonCode,
											HCostCenter,
											HEmployees,
											HOrderonwatch,
											FirstVigency,
											SecondVigency,
											ThirdVigency,
											CreditQuota,
											NIT,
											ZoneID,
											Enabled,
											TransactionFee
											) 

											VALUES 

											("

											.$ThirdPartyId.",
											".$FechaCreacion.","
											.$EconomicActivitiID.","
											.$CreditDays.",
											'".$ConditionOfSale."',"
											.$CustomerGroupID.","
											.$CustomerTypeID.",
											'".$CustomerCode."',"
											.$SalesManID.","
											.$AgentID.",
											'false',
											'false',
											'false',
											'false',
											0,
											0,
											0,
											0,
											'',
											4,
											'true',
											'false'
											)";									
						//echo $insert_Customer;
						 
						/*Ejecuntando el Query de Inserción*/
						$rs_C = odbc_exec($conn, $insert_Customer);	
				
						if (!$rs_C){ 
							echo "Se han presentado problema en la inserción, Tabla Customer ".$insert_Customer;
							echo odbc_errormsg($conn);
							break;  
						}
				
						//Obteniendo el valor ID de Customer
						$rs_NCus = odbc_exec($conn, "SELECT IDENT_CURRENT('Customer') AS ID_Cust");
						$CustomerId = odbc_result($rs_NCus,1);
				
						/*Tabla TravelAgencyBranch_Customers*/
						$TravelAgencyBranches1 = 1;
						$TravelAgencyBranches2 = 2;
				
						/*Insert en TravelAgencyBranch_Customers*/
						$insert_TAB1 = "INSERT INTO TravelAgencyBranch_Customers
										(
										TravelAgencyBranchId,
										CustomerId
										) VALUES 
										("
										.$TravelAgencyBranches1.","
										.$CustomerId."
										)
										";
				
						//echo "\n insert_TAB1".$insert_TAB1;
						$rs_TAB1 = odbc_exec($conn, $insert_TAB1);	
				
						if (!$rs_TAB1){ 
							echo "Se han presentado problema en la inserción, Tabla TravelAgencyBranch_Customers";
							echo odbc_errormsg($conn);
							break;  
						}
				
						$insert_TAB2 = "INSERT INTO TravelAgencyBranch_Customers
										(
										TravelAgencyBranchId,
										CustomerId
										) VALUES
										(
										".$TravelAgencyBranches2.","
										.$CustomerId."
										)";
				
						//echo "\n insert_TAB2".$insert_TAB2;
						$rs_TAB2 = odbc_exec($conn, $insert_TAB2);
					
						if (!$rs_TAB2){ 
							echo "Se han presentado problema en la inserción, Tabla TravelAgencyBranch_Customers";
							echo odbc_errormsg($conn);
							break;  
						}
						
						if($rs_TP && $rs_C && $rs_TAB1 && $rs_TAB2){	//si todos los insert han ido BIEN
							echo "Registro insertado con exito, para el ABM ...";
						}
						
					} 	//Fin del else no existe el registro en la base de datos
				}		//Fin de else conexion exitosa a SQL SERVER
			}			//Fin else existe el Tipo de Documento en MYSQL
				
			//$conn->Close();		//Cerrando Conexión con MySQL
			odbc_close($conn);	//Cerrando Conexión con SQL Server		
			break;	 			//Salimos de la Opción del Switch
		
		case 1:
		break;
		
       }	//fin de switch
?>
