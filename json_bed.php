<?php

require 'config.php';
require 'choice.txt';
?>



<script type="text/javascript">
function tab1refresh(){
 document.getElementById("recents").innerHTML='';
 document.getElementById("recents2").innerHTML='';
 document.getElementById("sblight").innerHTML='';
$("#recents").load("xbmc_parser-ipad.php");
$("#recents2").load("xbmc_parse_albums-ipad.php");
$("#sblight").load("sb_parser_light-ipad.php");
}
</script>

<script>
$(document).ready(function(){
  $("#testxbmc").click(function(){
    $("#div2").load("json_bed.php");
	$("#div3").load("json_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pauseplaybed").click(function(){
    $("#div2a").load("playpause_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#playstopbed").click(function(){
    $("#div2a").load("playstop_bed.php");
	$("#div2").load("json_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pauseplayliving").click(function(){
    $("#div3a").load("playpause_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#playstopliving").click(function(){
    $("#div3a").load("playstop_living.php");
	$("#div3").load("json_living.php");
  });
});
</script>


<?php



$myurl0 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22Player.GetActivePlayers%22,%20%22id%22:%20%22mybash%22}";

	$response0 = file_get_contents($myurl0);

	$wawa0 = substr($response0,41);
	$wawa0 = substr($wawa0,0, -2);
	
	$resulted0 = json_decode($wawa0, true);
	
	$hrisplaying = $resulted0['type'];


/* Check to see if this is playing a video and then parse the info for the video. */

	if($hrisplaying == "video"):

		/* It checked for VIDEO, parsing video info */
			$myurl = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%20%22Player.GetItem%22,%20%22params%22:%20{%20%22playerid%22:%201,%20%22properties%22:%20[%22showtitle%22,%20%22thumbnail%22,%20%22art%22]%20},%20%22id%22:%20%22mybash%22}%22";

			$response = file_get_contents($myurl);

			$wawa = substr($response,48);
			$wawa = substr($wawa,0, -2);
			
			$resulted = json_decode($wawa, true);
			
			$hrisittv = $resulted['type'];
		
			if($hrisittv == "episode"):  /* It checked for TV Episode Formatting for that*/
					$hrmovietitle = $resulted['showtitle'];
					
					$hrepisodetitle = $resulted['label'];
					
					$hrthumbnail = $resulted['art']['tvshow.poster'];
					$hrthumbnail2 = urlencode($hrthumbnail);	
					$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;		
					
					$src = $hrthumbnail3;		
			else:
					$hrmovietitle = $resulted['label'];
					
					$hrthumbnail = $resulted['thumbnail'];
					$hrthumbnail2 = urlencode($hrthumbnail);	
					$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;

					$src = $hrthumbnail3;
			endif;
		
			$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
			$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');



			$myurl2 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%20%22Player.GetProperties%22,%20%22params%22:%20{%20%22playerid%22:%201,%20%22properties%22:%20[%22percentage%22,%20%22time%22,%20%22totaltime%22,%20%22speed%22]%20},%20%22id%22:%20%22mybash%22}%22";		

			$response2 = file_get_contents($myurl2);

			$wawa2 = substr($response2,40);
			$wawa2 = substr($wawa2,0, -1);
			
			$resulted2 = json_decode($wawa2, true);
				
			$hrpercentage = $resulted2['percentage'];
			$hrpercentage = round($hrpercentage);
			
			$hrpassedhours = $resulted2['time']['hours'] ;
			$hrpassedmins = $resulted2['time']['minutes'] ;
			$hrpassedsecss = $resulted2['time']['seconds'] ;
				
			$hrtotalhours = $resulted2['totaltime']['hours'] ;
			$hrtotalmins = $resulted2['totaltime']['minutes'] ;

			$hrtotaltime = $hrtotalhours * 60 + $hrtotalmins;
			$hrpassedtime = $hrpassedhours * 60 + $hrpassedmins;

			$hrtimeleft = $hrtotaltime - $hrpassedtime;
			
			$hrplaystate = $resulted2['speed'] ;
			
			if($hrplaystate == 0):
				$hrplaystatetext = "Player is <font color=red><b>PAUSED</b></font>";
			elseif($hrplaystate == 1): // Note the combination of the words.
				$hrplaystatetext = "Player is running...";
			else:
				$hrplaystatetext = "Player is not active";
			endif;

			echo "
				<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
				<tr>
						<td valign=\"top\" width=35%>	
							<img src=\"{$src}\" width=120\" style=\"padding:5px; border: 1px solid #4D4D4D;  \"> 
						</td>
				
						<td valign=\"top\"  width=65%>	
							<div style=\"margin-top: 10px;  \">
								{$hrmovietitle}
								";
				if($hrisittv == "episode"): 
					echo "<font style=\" font-family: Arial, Helvetica, sans-serif;
									font-size: 18px;
									font-style: normal;
									line-height: 5px;
									font-weight: bold;
									color: #888888;\">
							 <br>{$hrepisodetitle}";
				endif;
				
				
				
				
				
				echo "			<br><br>
								<div style=\" font-family: Arial, Helvetica, sans-serif;
									font-size: 12px;
									font-style: normal;
									line-height: normal;
									font-weight: normal;
									color: #AAAAAA;\">
								{$hrpercentage}% complete <!--  - Elapsed: {$hrpassedhours}:{$hrpassedmins}:{$hrpassedsecss} --><br>
								Duration: {$hrtotalhours}:{$hrtotalmins}<br>Time left: {$hrtimeleft} minutes<br><br>
								
								<a class='classpanel' href=\"#\" id='pauseplaybed' style='font-family: Verdana, Geneva, sans-serif; font-size: 18px; font-style: normal; font-weight: bold; margin: 0px; padding: 12px; color: #999999;' > Play Pause </a>
								
								<a class='classpanel' href=\"#\" id='playstopbed' style='font-family: Verdana, Geneva, sans-serif; font-size: 18px; font-style: normal; font-weight: bold; margin: 0px; padding: 12px; color: #999999;' > Stop </a><br>
								
									<div style=\"font-size: 12px; color:#999999; font-weight: normal;\" id=\"div2a\">
										<br>{$hrplaystatetext}
									</div>						
								</div>
							</div>
						</td>
				</tr>
				</table>
			";

		
	elseif($hrisplaying == "audio"):    /* It checked for Music, parsing Album info */
		echo $hrisplaying;
		echo "<br>Music<br>";
		
	else:
		echo "<div style=\"font-size: 12px; color:#999999; margin-left: 12px; font-weight: normal;\" >";
		echo "Nothing is playing.</div>";
	endif;
	
	


?>