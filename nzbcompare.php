

<script>
    $(document).ready(function() {

			
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 



<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<?php
require 'config.php';			
			echo "<div id='traktdiv'>";
				if ($enableTrakTrending == "yes") {
					include('trakt_parser.php');
				}
			echo "</div>";

			echo "<div id='nzbsdiv'>";			
				if ($enableNZBS == "yes") {
					include('parse_nzbsdotorg.php');
				}
			echo "</div>";				
				
			echo "<div id='dogdiv'>";				
				if ($enableDog == "yes") {
					include('parse_dognzb.php');
				}				
			echo "</div>";
				
			echo "<div id='comboomgdiv'>";				
				if ($enablecombo == "yes") {
					include('parse_comboomg.php');
				}
			echo "</div>";
						
			echo "<div id='omgdiv'>";				
				if ($enableOMGdisplay == "yes") {
					include('parse_omg.php');
				}
			echo "</div>";
			
			echo "<div id='nzbsudiv'>";				
				if ($enableNZBdotsu == "yes") {
					include('parse_nzbsu2.php');
				}				
			echo "</div>";
			
			echo "<div id='rlslogdiv'>";				
				if ($enableRlsLog == "yes") {
					include('parse_rlslog.php');
				}
			echo "</div>";
			
			echo "<div id='oztdiv'>";				
				if ($enableOZ == "yes") {
					include('parse_oznzb.php');
				}
			echo "</div>";
			
			echo "<div id='nzbtvdiv'>";				
				if ($enableNZBTV == "yes") {
					include('parse_nzbtv.php');
				}					
			echo "</div>";
				
			echo "<div id='dualfeedtdiv'>";
				if ($enableDualFeed == "yes") {
					include('parse_dualfeed.php');
				}		
			echo "</div>";
			
			echo "<div id='ruizdiv'>";				
				if ($enableRuiz == "yes") {
					include('parse_ruiz.php');
				}	
			echo "</div>";	

			
			?>