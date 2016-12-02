<?php
require 'config.php';

	$the720imdb = $_GET["movieid"];
	$the720movie = $_GET["moviename"];

$figureprofile = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/profile.list";
$profileresponse = file_get_contents($figureprofile);
	
$profileresult = json_decode($profileresponse, true);
$profileresult=$profileresult['list'];
$totality = count($profileresult);

for ($i = 0; $i <$totality; $i++) {

	$profilelabel = $profileresult[$i]['label'];
	$profileid = $profileresult[$i]['_id'];
/* echo "{$i}-{$profilelabel} - {$profileid} <br>";  */
	
		if ($profilelabel == '720p') {
			$profileid720 = $profileid;
			break;
		}
}


	
	$my720url = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/movie.add/?profile_id={$profileid720}&identifier={$the720imdb}";

	$response = file_get_contents($my720url);
	
	$result = json_decode($response, true);
	$result=$result['success'];

echo "<div style='background: #FFFAD9; margin-top: 9px; margin-bottom: 4px; padding:4px; padding: 6px; -webkit-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: 1px 1px 4px 2px #8F8F8F; box-shadow: 1px 1px 4px 2px #8F8F8F;'>";

echo "<font style='font-size: 12px; 
										font-family: Arial, Geneva, sans-serif;
										color: #464637;
										margin: 0px;
										padding-left: 0px;
										font-weight: normal; '>";

	if ($result == 'true') {
		echo "<font style='font-size: 14px; 
										font-family: Arial, Geneva, sans-serif;
										color: #8C0000;
										margin: 0px;
										padding-left: 0px;
										font-weight: bold; '>{$the720movie} </font> was added at <b>720p</b> resolution.";
		
	} else {
		echo "<font style='font-size: 14px; 
										font-family: Arial, Geneva, sans-serif;
										color: #8C0000;
										margin: 0px;
										padding-left: 0px;
										font-weight: bold; '>Sorry, something went wrong...</font>";
	}

echo "</font></div>";
	
	/* 	*/
 
?>