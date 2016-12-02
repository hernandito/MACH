

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>



<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
	$(document).ready(function() {


		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: true,
		interactiveTolerance: 15,
		
		});

		$('.tooltip2').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,

		});	

			
});			
</script> 



<?php

require 'config.php';


$myurl = "http://{$xbmcprefix}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.GetRecentlyAddedMovies%22,%20%22params%22:%20{%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2024%20},%20%22properties%22%20:%20[%22title%22,%20%22mpaa%22,%20%22thumbnail%22,%20%22rating%22,%20%22year%22,%20%22plot%22]%20%20},%20%22id%22:%20%22libMovies%22}";


	$response = file_get_contents($myurl);

	$wawa = substr($response,96);
	$wawa = substr($wawa,0, -3);
	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);
	
	for ($i = 0; $i <= 11; $i++) {
		$hrmovietitle = $result[$i]['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

	
		
		$hrthumbnail = $result[$i]['thumbnail'];
		$hrthumbnail2 = urlencode($hrthumbnail);	
		$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;
		
		if ($isportopen1 != "yes") {
			$imageData = base64_encode(file_get_contents($hrthumbnail3));
			// Format the image SRC:  data:{mime};base64,{data};
			$src = 'data: '.mime_content_type($hrthumbnail3).';base64,'.$imageData;
		} else {
			$src = $hrthumbnail3;
		}
		
		$hrmpaa = $result[$i]['mpaa'];
		$hryear = $result[$i]['year'];
		$hrrating = round($result[$i]['rating'],1);
		
		$hrplot = $result[$i]['plot'];
		$hrplot =  str_replace('"',"'",$hrplot) ;	
		$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');

		$inline_content = "hrhiddencontent{$i}";

		echo "<a class=tooltip2 href=\"#\" onclick=\"return false;\" title= 
		'<table width=100% border=0 cellspacing=0 cellpadding=0 >
			<tr>
				<td valign=top >
					{$hrmovietitle}<br><br>	
					<font id=bubble class=bubble>
					Year: <b>{$hryear}</b> <br>				
					Rating: {$hrrating}<br>		
					<b>{$hrmpaa}</b><br>				
				
					
				</td>
				<td width=147 align=right valign=top >
					<img src=\"{$src}\" width=140 id=postersingle2 class=postersingle2 style=\"margin-left:10px\"> 
				</td>
			</tr>
			<tr>
				<td valign=top colspan=2>
					<font id=bubble class=bubble>

					{$hrplot}</font>	
				</td>
			</tr>	
		</table>' ><img style=\" padding-right:0px; border: 1px solid #4D4D4D; max-height: 171px \" src=\"{$src}\" width=115  ></a>";

	}		

	echo "<div style=\"	font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none; margin-left: 1px;\"><br>Recent TV Shows:</div>";
	
	
	$response = file_get_contents("http://{$xbmcprefix}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.GetRecentlyAddedEpisodes%22,%20%22params%22:%20{%20%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2012%20},%20%22properties%22%20:%20[%22showtitle%22,%20%22episode%22,%20%22season%22]%20%20},%20%22id%22:%20%22libMovies%22}");

	$wawa = substr($response,56);
	$wawa = substr($wawa,0, -45);

	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);

	
	echo  "<div style=\" -moz-column-count: 3;
			-moz-column-gap: 6px;
			-webkit-column-count: 3;
			-webkit-column-gap: 6px;
			column-count: 3;
			column-gap: 6px; \">";


	for ($i = 0; $i <= 11; $i++) {

		echo "<li style=\"font-family: Tahoma, Geneva, sans-serif; font-size: .96em; font-weight: bold; padding-top: 4px; padding-bottom: 4px; padding-left: 10px; color:#868686 \">" .substr($result[$i]['showtitle'],0,29);
		echo "<font color=#E0CD83> - s".sprintf("%02s",$result[$i]['season'])."e".sprintf("%02s", $result[$i]['episode']). "</font></font></li>";
	}

echo "</div>";
	
	
	
	


?>