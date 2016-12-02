<?php
require 'config.php';
?>

<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

			
	<tr valign="top">      
		<td >
			<div id="rss" class="rss" style="
					-moz-column-count: 4;
					-moz-column-gap: 4px;
					-webkit-column-count: 4;
					-webkit-column-gap: 4px;
					column-count: 4;
					column-gap: 4px;">
						<img style="margin-bottom: 6px;" src="includes/images/nzbsu2.png" width="82" height="25">
						<?php  writeRSSName($ini['feed8name']); ?>
						<?php writeRSS($ini['feed8'],18); ?>
						
			</div> 	
		</td>
	</tr> 		


</table>


