<?php

function doit() 
{


$myurl = "http://{$xbmcusername2}:{$xbmcpassword2}@{$xbmcIP2}:{$xbmcport2}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22System.Reboot%22,%20%22id%22:%20%22mybash%22}%22";


	$response = file_get_contents($myurl);

	$resulter = json_decode($response, true);
	$resulter=$resulter['result'];
	echo $resulter;


$today = date("m/d @ g:ia"); 
echo "<br><font color=#838383><b>Bedroom</b> Computer <b><font color=red>Rebooted</font></b>: </font><br>". $today; 
 
 
 }


doit(); 
?>