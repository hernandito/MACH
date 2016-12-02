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
				$resultfull = $result;
				$result = substr ($result, 0 , 53);
				$percent = round( $job->{mbleft} / $job->{mb} * 100);
				echo "<b>";
				echo "<a href='{$mySabURL}' title=\"{$resultfull} - Open Sab\" target='hrnew' style='color:#1E6095; border: 1px none #AAAAAA;'>" .$result ." </b></a>";
				
				echo "  - <font color='#619414'><b>" .$percent ."% - </font></b>[ Queue: <b><font color='#278BB1'>";
				echo $slottes ."</b></font> ]</div>";
				
				if ($speedlim < 500) 
				{
					echo " - <a style='color:#B30000; border: 1px solid #AAAAAA;' title=\"Increase Speed\" href='#' onclick='domaxspeed();'><b> $speede/s </b></a>";
				}				
				else {
					echo " - <a style='color:#259300;border: 1px solid #AAAAAA;' title=\"Decrease Speed\" href='#' onclick='dospeed();'><b> $speede/s </b></a>";
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
	  $temp_f = intval($temp_f);
	  
	  $weatherob = $parsed_json->{'current_observation'}->{'weather'};
	  $humiditi = $parsed_json->{'current_observation'}->{'relative_humidity'};  
		$gwind = $parsed_json->{'current_observation'}->{'wind_mph'};
		$gwind = intval($gwind);
	  $weicon = $parsed_json->{'current_observation'}->{'icon_url'};
		echo "<font color='#3960A8'><b>", $weatherob, "</font></b> |<font color='#B30000'><b> ", $temp_f, "° </font></b>| ", $humiditi, ' hum. | wind: ', $gwind, " mph";
	}	

	
/*
	if ($showharddrives == "yes") {
		// Code for getting Hard drive sizes 
		$bytes= disk_free_space("{$myharddrivesize1}");
		echo " | {$myharddrivedesc1} <font color=\"#4982AB\">";
			$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
			$base = 1024;
			$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
			echo sprintf('%1.2f', $bytes / pow($base,$class)) . '' . $si_prefix[$class] . " </font>free ";
*/
		
	if ($showharddrives == "yes") {
		// Code for getting Hard drive sizes 
		$bytes= disk_free_space("{$myharddrivesize1}");

		
		echo " | {$myharddrivedesc1} <font color=\"#4982AB\">";
			$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
			$base = 1024;
			$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
			echo sprintf('%1.2f', $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . " </font>free | {$myharddrivedesc2}<font color=\"#4982AB\"> 
			";

		$bytes2= disk_free_space("{$myharddrivesize2}");

			$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
			$base = 1024;
			$class = min((int)log($bytes2 , $base) , count($si_prefix) - 1);
			echo sprintf('%1.0f', $bytes2 / pow($base,$class)) . ' ' . $si_prefix[$class] . '</font> free';
	}


	

else
{
	echo "<br><b>Module is disabled!</b>";
}

?>
<script>
$(document).ready(function () {    

$('#updatewicon').load('updateWeatherIcon.php');  
  
  
});
</script>
