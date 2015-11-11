<?php

function getListViewEntries2($focus, $module,$list_result,$navigation_array,$relatedlist='',$returnset='',$edit_action='EditView',$del_action='Delete',$oCv='',$page='',$selectedfields='',$contRelatedfields='',$skipActions=false)
{
	global $log;
	global $mod_strings;
	$log->debug("Entering getListViewEntries(".get_class($focus).",". $module.",".$list_result.",".$navigation_array.",".$relatedlist.",".$returnset.",".$edit_action.",".$del_action.",".(is_object($oCv)? get_class($oCv) : $oCv).") method ...");
	$tabname = getParentTab();
	global $adb,$current_user;
	global $app_strings;
	$noofrows = $adb->num_rows($list_result);
	$list_block = Array();
	global $theme;
	$evt_status = '';
	$theme_path="themes/".$theme."/";
	$image_path=$theme_path."images/";
	//getting the vtiger_fieldtable entries from database
	$tabid = getTabid($module);

	//added for vtiger_customview 27/5
	if($oCv)
	{
		if(isset($oCv->list_fields))
		{
			$focus->list_fields = $oCv->list_fields;
		}
	}
	if(is_array($selectedfields) && $selectedfields != '')
	{
		$focus->list_fields = $selectedfields;
	}

	// Remove fields which are made inactive
	$focus->filterInactiveFields($module);

	//Added to reduce the no. of queries logging for non-admin user -- by minnie-start
	$field_list = array();
	$j=0;
	require('user_privileges/user_privileges_'.$current_user->id.'.php');
	foreach($focus->list_fields as $name=>$tableinfo)
	{
		$fieldname = $focus->list_fields_name[$name];
		if($oCv)
		{
			if(isset($oCv->list_fields_name))
			{
				$fieldname = $oCv->list_fields_name[$name];
			}
		}
		if($fieldname == 'accountname' && $module != 'Accounts')
		{
			$fieldname = 'account_id';
		}
		if($fieldname == 'lastname' &&($module == 'SalesOrder'|| $module == 'PurchaseOrder' || $module == 'Invoice' || $module == 'Quotes'||$module == 'Calendar'))
			$fieldname = 'contact_id';

		if($fieldname == 'productname' && $module != 'Products')
		{
			$fieldname = 'product_id';
		}

		array_push($field_list, $fieldname);
		$j++;
	}
	$field=Array();
	if($is_admin==false)
	{
		if($module == 'Emails')
		{
			$query  = "SELECT fieldname FROM vtiger_field WHERE tabid = ? and vtiger_field.presence in (0,2)";
			$params = array($tabid);
		}
		else
		{
			$profileList = getCurrentUserProfileList();
			$params = array();
			$query  = "SELECT DISTINCT vtiger_field.fieldname
				FROM vtiger_field
				INNER JOIN vtiger_profile2field
					ON vtiger_profile2field.fieldid = vtiger_field.fieldid
				INNER JOIN vtiger_def_org_field
					ON vtiger_def_org_field.fieldid = vtiger_field.fieldid";

			if($module == "Calendar")
				$query .=" WHERE vtiger_field.tabid in (9,16) and vtiger_field.presence in (0,2)";
			else {
				$query .=" WHERE vtiger_field.tabid = ? and vtiger_field.presence in (0,2)";
				array_push($params, $tabid);
			}

			$query .=" AND vtiger_profile2field.visible = 0
					AND vtiger_profile2field.visible = 0
					AND vtiger_def_org_field.visible = 0
					AND vtiger_profile2field.profileid IN (". generateQuestionMarks($profileList) .")
					AND vtiger_field.fieldname IN (". generateQuestionMarks($field_list) .")";

			array_push($params, $profileList, $field_list);
		}

		$result = $adb->pquery($query, $params);
		for($k=0;$k < $adb->num_rows($result);$k++)
		{
			$field[]=$adb->query_result($result,$k,"fieldname");
		}
	}
	//constructing the uitype and columnname array
	$ui_col_array=Array();

	$params = array();
	$query = "SELECT uitype, columnname, fieldname FROM vtiger_field ";

	if($module == "Calendar")
		$query .=" WHERE vtiger_field.tabid in (9,16) and vtiger_field.presence in (0,2)";
	else {
		$query .=" WHERE vtiger_field.tabid = ? and vtiger_field.presence in (0,2)";
		array_push($params, $tabid);
	}
	$query .= " AND fieldname IN (". generateQuestionMarks($field_list).") ";
	array_push($params, $field_list);

	$result = $adb->pquery($query, $params);
	$num_rows=$adb->num_rows($result);
	for($i=0;$i<$num_rows;$i++)
	{
		$tempArr=array();
		$uitype=$adb->query_result($result,$i,'uitype');
		$columnname=$adb->query_result($result,$i,'columnname');
		$field_name=$adb->query_result($result,$i,'fieldname');
		$tempArr[$uitype]=$columnname;
		$ui_col_array[$field_name]=$tempArr;
	}
	//end
	if($navigation_array['start'] !=0)
		for ($i=1; $i<=$noofrows; $i++)
		{
			$list_header =Array();
			//Getting the entityid
			if($module != 'Users')
			{
				$entity_id = $adb->query_result($list_result,$i-1,"crmid");
				$owner_id = $adb->query_result($list_result,$i-1,"smownerid");
			}else
			{
				$entity_id = $adb->query_result($list_result,$i-1,"id");
			}
			// Fredy Klammsteiner, 4.8.2005: changes from 4.0.1 migrated to 4.2
			// begin: Armando Lüscher 05.07.2005 -> §priority
			// Code contri buted by fredy Desc: Set Priority color
			$priority = $adb->query_result($list_result,$i-1,"priority");

			$font_color_high = "color:#00DD00;";
			$font_color_medium = "color:#DD00DD;";
			$P_FONT_COLOR = "";
			switch ($priority)
			{
				case 'High':
					$P_FONT_COLOR = $font_color_high;
					break;
				case 'Medium':
					$P_FONT_COLOR = $font_color_medium;
					break;
				default:
					$P_FONT_COLOR = "";
			}
			//end: Armando Lüscher 05.07.2005 -> §priority
			foreach($focus->list_fields as $name=>$tableinfo)
			{
				$fieldname = $focus->list_fields_name[$name];

				//added for vtiger_customview 27/5
				if($oCv) {
					if(isset($oCv->list_fields_name)) {
						$fieldname = $oCv->list_fields_name[$name];
						if($fieldname == 'accountname' && $module != 'Accounts') {
							$fieldname = 'account_id';
						}
						if($fieldname == 'lastname' &&($module == 'SalesOrder'|| $module == 'PurchaseOrder' || $module == 'Invoice' || $module == 'Quotes'||$module == 'Calendar' )) {
							$fieldname = 'contact_id';
						}
						if($fieldname == 'productname' && $module != 'Products') {
							$fieldname = 'product_id';
						}
					} else {
						$fieldname = $focus->list_fields_name[$name];
					}
				} else {
					$fieldname = $focus->list_fields_name[$name];
					if($fieldname == 'accountname' && $module != 'Accounts') {
						$fieldname = 'account_id';
					}
					if($fieldname == 'lastname' && ($module == 'SalesOrder'|| $module == 'PurchaseOrder' || $module == 'Invoice' || $module == 'Quotes'|| $module == 'Calendar')) {
						$fieldname = 'contact_id';
					}
					if($fieldname == 'productname' && $module != 'Products') {
						$fieldname = 'product_id';
					}
				}
				if($is_admin==true || $profileGlobalPermission[1] == 0 || $profileGlobalPermission[2] ==0 || in_array($fieldname,$field) || $fieldname == '' || ($name=='Close' && $module=='Calendar')) {
					if($fieldname == '') {
						$table_name = '';
						$column_name = '';
						foreach($tableinfo as $tablename=>$colname) {
							$table_name=$tablename;
							$column_name = $colname;
						}
						$value = $adb->query_result($list_result,$i-1,$colname);
					}
					else {
						if($module == 'Calendar') {
							$act_id = $adb->query_result($list_result,$i-1,"activityid");

							$cal_sql = "select activitytype from vtiger_activity where activityid=?";
							$cal_res = $adb->pquery($cal_sql,array($act_id));
							if($adb->num_rows($cal_res)>=0)
								$activitytype = $adb->query_result($cal_res,0,"activitytype");
						}
						if(($module == 'Calendar' || $module == 'Emails' || $module == 'HelpDesk' || $module == 'Invoice' || $module == 'Leads' || $module == 'Contacts') && (($fieldname=='parent_id') || ($name=='Contact Name') || ($name=='Close') || ($fieldname == 'firstname'))) {
							if($module == 'Calendar'){
								if($fieldname=='status'){
									if($activitytype == 'Task'){
										$fieldname='taskstatus';
									} else {
										$fieldname='eventstatus';
									}
								}
								if($activitytype == 'Task' ) {
									if(getFieldVisibilityPermission('Calendar',$current_user->id,$fieldname) == '0'){
										$has_permission = 'yes';
									} else {
										$has_permission = 'no';
									}
								} else {
									if(getFieldVisibilityPermission('Events',$current_user->id,$fieldname) == '0'){
										$has_permission = 'yes';
									} else {
										$has_permission = 'no';
									}
								}
							}
							if($module != 'Calendar' || ($module == 'Calendar' && $has_permission == 'yes')) {
								if ($fieldname=='parent_id') {
									$value=getRelatedTo($module,$list_result,$i-1);
								}
								if($name=='Contact Name') {
									$contact_id = $adb->query_result($list_result,$i-1,"contactid");
									$contact_name = getFullNameFromQResult($list_result,$i-1,"Contacts");
									$value="";
									//Added to get the contactname for activities custom view - t=2190
									if($contact_id != '' && !empty($contact_name)) {
										$contact_name = getContactName($contact_id);
									}
									if(($contact_name != "") && ($contact_id !='NULL')) {
										// Fredy Klammsteiner, 4.8.2005: changes from 4.0.1 migrated to 4.2
										$value =  "<a href='index.php?module=Contacts&action=DetailView&parenttab=".$tabname."&record=".$contact_id."' style='".$P_FONT_COLOR."'>".$contact_name."</a>"; // Armando Lüscher 05.07.2005 -> §priority -> Desc: inserted style="$P_FONT_COLOR"
									}
								}
								if($fieldname == "firstname") {
									$first_name = textlength_check($adb->query_result($list_result,$i-1,"firstname"));

									$value = '<a href="index.php?action=DetailView&module='.$module.'&parenttab='.$tabname.'&record='.$entity_id.'">'.$first_name.'</a>';
								}

								if ($name == 'Close') {
									$status = $adb->query_result($list_result,$i-1,"status");
									$activityid = $adb->query_result($list_result,$i-1,"activityid");
									if(empty($activityid)){
										$activityid = $adb->query_result($list_result, $i-1, "tmp_activity_id");
									}
									$activitytype = $adb->query_result($list_result,$i-1,"activitytype");
									// TODO - Picking activitytype when it is not present in the Custom View.
									// Going forward, this column should be added to the select list if not already present as a performance improvement.
									if (empty($activitytype)) {
										$activitytypeRes = $adb->pquery('SELECT activitytype FROM vtiger_activity WHERE activityid=?', array($activityid));
										if ($adb->num_rows($activitytypeRes) > 0) {
											$activitytype = $adb->query_result($activitytypeRes, 0, 'activitytype');
										}
									}
									if ($activitytype != 'Task' && $activitytype != 'Emails') {
										$eventstatus = $adb->query_result($list_result,$i-1,"eventstatus");
										if(isset($eventstatus)) {
											$status = $eventstatus;
										}
									}
									if($status =='Deferred' || $status == 'Completed' || $status == 'Held' || $status == '') {
										$value="";
									} else {
										if($activitytype=='Task')
											$evt_status='&status=Completed';
										else
											$evt_status='&eventstatus=Held';
										if(isPermitted("Calendar",'EditView',$activityid) == 'yes') {
											if ($returnset == '') {
												$returnset = '&return_module=Calendar&return_action=ListView&return_id='.$activityid.'&return_viewname='.$oCv->setdefaultviewid;
											}
											// Fredy Klammsteiner, 4.8.2005: changes from 4.0.1 migrated to 4.2
											$value = "<a href='index.php?action=Save&module=Calendar&record=".$activityid."&parenttab=".$tabname."&change_status=true".$returnset.$evt_status."&start=".$navigation_array['current']."' style='".$P_FONT_COLOR."'>X</a>"; // Armando Lüscher 05.07.2005 -> §priority -> Desc: inserted style="$P_FONT_COLOR"
										} else {
											$value = "";
										}
									}
								}

							} else {
								$value = "";
							}
						} elseif($module == "Documents" && ($fieldname == 'filelocationtype' || $fieldname == 'filename' || $fieldname == 'filesize' || $fieldname == 'filestatus' || $fieldname == 'filetype')) {
							$value = $adb->query_result($list_result,$i-1,$fieldname);
							if($fieldname == 'filelocationtype') {
								if($value == 'I')
									$value = getTranslatedString('LBL_INTERNAL',$module);
								elseif($value == 'E')
									$value = getTranslatedString('LBL_EXTERNAL',$module);
								else
									$value = ' --';
							}
							if($fieldname == 'filename') {
								$downloadtype = $adb->query_result($list_result,$i-1,'filelocationtype');
								if($downloadtype == 'I') {
									$fld_value = $value;
									$ext_pos = strrpos($fld_value, ".");
									$ext =substr($fld_value, $ext_pos + 1);
									$ext = strtolower($ext);
									if($value != ''){
										if($ext == 'bin' || $ext == 'exe' || $ext == 'rpm')
											$fileicon="<img src='" . vtiger_imageurl('fExeBin.gif', $theme) . "' hspace='3' align='absmiddle' border='0'>";
										elseif($ext == 'jpg' || $ext == 'gif' || $ext == 'bmp')
											$fileicon="<img src='" . vtiger_imageurl('fbImageFile.gif', $theme) . "' hspace='3' align='absmiddle' border='0'>";
										elseif($ext == 'txt' || $ext == 'doc' || $ext == 'xls')
											$fileicon="<img src='" . vtiger_imageurl('fbTextFile.gif', $theme) . "' hspace='3' align='absmiddle' border='0'>";
										elseif($ext == 'zip' || $ext == 'gz' || $ext == 'rar')
											$fileicon="<img src='" . vtiger_imageurl('fbZipFile.gif', $theme) . "' hspace='3' align='absmiddle'	border='0'>";
										else
											$fileicon="<img src='" . vtiger_imageurl('fbUnknownFile.gif', $theme) . "' hspace='3' align='absmiddle' border='0'>";
									}
								} elseif($downloadtype == 'E') {
									if(trim($value) != '' ) {
										$fld_value = $value;
										$fileicon = "<img src='" . vtiger_imageurl('fbLink.gif', $theme) . "' alt='".getTranslatedString('LBL_EXTERNAL_LNK',$module)."' title='".getTranslatedString('LBL_EXTERNAL_LNK',$module)."' hspace='3' align='absmiddle' border='0'>";
									}
									else {
										$fld_value = '--';
										$fileicon = '';
									}
								} else {
									$fld_value = ' --';
									$fileicon = '';
								}

								$file_name = $adb->query_result($list_result,$i-1,'filename');
								$notes_id = $adb->query_result($list_result,$i-1,'crmid');
								$folder_id = $adb->query_result($list_result,$i-1,'folderid');
								$download_type = $adb->query_result($list_result,$i-1,'filelocationtype');
								$file_status = $adb->query_result($list_result,$i-1,'filestatus');
								$fileidQuery = "select attachmentsid from vtiger_seattachmentsrel where crmid=?";
								$fileidres = $adb->pquery($fileidQuery,array($notes_id));
								$fileid = $adb->query_result($fileidres,0,'attachmentsid');
								if($file_name != '' && $file_status == 1) {
									if($download_type == 'I' ) {
										$fld_value = "<a href='index.php?module=uploads&action=downloadfile&entityid=$notes_id&fileid=$fileid' title='".getTranslatedString("LBL_DOWNLOAD_FILE",$module)."' onclick='javascript:dldCntIncrease($notes_id);'>".$fld_value."</a>";
									} elseif($download_type == 'E') {
										$fld_value = "<a target='_blank' href='$file_name' onclick='javascript:dldCntIncrease($notes_id);' title='".getTranslatedString("LBL_DOWNLOAD_FILE",$module)."'>".$fld_value."</a>";
									} else {
										$fld_value = ' --';
									}
								}
								$value = $fileicon.$fld_value;
							}
							if($fieldname == 'filesize') {
								$downloadtype = $adb->query_result($list_result,$i-1,'filelocationtype');
								if($downloadtype == 'I') {
									$filesize = $value;
									if($filesize < 1024)
										$value=$filesize.' B';
									elseif($filesize > 1024 && $filesize < 1048576)
										$value=round($filesize/1024,2).' KB';
									else if($filesize > 1048576)
										$value=round($filesize/(1024*1024),2).' MB';
								} else {
									$value = ' --';
								}
							}
							if($fieldname == 'filestatus') {
								$filestatus = $value;
								if($filestatus == 1)
									$value=getTranslatedString('yes',$module);
								elseif($filestatus == 0)
									$value=getTranslatedString('no',$module);
								else
									$value=' --';
							}
							if($fieldname == 'filetype') {
								$downloadtype = $adb->query_result($list_result,$i-1,'filelocationtype');
								$filetype = $adb->query_result($list_result,$i-1,'filetype');
								if($downloadtype == 'E' || $downloadtype != 'I') {
									$value = ' --';
								} else
									$value = $filetype;
							}
							if($fieldname == 'notecontent') {
								$value = decode_html($value);
								$value = textlength_check($value);
							}
						} elseif($module == "Products" && $name == "Related to") {
							$value=getRelatedTo($module,$list_result,$i-1);
						} elseif($name=='Contact Name' && ($module =='SalesOrder' || $module == 'Quotes' || $module == 'PurchaseOrder')) {
							if($name == 'Contact Name') {
								$contact_id = $adb->query_result($list_result,$i-1,"contactid");
								$contact_name = getFullNameFromQResult($list_result, $i-1,"Contacts");
								$value="";
								if(($contact_name != "") && ($contact_id !='NULL'))
									$value ="<a href='index.php?module=Contacts&action=DetailView&parenttab=".$tabname."&record=".$contact_id."' style='".$P_FONT_COLOR."'>".$contact_name."</a>";
							}
						} elseif($name == 'Product') {
							$product_id = textlength_check($adb->query_result($list_result,$i-1,"productname"));
							$value =  $product_id;
						} elseif($name=='Account Name') {
							//modified for vtiger_customview 27/5
							if($module == 'Accounts') {
								$account_id = $adb->query_result($list_result,$i-1,"crmid");
								//$account_name = getAccountName($account_id);
								$account_name = textlength_check($adb->query_result($list_result,$i-1,"accountname"));
								// Fredy Klammsteiner, 4.8.2005: changes from 4.0.1 migrated to 4.2
								$value = '<a href="index.php?module=Accounts&action=DetailView&record='.$account_id.'&parenttab='.$tabname.'" style="'.$P_FONT_COLOR.'">'.$account_name.'</a>'; // Armando Lüscher 05.07.2005 -> §priority -> Desc: inserted style="$P_FONT_COLOR"
							} elseif($module == 'Potentials' || $module == 'Contacts' || $module == 'Invoice' || $module == 'SalesOrder' || $module == 'Quotes') { //Potential,Contacts,Invoice,SalesOrder & Quotes  records   sort by Account Name
								$accountname = textlength_check($adb->query_result($list_result,$i-1,"accountname"));
								$accountid = $adb->query_result($list_result,$i-1,"accountid");
								$value = '<a href="index.php?module=Accounts&action=DetailView&record='.$accountid.'&parenttab='.$tabname.'" style="'.$P_FONT_COLOR.'">'.$accountname.'</a>';
							} else {
								$account_id = $adb->query_result($list_result,$i-1,"accountid");
								$account_name = getAccountName($account_id);
								$acc_name = textlength_check($account_name);
								// Fredy Klammsteiner, 4.8.2005: changes from 4.0.1 migrated to 4.2
								$value = '<a href="index.php?module=Accounts&action=DetailView&record='.$account_id.'&parenttab='.$tabname.'" style="'.$P_FONT_COLOR.'">'.$acc_name.'</a>'; // Armando Lüscher 05.07.2005 -> §priority -> Desc: inserted style="$P_FONT_COLOR"
							}
						} elseif(( $module == 'HelpDesk' || $module == 'PriceBook' || $module == 'Quotes' || $module == 'PurchaseOrder' || $module == 'Faq') && $name == 'Product Name') {
							if($module == 'HelpDesk' || $module == 'Faq')
								$product_id = $adb->query_result($list_result,$i-1,"product_id");
							else
								$product_id = $adb->query_result($list_result,$i-1,"productid");

							if($product_id != '')
								$product_name = getProductName($product_id);
							else
								$product_name = '';

							$value = '<a href="index.php?module=Products&action=DetailView&parenttab='.$tabname.'&record='.$product_id.'">'.textlength_check($product_name).'</a>';
						} elseif(($module == 'Quotes' && $name == 'Potential Name') || ($module == 'SalesOrder' && $name == 'Potential Name')) {
							$potential_id = $adb->query_result($list_result,$i-1,"potentialid");
							$potential_name = getPotentialName($potential_id);
							$value = '<a href="index.php?module=Potentials&action=DetailView&parenttab='.$tabname.'&record='.$potential_id.'">'.textlength_check($potential_name).'</a>';
						} elseif($module =='Emails' && $relatedlist != '' && ($name=='Subject' || $name=='Date Sent' || $name == 'To')) {
							$list_result_count = $i-1;
							$tmp_value = getValue($ui_col_array,$list_result,$fieldname,$focus,$module,$entity_id,$list_result_count,"list","",$returnset,$oCv->setdefaultviewid);
							$value = '<a href="javascript:;" onClick="ShowEmail(\''.$entity_id.'\');">'.textlength_check($tmp_value).'</a>';
							if($name == 'Date Sent') {
								$sql="select email_flag from vtiger_emaildetails where emailid=?";
								$result=$adb->pquery($sql, array($entity_id));
								$email_flag=$adb->query_result($result,0,"email_flag");
								if($email_flag != 'SAVED')
									$value = getValue($ui_col_array,$list_result,$fieldname,$focus,$module,$entity_id,$list_result_count,"list","",$returnset,$oCv->setdefaultviewid);
								else
									$value = '';
							}
						} elseif($module == 'Calendar' && ($fieldname!='taskstatus' && $fieldname!='eventstatus')) {
							if($activitytype == 'Task' ) {
								if(getFieldVisibilityPermission('Calendar',$current_user->id,$fieldname) == '0'){
									$list_result_count = $i-1;
									$value = getValue($ui_col_array,$list_result,$fieldname,$focus,$module,$entity_id,$list_result_count,"list","",$returnset,$oCv->setdefaultviewid);
								} else {
									$value = '';
								}
							} else {
								if(getFieldVisibilityPermission('Events',$current_user->id,$fieldname) == '0'){
									$list_result_count = $i-1;
									$value = getValue($ui_col_array,$list_result,$fieldname,$focus,$module,$entity_id,$list_result_count,"list","",$returnset,$oCv->setdefaultviewid);
								} else {
									$value = '';
								}
							}
						} elseif($module == "Accounting" && $fieldname == "accounting_id") {
								$list_result_count = $i-1;
								$value = getValue($ui_col_array,$list_result,$fieldname,$focus,$module,$entity_id,$list_result_count,"list","",$returnset,$oCv->setdefaultviewid);
								$value = '<a href="index.php?action=DetailView&module='.$module.'&parenttab='.$tabname.'&record='.$entity_id.'">'.$value.'</a>';
						}else {
							$list_result_count = $i-1;
							$value = getValue($ui_col_array,$list_result,$fieldname,$focus,$module,$entity_id,$list_result_count,"list","",$returnset,$oCv->setdefaultviewid);
						}
					}

					// vtlib customization: For listview javascript triggers
					$value = "$value <span type='vtlib_metainfo' vtrecordid='{$entity_id}' vtfieldname='{$fieldname}' vtmodule='$module' style='display:none;'></span>";
					// END

					if($module == "Calendar" && $name == $app_strings['Close'])
					{
						if(isPermitted("Calendar","EditView") == 'yes')
						{
							if((getFieldVisibilityPermission('Events',$current_user->id,'eventstatus') == '0') || (getFieldVisibilityPermission('Calendar',$current_user->id,'taskstatus') == '0'))
							{
								array_push($list_header,$value);
							}
						}
					}
					else
						$list_header[] = $value;

				}

			}
			$varreturnset = '';
			if($returnset=='')
				$varreturnset = '&return_module='.$module.'&return_action=index';
			else
				$varreturnset = $returnset;


			if($module == 'Calendar')
			{
				$actvity_type = $adb->query_result($list_result,$list_result_count,'activitytype');
				if($actvity_type == 'Task')
					$varreturnset .= '&activity_mode=Task';
				else
					$varreturnset .= '&activity_mode=Events';
			}

			//Added for Actions ie., edit and delete links in listview
			$links_info = "";
			if(!(is_array($selectedfields) && $selectedfields != ''))
			{
				if(isPermitted($module,"EditView","") == 'yes'){
					$edit_link = getListViewEditLink($module,$entity_id,$relatedlist,$varreturnset,$list_result,$list_result_count);
					if(isset($_REQUEST['start']) && $_REQUEST['start'] > 1 && $module != 'Emails')
						$links_info .= "<a href=\"$edit_link&start=".vtlib_purify($_REQUEST['start'])."\">".$app_strings["LNK_EDIT"]."</a> ";
					else
						$links_info .= "<a href=\"$edit_link\">".$app_strings["LNK_EDIT"]."</a> ";
				}


				if(isPermitted($module,"Delete","") == 'yes'){
					$del_link = getListViewDeleteLink($module,$entity_id,$relatedlist,$varreturnset);
					if($links_info != "" && $del_link != "")
						$links_info .=  " | ";
					if($del_link != "")
						$links_info .=	"<a href='javascript:confirmdelete(\"".addslashes(urlencode($del_link))."\")'>".$app_strings["LNK_DELETE"]."</a>";
				}
			}
			// Record Change Notification
			if(method_exists($focus, 'isViewed') && PerformancePrefs::getBoolean('LISTVIEW_RECORD_CHANGE_INDICATOR', true)) {
				if(!$focus->isViewed($entity_id)) {
					$links_info .= " | <img src='" . vtiger_imageurl('important1.gif', $theme) . "' border=0>";
				}
			}
			// END
			if($links_info != "" && !$skipActions)
				$list_header[] = $links_info;
		//	$list_block[$entity_id] = $list_header;

			if(isset($_SESSION['partialpaymentview']) && $_SESSION['partialpaymentview'] == "true") {
				$list_block[$entity_id."_".$i] = $list_header;
			} else {
				$list_block[$entity_id] = $list_header;
			}

		}
	$log->debug("Exiting getListViewEntries method ...");
	return $list_block;

}

?>