<?php


function doit() 
{

	require 'config.php';

	$myurl = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1internal}:{$xbmcport1}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.Clean%22,%20%22id%22:%20%22mybash%22}";


	$response = file_get_contents($myurl);

	$resulter = json_decode($response, true);
	$resulter=$resulter['result'];
	//echo $resulter;

	if ($resulter == "OK") {

		$today = date("m/d @ g:ia"); 
		echo "<br><font color=#838383>Video Cleaning Started: </font><br>". $today; 
	 }else {
		echo "Something went wrong!";
	}
 
 }


doit(); 
?>