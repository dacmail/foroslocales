<?php
	
	class Total_Soft_Cal extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Total Soft Calendar','description'=>__( 'This is the widget of Total Soft Calendar plugin', 'Total-Soft-Calendar' ));
			parent::__construct('Total_Soft_Cal','',$params);
 	  	}
 	  	function form($instance)
 		{
 			$defaults = array('Total_Soft_Cal'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Calendar = $instance['Total_Soft_Cal'];
		   	?>
		   	<div>			  
			   	<p>
			   		Calendar Title:
			   		<select name="<?php echo $this->get_field_name('Total_Soft_Cal'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;

							$table_name4 = $wpdb->prefix . "totalsoft_cal_types";
							$Total_Soft_Cal=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d", 0));
				   			
				   			foreach ($Total_Soft_Cal as $Total_Soft_Cal1)
				   			{
				   				?> <option value="<?php echo $Total_Soft_Cal1->id; ?>"> <?php echo $Total_Soft_Cal1->TotalSoftCal_Name; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Total_Soft_Cal = empty($instance['Total_Soft_Cal']) ? '' : $instance['Total_Soft_Cal'];
 		 	global $wpdb;

			$table_name  = $wpdb->prefix . "totalsoft_fonts";
			$table_name1 = $wpdb->prefix . "totalsoft_cal_1";
			$table_name2 = $wpdb->prefix . "totalsoft_cal_ids";
			$table_name3 = $wpdb->prefix . "totalsoft_cal_events";
			$table_name4 = $wpdb->prefix . "totalsoft_cal_types";
			$table_name5 = $wpdb->prefix . "totalsoft_cal_2";
			$table_name6 = $wpdb->prefix . "totalsoft_cal_events_p2";
			$table_name7 = $wpdb->prefix . "totalsoft_cal_3";
			$table_name8 = $wpdb->prefix . "totalsoft_cal_part";
			$table_name9 = $wpdb->prefix . "totalsoft_cal_4";
			
			$TotalSoftCal_Type=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id = %d", $Total_Soft_Cal));

			if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='Event Calendar')
			{
				$TotalSoftCal_Par=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE TotalSoftCal_ID = %d", $Total_Soft_Cal));
			}
			else if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='Simple Calendar')
			{
				$TotalSoftCal_Par=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoftCal_ID = %d", $Total_Soft_Cal));
			}
			else if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='Flexible Calendar')
			{
				$TotalSoftCal_Par=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE TotalSoftCal_ID = %d", $Total_Soft_Cal));
			}
			else if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='TimeLine Calendar')
			{
				$TotalSoftCal_Par=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE TotalSoftCal_ID = %d", $Total_Soft_Cal));
			}

			$TotalSoftCal_Part=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoftCal_ID = %s", $Total_Soft_Cal));

			$Total_Soft_CalEvents=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE TotalSoftCal_EvCal=%s order by id",$Total_Soft_Cal));

			$Total_Soft_CalEvents_Date = array();
			$Total_Soft_CalEvents_Desc = array();
			$Total_Soft_CalEvents_Date_Real = array();
			$Total_Soft_CalEvents_Desc_Real = array();

			for($i=0;$i<count($Total_Soft_CalEvents);$i++){ 
				array_push($Total_Soft_CalEvents_Date, $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate);

				if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab=='none')
				{
					$Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab='';
				} 
				$Total_Soft_CalEventDesc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftCal_EvCal=%s order by id",$Total_Soft_CalEvents[$i]->id));
				$TotalSoftcalEvent = '';
				
				if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_I_Pos == '1') // Media Before Title
				{
					if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Iframe != '')
					{
						$TotalSoftcalEvent .= '<div style="position: relative; width: 99%; margin: 5px auto; text-align: center;">';
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src == '')
						{
							$TotalSoftcalEvent .= '<img src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . '" class="TotalSoftcalEvent_Media TotalSoftcalEvent_Media_' . $Total_Soft_Cal .'">';
						}
						else
						{
							$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_Mediadiv TotalSoftcalEvent_Mediadiv_' . $Total_Soft_Cal .'"><iframe src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . '" class="TotalSoftcalEvent_Mediaiframe TotalSoftcalEvent_Mediaiframe_' . $Total_Soft_Cal .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						$TotalSoftcalEvent .= '</div>';
					}
				}

				if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL != '')
				{
					if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Pos == '1') // Link Before Title
					{
						$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a>';
						$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</p>';
					}
					else if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Pos == '2') // Link After Title
					{
						$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</p>';
						$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a>';
					}
					else if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Pos == '3') // Link After Title Text
					{
						$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkMar TotalSoftcalEvent_LinkMar_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a></p>';
					}
					else
					{
						$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</p>';
					}
				}
				else
				{
					$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</p>';
				}	
				$FltimestartPeriod = 'AM';
				$FltimeendPeriod = 'AM';
				if($TotalSoftCal_Part[0]->TotalSoftCal_01 == '12')
                {
                	$TotalSoftCal_EvStartTimeSplit=explode(':',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime);
                	$TotalSoftCal_EvEndTimeSplit=explode(':',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime);
                    if($TotalSoftCal_EvStartTimeSplit[0] >= 12) 
                    {
                        if($TotalSoftCal_EvStartTimeSplit[0] >= 22)
                        {
                            $FlCstartTime = ($TotalSoftCal_EvStartTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvStartTimeSplit[1];
                        }
                        else
                        {
                            $FlCstartTime = '0' . ($TotalSoftCal_EvStartTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvStartTimeSplit[1];
                        }
                        $FltimestartPeriod = 'PM';
                    }
                    else
                    {
                        $FlCstartTime = $TotalSoftCal_EvStartTimeSplit[0] . ':' . $TotalSoftCal_EvStartTimeSplit[1];
                    }
                    if($FlCstartTime == 0) {
                        $FlCstartTime = '12:' . $TotalSoftCal_EvStartTimeSplit[1];
                    }
                    $timeFlcalreal = $FlCstartTime . ' ' . $FltimestartPeriod;

                    if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != '' &&  $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime)
                    {
                        if($TotalSoftCal_EvEndTimeSplit[0] >= 12) {
                            if($TotalSoftCal_EvEndTimeSplit[0] >= 22)
                            {
                                $FlCendTime = ($TotalSoftCal_EvEndTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvEndTimeSplit[1];
                            }
                            else
                            {
                                $FlCendTime = '0'+($TotalSoftCal_EvEndTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvEndTimeSplit[1];
                            }
                            $FltimeendPeriod = 'PM';
                        }
                        else
                        {
                            $FlCendTime = $TotalSoftCal_EvEndTimeSplit[0] . ':' . $TotalSoftCal_EvEndTimeSplit[1];;
                        }
                        if($FlCendTime == 0) {
                            $FlCendTime = '12:' . $TotalSoftCal_EvEndTimeSplit[1];
                        }
                        $timeFlcalreal .= ' - ' . $FlCendTime . ' ' . $FltimeendPeriod;
                    }
                }
                else
                {
                    $FltimestartPeriod = '';
					$FltimeendPeriod = '';

                    $timeFlcalreal = $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime;
                    if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != '' &&  $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime)
                    {
                        $timeFlcalreal .= ' - ' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime;
                    }
                }

				if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate == $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate || $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate == '--' || $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate == '')
				{
					$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">'. $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate;

					if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime != '')
					{
						$TotalSoftcalEvent .= '<span style="margin-left: 10px;">' . $timeFlcalreal . '</span>';
					}

					$TotalSoftcalEvent .= '</p>';
				}
				else
				{
					$TotalSoftcalEvent .= '<p class="TotalSoftcalEvent_Title TotalSoftcalEvent_Title_' . $Total_Soft_Cal .'">' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate . " / " . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate;

					if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime != '')
					{
						$TotalSoftcalEvent .= '<span style="margin-left: 10px;">' . $timeFlcalreal . '</span>';
					}

					$TotalSoftcalEvent .= '</p>';
				}					

				if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_I_Pos == '2') // Media After Title
				{
					if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Iframe != '')
					{								
						$TotalSoftcalEvent .= '<div style="position: relative; width: 99%; margin: 5px auto; text-align: center;">';
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src == '')
						{
							$TotalSoftcalEvent .= '<img src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . '" class="TotalSoftcalEvent_Media TotalSoftcalEvent_Media_' . $Total_Soft_Cal .'">';
						}
						else
						{
							$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_Mediadiv TotalSoftcalEvent_Mediadiv_' . $Total_Soft_Cal .'"><iframe src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . '" class="TotalSoftcalEvent_Mediaiframe TotalSoftcalEvent_Mediaiframe_' . $Total_Soft_Cal .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						$TotalSoftcalEvent .= '</div>';
					}
				}

				if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL != '')
				{	
					if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc != '')
					{							
						if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Pos == '4') // Link After Description
						{
							$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);
							$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a>';
						}
						else if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Pos == '5') // Link After Description Text
						{
							$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc) . '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkMar TotalSoftcalEvent_LinkMar_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a>';
						}
						else
						{
							$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);
						}
					}
					else
					{
						$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a>';
					}
				}
				else
				{
					if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc != '')
					{
						$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);
					}
				}

				if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_I_Pos == '3') // Media After Description
				{
					if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Iframe != '')
					{								
						$TotalSoftcalEvent .= '<div style="position: relative; width: 99%; margin: 10px auto; text-align: center;">';
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src == '')
						{
							$TotalSoftcalEvent .= '<img src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . '" class="TotalSoftcalEvent_Media TotalSoftcalEvent_Media_' . $Total_Soft_Cal .'">';
						}
						else
						{
							$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_Mediadiv TotalSoftcalEvent_Mediadiv_' . $Total_Soft_Cal .'"><iframe src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . '" class="TotalSoftcalEvent_Mediaiframe TotalSoftcalEvent_Mediaiframe_' . $Total_Soft_Cal .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						$TotalSoftcalEvent .= '</div>';
					}
				}

				$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_LAE TotalSoftcalEvent_LAE_' . $Total_Soft_Cal .'"></div>';
				array_push($Total_Soft_CalEvents_Desc, $TotalSoftcalEvent);
			}
			for($i=0;$i<count($Total_Soft_CalEvents_Date);$i++)
			{
				if($Total_Soft_CalEvents_Date[$i] != '' || $Total_Soft_CalEvents_Date[$i] != null)
				{
					for($j=$i; $j<count($Total_Soft_CalEvents_Date);$j++)
					{
						if($Total_Soft_CalEvents_Date[$i] === $Total_Soft_CalEvents_Date[$j+1])
						{
							$Total_Soft_CalEvents_Date[$j+1] = '';
							$Total_Soft_CalEvents_Desc[$i] = $Total_Soft_CalEvents_Desc[$i] . $Total_Soft_CalEvents_Desc[$j+1];
							$Total_Soft_CalEvents_Desc[$j+1] = '';
						}
					}	
				}	
			}
			for($i=0;$i<count($Total_Soft_CalEvents_Date);$i++)
			{
				if($Total_Soft_CalEvents_Date[$i] != '')
				{
					array_push($Total_Soft_CalEvents_Date_Real, $Total_Soft_CalEvents_Date[$i]);
					array_push($Total_Soft_CalEvents_Desc_Real, $Total_Soft_CalEvents_Desc[$i]);
				}
			}
 		 	echo $before_widget;
 		 	if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='Event Calendar'){ ?>
 		 		<style type="text/css">
					.monthly {
						box-shadow: 0px 0px 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_BSCol;?>;
						border:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_BW;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_BStyle;?> <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_BCol;?>;
					}
					.monthly *
					{
						font: normal 13px/20px Droid Sans;
					}
					.desc {
						max-width: 250px;
						text-align: left;
						font-size:14px;
						padding-top:30px;
						line-height: 1.4em;
					}
					.resize {
						background: #222;
						display: inline-block;
						padding: 6px 15px;
						border-radius: 22px;
						font-size: 13px;
					}
					@media (max-height: 700px) {
						.sticky {
							position: relative;
						}
					}
					@media (max-width: 600px) {
						.resize {
							display: none;
						}
					}
					/* Contains title & nav */
					.monthly-header {
						position: relative;
						text-align:center;
						padding:10px;
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_HBgCol;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_HCol;?>;
						box-sizing: border-box;
					}
					.monthly-header-title {
						font-size:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_HFS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_HFF;?> ;
					}
					.monthly-day-title-wrap {
						display:table;
						table-layout:fixed;
						width:100%;
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_WBgCol;?>;
						color:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_WCol;?>;
						border-bottom: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_LAW;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_LAWS;?> <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_LAWC;?>;
					}
					.monthly-day-title-wrap div {
						font-size:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_WFS;?>px;
						font-family:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_WFF;?>;
					}
					/* Calendar Days */
					.monthly-day, .monthly-day-blank {
						box-shadow: 0 0 0 <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_GW;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_GrCol;?> !important;
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_DBgCol;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_DCol;?> !important;
					}
					/* Days that are part of previous or next month */
					.monthly-day-blank {
						background:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_BgCol;?>;
					}
					.monthly-day-event > .monthly-day-number {
						font-size:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_DFS;?>px;
						<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_NumPos;?>: 2px;
					}
					.monthly-today .monthly-day-number {
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_TCol;?>;
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_TNBgCol;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_TFS;?>px;
						<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_NumPos;?>: 2px;
					}
					.monthly-today{
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_TBgCol;?>;
					}
					/* Increase font & spacing over larger size */
					@media (min-width: 400px) {
						.monthly-day-number {
							top: 5px;
							<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_NumPos;?>: 5px;
							font-size: 13px;
						}
					}
					.TotalSoftRefresh
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_RefIcSize;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_RefIcCol;?>;
					}
					.TotalSoftArrow
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_ArrowSize;?>px !important;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_ArrowCol;?>;
					}
					.monthly-day:hover
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_HovBgCol;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal_HovCol;?> !important;
						border-bottom: 0px !important;
					}
					.TotalSoftcalEvent_1_Media
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_09;?>%;
						height: auto;
						display: inline !important;	
						margin: 0 auto !important;					
					}
					.TotalSoftcalEvent_1_Mediadiv
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_09;?>%;
						position: relative;
						display: inline-block;
					}
					.TotalSoftcalEvent_1_Mediadiv:after
					{
						padding-top: 56.25% !important;
						/* 16:9 ratio */
						display: block;
						content: '';
					}
					.TotalSoftcalEvent_1_Mediaiframe
					{
						width: 100% !important;
						height: 100% !important;
						left: 0;
						position: absolute;
					}
					.monthly-event-list .listed-event-title
					{
						color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_03;?> !important;
						font-size: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>px !important;
						font-family: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> !important;
						text-align: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_04;?> !important;
					}
					.monthly-event-list .listed-event-title:hover
					{
						color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_03;?> !important;
					}
					.monthly-day .monthly-event-indicator
					{
						color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_03;?> !important;
					}
					@media screen and (max-width: 400px) {
						.TotalSoftcalEvent_1_Media, .TotalSoftcalEvent_1_Mediadiv { width: 100% !important;	}
					}
					@media screen and (max-width: 700px) {
						.TotalSoftcalEvent_1_Media, .TotalSoftcalEvent_1_Mediadiv {	width: 100% !important;	}
					}
				</style>
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
				<div class="page">
					<input type="text" style="display:none;" id="TotalSoftCal_ArrowLeft" value="<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_ArrowLeft;?>">
					<input type="text" style="display:none;" id="TotalSoftCal_ArrowRight" value="<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_ArrowRight;?>">
					<input type="text" style="display:none;" id="totalsoftcal_<?php echo $Total_Soft_Cal;?>_1" value="<?php echo $Total_Soft_Cal;?>">
					<div style="width:99.96%; max-width:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_MW;?>px; display:block; margin: 10px auto 40px;">
						<div class="monthly" id="totalsoftcal_<?php echo $Total_Soft_Cal;?>"></div>
					</div>
				</div>
				<!-- JS ======================================================= -->
				<script type="text/javascript">
					(function($) {
						$.fn.extend({
							monthly: function(options) {
								// These are overridden by options declared in footer
								var defaults = {
									weekStart: 'Mon',
									mode: '',
									xmlUrl: '',
									target: '',
									eventList: true,
									maxWidth: false,
									setWidth: false,
									startHidden: false,
									showTrigger: '',
									stylePast: false,
									disablePast: false
								}

								var options = $.extend(defaults, options),
									that = this,
									uniqueId = $(this).attr('id'),
									d = new Date(),
									currentMonth = d.getMonth() + 1,
									currentYear = d.getFullYear(),
									currentDay = d.getDate(),
									monthNames = options.monthNames || ['<?php echo __( 'Jan', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Feb', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Mar', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Apr', 'Total-Soft-Calendar' );?>', '<?php echo __( 'May', 'Total-Soft-Calendar' );?>', '<?php echo __( 'June', 'Total-Soft-Calendar' );?>', '<?php echo __( 'July', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Aug', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Sep', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Oct', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Nov', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Dec', 'Total-Soft-Calendar' );?>'],
									dayNames = options.dayNames || ['<?php echo __( 'Sun', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Mon', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Tue', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Wed', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Thu', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Fri', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Sat', 'Total-Soft-Calendar' );?>'];
							if (options.maxWidth != false){
								$('#'+uniqueId).css('maxWidth',options.maxWidth);
							}
							if (options.setWidth != false){
								$('#'+uniqueId).css('width',options.setWidth);
							}
							if (options.startHidden == true){
								$('#'+uniqueId).addClass('monthly-pop').css({
									'position' : 'absolute',
									'display' : 'none'
								});
								$(document).on('focus', ''+options.showTrigger+'', function (e) {
									$('#'+uniqueId).show();
									e.preventDefault();
								});
								$(document).on('click', ''+options.showTrigger+', .monthly-pop', function (e) {
									e.stopPropagation();
									e.preventDefault();
								});
								$(document).on('click', function (e) {
									$('#'+uniqueId).hide();
								});
							}
							if (options.weekStart == 'Sun') {
								$('#' + uniqueId).append('<div class="monthly-day-title-wrap"><div>'+dayNames[0]+'</div><div>'+dayNames[1]+'</div><div>'+dayNames[2]+'</div><div>'+dayNames[3]+'</div><div>'+dayNames[4]+'</div><div>'+dayNames[5]+'</div><div>'+dayNames[6]+'</div></div><div class="monthly-day-wrap"></div>');
							} else{
								$('#' + uniqueId).append('<div class="monthly-day-title-wrap"><div>'+dayNames[1]+'</div><div>'+dayNames[2]+'</div><div>'+dayNames[3]+'</div><div>'+dayNames[4]+'</div><div>'+dayNames[5]+'</div><div>'+dayNames[6]+'</div><div>'+dayNames[0]+'</div></div><div class="monthly-day-wrap"></div>');
							}
							var TotalSoftCal_ArrowLeft=jQuery('#TotalSoftCal_ArrowLeft').val();
							var TotalSoftCal_ArrowRight=jQuery('#TotalSoftCal_ArrowRight').val();
							$('#' + uniqueId).prepend('<div class="monthly-header"><div class="monthly-header-title"></div><a href="#" class="monthly-prev"><i class="TotalSoftArrow '+TotalSoftCal_ArrowLeft+'"></i></a><a href="#" class="monthly-next"><i class="TotalSoftArrow '+TotalSoftCal_ArrowRight+'"></i></a></div>').append('<div class="monthly-event-list"></div>');
							function daysInMonth(m, y){
								return m===2?y&3||!(y%25)&&y&15?28:29:30+(m+(m>>3)&1);
							}
							function setMonthly(m, y){
								$('#' + uniqueId).data('setMonth', m).data('setYear', y);
								var dayQty = daysInMonth(m, y),
									mZeroed = m -1,
									firstDay = new Date(y, mZeroed, 1, 0, 0, 0, 0).getDay();
								$('#' + uniqueId + ' .monthly-day, #' + uniqueId + ' .monthly-day-blank').remove();
								$('#'+uniqueId+' .monthly-event-list').empty();
								$('#'+uniqueId+' .monthly-day-wrap').empty();
								if (options.mode == 'event') {
									for(var i = 0; i < dayQty; i++) {
										var day = i + 1; 
										var dayNamenum = new Date(y, mZeroed, day, 0, 0, 0, 0).getDay()
										$('#' + uniqueId + ' .monthly-day-wrap').append('<a href="#" class="m-d monthly-day monthly-day-event" data-number="'+day+'"><div class="monthly-day-number">'+day+'</div><div class="monthly-indicator-wrap"></div></a>');
										$('#' + uniqueId + ' .monthly-event-list').append('<div class="monthly-list-item" id="'+uniqueId+'day'+day+'" data-number="'+day+'"><div class="monthly-event-list-date">'+dayNames[dayNamenum]+'<br>'+day+'</div></div>');
									}
								} else {
									for(var i = 0; i < dayQty; i++) {
										var day = i + 1;
										if(((day < currentDay && m === currentMonth) || y < currentYear || (m < currentMonth && y == currentYear)) && options.stylePast == true){
												$('#' + uniqueId + ' .monthly-day-wrap').append('<a href="#" class="m-d monthly-day monthly-day-pick monthly-past-day" data-number="'+day+'"><div class="monthly-day-number">'+day+'</div><div class="monthly-indicator-wrap"></div></a>');
										} else {
											$('#' + uniqueId + ' .monthly-day-wrap').append('<a href="#" class="m-d monthly-day monthly-day-pick" data-number="'+day+'"><div class="monthly-day-number">'+day+'</div><div class="monthly-indicator-wrap"></div></a>');
										}
									}
								}
								var setMonth = $('#' + uniqueId).data('setMonth'),
									setYear = $('#' + uniqueId).data('setYear');
								if (setMonth == currentMonth && setYear == currentYear) {
									$('#' + uniqueId + ' *[data-number="'+currentDay+'"]').addClass('monthly-today');
								}
								if (setMonth == currentMonth && setYear == currentYear) {
									$('#' + uniqueId + ' .monthly-header-title').html(monthNames[m - 1] +' '+ y);
								} else {
									$('#' + uniqueId + ' .monthly-header-title').html(monthNames[m - 1] +' '+ y +'<a href="#" class="monthly-reset" title="<?php echo __( 'Back To This Month', 'Total-Soft-Calendar' );?>"><i class="TotalSoftRefresh totalsoft totalsoft-refresh"></i></a> ');
								}
								if(options.weekStart == 'Sun' && firstDay != 7) {
									for(var i = 0; i < firstDay; i++) {
										$('#' + uniqueId + ' .monthly-day-wrap').prepend('<div class="m-d monthly-day-blank"><div class="monthly-day-number"></div></div>');
									}
								} else if (options.weekStart == 'Mon' && firstDay == 0) {
									for(var i = 0; i < 6; i++) {
										$('#' + uniqueId + ' .monthly-day-wrap').prepend('<div class="m-d monthly-day-blank" ><div class="monthly-day-number"></div></div>');
									}
								} else if (options.weekStart == 'Mon' && firstDay != 1) {
									for(var i = 0; i < (firstDay - 1); i++) {
										$('#' + uniqueId + ' .monthly-day-wrap').prepend('<div class="m-d monthly-day-blank" ><div class="monthly-day-number"></div></div>');
									}
								}
								var numdays = $('#' + uniqueId + ' .monthly-day').length,
									numempty = $('#' + uniqueId + ' .monthly-day-blank').length,
									totaldays = numdays + numempty,
									roundup = Math.ceil(totaldays/7) * 7,
									daysdiff = roundup - totaldays;
								if(totaldays % 7 != 0) {
									for(var i = 0; i < daysdiff; i++) {
										$('#' + uniqueId + ' .monthly-day-wrap').append('<div class="m-d monthly-day-blank"><div class="monthly-day-number"></div></div>');
									}
								}
								if (options.mode == 'event') {
									$.get(''+options.xmlUrl+'', function(d){
										<?php for($i=0;$i<count($Total_Soft_CalEvents);$i++){
											$TotalSoftCal_EvStartDate=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate);
											if($TotalSoftCal_EvStartDate[1][0]==0)
											{
												$TotalSoftCal_EvStartDate[1]=$TotalSoftCal_EvStartDate[1][1];
											}
											if($TotalSoftCal_EvStartDate[2][0]==0)
											{
												$TotalSoftCal_EvStartDate[2]=$TotalSoftCal_EvStartDate[2][1];
											}
											$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate=implode('-',$TotalSoftCal_EvStartDate);

											$TotalSoftCal_EvEndDate=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate);
											if($TotalSoftCal_EvEndDate[1][0]==0)
											{
												$TotalSoftCal_EvEndDate[1]=$TotalSoftCal_EvEndDate[1][1];
											}
											if($TotalSoftCal_EvEndDate[2][0]==0)
											{
												$TotalSoftCal_EvEndDate[2]=$TotalSoftCal_EvEndDate[2][1];
											}
											$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate=implode('-',$TotalSoftCal_EvEndDate);
											if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab=='none')
											{
												$Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab='';
											} 
											$Total_Soft_CalEventDesc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftCal_EvCal=%s order by id",$Total_Soft_CalEvents[$i]->id));
											// echo html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);    
											$TotalSoftEventData=$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate . 'TSCEv' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate . 'TSCEv' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . 'TSCEv' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . 'TSCEv' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvColor . 'TSCEv' . $Total_Soft_CalEvents[$i]->id . 'TSCEv' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime . 'TSCEv' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime . 'TSCEv' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . 'TSCEv' . html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc) . 'TSCEv' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . 'TSCEv' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . 'TSCEv' . $TotalSoftCal_Part[0]->TotalSoftCal_10 . 'TSCEv' . $TotalSoftCal_Part[0]->TotalSoftCal_05;
											?>
												var CalData='<?php echo $TotalSoftEventData;?>'.split('TSCEv');
												var fullstartDate = CalData[0],
												startArr = fullstartDate.split("-"),
												startYear = startArr[0],
												startMonth = parseInt(startArr[1], 10),
												startDay = parseInt(startArr[2], 10),
												fullendDate = CalData[1],
												endArr = fullendDate.split("-"),
												endYear = endArr[0],
												endMonth = parseInt(endArr[1], 10),
												endDay = parseInt(endArr[2], 10),
												eventURL = CalData[2],
												eventTitle = CalData[3],
												eventColor = CalData[4],
												eventId = CalData[5],
												startTime = CalData[6],
												startSplit = startTime.split(":");
												endTime = CalData[7],
												endSplit = endTime.split(":");
												eventLink = '',
												startPeriod = 'AM',
												endPeriod = 'AM',
												eventDesc = CalData[9],
												eventImg = CalData[10],
												eventVid = CalData[11],
												eventImgP = CalData[12],
												eventTime = CalData[13];
												if(fullendDate == '--' || fullendDate == '')
												{
													fullendDate = '';
												}
												if(eventTime == '12')
												{
													if(parseInt(startSplit[0]) >= 12) {
														if(parseInt(startSplit[0]) >= 22)
														{
															var startTime = (startSplit[0] - 12)+':'+startSplit[1]+'';
														}
														else
														{
															var startTime = '0'+(startSplit[0] - 12)+':'+startSplit[1]+'';
														}
														var startPeriod = 'PM'
													}
													if(parseInt(startTime) == 0) {
														var startTime = '12:'+startSplit[1]+'';
													}
													if(parseInt(endSplit[0]) >= 12) {
														if(parseInt(endSplit[0]) >= 22)
														{
															var endTime = (endSplit[0] - 12)+':'+endSplit[1]+'';
														}
														else
														{
															var endTime = '0'+(endSplit[0] - 12)+':'+endSplit[1]+'';
														}
														var endPeriod = 'PM'
													}
													if(parseInt(endTime) == 0) {
														var endTime = '12:'+endSplit[1]+'';
													}
												}
												else
												{
													startPeriod = '';
													endPeriod = '';
												}													
													
												if (eventURL){
													var eventLink = 'href="'+eventURL+'"';
												}
												function multidaylist(){
													var timeHtml = '';
													if (startTime){
														var startTimehtml = '<div><div class="monthly-list-time-start">'+startTime+' '+startPeriod+'</div>';
														var endTimehtml = '';
														if (endTime){
															var endTimehtml = '<div class="monthly-list-time-end">'+endTime+' '+endPeriod+'</div>';
														}
														var timeHtml = startTimehtml + endTimehtml + '</div>';
													}
													$('#'+uniqueId+' .monthly-list-item[data-number="'+i+'"]').addClass('item-has-event').append('<a href="'+eventURL+'" target="'+CalData[8]+'" class="listed-event listed-event-title"  data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+' '+timeHtml+'</a>');
													if(eventImg)
													{
														if(eventImgP == 'before')
														{
															if(!eventVid)
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+i+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><img src="'+eventImg+'" class="TotalSoftcalEvent_1_Media"></div>');
															}
															else
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+i+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><div class="TotalSoftcalEvent_1_Mediadiv"><iframe src="'+eventVid+'" class="TotalSoftcalEvent_1_Mediaiframe" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>');
															}
														}
													}
													if(eventDesc)
													{
														$('#'+uniqueId+' .monthly-list-item[data-number="'+i+'"]').addClass('item-has-event').append('<span class="listed-event-desc" data-eventid="'+ eventId +'" style="background:'+eventColor+'">'+eventDesc+'</span>');
													}
													if(eventImg)
													{
														if(eventImgP == 'after')
														{
															if(!eventVid)
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+i+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><img src="'+eventImg+'" class="TotalSoftcalEvent_1_Media"></div>');
															}
															else
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+i+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><div class="TotalSoftcalEvent_1_Mediadiv"><iframe src="'+eventVid+'" class="TotalSoftcalEvent_1_Mediaiframe" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>');
															}
														}
													}														
												}

												if (!fullendDate && startMonth == setMonth && startYear == setYear) {
													$('#'+uniqueId+' *[data-number="'+startDay+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator"  data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+'</div>');
													var timeHtml = '';
													if (startTime){
														var startTimehtml = '<div><div class="monthly-list-time-start">'+startTime+' '+startPeriod+'</div>';
														var endTimehtml = '';
														if (endTime){
															var endTimehtml = '<div class="monthly-list-time-end">'+endTime+' '+endPeriod+'</div>';
														}
														var timeHtml = startTimehtml + endTimehtml + '</div>';
													}
													$('#'+uniqueId+' .monthly-list-item[data-number="'+startDay+'"]').addClass('item-has-event').append('<a href="'+eventURL+'" target="'+CalData[8]+'" class="listed-event listed-event-title"  data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+' '+timeHtml+'</a>');
													if(eventImg)
													{
														if(eventImgP == 'before')
														{
															if(!eventVid)
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+startDay+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><img src="'+eventImg+'" class="TotalSoftcalEvent_1_Media"></div>');
															}
															else
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+startDay+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><div class="TotalSoftcalEvent_1_Mediadiv"><iframe src="'+eventVid+'" class="TotalSoftcalEvent_1_Mediaiframe" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>');
															}
														}
													}
													if(eventDesc)
													{
														$('#'+uniqueId+' .monthly-list-item[data-number="'+startDay+'"]').addClass('item-has-event').append('<span class="listed-event listed-event-desc" data-eventid="'+ eventId +'" style="background:'+eventColor+'">'+eventDesc+'</span>');
													}
													if(eventImg)
													{
														if(eventImgP == 'after')
														{
															if(!eventVid)
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+startDay+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><img src="'+eventImg+'" class="TotalSoftcalEvent_1_Media"></div>');
															}
															else
															{
																$('#'+uniqueId+' .monthly-list-item[data-number="'+startDay+'"]').addClass('item-has-event').append('<div style="position: relative; width: 100%; margin: 10px auto; text-align: center;"><div class="TotalSoftcalEvent_1_Mediadiv"><iframe src="'+eventVid+'" class="TotalSoftcalEvent_1_Mediaiframe" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>');
															}
														}
													}

												} else if (startMonth == setMonth && startYear == setYear && endMonth == setMonth && endYear == setYear){
													for(var i = parseInt(startDay); i <= parseInt(endDay); i++) {
														if (i == parseInt(startDay)) {
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+'</div>');
														} else {
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'"></div>');
														}
														multidaylist();
													}
												} else if ((endMonth == setMonth && endYear == setYear) && ((startMonth < setMonth && startYear == setYear) || (startYear < setYear))) {
													for(var i = 0; i <= parseInt(endDay); i++) {
														if (i==1){
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+'</div>');
														} else {
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'"></div>');
														}
														multidaylist();
													}
												} else if ((startMonth == setMonth && startYear == setYear) && ((endMonth > setMonth && endYear == setYear) || (endYear > setYear))){
													for(var i = parseInt(startDay); i <= dayQty; i++) {
														if (i == parseInt(startDay)) {
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+'</div>');
														} else {
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'"></div>');
														}
														multidaylist();
													}
												} else if (((startMonth < setMonth && startYear == setYear) || (startYear < setYear)) && ((endMonth > setMonth && endYear == setYear) || (endYear > setYear))){
													for(var i = 0; i <= dayQty; i++) {
														if (i == 1){
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'">'+eventTitle+'</div>');
														} else {
															$('#'+uniqueId+' *[data-number="'+i+'"] .monthly-indicator-wrap').append('<div class="monthly-event-indicator" data-eventid="'+ eventId +'" style="background:'+eventColor+'" title="'+eventTitle+'"></div>');
														}
														multidaylist();
													}
												}
										<?php } ?>
									}).fail(function() {
										console.error('Error Data...');
									});
								}
								var divs = $("#"+uniqueId+" .m-d");
								for(var i = 0; i < divs.length; i+=7) {
								  divs.slice(i, i+7).wrapAll("<div class='monthly-week'></div>");
								}
							}
							setMonthly(currentMonth, currentYear);
							function viewToggleButton(){
								if($('#'+uniqueId+' .monthly-event-list').is(":visible")) {
									$('#'+uniqueId+' .monthly-cal').remove();
									$('#'+uniqueId+' .monthly-header-title').prepend('<a href="#" class="monthly-cal" title="<?php echo __( 'Back To Month View', 'Total-Soft-Calendar' );?>"><div></div></a>');
								}
							}
							$(document.body).on('click', '#'+uniqueId+' .monthly-next', function (e) {
								var setMonth = $('#' + uniqueId).data('setMonth'),
									setYear = $('#' + uniqueId).data('setYear');
								if (setMonth == 12) {
									var newMonth = 1,
										newYear = setYear + 1;
									setMonthly(newMonth, newYear);
								} else {
									var newMonth = setMonth + 1,
										newYear = setYear;
									setMonthly(newMonth, newYear);
								}
								viewToggleButton();
								e.preventDefault();
							});
							$(document.body).on('click', '#'+uniqueId+' .monthly-prev', function (e) {
								var setMonth = $('#' + uniqueId).data('setMonth'),
									setYear = $('#' + uniqueId).data('setYear');
								if (setMonth == 1) {
									var newMonth = 12,
										newYear = setYear - 1;
									setMonthly(newMonth, newYear);
								} else {
									var newMonth = setMonth - 1,
										newYear = setYear;
									setMonthly(newMonth, newYear);
								}
								viewToggleButton();
								e.preventDefault();
							});
							$(document.body).on('click', '#'+uniqueId+' .monthly-reset', function (e) {
								setMonthly(currentMonth, currentYear);
								viewToggleButton();
								e.preventDefault();
								e.stopPropagation();
							});
							$(document.body).on('click', '#'+uniqueId+' .monthly-cal', function (e) {
								$(this).remove();
									$('#' + uniqueId+' .monthly-event-list').css('transform','scale(0)').delay('800').hide();
								e.preventDefault();
							});
							$(document.body).on('click', '#'+uniqueId+' a.monthly-day', function (e) {
								if(options.mode == 'event' && options.eventList == true) {
									var whichDay = $(this).data('number');
									$('#' + uniqueId+' .monthly-event-list').show();
									$('#' + uniqueId+' .monthly-event-list').css('transform');
									$('#' + uniqueId+' .monthly-event-list').css('transform','scale(1)');
									$('#' + uniqueId+' .monthly-list-item[data-number="'+whichDay+'"]').show();
									var myElement = document.getElementById(uniqueId+'day'+whichDay);
									var topPos = myElement.offsetTop;
									//document.getElementByClassname('scrolling_div').scrollTop = topPos;
									$('#'+uniqueId+' .monthly-event-list').scrollTop(topPos);
									viewToggleButton();
								} 
								e.preventDefault();
							});
							$(document.body).on('click', '#'+uniqueId+' .listed-event', function (e) {
								var href = $(this).attr('href');
								if(!href) {
									e.preventDefault();
								}
							});
							}
						});
					})(jQuery);
					jQuery(window).load( function() {
						jQuery('#totalsoftcal_<?php echo $Total_Soft_Cal;?>').monthly({
							mode: 'event',
							weekStart: '<?php echo $TotalSoftCal_Par[0]->TotalSoftCal_WDStart;?>',
						});
					});   
				</script>
	 		<?php } else if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='Simple Calendar'){ ?>
	 			<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
			    <link rel="stylesheet" href="<?php echo plugins_url('../CSS/jquery.e-calendar.css',__FILE__);?>"/>
			    <script type="text/javascript" src="<?php echo plugins_url('../JS/Total-Soft-Calendar-Widget.js',__FILE__);?>"></script>
			    <style type="text/css">
			    	#calendar_<?php echo $Total_Soft_Cal;?>.TotalSoftSimpleCalendar {
					    max-width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_W;?>px;
					    height: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_H;?>px;
					    border: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BW;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BS;?> <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BC;?>;
					    <?php if($TotalSoftCal_Par[0]->TotalSoftCal2_BxShShow=='Yes'){ ?>
						    <?php if($TotalSoftCal_Par[0]->TotalSoftCal2_BxShType=='1'){ ?>
								-webkit-box-shadow: 0 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxSh;?>px -18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxSh;?>px -18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxShC;?>;
								box-shadow: 0 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxSh;?>px -18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxShC;?>;
						    <?php }else{ ?> <?php ?>
						    	-webkit-box-shadow: 0px 0px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxSh;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxSh;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxShC;?>;
								box-shadow: 0px 0px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxSh;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_BxShC;?>;
						    <?php }?>
						<?php }?>
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_DBgC;?>;
						margin: 30px auto;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-grid-title 
					{
    					background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_MBgC;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-month
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_MC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_MFS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_MFF;?>;
					}
					/* Events List custom webkit scrollbar */
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-list::-webkit-scrollbar {width: 9px;}
					/* Track */
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-list::-webkit-scrollbar-track {background: none;}
					/* Handle */
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-list::-webkit-scrollbar-thumb {
						background:<?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_TC;?>;
						border:1px solid #E9EBEC;
						border-radius: 10px;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-list::-webkit-scrollbar-thumb:hover {background:#cecece;}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-week-day 
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_WBgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_WC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_WFS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_WFF;?>;
						border-bottom: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_LAW_W;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_LAW_S;?> <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_LAW_C;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-day
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_DBgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_DC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_DFS;?>px;
						font-family: open_sanslight,Helvetica,Arial,sans-serif;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-today 
					{
					    background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_TdBgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_TdC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_TdFS;?>px;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_EdBgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_EdC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_EdFS;?>px;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-over 
					{
					    background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_HBgC;?>;
					    color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_HC;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-previous, #calendar_<?php echo $Total_Soft_Cal;?> .c-next
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_ArrFS;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_ArrC;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-day-previous-month, #calendar_<?php echo $Total_Soft_Cal;?> .c-day-next-month
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_OmBgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_OmC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_OmFS;?>px;
						font-family: open_sanslight,Helvetica,Arial,sans-serif;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-title 
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_HBgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_HC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_HFS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_HFF;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-body
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_BBgC;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .c-event-item > .title, #calendar_<?php echo $Total_Soft_Cal;?> .c-event-item > .title a 
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_TC;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_TFS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_TFF;?>;
						text-align: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .monthly-list-item:after{
					    content:"<?php echo __( 'No Events', 'Total-Soft-Calendar' );?>";
					    padding:4px 10px;
					    display:block;
					    margin-bottom:5px;
					}	
					#calendar_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_2_Media
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>%;
						height: auto;
						display: inline !important;	
						margin: 0 auto !important;					
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_2_Mediadiv
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>%;
						position: relative;
						display: inline-block;
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_2_Mediadiv:after
					{
						padding-top: 56.25% !important;
						/* 16:9 ratio */
						display: block;
						content: '';
					}
					#calendar_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_2_Mediaiframe
					{
						width: 100% !important;
						height: 100% !important;
						left: 0;
						position: absolute;
					}
					@media screen and (max-width: 400px) {
						.TotalSoftcalEvent_2_Media, .TotalSoftcalEvent_2_Mediadiv { width: 100% !important;	}
					}
					@media screen and (max-width: 700px) {
						.TotalSoftcalEvent_2_Media, .TotalSoftcalEvent_2_Mediadiv {	width: 100% !important;	}
					}			
			    </style>
			    <div id="calendar_<?php echo $Total_Soft_Cal;?>"></div>
			    <script type="text/javascript">
			    	jQuery(document).ready(function () {
					    jQuery('#calendar_<?php echo $Total_Soft_Cal;?>').eCalendar({
							weekDays: ['<?php echo __( 'Sun', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Mon', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Tue', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Wed', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Thu', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Fri', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Sat', 'Total-Soft-Calendar' );?>'],
					        months: ['<?php echo __( 'January', 'Total-Soft-Calendar' );?>', '<?php echo __( 'February', 'Total-Soft-Calendar' );?>', '<?php echo __( 'March', 'Total-Soft-Calendar' );?>', '<?php echo __( 'April', 'Total-Soft-Calendar' );?>', '<?php echo __( 'May', 'Total-Soft-Calendar' );?>', '<?php echo __( 'June', 'Total-Soft-Calendar' );?>', '<?php echo __( 'July', 'Total-Soft-Calendar' );?>', '<?php echo __( 'August', 'Total-Soft-Calendar' );?>', '<?php echo __( 'September', 'Total-Soft-Calendar' );?>', '<?php echo __( 'October', 'Total-Soft-Calendar' );?>', '<?php echo __( 'November', 'Total-Soft-Calendar' );?>', '<?php echo __( 'December', 'Total-Soft-Calendar' );?>'],
					        textArrows: {previous: '<i class="totalsoft totalsoft-<?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_ArrType;?>-left"></i>', next: '<i class="totalsoft totalsoft-<?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_ArrType;?>-right"></i>'},
					        eventTitle: '<?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_Ev_HText;?>',
					        url: '',
					        events: [
					        	<?php for($i=0;$i<count($Total_Soft_CalEvents);$i++){
									$TotalSoftCal_EvStartDate=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate);
									if($TotalSoftCal_EvStartDate[1][0]==0)
									{
										$TotalSoftCal_EvStartDate[1]=$TotalSoftCal_EvStartDate[1][1];
									}
									if($TotalSoftCal_EvStartDate[2][0]==0)
									{
										$TotalSoftCal_EvStartDate[2]=$TotalSoftCal_EvStartDate[2][1];
									}
									$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate=implode('-',$TotalSoftCal_EvStartDate);

									$TotalSoftCal_EvEndDate=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate);
									if($TotalSoftCal_EvEndDate[1][0]==0)
									{
										$TotalSoftCal_EvEndDate[1]=$TotalSoftCal_EvEndDate[1][1];
									}
									if($TotalSoftCal_EvEndDate[2][0]==0)
									{
										$TotalSoftCal_EvEndDate[2]=$TotalSoftCal_EvEndDate[2][1];
									}
									$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate=implode('-',$TotalSoftCal_EvEndDate);
									if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab=='none')
									{
										$Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab='';
									} 
									$Total_Soft_CalEventDesc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftCal_EvCal=%s order by id",$Total_Soft_CalEvents[$i]->id));
									$TotalSoftCal_EvStartDateSplit=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate);
									$TotalSoftCal_EvStartTimeSplit=explode(':',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime);
									$TotalSoftCal_EvEndDateSplit=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate);

									?>
					            	{title: '<?php echo html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName);?>', description: '<?php if($Total_Soft_CalEventDesc){ echo html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);}?>', datetime: new Date(<?php echo $TotalSoftCal_EvStartDateSplit[0];?>, <?php echo $TotalSoftCal_EvStartDateSplit[1]-1;?>, <?php echo $TotalSoftCal_EvStartDateSplit[2];?>), endtime: '<?php echo $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime?>', eventurl: "<?php echo $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL?>", eventnewtab: "<?php echo $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab?>", enddateyear: "<?php echo $TotalSoftCal_EvEndDateSplit[0];?>", enddatemonth: "<?php echo $TotalSoftCal_EvEndDateSplit[1]-1;?>", enddateday: "<?php echo $TotalSoftCal_EvEndDateSplit[2];?>", timeformat: '<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_04;?>', enddatereal: "<?php echo $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate;?>", eventimg: "<?php echo $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg;?>", eventvid: "<?php echo $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src;?>", eventvidpos: "<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_03;?>", realstarttime: "<?php echo $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime;?>"},
								<?php }?>
					        ],
					        firstDayOfWeek: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal2_WDStart;?>
					    });
					});
			    </script>
			<?php } else if($TotalSoftCal_Type[0]->TotalSoftCal_Type=='Flexible Calendar'){ ?>
	 			<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/calendar.css',__FILE__);?>" />
				<style type="text/css">
					.tscalcontainer_<?php echo $Total_Soft_Cal;?> > header, .main_<?php echo $Total_Soft_Cal;?>
					{
						max-width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_MW;?>px;
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal3_BoxShShow=='Yes'){ ?>
						    <?php if($TotalSoftCal_Par[0]->TotalSoftCal3_BoxShType=='1'){ ?>
								-webkit-box-shadow: 0 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxSh;?>px -18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxSh;?>px -18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxShC;?>;
								box-shadow: 0 30px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxSh;?>px -18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxShC;?>;
						    <?php }else{ ?> <?php ?>
						    	-webkit-box-shadow: 0px 0px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxSh;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxSh;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxSh;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BoxShC;?>;
						    <?php }?>
						<?php }?>
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div:empty 
					{
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BgC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div:empty:hover
					{
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BgC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row 
					{
						border-bottom: 1px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_GrC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div 
					{
						border-right: 1px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_GrC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-body 
					{
						border: 1px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_BBC;?>;
					}
					.custom-header_<?php echo $Total_Soft_Cal;?>
					{
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_BgC;?>;
						border-top: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_BTW;?>px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_BTC;?>;
						border-bottom: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_LAH_W;?>px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_LAH_C;?>;
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> h3
					{
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_FF;?> !important;
						text-transform: none !important;						
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> h3.custom-data_<?php echo $Total_Soft_Cal;?>
					{
						position: relative;
					    top: 50%;
					    -ms-transform: translateY(-50%);
					    -webkit-transform: translateY(-50%);
					    -moz-transform: translateY(-50%);
					    -o-transform: translateY(-50%);
					    transform: translateY(-50%);
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> .custom-month
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_MFS;?>px !important;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_MC;?> !important;
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> .custom-year
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_YFS;?>px !important;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_H_YC;?> !important;
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> nav i
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Arr_S;?>px;
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> nav i:before
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Arr_C;?>;
					}
					.custom-header_<?php echo $Total_Soft_Cal;?> nav i:hover:before 
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Arr_HC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-head {
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_WD_BgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_WD_C;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_WD_FS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_WD_FF;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div 
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_D_BgC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div > span.fc-date
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_D_C;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div.fc-today 
					{
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_TD_BgC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div.fc-today > span.fc-date 
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_TD_C;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div:hover
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_HD_BgC;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div:hover span.fc-date
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_HD_C;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div.fc-content:after
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_ED_C;?>;
					}
					.fc-calendar-container_<?php echo $Total_Soft_Cal;?> .fc-calendar .fc-row > div.fc-content:hover:after
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_ED_HC;?>;
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?> h4 
					{
						border-top: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_BTW;?>px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_BTC;?>;
						background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_BgC;?>;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_C;?> !important;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_FS;?>px;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_FF;?>;
						border-bottom: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_LAH_W;?>px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_LAH_C;?>;
						text-transform: none !important;
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?> i.custom-content-close
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_C_C;?>;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_C_FS;?>px;
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?> i.custom-content-close:hover
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_C_HC;?>;
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?> 
					{
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_B_BgC;?>;
						border: 1px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_B_BC;?>;
						border-top: none;
						overflow: auto;
					}
					.TotalSoftcalEvent_Title_<?php echo $Total_Soft_Cal;?>
					{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_T_FS;?>px !important;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_T_FF;?> !important;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_T_C;?> !important;
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_T_BgC;?> !important;
						text-align: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_T_TA;?> !important;
						padding: 5px 10px !important;
						margin: 10px 0 !important;
					}
					.TotalSoftcalEvent_Link_<?php echo $Total_Soft_Cal;?>
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_C;?> !important;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_FS;?>px !important;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_FF;?> !important;
						border: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_BW;?>px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_BC;?> !important;
						border-radius: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_BR;?>px !important;
						padding: 5px 10px !important;
						box-shadow: none !important;
					}
					.TotalSoftcalEvent_LinkMar_<?php echo $Total_Soft_Cal;?>
					{
						margin: 0px 10px;
					}
					.TotalSoftcalEvent_Link_<?php echo $Total_Soft_Cal;?>:hover
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_HC;?> !important;
						text-decoration: none;
					}
					.TotalSoftcalEvent_Media_<?php echo $Total_Soft_Cal;?>
					{
						width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_I_W;?>%;
						height: auto;
						display: inline !important;
					}
					.TotalSoftcalEvent_Mediadiv_<?php echo $Total_Soft_Cal;?>
					{
						width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_I_W;?>%;
						position: relative;
						display: inline-block;
					}
					.TotalSoftcalEvent_Mediadiv_<?php echo $Total_Soft_Cal;?>:after
					{
						padding-top: 56.25% !important;
						/* 16:9 ratio */
						display: block;
						content: '';
					}
					.TotalSoftcalEvent_Mediaiframe_<?php echo $Total_Soft_Cal;?>
					{
						width: 100% !important;
						height: 100% !important;
						left: 0;
						position: absolute;
					}
					.TotalSoftcalEvent_LAE_<?php echo $Total_Soft_Cal;?>
					{
						width: 85%;
						position: relative;
						margin: 10px auto !important;
						border-top: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_LAE_W;?>px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_LAE_C;?>;
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?>::-webkit-scrollbar
					{
					    width: 10px;
					}					 
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?>::-webkit-scrollbar-track 
					{
					    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?>::-webkit-scrollbar-thumb 
					{
					  	background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_BTC;?>;
					  	outline: 1px solid slategrey;
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?>::-moz-scrollbar
					{
					    width: 10px;
					}					 
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?>::-moz-scrollbar-track 
					{
					    -moz-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
					}
					#custom-content-reveal_<?php echo $Total_Soft_Cal;?>::-moz-scrollbar-thumb 
					{
					  	background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_BTC;?>;
					  	outline: 1px solid slategrey;
					}
				</style>
				<script src="<?php echo plugins_url('../JS/modernizr.custom.63321.js',__FILE__);?>"></script>
				<div class="container tscalcontainer tscalcontainer_<?php echo $Total_Soft_Cal;?>">	
					<section class="main main_<?php echo $Total_Soft_Cal;?>">
						<div class="custom-calendar-wrap">
							<div id="custom-inner_<?php echo $Total_Soft_Cal;?>" class="custom-inner">
								<div class="custom-header clearfix custom-header_<?php echo $Total_Soft_Cal;?>">
									<nav>
										<i id="custom-prev_<?php echo $Total_Soft_Cal;?>" class="totalsoft totalsoft-<?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Arr_Type;?>-left "></i>
										<i id="custom-next_<?php echo $Total_Soft_Cal;?>" class="totalsoft totalsoft-<?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Arr_Type;?>-right"></i>
									</nav>
									<?php if($TotalSoftCal_Par[0]->TotalSoftCal3_H_Format=='1'){ ?>
										<h3 id="custom-year_<?php echo $Total_Soft_Cal;?>" class="custom-year"></h3>
										<h3 id="custom-month_<?php echo $Total_Soft_Cal;?>" class="custom-month"></h3>
									<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal3_H_Format=='2'){ ?>
										<h3 id="custom-month_<?php echo $Total_Soft_Cal;?>" class="custom-month"></h3>
										<h3 id="custom-year_<?php echo $Total_Soft_Cal;?>" class="custom-year"></h3>
									<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal3_H_Format=='3'){ ?>
										<h3 class="custom-data_<?php echo $Total_Soft_Cal;?>">
											<span id="custom-year_<?php echo $Total_Soft_Cal;?>" class="custom-year"></span>
											<span id="custom-month_<?php echo $Total_Soft_Cal;?>" class="custom-month"></span>
										</h3>
									<?php }else{ ?>
										<h3 class="custom-data_<?php echo $Total_Soft_Cal;?>">
											<span id="custom-month_<?php echo $Total_Soft_Cal;?>" class="custom-month"></span>
											<span id="custom-year_<?php echo $Total_Soft_Cal;?>" class="custom-year"></span>
										</h3>
									<?php }?>
									
								</div>
								<div id="calendar_<?php echo $Total_Soft_Cal;?>" class="fc-calendar-container fc-calendar-container_<?php echo $Total_Soft_Cal;?>"></div>
							</div>
						</div>
					</section>
				</div><!-- /container -->
				<script type="text/javascript" src="<?php echo plugins_url('../JS/jquery.calendario.js',__FILE__);?>"></script>
				
				<script type="text/javascript">
					var codropsEvents_<?php echo $Total_Soft_Cal;?> = {
						<?php for($i=0;$i<count($Total_Soft_CalEvents_Date_Real);$i++){ ?>
							'<?php echo $Total_Soft_CalEvents_Date_Real[$i];?>' : '<?php echo $Total_Soft_CalEvents_Desc_Real[$i];?>',			            	
						<?php }?>
					};
				</script>
				<script type="text/javascript">	
					jQuery(function() {	
						var transEndEventNames = {
								'WebkitTransition' : 'webkitTransitionEnd',
								'MozTransition' : 'transitionend',
								'OTransition' : 'oTransitionEnd',
								'msTransition' : 'MSTransitionEnd',
								'transition' : 'transitionend'
							},
							transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
							$wrapper = jQuery( '#custom-inner_<?php echo $Total_Soft_Cal;?>' ),
							$calendar = jQuery( '#calendar_<?php echo $Total_Soft_Cal;?>' ),
							cal = $calendar.calendario( {
								onDayClick : function( $el, $contentEl, dateProperties ) {
									if( $contentEl.length > 0 ) {
										showEvents( $contentEl, dateProperties );
									}
								},
								caldata : codropsEvents_<?php echo $Total_Soft_Cal;?>,								
								weekabbrs : [ '<?php echo __( 'Sun', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Mon', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Tue', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Wed', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Thu', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Fri', 'Total-Soft-Calendar' );?>', '<?php echo __( 'Sat', 'Total-Soft-Calendar' );?>' ],
								months : [ '<?php echo __( 'January', 'Total-Soft-Calendar' );?>', '<?php echo __( 'February', 'Total-Soft-Calendar' );?>', '<?php echo __( 'March', 'Total-Soft-Calendar' );?>', '<?php echo __( 'April', 'Total-Soft-Calendar' );?>', '<?php echo __( 'May', 'Total-Soft-Calendar' );?>', '<?php echo __( 'June', 'Total-Soft-Calendar' );?>', '<?php echo __( 'July', 'Total-Soft-Calendar' );?>', '<?php echo __( 'August', 'Total-Soft-Calendar' );?>', '<?php echo __( 'September', 'Total-Soft-Calendar' );?>', '<?php echo __( 'October', 'Total-Soft-Calendar' );?>', '<?php echo __( 'November', 'Total-Soft-Calendar' );?>', '<?php echo __( 'December', 'Total-Soft-Calendar' );?>' ],
								displayWeekAbbr : true,
								displayMonthAbbr : false,
								startIn : <?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_WDStart;?>,
							} ),
							$month = jQuery( '#custom-month_<?php echo $Total_Soft_Cal;?>' ).html( cal.getMonthName() ),
							$year = jQuery( '#custom-year_<?php echo $Total_Soft_Cal;?>' ).html( cal.getYear() );
						jQuery( '#custom-next_<?php echo $Total_Soft_Cal;?>' ).on( 'click', function() {
							cal.gotoNextMonth( updateMonthYear );
						} );
						jQuery( '#custom-prev_<?php echo $Total_Soft_Cal;?>' ).on( 'click', function() {
							cal.gotoPreviousMonth( updateMonthYear );
						} );
						function updateMonthYear() {				
							$month.html( cal.getMonthName() );
							$year.html( cal.getYear() );
						}
						// just an example..
						function showEvents( $contentEl, dateProperties ) {
							hideEvents();
							<?php if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_Format == '1'){ ?> 
								var $events = jQuery( '<div id="custom-content-reveal_<?php echo $Total_Soft_Cal;?>" class="custom-content-reveal"><h4>' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>' ),
							<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_Format == '2'){ ?>
								var $events = jQuery( '<div id="custom-content-reveal_<?php echo $Total_Soft_Cal;?>" class="custom-content-reveal"><h4>' + dateProperties.year + ' ' + dateProperties.monthname  + ' ' + dateProperties.day + '</h4></div>' ),
							<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal3_Ev_Format == '3'){ ?>
								var $events = jQuery( '<div id="custom-content-reveal_<?php echo $Total_Soft_Cal;?>" class="custom-content-reveal"><h4>' + dateProperties.day + ' ' + dateProperties.monthname + ' ' + dateProperties.year + '</h4></div>' ),
							<?php }?>							
								$close = jQuery( '<i class="custom-content-close totalsoft totalsoft-<?php echo $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_C_Type;?>"></i>' ).on( 'click', hideEvents );
							$events.append( $contentEl.html() , $close ).insertAfter( $wrapper );
							setTimeout( function() {
								$events.css( 'top', '0%' );
							}, 25 );
						}
						function hideEvents() {
							var $events = jQuery( '#custom-content-reveal_<?php echo $Total_Soft_Cal;?>' );
							if( $events.length > 0 ) {
								$events.css( 'top', '100%' );
								Modernizr.csstransitions ? $events.on( transEndEventName, function() { jQuery( this ).remove(); } ) : $events.remove();
							}
						}
					});
				</script>
			<?php } else if($TotalSoftCal_Type[0]->TotalSoftCal_Type == 'TimeLine Calendar'){ ?>
			<?php
				$Total_Soft_CalEvents_Date = array();
				$Total_Soft_CalEvents_Desc = array();
				$Total_Soft_CalEvents_Date_Real = array();
				$Total_Soft_CalEvents_Desc_Real = array();

				for($i=0;$i<count($Total_Soft_CalEvents);$i++)
				{ 
					if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab == 'none')
					{
						$Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab = '';
					} 
					$Total_Soft_CalEventDesc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE TotalSoftCal_EvCal=%s order by id",$Total_Soft_CalEvents[$i]->id));
					$TotalSoftcalEvent = '<div class = "layout1">';
					
					if($TotalSoftCal_Part[0]->TotalSoftCal_11 == '1') // Media Before Title
					{
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Iframe != '')
						{
							$TotalSoftcalEvent .= '<div style="position: relative; width: 99%; margin: 5px auto; text-align: center;">';
							if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src == '')
							{
								$TotalSoftcalEvent .= '<img src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . '" class="TotalSoftcalEvent_Media TotalSoftcalEvent_Media_' . $Total_Soft_Cal .'">';
							}
							else
							{
								$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_Mediadiv TotalSoftcalEvent_Mediadiv_' . $Total_Soft_Cal .'"><iframe src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . '" class="TotalSoftcalEvent_Mediaiframe TotalSoftcalEvent_Mediaiframe_' . $Total_Soft_Cal .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
							}
							$TotalSoftcalEvent .= '</div>';
						}
					}

					if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL != '')
					{
						if($TotalSoftCal_Part[0]->TotalSoftCal_14 == '1') // Link Before Title
						{
							$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Part[0]->TotalSoftCal_15 . '</a>';
							$TotalSoftcalEvent .= '<h3>' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</h3>';
						}
						else if($TotalSoftCal_Part[0]->TotalSoftCal_14 == '2') // Link After Title
						{
							$TotalSoftcalEvent .= '<h3>' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</h3>';
							$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Part[0]->TotalSoftCal_15 . '</a>';
						}
						else if($TotalSoftCal_Part[0]->TotalSoftCal_14 == '3') // Link After Title Text
						{
							$TotalSoftcalEvent .= '<h3>' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkMar TotalSoftcalEvent_LinkMar_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Part[0]->TotalSoftCal_15 . '</a></h3>';
						}
						else
						{
							$TotalSoftcalEvent .= '<h3>' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</h3>';
						}
					}
					else
					{
						$TotalSoftcalEvent .= '<h3>' . html_entity_decode($Total_Soft_CalEvents[$i]->TotalSoftCal_EvName) . '</h3>';
					}	

					if($TotalSoftCal_Part[0]->TotalSoftCal_11 == '2') // Media After Title
					{
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Iframe != '')
						{								
							$TotalSoftcalEvent .= '<div style="position: relative; width: 99%; margin: 5px auto; text-align: center;">';
							if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src == '')
							{
								$TotalSoftcalEvent .= '<img src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . '" class="TotalSoftcalEvent_Media TotalSoftcalEvent_Media_' . $Total_Soft_Cal .'">';
							}
							else
							{
								$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_Mediadiv TotalSoftcalEvent_Mediadiv_' . $Total_Soft_Cal .'"><iframe src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . '" class="TotalSoftcalEvent_Mediaiframe TotalSoftcalEvent_Mediaiframe_' . $Total_Soft_Cal .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
							}
							$TotalSoftcalEvent .= '</div>';
						}
					}

					if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL != '')
					{	
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc != '')
						{							
							if($TotalSoftCal_Part[0]->TotalSoftCal_14 == '4') // Link After Description
							{
								$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);
								$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Part[0]->TotalSoftCal_15 . '</a>';
							}
							else if($TotalSoftCal_Part[0]->TotalSoftCal_14 == '5') // Link After Description Text
							{
								$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc) . '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkMar TotalSoftcalEvent_LinkMar_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Part[0]->TotalSoftCal_15 . '</a>';
							}
							else
							{
								$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);
							}
						}
						else
						{
							$TotalSoftcalEvent .= '<a class="TotalSoftcalEvent_Link TotalSoftcalEvent_Link_' . $Total_Soft_Cal .' TotalSoftcalEvent_LinkBl TotalSoftcalEvent_LinkBl_' . $Total_Soft_Cal .'" href="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURL . '" target="' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvURLNewTab . '">' . $TotalSoftCal_Par[0]->TotalSoftCal3_Ev_L_Text . '</a>';
						}
					}
					else
					{
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc != '')
						{
							$TotalSoftcalEvent .= html_entity_decode($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvDesc);
						}
					}
						
					if($TotalSoftCal_Part[0]->TotalSoftCal_11 == '3') // Media After Description
					{
						if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Iframe != '')
						{								
							$TotalSoftcalEvent .= '<div style="position: relative; width: 99%; margin: 10px auto; text-align: center;">';
							if($Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src == '')
							{
								$TotalSoftcalEvent .= '<img src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvImg . '" class="TotalSoftcalEvent_Media TotalSoftcalEvent_Media_' . $Total_Soft_Cal .'">';
							}
							else
							{
								$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_Mediadiv TotalSoftcalEvent_Mediadiv_' . $Total_Soft_Cal .'"><iframe src="' . $Total_Soft_CalEventDesc[0]->TotalSoftCal_EvVid_Src . '" class="TotalSoftcalEvent_Mediaiframe TotalSoftcalEvent_Mediaiframe_' . $Total_Soft_Cal .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
							}
							$TotalSoftcalEvent .= '</div>';
						}
					}

					$TotalSoftcalEvent .= '</div>';

					$FltimestartPeriod = 'AM';
					$FltimeendPeriod = 'AM';
					if($TotalSoftCal_Part[0]->TotalSoftCal_04 == '12')
	                {
	                	$TotalSoftCal_EvStartTimeSplit=explode(':',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime);
	                	$TotalSoftCal_EvEndTimeSplit=explode(':',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime);
	                    if($TotalSoftCal_EvStartTimeSplit[0] >= 12) 
	                    {
	                        if($TotalSoftCal_EvStartTimeSplit[0] >= 22)
	                        {
	                            $FlCstartTime = ($TotalSoftCal_EvStartTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvStartTimeSplit[1];
	                        }
	                        else
	                        {
	                            $FlCstartTime = '0' . ($TotalSoftCal_EvStartTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvStartTimeSplit[1];
	                        }
	                        $FltimestartPeriod = 'PM';
	                    }
	                    else
	                    {
	                        $FlCstartTime = $TotalSoftCal_EvStartTimeSplit[0] . ':' . $TotalSoftCal_EvStartTimeSplit[1];
	                    }
	                    if($FlCstartTime == 0) {
	                        $FlCstartTime = '12:' . $TotalSoftCal_EvStartTimeSplit[1];
	                    }
	                    $timeFlcalreal = $FlCstartTime . ' ' . $FltimestartPeriod;

	                    if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != '' &&  $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime)
	                    {
	                        if($TotalSoftCal_EvEndTimeSplit[0] >= 12) {
	                            if($TotalSoftCal_EvEndTimeSplit[0] >= 22)
	                            {
	                                $FlCendTime = ($TotalSoftCal_EvEndTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvEndTimeSplit[1];
	                            }
	                            else
	                            {
	                                $FlCendTime = '0'+($TotalSoftCal_EvEndTimeSplit[0] - 12) . ':' . $TotalSoftCal_EvEndTimeSplit[1];
	                            }
	                            $FltimeendPeriod = 'PM';
	                        }
	                        else
	                        {
	                            $FlCendTime = $TotalSoftCal_EvEndTimeSplit[0] . ':' . $TotalSoftCal_EvEndTimeSplit[1];;
	                        }
	                        if($FlCendTime == 0) {
	                            $FlCendTime = '12:' . $TotalSoftCal_EvEndTimeSplit[1];
	                        }
	                        $timeFlcalreal .= ' - ' . $FlCendTime . ' ' . $FltimeendPeriod;
	                    }
	                }
	                else
	                {
	                    $FltimestartPeriod = '';
						$FltimeendPeriod = '';

	                    $timeFlcalreal = $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime;
	                    if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != '' &&  $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime != $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime)
	                    {
	                        $timeFlcalreal .= ' - ' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndTime;
	                    }
	                }

	                $TotalSoftCal_EvStartDateSplit=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate);
	                $TotalSoft_Date_Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	                $TotalSoftCal_EvEndDateSplit=explode('-',$Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate);

	                if($TotalSoftCal_Part[0]->TotalSoftCal_03 == 'yy-mm-dd')
	                {
	                	$TotalSoftCal_EvStartDate = implode('-',$TotalSoftCal_EvStartDateSplit);
	                	if($TotalSoftCal_EvEndDateSplit)
	                	{
	                		$TotalSoftCal_EvEndDate = implode('-',$TotalSoftCal_EvEndDateSplit);
	                	}
	                }
	                else if($TotalSoftCal_Part[0]->TotalSoftCal_03 == 'yy MM dd')
	                {
	                	$TotalSoftCal_EvStartDate = $TotalSoftCal_EvStartDateSplit[0] . ' ' . $TotalSoft_Date_Months[intval($TotalSoftCal_EvStartDateSplit[1])-1] . ' ' . $TotalSoftCal_EvStartDateSplit[2];
	                	if($TotalSoftCal_EvEndDateSplit)
	                	{
	                		$TotalSoftCal_EvEndDate = $TotalSoftCal_EvEndDateSplit[0] . ' ' . $TotalSoft_Date_Months[intval($TotalSoftCal_EvEndDateSplit[1])-1] . ' ' . $TotalSoftCal_EvEndDateSplit[2];
	                	}
	                }
	                else if($TotalSoftCal_Part[0]->TotalSoftCal_03 == 'dd-mm-yy')
	                {
						$TotalSoftCal_EvStartDate = $TotalSoftCal_EvStartDateSplit[2] . '-' . $TotalSoftCal_EvStartDateSplit[1] . '-' . $TotalSoftCal_EvStartDateSplit[0];
	                	if($TotalSoftCal_EvEndDateSplit)
	                	{
	                		$TotalSoftCal_EvEndDate = $TotalSoftCal_EvEndDateSplit[2] . '-' . $TotalSoftCal_EvEndDateSplit[1] . '-' . $TotalSoftCal_EvEndDateSplit[0];
	                	}
	                }
	                else if($TotalSoftCal_Part[0]->TotalSoftCal_03 == 'dd MM yy')
	                {
	                	$TotalSoftCal_EvStartDate = $TotalSoftCal_EvStartDateSplit[2] . ' ' . $TotalSoft_Date_Months[intval($TotalSoftCal_EvStartDateSplit[1])-1] . ' ' . $TotalSoftCal_EvStartDateSplit[0];
	                	if($TotalSoftCal_EvEndDateSplit)
	                	{
	                		$TotalSoftCal_EvEndDate = $TotalSoftCal_EvEndDateSplit[2] . ' ' . $TotalSoft_Date_Months[intval($TotalSoftCal_EvEndDateSplit[1])-1] . ' ' . $TotalSoftCal_EvEndDateSplit[0];
	                	}
	                }
	                else if($TotalSoftCal_Part[0]->TotalSoftCal_03 == 'mm-dd-yy')
	                {
	                	$TotalSoftCal_EvStartDate = $TotalSoftCal_EvStartDateSplit[1] . '-' . $TotalSoftCal_EvEndDateSplit[2] . '-' . $TotalSoftCal_EvEndDateSplit[0];
	                	if($TotalSoftCal_EvEndDateSplit)
	                	{
	                		$TotalSoftCal_EvEndDate = $TotalSoftCal_EvEndDateSplit[1] . '-' . $TotalSoftCal_EvEndDateSplit[2] . '-' . $TotalSoftCal_EvEndDateSplit[0];
	                	}
	                }
	                else if($TotalSoftCal_Part[0]->TotalSoftCal_03 == 'MM dd, yy')
	                {
	                	$TotalSoftCal_EvStartDate = $TotalSoft_Date_Months[intval($TotalSoftCal_EvStartDateSplit[1])-1] . ' ' . $TotalSoftCal_EvStartDateSplit[2] . ', ' . $TotalSoftCal_EvStartDateSplit[0];
	                	if($TotalSoftCal_EvEndDateSplit)
	                	{
	                		$TotalSoftCal_EvEndDate = $TotalSoft_Date_Months[intval($TotalSoftCal_EvEndDateSplit[1])-1] . ' ' . $TotalSoftCal_EvEndDateSplit[2] . ', ' . $TotalSoftCal_EvEndDateSplit[0];
	                	}
	                }

					$TotalSoftcalEvent .= '<span class = "date"><i class = "totalsoft totalsoft-' . $TotalSoftCal_Part[0]->TotalSoftCal_27 . '" style="background: ' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvColor . '"></i>';					

					if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate == $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate || $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate == '--' || $Total_Soft_CalEvents[$i]->TotalSoftCal_EvEndDate == '')
					{
						$TotalSoftcalEvent .= '<span style="background: ' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvColor . '">'. $TotalSoftCal_EvStartDate;

						if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime != '')
						{
							$TotalSoftcalEvent .= '<span style="margin-left: 10px;">' . $timeFlcalreal . '</span>';
						}

						$TotalSoftcalEvent .= '</span>';
					}
					else
					{
						$TotalSoftcalEvent .= '<span style="background: ' . $Total_Soft_CalEvents[$i]->TotalSoftCal_EvColor . '">' . $TotalSoftCal_EvStartDate . " / " . $TotalSoftCal_EvEndDate;

						if($Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartTime != '')
						{
							$TotalSoftcalEvent .= '<span style="margin-left: 10px;">' . $timeFlcalreal . '</span>';
						}

						$TotalSoftcalEvent .= '</span>';
					}	

					$TotalSoftcalEvent .= '</span>';

					$TotalSoftcalEvent .= '<div class="TotalSoftcalEvent_LAE TotalSoftcalEvent_LAE_' . $Total_Soft_Cal .'"></div>';
					array_push($Total_Soft_CalEvents_Date, $Total_Soft_CalEvents[$i]->TotalSoftCal_EvStartDate);
					array_push($Total_Soft_CalEvents_Desc, $TotalSoftcalEvent);
				}
				for($i=0;$i<count($Total_Soft_CalEvents_Date);$i++)
				{
					if($Total_Soft_CalEvents_Date[$i] != '' || $Total_Soft_CalEvents_Date[$i] != null)
					{
						for($j=$i; $j<count($Total_Soft_CalEvents_Date);$j++)
						{
							if($Total_Soft_CalEvents_Date[$i] === $Total_Soft_CalEvents_Date[$j+1])
							{
								$Total_Soft_CalEvents_Date[$j+1] = '';
								$Total_Soft_CalEvents_Desc[$i] = $Total_Soft_CalEvents_Desc[$i] . $Total_Soft_CalEvents_Desc[$j+1];
								$Total_Soft_CalEvents_Desc[$j+1] = '';
							}
						}	
					}	
				}
				for($i=0;$i<count($Total_Soft_CalEvents_Date);$i++)
				{
					if($Total_Soft_CalEvents_Date[$i] != '')
					{
						array_push($Total_Soft_CalEvents_Date_Real, $Total_Soft_CalEvents_Date[$i]);
						array_push($Total_Soft_CalEvents_Desc_Real, $Total_Soft_CalEvents_Desc[$i]);
					}
				}				
			?>
				<style type="text/css">					
					/********** Normal Styles ***************/
					.TimleLIne_TS_Cal, .TimleLIne_TS_Cal *
					{
						-moz-box-sizing : border-box;
						-webkit-box-sizing : border-box;
						box-sizing : border-box;	
						line-height: 1.3 !important;
						letter-spacing: 0 !important;
					}
					.TimleLIne_TS_Cal a
					{
						text-decoration: none;
						border-bottom: 0px !important;
						box-shadow: none !important;
						-moz-box-shadow: none !important;
						-webkit-box-shadow: none !important;
					}
					.TimleLIne_TS_Cal a:focus
					{
						outline: none !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>
					{
						max-width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_01;?>px;
						width: 100%;
						margin: 10px auto;
						position: relative;
						border: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_05;?>px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_04;?> <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_06;?>;
						z-index: 0;
					}					
					<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type1') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> {
							box-shadow: 0 10px 6px -6px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 0 10px 6px -6px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 0 10px 6px -6px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type2') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						   	z-index: -1;
						   	position: absolute;
						   	content: "";
						   	bottom: 15px;
						   	left: 10px;
						  	width: 50%;
						  	top: 80%;
						  	max-width:300px;
						  	background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						 	-webkit-box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						 	-moz-box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	transform: rotate(-3deg);
						  	-moz-transform: rotate(-3deg);
						  	-webkit-transform: rotate(-3deg);
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						  	transform: rotate(3deg);
						  	-moz-transform: rotate(3deg);
						  	-webkit-transform: rotate(3deg);
						  	right: 10px;
						  	left: auto;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type3') { ?>
					  	.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before
						{
						  	z-index: -1;
						  	position: absolute;
						  	content: "";
						  	bottom: 15px;
						  	left: 10px;
						  	width: 50%;
						  	top: 80%;
						  	max-width:300px;
						  	background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-webkit-box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-moz-box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	transform: rotate(-3deg);
						  	-moz-transform: rotate(-3deg);
						  	-webkit-transform: rotate(-3deg);
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type4') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						  	z-index: -1;
						  	position: absolute;
						  	content: "";
						  	bottom: 15px;
						  	right: 10px;
						  	left: auto;
						  	width: 50%;
						  	top: 80%;
						  	max-width:300px;
						  	background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-webkit-box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-moz-box-shadow: 0 15px 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	transform: rotate(3deg);
						  	-moz-transform: rotate(3deg);
						  	-webkit-transform: rotate(3deg);
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type5') {  ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						  	z-index: -1;
						  	position: absolute;
						  	content: "";
						  	bottom: 25px;
						  	left: 10px;
						  	width: 50%;
						  	top: 80%;
						  	max-width:300px;
						  	background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	box-shadow: 0 35px 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-webkit-box-shadow: 0 35px 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-moz-box-shadow: 0 35px 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	transform: rotate(-8deg);
						  	-moz-transform: rotate(-8deg);
						  	-webkit-transform: rotate(-8deg);
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						  	transform: rotate(8deg);
						  	-moz-transform: rotate(8deg);
						  	-webkit-transform: rotate(8deg);
						  	right: 10px;
						  	left: auto;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type6') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>
						{
						  	position:relative;       
						    box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						    -webkit-box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						    -moz-box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
							content:"";
						    position:absolute; 
						    z-index:-1;
						    box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    -webkit-box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    -moz-box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    top:50%;
						    bottom:0;
						    left:10px;
						    right:10px;
						    border-radius:100px / 10px;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type7') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>
						{
						    position:relative;
						    box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						    -webkit-box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						    -moz-box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
							content:"";
						    position:absolute; 
						    z-index:-1;
						    box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    -webkit-box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    -moz-box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    top:0;
						    bottom:0;
						    left:10px;
						    right:10px;
						    border-radius:100px / 10px;
						} 
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						    right:10px; 
						    left:auto; 
						    transform:skew(8deg) rotate(3deg);
						    -moz-transform:skew(8deg) rotate(3deg);
						    -webkit-transform:skew(8deg) rotate(3deg);
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type8') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>
						{
						    position:relative;
						    box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						    -webkit-box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						    -moz-box-shadow:0 1px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>, 0 0 40px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?> inset;
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
							content:"";
						    position:absolute; 
						    z-index:-1;
						    box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    -webkit-box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    -moz-box-shadow:0 0 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						    top:10px;
						    bottom:10px;
						    left:0;
						    right:0;
						    border-radius:100px / 10px;
						} 
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after
						{
						    right:10px; 
						    left:auto; 
						    transform:skew(8deg) rotate(3deg);
						    -moz-transform:skew(8deg) rotate(3deg);
						    -webkit-transform:skew(8deg) rotate(3deg);
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type9') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:before, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after{
						  	position:absolute;
						  	content:"";
						  	box-shadow:0 10px 25px 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-webkit-box-shadow:0 10px 25px 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	-moz-box-shadow:0 10px 25px 20px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						  	top:40px;left:50px;bottom:50px;
						  	width:15%;
						  	z-index:-1;
						 	-webkit-transform: rotate(-8deg);
						 	-moz-transform: rotate(-8deg);
						  	transform: rotate(-8deg);
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>:after{
						    -webkit-transform: rotate(8deg);
						    -moz-transform: rotate(8deg);
						    transform: rotate(8deg);
						    right: 50px;left: auto;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type10') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 0 0 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 0 0 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 0 0 10px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type11') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 4px -4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 4px -4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 4px -4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type12') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 5px 5px 3px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 5px 5px 3px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 5px 5px 3px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type13') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 2px 2px white, 4px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 2px 2px white, 4px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type14') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 8px 8px 18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 8px 8px 18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 8px 8px 18px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type15') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 0 8px 6px -6px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 0 8px 6px -6px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 0 8px 6px -6px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'type16') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: 0 0 18px 7px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-moz-box-shadow: 0 0 18px 7px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
							-webkit-box-shadow: 0 0 18px 7px <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_03;?>;
						}
					<?php } else if($TotalSoftCal_Par[0]->TotalSoftCal4_02 == 'none') { ?>
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							box-shadow: none !important;
							-moz-box-shadow: none !important;
							-webkit-box-shadow: none !important;
						}
					<?php } ?>
					/********** Style for the month year bar ***************/
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar
					{
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'transparent'){ ?>
							background: transparent !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'color'){ ?>
							background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient1'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>;
						    background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient2'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>;  
						    background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: -o-linear-gradient(right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: -moz-linear-gradient(right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient3'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>;  
						    background: -webkit-linear-gradient(left top, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: -o-linear-gradient(bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: -moz-linear-gradient(bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						    background: linear-gradient(to bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient4'){ ?>
							background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient5'){ ?>
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -o-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -moz-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient6'){ ?>
							background: -webkit-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 20%);
						    background: -o-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 20%);
						    background: -moz-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 20%);
						    background: repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 20%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient7'){ ?>
							background: -webkit-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: -o-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: -moz-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient8'){ ?>
							background: -webkit-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: -o-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: -moz-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient9'){ ?>
							background: -webkit-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: -o-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: -moz-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						    background: repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient10'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient11'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 60%);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 60%);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 60%);
						    background: radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 60%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient12'){ ?>
							background: -webkit-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -o-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: -moz-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						    background: radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_07 == 'gradient13'){ ?>
							background: -webkit-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 15%);
						    background: -o-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 15%);
						    background: -moz-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 15%);
						    background: repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_09;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_08;?> 15%);
						<?php }?>
						display: block;
						float: left;
						width: 100%;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_10;?>px;
						font-weight: 300;
						padding: 5px;
						-webkit-touch-callout: none;
						-webkit-user-select: none;
						-khtml-user-select: none;
						-moz-user-select: none;
						-ms-user-select: none;
						user-select: none;
						cursor: default;
						position: relative;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .prev, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .next{
						padding:  0 12px;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_15;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_16;?>;
						cursor: pointer;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .prev:hover, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .next:hover
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_17;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .year{
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_12 == 'format1'){ ?>
							float: left;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_12 == 'format2'){ ?>
							float: right;
						<?php }?>
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .yearmonth{
						text-align: center;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .year span
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_13;?>;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_11;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .month-year-bar .month{
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_12 == 'format1'){ ?>
							float: right;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_12 == 'format2'){ ?>
							float: left;
						<?php }?>
						padding: 0 12px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_18;?>;
						font-family: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_11;?>;						
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_LAH
					{
						width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_20;?>%;
						height: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_21;?>px;
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_19;?>;
						margin: 0 auto;
						position: absolute;
						bottom: 0;
						left: <?php echo intval(50-$TotalSoftCal_Par[0]->TotalSoftCal4_20/2);?>%;
						z-index: 10;
					}
					/********** Style for the bar containing dates ***************/
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar{
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'transparent'){ ?>
							background: transparent !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'color'){ ?>
							background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient1'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;
						    background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient2'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;  
						    background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -o-linear-gradient(right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -moz-linear-gradient(right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient3'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;  
						    background: -webkit-linear-gradient(left top, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -o-linear-gradient(bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -moz-linear-gradient(bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: linear-gradient(to bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient4'){ ?>
							background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient5'){ ?>
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient6'){ ?>
							background: -webkit-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						    background: -o-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						    background: -moz-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						    background: repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient7'){ ?>
							background: -webkit-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -o-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -moz-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient8'){ ?>
							background: -webkit-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -o-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -moz-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient9'){ ?>
							background: -webkit-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -o-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -moz-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient10'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient11'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						    background: radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient12'){ ?>
							background: -webkit-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient13'){ ?>
							background: -webkit-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						    background: -o-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						    background: -moz-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						    background: repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						<?php }?>
						display : block;
						width : 100%;
						padding : 0 50px;
						position : relative;
						font-size : 0;
						white-space : nowrap;
						overflow : hidden;
							-webkit-touch-callout: none;
						-webkit-user-select: none;
						-khtml-user-select: none;
						-moz-user-select: none;
						-ms-user-select: none;
						user-select: none;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a{
						display: block;
						height: 70px;
						width: 70px;
						text-align : center;
						display : inline-block;
						border-right : 1px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_25;?>;
						cursor : pointer !important;
						transition : color .2s, transform .2s;
						-webkit-transition : color .2s, transform .2s;
						-moz-transition : color .2s, transform .2s;
						z-index : 0;
						perspective: 800px;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a:last-child
					{
						border-right: none !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a:hover{
						color : <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_27;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a span{
						transition : color .2s, transform .2s;
						-webkit-transition : color .2s, -webkit-transform .2s;
						-moz-transition : color .2s, -moz-transform .2s;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.noevent{
						display : none;
						width : 100%;
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_26;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_27;?>;
					    line-height: 70px !important;
						border-right: none !important;
					}					
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.selected>span.date{
						transform : scale(1.1, 1.1);
						-moz-transform : scale(1.1, 1.1);
						-webkit-transform : scale(1.1, 1.1);
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_30;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.selected>span.month{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_31;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.prev, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.next{
						position : absolute;
						top : 0;
						width : 50px;
						min-width : 0;
						font-size : <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_33;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_34;?>;
						line-height : 70px !important;
						z-index : 2;
						display : inline-block;
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'transparent'){ ?>
							background: transparent !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'color'){ ?>
							background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient1'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;
						    background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient2'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;  
						    background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -o-linear-gradient(right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -moz-linear-gradient(right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient3'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;  
						    background: -webkit-linear-gradient(left top, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -o-linear-gradient(bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: -moz-linear-gradient(bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						    background: linear-gradient(to bottom right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient4'){ ?>
							background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient5'){ ?>
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-linear-gradient(left, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient6'){ ?>
							background: -webkit-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						    background: -o-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						    background: -moz-repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						    background: repeating-linear-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 20%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient7'){ ?>
							background: -webkit-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -o-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -moz-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient8'){ ?>
							background: -webkit-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -o-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -moz-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient9'){ ?>
							background: -webkit-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -o-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: -moz-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						    background: repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 7%,<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient10'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient11'){ ?>
							background: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						    background: radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 5%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 15%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 60%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient12'){ ?>
							background: -webkit-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -o-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: -moz-radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						    background: radial-gradient(circle, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_22 == 'gradient13'){ ?>
							background: -webkit-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						    background: -o-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						    background: -moz-repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						    background: repeating-radial-gradient(<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?>, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_24;?> 10%, <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_23;?> 15%);
						<?php }?>
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.prev:hover, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.next:hover
					{
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_35;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar .month span{
					    display: inline-block;
					    min-width: 60px;
					    text-align: center;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.prev{
						left : 0;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a.next{
						right : 0;
						border-left : 1px solid <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_25;?>;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a span.date{
						display : block;
						font-size : <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_26;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_27;?>;
						line-height: 40px !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a span.month{
						font-size: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_28;?>px;
						color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_29;?>
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_LAB
					{
						width: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_37;?>%;
						height: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_38;?>px;
						background-color: <?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_36;?>;
						margin: 0 auto;
						position: absolute;
						bottom: 0;
						left: <?php echo intval(50-$TotalSoftCal_Par[0]->TotalSoftCal4_37/2);?>%;
						z-index: 10;
					}
					/********** Whole style for TimleLIne_TS_Cal_wrap ***************/
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap{
						width : 100%;
						<?php if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'transparent'){ ?>
							background: transparent !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'color'){ ?>
							background-color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> !important;
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient1'){ ?>
							background: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>;
						    background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient2'){ ?>
							background: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>;  
						    background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: -o-linear-gradient(right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: -moz-linear-gradient(right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient3'){ ?>
							background: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>;  
						    background: -webkit-linear-gradient(left top, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: -o-linear-gradient(bottom right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: -moz-linear-gradient(bottom right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						    background: linear-gradient(to bottom right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient4'){ ?>
							background: -webkit-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -o-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -moz-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient5'){ ?>
							background: -webkit-linear-gradient(left, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -o-linear-gradient(left, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -moz-linear-gradient(left, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: linear-gradient(to right, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient6'){ ?>
						    background: -moz-repeating-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, 10%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 20%);
						    background: repeating-linear-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, 10%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 20%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient7'){ ?>
							background: -webkit-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: -o-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: -moz-repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: repeating-linear-gradient(45deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient8'){ ?>
							background: -webkit-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: -o-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: -moz-repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: repeating-linear-gradient(190deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient9'){ ?>
							background: -webkit-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: -o-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: -moz-repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						    background: repeating-linear-gradient(90deg,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 7%,<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 10%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient10'){ ?>
							background: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient11'){ ?>
							background: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>;
						    background: -webkit-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 5%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 15%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 60%);
						    background: -o-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 5%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 15%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 60%);
						    background: -moz-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 5%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 15%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 60%);
						    background: radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 5%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 15%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 60%);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient12'){ ?>
							background: -webkit-radial-gradient(circle, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -o-radial-gradient(circle, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: -moz-radial-gradient(circle, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						    background: radial-gradient(circle, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>);
						<?php }else if($TotalSoftCal_Par[0]->TotalSoftCal4_39 == 'gradient13'){ ?>
							background: -webkit-repeating-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 10%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 15%);
						    background: -o-repeating-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 10%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 15%);
						    background: -moz-repeating-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 10%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 15%);
						    background: repeating-radial-gradient(<?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?>, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_02;?> 10%, <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_01;?> 15%);
						<?php }?>
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event{
						overflow: auto;
						display: none;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event.selected{
						display : block;
					}					
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event .date span{
					    color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_24;?>;
					    font-size: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_25;?>px;
					    font-family: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_26;?>;
					    margin-left: -5px;
					    padding: 2px 4px; 
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event .date{
					    display: block;
					    margin: 0 15px;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event .date i{
					    color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_29;?>;
					    font-size: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_28;?>px;
					    height: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_28*2;?>px;
					    width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_28*2;?>px;
					    line-height: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_28*2;?>px !important;
					    text-align: center;
					    border-radius: 50%;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event>.layout1{
						padding : 15px;
						width : 100%;
						display : table;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event p{
						margin: 10px 0 !important;
						line-height: 1.3 !important;
						font-weight: 400 !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TimleLIne_TS_Cal_wrap .TimleLIne_TS_Cal_event h3{
						font-size : <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_05;?>px !important;
						font-family: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_06;?> !important;
						background-color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_07;?> !important;
						color : <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_08;?> !important;
						text-align : <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_09;?> !important;
						text-transform : none !important;
						font-weight: 400 !important;
						padding: 0 12px !important; 
						line-height: 2 !important;
						margin: 10px 0 !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Link_<?php echo $Total_Soft_Cal;?>
					{
						color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_12;?> !important;
						font-size: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_16;?>px !important;
						font-family: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_17;?> !important;
						border: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_19;?>px solid <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_18;?> !important;
						border-radius: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_20;?>px !important;
						padding: 5px 10px !important;
						box-shadow: none !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_LinkMar_<?php echo $Total_Soft_Cal;?>
					{
						margin: 0px 10px;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Link_<?php echo $Total_Soft_Cal;?>:hover
					{
						color: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_13;?> !important;
						text-decoration: none;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Media_<?php echo $Total_Soft_Cal;?>
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_10;?>%;
						height: auto;
						display: inline !important;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Mediadiv_<?php echo $Total_Soft_Cal;?>
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_10;?>%;
						position: relative;
						display: inline-block;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Mediadiv_<?php echo $Total_Soft_Cal;?>:after
					{
						padding-top: 56.25% !important;
						/* 16:9 ratio */
						display: block;
						content: '';
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Mediaiframe_<?php echo $Total_Soft_Cal;?>
					{
						width: 100% !important;
						height: 100% !important;
						left: 0;
						position: absolute;
					}
					.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_LAE_<?php echo $Total_Soft_Cal;?>
					{
						width: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_22;?>%;
						height: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_23;?>px;
						background: <?php echo $TotalSoftCal_Part[0]->TotalSoftCal_21;?>;
						position: relative;
						margin: 10px auto !important;
						z-index: 10;
					}
					/********** Make it responsive ***************/
					@media screen and (max-width:600px) {
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							width : 100%;
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .dates-bar a, .TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>{
							cursor: default !important;
						}
						.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?> .TotalSoftcalEvent_Mediadiv_<?php echo $Total_Soft_Cal;?>
						{
							width: 100%;
						}
					}
				</style>
				<script type = "text/javascript" src="<?php echo plugins_url('../JS/res-timeline.js',__FILE__);?>""></script>
				<div class = "TimleLIne_TS_Cal TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>">
					<input type="text" style="display: none;" id="TimleLIne_TS_Cal_HDF_<?php echo $Total_Soft_Cal;?>" value="<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_12;?>">
					<input type="text" style="display: none;" id="TimleLIne_TS_Cal_YAT_<?php echo $Total_Soft_Cal;?>" value="<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_14;?>">
					<input type="text" style="display: none;" id="TimleLIne_TS_Cal_BAT_<?php echo $Total_Soft_Cal;?>" value="<?php echo $TotalSoftCal_Par[0]->TotalSoftCal4_32;?>">
					<div class = "TimleLIne_TS_Cal_wrap">
						<?php for($i = 0; $i < count($Total_Soft_CalEvents_Date_Real); $i++){ ?>
							<div class = "TimleLIne_TS_Cal_event" data-date = "<?php echo $Total_Soft_CalEvents_Date_Real[$i];?>">
								<?php echo $Total_Soft_CalEvents_Desc_Real[$i];?>
							</div>
						<?php }?>
					</div>
				</div>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						setTimeout(function(){
							jQuery('.TimleLIne_TS_Cal_<?php echo $Total_Soft_Cal;?>').jflatTimeline({scroll : '1', calid : '<?php echo $Total_Soft_Cal;?>'});
						},300)
					})	
				</script>
	 		<?php } 
 		 	echo $after_widget;
 		}
	}
?>