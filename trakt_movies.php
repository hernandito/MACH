<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){

				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});

			});
		</script>

<script type="text/javascript" src="jquery.tooltipster.js"></script>
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



<?php
require 'config.php';
?>



<script type="text/javascript">
function dotorgRefresh(){
$("#dotorgdiv").load("blank.php");
$("#dotorgdiv").load("parse_nzbsdotorg.php");
 
}
</script>

<SCRIPT LANGUAGE="JavaScript">
    function getTrailerstrakt(movieid)
    {
		$("#mytrailerstrakt").innerHTML="Please wait....";
        $("#mytrailerstrakt").load("trailersearch.php",$("#trakt" + movieid).serialize()); 
    }
</SCRIPT>

<div id='traktdiv'>		
<?php
require 'config.php';

$response = file_get_contents("http://api.trakt.tv/movies/trending.json/{$mytraktAPI}");
$result = json_decode($response, true);

$numberoficons = $TraktNumberOfMovies - 1;	

	
	
for ($i = 0; $i <= $numberoficons; $i++) {

$elplot =  str_replace('"',"'",$result[$i]['overview']) ;
$elplot = htmlentities($elplot, ENT_QUOTES, 'UTF-8');

$elyear = $result[$i]['year'];
$eltitle = $result[$i]['title'];

$myimdbtt = $result[$i]['imdb_id'];
$myimdb = $result[$i]['imdb_id'];
$myimdb =  str_replace('tt',"",$myimdb) ;
$myimdb =  $myimdb * 1;


$elmpaa = $result[$i]['certification'];
$elimdb = "http://www.imdb.com/title/" . $result[$i]['imdb_id'];
$eltitle = $result[$i]['title'];
$src = $result[$i]['images']['poster'];


echo "<div id=\"postersingle3\" class=\"postersingle3\" >";
echo "<a href=\"{$elimdb}\" target=_new><img class=tooltipx height={$MovieIconSizetrakt} src='";
echo $src;
echo "' title=\"		
	<table width=100% border=0 cellspacing=0 cellpadding=0 >
		<tr>
			<td valign=top >
				{$eltitle}<br><br>	
				<font id=bubble class=bubble>
				Year: <b>{$elyear}</b> <br>				
				Rating: <b>{$elmpaa}</b> <br>				
			
				
			</td>
			<td width=127 align=right valign=top >
				<img src='{$src}' width=130 id=postersingle2 class=postersingle2 style='margin-left:10px'> 
			</td>
		</tr>
		<tr>
			<td valign=top colspan=2>
				<font id=bubble class=bubble>

				{$elplot} <br>
				
				<form action='JavaScript:getTrailerstrakt($myimdb)' method='POST' id='trakt{$myimdb}' >
																<input type='hidden' id='movieidtt' name='movieidtt' value='{$myimdbtt}'>
																<input type='hidden' id='movieid' name='movieid' value='{$myimdb}'>
																<input type='hidden' id='moviename' name='moviename' value='{$hrmovietitle}'>
																<a  class='iframex classpanel2' href='javascript:;' onclick='parentNode.submit();' style='	
																		color: #FFF;
																		background-color: #156199;
																		padding-top: 1px;
																		border-top-style: none;
																		border-right-style: none;
																		border-bottom-style: none;
																		border-left-style: none;
																		padding-right: 4px;
																		padding-bottom: 1px;
																		padding-left: 4px; 
																		font-size: 8pt; 
																		margin-left: 0px; ' 
																		>search trailer</a>						
														</form>	
														
														
														
														
								<div id='mytrailerstrakt'></div>
				
				
				</font>	
			</td>
		</tr>	
	</table>
	</font> \" ></a></div>";
}
?>	
</div>