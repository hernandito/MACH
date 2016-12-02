<?php

function doit() 
{


$myurl = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%20%22Player.PlayPause%22,%20%22params%22:%20{%20%22playerid%22:%201},%20%22id%22:%20%22mybash%22}%22";


	$response = file_get_contents($myurl);

	$resulter = json_decode($response, true);
	$resulter=$resulter['result']['speed'];

	if($resulter == 0):
		$hrplaystatetext = "Player is <font color=red><b>PAUSED</b></font>";
	elseif($resulter == 1): // Note the combination of the words.
		$hrplaystatetext = "Player is running...";
	else:
		$hrplaystatetext = "Player is not active";
	endif;


	
	echo "<br>";
	echo $hrplaystatetext;

/*
$today = date("m/d @ g:ia"); 
echo "<br><font color=#838383><b>Bedroom</b> Computer <b><font color=red>PausedPlay</font></b>: </font><br>". $today; 
*/
 }


doit(); 
?>