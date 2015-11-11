<?php
    include_once ('config.php');
    require_once ('include/CustomFieldUtil.php');
    //require_once ('include/tequila_utils/utils.php');
 
    function insertIntoAttachment($entity)
        {
        global $adb, $current_user;
        $CRMEntity=new CRMEntity();
           // en el objeto $entity tenemos toda la información relacionada con el registro que se esta guardando.
 
           // Esta linea debe de colocarse siempre para registrar en el Vtiger que ha sido llamada la función
        $entity->focus->called = true;        
        $module = $entity->getModuleName(); 
        /*  El id devuelto por $entity->getId() esta en el formato 1xNNNN en donde NNNN es el ID (en este caso 1x es para el modulo de SalesOrder)
         *  tomamos la parte que esta a al derecha de la "x" y ese es el correspondiente ID de pedido
         */        
        list($mod,$id)=split("x",$entity->getId());
        foreach($_FILES as $fileindex => $files)
        {
            
            //$old_attachmentid = $adb->query_result($adb->pquery("select vtiger_crmentity.crmid from vtiger_seattachmentsrel inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_seattachmentsrel.attachmentsid where  vtiger_seattachmentsrel.crmid=?", array($id)),0,'crmid');
            if($files['name'][0] != '')
            {                
                $files['original_name'] = vtlib_purify($_REQUEST[$fileindex.'_hidden']);
                $file_saved = $CRMEntity->uploadAndSaveFile($id,$module,$files);
            }
        }        
 
	return true;
    }
