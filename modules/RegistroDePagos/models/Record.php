<?php
class RegistroDePagos_Record_Model extends Vtiger_Record_Model {
	/**
	 * Function to get Image Details
	 * @return <array> Image Details List
	 */
	public function getImageDetails() {
		$db = PearDatabase::getInstance();
		$imageDetails = array();
		$recordId = $this->getId();

		if ($recordId) {
			$sql = "SELECT vtiger_attachments.*, vtiger_crmentity.setype FROM vtiger_attachments
						INNER JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid
						INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_attachments.attachmentsid
						WHERE vtiger_crmentity.setype = 'RegistroDePagos Attachment' and vtiger_seattachmentsrel.crmid = ?
						ORDER BY vtiger_attachments.attachmentsid DESC";

			$result = $db->pquery($sql, array($recordId));

			$imageId = $db->query_result($result, 0, 'attachmentsid');
			$imagePath = $db->query_result($result, 0, 'path');
			$imageName = $db->query_result($result, 0, 'name');

			//decode_html - added to handle UTF-8 characters in file names
			$imageOriginalName = decode_html($imageName);

			//urlencode - added to handle special characters like #, %, etc.,
			$imageName = urlencode($imageName);

			$imageDetails[] = array(
					'id' => $imageId,
					'orgname' => $imageOriginalName,
					'path' => $imagePath.$imageId,
					'name' => $imageName
			);
		}
		return $imageDetails;
	}
}
