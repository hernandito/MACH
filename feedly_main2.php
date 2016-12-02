<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />




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



				
				
				<div id="recents" style="margin-left: 5px; margin-top: 2px; padding:3px; width:238px">
				<div style="color:#F4C200; margin-left: 5px;"><b>HD-Trailers</b></div>
				
				
				<?php include 'parse_hdtrailers.php';	?>
				</div>
							
			

				<?php include 'feedly2.php';	?>


		
