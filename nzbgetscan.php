
<script>
	$(document).ready(function() {

		$('.tooltiptable').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,
		maxWidth: 400
		});	

			
});			
</script> 

<?php 




		echo "<img src='includes/images/middown.png' height=20 width=20 class='tooltiptable' title=' ";

		$myurl = "{$myNZBGetURL}jsonrpc/listgroups";
		$response = file_get_contents($myurl);
		$myscan = json_decode($response, true);
		$myscan= $myscan['result'];
		$totality = count($myscan);

		if($totality > 0){
			echo "<div style='font-size: 12px; font-weight: bold; color: #666666; '>Queue<br></div>";
			
				echo "<div style='font-size: 10px; font-weight: normal; color: #333333; '>";
				echo "<table width=100% cellpadding=0 cellspacing=0 border=0>";

				for ($i = 0; $i <$totality; $i++) {	
					$nzbname = $myscan[$i]['NZBName'];
					$nzbname =  str_replace('.',' ',$nzbname) ;	
					$nzbname = htmlentities($nzbname, ENT_QUOTES, 'UTF-8');	

					$filesize= $myscan[$i]['FileSizeLo'];
					$fileremain= $myscan[$i]['RemainingSizeLo'];	

					$mypercentleft = $fileremain / $filesize * 100;
					$mypercentleft = round($mypercentleft,0);
				
					$nzbname = substr($nzbname,0,31);
					
					$nzbcategory = $myscan[$i]['Category'];	
			
					echo "
						<tr>
							<td style='color: #0000FF;  font-weight: bold; border-bottom: 1px solid #BBBBBB;'>{$mypercentleft}%</td>
							<td style='padding-right: 4px; color: #B32D00; border-bottom: 1px solid #BBBBBB;'>{$nzbcategory}</td>
							<td style='color: #555555; border-bottom: 1px solid #BBBBBB;'>{$nzbname}</td>
						</tr>	
						";
				}
				echo "</table></div><br>";	

		}  else {
			echo "<div style='font-size: 10px; font-weight: normal; color: #3F71BC; '>queue empty<br></div>";
		}

		echo "<div style='font-size: 12px; font-weight: bold; color: #666666; '>History</div>";

		$myurl = "{$myNZBGetURL}jsonrpc/history";
		$response = file_get_contents($myurl);

		$myscan = json_decode($response, true);
		$myscan= $myscan['result'];

		$totality = count($myscan);
				echo "<div style='font-size: 10px; font-weight: normal; color: #333333; '>";
				echo "<table width=100% cellpadding=0 cellspacing=0 border=0>";

				for ($i = 0; $i <$totality; $i++) {	
					$nzbname = $myscan[$i]['Name'];
					$nzbname =  str_replace('.',' ',$nzbname) ;	
					$nzbname = htmlentities($nzbname, ENT_QUOTES, 'UTF-8');	
					
					$nzbname = substr($nzbname,0,38);
					
					$nzbcategory = $myscan[$i]['Category'];
					
					echo "
						<tr>
							<td style='padding-right: 4px; color: #B32D00; border-bottom: 1px solid #BBBBBB;'>{$nzbcategory}</td>
							<td style='color: #555555; border-bottom: 1px solid #BBBBBB;'>{$nzbname}</td>
						</tr>	
						";
				}
				echo "</table></div>";
				echo "'>";

		
	
	?>