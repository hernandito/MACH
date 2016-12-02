<?php

require 'config.php';
require 'choice.txt';
?>



<script type="text/javascript">
function tab1refresh(){
 document.getElementById("recents").innerHTML='';
 document.getElementById("recents2").innerHTML='';
 document.getElementById("sblight").innerHTML='';
$("#recents").load("xbmc_parser-ipad.php");
$("#recents2").load("xbmc_parse_albums-ipad.php");
$("#sblight").load("sb_parser_light-ipad.php");
}
</script>
<script>
$(document).ready(function(){
  $("#testxbmc").click(function(){
    $("#div2").load("json_bed.php");
	$("#div3").load("json_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pauseplaybed").click(function(){
    $("#div2a").load("playpause_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#playstopbed").click(function(){
    $("#div2a").load("playstop_bed.php");
	$("#div2").load("json_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pauseplayliving").click(function(){
    $("#div3a").load("playpause_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#playstopliving").click(function(){
    $("#div3a").load("playstop_living.php");
	$("#div3").load("json_living.php");
  });
});
</script>

<?php

function doit() 
{

$myurl = "http://{$xbmcusername2}:{$xbmcpassword2}@{$xbmcIP2}:{$xbmcport2}/jsonrpc?request={%20%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%20%22Player.Stop%22,%20%22params%22:%20{%20%22playerid%22:%201},%20%22id%22:%20%22mybash%22}%22";


	$response = file_get_contents($myurl);

	$resulter = json_decode($response, true);

/*
	$resulter=$resulter['result']['speed'];

	if($resulter == 0):
		$hrplaystatetext = "Player is <font color=red><b>PAUSED</b></font>";
	elseif($resulter == 1): // Note the combination of the words.
		$hrplaystatetext = "Player is running...";
	else:
		$hrplaystatetext = "Player is not active";
	endif;

*/
	
	echo "<br> Stopped";
	

/*
$today = date("m/d @ g:ia"); 
echo "<br><font color=#838383><b>Bedroom</b> Computer <b><font color=red>PausedPlay</font></b>: </font><br>". $today; 
*/
 }


doit(); 
sleep(5);
?>