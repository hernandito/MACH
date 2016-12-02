<?php



require 'includes/required/errorreporting.php';
require 'includes/required/defaults.php';
require 'includes/required/header.php';

require 'config.php';
require 'choice.txt';
require 'choicepanel.txt';
require 'choicerefresh.txt';
 
?>
<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="rss.css" />


<link rel="stylesheet" type="text/css" href="tooltip.css" />

<script type="text/javascript" src="jquery.tooltipster.js"></script>
<script>
    $(document).ready(function() {

		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: true,
		interactiveTolerance: 15,
		
		});

		$('.tooltip2').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,

		});	

});			
</script> 
<div style="background-color: #FFFDF0; border: 1px solid #BBBBBB; ">

		<div style=" font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; color: #B30000; text-decoration: none; margin-left: 7px; margin-bottom:3px; padding-top:0px;">
				Box Office Top 10:
		</div>	
											<?php

												include('rt_movie_theater2.php');

											?>
											
		<br>
		<img src="includes/images/trakttrending.png" height=30 style="margin-top: 5px;">

		<div style=" font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; color: #B30000; text-decoration: none; margin-left: 7px; margin-bottom:3px; padding-top:0px;">
				Movies:
		</div>	



			<?php
			
				$response = file_get_contents("https://api.trakt.tv/movies/trending/3879d06aeda3889e1b1155e75af363d1?extended={images}");
			
				$json = json_decode($response, true);
				$itemNr = 0;
				foreach($json as $item) {
				
					$hrtitle = $item['title'];
					
					$hrposterpath = $item['images']['poster'];
					$hrposterpath =  str_replace('original',"thumb",$hrposterpath) ;	
					
					$traktimdbid = $item['imdb_id'];
					$myimdb =  str_replace('tt',"",$traktimdbid) ;	
					
					
					$traktrating = $item['certification'];	
					$traktruntime = $item['runtime'];	
					$traktyear = $item['year'];	
					
					$traktplot = $item['overview'];	
					$traktplot =  str_replace('"',"'",$traktplot) ;	
					$traktplot =  str_replace('&',"and",$traktplot) ;
					$traktplot = htmlentities($traktplot, ENT_QUOTES, 'UTF-8');		

					$myimdblink = "<a href='http://imdb.com/title/{$traktimdbid}' target='_new'><img src='includes/images/imdb-longlogo.png' style=' margin-top: 5px;'></a>";
					
					echo "
					
					<div id='postersingle' class='postersingle'>
					<img class=\"tooltip\" src={$hrposterpath} style=\"height: 140px; max-width: 93px;\" title=\"
					
					
					<table width=100% border=0 cellspacing=0 cellpadding=0 >
														<tr>
															<td valign=top >
																{$hrtitle}<br><br>	
																<font id=bubble class=bubble>
																Year: <b>{$traktyear}</b>
																<br>Rating: <b>{$traktrating}</b>								 
																<br>Runtime: <b>{$traktruntime}</b>	
																<br>{$myimdblink}
													
															</td>
															<td width=127 align=right valign=top >
																<img src='{$hrposterpath}' width=147 id=postersingle2 class=postersingle2 style='margin-left:10px'> 
															</td>
														</tr>
														<tr>
															<td valign=top colspan=2>
																<font id=bubble class=bubble>

																{$traktplot}<br>
																

																
																
																</font></font>		
																
															</td>
														</tr>	
												</table>
					
					
						
					\">
					</div>";
				$itemNr++;
				if ($itemNr == 24) break;
				}
				
				
				

			?>	
		<div style=" font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; color: #B30000; text-decoration: none; margin-left: 7px; margin-bottom:3px; padding-top:5px;">
				TV Shows:
		</div>				
		<?php
			
				$response = file_get_contents("https://api.trakt.tv/shows/trending/3879d06aeda3889e1b1155e75af363d1?extended={images}");
			
				$json = json_decode($response, true);
				$itemNr = 0;
				foreach($json as $item) {
				
					$hrtitle = $item['title'];
					
					$hrposterpath = $item['images']['poster'];
					$hrposterpath =  str_replace('original',"thumb",$hrposterpath) ;	
					
					$traktimdbid = $item['imdb_id'];
					$myimdb =  str_replace('tt',"",$traktimdbid) ;	
					
					
					$traktrating = $item['certification'];	
					$traktruntime = $item['runtime'];	
					$traktyear = $item['year'];	
					
					$traktplot = $item['overview'];	
					$traktplot =  str_replace('"',"'",$traktplot) ;	
					$traktplot =  str_replace('&',"and",$traktplot) ;
					$traktplot = htmlentities($traktplot, ENT_QUOTES, 'UTF-8');		

					$myimdblink = "<a href='http://imdb.com/title/{$traktimdbid}' target='_new'><img src='includes/images/imdb-longlogo.png' style=' margin-top: 5px;'></a>";
					
					echo "
					
					<div id='postersingle' class='postersingle'>
					<img class=\"tooltip\" src={$hrposterpath} style=\"height: 140px; max-width: 93px; \" title=\"
					
					
					<table width=100% border=0 cellspacing=0 cellpadding=0 >
														<tr>
															<td valign=top >
																{$hrtitle}<br><br>	
																<font id=bubble class=bubble>
																Year: <b>{$traktyear}</b>
																<br>Rating: <b>{$traktrating}</b>								 
																<br>Runtime: <b>{$traktruntime}</b>	
																<br>{$myimdblink}
													
															</td>
															<td width=127 align=right valign=top >
																<img src='{$hrposterpath}' width=147 id=postersingle2 class=postersingle2 style='margin-left:10px'> 
															</td>
														</tr>
														<tr>
															<td valign=top colspan=2>
																<font id=bubble class=bubble>

																{$traktplot}<br>
																
																</font></font>		
																
															</td>
														</tr>	
												</table>
					
					
						
					\">
					</div>";
				$itemNr++;
				if ($itemNr == 24) break;
				}

			?>	
		<a href="#" class="scrollup">Scroll</a>
</div>
