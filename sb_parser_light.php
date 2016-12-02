<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
        $(document).ready(function() {
		$('.tooltip2').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,
		interactiveTolerance: 10,
		});
        	
			
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 
<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<?php
require 'config.php';				
				echo "<div style=\"margin-top:9px;	font-family: Verdana, Geneva, sans-serif; font-size: 10px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none; margin-left: 1px;\">Upcoming TV Shows:<br></div>";
				
				
				// Checking for Missing Episodes
				$feedmissed = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=future&sort=date&type=missed";
				$sbJSON = json_decode(file_get_contents($feedmissed));

				$i = 0;
				foreach($sbJSON->{data}->{missed} as $show) {
					$i = $i + 1;
				}
				//echo "Missed: {$i}<br>";

				if ($i >= 1) {
				
					echo "<font color=\"#BF0005\"><b>Missed:</b></font><br>";
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

							echo "<a href=\"{$mySickbeardURL}/home/displayShow?show={$theid}\" rel='ajaxpanel'><img src=\"" .$thebanner ."\" style=\"width:217px; border: 2px solid #F00; padding-bottom:0px; padding-left:0px; margin:0px; \" class=\"tooltip2\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}</font>   \" ></a>";
	
							}						
				}
				
				$feedtoday = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=future&sort=date&type=today";
				$sbJSON = json_decode(file_get_contents($feedtoday));

				echo "Today:<br>";
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

						echo "<a href=\"{$mySickbeardURL}/home/displayShow?show={$theid}\"  rel='ajaxpanel'><img src=\"" .$thebanner ."\" style=\"width:217px; border: 1px solid #4D4D4D; padding-bottom:0px; padding-left:0px; margin:0px; \" class=\"tooltip2\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}</font>   \" ></a>";
	
				}


				$feedsoon = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=future&sort=date&type=soon";
				$sbJSON = json_decode(file_get_contents($feedsoon));

				echo "Soon:";
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

						echo "<li >
						<a class=tooltip2  href=\"{$mySickbeardURL}/home/displayShow?show={$theid}\"  rel='ajaxpanel' 
						title=\"<img src={$thebanner} height=44 id=postersingle2 class=postersingle2 ><br><font id=bubble class=bubble>Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br><br>{$theplot}</font> \">{$showname}</a></li>";

				}
	
?>
				