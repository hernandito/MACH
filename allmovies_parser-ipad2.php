
<?php

$filterletter = "";
$filterarticle = "";

$url = 'http://'. $xbmcusername1 .':'. $xbmcpassword1 . '@' . $xbmcIP1 .':'.$xbmcport1 .
'/jsonrpc?request={%22jsonrpc%22:%222.0%22,%22params%22:%20{%22filter%22:%20{%22or%22:%20[{%22operator%22:%20%22startswith%22,%22field%22:%22title%22,%22value%22:%22'. $filterletter .'%22},%20{%22operator%22:%22startswith%22,%22field%22:%22title%22,%22value%22:%22' . $filterarticle .'%22}]},%22sort%22:%20{%22order%22:%20%22ascending%22,%22method%22:%22title%22,%22ignorearticle%22:%20true},%22properties%22:[%22title%22,%22thumbnail%22,%22imdbnumber%22,%22year%22,%22plot%22,%22rating%22]},%22method%22:%22VideoLibrary.GetMovies%22,%22id%22:%22libMovies%22}';



$content = file_get_contents($url);
$json = json_decode($content, true);

$hrcount = 0;
	foreach($json['result']['movies'] as $item) {
			$hrcount = $hrcount + 1;
		}
		

$english_format_number = number_format($hrcount);

echo "
		<table  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
				<tr>
					<td>
						<font color=#BF0005><b>Movie Collection</font></b><br><font color=#004B97>Number of Movies: </font><font color=#004B97><b>$english_format_number </b></font><br><br>
					</td>
					
					<td>
						<div style=\" margin-left: 20px; \">
							<form action='JavaScript:filterit()' method='POST' id='yourfilterid' >
								<input type='text' id='filtername'  name='filtername' value='F' style='width: 90px;'>
								<input type='submit' name='submit' value='Search'  style='width: 58px'>
							</form>
						</div>
						
											<a class='classpanel' href=\"#?phpvar=F\" id='filterit2' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >F</a>
						
					</td>
				</tr>
		</table>

";
echo  "<div style=\" -moz-column-count: 4;
			-moz-column-gap: 6px;
			-webkit-column-count: 4;
			-webkit-column-gap: 6px;
			column-count: 4;
			column-gap: 6px; 
			
			width: 96%;
			
			border-right-style: solid;
			border-right-width: 1px;
			border-right-color: #C1E0FF;		
			\"
			
			id=\"filteredmovies\"
			
			>

";


	foreach($json['result']['movies'] as $item) {
		
		$hrmovietitle = $item['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');
		$hrmovietitleshort = substr($hrmovietitle, 0, 30);

		$hryear = $item['year'];
		$hrrating = round($item['rating'],1);
		$hrmpaa = $item['mpaa'];
		
		$hrimdbnumber = $item['imdbnumber'];
		$imdblink = "http://www.imdb.com/title/{$hrimdbnumber}/";
		
		$hrplot = $item['plot'];
		$hrplot =  str_replace('"',"'",$hrplot) ;	
		$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');		

		if ($isportopen1 != "yes") { 	//Port is Closed - Do not show Posters - If port is closed, all images would be downloaded when loading page. This is way too slow so posters are disabled.
		
			echo "<a class=tooltip href=\"{$imdblink}\" target=_blank title=\"{$hrmovietitle} <br><font id=bubble class=bubble> Year: <b>{$hryear}</b> <br>Rating: <b>{$hrrating} </b><br><br>{$hrplot} </font> \" >{$hrmovietitleshort}</a><br>";		

		} else { 					//Port is OPEN - Show Posters
		
			$hrthumbnail = $item['thumbnail'];
			$hrthumbnail2 = urlencode($hrthumbnail);	
			$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;		
			$src = $hrthumbnail3;

			
			echo "<a class=tooltip href=\"#\" onclick=\"return false;\" title=
			'<table width=100% border=0 cellspacing=0 cellpadding=0 >
				<tr>
					<td valign=top >
						{$hrmovietitle}<br><br>	
						<font id=bubble class=bubble>
						Year: <b>{$hryear}</b> <br>				
						Rating: {$hrrating}<br>		
						<b>{$hrmpaa}</b><br>				
					</td>
					<td width=127 align=right valign=top >
						<img src=\"{$src}\" height=200 id=postersingle2 class=postersingle2 style=\"margin-left:10px;\"> 
					</td>
				</tr>
				<tr>
					<td valign=top colspan=2>
						<font id=bubble class=bubble>

						{$hrplot}</font>	
					</td>
				</tr>	
			</table>' >" .$hrmovietitleshort;
			echo "</a><br>";			
			
		}		

	}
	
	
	
echo  "</div >
<a href=\"#\" class=\"scrollup\">Scroll</a>

";

?>


