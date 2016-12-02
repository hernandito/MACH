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

						<?php 
							$xml = simplexml_load_file($NzbsuRSS);
							$items = $xml->xpath('//item');
						
							foreach ( $items as $item) {
								  $mylink = $item->link;							  	  
								  $mytitle = $item->title;

									$hrmovietitle =  str_replace('"',"'",$mytitle) ;	
									$hrmovietitle =  str_replace('&',"and",$hrmovietitle) ;
									$hrmovietitle =  str_replace('[',"'",$hrmovietitle) ;
									$hrmovietitle =  str_replace(']',"'",$hrmovietitle) ;
									$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');
								  
								  
								echo "<li>{$hrmovietitle}</li>";  
					
						}
						?>
						
						
			</div> 	
		</td>
	</tr> 		


</table>


