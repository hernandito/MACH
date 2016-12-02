



<?php
require 'config.php';


echo "<div id='rsstt'>";

	$themoviecart = $_GET["moviecart"];
	
	//echo $themoviecart;
	
	$theimdb = $_GET["movieid"];
	$themovie = $_GET["moviename2"];
	
	//echo "<br>{$themoviecart}<br>";
	
	$myurl = $themoviecart;

	$response = file_get_contents($themoviecart);
	//$xml = simplexml_load_file($themoviecart);
	//echo $xml;
	echo "<font style=\"color: #B30000; font-weight: bold; font-size: 10pt; \">{$themovie}</font><font style=\"color: #00468C; font-weight: bold;  font-size: 10pt;\"> added to cart! </font> <br>";

   
echo "</div>";

?>