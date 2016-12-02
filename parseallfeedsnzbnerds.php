
<?php



require 'config.php';

/////////////////////////////////////////////////////////////////////////////////	
//  This will parse all feeds in MySQL for quicker browser retrieval
/////////////////////////////////////////////////////////////////////////////////	

/////////////////////////////////////////////////////////////////////////////////	
//  Delete all entries in table
/////////////////////////////////////////////////////////////////////////////////	
    // Create connection
    $con=mysqli_connect($MysqlRSSServer, $MysqlRSSUser, $MysqlRSSPassword, "rssfeeds");
    // Check connection
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    


//########################################################################################################################
//
//		Begin Parsing NZBsdotOrg
//
//########################################################################################################################

	$xml = simplexml_load_file($NZBNerdsRSS);

//	print_r($xml);

//    $content = file_get_contents($NZBNerdsRSS);
 //   if ( empty($content) ) {
 //       die('XML is empty');
 //   }
	
//	echo $content;
//	echo "<br><br> Done with Content<br><br>"
	
 //   $xml = simplexml_load_string($content);	

//	echo $xml;
	

//	if ($xml != "") { 		
		
			$sql = "DELETE FROM nzbnerds";
			
			mysqli_query($con, $sql) or die(mysqli_error());

			/////////////////////////////////////////////////////////////////////////////////	
			//		Set the Time Stamp
			/////////////////////////////////////////////////////////////////////////////////	

			$timestamp = "";
			$timestamp = date('Y/m/d H:i:s');


				$IMDBList=array();
				$SizeList=array();
				$attrList = $xml->xpath('//newznab:attr');
				foreach ($attrList as $attr) {
					$Opts= (array) $attr->attributes();$OptsList=$Opts['@attributes'];
					////category,category,size,files,poster,genre,imdb,rating,pred,grabs,comments,password,completion,usenetdate,group
					if($OptsList['name']=="imdb") $IMDBList[]=$OptsList['value'];
					if($OptsList['name']=="size") $SizeList[]=$OptsList['value'];	
				//	if($OptsList['name']=="coverurl") $imgs[]=$OptsList['value'];
				//	if($OptsList['name']=="imdbtitle") $mydmdbtitles[]=$OptsList['value'];
				}			
				
			
					
				$itemNr=0;								
	
				$items = $xml->xpath('//item');
				
	

				foreach ( $items as $item) {
				
						$myimdbraw=$IMDBList[$itemNr];
						$myimdb=$IMDBList[$itemNr]*1;
						$mysize=$SizeList[$itemNr];
						
				//		$img=$imgs[$itemNr];
				//		if(strlen($img)<10) $img="includes/images/noposter.jpg";
						
				//		$imdbtitle=$mydmdbtitles[$itemNr];
						
						
						$myimdbtt = "tt{$myimdbraw}";
						
						$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
						$base = 1024;
						$class = min((int)log($mysize , $base) , count($si_prefix) - 1);
						$mysizenumber = sprintf('%1.2f', $mysize / pow($base,$class)) . ' ' . $si_prefix[$class];
		
						
					//	$myfulltitle = $imdbtitle; 
					//	$myfulltitle = substr($item->title,0,43);
						$myfulltitle = $item->title;
						$myfulltitle = str_replace("."," ",$myfulltitle);

					
						$mytitle = $item->title;
						$mytrimtitle="";
						$mytitle = explode(".",$mytitle);foreach($mytitle as $mytitlepart) {if($mytitlepart>0){break; }else $mytrimtitle.=$mytitlepart." ";}
						$mytitle =  str_replace('"',"'",$mytitle) ;	
						$mytitle =  str_replace('&',"and",$mytitle) ;
						$mytitle =  str_replace(':',"..",$mytitle) ;
						$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');					
						
						$myguid = $item->guid;
						$myguid = str_replace("https://nzb.cat/details/","",$myguid);
						
						
						$mylink = $item->link;
						
						
						$descriptions = $item->description;
						$A=array("Year","Size","Plot");//,"Director","Actors"
						$B=array();
						 foreach ( $descriptions as $description_node ) {
							$description_dom = new DOMDocument();
							$description_dom->loadHTML( (string)$description_node );
							$description_sxml = simplexml_import_dom( $description_dom );
							$imgs = $description_sxml->xpath('//img');
							$img=$imgs[4];
							$img=(array)$img[src];
							$img=$img[0];
//							if (strpos($img, 'cover') === false)
								//(strpos($img, 'cover') === false
//								{
//								$img="includes/images/noposter.jpg";
//							}
							
						///	if(strlen($img)<2) $img="includes/images/noposter.jpg";		

// This one works, but try the bottom one.
//$external_link = $img;
//if (@GetImageSize($external_link)) {
//echo  "image exists ";
//} else {
//$img="includes/images/noposter.jpg";
//}


				if(@file_get_contents($img,0,NULL,0,1)) {
					echo  "image exists";
				} else {
					$img="includes/images/noposter.jpg";
				}

						
							$uls=$description_sxml->xpath('//ul');
							foreach ( $uls as $ul ) {
								$ul=(array)$ul;$lis=$ul[li];
								foreach($lis as $li){
									$liT= explode(":", $li);$k=$liT[0];if($liT[1]!="") $B[$k]=$liT[1];
								}
							}								 									 	 
						 }
								  
/////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////								  
								  
						$itemdetails = "";	
						foreach($A as$a){
								if($B[$a]) {
									$B[$a]=str_replace('"',"'",$B[$a]) ;
									$B[$a]=str_replace(','," ",$B[$a]) ;													
									$B[$a] = htmlentities($B[$a], ENT_QUOTES, 'UTF-8');		
									$itemdetails= $itemdetails . "<br>";
									if($a!="Plot")$itemdetails.=$a.":<b>"; else $itemdetails.="&nbsp;<br><br><br><br><br><br>";
									$itemdetails.=$B[$a];
									if($a!="Plot")$itemdetails.="</b>";

									
								//	$itemdetails = $a .":<b>" . $B[$a] . "</b><br>";
								//	$itemdetails = $itemdetails . "<br>" . $a .": <b>" . $B[$a] . "</b>";
								//	$myitemCnt = "<div>{$myitemCnt}</div>";
									
								//	$itemdetails = htmlentities($itemdetails, ENT_QUOTES, 'UTF-8');	
								//	print($itemdetails);
								}
						}					 	 							
								
					//	echo $itemdetails;
						
						$itemNr++;	  
						// =======================================================================
						// 						Insert into DB 	
						// =======================================================================
						$link = mysqli_connect($MysqlRSSServer, $MysqlRSSUser, $MysqlRSSPassword, "rssfeeds");

						
						if($link === false){
							die("ERROR: Could not connect. " . mysqli_connect_error());
						}		

						if($myfulltitle == ""){
							echo "Record with no title";
						} else {
							$query = "INSERT INTO nzbnerds (timestamp, mytrimtitle, myimdbtt, myimdb, myfulltitle, mylink, img, itemdetails, guid) VALUES ('$timestamp', '$mytrimtitle', '$myimdbtt', '$myimdb', '$myfulltitle', '$mylink', '$img', '$itemdetails', '$myguid')";
						}
						
						if(mysqli_query($link, $query)){
						//		echo "<br>Records added successfully.";
						} else{
								echo "ERROR: Unable to execute query. " . mysqli_error($link) . "<br><br>";
						}		
						// =======================================================================	
						echo "<br>"; 						
						echo $mytrimtitle;
						echo "<br>"; 
						
						
						$mytrimtitle = "";
						$myimdbtt = "";
						$myimdb = "";
						$myfulltitle = "";
						$mylink = "";
						$img = "";
						$itemdetails = "";
						$myguid = "";

		}
	
	mysqli_close($link);
	
//	} else { echo "nzbnerds Feed Not Available<br>"; }

?>
		



