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

<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

	<tr valign="top">      
		<td>
			<div style="background-color: #fff" id="rss" class="rss">

				<div id="poster" class="poster">

				<table width="100%" border="0" cellspacing="3" cellpadding="0" >
					<tr valign="top">  					
						<td width=30px bgcolor=white >	
							<?php
								echo "<a href={$OzNzbLandingPage} rel='ajaxpanel'><img style=\"margin-top:5px; margin-left:3px;\" src=\"{$OzNzbLogoImage}\" >";
							?>
						</td>			
						<td>

						<?php
							$xml = simplexml_load_file($OzNzbRSS);
							$items = $xml->xpath('//item');
							foreach ( $items as $item) {
							  	$descriptions = $item->description;
								
								$myfulltitle = substr($item->title,0,43);
								
								$mytitle = $item->title;$mytrimtitle="";
								$mytitle = explode(".",$mytitle);foreach($mytitle as $mytitlepart) {if($mytitlepart>0){break; }else $mytrimtitle.=$mytitlepart." ";}								  
								$mytitle =  str_replace('"',"'",$mytitle) ;	
								$mytitle =  str_replace('&',"and",$mytitle) ;
								$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');		
																			
								$mylink = $item->link;							  	

								$A=array("Year","Size","Plot");//,"Director","Actors"
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
								."<img class=\"tooltipx\" height=\"{$MovieIconSizeoz}\" src=\"{$img}\"  title=\"<img src='{$img}' height=180 align=right id=postersingle2 class=postersingle2 style='margin-left:5px; '>{$mytrimtitle} <font id=bubble class=bubble>";
					 	 		foreach($A as$a){
								 	 	if($B[$a]) {
								 	 		$B[$a]=str_replace('"',"'",$B[$a]) ;	
											$B[$a] = htmlentities($B[$a], ENT_QUOTES, 'UTF-8');									 	 	
								 	 		$itemCnt.="<br>";
								 	 		if($a!="Plot")$itemCnt.=$a.":<b>"; else $itemCnt.="&nbsp;<br>";
								 	 		$itemCnt.=$B[$a];
								 	 		if($a!="Plot")$itemCnt.="</b>";
								 	 	}
							 	 		
							 	 }								
							 	$itemCnt.="<br><hr><font color=#8A8A7B>{$myfulltitle}</font> </font>  \"/></a></div>";
							 	echo $itemCnt;
							}
						?>
						</td></tr></table>				
					
				</div>			
			</div>   
		</td>
	</tr>    

 

</table>


