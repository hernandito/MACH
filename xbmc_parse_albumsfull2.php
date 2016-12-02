
<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<script type="text/javascript" src="jquery.tooltipster.js"></script>
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

<?php

require 'config.php';

echo "<div style=\" padding-left: 8px; background-color: #000000; width:100%;\">";

echo "<div style=\" font-family: Verdana, Geneva, sans-serif; font-size: 10px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none;  margin-bottom:3px; padding-top:5px;\">
		Recent Albums:
	</div>";		
	
	$response = file_get_contents("http://{$xbmcusername2}:{$xbmcpassword2}@{$xbmcIP2}:{$xbmcport2}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22AudioLibrary.GetRecentlyAddedAlbums%22,%20%22params%22:%20{%20%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2050%20},%20%22properties%22:%20[%20%22artist%22,%22year%22,%20%22thumbnail%22]},%20%22id%22:%20%22libAlbums%22}");

	
	
	$wawa = substr($response,54);
	$wawa = substr($wawa,0, -44);
	
	$wawa =  str_replace('[',"",$wawa) ;
	$wawa =  str_replace(']',"",$wawa) ;	

	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);

	$albumsdisplay =  $numrecentalbums - 1;
	
	for ($i = 0; $i <= 23; $i++) {
		$hralbumid = $result[$i]['albumid'];
		
		$hrthumbnail = $result[$i]['thumbnail'];
		$hrthumbnail2 = urlencode($hrthumbnail);
		$hrthumbnail3 = "http://{$xbmcusername2}:{$xbmcpassword2}@{$xbmcIP2}:{$xbmcport2}/image/". $hrthumbnail2;
		
		if ($isportopen1 != "yes") {
			$imageData = base64_encode(file_get_contents($hrthumbnail3));
			// Format the image SRC:  data:{mime};base64,{data};
			$src = 'data: '.mime_content_type($hrthumbnail3).';base64,'.$imageData;
		} else {
			$src = $hrthumbnail3;
		}	
		

		$hralbumid = $result[$i]['albumid'];

	$url = 'http://'. $xbmcusername2 .':'. $xbmcpassword2 . '@' . $xbmcIP2 .':'.$xbmcport2 . '/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22AudioLibrary.GetSongs%22,%20%22params%22:%20{%20%22filter%22:%20{%20%22albumid%22%20:%20'.$hralbumid .'%20},%20%22properties%22:%20[%20%22artist%22,%22track%22]},%20%22sort%22:%20{%20%22order%22:%20%22ascending%22,%20%22method%22:%20%22track%22},%20%22id%22:%20%22libAlbums%22}';




		
	echo "<a class=tooltip2 href=\"#\" onclick=\"return false;\" style=\" margin-right: 3px;  \"
							title='<center><img src=\"{$src}\" width=210 id=postersingle2 class=postersingle2></center><br>";
							
							$albumname = $result[$i]['label'];
							$albumname =  str_replace('"',"'",$albumname) ;
							$albumname =  str_replace('/'," - ",$albumname) ;
							$albumname = htmlentities($albumname, ENT_QUOTES, 'UTF-8');
							
								echo $albumname ."<br><font id=bubble class=bubble>" . $result[$i]['artist'] ."<b><br><br> ";
								
								echo "<table border=0 celllpadding=0 cellspacing=0>";
								foreach($json['result']['songs'] as $item) {
									
									
									echo "<tr><td valign=top><nobr><font id=bubble class=bubble>" ;
									$songname = $item['label'];
									
									$songname =  str_replace('"',"'",$songname) ;	
									$songname = htmlentities($songname, ENT_QUOTES, 'UTF-8');
									
									echo sprintf("%02s",$item['track']) . ' - </nobr></td><td> '. $songname;
									echo "</tr>";
								}
							
							echo "</font></table><br>' ><img style=\"padding-right:0px; padding-left:0px; border:1px solid #4D4D4D;\"src=\"{$src}\" width=164 height=164></a>";
		
		

		$songlist = '';
	}
	
	echo "<br>";	
echo "</div >";

?>