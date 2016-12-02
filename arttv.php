<?php

function doit() 
{

require 'config.php';

$myurl = "http://{$xbmcusername2}:{$xbmcpassword2}@{$xbmcIP2internal}:{$xbmcport2}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22id%22:%200,%20%22method%22:%20%22Addons.ExecuteAddon%22,%22params%22:%20{%22addonid%22:%20%22script.artwork.downloader%22,%20%22params%22:%20{%22mediatype%22:%20%22tvshow%22}}}";

$response = file_get_contents($myurl);

$resulter = json_decode($response, true);
$resulter=$resulter['result'];
//echo $resulter;

	if ($resulter == "OK") {
		$today = date("m/d @ g:ia"); 
		echo "<br><font color=#838383><b>TV</b> Artwork Started: </font><br>". $today; 
 	 }else {
		echo "Something went wrong!";
	}
 
 }


doit(); 
?>