<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
        	$(document).ready(function() {
		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'fade',
		position: 'bottom',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,
		interactiveTolerance: 10,
		});
        	
			
			
});			
</script> 
<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<?php

require 'config.php';

include('cp_notices.php');
echo "<br>";  

$myurl = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/media.list/?status=active";


$response = file_get_contents($myurl);
$result = json_decode($response, true);
$result=$result['movies'];

$totality = count($result);


echo "<font style='color: #BF0005; font-size:11px; margin-bottom:10px;' ><b>Wanted Movies:</b></font>";
echo "<a href=# class=\"tooltip\" title=\"<font id=bubble class=bubble>{$mylist} </font>\"><img style=\" margin-left:4px; margin-bottom:-5px; \"src=includes/images/listicon.png></a>";

echo "<div style=\" margin-top: 6px;\">";



		for ($i = 0; $i <$totality; $i++) {

			$hrmovietitle = $result[$i]['info']['original_title'];
			$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
			$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

			$hrposter = $result[$i]['info']['images']['poster_original'][0]; 
			
			if($hrposter=="") $hrposter="noposter.jpg";
			
			$hryear = $result[$i]['info']['year'];
			
			$imdb = $result[$i]['info']['imdb']; 

			$imdbrating="";	
			if($result[$i]['info']['rating']['imdb'][0]>0){
				 $imdbrating.= "<b>" . round($result[$i]['library']['info']['rating']['imdb'][0],2)
				 ."</b> ("
				 .$result[$i]['info']['rating']['imdb'][1]
				 .") "; 
			} 

			$hrmpaa = $result[$i]['info']['mpaa'];  

			$hrruntime = $result[$i]['info']['runtime'];  	
			if($hrruntime==0){}
			
			
			
			
			$hrreleased = $result[$i]['info']['released'];  

			$hrwantedrez2 = $result[$i]['profile_id'];
			
			$therez = "";
				if ($hrwantedrez2 == $myCouchpotato1080ID) {
					$therez = "1080p";
					$colorstyle = "<font style=\"color: #fff; font-size:11px; background: #BF0005; border: 1px solid #BF0005; 	padding-top: 2px;
							padding-right: 6px;
							padding-bottom: 2px;
							padding-left: 6px; \" >";
				} 
				elseif ($hrwantedrez2 == $myCouchpotato720ID){
					$therez = "720p";
					$colorstyle = "<font style=\"color: #fff; font-size:11px; background: #238C00; border: 1px solid #238C00; 	padding-top: 2px;
							padding-right: 6px;
							padding-bottom: 2px;
							padding-left: 6px; \" >";					
				}
				else {$therez = "other";
					$colorstyle = "<font style=\"color: #fff; font-size:11px; background: #00698C; border: 1px solid #238C00; 	padding-top: 2px;
							padding-right: 6px;
							padding-bottom: 2px;
							padding-left: 6px; \" >";					
				}
		
			
			
// NOTHING YET being done with the actors... Future potential use.

			$actors=$result[$i]['info']['images']['actors'];
			$cast="";
			foreach($actors as $actor=>$actor_img) {
				$actor_det="";	
				$role=$result[$i]['info']['actor_roles'][$actor];
				if($actor_img!="") $actor_det.='<a href="'.$actor_img.'">';
				$actor_det.=$actor;  //."-".$role;
				
				if($actor_img!="") $actor_det.='</a>';		
				

				$cast.=$actor_det.', ';
				
			}

			$hrplot = $result[$i]['info']['plot'];
			$hrplot =  str_replace('"',"'",$hrplot) ;	
			$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');
			
			
			
			echo "<li>
					<a href='http://www.imdb.com/title/{$imdb}' target=_new class=\"tooltip\" title=' 
							<table width=100% border=0 cellspacing=0 cellpadding=0 >
								<tr>
									<td valign=top >
										{$hrmovietitle}<br><br>	
										<font id=bubble class=bubble>
										Year: <b>{$hryear}</b> <br>				
										Rating: {$imdbrating}<br>		
										Rated: <b>{$hrmpaa}</b><br>				
										Duration: <b>{$hrruntime}</b> min.<br>		
										Date: <b>{$hrreleased}</b><br><br>
										{$colorstyle}<b>{$therez}</b></font></font>	
									</td>
									<td width=107 align=right valign=top >
										<img src={$hrposter} height=180 style=\"margin-left:10px;\" id=postersingle2 class=postersingle2> 
									</td>
								</tr>
								<tr>
									<td valign=top colspan=2>
										<font id=bubble class=bubble>

										{$hrplot}</font>	
									</td>
								</tr>	
							</table>' >		
						{$hrmovietitle}
					</a>
				</li>";
			
			
			

		}

echo "</div>";

?>	