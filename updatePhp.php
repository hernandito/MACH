<?php

require 'config.php';
/*
// Feed URL
$feed = "{$mySabURL}/api?mode=qstatus&output=json&apikey={$mySabAPI}";

$sbJSON = json_decode(file_get_contents($feed));





$sab_enabled = 1;
if($sab_enabled == "1")
{
// What are you!?
	if ($sbJSON->{mb} > "0")
	{
		if ($sbJSON->{paused} == "")
		{	
			$slottes = $sbJSON->{noofslots};
			$speede = $sbJSON->{speed};
			$speedlim = round($sbJSON->{kbpersec});
			$first = 1;
			foreach($sbJSON->{jobs} as $job) {
			if ($first = 1) 
			{

				$result = $job->{filename};
				$result = str_replace('.', ' ',$result);
				$result = substr ($result, 0 , 40);
				$percent = round( $job->{mbleft} / $job->{mb} * 100);
				echo "<font color='#FFCE0D'>";
				echo "<a href='{$mySabURL}' title='Open Sab' target='myiframe'>" .$result ."</a>";
				echo "</font >";
				echo " - <font color='#65C901'>" .$percent ."%</font> No: <font color='#00B8D9'>";
				echo $slottes ."</font></div>";
				
				if ($speedlim < 500) 
				{
					echo " - <a style='color:#999;' href='#' > $speede/s </a>";
				}				
				else {
					echo " - <a style='color:#999;' href='#' > $speede/s </a>";
				}


				$first = 0;
				break;
			}
		}
		}
		else
		{
			echo "<font color='#FF3333'><b>";
			echo "<a style='color:#FF3333' href='#' onclick='resumesab();'> Paused </a>";
			echo "</font ></b>";
		}
	}
	else
	{
		#echo "<b>Queue empty</b>";
		// Code to get weather 
*/		
	if ($showweather== "yes") {		


	
  $json_string = file_get_contents("http://api.wunderground.com/api/91369f483479b596/geolookup/conditions/q/NY/New_York.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  $weatherob = $parsed_json->{'current_observation'}->{'weather'};
  $humiditi = $parsed_json->{'current_observation'}->{'relative_humidity'};  
  $gwind = $parsed_json->{'current_observation'}->{'wind_mph'};
  
   echo "Current temperature in ${location} is: ${temp_f}";
  
			echo "<font color='#a6c0ca'><b>", $weatherob, "</font></b> |<font color='#FFCE0D'><b> ", $temp_f, " F weeee </font></b>| ", $humiditi, ' humidity | wind: ', $gwind, " mph";
		}	
		
	if ($showharddrives == "yes") {
		// Code for getting Hard drive sizes 
		$bytes= disk_free_space("{$myharddrivesize1}");
		echo " | {$myharddrivedesc1} <font color=\"#7ecfe7\">";
			$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
			$base = 1024;
			$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
			echo sprintf('%1.2f', $bytes / pow($base,$class)) . '' . $si_prefix[$class] . " </font>free | {$myharddrivedesc2}<font color=\"#7ecfe7\"> ";

		$bytes2= disk_free_space("{$myharddrivesize2}");

			$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
			$base = 1024;
			$class = min((int)log($bytes2 , $base) , count($si_prefix) - 1);
			echo sprintf('%1.0f', $bytes2 / pow($base,$class)) . ' ' . $si_prefix[$class] . '</font> free';
	}


	


?>