<?php
	  $json_string = file_get_contents("http://api.wunderground.com/api/91369f483479b596/geolookup/conditions/q/NY/New_York.json");
	  $parsed_json = json_decode($json_string);
	  $weicon = $parsed_json->{'current_observation'}->{'icon_url'};
	  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
	  $temp_f = intval($temp_f);
echo "
					<table border=0 cellspacing=0 cellpadding=0 >
						<tr>
							<td valign=middle>
								<img style='margin-top: 5px; padding: 0px; margin-bottom: 0px; margin-right: 2px; margin-left: 5px; height: 22px; ' src='{$weicon}'>
							</td>	
							<td valign=middle style=\"color: #BBBBBB; padding-right: 5px; font-family: 'Exo 2', sans-serif; font-size: 13px; font-weight: 700;\">
								{$temp_f}°
							</td>
						</tr>
					</table>";


?>
