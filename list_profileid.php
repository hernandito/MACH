<?php


function doit() 
{

require 'config.php';

$figureprofile = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/profile.list";
$profileresponse = file_get_contents($figureprofile);
	
$profileresult = json_decode($profileresponse, true);
$profileresult=$profileresult['list'];
$totality = count($profileresult);
echo "<br><font style=\"color: #BF0005; font-size:11px; margin-bottom:10px;\" ><b>Profile ID's:</b></font>
<br>
You will need to copy the IDs for the 720p and 1080p resolutions to the <b>config.php</b> file in the Couchpotato section. Click the \"clear\" button to hide this.
<br>";
for ($i = 0; $i <$totality; $i++) {

	$profilelabel = $profileresult[$i]['label'];
	$profileid = $profileresult[$i]['_id'];
echo "<li><font style=\"color: #0059B3\" ><b>{$profilelabel}:</b> </font><br>
	{$profileid} </li>";

}
 
 }


doit(); 
?>