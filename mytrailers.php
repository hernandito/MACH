<?php
require 'config.php';

echo "<div id='rsstt'>";
echo "<br><font color=#BF0005 ><b>Available Trailers:</b></font><br>";


	$theimdb = $_GET["movieid"];
	$themovie = $_GET["moviename"];

	$myurl = "http://api.traileraddict.com/?imdb={$theimdb}&count=10&width=1080&featured=yes ";

	$xml = simplexml_load_file($myurl);	
		$items = $xml->xpath('//trailer');
		foreach ( $items as $item) {
			$ttitle =  $item->title;
			$tembed = $item->embed;
			
		//	$ttitle = str_replace(':','<br>',$ttitle);  // Below lines works better

// Replaces second colon :, is ut exists, with a line break. For better looking formatting. This wil split the movie from
// the trailer name/title.
			$string = $ttitle;
			$find = ':';
			$replace = '<br>';
			$result = preg_replace(strrev("/$find/"),strrev($replace),strrev($string),1);
			$ttitle = strrev($result); 

			// REALLY NEED Help in being able to link the trailer embed code into a colorbox pop up window with the actual trailer.
			
			echo "<li><a href=#>{$ttitle}</a></li>";
			}
			
echo "</div>";			

?>