<?
include("../../config.inc.php");
$user=$dbconfig['db_username'];
$pass=$dbconfig['db_password'];
$bd=$dbconfig['db_name'];
mysql_connect("localhost",$user,$pass);
mysql_select_db($bd);
$firma= $_REQUEST["firma"];
$sql="SELECT status FROM vtiger_firma WHERE firma='".$firma."'";
$qry=mysql_query($sql);
$status=mysql_result($qry, 0);
if ($status==1){		
	echo $firma;
}	

?>
