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
						<img style="margin-top: -4px; margin-bottom: 0px; " src="includes/images/logo_smalrlslog.png" height="19">
						<?php
							$xml = simplexml_load_file('http://www.rlslog.net/category/movies/hdrip/feed/');
							$items = $xml->xpath('//item');
							$i = 0;
							foreach ( $items as $item) {
								  $mylink = $item->link;							  	  
								  $mytitle = $item->title;
								  $mytitle = str_replace('.',' ',$mytitle);
								  $mytitle =  str_replace('&',"and",$mytitle) ;
								  $mytrimtitle = substr($mytitle,0,42);								  

								  
								echo "<li><a href=\"{$mylink}\" rel='ajaxpanel'>{$mytrimtitle}</a></li>";  
						if (++$i == 9) break;
						}
						?>

						
						<img style="margin-top: -4px; margin-bottom: 0px;" src="includes/images/logo_smallscnsrc.png" height="19">
						<?php
							$xml = simplexml_load_file('http://www.scnsrc.me/category/films/bluray/feed/');
							$items = $xml->xpath('//item');
							$i = 0;
							foreach ( $items as $item) {
								  $mylink = $item->link;							  	  
								  $mytitle = $item->title;
								  $mytitle = str_replace('.',' ',$mytitle);
								  $mytitle =  str_replace('&',"and",$mytitle) ;
								  $mytrimtitle = substr($mytitle,0,42);								  

								  
								echo "<li><a href=\"{$mylink}\" rel='ajaxpanel'>{$mytrimtitle}</a></li>";  
						if (++$i == 9) break;
						}
						?>
						
						
						
			</div> 		
		</td>
	</tr> 		
</table>