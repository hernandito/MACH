<?php

function doit() 
{

require 'config.php';

//$myurl = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/renamer.scan";

$myurl = "http://192.168.0.201:5000/couch/api/d543bf596a9f415db52d11f0a9ab7fbf/renamer.scan";

$response = file_get_contents($myurl);

$resulter = json_decode($response, true);
$resulter=$resulter['success'];

//echo $resulter;

	if ($resulter == "true") {
		date_default_timezone_set('America/New_York');
		$today = date("m/d @ g:ia"); 
		echo "<br><font color=#FFD24C><b>Couchpotato</b></font><font color=#838383> Scan Started! </font><br>". $today; 
 	 }else {
		echo "Not sure if json decode works.";
	}
 
 }


doit(); 
?>