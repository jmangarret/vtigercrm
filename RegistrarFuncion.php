<?php
    include_once('config.php');
    require_once  ('include/CustomFieldUtil.php');
    require_once 'include/utils/utils.php';
    require 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';
 
        // Lista de Modulos permitidos para agregar Funciones Personalizadas
    $modulesAllowed = array('SalesOrder', 'Invoice', 'RegistroDePagos', 'Documents', 'Calendar', 'Contacts', 'Accounts');
 
        // Directorio por default para los Scripts que contienen funciones personalizadas
    $customFunctionDir = 'include/WorkFlowFunctions/';
 
    function setCustomFunction($aFunction){
        global $adb;
        global $customFunctionDir;
        $emm = new VTEntityMethodManager($adb);
 
        // parametros (Modulo, Nombre de funcion para vtiger, ruta del archivo, nombre de funcion en Script)
        $emm->addEntityMethod($aFunction['Module'], $aFunction['FunctionName'], $customFunctionDir.$aFunction['scriptPath'], $aFunction['FunctionName']);
        return true;
    }
 
    function validateModule($module){
        global $modulesAllowed;
        if(($module != '') && (in_array($module, $modulesAllowed))) {
            return true;
        }
        return false;
    }
 
    function validateScript($scriptPath) {
        global $customFunctionDir;
        $filepath = $customFunctionDir.$scriptPath;
        if(is_file($filepath)){
            include($filepath);
 
            return true;
        }
        return false;
    }
 
    function validateFunctionName($scriptPath, $function, $validateFnName=true) {
        if(validateScript($scriptPath)){
            if($validateFnName == true && !function_exists($function) ) {
                return false;
            }
            return true;
        }
        return false;
    }
 
?>
<html>
<head>
<style type="text/css">
        body{
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            font-size:12px;
        }
        p, h1, form, button{border:0; margin:0; padding:0;}
        .spacer{clear:both; height:1px;}
        /* My Form */
        .myform{
            margin:0 auto;
            width:400px;
            padding:14px;
        }
 
        /* Stylized */
        #stylized{
            border:solid 2px #b7ddf2;
            background:#ebf4fb;
        }
        #stylized h1 {
            font-size:14px;
            font-weight:bold;
            margin-bottom:8px;
        }
        #stylized p{
            font-size:11px;
            color:#666666;
            margin-bottom:20px;
            border-bottom:solid 1px #b7ddf2;
            padding-bottom:10px;
        }
        #stylized label{
            display:block;
            font-weight:bold;
            text-align:right;
            width:140px;
            float:left;
        }
        #stylized .small{
            color:#666666;
            display:block;
            font-size:11px;
            font-weight:normal;
            text-align:right;
            width:140px;
        }
        #stylized input, #stylized select{
            float:left;
            font-size:12px;
            padding:4px 2px;
            border:solid 1px #aacfe4;
            width:200px;
            margin:2px 0 20px 10px;
        }
        #stylized button{
            clear:both;
            margin-left:150px;
            width:125px;
            height:31px;
            background:#666666 url(img/button.png) no-repeat;
            text-align:center;
            line-height:31px;
            color:#FFFFFF;
            font-size:11px;
            font-weight:bold;
        }
 
        fieldset.error{
            border: 3px solid #FF0000;
        }
        fieldset.success{myworkflowsfunctions
            border: 3px solid green;
        }
    </style>
</head>
<body>
    <div id="stylized" class="myform">
        <form id="form" name="RegFunctionForm" method="post" action="RegistrarFuncion.php">
            <h1>Formulario de Registro de función</h1>
            <p>Registrar funciones personalizadas para los workflows de Vtiger</p>
 
            <label>Module
                <span class="small">Escribe Nombre del Modulo</span>
            </label>
            <select name="Module" id="Module">
                <?php
                    foreach($modulesAllowed as $module) {
                        echo '<option value="'.$module.'">'.$module.'</option>';
                    }
                ?>
            </select>
            <!--<input type="text" name="Module" id="Module" />-->
 
            <label>Function
                <span class="small">Escribe nombre de la funcion</span>
            </label>
            <input type="text" name="FunctionName" id="FunctionName" value="<?php echo (isset($_POST['FunctionName'])) ? $_POST['FunctionName']: '' ;?>" />
 
            <label>Script Path
                <span class="small">Escribe ruta del Script de la funcion, los script deben estar en: <?php echo "<b>".$customFunctionDir."</b>"; ?></span>
            </label>
            <input type="text" name="scriptPath" id="scriptPath" value="<?php echo (isset($_POST['FunctionName'])) ? $_POST['FunctionName']: '' ;?>" />
 
            <button type="submit">Registrar</button>
            <div class="spacer"></div>
 
        </form>
    </div>
    <div class="myform">
    <?php
        if(isset($_POST['Module'])) {
            if(validateModule($_POST['Module'])) {
                $data['Module'] = $_POST['Module'];
                if(validateFunctionName($_POST['scriptPath'], $_POST['FunctionName'], $validafuncion = true)){
                    $data['FunctionName']   = $_POST['FunctionName'];
                    $data['scriptPath']     = $_POST['scriptPath'];
                    setCustomFunction($data);
                    $msg = "Se agrego correctamente la funcion... Ir a <a href='index.php'>CRM</a>";
                    $class = "success";
                }else{
                    $msg = 'Error al guardar la funcion: Por favor revise que el archivo especifcado y el nombre de la funcion sean correctos.';
                    $class = "error";
                }
            }else{
                $msg = 'Error al guardar la funcion: Por favor revise que el el modulo seleccionado este correcto.';
                $class = "error";
            }
        }else{
            $msg = 'Debe seleccionar el modulo.';
            $class = "error";
        }
 
        echo '<fieldset class="'.$class.'">'.$msg.'</fieldset>';
        echo "<pre>Valores: ".print_r($_POST,true)."</pre>";
    ?>
    </div>
</body>
</html>