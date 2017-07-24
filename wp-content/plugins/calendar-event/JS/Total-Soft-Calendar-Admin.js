function TotalSoft_Cal_Out()
{
	jQuery('.TotalSoft_Cal_Range').each(function(){
		if(jQuery(this).hasClass('TotalSoft_Cal_Rangeper'))
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'%');
		}
		else if(jQuery(this).hasClass('TotalSoft_Cal_Rangepx'))
		{
			
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'px');
		}
		else if(jQuery(this).hasClass('TotalSoft_Cal_RangeSec'))
		{
			
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val()+'s');
		}
		else
		{
			jQuery('#'+jQuery(this).attr('id')+'_Output').html(jQuery(this).val());
		}
	})
}
function Total_Soft_Cal_AMD2_But1()
{
	alert('This is Our Free Version. For more adventures Click to buy Personal version.');
}
function TotalSoftCal_Edit(Total_Soft_Cal_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_Cal_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();
		jQuery('.Total_Soft_Cal_AMD2').hide(500);
		jQuery('.Total_Soft_AMMTable').hide(500);
		jQuery('.Total_Soft_AMOTable').hide(500);
		jQuery('.Total_Soft_Cal_Update').show(500);
		jQuery('.Total_Soft_Cal_ID').html('[Total_Soft_Cal id="'+Total_Soft_Cal_ID+'"]');
		jQuery('.Total_Soft_Cal_TID').html('&lt;?php echo do_shortcode(&#039;[Total_Soft_Cal id="'+Total_Soft_Cal_ID+'"]&#039;);?&gt');
		jQuery('#TotalSoftCal_Name').val(b[1]);	
		jQuery('#TotalSoftCal_Type').val(b[2]);	
		jQuery('#TotalSoftCal_Type').hide();
		setTimeout(function(){
			jQuery('#Total_SoftCal_Update').val(Total_Soft_Cal_ID);
			jQuery('.Total_Soft_AMSetTable_Main').show(500);
			if(b[2]=='Event Calendar')
			{
				jQuery('#TotalSoftCal_BgCol').val(b[3]); jQuery('#TotalSoftCal_GrCol').val(b[4]); jQuery('#TotalSoftCal_GW').val(b[5]);	jQuery('#TotalSoftCal_BW').val(b[6]); jQuery('#TotalSoftCal_BStyle').val(b[7]); jQuery('#TotalSoftCal_BCol').val(b[8]); jQuery('#TotalSoftCal_BSCol').val(b[9]); jQuery('#TotalSoftCal_MW').val(b[10]); jQuery('#TotalSoftCal_HBgCol').val(b[11]); jQuery('#TotalSoftCal_HCol').val(b[12]); jQuery('#TotalSoftCal_HFS').val(b[13]);	jQuery('#TotalSoftCal_HFF').val(b[14]);	jQuery('#TotalSoftCal_WBgCol').val(b[15]); jQuery('#TotalSoftCal_WCol').val(b[16]);	jQuery('#TotalSoftCal_WFS').val(b[17]);	jQuery('#TotalSoftCal_WFF').val(b[18]);	jQuery('#TotalSoftCal_LAW').val(b[19]);	jQuery('#TotalSoftCal_LAWS').val(b[20]); jQuery('#TotalSoftCal_LAWC').val(b[21]); jQuery('#TotalSoftCal_DBgCol').val(b[22]); jQuery('#TotalSoftCal_DCol').val(b[23]); jQuery('#TotalSoftCal_DFS').val(b[24]); jQuery('#TotalSoftCal_TBgCol').val(b[25]); jQuery('#TotalSoftCal_TCol').val(b[26]); jQuery('#TotalSoftCal_TFS').val(b[27]); jQuery('#TotalSoftCal_TNBgCol').val(b[28]); jQuery('#TotalSoftCal_HovBgCol').val(b[29]); jQuery('#TotalSoftCal_HovCol').val(b[30]); jQuery('#TotalSoftCal_NumPos').val(b[31]); jQuery('#TotalSoftCal_WDStart').val(b[32]); jQuery('#TotalSoftCal_RefIcCol').val(b[33]); jQuery('#TotalSoftCal_RefIcSize').val(b[34]); jQuery('#TotalSoftCal_ArrowType').val(b[35]); jQuery('#TotalSoftCal_ArrowCol').val(b[38]); jQuery('#TotalSoftCal_ArrowSize').val(b[39]);
				
				jQuery('.Total_Soft_AMSetTable_1').show(500);
			}
			else if(b[2]=='Simple Calendar')
			{
				jQuery('#TotalSoftCal2_WDStart').val(b[3]); jQuery('#TotalSoftCal2_BW').val(b[4]); jQuery('#TotalSoftCal2_BS').val(b[5]); jQuery('#TotalSoftCal2_BC').val(b[6]); jQuery('#TotalSoftCal2_W').val(b[7]); jQuery('#TotalSoftCal2_H').val(b[8]); jQuery('#TotalSoftCal2_BxShShow').val(b[9]); jQuery('#TotalSoftCal2_BxShType').val(b[10]); jQuery('#TotalSoftCal2_BxSh').val(b[11]); jQuery('#TotalSoftCal2_BxShC').val(b[12]); jQuery('#TotalSoftCal2_MBgC').val(b[13]); jQuery('#TotalSoftCal2_MC').val(b[14]); jQuery('#TotalSoftCal2_MFS').val(b[15]); jQuery('#TotalSoftCal2_MFF').val(b[16]); jQuery('#TotalSoftCal2_WBgC').val(b[17]); jQuery('#TotalSoftCal2_WC').val(b[18]); jQuery('#TotalSoftCal2_WFS').val(b[19]); jQuery('#TotalSoftCal2_WFF').val(b[20]); jQuery('#TotalSoftCal2_LAW_W').val(b[21]); jQuery('#TotalSoftCal2_LAW_S').val(b[22]); jQuery('#TotalSoftCal2_LAW_C').val(b[23]); jQuery('#TotalSoftCal2_DBgC').val(b[24]); jQuery('#TotalSoftCal2_DC').val(b[25]); jQuery('#TotalSoftCal2_DFS').val(b[26]); jQuery('#TotalSoftCal2_TdBgC').val(b[27]); jQuery('#TotalSoftCal2_TdC').val(b[28]); jQuery('#TotalSoftCal2_TdFS').val(b[29]); jQuery('#TotalSoftCal2_EdBgC').val(b[30]); jQuery('#TotalSoftCal2_EdC').val(b[31]); jQuery('#TotalSoftCal2_EdFS').val(b[32]); jQuery('#TotalSoftCal2_HBgC').val(b[33]); jQuery('#TotalSoftCal2_HC').val(b[34]); jQuery('#TotalSoftCal2_ArrType').val(b[35]); jQuery('#TotalSoftCal2_ArrFS').val(b[36]); jQuery('#TotalSoftCal2_ArrC').val(b[37]); jQuery('#TotalSoftCal2_OmBgC').val(b[38]); jQuery('#TotalSoftCal2_OmC').val(b[39]); jQuery('#TotalSoftCal2_OmFS').val(b[40]); jQuery('#TotalSoftCal2_Ev_HBgC').val(b[41]); jQuery('#TotalSoftCal2_Ev_HC').val(b[42]); jQuery('#TotalSoftCal2_Ev_HFS').val(b[43]); jQuery('#TotalSoftCal2_Ev_HFF').val(b[44]); jQuery('#TotalSoftCal2_Ev_HText').val(b[45]); jQuery('#TotalSoftCal2_Ev_BBgC').val(b[46]); jQuery('#TotalSoftCal2_Ev_TC').val(b[47]); jQuery('#TotalSoftCal2_Ev_TFF').val(b[48]); jQuery('#TotalSoftCal2_Ev_TFS').val(b[49]);

				jQuery('.Total_Soft_AMSetTable_2').show(500);
			}
			else if(b[2]=='Flexible Calendar')
			{
				jQuery('#TotalSoftCal3_MW').val(b[3]); jQuery('#TotalSoftCal3_WDStart').val(b[4]); jQuery('#TotalSoftCal3_BgC').val(b[5]); jQuery('#TotalSoftCal3_GrC').val(b[6]); jQuery('#TotalSoftCal3_BBC').val(b[7]); jQuery('#TotalSoftCal3_BoxShShow').val(b[8]); jQuery('#TotalSoftCal3_BoxShType').val(b[9]); jQuery('#TotalSoftCal3_BoxSh').val(b[10]); jQuery('#TotalSoftCal3_BoxShC').val(b[11]); jQuery('#TotalSoftCal3_H_BgC').val(b[12]); jQuery('#TotalSoftCal3_H_BTW').val(b[13]); jQuery('#TotalSoftCal3_H_BTC').val(b[14]); jQuery('#TotalSoftCal3_H_FF').val(b[15]); jQuery('#TotalSoftCal3_H_MFS').val(b[16]); jQuery('#TotalSoftCal3_H_MC').val(b[17]); jQuery('#TotalSoftCal3_H_YFS').val(b[18]); jQuery('#TotalSoftCal3_H_Format').val(b[20]); jQuery('#TotalSoftCal3_Arr_Type').val(b[21]); jQuery('#TotalSoftCal3_Arr_C').val(b[22]); jQuery('#TotalSoftCal3_Arr_S').val(b[23]); jQuery('#TotalSoftCal3_Arr_HC').val(b[24]); jQuery('#TotalSoftCal3_LAH_W').val(b[25]); jQuery('#TotalSoftCal3_LAH_C').val(b[26]); jQuery('#TotalSoftCal3_WD_BgC').val(b[27]); jQuery('#TotalSoftCal3_WD_C').val(b[28]); jQuery('#TotalSoftCal3_WD_FS').val(b[29]); jQuery('#TotalSoftCal3_WD_FF').val(b[30]); jQuery('#TotalSoftCal3_D_BgC').val(b[31]); jQuery('#TotalSoftCal3_D_C').val(b[32]); jQuery('#TotalSoftCal3_TD_BgC').val(b[33]); jQuery('#TotalSoftCal3_TD_C').val(b[34]); jQuery('#TotalSoftCal3_HD_BgC').val(b[35]); jQuery('#TotalSoftCal3_HD_C').val(b[36]); jQuery('#TotalSoftCal3_ED_C').val(b[37]); jQuery('#TotalSoftCal3_ED_HC').val(b[38]); jQuery('#TotalSoftCal3_Ev_Format').val(b[39]); jQuery('#TotalSoftCal3_Ev_BTW').val(b[40]); jQuery('#TotalSoftCal3_Ev_BTC').val(b[41]); jQuery('#TotalSoftCal3_Ev_BgC').val(b[42]); jQuery('#TotalSoftCal3_Ev_C').val(b[43]); jQuery('#TotalSoftCal3_Ev_FS').val(b[44]); jQuery('#TotalSoftCal3_Ev_FF').val(b[45]); jQuery('#TotalSoftCal3_Ev_C_Type').val(b[46]); jQuery('#TotalSoftCal3_Ev_C_C').val(b[47]); jQuery('#TotalSoftCal3_Ev_C_HC').val(b[48]); jQuery('#TotalSoftCal3_Ev_C_FS').val(b[49]); jQuery('#TotalSoftCal3_Ev_LAH_W').val(b[50]); jQuery('#TotalSoftCal3_Ev_LAH_C').val(b[51]); jQuery('#TotalSoftCal3_Ev_B_BgC').val(b[52]); jQuery('#TotalSoftCal3_Ev_B_BC').val(b[53]); jQuery('#TotalSoftCal3_Ev_T_FS').val(b[54]); jQuery('#TotalSoftCal3_Ev_T_FF').val(b[55]); jQuery('#TotalSoftCal3_Ev_T_BgC').val(b[56]); jQuery('#TotalSoftCal3_Ev_T_C').val(b[57]); jQuery('#TotalSoftCal3_Ev_T_TA').val(b[58]); jQuery('#TotalSoftCal3_Ev_I_W').val(b[62]); jQuery('#TotalSoftCal3_Ev_I_Pos').val(b[63]); jQuery('#TotalSoftCal3_Ev_L_C').val(b[64]); jQuery('#TotalSoftCal3_Ev_L_HC').val(b[65]); jQuery('#TotalSoftCal3_Ev_L_Pos').val(b[66]); jQuery('#TotalSoftCal3_Ev_L_Text').val(b[67]); jQuery('#TotalSoftCal3_Ev_LAE_W').val(b[68]); jQuery('#TotalSoftCal3_Ev_LAE_C').val(b[69]); jQuery('#TotalSoftCal3_Ev_L_FS').val(b[70]); jQuery('#TotalSoftCal3_Ev_L_FF').val(b[71]); jQuery('#TotalSoftCal3_Ev_L_BW').val(b[72]); jQuery('#TotalSoftCal3_Ev_L_BC').val(b[73]);	jQuery('#TotalSoftCal3_Ev_L_BR').val(parseInt(b[74]));

				jQuery('.Total_Soft_AMSetTable_3').show(500);
			}
			else if(b[2]=='TimeLine Calendar')
			{
				jQuery('#TotalSoftCal4_01').val(b[3]); jQuery('#TotalSoftCal4_02').val(b[4]); jQuery('#TotalSoftCal4_03').val(b[5]); jQuery('#TotalSoftCal4_04').val(b[6]); jQuery('#TotalSoftCal4_05').val(b[7]); jQuery('#TotalSoftCal4_06').val(b[8]); jQuery('#TotalSoftCal4_07').val(b[9]); jQuery('#TotalSoftCal4_08').val(b[10]); jQuery('#TotalSoftCal4_09').val(b[11]); jQuery('#TotalSoftCal4_10').val(b[12]); jQuery('#TotalSoftCal4_11').val(b[13]); jQuery('#TotalSoftCal4_12').val(b[14]); jQuery('#TotalSoftCal4_13').val(b[15]); jQuery('#TotalSoftCal4_14').val(b[16]); jQuery('#TotalSoftCal4_15').val(b[17]); jQuery('#TotalSoftCal4_16').val(b[18]); jQuery('#TotalSoftCal4_17').val(b[19]); jQuery('#TotalSoftCal4_18').val(b[20]); jQuery('#TotalSoftCal4_19').val(b[21]); jQuery('#TotalSoftCal4_20').val(b[22]); jQuery('#TotalSoftCal4_21').val(b[23]); jQuery('#TotalSoftCal4_22').val(b[24]); jQuery('#TotalSoftCal4_23').val(b[25]); jQuery('#TotalSoftCal4_24').val(b[26]); jQuery('#TotalSoftCal4_25').val(b[27]); jQuery('#TotalSoftCal4_26').val(b[28]); jQuery('#TotalSoftCal4_27').val(b[29]); jQuery('#TotalSoftCal4_28').val(b[30]); jQuery('#TotalSoftCal4_29').val(b[31]); jQuery('#TotalSoftCal4_30').val(b[32]); jQuery('#TotalSoftCal4_31').val(b[33]); jQuery('#TotalSoftCal4_32').val(b[34]); jQuery('#TotalSoftCal4_33').val(b[35]); jQuery('#TotalSoftCal4_34').val(b[36]); jQuery('#TotalSoftCal4_35').val(b[37]); jQuery('#TotalSoftCal4_36').val(b[38]); jQuery('#TotalSoftCal4_37').val(b[39]); jQuery('#TotalSoftCal4_38').val(b[40]); jQuery('#TotalSoftCal4_39').val(b[41]); 

				jQuery('.Total_Soft_AMSetTable_4').show(500);
			}
			jQuery('.Total_Soft_Cal_AMD3').show(500);
			jQuery('.Total_Soft_AMShortTable').show(500);
			jQuery('.Total_Soft_Cal_Color').alphaColorPicker();
			jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
			TotalSoft_Cal_Out();
		},500)
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_Edit1', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_Cal_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();

		if(b[2]=='Event Calendar')
		{
			jQuery('#TotalSoftCal1_Ev_T_FS').val(b[3]);	jQuery('#TotalSoftCal1_Ev_T_FF').val(b[4]);	jQuery('#TotalSoftCal1_Ev_T_C').val(b[5]); jQuery('#TotalSoftCal1_Ev_T_TA').val(b[6]); jQuery('#TotalSoftCal1_Ev_TiF').val(b[7]); jQuery('#TotalSoftCal1_Ev_I_W').val(b[11]); jQuery('#TotalSoftCal1_Ev_I_Pos').val(b[12]);
		}
		else if(b[2]=='Simple Calendar')
		{
			jQuery('#TotalSoftCal2_Ev_T_TA').val(b[3]); jQuery('#TotalSoftCal2_Ev_I_W').val(b[4]); jQuery('#TotalSoftCal2_Ev_I_Pos').val(b[5]); jQuery('#TotalSoftCal2_Ev_TiF').val(b[6]);			
		}
		else if(b[2]=='Flexible Calendar')
		{
			jQuery('#TotalSoftCal3_Ev_TiF').val(b[3]);			
		}
		else if(b[2]=='TimeLine Calendar')
		{
			jQuery('#TotalSoftCal_4_01').val(b[3]); jQuery('#TotalSoftCal_4_02').val(b[4]); jQuery('#TotalSoftCal_4_03').val(b[5]); jQuery('#TotalSoftCal_4_04').val(b[6]); jQuery('#TotalSoftCal_4_05').val(b[7]); jQuery('#TotalSoftCal_4_06').val(b[8]); jQuery('#TotalSoftCal_4_07').val(b[9]); jQuery('#TotalSoftCal_4_08').val(b[10]); jQuery('#TotalSoftCal_4_09').val(b[11]); jQuery('#TotalSoftCal_4_10').val(b[12]); jQuery('#TotalSoftCal_4_11').val(b[13]); jQuery('#TotalSoftCal_4_12').val(b[14]); jQuery('#TotalSoftCal_4_13').val(b[15]); jQuery('#TotalSoftCal_4_14').val(b[16]); jQuery('#TotalSoftCal_4_15').val(b[17]); jQuery('#TotalSoftCal_4_16').val(b[18]); jQuery('#TotalSoftCal_4_17').val(b[19]); jQuery('#TotalSoftCal_4_18').val(b[20]); jQuery('#TotalSoftCal_4_19').val(b[21]); jQuery('#TotalSoftCal_4_20').val(b[22]); jQuery('#TotalSoftCal_4_21').val(b[23]); jQuery('#TotalSoftCal_4_22').val(b[24]); jQuery('#TotalSoftCal_4_23').val(b[25]); jQuery('#TotalSoftCal_4_24').val(b[26]); jQuery('#TotalSoftCal_4_25').val(b[27]); jQuery('#TotalSoftCal_4_26').val(b[28]); jQuery('#TotalSoftCal_4_27').val(b[29]); jQuery('#TotalSoftCal_4_28').val(b[30]); jQuery('#TotalSoftCal_4_29').val(b[31]);
		}
		jQuery('.Total_Soft_Cal_Color1').alphaColorPicker();
		jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
		TotalSoft_Cal_Out();
	})
}
function TotalSoftCal_Del(Total_Soft_Cal_ID)
{
	jQuery('#Total_Soft_AMOTable_Calendar_tr_'+Total_Soft_Cal_ID).find('.Total_Soft_Calendar_Del_Span').addClass('Total_Soft_Calendar_Del_Span1');
}
function TotalSoftCalendar_Del_No(Total_Soft_Cal_ID)
{
	jQuery('#Total_Soft_AMOTable_Calendar_tr_'+Total_Soft_Cal_ID).find('.Total_Soft_Calendar_Del_Span').removeClass('Total_Soft_Calendar_Del_Span1');
}
function TotalSoftCal_Clone(Total_Soft_Cal_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_Clone', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_Cal_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TotalSoft_Reload()
{
	location.reload();
}
function TotalSoftCal_EditEv(Total_Soft_CalEv_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_EditEv', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		jQuery('.Total_Soft_Cal_AMD2').hide(500);
		jQuery('.Total_Soft_AMMTable1').hide(500);
		jQuery('.Total_Soft_AMOTable1').hide(500);
		jQuery('.Total_Soft_Cal_Save_Ev').hide(500);
		jQuery('.Total_Soft_Cal_Update_Ev').show(500);
		jQuery('#Total_SoftCal_EvUpdate').val(Total_Soft_CalEv_ID);

		var b=Array();
		var a=response.split('=>');
		for(var i=3;i<a.length;i++)
		{ b[b.length]=a[i].split('[')[0].trim(); }
		b[b.length-1]=b[b.length-1].split(')')[0].trim();
		if(b[8].length!=7){ b[8] = b[8]+')'; }

		jQuery('#TotalSoftCal_EvName').val(b[0]);			
		jQuery('#TotalSoftCal_EvCal').val(b[1]);			
		jQuery('#TotalSoftCal_EvStartDate').val(b[2]);			
		jQuery('#TotalSoftCal_EvEndDate').val(b[3]);			
		jQuery('#TotalSoftCal_EvURL').val(b[4]);			
		jQuery('#TotalSoftCal_EvURLNewTab').val(b[5]);			
		jQuery('#TotalSoftCal_EvStartTime').val(b[6]);			
		jQuery('#TotalSoftCal_EvEndTime').val(b[7]);			
		jQuery('#TotalSoftCal_EvColor').val(b[8]);	

		setTimeout(function(){
			jQuery('.Total_Soft_Cal_Color').alphaColorPicker();
			jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
			jQuery('.Total_Soft_Cal_AMD3').show(500);
			jQuery('.Total_Soft_AMEvTable').fadeIn(500);
		},500)
	})
	Total_Soft_Cal_Editor();
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_EditEv_Desc', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		if(response!='none')
		{
			var b=Array();
			var a=response.split('=>');
			for(var i=3;i<a.length;i++)
			{ b[b.length]=a[i].split('[')[0].trim(); }
			b[b.length-1]=b[b.length-1].split(')')[0].trim();
			jQuery('#TotalSoftCal_EvDesc_1').val(b[0]);
			tinyMCE.get('TotalSoftCal_EvDesc').setContent(b[0]);

			jQuery('#TotalSoftCalendar_URL_Image_2').val(b[1]);
			jQuery('#TotalSoftCalendar_URL_Video_2').val(b[2]);
			jQuery('#TotalSoftCalendar_URL_Video_1').val(b[3]);
		}
	})
}
function TotalSoftCal_DelEv(Total_Soft_CalEv_ID)
{
	jQuery('#Total_Soft_AMOTable1_Calendar_tr_'+Total_Soft_CalEv_ID).find('.Total_Soft_Calendar_Del_Span').addClass('Total_Soft_Calendar_Del_Span1');
}
function TotalSoftCal_DelEv_No(Total_Soft_CalEv_ID)
{
	jQuery('#Total_Soft_AMOTable1_Calendar_tr_'+Total_Soft_CalEv_ID).find('.Total_Soft_Calendar_Del_Span').removeClass('Total_Soft_Calendar_Del_Span1');
}
function TotalSoftCal_DelEv_Yes(Total_Soft_CalEv_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCal_DelEv', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function Total_Soft_CalEv_AMD2_But1()
{
	jQuery('.Total_Soft_Cal_AMD2').hide(500);
	jQuery('.Total_Soft_AMMTable1').hide(500);
	jQuery('.Total_Soft_AMOTable1').hide(500);
	jQuery('.Total_Soft_Cal_Save_Ev').show(500);
	jQuery('.Total_Soft_Cal_Update_Ev').hide(500);
	jQuery('.Total_Soft_Cal_Color').alphaColorPicker();
	jQuery('.wp-picker-holder').addClass('alpha-picker-holder');
	Total_Soft_Cal_Editor();
	setTimeout(function(){

		jQuery('.Total_Soft_Cal_AMD3').show(500);
		jQuery('.Total_Soft_AMEvTable').fadeIn(500);
	},500)
}
function TotalSoftCalendar_URL_Clicked()
{
	var nIntervId = setInterval(function(){
		var code = jQuery('#TotalSoftCalendar_URL_1').val();		

		if(code.indexOf('https://www.youtube.com/')>0)
		{
			var TotalSoftCodes1 = code.split('<a href="https://www.youtube.com/');
			var TotalSoftGallery_Video_Video = code.split('<a href="')[1].split('">')[0]; 
			jQuery('#TotalSoftCalendar_URL_Video_1').val(TotalSoftGallery_Video_Video); 
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				var TotalSoftCodes2= TotalSoftCodes1[1].split("=");
				var TotalSoftCodeSrc = TotalSoftCodes2[1].split('&');

				jQuery('#TotalSoftCalendar_URL_Video_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftCalendar_URL_Image_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
				if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}
			else if(code.indexOf('embed')>0)
			{
				var TotalSoftCodes1=code.split('[embed]');
				var TotalSoftCodes2=TotalSoftCodes1[1].split('[/embed]');
				if(TotalSoftCodes2[0].indexOf('watch?')>0)
				{
					var TotalSoftCodes3=TotalSoftCodes2[0].split('=');
					
					jQuery('#TotalSoftCalendar_URL_Video_2').val('https://www.youtube.com/embed/'+TotalSoftCodes3[1]);
					jQuery('#TotalSoftCalendar_URL_Image_2').val('http://img.youtube.com/vi/'+TotalSoftCodes3[1]+'/mqdefault.jpg');
					if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
						clearInterval(nIntervId);
					}	
				}
				else
				{
					var TotalSoftCodeSrc=TotalSoftCodes2[0];
					var TotalSoftImsrc=TotalSoftCodeSrc.split('embed/');

					jQuery('#TotalSoftCalendar_URL_Video_2').val(TotalSoftCodeSrc);
					jQuery('#TotalSoftCalendar_URL_Image_2').val('http://img.youtube.com/vi/'+TotalSoftImsrc[1]+'/mqdefault.jpg');
					if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
						clearInterval(nIntervId);
					}	
				}
			}
			else
			{
				var TotalSoftCodes2= TotalSoftCodes1[1].split('=');
				var TotalSoftCodeSrc = TotalSoftCodes2[1].split('">https://');

				jQuery('#TotalSoftCalendar_URL_Video_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
				jQuery('#TotalSoftCalendar_URL_Image_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
				if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
					clearInterval(nIntervId);
				}				
			}	
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			var TotalSoftCodes1 = code.split('<a href="https://youtu.be/'); 
			var TotalSoftCodeSrc = TotalSoftCodes1[1].split('">https://');

			jQuery('#TotalSoftCalendar_URL_Video_2').val('https://www.youtube.com/embed/'+TotalSoftCodeSrc[0]);
			jQuery('#TotalSoftCalendar_URL_Image_2').val('http://img.youtube.com/vi/'+TotalSoftCodeSrc[0]+'/mqdefault.jpg');
			jQuery('#TotalSoftCalendar_URL_Video_1').val('https://www.youtube.com/watch?v='+TotalSoftCodeSrc[0]);			

			if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
				clearInterval(nIntervId);
			}				
		}
		else if(code.indexOf('https://vimeo.com/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var s1=code.split('[embed]https://vimeo.com/');
				var src=s1[1].split('[/embed]');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftCalendar_URL_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				jQuery('#TotalSoftCalendar_URL_Video_1').val('https://vimeo.com/'+src[0]);			

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoftCal_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftCalendar_URL_Image_2').val(response);
					if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
						clearInterval(nIntervId);
					}				
				});		
   			}
			else
			{
				var s1 = code.split('<a href="https://vimeo.com/'); 
				var src = s1[1].split('">https://');
				if(src[0].length>9)
				{
					var real_src=src[0].split('/');
					src[0]=real_src[2];
				}
				jQuery('#TotalSoftCalendar_URL_Video_2').val('https://player.vimeo.com/video/'+src[0]);
				jQuery('#TotalSoftCalendar_URL_Video_1').val('https://vimeo.com/'+src[0]);			

				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'TSoftCal_Vimeo_Video_Image', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#TotalSoftCalendar_URL_Image_2').val(response);
					if(jQuery('#TotalSoftCalendar_URL_Video_2').val().length>0){
						clearInterval(nIntervId);
					}				
				});		
			}		
		}
		else if(code.indexOf('img')>0)
		{
			var s=code.split('src="'); 
			var src=s[1].split('"');
			jQuery('#TotalSoftCalendar_URL_Video_1').val(src[0]);	
			jQuery('#TotalSoftCalendar_URL_Image_2').val(src[0]);
			if(jQuery('#TotalSoftCalendar_URL_Image_2').val().length>0){
				clearInterval(nIntervId);
			}				
		}		
	},100)	
}
function TotalSoftCal_EditCl(Total_Soft_CalEv_ID)
{
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'TotalSoftCalEv_Clon', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: Total_Soft_CalEv_ID, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}
function TS_Cal_Del_Vid_Cl()
{
	jQuery('#TotalSoftCalendar_URL_Video_2').val('');
	jQuery('#TotalSoftCalendar_URL_Video_1').val('');
	jQuery('#TotalSoftCalendar_URL_Image_2').val('');
}
function Total_Soft_Cal_Editor()
{
	tinymce.init({
		selector: '#TotalSoftCal_EvDesc',
		menubar: false,
		statusbar: false,
		height: 250,
		plugins: [
		    'advlist autolink lists link image charmap print preview hr',
		    'searchreplace wordcount code media ',
		    'insertdatetime save table contextmenu directionality',
		    'paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
		fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
		font_formats: 'Abadi MT Condensed Light = abadi mt condensed light; Aharoni = aharoni; Aldhabi = aldhabi; Andalus = andalus; Angsana New = angsana new; AngsanaUPC = angsanaupc; Aparajita = aparajita; Arabic Typesetting = arabic typesetting; Arial = arial; Arial Black = arial black; Batang = batang; BatangChe = batangche; Browallia New = browallia new; BrowalliaUPC = browalliaupc; Calibri = calibri; Calibri Light = calibri light; Calisto MT = calisto mt; Cambria = cambria; Candara = candara; Century Gothic = century gothic; Comic Sans MS = comic sans ms; Consolas = consolas; Constantia = constantia; Copperplate Gothic = copperplate gothic; Copperplate Gothic Light = copperplate gothic light; Corbel = corbel; Cordia New = cordia new; CordiaUPC = cordiaupc; Courier New = courier new; DaunPenh = daunpenh; David = david; DFKai-SB = dfkai-sb; DilleniaUPC = dilleniaupc; DokChampa = dokchampa; Dotum = dotum; DotumChe = dotumche; Ebrima = ebrima; Estrangelo Edessa = estrangelo edessa; EucrosiaUPC = eucrosiaupc; Euphemia = euphemia; FangSong = fangsong; Franklin Gothic Medium = franklin gothic medium; FrankRuehl = frankruehl; FreesiaUPC = freesiaupc; Gabriola = gabriola; Gadugi = gadugi; Gautami = gautami; Georgia = georgia; Gisha = gisha; Gulim  = gulim; GulimChe = gulimche; Gungsuh = gungsuh; GungsuhChe = gungsuhche; Impact = impact; IrisUPC = irisupc; Iskoola Pota = iskoola pota; JasmineUPC = jasmineupc; KaiTi = kaiti; Kalinga = kalinga; Kartika = kartika; Khmer UI = khmer ui; KodchiangUPC = kodchiangupc; Kokila = kokila; Lao UI = lao ui; Latha = latha; Leelawadee = leelawadee; Levenim MT = levenim mt; LilyUPC = lilyupc; Lucida Console = lucida console; Lucida Handwriting Italic = lucida handwriting italic; Lucida Sans Unicode = lucida sans unicode; Malgun Gothic = malgun gothic; Mangal = mangal; Manny ITC = manny itc; Marlett = marlett; Meiryo = meiryo; Meiryo UI = meiryo ui; Microsoft Himalaya = microsoft himalaya; Microsoft JhengHei = microsoft jhenghei; Microsoft JhengHei UI = microsoft jhenghei ui; Microsoft New Tai Lue = microsoft new tai lue; Microsoft PhagsPa = microsoft phagspa; Microsoft Sans Serif = microsoft sans serif; Microsoft Tai Le = microsoft tai le; Microsoft Uighur = microsoft uighur; Microsoft YaHei = microsoft yahei; Microsoft YaHei UI = microsoft yahei ui; Microsoft Yi Baiti = microsoft yi baiti; MingLiU_HKSCS = mingliu_hkscs; MingLiU_HKSCS-ExtB = mingliu_hkscs-extb; Miriam = miriam; Mongolian Baiti = mongolian baiti; MoolBoran = moolboran; MS UI Gothic = ms ui gothic; MV Boli = mv boli; Myanmar Text = myanmar text; Narkisim = narkisim; Nirmala UI = nirmala ui; News Gothic MT = news gothic mt; NSimSun = nsimsun; Nyala = nyala; Palatino Linotype = palatino linotype; Plantagenet Cherokee = plantagenet cherokee; Raavi = raavi; Rod = rod; Sakkal Majalla = sakkal majalla; Segoe Print = segoe print; Segoe Script = segoe script; Segoe UI Symbol = segoe ui symbol; Shonar Bangla = shonar bangla; Shruti = shruti; SimHei = simhei; SimKai = simkai; Simplified Arabic = simplified arabic; SimSun = simsun; SimSun-ExtB = simsun-extb; Sylfaen = sylfaen; Tahoma = tahoma; Times New Roman = times new roman; Traditional Arabic = traditional arabic; Trebuchet MS = trebuchet ms; Tunga = tunga; Utsaah = utsaah; Vani = vani; Vijaya = vijaya'
	});
}
function Total_Soft_Cal_Desc_1()
{
	jQuery('#TotalSoftCal_EvDesc_1').val(tinyMCE.get('TotalSoftCal_EvDesc').getContent());
}
function TotalSoftCal_EventSort()
{
	jQuery('.Total_Soft_AMOTable1 tbody').sortable({
		update: function( event, ui ){ 
			jQuery(this).find('tr').each(function(i){
				jQuery(this).find('td:nth-child(1)').html((i+1));
				jQuery(this).find('td:nth-child(4)').find('input[type=text]').attr('name', 'TSoft_Cal_Move_ID_'+(i+1));
				TotalSoftCal_EventSort1();
			});
		}
	})
}
function TotalSoftCal_EventSort1()
{
	jQuery('.Total_Soft_Cal_AMD2_But1').css('opacity','1');
}
function Total_Soft_CalEv_AMD2_But3()
{
	jQuery('.Total_Soft_Cal_AMD2_But1').css('opacity','0');
}