
<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<!--
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-rotate.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-hover.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/custom.js"></script>
-->


<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>



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



		
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 

<?php
require 'config.php';



$filterletter = $_GET['filterphpvar'];

if ($filterletter == "") {
	$filterarticle = "";
}
else {
	$filterarticle = "The%20{$filterletter}";
}



$url = 'http://'. $xbmcprefix .
'/jsonrpc?request={%22jsonrpc%22:%222.0%22,%22params%22:%20{%22filter%22:%20{%22or%22:%20[{%22operator%22:%20%22startswith%22,%22field%22:%22title%22,%22value%22:%22'. $filterletter .'%22},%20{%22operator%22:%22startswith%22,%22field%22:%22title%22,%22value%22:%22' . $filterarticle .'%22}]},%22sort%22:%20{%22order%22:%20%22ascending%22,%22method%22:%22title%22,%22ignorearticle%22:%20true},%22properties%22:[%22title%22,%22thumbnail%22,%22imdbnumber%22,%22year%22,%22plot%22,%22rating%22]},%22method%22:%22VideoLibrary.GetMovies%22,%22id%22:%22libMovies%22}';





$content = file_get_contents($url);
$json = json_decode($content, true);

$hrcount = 0;
	foreach($json['result']['movies'] as $item) {
			$hrcount = $hrcount + 1;
		}
		

$english_format_number = number_format($hrcount);

echo "<font color=#004B97>Number of Movies: </font><font color=#004B97><b>$english_format_number </b></font><br><br>";

	foreach($json['result']['movies'] as $item) {
		
		$hrmovietitle = $item['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');
		$hrmovietitleshort = substr($hrmovietitle, 0, 30);

		$hryear = $item['year'];
		$hrrating = round($item['rating'],1);
		$hrmpaa = $item['mpaa'];
		
		$hrimdbnumber = $item['imdbnumber'];
		$imdblink = "http://www.imdb.com/title/{$hrimdbnumber}/";
		
		$hrplot = $item['plot'];
		$hrplot =  str_replace('"',"'",$hrplot) ;	
		$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');		

		if ($isportopen1 != "yes") { 	//Port is Closed - Do not show Posters - If port is closed, all images would be downloaded when loading page. This is way too slow so posters are disabled.
		
			echo "<a class=tooltip href=\"{$imdblink}\" target=_blank title=\"{$hrmovietitle} <br><font id=bubble class=bubble> Year: <b>{$hryear}</b> <br>Rating: <b>{$hrrating} </b><br><br>{$hrplot} </font> \" >{$hrmovietitleshort}</a><br>";		

		} else { 					//Port is OPEN - Show Posters
		
			$hrthumbnail = $item['thumbnail'];
			$hrthumbnail2 = urlencode($hrthumbnail);	
			$hrthumbnail3 = "http://{$xbmcprefix}/image/". $hrthumbnail2;		
			$src = $hrthumbnail3;

			
			echo "<a class=tooltip href=\"#\" onclick=\"return false;\" title=
			'<table width=100% border=0 cellspacing=0 cellpadding=0 >
				<tr>
					<td valign=top >
						{$hrmovietitle}<br><br>	
						<font id=bubble class=bubble>
						Year: <b>{$hryear}</b> <br>				
						Rating: {$hrrating}<br>		
						<b>{$hrmpaa}</b><br>				
					</td>
					<td width=127 align=right valign=top >
						<img src=\"{$src}\" height=200 id=postersingle2 class=postersingle2 style=\"margin-left:10px;\"> 
					</td>
				</tr>
				<tr>
					<td valign=top colspan=2>
						<font id=bubble class=bubble>

						{$hrplot}</font>	
					</td>
				</tr>	
			</table>' >" .$hrmovietitleshort;
			echo "</a><br>";			
			
		}		

	}
	
$filterphpvar = "";
$filterarticle = "";
?>


