<?php
/**
* This example shows settings to use when sending via Google's Gmail servers.
*/
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('Etc/UTC');
//function enviarEmail($email,$subject,$body){
function enviarEmail($email,$asunto,$mensaje){
	global $log, $adb;
	
	require 'PHPMailerAutoload.php';

	$sqlSystem="select * from vtiger_systems where server_type='email'";
	$resultSystem = $adb->pquery($sqlSystem, array());
	$rowSystem=$row = $adb->fetchByAssoc($resultSystem);
	
	$mailFrom=$rowSystem["from_email_field"];
	$mailPass=$rowSystem["server_password"];
	$mailUser=$rowSystem["server_username"];	
	
	
	//Create a new PHPMailer instance
	$mail = new PHPMailer2;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = $mailFrom;
	//Password to use for SMTP authentication
	$mail->Password = $mailPass;
	//Set who the message is to be sent from
	$mail->setFrom($mailFrom, 'Informacion CRM - TuAgencia24');
	//Set an alternative reply-to address
	//$mail->addReplyTo('replyto@example.com', $mailUser;);
	
	//Set who the message is to be sent to	
	$mail->addAddress($email, 'Usuario');

	//Set the subject line 
	$mail->Subject = $asunto;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	$log->debug("cuerpo html: ".$mensaje);
	
	$mail->msgHTML($mensaje);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
	$enviar_mail=$mail->send();
	if (!$enviar_mail) {
		$log->debug ("Mailer Error: $mailFrom $mailUser $mailPass" . $mail->ErrorInfo);
	} 
}