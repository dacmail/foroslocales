<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;

	$table_name  = $wpdb->prefix . "totalsoft_fonts";
	$table_name1 = $wpdb->prefix . "totalsoft_cal_1";
	$table_name2 = $wpdb->prefix . "totalsoft_cal_ids";
	$table_name3 = $wpdb->prefix . "totalsoft_cal_events";
	$table_name4 = $wpdb->prefix . "totalsoft_cal_types";
	$table_name5 = $wpdb->prefix . "totalsoft_cal_2";
	$table_name7 = $wpdb->prefix . "totalsoft_cal_3";
	$table_name8 = $wpdb->prefix . "totalsoft_cal_part";
	$table_name9 = $wpdb->prefix . "totalsoft_cal_4";

	require_once('Total-Soft-Calendar-Install.php');

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'TS_CalEv_Nonce' ))
		{
			$TotalSoftCal_Name=sanitize_text_field($_POST['TotalSoftCal_Name']);
			$TotalSoftCal_Type=sanitize_text_field($_POST['TotalSoftCal_Type']);
			//Event Calendar
			$TotalSoftCal_MW=sanitize_text_field($_POST['TotalSoftCal_MW']); $TotalSoftCal_WDStart=sanitize_text_field($_POST['TotalSoftCal_WDStart']); $TotalSoftCal_BSCol=sanitize_text_field($_POST['TotalSoftCal_BSCol']); $TotalSoftCal_HFS=sanitize_text_field($_POST['TotalSoftCal_HFS']); $TotalSoftCal_WFS=sanitize_text_field($_POST['TotalSoftCal_WFS']); $TotalSoftCal_DFS=sanitize_text_field($_POST['TotalSoftCal_DFS']); $TotalSoftCal_TFS=sanitize_text_field($_POST['TotalSoftCal_TFS']); $TotalSoftCal_RefIcCol=sanitize_text_field($_POST['TotalSoftCal_RefIcCol']); $TotalSoftCal_RefIcSize=sanitize_text_field($_POST['TotalSoftCal_RefIcSize']); $TotalSoftCal_ArrowSize=sanitize_text_field($_POST['TotalSoftCal_ArrowSize']); $TotalSoftCal1_Ev_T_FS = sanitize_text_field($_POST['TotalSoftCal1_Ev_T_FS']);

			//Simple Calendar
			$TotalSoftCal2_WDStart=sanitize_text_field($_POST['TotalSoftCal2_WDStart']); $TotalSoftCal2_W=sanitize_text_field($_POST['TotalSoftCal2_W']); $TotalSoftCal2_H=sanitize_text_field($_POST['TotalSoftCal2_H']); $TotalSoftCal2_BxShShow=sanitize_text_field($_POST['TotalSoftCal2_BxShShow']); $TotalSoftCal2_MFS=sanitize_text_field($_POST['TotalSoftCal2_MFS']); $TotalSoftCal2_WFS=sanitize_text_field($_POST['TotalSoftCal2_WFS']); $TotalSoftCal2_DFS=sanitize_text_field($_POST['TotalSoftCal2_DFS']); $TotalSoftCal2_TdFS=sanitize_text_field($_POST['TotalSoftCal2_TdFS']); $TotalSoftCal2_EdFS=sanitize_text_field($_POST['TotalSoftCal2_EdFS']); $TotalSoftCal2_ArrFS=sanitize_text_field($_POST['TotalSoftCal2_ArrFS']); $TotalSoftCal2_OmFS=sanitize_text_field($_POST['TotalSoftCal2_OmFS']); $TotalSoftCal2_Ev_HFS=sanitize_text_field($_POST['TotalSoftCal2_Ev_HFS']); $TotalSoftCal2_Ev_HText=sanitize_text_field($_POST['TotalSoftCal2_Ev_HText']); $TotalSoftCal2_Ev_TFS=sanitize_text_field($_POST['TotalSoftCal2_Ev_TFS']); $TotalSoftCal2_Ev_T_TA=sanitize_text_field($_POST['TotalSoftCal2_Ev_T_TA']);

			//Flexible Calendar
			$TotalSoftCal3_MW=sanitize_text_field($_POST['TotalSoftCal3_MW']); $TotalSoftCal3_WDStart=sanitize_text_field($_POST['TotalSoftCal3_WDStart']); $TotalSoftCal3_BoxShShow=sanitize_text_field($_POST['TotalSoftCal3_BoxShShow']); $TotalSoftCal3_H_MFS=sanitize_text_field($_POST['TotalSoftCal3_H_MFS']); $TotalSoftCal3_H_YFS=sanitize_text_field($_POST['TotalSoftCal3_H_YFS']); $TotalSoftCal3_Arr_S=sanitize_text_field($_POST['TotalSoftCal3_Arr_S']); $TotalSoftCal3_WD_FS=sanitize_text_field($_POST['TotalSoftCal3_WD_FS']); $TotalSoftCal3_Ev_FS=sanitize_text_field($_POST['TotalSoftCal3_Ev_FS']); $TotalSoftCal3_Ev_C_FS=sanitize_text_field($_POST['TotalSoftCal3_Ev_C_FS']); $TotalSoftCal3_Ev_T_FS=sanitize_text_field($_POST['TotalSoftCal3_Ev_T_FS']); $TotalSoftCal3_Ev_I_W=sanitize_text_field($_POST['TotalSoftCal3_Ev_I_W']); $TotalSoftCal3_Ev_L_Text=sanitize_text_field($_POST['TotalSoftCal3_Ev_L_Text']); $TotalSoftCal3_Ev_L_FS=sanitize_text_field($_POST['TotalSoftCal3_Ev_L_FS']); $TotalSoftCal3_Ev_L_BR=sanitize_text_field($_POST['TotalSoftCal3_Ev_L_BR']);

			//TimeLine Calendar
			$TotalSoftCal4_01 = sanitize_text_field($_POST['TotalSoftCal4_01']); $TotalSoftCal4_03 = sanitize_text_field($_POST['TotalSoftCal4_03']); $TotalSoftCal4_04 = sanitize_text_field($_POST['TotalSoftCal4_04']); $TotalSoftCal4_10 = sanitize_text_field($_POST['TotalSoftCal4_10']); $TotalSoftCal4_15 = sanitize_text_field($_POST['TotalSoftCal4_15']); $TotalSoftCal4_26 = sanitize_text_field($_POST['TotalSoftCal4_26']); $TotalSoftCal4_28 = sanitize_text_field($_POST['TotalSoftCal4_28']); $TotalSoftCal4_33 = sanitize_text_field($_POST['TotalSoftCal4_33']); $TotalSoftCal_4_03 = sanitize_text_field($_POST['TotalSoftCal_4_03']); $TotalSoftCal_4_05 = sanitize_text_field($_POST['TotalSoftCal_4_05']); $TotalSoftCal_4_10 = sanitize_text_field($_POST['TotalSoftCal_4_10']); $TotalSoftCal_4_15 = sanitize_text_field($_POST['TotalSoftCal_4_15']); $TotalSoftCal_4_16 = sanitize_text_field($_POST['TotalSoftCal_4_16']); $TotalSoftCal_4_20 = sanitize_text_field($_POST['TotalSoftCal_4_20']); $TotalSoftCal_4_25 = sanitize_text_field($_POST['TotalSoftCal_4_25']); $TotalSoftCal_4_28 = sanitize_text_field($_POST['TotalSoftCal_4_28']);

		 	if(isset($_POST['Total_Soft_Cal_Update']))
			{
				$Total_SoftCal_Update=sanitize_text_field($_POST['Total_SoftCal_Update']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name4 set TotalSoftCal_Name=%s, TotalSoftCal_Type=%s WHERE id=%d", $TotalSoftCal_Name, $TotalSoftCal_Type, $Total_SoftCal_Update));
				if($TotalSoftCal_Type=='Event Calendar')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name1 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_BSCol = %s, TotalSoftCal_MW = %s, TotalSoftCal_HFS = %s,  TotalSoftCal_WFS = %s, TotalSoftCal_DFS = %s, TotalSoftCal_TFS = %s, TotalSoftCal_WDStart = %s, TotalSoftCal_RefIcCol = %s, TotalSoftCal_RefIcSize = %s, TotalSoftCal_ArrowSize = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal_BSCol, $TotalSoftCal_MW, $TotalSoftCal_HFS, $TotalSoftCal_WFS, $TotalSoftCal_DFS, $TotalSoftCal_TFS, $TotalSoftCal_WDStart, $TotalSoftCal_RefIcCol, $TotalSoftCal_RefIcSize, $TotalSoftCal_ArrowSize, $Total_SoftCal_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_01 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal1_Ev_T_FS, $Total_SoftCal_Update));
				}
				else if($TotalSoftCal_Type=='Simple Calendar')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name5 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal2_WDStart = %s, TotalSoftCal2_W = %s, TotalSoftCal2_H = %s, TotalSoftCal2_BxShShow = %s, TotalSoftCal2_MFS = %s, TotalSoftCal2_WFS = %s, TotalSoftCal2_DFS = %s, TotalSoftCal2_TdFS = %s, TotalSoftCal2_EdFS = %s, TotalSoftCal2_ArrFS = %s, TotalSoftCal2_OmFS = %s, TotalSoftCal2_Ev_HFS = %s, TotalSoftCal2_Ev_HText = %s, TotalSoftCal2_Ev_TFS = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal2_WDStart, $TotalSoftCal2_W, $TotalSoftCal2_H, $TotalSoftCal2_BxShShow, $TotalSoftCal2_MFS, $TotalSoftCal2_WFS, $TotalSoftCal2_DFS, $TotalSoftCal2_TdFS, $TotalSoftCal2_EdFS, $TotalSoftCal2_ArrFS, $TotalSoftCal2_OmFS, $TotalSoftCal2_Ev_HFS, $TotalSoftCal2_Ev_HText, $TotalSoftCal2_Ev_TFS, $Total_SoftCal_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_01 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal2_Ev_T_TA, $Total_SoftCal_Update));
				}
				else if($TotalSoftCal_Type=='Flexible Calendar')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name7 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal3_MW = %s, TotalSoftCal3_WDStart = %s, TotalSoftCal3_BoxShShow = %s, TotalSoftCal3_H_MFS = %s, TotalSoftCal3_H_YFS = %s, TotalSoftCal3_Arr_S = %s, TotalSoftCal3_WD_FS = %s, TotalSoftCal3_Ev_FS = %s,  TotalSoftCal3_Ev_C_FS = %s, TotalSoftCal3_Ev_T_FS = %s, TotalSoftCal3_Ev_I_W = %s, TotalSoftCal3_Ev_L_Text = %s, TotalSoftCal3_Ev_L_FS = %s, TotalSoftCal3_Ev_L_BR = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal3_MW, $TotalSoftCal3_WDStart, $TotalSoftCal3_BoxShShow, $TotalSoftCal3_H_MFS, $TotalSoftCal3_H_YFS, $TotalSoftCal3_Arr_S, $TotalSoftCal3_WD_FS, $TotalSoftCal3_Ev_FS, $TotalSoftCal3_Ev_C_FS, $TotalSoftCal3_Ev_T_FS, $TotalSoftCal3_Ev_I_W, $TotalSoftCal3_Ev_L_Text, $TotalSoftCal3_Ev_L_FS, $TotalSoftCal3_Ev_L_BR, $Total_SoftCal_Update));
				}
				else if($TotalSoftCal_Type=='TimeLine Calendar')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name9 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal4_01 = %s, TotalSoftCal4_03 = %s, TotalSoftCal4_04 = %s, TotalSoftCal4_10 = %s, TotalSoftCal4_15 = %s, TotalSoftCal4_26 = %s, TotalSoftCal4_28 = %s, TotalSoftCal4_33 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal4_01, $TotalSoftCal4_03, $TotalSoftCal4_04, $TotalSoftCal4_10, $TotalSoftCal4_15, $TotalSoftCal4_26, $TotalSoftCal4_28, $TotalSoftCal4_33, $Total_SoftCal_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name8 set TotalSoftCal_Name = %s, TotalSoftCal_Type = %s, TotalSoftCal_03 = %s, TotalSoftCal_05 = %s, TotalSoftCal_10 = %s, TotalSoftCal_15 = %s, TotalSoftCal_16 = %s, TotalSoftCal_20 = %s, TotalSoftCal_25 = %s, TotalSoftCal_28 = %s WHERE TotalSoftCal_ID = %s", $TotalSoftCal_Name, $TotalSoftCal_Type, $TotalSoftCal_4_03, $TotalSoftCal_4_05, $TotalSoftCal_4_10, $TotalSoftCal_4_15, $TotalSoftCal_4_16, $TotalSoftCal_4_20, $TotalSoftCal_4_25, $TotalSoftCal_4_28, $Total_SoftCal_Update));				
				}
			}
		}			
	    else
	    {
	        wp_die('Security check fail'); 
	    }
	}

	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	$TotalSoftCalCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d",0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" oninput="TotalSoft_Cal_Out()">
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'TS_CalEv_Nonce' );?>	
	<div class="Total_Soft_Cal_AMD">
		<a href="http://total-soft.pe.hu/calendar-event/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i><span style="margin-left:5px;">Get The Full Version</span></div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/calendar-event/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Cal_AMD1"></div>
		<div class="Total_Soft_Cal_AMD2">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Click for Creating New Calendar', 'Total-Soft-Calendar' );?>"></i>
			<input type="button" name="" value="<?php echo __( 'New Calendar', 'Total-Soft-Calendar' );?> (Pro)" class="Total_Soft_Cal_AMD2_But" onclick="Total_Soft_Cal_AMD2_But1()">
		</div>
		<div class="Total_Soft_Cal_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Click for Canceling', 'Total-Soft-Calendar' );?>"></i>
			<input type="button" value="<?php echo __( 'Cancel', 'Total-Soft-Calendar' );?>" class="Total_Soft_Cal_AMD2_But" onclick='TotalSoft_Reload()'>
			<i class="Total_Soft_Cal_Update Total_Soft_Help totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Click for Updating Settings', 'Total-Soft-Calendar' );?>"></i>
			<input type="submit" name="Total_Soft_Cal_Update" value="<?php echo __( 'Update', 'Total-Soft-Calendar' );?>" class="Total_Soft_Cal_Update Total_Soft_Cal_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftCal_Update" id="Total_SoftCal_Update">
		</div>
	</div>

	<table class="Total_Soft_AMMTable">
		<tr class="Total_Soft_AMMTableFR">
			<td><?php echo __( 'No', 'Total-Soft-Calendar' );?></td>
			<td><?php echo __( 'Calendar Name', 'Total-Soft-Calendar' );?></td>
			<td><?php echo __( 'Events Quantity', 'Total-Soft-Calendar' );?></td>
			<td><?php echo __( 'Actions', 'Total-Soft-Calendar' );?></td>
		</tr>
	</table>

	<table class="Total_Soft_AMOTable">
	 	<?php for($i=0;$i<count($TotalSoftCalCount);$i++){
	 		$TotalSoft_Cal_Ev=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE TotalSoftCal_EvCal=%d", $TotalSoftCalCount[$i]->id));
	 		?> 
	 		<tr id="Total_Soft_AMOTable_Calendar_tr_<?php echo $TotalSoftCalCount[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftCalCount[$i]->TotalSoftCal_Name;?></td>
				<td><?php echo count($TotalSoft_Cal_Ev);?></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftCal_Clone(<?php echo $TotalSoftCalCount[$i]->id;?>)"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftCal_Edit(<?php echo $TotalSoftCalCount[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftCal_Del(<?php echo $TotalSoftCalCount[$i]->id;?>)"></i>
					<span class="Total_Soft_Calendar_Del_Span">
						<i class="Total_Soft_Calendar_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Cal_AMD2_But1()"></i>
						<i class="Total_Soft_Calendar_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftCalendar_Del_No(<?php echo $TotalSoftCalCount[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
	 	<?php }?>
	</table>
	<div style="width: 99%;">
		<table class="Total_Soft_AMShortTable">
			<tr style="text-align:center">
				<td><?php echo __( 'Shortcode', 'Total-Soft-Calendar' );?></td>
				<td><?php echo __( 'Template Include', 'Total-Soft-Calendar' );?></td>
			</tr>
			<tr style="text-align:center">
				<td><?php echo __( 'Copy &amp; paste the shortcode directly into any WordPress post or page.', 'Total-Soft-Calendar' );?></td>
				<td><?php echo __( 'Copy &amp; paste this code into a template file to include the calendar within your theme.', 'Total-Soft-Calendar' );?></td>
			</tr>
			<tr style="text-align:center">
				<td class="Total_Soft_Cal_ID"></td>
				<td class="Total_Soft_Cal_TID"></td>
			</tr>
		</table>
	</div>

	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTable_Main">
		<tr>
			<td><?php echo __( 'Calendar Name', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar name, in which, the events should be placed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_Name" id="TotalSoftCal_Name" class="Total_Soft_Select" required placeholder=" * <?php echo __( 'Required', 'Total-Soft-Calendar' );?>"></td>
			<td><?php echo __( 'Calendar Type', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar type, in which, the events should be placed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_Type" id="TotalSoftCal_Type">
					<option value="Event Calendar">    <?php echo __( 'Event Calendar', 'Total-Soft-Calendar' );?>    </option>
					<option value="Simple Calendar">   <?php echo __( 'Simple Calendar', 'Total-Soft-Calendar' );?>   </option>
					<option value="Flexible Calendar"> <?php echo __( 'Flexible Calendar', 'Total-Soft-Calendar' );?> </option>
					<option value="TimeLine Calendar"> <?php echo __( 'TimeLine Calendar', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTables Total_Soft_AMSetTable_1">
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_WDStart" id="TotalSoftCal_WDStart">
					<option value="Sun"><?php echo __( 'Sunday', 'Total-Soft-Calendar' );?></option>
					<option value="Mon"><?php echo __( 'Monday', 'Total-Soft-Calendar' );?></option>
				</select>
			</td>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose main background color in calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_BgCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Grid Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select grid color which divide the days in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_GrCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Grid Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the grid width, you can choose it corresponding  to your calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>			
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal_GW" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_GW_Output" for="TotalSoftCal_GW"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal_BW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_BW_Output" for="TotalSoftCal_BW"></output>
			</td>
			<td><?php echo __( 'Border Style', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_BStyle">
					<option value="none">   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid">  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed"> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted"> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_BCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Box Shadow Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select shadow color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_BSCol" id="TotalSoftCal_BSCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Max Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_MW" id="TotalSoftCal_MW" min="150" max="1000" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_MW_Output" for="TotalSoftCal_MW"></output>
			</td>
			<td><?php echo __( 'Numbers Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Mention, the days in calendar must be from right or from left.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_NumPos">
					<option value="left">  <?php echo __( 'Left', 'Total-Soft-Calendar' );?>  </option>
					<option value="right"> <?php echo __( 'Right', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_HBgCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a text color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_HCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_HFS" id="TotalSoftCal_HFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_HFS_Output" for="TotalSoftCal_HFS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_HFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Weekday Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_WBgCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_WCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?> "></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_WFS" id="TotalSoftCal_WFS" min="8" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_WFS_Output" for="TotalSoftCal_WFS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_WFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Weekday', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the weeks and days dividing line width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal_LAW" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_LAW_Output" for="TotalSoftCal_LAW"></output>
			</td>
			<td><?php echo __( 'Style', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Indicate the dividing line style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_LAWS">
					<option value="none">   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid">  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed"> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted"> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_LAWC" class="Total_Soft_Cal_Color" value=""></td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_DBgCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_DCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_DFS" id="TotalSoftCal_DFS" min="8" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_DFS_Output" for="TotalSoftCal_DFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Todays Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_TBgCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_TCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size of the numbers by pixels.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_TFS" id="TotalSoftCal_TFS" min="8" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_TFS_Output" for="TotalSoftCal_TFS"></output>
			</td>
			<td><?php echo __( "Number's Background Color", 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background color of the day, it is designed for the frame.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_TNBgCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Hover Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_HovBgCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_HovCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Refresh Icon Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a color for updating icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="TotalSoftCal_RefIcCol" id="TotalSoftCal_RefIcCol" class="Total_Soft_Cal_Color" value=""></td>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a size for updating icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_RefIcSize" id="TotalSoftCal_RefIcSize" min="8" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_RefIcSize_Output" for="TotalSoftCal_RefIcSize"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Arrows Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Choose Icon', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the right and the left icons, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_ArrowType">
					<option value="1">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value="2">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value="3">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value="4">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value="5">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value="6">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value="7">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value="8">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value="9">  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value="10"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value="11"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td><input type="text" name="" id="TotalSoftCal_ArrowCol" class="Total_Soft_Cal_Color" value=""></td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_ArrowSize" id="TotalSoftCal_ArrowSize" min="8" max="25" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_ArrowSize_Output" for="TotalSoftCal_ArrowSize"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Title Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal1_Ev_T_FS" id="TotalSoftCal1_Ev_T_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal1_Ev_T_FS_Output" for="TotalSoftCal1_Ev_T_FS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal1_Ev_T_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal1_Ev_T_C" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Text Align', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal1_Ev_T_TA">
					<option value='left'>   <?php echo __( 'Left', 'Total-Soft-Calendar' );?>   </option>
					<option value='right'>  <?php echo __( 'Right', 'Total-Soft-Calendar' );?>  </option>
					<option value='center'> <?php echo __( 'Center', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Time Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal1_Ev_TiF">
					<option value='24'> <?php echo __( '24 hours', 'Total-Soft-Calendar' );?> </option>
					<option value='12'> <?php echo __( '12 hours', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Image/Video Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="" id="TotalSoftCal1_Ev_I_W" min="30" max="98" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal1_Ev_I_W_Output" for="TotalSoftCal1_Ev_I_W"></output>
			</td>
			<td><?php echo __( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal1_Ev_I_Pos">
					<option value='before'> <?php echo __( 'After Title', 'Total-Soft-Calendar' );?>       </option>
					<option value='after'>  <?php echo __( 'After Description', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTables Total_Soft_AMSetTable_2">
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_WDStart" id="TotalSoftCal2_WDStart">
					<option value="0"> <?php echo __( 'Sunday', 'Total-Soft-Calendar' );?> </option>
					<option value="1"> <?php echo __( 'Monday', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the main border width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal2_BW" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_BW_Output" for="TotalSoftCal2_BW"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Style', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Specify the border style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_BS">
					<option value="none">   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid">  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed"> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted"> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main border color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_BC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_W" id="TotalSoftCal2_W" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_W_Output" for="TotalSoftCal2_W"></output>
			</td>
			<td><?php echo __( 'Height', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Define the calendar height.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_H" id="TotalSoftCal2_H" min="300" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_H_Output" for="TotalSoftCal2_H"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Box Shadow', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose to show the boxshadow or no.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_BxShShow" id="TotalSoftCal2_BxShShow">
					<option value="Yes"> <?php echo __( 'Yes', 'Total-Soft-Calendar' );?> </option>
					<option value="No">  <?php echo __( 'No', 'Total-Soft-Calendar' );?>  </option>
				</select>
			</td>
			<td><?php echo __( 'Shadow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_BxShType">
					<option value="1"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
					<option value="2"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Shadow', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the shadow size for the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal2_BxSh" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_BxSh_Output" for="TotalSoftCal2_BxSh"></output>
			</td>
			<td><?php echo __( 'Shadow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select shadow color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_BxShC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Calendar Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_MBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a text color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_MC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_MFS" id="TotalSoftCal2_MFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_MFS_Output" for="TotalSoftCal2_MFS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_MFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'WeekDay Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_WBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_WC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_WFS" id="TotalSoftCal2_WFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_WFS_Output" for="TotalSoftCal2_WFS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_WFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After WeekDay', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the weeks and days dividing line width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal2_LAW_W" min="0" max="3" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_LAW_W_Output" for="TotalSoftCal2_LAW_W"></output>
			</td>
			<td><?php echo __( 'Style', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Indicate the dividing line style: None, Solid, Dashed and Dotted.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_LAW_S">
					<option value="none">   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value="solid">  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value="dashed"> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
					<option value="dotted"> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_LAW_C" class="Total_Soft_Cal_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_DBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_DC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_DFS" id="TotalSoftCal2_DFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_DFS_Output" for="TotalSoftCal2_DFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Todays Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the background color of the current day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_TdBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the current date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_TdC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size of the numbers by pixels.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_TdFS" id="TotalSoftCal2_TdFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_TdFS_Output" for="TotalSoftCal2_TdFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background for event days.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_EdBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_EdC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the size of the numbers, it is fully responsive.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_EdFS" id="TotalSoftCal2_EdFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_EdFS_Output" for="TotalSoftCal2_EdFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Hover Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_HBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_HC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Arrows Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the right and the left icons for calendar, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_ArrType">
					<option value='angle-double'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='angle'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='arrow-circle'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='arrow-circle-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='arrow'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='caret'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='caret-square-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='chevron-circle'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='chevron'>        <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='hand-o'>         <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='long-arrow'>     <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_ArrFS" id="TotalSoftCal2_ArrFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_ArrFS_Output" for="TotalSoftCal2_ArrFS"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_ArrC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Other Months Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background color for the other months days on the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_OmBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the text color of the other months days.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_OmC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the size for the other months days on the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_OmFS" id="TotalSoftCal2_OmFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_OmFS_Output" for="TotalSoftCal2_OmFS"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the background color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_Ev_HBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the text color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_Ev_HC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text size by pixel.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_Ev_HFS" id="TotalSoftCal2_Ev_HFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_Ev_HFS_Output" for="TotalSoftCal2_Ev_HFS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_Ev_HFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Text', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'You can write events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" class="Total_Soft_Select" name="TotalSoftCal2_Ev_HText" id="TotalSoftCal2_Ev_HText" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Body Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_Ev_BBgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Title Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal2_Ev_TC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_Ev_TFF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal2_Ev_TFS" id="TotalSoftCal2_Ev_TFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_Ev_TFS_Output" for="TotalSoftCal2_Ev_TFS"></output>
			</td>
			<td><?php echo __( 'Text Align', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal2_Ev_T_TA" id="TotalSoftCal2_Ev_T_TA">
					<option value='left'>   <?php echo __( 'Left', 'Total-Soft-Calendar' );?>   </option>
					<option value='right'>  <?php echo __( 'Right', 'Total-Soft-Calendar' );?>  </option>
					<option value='center'> <?php echo __( 'Center', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Time Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_Ev_TiF">
					<option value='24'> <?php echo __( '24 hours', 'Total-Soft-Calendar' );?> </option>
					<option value='12'> <?php echo __( '12 hours', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Image/Video Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="" id="TotalSoftCal2_Ev_I_W" min="30" max="98" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal2_Ev_I_W_Output" for="TotalSoftCal2_Ev_I_W"></output>
			</td>
			<td><?php echo __( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal2_Ev_I_Pos">
					<option value='before'> <?php echo __( 'After Title', 'Total-Soft-Calendar' );?>       </option>
					<option value='after'>  <?php echo __( 'After Description', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTables Total_Soft_AMSetTable_3">
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Possibility define the calendar width', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_MW" id="TotalSoftCal3_MW" min="150" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_MW_Output" for="TotalSoftCal3_MW"></output>
			</td>
			<td><?php echo __( 'WeekDay Start', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select that day in the calendar, which must be the first in the week.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal3_WDStart" id="TotalSoftCal3_WDStart">
					<option value="0"> <?php echo __( 'Sunday', 'Total-Soft-Calendar' );?> </option>
					<option value="1"> <?php echo __( 'Monday', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Can choose main background color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Grid Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select grid color which divide the days in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_GrC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Body Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the body border color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_BBC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Box Shadow', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose to show the boxshadow or no.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal3_BoxShShow" id="TotalSoftCal3_BoxShShow">
					<option value="Yes"> <?php echo __( 'Yes', 'Total-Soft-Calendar' );?> </option>
					<option value="No">  <?php echo __( 'No', 'Total-Soft-Calendar' );?>  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Shadow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the shadow type.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_BoxShType">
					<option value="1"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
					<option value="2"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
				</select>
			</td>
			<td><?php echo __( 'Shadow', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the shadow size for the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_BoxSh" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_BoxSh_Output" for="TotalSoftCal3_BoxSh"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Shadow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select shadow color, which allows to show the shadow color of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_BoxShC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a background color, where can be seen the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_H_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Border-Top Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main top border width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_H_BTW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_H_BTW_Output" for="TotalSoftCal3_H_BTW"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border-Top Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main top border color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_H_BTC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font family of the year and month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_H_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Month Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font size of the month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_H_MFS" id="TotalSoftCal3_H_MFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_H_MFS_Output" for="TotalSoftCal3_H_MFS"></output>
			</td>
			<td><?php echo __( 'Month Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the month.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_H_MC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Year Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the calendar font size of the year.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_H_YFS" id="TotalSoftCal3_H_YFS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_H_YFS_Output" for="TotalSoftCal3_H_YFS"></output>
			</td>
			<td><?php echo __( 'Year Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the year.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_H_YC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose position for the month and year.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_H_Format">
					<option value="1"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
					<option value="2"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
					<option value="3"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3 </option>
					<option value="4"> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4 </option>
				</select>
			</td>		
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Arrows Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the right and the left icons for calendar, which are for change the months by sequence.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Arr_Type">
					<option value='angle-double'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='angle'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='arrow-circle'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='arrow-circle-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='arrow'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='caret'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='caret-square-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='chevron-circle'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='chevron'>        <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='hand-o'>         <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='long-arrow'>     <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a color of the icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Arr_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_Arr_S" id="TotalSoftCal3_Arr_S" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Arr_S_Output" for="TotalSoftCal3_Arr_S"></output>
			</td>
			<td><?php echo __( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select a hover color of the icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Arr_HC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Header', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the header line width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_LAH_W" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_LAH_W_Output" for="TotalSoftCal3_LAH_W"></output>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_LAH_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'WeekDay Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_WD_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the calendar text color for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_WD_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the calendar text size for the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_WD_FS" id="TotalSoftCal3_WD_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_WD_FS_Output" for="TotalSoftCal3_WD_FS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family of the weekdays.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_WD_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the background color for days of the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_D_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the color of the numbers.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_D_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Todays Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Note the background color of the current day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_TD_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the current date color, that will be displayed.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_TD_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Hover Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the background color of the hover option, without clicking you can change the background color of the day.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_HD_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( "Determine the color of the hover's letters.", 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_HD_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Days Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the event color for days.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_ED_C" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the event hover color for days.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_ED_HC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose date format.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_Format">
					<option value='1'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1 </option>
					<option value='2'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2 </option>
					<option value='3'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3 </option>
				</select>
			</td>
			<td><?php echo __( 'Border-Top Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main top border width for the event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_Ev_BTW" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_BTW_Output" for="TotalSoftCal3_Ev_BTW"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border-Top Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the main top border color for the event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_BTC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the background color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the text color of event part header, where can be seen the events main title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_C" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font size for event in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_Ev_FS" id="TotalSoftCal3_Ev_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_FS_Output" for="TotalSoftCal3_Ev_FS"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family for event in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Close Icon Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the close icons for calendar, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_C_Type">
					<option value='times-circle-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='times-circle'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='times'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
				</select>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a color for close icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_C_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a hover color for close icon, which has intended to return to the calendar from the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_C_HC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the size for icon.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_Ev_C_FS" id="TotalSoftCal3_Ev_C_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_C_FS_Output" for="TotalSoftCal3_Ev_C_FS"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Header', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the line width for the events.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_Ev_LAH_W" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_LAH_W_Output" for="TotalSoftCal3_Ev_LAH_W"></output>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_LAH_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Body Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Can choose main background color.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_B_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the body border color in the event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_B_BC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Title Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font size of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_Ev_T_FS" id="TotalSoftCal3_Ev_T_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_T_FS_Output" for="TotalSoftCal3_Ev_T_FS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family for the title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_T_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose a background color for events title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_T_BgC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color for the event title in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_T_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Text Align', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Left, Right & Center - Determine the alignment of the event title.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_T_TA">
					<option value='left'>   <?php echo __( 'Left', 'Total-Soft-Calendar' );?>   </option>
					<option value='right'>  <?php echo __( 'Right', 'Total-Soft-Calendar' );?>  </option>
					<option value='center'> <?php echo __( 'Center', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td><?php echo __( 'Time Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose time format for the event in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_TiF">
					<option value='24'> <?php echo __( '24 hours', 'Total-Soft-Calendar' );?> </option>
					<option value='12'> <?php echo __( '12 hours', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Image/Video Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Select the width for Video (YouTube and Vimeo) or Image, you can choose it corresponding to your calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="TotalSoftCal3_Ev_I_W" id="TotalSoftCal3_Ev_I_W" min="30" max="98" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_I_W_Output" for="TotalSoftCal3_Ev_I_W"></output>
			</td>
			<td><?php echo __( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose position for the Video and Image in event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_I_Pos">
					<option value='1'> <?php echo __( 'Before Title', 'Total-Soft-Calendar' );?>      </option>
					<option value='2'> <?php echo __( 'After Title', 'Total-Soft-Calendar' );?>       </option>
					<option value='3'> <?php echo __( 'After Description', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Link Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color for the event link in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_L_C" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the hover color for the event link in the calendar.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_L_HC" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose position for the link in event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_L_Pos">
					<option value='1'> <?php echo __( 'Before Title', 'Total-Soft-Calendar' );?>      </option>
					<option value='2'> <?php echo __( 'After Title', 'Total-Soft-Calendar' );?>       </option>
					<option value='3'> <?php echo __( 'After Title Text', 'Total-Soft-Calendar' );?>  </option>
					<option value='4'> <?php echo __( 'After Description', 'Total-Soft-Calendar' );?> </option>
					<option value='5'> <?php echo __( 'After Description Text', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td><?php echo __( 'Text', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'You can write link text.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal3_Ev_L_Text" id="TotalSoftCal3_Ev_L_Text" class="Total_Soft_Select" placeholder="<?php echo __( 'Link Text', 'Total-Soft-Calendar' );?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the text font size for the link button of the event.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_Ev_L_FS" id="TotalSoftCal3_Ev_L_FS" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_L_FS_Output" for="TotalSoftCal3_Ev_L_FS"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the font family for the link button.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal3_Ev_L_FF">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the border color, which is designed for Link button.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_L_BC" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Set the border width for the link buttons.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_Ev_L_BW" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_L_BW_Output" for="TotalSoftCal3_Ev_L_BW"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Radius', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Install the border radius for event link. ', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal3_Ev_L_BR" id="TotalSoftCal3_Ev_L_BR" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_L_BR_Output" for="TotalSoftCal3_Ev_L_BR"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Each Event', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Determine the line width.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal3_Ev_LAE_W" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal3_Ev_LAE_W_Output" for="TotalSoftCal3_Ev_LAE_W"></output>
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( 'Choose the color according to your preference.', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal3_Ev_LAE_C" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
	</table>	
	<table class="Total_Soft_AMSetTable Total_Soft_AMSetTables Total_Soft_AMSetTable_4">
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Max-Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal4_01" id="TotalSoftCal4_01" min="0" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_01_Output" for="TotalSoftCal4_01"></output>
			</td>
			<td><?php echo __( 'Box Shadow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_02">
					<option value='none'>   <?php echo __( 'None', 'Total-Soft-Calendar' );?>    </option>
					<option value='type1'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='type2'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='type3'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='type4'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='type5'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='type6'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='type7'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='type8'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='type9'>  <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='type10'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='type11'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
					<option value='type12'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 12 </option>
					<option value='type13'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 13 </option>
					<option value='type14'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 14 </option>
					<option value='type15'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 15 </option>
					<option value='type16'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 16 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Box Shadow Color', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal4_03" id="TotalSoftCal4_03" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Border Type', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal4_04" id="TotalSoftCal4_04">
					<option value='none'>   <?php echo __( 'None', 'Total-Soft-Calendar' );?>   </option>
					<option value='solid'>  <?php echo __( 'Solid', 'Total-Soft-Calendar' );?>  </option>
					<option value='dotted'> <?php echo __( 'Dotted', 'Total-Soft-Calendar' );?> </option>
					<option value='dashed'> <?php echo __( 'Dashed', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal4_05" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_05_Output" for="TotalSoftCal4_05"></output>
			</td>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_06" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Header Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_07">
					<option value='transparent'> <?php echo __( 'Transparent', 'Total-Soft-Calendar' );?> </option>
					<option value='color'>       <?php echo __( 'Color', 'Total-Soft-Calendar' );?>       </option>
					<option value='gradient1'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='gradient2'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='gradient3'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='gradient4'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='gradient5'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='gradient6'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='gradient7'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='gradient8'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='gradient9'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='gradient10'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='gradient11'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 11 </option>
					<option value='gradient12'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 12 </option>
					<option value='gradient13'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 13 </option>
				</select>
			</td>
			<td><?php echo __( 'Background Color 1', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_08" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Background Color 2', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_09" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal4_10" id="TotalSoftCal4_10" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_10_Output" for="TotalSoftCal4_10"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_11">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td><?php echo __( 'Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_12">
					<option value='format1'> <?php echo __( 'Format', 'Total-Soft-Calendar' );?> 1 </option>
					<option value='format2'> <?php echo __( 'Format', 'Total-Soft-Calendar' );?> 2 </option>
					<option value='format3'> <?php echo __( 'Format', 'Total-Soft-Calendar' );?> 3 </option>
					<option value='format4'> <?php echo __( 'Format', 'Total-Soft-Calendar' );?> 4 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Year Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_13" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Arrow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_14">
					<option value='angle-double'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='angle'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='arrow-circle'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='arrow-circle-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='arrow'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='caret'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='caret-square-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='chevron-circle'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='chevron'>        <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='hand-o'>         <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='long-arrow'>     <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Arrow Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal4_15" id="TotalSoftCal4_15" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_15_Output" for="TotalSoftCal4_15"></output>
			</td>
			<td><?php echo __( 'Arrow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_16" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Arrow Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_17" class="Total_Soft_Cal_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Month Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_18" class="Total_Soft_Cal_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Header', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_19" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="" id="TotalSoftCal4_20" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_20_Output" for="TotalSoftCal4_20"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Height', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal4_21" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_21_Output" for="TotalSoftCal4_21"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Bar Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_22">
					<option value='transparent'> <?php echo __( 'Transparent', 'Total-Soft-Calendar' );?> </option>
					<option value='color'>       <?php echo __( 'Color', 'Total-Soft-Calendar' );?>       </option>
					<option value='gradient1'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='gradient2'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='gradient3'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='gradient4'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='gradient5'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='gradient6'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='gradient7'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='gradient8'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='gradient9'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='gradient10'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='gradient11'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 11 </option>
					<option value='gradient12'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 12 </option>
					<option value='gradient13'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 13 </option>
				</select>
			</td>
			<td><?php echo __( 'Background Color 1', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_23" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Background Color 2', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_24" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Grid Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_25" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Number Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal4_26" id="TotalSoftCal4_26" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_26_Output" for="TotalSoftCal4_26"></output>
			</td>
			<td><?php echo __( 'Number Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_27" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Month Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal4_28" id="TotalSoftCal4_28" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_28_Output" for="TotalSoftCal4_28"></output>
			</td>
			<td><?php echo __( 'Month Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_29" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Selected Number Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_30" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Selected Month Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_31" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Arrow Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_32">
					<option value='angle-double'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='angle'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='arrow-circle'>   <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='arrow-circle-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='arrow'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='caret'>          <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='caret-square-o'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='chevron-circle'> <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='chevron'>        <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='hand-o'>         <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='long-arrow'>     <?php echo __( 'Type', 'Total-Soft-Calendar' );?> 11 </option>
				</select>
			</td>
			<td><?php echo __( 'Arrow Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal4_33" id="TotalSoftCal4_33" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_33_Output" for="TotalSoftCal4_33"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Arrow Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_34" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Arrow Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_35" class="Total_Soft_Cal_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Bar', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal4_36" class="Total_Soft_Cal_Color" value="">
			</td>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="" id="TotalSoftCal4_37" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_37_Output" for="TotalSoftCal4_37"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Height', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal4_38" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal4_38_Output" for="TotalSoftCal4_38"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Part', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'General Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Background Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal4_39">
					<option value='transparent'> <?php echo __( 'Transparent', 'Total-Soft-Calendar' );?> </option>
					<option value='color'>       <?php echo __( 'Color', 'Total-Soft-Calendar' );?>       </option>
					<option value='gradient1'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 1  </option>
					<option value='gradient2'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 2  </option>
					<option value='gradient3'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 3  </option>
					<option value='gradient4'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 4  </option>
					<option value='gradient5'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 5  </option>
					<option value='gradient6'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 6  </option>
					<option value='gradient7'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 7  </option>
					<option value='gradient8'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 8  </option>
					<option value='gradient9'>   <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 9  </option>
					<option value='gradient10'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 10 </option>
					<option value='gradient11'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 11 </option>
					<option value='gradient12'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 12 </option>
					<option value='gradient13'>  <?php echo __( 'Gradient', 'Total-Soft-Calendar' );?> 13 </option>
				</select>
			</td>
			<td><?php echo __( 'Background Color 1', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_01" class="Total_Soft_Cal_Color1" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Background Color 2', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_02" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Data Format', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftCal_4_03" id="TotalSoftCal_4_03">
					<option value="yy-mm-dd">  yy-mm-dd  </option>
					<option value="yy MM dd">  yy MM dd  </option>
					<option value="dd-mm-yy">  dd-mm-yy  </option>
					<option value="dd MM yy">  dd MM yy  </option>
					<option value="mm-dd-yy">  mm-dd-yy  </option>
					<option value="MM dd, yy"> MM dd, yy </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Time Format', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_04">
					<option value='24'> 24 <?php echo __( 'Hours', 'Total-Soft-Calendar' );?> </option>
					<option value='12'> 12 <?php echo __( 'Hours', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Event Title', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_4_05" id="TotalSoftCal_4_05" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_05_Output" for="TotalSoftCal_4_05"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_06">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Background Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_07" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_08" class="Total_Soft_Cal_Color1" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Text Align', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_09">
					<option value='left'>   <?php echo __( 'Left', 'Total-Soft-Calendar' );?>   </option>
					<option value='right'>  <?php echo __( 'Right', 'Total-Soft-Calendar' );?>  </option>
					<option value='center'> <?php echo __( 'Center', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Image/Video Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="TotalSoftCal_4_10" id="TotalSoftCal_4_10" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_10_Output" for="TotalSoftCal_4_10"></output>
			</td>
			<td><?php echo __( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_11">
					<option value='1'> <?php echo __( 'Before Title', 'Total-Soft-Calendar' );?>      </option>
					<option value='2'> <?php echo __( 'After Title', 'Total-Soft-Calendar' );?>       </option>
					<option value='3'> <?php echo __( 'After Description', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Link Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_12" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Hover Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_13" class="Total_Soft_Cal_Color1" value="">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Position', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_14">
					<option value='1'> <?php echo __( 'Before Title', 'Total-Soft-Calendar' );?>           </option>
					<option value='2'> <?php echo __( 'After Title', 'Total-Soft-Calendar' );?>            </option>
					<option value='3'> <?php echo __( 'After Title Text', 'Total-Soft-Calendar' );?>       </option>
					<option value='4'> <?php echo __( 'After Description', 'Total-Soft-Calendar' );?>      </option>
					<option value='5'> <?php echo __( 'After Description Text', 'Total-Soft-Calendar' );?> </option>
				</select>
			</td>
			<td><?php echo __( 'Text', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="TotalSoftCal_4_15" id="TotalSoftCal_4_15" class="Total_Soft_Select" placeholder="<?php echo __( 'Link Text', 'Total-Soft-Calendar' );?>">
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_4_16" id="TotalSoftCal_4_16" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_16_Output" for="TotalSoftCal_4_16"></output>
			</td>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_17">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_18" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Border Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal_4_19" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_19_Output" for="TotalSoftCal_4_19"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Border Radius', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_4_20" id="TotalSoftCal_4_20" min="0" max="30" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_20_Output" for="TotalSoftCal_4_20"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Line After Each Event', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_21" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Width', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangeper" name="" id="TotalSoftCal_4_22" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_22_Output" for="TotalSoftCal_4_22"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Height', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="" id="TotalSoftCal_4_23" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_23_Output" for="TotalSoftCal_4_23"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4"><?php echo __( 'Date & Time Options', 'Total-Soft-Calendar' );?></td>			
		</tr>
		<tr>
			<td><?php echo __( 'Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_24" class="Total_Soft_Cal_Color1" value="">
			</td>
			<td><?php echo __( 'Font Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_4_25" id="TotalSoftCal_4_25" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_25_Output" for="TotalSoftCal_4_25"></output>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Font Family', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_26">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td><?php echo __( 'Icon Type', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoftCal_4_27">
					<option value="calendar">         Calendar         </option>
					<option value="calendar-o">       Calendar O       </option>
					<option value="calendar-plus-o">  Calendar Plus O  </option>
					<option value="calendar-check-o"> Calendar Check O </option>
					<option value="calendar-minus-o"> Calendar Minus O </option>
					<option value="calendar-times-o"> Calendar Times O </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Icon Size', 'Total-Soft-Calendar' );?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="range" class="TotalSoft_Cal_Range TotalSoft_Cal_Rangepx" name="TotalSoftCal_4_28" id="TotalSoftCal_4_28" min="8" max="72" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoftCal_4_28_Output" for="TotalSoftCal_4_28"></output>
			</td>
			<td><?php echo __( 'Icon Color', 'Total-Soft-Calendar' );?> <span class="TS_Free_version_Span"> (Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="<?php echo __( '', 'Total-Soft-Calendar' );?>"></i></td>
			<td>
				<input type="text" name="" id="TotalSoftCal_4_29" class="Total_Soft_Cal_Color1" value="">
			</td>
		</tr>
	</table>
</form>