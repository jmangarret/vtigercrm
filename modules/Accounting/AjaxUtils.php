<?PHP


session_start();
require_once('include/utils/utils.php');


function getLanguageStrings()
{
	$langStrings = "";
	if (isset($_SESSION["authenticated_user_language"]))
	{	
		$langStringsArray = return_module_language($_SESSION["authenticated_user_language"], 'aXfax');
		
		if(isset($_REQUEST['asArray']) && $_REQUEST['asArray'] == 'true')
			return $langStringsArray;
			
		if ($langStringsArray != null)
		{
			foreach ($langStringsArray as $key => $value)
				$langStrings .= $key."$$@$$".$value."$$@$$";
		
			$langStrings = rtrim($langStrings, "$$@$$");
		}
	}
	
	echo $langStrings;
}



if (isset($_REQUEST["action"]))
{
	if (function_exists($_REQUEST["action"]))
		eval($_REQUEST["action"]."();");
}



?>