




	<?php
	
		$response = file_get_contents("{$mySabURL}/api?mode=qstatus&output=json&apikey={$mySabAPI}");
	
		$json = json_decode($response, true);

		$hrrunningcount = 0;
		
		foreach($json['jobs'] as $item) {
		
			$hritemcode = $item['id'];
		
		$reseturl = "{$mySabURL}/api?mode=change_opts&value={$hritemcode}&value2=3&apikey={$mySabAPI}";
			$resetresponse = file_get_contents($reseturl);
		
			/* echo $hritemcode; 
			echo "<br>"; */
		
			$hrrunningcount = $hrrunningcount + 1;
		
		}
		
		echo "Changed {$hrrunningcount} items in the queue.";
		

	?>	
						



