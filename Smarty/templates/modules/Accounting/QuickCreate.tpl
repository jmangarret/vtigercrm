{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}

<script type="text/javascript">

{literal}
function acc_gup( name )
{
	name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp( regexS );
	var results = regex.exec( window.location.href );
	if( results == null )
	return "";
	else
	return results[1];
}

document.getElementById("qccombo").options[0].selected = true;
window.location = "index.php?module=Accounting&action=EditView&return_action="+acc_gup("action")+"&parenttab="+acc_gup("parenttab");

{/literal}
</script>