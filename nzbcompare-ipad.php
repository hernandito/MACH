

<script>
    $(document).ready(function() {

			
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 



<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<?php

date_default_timezone_set('America/New_York');
require 'config.php';			
		//	echo "<div id='traktdiv'>";
		//		if ($enableTrakTrending == "yes") {
		//			include('trakt_parser.php');
		//		}
		//	echo "</div>";

			echo "<div id='nzbsdiv'>";			
				if ($enableNZBS == "yes") {
					include('parse_nzbsdotorg-ipaddb.php');
					echo "<br><br>";
				}
			echo "</div>";				
				
			echo "<div id='dogdiv'>";				
				if ($enableDog == "yes") {
					include('parse_dognzb-ipaddb.php');
					echo "<br><br>";
				}				
			echo "</div>";
				
			echo "<div id='comboomgdiv'>";				
				if ($enablecombo == "yes") {
					include('parse_comboomg.php');
				}
			echo "</div>";
						
			echo "<div id='omgdiv'>";				
				if ($enableOMGdisplay == "yes") {
					include('parse_omg-ipaddb.php');
				}
			echo "</div>";
			
			echo "<div id='nzbsudiv'>";				
				if ($enableNZBdotsu == "yes") {
					include('parse_nzbsu2.php');
				}				
			echo "</div>";
			
			echo "<div id='rlslogdiv'>";				
				if ($enableRlsLog == "yes") {
					include('parse_rlslog-ipad.php');
				}
			echo "</div>";
			
			echo "<div id='oztdiv'>";				
				if ($enableOZ == "yes") {
					include('parse_oznzb.php');
				}
			echo "</div>";
			
//			echo "<div id='nzbtvdiv'>";				
//				if ($enableNZBTV == "yes") {
//					include('parse_nzbtv.php');
//				}					
//			echo "</div>";
				
			echo "<div id='dualfeedtdiv'>";
				if ($enableDualFeed == "yes") {
					include('parse_dualfeed.php');
				}		
			echo "</div>";
			
			echo "<div id='ruizdiv'>";				
				if ($enableRuiz == "yes") {
					include('parse_ruiz-ipaddb2.php');
				}	
			echo "</div>";	

echo  "<a href=\"#\" class=\"scrollup\">Scroll</a>";			
			?>