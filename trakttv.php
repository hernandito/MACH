<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<meta http-equiv="refresh" content="1800">

<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<!--
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-rotate.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-hover.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/custom.js"></script>
-->

<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
        	$(document).ready(function() {
		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		});
        	
			
			    $("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 



<?php
require 'config.php';


$response = file_get_contents("http://api.trakt.tv/shows/trending.json/{$mytraktAPI}");
$result = json_decode($response, true);

$numberoficons = $TraktNumberOfTVShows - 1;	

for ($i = 0; $i <= $numberoficons; $i++) {

$elplot =  str_replace('"',"'",$result[$i]['overview']) ;
$elplot = htmlentities($elplot, ENT_QUOTES, 'UTF-8');

$elyear = $result[$i]['year'];
$eltitle = $result[$i]['title'];

$elmpaa = $result[$i]['certification'];
$elimdb = "http://www.imdb.com/title/" . $result[$i]['imdb_id'];
$elnet = $result[$i]['network'];
$elday = $result[$i]['air_day'];
$elstatus = $result[$i]['status'];

$src = $result[$i]['images']['poster'];


	echo "<div id=\"postersingle3\" class=\"postersingle3\" >";
	echo "<a href=\"{$elimdb}\" target=_new><img class=tooltip height={$TVIconSizetrakt} src='";
	echo $src;
	echo "' title=\"		
		<table width=100% border=0 cellspacing=0 cellpadding=0 >
			<tr>
				<td valign=top >
					{$eltitle}<br><br>	
					<font id=bubble class=bubble>
					Year: <b>{$elyear}</b> <br>				
					Rating: <b>{$elmpaa}</b> <br>				
					Network: <b>{$elnet}</b> <br>
					Airs: <b>{$elday}</b> <br>
					Status: <b>{$elstatus}</b> <br>
				</td>
				<td width=127 align=right valign=top >
					<img src='{$src}' width=130 id=postersingle2 class=postersingle2 style='margin-left:10px'> 
				</td>
			</tr>
			<tr>
				<td valign=top colspan=2>
					<font id=bubble class=bubble>

					{$elplot}</font>	
				</td>
			</tr>	
		</table>
		</font> \" ></a></div>";
}
?>	
							
