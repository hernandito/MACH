<?php
require 'config.php';
?>

<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

			
	<tr valign="top">      
		<td >
			
						<img style="margin-bottom: 6px;" src="includes/images/rottentomatoes_logo.png" height=32>

						<?php 
							$xml = simplexml_load_file('http://www.rottentomatoes.com/syndication/rss/top_news.xml');
							$items = $xml->xpath('//item');
							$i = 0;
							foreach ( $items as $item) {
								$mylink = $item->link;
							  	  
								$mytitle = $item->title;
								$mytitle = str_replace('.',' ',$mytitle);
								$mytitle =  str_replace('"',"'",$mytitle) ;	
								$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');
						  
								  
								echo "<li><a href=\"{$mylink}\" rel='ajaxpanel'>{$mytitle}</a></li>";  
						
						}
						?>
						<br>
						<img style="margin-bottom: 6px;" src="includes/images/logo_screenrant.png" height=32>
						<?php 
							$xml = simplexml_load_file('http://feeds.feedburner.com/ScreenRant?format=xml');
							$items = $xml->xpath('//item');
							$i = 0;
							foreach ( $items as $item) {
								$mylink = $item->link;
							  	  
								$mytitle = $item->title;
								$mytitle = str_replace('.',' ',$mytitle);
								$mytitle =  str_replace('"',"'",$mytitle) ;	
								$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');
						  
								  
								echo "<li><a href=\"{$mylink}\" rel=\"ajaxpanel\">{$mytitle}</a></li>";  
						
						}
						?>





						
			
		</td>
	</tr> 		


</table>


