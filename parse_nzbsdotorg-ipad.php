<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

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

<script type="text/javascript" src="jquery.tooltipster.js"></script>
<script>
    $(document).ready(function() {

		$('.tooltipx').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		position: 'top',
		interactive: true,
		interactiveTolerance: 25,
		functionReady: function(origin, tooltip) {$(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});$(".iframe2").colorbox({iframe:true, width:"85%", height:"95%"});},
		});

});			
</script> 



<?php
require 'config.php';
?>



<script type="text/javascript">
function dotorgRefresh(){
$("#dotorgdiv").load("blank.php");
$("#dotorgdiv").load("parse_nzbsdotorg.php");
 
}
</script>

<SCRIPT LANGUAGE="JavaScript">
    function getTrailersdotorg(movieid)
    {
		$("#mytrailersdotorg").innerHTML="Please wait....";
        $("#mytrailersdotorg").load("trailersearch.php",$("#dotorg" + movieid).serialize()); 
 
	
		
    }
</SCRIPT>







				<div id="poster" class="poster">

				<table width="100%" border="0" cellspacing="0" cellpadding="0" >
					<tr valign="top">  					
						<td width=30px bgcolor=white >		
							<?php
								echo "<a href={$NZBdotorgLandingPage} rel='ajaxpanel'><img style=\"margin-top:5px; margin-left:3px;\" src=\"{$NZBdotorgLogoImage}\" >";
							?>
						</td>			
						<td >
						<div id='dotorgdiv'>		
						<?php 
							$xml = simplexml_load_file($NZBdotorgRSS);
							
							$IMDBList=array();
							$SizeList=array();
							$attrList = $xml->xpath('//newznab:attr');
							foreach ($attrList as $attr) {
								$Opts= (array) $attr->attributes();$OptsList=$Opts['@attributes'];
								////category,category,size,files,poster,genre,imdb,rating,pred,grabs,comments,password,completion,usenetdate,group
								if($OptsList['name']=="imdb") $IMDBList[]=$OptsList['value'];
								if($OptsList['name']=="size") $SizeList[]=$OptsList['value'];									
							}																				
							$itemNr=0;
							
							$items = $xml->xpath('//item');
							foreach ( $items as $item) {

								$myimdbraw=$IMDBList[$itemNr];
								$myimdb=$IMDBList[$itemNr]*1;
								$mysize=$SizeList[$itemNr];
								$myimdbtt = "tt{$myimdbraw}";
								
								
							$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
							$base = 1024;
							$class = min((int)log($mysize , $base) , count($si_prefix) - 1);
							$mysizenumber = sprintf('%1.2f', $mysize / pow($base,$class)) . ' ' . $si_prefix[$class];
							
							
							
								
							$myimdblink = "<a href='http://imdb.com/title/tt{$myimdb}' target='_new'><img src='includes/images/midimdb.png' height=30 style='padding-bottom:-4px; margin-bottom: -10px; margin-left: 9px;'></a>";
								
							  	$descriptions = $item->description;
								
								$myfulltitle = substr($item->title,0,43);
								
								$mytitle = $item->title;$mytrimtitle="";
								$mytitle = explode(".",$mytitle);foreach($mytitle as $mytitlepart) {if($mytitlepart>0){break; }else $mytrimtitle.=$mytitlepart." ";}
								$mytitle =  str_replace('"',"'",$mytitle) ;	
								$mytitle =  str_replace('&',"and",$mytitle) ;
								$mytrimtitle =  str_replace('-',' ',$mytrimtitle) ;
								
								$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');								  
								$mylink = $item->link;							  	

								$A=array("Year","Rating","Genre","Size","Plot");
								$B=array();
								
							 	 foreach ( $descriptions as $description_node ) {
								 	$description_dom = new DOMDocument();
								 	$description_dom->loadHTML( (string)$description_node );
								 	$description_sxml = simplexml_import_dom( $description_dom );
								 	$imgs = $description_sxml->xpath('//img');
									$img=$imgs[0];$img=(array)$img[src];$img=$img[0];if(strlen($img)<3) $img="includes/images/noposter.jpg";								 	
									$uls=$description_sxml->xpath('//ul');
									foreach ( $uls as $ul ) {
										$ul=(array)$ul;$lis=$ul[li];
										foreach($lis as $li){
											$liT= explode(":", $li);$k=$liT[0];if($liT[1]!="") $B[$k]=$liT[1];
										}
									}								 									 	 
							 	 }															
								$inline_content = "hrnzbshiddencontent{$itemNr}";
								$itemCnt="<div id='postersingle' class='postersingle'>
								
								
								<a href=\"#{$inline_content}\" class='inline' >"
								."<img height=\"180\" style=\" padding:0px; margin:0px; border:0px; max-width:120px; \" src=\"{$img}\" ></a>
								
								  <div style=\"display:none\">
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
								
								<img src='{$img}' width=180 align=right id=postersingle2 class=postersingle2 style='margin-left:5px; '>
								<font style=\"font-size: 22px; font-weight: bold; \">
								{$mytrimtitle}<br> </font>
								<font id=bubble-ipad class=bubble-ipad>";
					 	 		foreach($A as$a){
								 	 	if($B[$a]) {
								 	 		$B[$a]=str_replace('"',"'",$B[$a]) ;	
											$B[$a]=str_replace('-'," ",$B[$a]) ;
											$B[$a] = htmlentities($B[$a], ENT_QUOTES, 'UTF-8');									 	 	
								 	 		$itemCnt.="<br>";
								 	 		if($a!="Plot")$itemCnt.=$a.":<b>"; else $itemCnt.="&nbsp;<br>";
								 	 		$itemCnt.=$B[$a];
								 	 		if($a!="Plot")$itemCnt.="</b>";
								 	 	}
							 	 		
							 	 }								
							 	$itemCnt.="<br><br>
								
													<a  class=\"iframex classpanel2\" href=\"{$mylink}\" target=newtab style=\"	
															color: #003366;
															background-color: #fff;
															border: thin solid #888888;
															padding-top: 4px;
															padding-right: 8px;
															padding-bottom: 4px;
															padding-left: 8px; 
															font-size: 10pt; 
															font-weight: normal;
															margin-top: 6px;
															margin-left: 0px; \">
														open in <b>NZBs.org</b></a>
								
														<form action='JavaScript:getTrailersdotorg($myimdb)' method='POST' id='dotorg{$myimdb}' >
																<input type='hidden' id='movieidtt' name='movieidtt' value='{$myimdbtt}'>
																<input type='hidden' id='movieid' name='movieid' value='{$myimdb}'>
																<input type='hidden' id='moviename' name='moviename' value='{$hrmovietitle}'>
				
														</form>								
								
								{$myimdblink}<div id='mytrailersdotorg'></div><hr><font color=#8A8A7B>{$myfulltitle}</font> </font> 

			</div></div>

								</div>";
							 	echo $itemCnt;
							 	$itemNr++;
							}

						?>
						</div>
						</td></tr>
					
						</table>				
					
				</div>			



