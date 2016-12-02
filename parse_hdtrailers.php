<?php
//require 'config.php';
?>

<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<table width="100%" border="0" cellspacing="3" cellpadding="0" >	
<script src="jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){

				$(".iframe").colorbox({iframe:true, width:"99%", height:"78%"});

			});
		</script>

<script type="text/javascript" src="jquery.tooltipster.js"></script>
<script>
    $(document).ready(function() {
		$('.tooltip3').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		position: 'bottom',
		interactive: true,
		interactiveTolerance: 15,
		functionReady: function(origin, tooltip) {$(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});$(".iframe2").colorbox({iframe:true, width:"85%", height:"95%"});},
		});

		$('.tooltip4').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		position: 'top',
		offsetY: 80,
		interactive: true,
		interactiveTolerance: 15,
		functionReady: function(origin, tooltip) {$(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});$(".iframe2").colorbox({iframe:true, width:"85%", height:"95%"});},
		});


});			
</script> 


		
<table cellpadding=3 cellspacing=0 border=0>			
	<tr valign="top">      
		<td >

						<?php 
							$xml = simplexml_load_file('http://feeds.hd-trailers.net/hd-trailers');
							$items = $xml->xpath('//item');
							$links = $xml->xpath('//content:encoded');
							$LinksArray=array();
							$l=0;
							foreach ($links as $link) {
								$linkCnt = (string) $link;
								$LinksArray[$l]=$linkCnt;
								$l++;
							}
														
							$i = 0;
							foreach ( $items as $item) {

								if ($i == 26) break;								
								$mylink = $item->link;
							  	  
								$mytitle = $item->title;
								$mytitle = str_replace('.',' ',$mytitle);
								$mytitle =  str_replace('"',"'",$mytitle) ;	
								$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');
						  
								$mydesc = $item->description;
								$mydesc =  str_replace('"',"'",$mydesc) ;	
								$mydesc =  htmlentities($mydesc, ENT_QUOTES, 'UTF-8');
								$CntParts=explode("<strong>Download</strong>:",$LinksArray[$i]);
								
								$content_dom_watch = new DOMDocument();
								$content_dom_watch->loadHTML( (string)$CntParts[0]);
								$content_sxml_watch = simplexml_import_dom( $content_dom_watch);

								$content_dom_downloads = new DOMDocument();
								$content_dom_downloads->loadHTML( (string)$CntParts[1]);
								$content_sxml_downloads = simplexml_import_dom( $content_dom_downloads);								
								 
								$imgs = $content_sxml_watch->xpath('//img');								 
								$myposter=$imgs[0];$myposter=(array)$myposter[src];$myposter=$myposter[0];if(strlen($myposter)<3) $myposter="includes/images/noposter.jpg";								 									 

								$watchURL480p_c = $content_sxml_watch->xpath("//a[contains(text(), '480p')]/@href");
								$watchURL480p=(array)$watchURL480p_c[0];
								$watchURL480p=$watchURL480p ['@attributes']['href'];
								
								$watchURL720p_c = $content_sxml_watch->xpath("//a[contains(text(), '720p')]/@href"); 
								$watchURL720p=(array)$watchURL720p_c[0];
								$watchURL720p=$watchURL720p ['@attributes']['href'];						
								
								$watchURL1080p_c = $content_sxml_watch->xpath("//a[contains(text(), '1080p')]/@href"); 									
								$watchURL1080p=(array)$watchURL1080p_c[0];
								$watchURL1080p=$watchURL1080p ['@attributes']['href'];

								$downloadURL480p_c = $content_sxml_downloads->xpath("//a[contains(text(), '480p')]/@href");
								$downloadURL480p=(array)$downloadURL480p_c[0];
								$downloadURL480p=$downloadURL480p ['@attributes']['href'];
								
								$downloadURL720p_c = $content_sxml_downloads->xpath("//a[contains(text(), '720p')]/@href"); 
								$downloadURL720p=(array)$downloadURL720p_c[0];
								$downloadURL720p=$downloadURL720p ['@attributes']['href'];
								
								$downloadURL1080p_c = $content_sxml_downloads->xpath("//a[contains(text(), '1080p')]/@href"); 									
								$downloadURL1080p=(array)$downloadURL1080p_c[0];
								$downloadURL1080p=$downloadURL1080p ['@attributes']['href'];								

															
//								$mycontent = $item->content:encoded;  
						
						//		The above does not work. From this block of text, I want to extract the items below 
						//		into SEPARATE variables. I will need to manipulate these variables later, so 
						//		please, I need these explicitly called out as shown below. Please do not return some crazy array.
						
						//			$myposter = (url the first img within the block) if there is no image on the block
						//				then return a generic "no poster available image". I use the same image in the 
						//				main parsers you created for me.
						//
						//			$watchURL480p = the watch url for the 480p resolution 
						//			$watchURL720p = the watch url for the 7200p resolution 
						//			$watchURL10800p = the watch url for the 1080p resolution 	

						//			$downloadURL480p = the download url for the 480p resolution 
						//			$downloadURL720p = the download url for the 7200p resolution 
						//			$downloadURL10800p = the download url for the 1080p resolution 							
						
						//		Please note that some items may not have all the resolutions. Script should be smart 
						//		to detect this. It can return an empty variable if it does not exists.
						
						//		To all the url's above, I want to insert the following parameter...
						//			class="iframe"
						//		Please return these as separate variable. For example if a url is this:
						//			<a href="http://www.hd-trailers.net/xys">
						//		I want the variable to be:
						//			<a href="http://www.hd-trailers.net/xys" class="iframe">


$mytitle =  str_replace(')',"",$mytitle) ;	
$mytitle =  str_replace('(',"<br><font id=bubble class=bubble style=\"color:#B30000\"><b>",$mytitle) ;							



if($watchURL720p!="") { 
echo "<a href=\"{$watchURL720p}\" class=\"iframe\"><img  class=\"tooltip3\" src=\"{$myposter}\" width=\"68\" style=\"margin: 2px; border: 1px solid #4D4D4D;\" title='<img src=\"{$myposter}\" width=120 align=right id=postersingle2 class=postersingle2 style=\"margin-left:5px;\">{$mytitle}</b></font><br><br><font id=bubble class=bubble>{$mydesc}<br></font>'></a>";
} elseif ($watchURL1080p!="") { 
echo "<a href=\"{$watchURL1080p}\" class=\"iframe\"><img  class=\"tooltip3\" src=\"{$myposter}\" width=\"68\" style=\"margin: 2px; border: 1px solid #4D4D4D;\" title='<img src=\"{$myposter}\" width=120 align=right id=postersingle2 class=postersingle2 style=\"margin-left:5px;\">{$mytitle}</b></font><br><br><font id=bubble class=bubble>{$mydesc}<br></font>'></a>";
}

						

				
//echo '<img '. $mytooltippy .' width=68 style="margin: 2px; border: 1px solid #4D4D4D; " src="'.$myposter.' ">';								
	


	
/*						echo "<hr>";
						echo $mytitle;
						echo "<br>";
						echo $mydesc;
						echo "<br>";						
						
						echo "<br>";
						echo "<br>Watch<br>";							
						if($watchURL480p!="")  echo '<a href="'.$watchURL480p.'" class="iframe">480p</a>';
						echo "<br>";									
						if($watchURL720p!="")  echo '<a href="'.$watchURL720p.'" class="iframe">720p</a>';
						echo "<br>";									
						if($watchURL1080p!="")  echo '<a href="'.$watchURL1080p.'" class="iframe">1080p</a>';												
						echo "<br>";
						echo "<br>Downloads<br>";									
						if($downloadURL480p!="")  echo '<a href="'.$downloadURL480p.'" class="iframe">480p</a>';
						echo "<br>";									
						if($downloadURL720p!="")  echo '<a href="'.$downloadURL720p.'" class="iframe">720p</a>';
						echo "<br>";									
						if($downloadURL1080p!="")  echo '<a href="'.$downloadURL1080p.'" class="iframe">1080p</a>';	

						
//<![CDATA[<p><img style="float:left; margin-left:10px; margin-right:10px;" src="http://static.hd-trailers.net/images/deliver-us-from-evil-17418-poster-xlarge-resized.jpg" alt="Deliver Us From Evil Poster" /> New York police officer Ralph Sarchie, struggling with his own personal issues, begins investigating a series of disturbing and inexplicable crimes.  He joins forces with an unconventional priest schooled in the rituals of exorcism, to combat the frightening and demonic possessions that are terrorizing their city. (<a href="https://www.yahoo.com/movies/film/deliver-us-from-evil-2014/">Source</a>)</p><p><strong>Watch</strong>: <a href="http://www.hd-trailers.net/movie/deliver-us-from-evil-2014/#2-trailer-3-480p">480p</a>, <a href="http://www.hd-trailers.net/movie/deliver-us-from-evil-2014/#2-trailer-3-720p">720p</a>, <a href="http://www.hd-trailers.net/movie/deliver-us-from-evil-2014/#2-trailer-3-1080p">1080p</a><br /><strong>Download</strong>: <a href="http://www.hd-trailers.net/yahoo-redir.php?id=d40abe48-9bef-3130-8c37-681384bd41f2&#38;resolution=540">480p</a>, <a href="http://www.hd-trailers.net/yahoo-redir.php?id=d40abe48-9bef-3130-8c37-681384bd41f2&#38;resolution=720">720p</a>, <a href="http://www.hd-trailers.net/yahoo-redir.php?id=d40abe48-9bef-3130-8c37-681384bd41f2&#38;resolution=1080">1080p</a></p>]]>


*/
						$i++;
						}
						?>
						






						
			
		</td>
	</tr> 		


</table>


