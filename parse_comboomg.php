<script src="jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox({iframe:true, width:"65%", height:"90%"});
				$(".ajax2").colorbox({iframe:true, width:"85%", height:"90%"});
				$(".ajax3").colorbox({iframe:true, width:"90%", height:"90%"});
				$(".ajax4").colorbox({iframe:true, width:"300", height:"600"});
				$(".ajax5").colorbox({iframe:true, width:"30%", height:"15%"});
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%", height:"50%"});
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
<link rel="stylesheet" href="colorbox.css" />


<?php

require 'config.php';



?>

<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

			
	<tr valign="top">      
		<td >
			<div id="rss" class="rss" style="
					-moz-column-count: 4;
					-moz-column-gap: 4px;
					-webkit-column-count: 4;
					-webkit-column-gap: 4px;
					column-count: 4;
					column-gap: 4px;">
						<img style="margin-bottom: 4px;" src="includes/images/nzbsu2.png" width="82" height="25">
						<a href="includes/required/feed2js/build.php" class="ajax2" title="Setup your URL"><img style="margin-left:-5px; margin-bottom:10px;" src="includes/images/minisetup.png"></a>
						

						<?php 	
						include('nzbsuparse.php');
						?>
						
						<img style="margin-bottom: 4px;" src="includes/images/omg.png" width="182" height="25">
						
					
						
						<?php 	
						include('omgparse.php');
						?>
			</div> 	
		</td>
	</tr> 		


</table>


