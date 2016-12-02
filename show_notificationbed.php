<?php





function doit() 
{

	$themessagetitle = $_GET["messagetitle"];
	$themessagetitle =  str_replace(' ',"%20",$themessagetitle) ;	


	$themessagebody = $_GET["messagebody"];
	$themessagebody =  str_replace(' ',"%20",$themessagebody) ;	
	require 'config.php';

	$mynoticeurl = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1internal}:{$xbmcport1}/jsonrpc?request={%22jsonrpc%22:%222.0%22,%22method%22:%22GUI.ShowNotification%22,%22params%22:{%22title%22:%22{$themessagetitle}%22,%22message%22:%22{$themessagebody}%22},%22id%22:1}";
	
	
$response = file_get_contents($mynoticeurl);
$result = json_decode($response, true);
$result=$result['result'];

	if ($result == "OK") {
		$today = date("m/d @ g:ia"); 
		echo "{$result}<br><font color=#838383>Notification Sent!</font><br>". $today; 
	 } else {
		echo "<br>Something message went wrong!";
	}
 
 }

doit(); 

?>