<?php

/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker Free license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

error_reporting(0);

class PDFMaker_IndexAjax_Action extends Settings_Vtiger_Basic_Action {

    function __construct() {
        parent::__construct();
        $this->exposeMethod('downloadMPDF');
    }

    function process(Vtiger_Request $request) {
        $mode = $request->get('mode');
        if(!empty($mode)) {
                $this->invokeExposedMethod($mode, $request);
                return;
        }        
        $type = $request->get('type');
    }
            
    public function downloadMPDF(Vtiger_Request $request) {
        $error == "";
        $srcZip = "http://www.crm4you.sk/PDFMaker/src/mpdf.zip";
        $trgZip = "modules/PDFMaker/resources/mpdf.zip";
        if (copy($srcZip, $trgZip)) {
            require_once('vtlib/thirdparty/dUnzip2.inc.php');
            $unzip = new dUnzip2($trgZip);
            $unzip->unzipAll(getcwd() . "/modules/PDFMaker/resources/");
            if ($unzip)
                $unzip->close();

            if (!is_dir("modules/PDFMaker/resources/mpdf")) {
                $error = vtranslate("UNZIP_ERROR", 'PDFMaker');
                $viewer->assign("STEP", "error");
                $viewer->assign("ERROR_TBL", $errTbl);
            } 
    
        } else {
            $error = vtranslate("DOWNLOAD_ERROR", 'PDFMaker');
        }

        if ($error == "") {
             $result = array('success' => true, 'message' => '');
        } else {
             $result = array('success' => false, 'message' => $error);
        }
        
        $response = new Vtiger_Response();
        $response->setResult($result);
        $response->emit();
    } 
}