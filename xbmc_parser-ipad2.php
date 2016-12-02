

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>


<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<script type="text/javascript" src="jquery.tooltipster.js"></script>


<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>


		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"51%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>





<?php

require 'config.php';


$myurl = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.GetRecentlyAddedMovies%22,%20%22params%22:%20{%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2024%20},%20%22properties%22%20:%20[%22title%22,%20%22mpaa%22,%20%22thumbnail%22,%20%22rating%22,%20%22year%22,%20%22plot%22]%20%20},%20%22id%22:%20%22libMovies%22}";


	$response = file_get_contents($myurl);

	$wawa = substr($response,96);
	$wawa = substr($wawa,0, -3);
	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);
	
	for ($i = 0; $i <= 11; $i++) {
		$hrmovietitle = $result[$i]['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

	
		
		$hrthumbnail = $result[$i]['thumbnail'];
		$hrthumbnail2 = urlencode($hrthumbnail);	
		$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;
		
		if ($isportopen1 != "yes") {
			$imageData = base64_encode(file_get_contents($hrthumbnail3));
			// Format the image SRC:  data:{mime};base64,{data};
			$src = 'data: '.mime_content_type($hrthumbnail3).';base64,'.$imageData;
		} else {
			$src = $hrthumbnail3;
		}
		
		$hrmpaa = $result[$i]['mpaa'];
		$hryear = $result[$i]['year'];
		$hrrating = round($result[$i]['rating'],1);
		
		$hrplot = $result[$i]['plot'];
		$hrplot =  str_replace('"',"'",$hrplot) ;	
		$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');

		$inline_content = "hrhiddencontent{$i}";



		echo "<a class='inline' href=\"#{$inline_content}\"><img style=\" padding-right:0px; border: 1px solid #4D4D4D; max-height: 171px \" src=\"{$src}\" width=115  ></a>";

			echo 	"<div style=\"display:none\">
						<div id='{$inline_content}' style=\"padding:10px; background-color: #FFF1C1;
								border: 1px solid #BBBBBB;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								font-family: Arial, Helvetica, sans-serif;
								font-size: 12px;
								font-style: normal;
								line-height: normal;
								font-weight: normal;
								color: #666;
								text-decoration: none;\">
							<table width=100% border=0 cellspacing=0 cellpadding=0>
								<tr>
									<td valign=top >
									<font id=bubble-ipad  class=bubble-ipad >
									<font style=\"font-size: 22px; font-weight: bold; \">
										{$hrmovietitle}</font>
										<br><br>	
										Year: <b>{$hryear}</b> <br>				
										Rating: <b>{$hrrating}</b><br>		
										{$hrmpaa}<br>				
									</td>
									<td width=167 align=right valign=top >
										<img src=\"{$src}\" width=160 id=postersingle2 class=postersingle2 style=\"margin-left:10px\"> 
									</td>
								</tr>
								<tr>
									<td valign=top colspan=2>
										<font id=bubble-ipad  class=bubble-ipad >
										{$hrplot}</font>	
									</td>
								</tr>	
							</table>
						</div>
					</div>";

	}		
/*	for ($i = 8; $i <= 11; $i++) {
		$hrmovietitle = $result[$i]['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

	
		
		$hrthumbnail = $result[$i]['thumbnail'];
		$hrthumbnail2 = urlencode($hrthumbnail);	
		$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;
		
		$hrmpaa = $result[$i]['mpaa'];
		$hryear = $result[$i]['year'];
		$hrrating = round($result[$i]['rating'],1);
		
		$hrplot = $result[$i]['plot'];
		$hrplot =  str_replace('"',"'",$hrplot) ;	
		$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');

		
		
		if ($isportopen1 != "yes") {
			$imageData = base64_encode(file_get_contents($hrthumbnail3));
			// Format the image SRC:  data:{mime};base64,{data};
			$src = 'data: '.mime_content_type($hrthumbnail3).';base64,'.$imageData;
		} else {
			$src = $hrthumbnail3;
		}

		
		echo "<li ><a class=tooltip2 href=\"#\" onclick=\"return false;\" title=
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
		</table>' 
	

		>" .substr($hrmovietitle,0,34);
		
		echo "</a></li>";
		

	}		
*/
	echo "<div style=\"	font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none; margin-left: 1px;\"><br>Recent TV Shows:</div>";
	

	
	$response = file_get_contents("http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.GetRecentlyAddedEpisodes%22,%20%22params%22:%20{%20%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2012%20},%20%22properties%22%20:%20[%22showtitle%22,%20%22episode%22,%20%22season%22]%20%20},%20%22id%22:%20%22libMovies%22}
	");

	$wawa = substr($response,56);
	$wawa = substr($wawa,0, -45);

	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);

	
	echo  "<div style=\" -moz-column-count: 2;
			-moz-column-gap: 6px;
			-webkit-column-count: 2;
			-webkit-column-gap: 6px;
			column-count: 2;
			column-gap: 6px; \">";


	for ($i = 0; $i <= 7; $i++) {

		echo "<li style=\"font-size:12px; font-weight: bold; padding-top: 3px; padding-bottom: 3px; padding-left: 10px; color:#868686 \">" .substr($result[$i]['showtitle'],0,58);
		echo "<font color=#E0CD83> - s".sprintf("%02s",$result[$i]['season'])."e".sprintf("%02s", $result[$i]['episode']). "</font></font></li>";
	}

echo "</div>";
	
	
	
	
/*	
	
	echo "<div style=\"	font-family: Verdana, Geneva, sans-serif; font-size: 10px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none; margin-left: 1px;\"><br>Recent Albums:</div>";
	
	$response = file_get_contents("http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22AudioLibrary.GetRecentlyAddedAlbums%22,%20%22params%22:%20{%20%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2050%20},%20%22properties%22:%20[%20%22artist%22,%22year%22,%20%22thumbnail%22]},%20%22id%22:%20%22libAlbums%22}
	");

	$wawa = substr($response,54);
	$wawa = substr($wawa,0, -44);
	
	$wawa =  str_replace('[',"",$wawa) ;
	$wawa =  str_replace(']',"",$wawa) ;	

	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);

	
	
	for ($i = 0; $i <= 3; $i++) {
		$hralbumid = $result[$i]['albumid'];
		
		$hrthumbnail = $result[$i]['thumbnail'];
		$hrthumbnail2 = urlencode($hrthumbnail);
		$hrthumbnail3 = "http://{$xbmcusername1}:{$xbmcpassword1}@{$xbmcIP1}:{$xbmcport1}/image/". $hrthumbnail2;
		
		if ($isportopen1 != "yes") {
			$imageData = base64_encode(file_get_contents($hrthumbnail3));
			// Format the image SRC:  data:{mime};base64,{data};
			$src = 'data: '.mime_content_type($hrthumbnail3).';base64,'.$imageData;
		} else {
			$src = $hrthumbnail3;
		}	
		

		$hralbumid = $result[$i]['albumid'];
		
		$url = 'http://'. $xbmcusername1 .':'. $xbmcpassword1 . '@' . $xbmcIP1 .':'.$xbmcport1 . '/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22AudioLibrary.GetSongs%22,%20%22params%22:%20{%20%22filter%22:%20{%20%22albumid%22%20:%20'.$hralbumid .'%20},%20%22properties%22:%20[%20%22artist%22,%22track%22]},%20%22sort%22:%20{%20%22order%22:%20%22ascending%22,%20%22method%22:%20%22track%22},%20%22id%22:%20%22libAlbums%22}';
		$content = file_get_contents($url);
		$json = json_decode($content, true);

		
		echo "<li >
				<table border=0 cellspacing=0 cellpadding=0 >
					<tr>
						<td valing=top>
							<a class=tooltip href=\"#\" onclick=\"return false;\" 
							title='<center><img src=\"{$src}\" width=160 id=postersingle2 class=postersingle2></center><br>";
								echo $result[$i]['label'] ."<br><font id=bubble class=bubble>" . $result[$i]['artist'] ."<b><br><br> ";
								
								echo "<table border=0 celllpadding=0 cellspacing=0>";
								foreach($json['result']['songs'] as $item) {
									
									
									echo "<tr><td valign=top><nobr><font id=bubble class=bubble>" ;
									$songname = $item['label'];
									
									$songname =  str_replace('"',"'",$songname) ;	
									$songname = htmlentities($songname, ENT_QUOTES, 'UTF-8');
									
									echo sprintf("%02s",$item['track']) . ' - </nobr></td><td> '. $songname;
									echo "</tr>";
								}
							
							echo "</font> </table><br>' >
							<img src=\"{$src}\" width=24 style=\"padding-right: 6px; padding-top:3px; \" ></a></td>
						<td valing=top><b>
						" .substr($result[$i]['artist'],0,48);
						echo "</b><br>" . $result[$i]['label'];
						echo "</td>
					</tr>
				</table>
		</li>";
		$songlist = '';
	}
	
	
	



	
	
	echo "<br>";	
*/

?>