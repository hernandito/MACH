<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>
<SCRIPT LANGUAGE="JavaScript">

    $(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});


</SCRIPT>

<script>
    $(document).ready(function() {

$('#tooltipx').tooltipster('reposition');

});			
</script> 



<?php
require 'config.php';


echo "<div id='rsstt'>";



	$theimdbtt = $_GET["movieidtt"];
	$theimdb = $_GET["movieid"];
	$themovie = $_GET["moviename"];
//echo "??{$theimdbtt}<br>";	
	$theimdbtt =  str_replace('tt',"",$theimdbtt) ;
	
//echo $themovie;




	$myurl = "http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?apikey={$RottenTomatoesAPI}&type=imdb&id={$theimdbtt}";

		$response = file_get_contents($myurl);
		$result = json_decode($response, true);
	
		$hrmovietitle = $result['title'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

		$movietitlesearch =  str_replace(' ','+',$hrmovietitle) ;
		$searchrtstring = "http://www.rottentomatoes.com/search/?search={$movietitlesearch}&sitesearch=rt";
		

		$hrlinks = $result['links']['alternate'];
		$hrlinkstrailer = "{$hrlinks}/trailer";
		
		if ($hrlinks != "") { 	
			echo "<hr><font color=#BF0005 ><b>Rotten Tomatoes Trailer:</b></font><br>";
			echo "<b>&nbsp;&nbsp;<a class=\"iframe\" href=\"{$hrlinkstrailer}\"><font style=\"font-size: 12px; font-weight: bold; color: #156199; text-decoration: none;\">{$hrmovietitle}</font></a></b><br>";	

			echo "<hr><img style=\"margin-bottom: 6px;\" src=\"includes/images/logo_tadd.png\" height=28>";		
			$myurl = "http://api.traileraddict.com/?imdb={$theimdbtt}&count=10&width=1080&featured=yes ";

			$xml = simplexml_load_file($myurl);	
				$items = $xml->xpath('//trailer');
				foreach ( $items as $item) {
					$ttitle =  $item->title;
					$tembed = $item->embed;
					$tident = $item->trailer_id;
					$turl = "http://v.traileraddict.com/{$tident}";

					// Replaces second colon :, is ut exists, with a line break. For better looking formatting. This wil split the movie from
					// the trailer name/title.
					$string = $ttitle;
					$find = ':';
					$replace = '<br>';
					$result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1);
					$ttitle = strrev($result); 
					
					echo "<li><a  class=\"iframe\" href=\"{$turl}$\">{$ttitle}</a></li>";
					}	
			
		} else { 			
		
		echo "<hr><font color=#238C00 ><b>Sorry, but I did not find a trailer on Rotten Tomatoes.</b></font>";
		
		}


		
		
		
		
   
echo "</div>";

?>