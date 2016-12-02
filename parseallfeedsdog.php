
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
//		Begin Parsing DogNZB
//
//########################################################################################################################

	$xml = simplexml_load_file($DogNzbRSS);	
	if ($xml != "") { 		
		if (strlen($xml->asXML()) > 600) {
			$sql = "DELETE FROM dogbzb";
			
			mysqli_query($con, $sql) or die(mysqli_error());

			/////////////////////////////////////////////////////////////////////////////////	
			//		Set the Time Stamp
			/////////////////////////////////////////////////////////////////////////////////	

			$timestamp = "";
			$timestamp = date('Y/m/d H:i:s');

			/////////////////////////////////////////////////////////////////////////////////	

				$IMDBList=array();
				$SizeList=array();
				$attrList = $xml->xpath('//newznab:attr');
				foreach ($attrList as $attr) {
					$Opts= (array) $attr->attributes();$OptsList=$Opts['@attributes'];
					////category,category,size,files,poster,genre,imdb,rating,pred,grabs,comments,password,completion,usenetdate,group
					if($OptsList['name']=="imdb") $IMDBList[]=$OptsList['value'];
					if($OptsList['name']=="size") $SizeList[]=$OptsList['value'];									
				}																				
				$itemNr=0;								
	
				$items = $xml->xpath('//item');
				
				$A=array("Year","Rating","Genre","Size");

				foreach ( $items as $item) {
				
						$myimdbraw=$IMDBList[$itemNr];
						$myimdb=$IMDBList[$itemNr]*1;
						$mysize=$SizeList[$itemNr];
						$myimdbtt = "tt{$myimdbraw}";
						
						$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
						$base = 1024;
						$class = min((int)log($mysize , $base) , count($si_prefix) - 1);
						$mysizenumber = sprintf('%1.2f', $mysize / pow($base,$class)) . ' ' . $si_prefix[$class];

						$myguid = $item->guid;
						$myguid = str_replace("https://dognzb.cr/details/","",$myguid);


						//$myfulltitle = substr($item->title,0,43);
						$myfulltitle = $item->title;
						$myfulltitle = str_replace("."," ",$myfulltitle);
						
								  
						$mytitle = $item->title;$mytrimtitle="";
						$mytitle = explode(".",$mytitle);foreach($mytitle as $mytitlepart) {if($mytitlepart>0){break; }else $mytrimtitle.=$mytitlepart." ";}
						$mytitle =  str_replace('"',"'",$mytitle) ;	
						$mytitle =  str_replace('&',"and",$mytitle) ;
						$mytitle =  str_replace(':',"..",$mytitle) ;
						$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');					
									
						$mylink = $item->link;
						$descriptions = $item->description;
						
						$B=array();
						foreach ( $descriptions as $description_node ) {
							$description_dom = new DOMDocument();
							$description_dom->loadHTML( (string)$description_node );
							$description_sxml = simplexml_import_dom( $description_dom );

							$desc=strip_tags((string)$description_node,'<b>');							 	
							$desc=explode("<b>",$desc);
							foreach($desc as$desc_part){
									$desc_part=str_replace('</b>',' ',$desc_part);
									$liT= explode(":", $desc_part);$k=$liT[0];if($liT[1]!="") $B[$k]=$liT[1];
							}								 	
							$imgs = $description_sxml->xpath('//img');
							$img=$imgs[0];$img=(array)$img[src];$img=$img[0];if(strlen($img)<3) $img="includes/images/noposter.jpg";							   
						}
								  
						$itemdetails = "";	
						foreach($A as$a){
								if($B[$a]) {
									$B[$a]=str_replace('"',"'",$B[$a]) ;
									$B[$a]=str_replace(','," ",$B[$a]) ;													
									$B[$a] = htmlentities($B[$a], ENT_QUOTES, 'UTF-8');														
								//	$itemdetails = $a .":<b>" . $B[$a] . "</b><br>";
									$itemdetails = $itemdetails . "<br>" . $a .": <b>" . $B[$a] . "</b>";
								//	$myitemCnt = "<div>{$myitemCnt}</div>";
									
								//	$itemdetails = htmlentities($itemdetails, ENT_QUOTES, 'UTF-8');	
								//	print($itemdetails);
								}
						}					 	 							
						//		echo $itemdetails;
						
						$itemNr++;	  
						// =======================================================================
						// 						Insert into DB 	
						// =======================================================================
						$link = mysqli_connect($MysqlRSSServer, $MysqlRSSUser, $MysqlRSSPassword, "rssfeeds");

						
						if($link === false){
							die("ERROR: Could not connect. " . mysqli_connect_error());
						}		

						$query = "INSERT INTO dogbzb (timestamp, mytrimtitle, myimdbtt, myimdb, myfulltitle, mylink, img, itemdetails, guid) VALUES ('$timestamp', '$mytrimtitle', '$myimdbtt', '$myimdb', '$myfulltitle', '$mylink', '$img', '$itemdetails', '$myguid')";

						if(mysqli_query($link, $query)){
						//		echo "<br>Records added successfully.";
						} else{
								echo "ERROR: Unable to execute query. " . mysqli_error($link) . "<br><br>";
						}		
						// =======================================================================	
					//	echo "<br>"; 						
					//	echo $mytrimtitle;
					//	echo "<br><br>"; 

			}
	
			mysqli_close($link);
		}
	}else { echo "<b>dogNZB Feed Not Available<br></b>"; }

?>
		



