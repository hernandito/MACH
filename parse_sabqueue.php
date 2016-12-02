


	<?php
	
		$hrquerysab = "{$mySabURL}/api?mode=qstatus&output=xml&apikey={$mySabAPI}";
		$sabxml = simplexml_load_file($hrquerysab);
		
		foreach ($sabxml as $item):
		
			$mynzo = $item->job->id;							  	  
			
			$reseturl = {$mySabURL}/api?mode=change_opts&value={$mynzo}&value2=3&apikey={$mySabAPI}";
			$resetresponse = file_get_contents($reseturl);
			
			echo "{$mynzo}";
			
		endforeach;
			if ($mynzo == "") { 	
				echo "Queue is empty. Nothing changed.";		
			} 	
	?>	
						



