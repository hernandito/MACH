<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="rss.css" />


<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<?php

require 'config.php';
require 'choice.txt';
?>


<script type="text/javascript">
function torrentRUTorrent(){
	$("#torrentcontaines").load("blank.php");
	$("#torrentcontaines").load("iframertorrent2.php");
 
}
</script>	



<script type="text/javascript">
function torrentTransmission(){
	$("#torrentcontaines").load("blank.php");
	$("#torrentcontaines").load("iframetransmission2.php");
}
</script>		


<?php


echo "
<div style=\"display: inline-block; margin-bottom:3px; \">

	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:torrentRUTorrent()\">ruTorrent</a></div>
	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:torrentTransmission()\">Transmission</a></div>

</div>	
	
	

	

<div id=\"torrentcontaines\ style=\" height: 860px; \" >";
	include('iframertorrent2.php');
echo "</div>";

?>