
<link rel="stylesheet" href="jquery2.css" type="text/css" />


<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>


<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
        $(document).ready(function() {
		$('.tooltip2x').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: true,
		interactiveTolerance: 10,
		});
        	
			
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 

<script>
    $(document).ready(function() {

		$('.tooltipx').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		position: 'top',
		interactive: true,
		interactiveTolerance: 25,
		functionReady: function(origin, tooltip) {$(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});$(".iframe2").colorbox({iframe:true, width:"85%", height:"95%"});},
		});

});			
</script> 

<link rel="stylesheet" type="text/css" href="includes/css/portal.css" />

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<?php
require 'config.php';				
				echo "<div style=\"margin-top:9px;	font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none; margin-left: 1px;\">Upcoming TV Shows:<br></div>";
				
				
				// Checking for Missing Episodes
				$feedmissed = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=future&sort=date&type=missed";
				$sbJSON = json_decode(file_get_contents($feedmissed));

				$i = 0;
				foreach($sbJSON->{data}->{missed} as $show) {
					$i = $i + 1;
				}
				//echo "Missed: {$i}<br>";

				if ($i >= 1) {
				
					echo "<font style=\"color:#BF0005; font-size:12px;   \"><b>Missed:</b></font><br>";
					foreach($sbJSON->{data}->{missed} as $show) {

							// Reformat date
							 $newdate = date("l, m/d/y", strtotime($show->{airdate}));
							// Show Details
							$episodio = " s" .sprintf("%02s",$show->{season}). "e".sprintf("%02s",$show->{episode});
							$theid = $show->{tvdbid};
							
							$thebanner = "{$mySickbeardURL}/api/{$mySickbeardAPI}/?cmd=show.getbanner&tvdbid=" .$theid;
							
							$showname = $show->{show_name};
							$episodename = $show->{ep_name};
							
							$theplot = $show->{ep_plot};
							$theplot =  str_replace('"',"'",$theplot) ;	
							$theplot = htmlentities($theplot, ENT_QUOTES, 'UTF-8');

							echo "<a href=\"#\" ><img src=\"" .$thebanner ."\" style=\"width: 353px; border: 1px solid #F00; padding-bottom:0px; padding-left:0px; margin:0px; \" class=\"tooltipx\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}<br>
							<a  class='iframex classpanel2' href='{$mySickbeardURL}/home/displayShow?show={$theid}' target=newtab style='	
																		color: #FFF;
																		background-color: #156199;
																		padding-top: 4px;
																		border-top-style: none;
																		border-right-style: none;
																		border-bottom-style: none;
																		border-left-style: none;
																		padding-right: 8px;
																		padding-bottom: 4px;
																		padding-left: 8px; 
																		font-size: 9pt; 
																		font-weight: bold;
																		margin-left: 0px; ' 
																		>Open in Sickbeard</a>	

							</font>   \" ></a>";
	
							}	
						echo "<br><br>";		
				}
				
				$feedtoday = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=future&sort=date&type=today";
				$sbJSON = json_decode(file_get_contents($feedtoday));

				echo "<font style=\"font-size:12px; font-weight: bold; color:#868686;   \">Today:<br></font>";
				foreach($sbJSON->{data}->{today} as $show) {

						// Reformat date
						 $newdate = date("l, m/d/y", strtotime($show->{airdate}));
						// Show Details
						$episodio = " s" .sprintf("%02s",$show->{season}). "e".sprintf("%02s",$show->{episode});
						$theid = $show->{tvdbid};
						$thebanner = "{$mySickbeardURL}/api/{$mySickbeardAPI}/?cmd=show.getbanner&tvdbid=" .$theid;
						$showname = $show->{show_name};
						
						$episodename = $show->{ep_name};
						$episodename =  str_replace('"',"'",$episodename) ;	
						$episodename = htmlentities($episodename, ENT_QUOTES, 'UTF-8');						
						
						
						$theplot = $show->{ep_plot};
						$theplot =  str_replace('"',"'",$theplot) ;	
						$theplot = htmlentities($theplot, ENT_QUOTES, 'UTF-8');

						echo "<a href=\"#\"  ><img src=\"" .$thebanner ."\" style=\"width: 353px; border: 1px solid #4D4D4D; padding-bottom:0px; padding-left:0px; margin:0px; \" class=\"tooltipx\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}<br>
													<a  class='iframex classpanel2' href='{$mySickbeardURL}/home/displayShow?show={$theid}' target=newtab style='	
																		color: #FFF;
																		background-color: #156199;
																		padding-top: 4px;
																		border-top-style: none;
																		border-right-style: none;
																		border-bottom-style: none;
																		border-left-style: none;
																		padding-right: 8px;
																		padding-bottom: 4px;
																		padding-left: 8px; 
																		font-size: 9pt; 
																		font-weight: bold;
																		margin-left: 0px; ' 
																		>Open in Sickbeard</a>
						
						</font>   \" ></a>";
	
				}
				echo "<br><br>";	

				$feedsoon = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=future&sort=date&type=soon";
				$sbJSON = json_decode(file_get_contents($feedsoon));

				echo "<font style=\"font-size:12px; font-weight: bold; color:#868686;   \">Soon:<br></font>";

	echo  "<div style=\" -moz-column-count: 3;
			-moz-column-gap: 6px;
			-webkit-column-count: 3;
			-webkit-column-gap: 6px;
			column-count: 3;
			column-gap: 6px; \">";				
				
				foreach($sbJSON->{data}->{soon} as $show) {

						// Reformat date
						 $newdate = date("l, m/d/y", strtotime($show->{airdate}));
						// Show Details
						$episodio = " s" .sprintf("%02s",$show->{season}). "e".sprintf("%02s",$show->{episode});
						$theid = $show->{tvdbid};
						$thebanner = "{$mySickbeardURL}/api/{$mySickbeardAPI}/?cmd=show.getbanner&tvdbid=" .$theid;
						$showname = $show->{show_name};
						$episodename = $show->{ep_name};
						
						$theplot = $show->{ep_plot};
						$theplot =  str_replace('"',"'",$theplot) ;	
						$theplot = htmlentities($theplot, ENT_QUOTES, 'UTF-8');

						echo "<li style=\"padding-top: 3px; padding-bottom: 3px; padding-left: 10px; color:#868686 \" >
						<a class=tooltipx  href=\"#\"   
						title=\"<img src={$thebanner} height=44 id=postersingle2 class=postersingle2 ><br><font id=bubble class=bubble>Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br><br>{$theplot}<br>
						
													<a  class='iframex classpanel2' href='{$mySickbeardURL}/home/displayShow?show={$theid}' target=newtab style='	
																		color: #FFF;
																		background-color: #156199;
																		padding-top: 4px;
																		border-top-style: none;
																		border-right-style: none;
																		border-bottom-style: none;
																		border-left-style: none;
																		padding-right: 8px;
																		padding-bottom: 4px;
																		padding-left: 8px; 
																		font-size: 9pt; 
																		font-weight: bold;
																		margin-left: 0px; ' 
																		>Open in Sickbeard</a>
						</font> \"><font style=\" font-size:12px; font-weight: bold; color:#868686;\">{$showname}</a></font></li>";

				}
	echo "</div>";
?>
				