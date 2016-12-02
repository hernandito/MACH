<?php
				
				
$myurl = "http://192.168.0.103/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22VideoLibrary.GetRecentlyAddedMovies%22,%20%22params%22:%20{%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2012%20},%20%22properties%22%20:%20[%22title%22,%20%22mpaa%22,%20%22thumbnail%22,%20%22rating%22,%20%22year%22,%20%22plot%22]%20%20},%20%22id%22:%20%22libMovies%22}";

	$response = file_get_contents($myurl);

	$wawa = substr($response,96);
	$wawa = substr($wawa,0, -3);
	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);

	for ($i = 0; $i <= 5; $i++) {
		$hrmovietitle = $result[$i]['label'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

		//$hrthumbnail = http://192.168.0.103/image/url_encode(image://smb%3a%2f%2fTOWER%2fMedia%2fMovies%2fEnemy (2014)%2fEnemy.tbn/);
		
		$hrthumbnail = $result[$i]['thumbnail'];
		$hrthumbnail2 = urlencode($hrthumbnail);	
		$hrthumbnail3 = "http://192.168.0.103/image/". $hrthumbnail2;

//echo "<img style=\"padding-right:0px; border: 1px solid #4D4D4D;  \"src=\"{$hrthumbnail3}\" width=68>";
			
$image = $hrthumbnail3;

// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($hrthumbnail3));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($hrthumbnail3).';base64,'.$imageData;

// Echo out a sample image
echo '<img src="',$src,'" width=68>';

	}		
?>
				