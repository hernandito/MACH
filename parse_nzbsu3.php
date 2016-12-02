<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){

				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});

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





<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

	<tr valign="top">      
		<td>
			<div style="background-color: #fff" id="rss" class="rss">

				<div id="poster" class="poster">

				<table width="100%" border="0" cellspacing="3" cellpadding="0" >
					<tr valign="top">  					
						<td width=30px bgcolor=white >		
							<?php
								echo "<a href={$NZBdotorgLandingPage} rel='ajaxpanel'><img style=\"margin-top:5px; margin-left:3px;\" src=\"{$NZBdotorgLogoImage}\" >";
							?>
						</td>			
						<td >
						<div id='dotorgdiv'>		
						<?php 
							$xml = simplexml_load_file('https://api.nzb.su/rss?t=2040&dl=0&i=127565&r=53e032c86de81d9fc3528d880577ec47');
							echo "hey";
/*							
							$IMDBList=array();
							$SizeList=array();
							$attrList = $xml->xpath('//newznab:attr');
							foreach ($attrList as $attr) {
								$Opts= (array) $attr->attributes();$OptsList=$Opts['@attributes'];
								////category,category,size,files,poster,genre,imdb,rating,pred,grabs,comments,password,completion,usenetdate,group
								if($OptsList['name']=="imdb") $IMDBList[]=$OptsList['value'];
								if($OptsList['name']=="size") $SizeList[]=$OptsList['value'];									
							}																				
*/
							$itemNr=0;
							
							$items = $xml->xpath('///item');
							foreach ( $items as $item) {
/*
								$myimdbraw=$IMDBList[$itemNr];
								$myimdb=$IMDBList[$itemNr]*1;
								$mysize=$SizeList[$itemNr];
								$myimdbtt = "tt{$myimdbraw}";
								
								
							$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
							$base = 1024;
							$class = min((int)log($mysize , $base) , count($si_prefix) - 1);
							$mysizenumber = sprintf('%1.2f', $mysize / pow($base,$class)) . ' ' . $si_prefix[$class];
						
							
							
								
							$myimdblink = "<a href='http://imdb.com/title/tt{$myimdb}' target='_new'><img src='includes/images/minimdb.png' style='padding-bottom:-4px; margin-bottom: -5px; margin-left:-3px;'></a>";
								
							  	$descriptions = $item->description;
*/									
								$myfulltitle = substr($item->title,0,43);
								
								$mytitle = $item->title;$mytrimtitle="";
								$mytitle = explode(".",$mytitle);foreach($mytitle as $mytitlepart) {if($mytitlepart>0){break; }else $mytrimtitle.=$mytitlepart." ";}
								$mytitle =  str_replace('"',"'",$mytitle) ;	
								$mytitle =  str_replace('&',"and",$mytitle) ;
								$mytrimtitle =  str_replace('-',' ',$mytrimtitle) ;
								
								$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');								  
/*								$mylink = $item->link;							  	

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
								
								$itemCnt="<div id='postersingle' class='postersingle'><a href='{$mylink}' rel='ajaxpanel'>"
								."<img class=\"tooltipx\" id=\"demo-interact\" height=\"120\" src=\"{$img}\" style=\"max-width:80px;\" title=\"<img src='{$img}' height=180 align=right id=postersingle2 class=postersingle2 style='margin-left:5px; '>{$mytrimtitle} <font id=bubble class=bubble>";
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
							 	$itemCnt.="<br>
								
														<form action='JavaScript:getTrailersdotorg($myimdb)' method='POST' id='dotorg{$myimdb}' >
																<input type='hidden' id='movieidtt' name='movieidtt' value='{$myimdbtt}'>
																<input type='hidden' id='movieid' name='movieid' value='{$myimdb}'>
																<input type='hidden' id='moviename' name='moviename' value='{$hrmovietitle}'>
																<a  class='iframex classpanel2' href='javascript:;' onclick='parentNode.submit();' style='	
																		color: #FFF;
																		background-color: #156199;
																		padding-top: 1px;
																		border-top-style: none;
																		border-right-style: none;
																		border-bottom-style: none;
																		border-left-style: none;
																		padding-right: 4px;
																		padding-bottom: 1px;
																		padding-left: 4px; 
																		font-size: 8pt; 
																		margin-left: 0px; ' 
																		>search trailer</a>						
														</form>								
								
								{$myimdblink}<div id='mytrailersdotorg'></div><hr><font color=#8A8A7B>{$myfulltitle}</font> </font> 



								\"/></a></div>";
								
*/								
								
							 	echo $mytitle;
							 	$itemNr++;
							}

						?>
						</div>
						</td></tr>
					
						</table>				
					
				</div>			
			</div>   
		</td>
	</tr>    

 

</table>


