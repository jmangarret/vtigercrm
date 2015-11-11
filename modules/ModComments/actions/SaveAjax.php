<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
//Modify By jmangarret 11jun2015
//include('include/PHPMailer/enviar_email.php');
class ModComments_SaveAjax_Action extends Vtiger_SaveAjax_Action {

	public function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$record = $request->get('record');
		//Do not allow ajax edit of existing comments
		if ($record) {
			throw new AppException('LBL_PERMISSION_DENIED');
		}
	}

	public function process(Vtiger_Request $request) {
		global $log, $adb, $moduleName;
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$request->set('assigned_user_id', $currentUserModel->getId());
		$request->set('userid', $currentUserModel->getId());
		
		$recordModel = $this->saveRecord($request);

		$fieldModelList = $recordModel->getModule()->getFields();
		$result = array();
		foreach ($fieldModelList as $fieldName => $fieldModel) {
			$fieldValue = $recordModel->get($fieldName);
			$result[$fieldName] = array('value' => $fieldValue, 'display_value' => $fieldModel->getDisplayValue($fieldValue));
		}
		$result['id'] = $recordModel->getId();

		$result['_recordLabel'] = $recordModel->getName();
		$result['_recordId'] = $recordModel->getId();

		//modify by jmangarret 11jun2015 Enviar email
			$idCaso 	= $request->get("related_to");
			$userid 	= $request->get("userid");
			$comment 	= $request->get("commentcontent");

			$query = $adb->pquery("select smcreatorid, smownerid from vtiger_crmentity where setype='HelpDesk' and crmid = ? ", array($idCaso));
			$row= $adb->fetchByAssoc($query);				
			$idowner=$row['smownerid'];
			$idcreator=$row['smcreatorid'];

			if ($userid==$idowner){
				$userid=$idcreator;
			}else{
				$userid=$idowner;
			}
			$query = $adb->pquery("select * from vtiger_troubletickets where ticketid = ? ", array($idCaso));
			$row= $adb->fetchByAssoc($query);				
			$title=		$row['title']; //Para Validar si es un comentario de un caso
			$ticket=	$row['ticket_no']; //Para Validar si es un comentario de un caso
			
			if ($title && $idowner!=$idcreator){
				$query = $adb->pquery("select * from vtiger_users where id = ? ", array($userid));
				$row= $adb->fetchByAssoc($query);	
				$email=		$row["email1"];
				$nombre=	$row["first_name"];
				
				$asunto="Informacion";
				$mensaje = " 
				<html> 
				<head> 
				<title>Info - Tu Agencia 24</title> 
				</head> 
				<body> 
				<p>".$nombre.",</p>
				<p>El siguiente caso ha sido comentado:</p>
				<p><b>Nro. Ticket: </b>".$ticket."</p>
				<p><b>Caso: </b>".$title."</p>
				<p><b>Comentario: </b>".$comment."</p>
				<BR><BR><BR>
				<i>
				Gracias,		
				<p>Equipo TuAgencia24.com</p>
				</i>
				</body> 
				</html> "; 				
				enviarEmail($email,$asunto,$mensaje);						
			}	
		//Fin enviar email

		$response = new Vtiger_Response();
		$response->setEmitType(Vtiger_Response::$EMIT_JSON);
		$response->setResult($result);
		$response->emit();
	}
}