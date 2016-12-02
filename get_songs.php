<?php
	$response = file_get_contents("http://192.168.0.187/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22AudioLibrary.GetRecentlyAddedAlbums%22,%20%22params%22:%20{%20%22limits%22:%20{%20%22start%22%20:%200,%20%22end%22:%2050%20},%20%22properties%22:%20[%20%22artist%22,%22year%22,%20%22thumbnail%22]},%20%22id%22:%20%22libAlbums%22}
	");

	$wawa = substr($response,54);
	$wawa = substr($wawa,0, -44);
	
	$wawa =  str_replace('[',"",$wawa) ;
	$wawa =  str_replace(']',"",$wawa) ;	

	$wawa= "[" .$wawa ."]";

	$result = json_decode($wawa, true);

	
	
	for ($i = 0; $i <= 3; $i++) {

		$hralbumid = $result[$i]['albumid'];
		
		$url = 'http://192.168.0.187/jsonrpc?request={%22jsonrpc%22:%20%222.0%22,%20%22method%22:%20%22AudioLibrary.GetSongs%22,%20%22params%22:%20{%20%22filter%22:%20{%20%22albumid%22%20:%20'.$hralbumid .'%20},%20%22properties%22:%20[%20%22artist%22,%22track%22]},%20%22sort%22:%20{%20%22order%22:%20%22ascending%22,%20%22method%22:%20%22track%22},%20%22id%22:%20%22libAlbums%22}';
		$content = file_get_contents($url);
		$json = json_decode($content, true);

		foreach($json['result']['songs'] as $item) {
			echo sprintf("%02s",$item['track']) . ' - '. $item['label']. '<br>';
		}
		echo "<br>";


}

?>