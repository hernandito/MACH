
<?php
require 'includes/required/errorreporting.php';
require 'includes/required/defaults.php';
require 'includes/required/header.php';

require 'config.php';
 
?>

<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script type="text/javascript" src="jquery.tooltipster.js"></script>



<script>
        	$(document).ready(function() {
		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		});
        	});
</script> 


<div id="mainrss">   

<table width="100%" border="0" cellspacing="3" cellpadding="0" >

	<tr>
		<td width=420 valign=top>
			<div id="rss" class="rss" style="
					-moz-column-count: 7;
					-moz-column-gap: 6px;
					-webkit-column-count: 7;
					-webkit-column-gap: 6px;
					column-count: 7;
					column-gap: 6px;">
					
				<?php

				$myurl = "{$xbmcIP1}/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22params%22:%20{%22sort%22:%20{%22order%22:%20%22ascending%22,%20%22method%22:%20%22title%22},%20%22properties%22:%20[%22title%22,%20%22year%22,%20%22plot%22,%20%22rating%22]},%20%22method%22:%20%22VideoLibrary.GetMovies%22,%20%22id%22:%20%22libMovies%22}";

				$response = file_get_contents($myurl);
				$wawa = substr($response,99);
				$wawa = substr($wawa,0, -3);
				$wawa= "[" .$wawa ."]";
				$result = json_decode($wawa, true);
				$totalito = count($result);

				for ($i = 0; $i < $totalito; $i++) {

					$hrmovietitle = $result[$i]['label'];
					$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
					$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

					$hryear = $result[$i]['year'];
					$hrrating = round($result[$i]['rating'],1);
					
					$hrplot = $result[$i]['plot'];
					$hrplot =  str_replace('"',"'",$hrplot) ;	
					$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');

					echo "<li ><a class=tooltip href=\"#\" onclick=\"return false;\" title=\"{$hrmovietitle} <br><font id=bubble class=bubble> Year: <b>{$hryear}</b> <br>Rating: <b>{$hrrating} </b><br><br>{$hrplot} </font> \" >" .$result[$i]['label'];
					echo "</a></li>";

				}


				?>
			</div> 
		</td>
	</tr>		
</table>	
</div>