

<?php








$url = 'http://'. $xbmcusername1 .':'. $xbmcpassword1 . '@' . $xbmcIP1 .':'.$xbmcport1 . '/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22params%22:%20{%22sort%22:%20{%22order%22:%20%22ascending%22,%20%22method%22:%20%22title%22,%20%22ignorearticle%22:%20true},%20%22properties%22:%20[%22title%22,%20%22thumbnail%22,%20%22imdbnumber%22,%20%22year%22,%20%22plot%22,%20%22rating%22]},%20%22method%22:%20%22VideoLibrary.GetMovies%22,%20%22id%22:%20%22libMovies%22}';




$content = file_get_contents($url);
$json = json_decode($content, true);

$hrcount = 0;
	foreach($json['result']['movies'] as $item) {
			$hrcount = $hrcount + 1;
		}
		

$english_format_number = number_format($hrcount);

echo "<font color=#BF0005><b>Movie Collection</font></b><br><font color=#004B97>Number of Movies: </font><font color=#004B97><b>$english_format_number </b></font><br><br>";

	foreach($json['result']['movies'] as $item) {
		
		$hrmovietitle = $item['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');
		$hrmovietitleshort = substr($hrmovietitle, 0, 34);

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


?>


