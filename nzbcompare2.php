
<link rel="stylesheet" href="jquery2.css" type="text/css" />


<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="tooltip.css" />
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



		
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 





<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<?php
require 'config.php';			

date_default_timezone_set('America/New_York');

			echo "<div id='nzbsdiv'>";			
				if ($enableNZBS == "yes") {
					include('parse_nzbsdotorg2db.php');
					echo "<br>";
				}
			echo "</div>";				
				
			echo "<div id='dogdiv'>";				
				if ($enableDog == "yes") {
					include('parse_dognzb2db.php');
					echo "<br>";
				}				
			echo "</div>";
				
			echo "<div id='comboomgdiv'>";				
				if ($enablecombo == "yes") {
					include('parse_comboomg.php');
				}
			echo "</div>";
						
			echo "<div id='omgdiv'>";				
				if ($enableOMGdisplay == "yes") {
					include('parse_omg2db.php');
				}
			echo "</div>";

			echo "<div id='nzbnerdsdiv'>";				
				if ($enableNZBNerds == "yes") {
					include('parse_nzbnerds.php');
				}	
			echo "</div>";	
			
			echo "<div id='oztdiv'>";				
				if ($enableOZ == "yes") {
					include('parse_oznzbdb.php');
				}
			echo "</div>";		
			
			echo "<div id='nzbsudiv'>";				
				if ($enableNZBdotsu == "yes") {
					include('parse_nzbsu2.php');
				}				
			echo "</div>";
			
			echo "<div id='rlslogdiv'>";				
				if ($enableRlsLog == "yes") {
					include('parse_rlslog2.php');
				}
			echo "</div>";
					
			echo "<div id='nzbtvdiv'>";				
				if ($enableNZBTV == "yes") {
					include('parse_nzbtv2db.php');
				}					
			echo "</div>";
				
			echo "<div id='dualfeedtdiv'>";
				if ($enableDualFeed == "yes") {
					include('parse_dualfeed.php');
				}		
			echo "</div>";
						
			echo "<div id='enableNZBNDX'>";				
				if ($enableNZBNDX == "yes") {
					include('parse_nzbndx2db.php');
				}	
			echo "</div>";		
			
			echo "<div id='enableNZBfinder'>";				
				if ($enableNZBfinder == "yes") {
					include('parse_nzbfinderdb.php');
				}	
			echo "</div>";

			echo "<div id='enableNZBcat'>";				
				if ($enableNZBcat == "yes") {
					include('parse_nzbcat2db.php');
				}	
			echo "</div>";			

echo  "<a href=\"#\" class=\"scrollup\">Scroll</a>";			
			?>