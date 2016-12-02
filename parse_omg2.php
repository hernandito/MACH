<?php
require 'config.php';
?>

<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

			
	<tr valign="top">      
		<td >
			<div id="rss" class="rss" style="
					-moz-column-count: 2;
					-moz-column-gap: 7px;
					-webkit-column-count: 2;
					-webkit-column-gap: 7px;
					column-count: 2;
					column-gap: 7px;
					font-size: 12px;">
						
						<img style="margin-bottom: 7px;" src="includes/images/omg.png" width="182" height="25">
						
						
						
						<?php 
							$xml = simplexml_load_file($OMGRSS);
							$items = $xml->xpath('//item');
							$i = 0;
							foreach ( $items as $item) {
									$mylink = $item->link;							  	  
									$mytitle = $item->title;
								  
									$mytitle = str_replace('- omgwtfnzbs.org','',$mytitle);
									$mytitle = str_replace('.',' ',$mytitle);
									$mytitle =  str_replace(':',"..",$mytitle) ;
									$mytrimtitle = substr($mytitle,0,52);								  

								   
								  
								  
								echo "<li><a href=\"{$mylink}\" target=\"newtab\" style=\"font-size: 11px; padding-top: 4px; padding-bottom: 4px;\">{$mytrimtitle}</a></li>";  
						if (++$i == 14) break;
						}
						?>
						
						
						
						
			</div> 	
		</td>
	</tr> 		


</table>


