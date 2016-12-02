<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


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


<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<?php
require 'config.php';			
?>


	<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

		<tr valign="top">      
			<td>
			
			<div style="background-color: #000000; color:#F4C200;" id="rss" class="rss">
			In Theaters
				<div id="poster" class="poster" style="-webkit-box-shadow: 0 0 0 0 #000000; box-shadow: 0 0 0 0 #000000; background-color: #000000; border: 0px none #000;">
				
				<?php
					include('rt_movie_theater.php');
					
					echo "<hr style=\"color: #f00; background-color: #C49C00; height: 1px; border: 0;\">
					<img src=\"includes/images/rt_openingsoon.png\" height=108 style=\"margin-top:3px; margin-left:5px;\">";
					include('rt_movie_opening.php');
					
					echo "<img src=\"includes/images/rt_upcoming.png\" height=108 style=\"margin-top:3px; margin-left:5px;\">";
					include('rt_movie_upcoming.php');
				?>
				</div>	
			</div> 		
			<div style="height: 6px;">&nbsp</div>
			<div style="background-color: #fff" id="rss" class="rss" style=\"margin-top:10px;\">
			Video Releases
				<div id="poster" class="poster" >
			
				<?php
					echo "<img src=\"includes/images/rt_upcoming.png\" height=100 style=\"margin-top:3px; margin-left:5px;\">";
					include('rt_videos_upcoming.php');
					echo "<img src=\"includes/images/rt_latest.png\" height=100 style=\"margin-top:3px; margin-left:5px;\">";
					include('rt_videos_new.php');
				?>
				</div>	
			</div> 				
			
			</td>
		</tr>    

	 

	</table>	
		
