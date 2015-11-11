{*<!--
/*********************************************************************************
* The content of this file is subject to the PDF Maker Free license.
* ("License"); You may not use this file except in compliance with the License
* The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
* Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
* All Rights Reserved.
********************************************************************************/
-->*}
{strip}
<div class="listViewTopMenuDiv">
    <div class="listViewActionsDiv row-fluid">
        <span class="btn-toolbar span4">
            {foreach item=LISTVIEW_BASICACTION from=$LISTVIEW_LINKS['LISTVIEWBASIC']}
                    <span class="btn-group">
                            <button id="{$MODULE}_listView_basicAction_{Vtiger_Util_Helper::replaceSpaceWithUnderScores($LISTVIEW_BASICACTION->getLabel())}" class="btn addButton" {if stripos($LISTVIEW_BASICACTION->getUrl(), 'javascript:')===0} onclick='{$LISTVIEW_BASICACTION->getUrl()|substr:strlen("javascript:")};'{else} onclick='window.location.href="{$LISTVIEW_BASICACTION->getUrl()}"'{/if}><i class="icon-plus icon-white"></i>&nbsp;<strong>{vtranslate($LISTVIEW_BASICACTION->getLabel(), $MODULE)}</strong></button>
                    </span>
            {/foreach}
        </span>
        <span class="btn-toolbar span4">
            <span class="customFilterMainSpan btn-group">

            </span>
        </span>
        <span class="hide filterActionImages pull-right">
                <i title="{vtranslate('LBL_DENY', $MODULE)}" data-value="deny" class="icon-ban-circle alignMiddle denyFilter filterActionImage pull-right"></i>
                <i title="{vtranslate('LBL_APPROVE', $MODULE)}" data-value="approve" class="icon-ok alignMiddle approveFilter filterActionImage pull-right"></i>
                <i title="{vtranslate('LBL_DELETE', $MODULE)}" data-value="delete" class="icon-trash alignMiddle deleteFilter filterActionImage pull-right"></i>
                <i title="{vtranslate('LBL_EDIT', $MODULE)}" data-value="edit" class="icon-pencil alignMiddle editFilter filterActionImage pull-right"></i>
        </span>
    </div>
</div>
{/strip}