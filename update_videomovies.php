<?php


function doit() 
{

	require 'config.php';

	$myurl = "http://{$xbmcprefix}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.Scan%22,%20%22params%22:{%22directory%22:%22smb://TOWER/Media/Movies/%22},%22id%22:%221%22}";
	$response = file_get_contents($myurl);

	$resulter = json_decode($response, true);
	$resulter=$resulter['result'];
	echo $resulter;

	if ($resulter == "OK") {
		$today = date("m/d @ g:ia"); 
		echo "<br><font color=#838383>Video Update Started: </font><br>". $today; 
	 } else {
		echo "Something went wrong!";
	}
 
 }

doit(); 
?>

