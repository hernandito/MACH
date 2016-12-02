



<?php
require 'config.php';

	$theimdb = $_GET["movieid"];
	$themovie = $_GET["moviename"];

	$myurl = "http://api.traileraddict.com/?imdb={$theimdb}&count=10&width=1080";

	$response = file_get_contents($myurl);
	$result = json_decode($response, true);
	
echo $themovie;
echo "anything <br>";
echo $theimdb;
echo "<br>";
?>
<!--
<table width=100% bgcolor=cyan cellpadding=4 cellspacing=0 border=1>
	<tr colspan=2>
		<td><?php echo $themovie; ?></td>
	</tr>
	<tr colspan=2>
		<td>List</td>
		
		
		<td width=1080>movie container</td>
	</tr>


</table>
-->

<br>
