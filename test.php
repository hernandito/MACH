
<?php




require 'config.php';



	$xml = simplexml_load_file($NZBdotorgRSS);  
	if ($xml != "") {	
	


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
				
	

				foreach ( $items as $item) {
				
						$myimdbraw=$IMDBList[$itemNr];
						$myimdb=$IMDBList[$itemNr]*1;
						$mysize=$SizeList[$itemNr];
						$myimdbtt = "tt{$myimdbraw}";
						
						$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
						$base = 1024;
						$class = min((int)log($mysize , $base) , count($si_prefix) - 1);
						$mysizenumber = sprintf('%1.2f', $mysize / pow($base,$class)) . ' ' . $si_prefix[$class];
		
						
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
						
						$myguid = $item->guid;
							
						$descriptions = $item->description;
						$A=array("Year","Rating","Genre","Size","Plot");
						$B=array();
						 foreach ( $descriptions as $description_node ) {
							$description_dom = new DOMDocument();
							$description_dom->loadHTML( (string)$description_node );
							$description_sxml = simplexml_import_dom( $description_dom );
							$imgs = $description_sxml->xpath('//img');
							$img=$imgs[0];$img=(array)$img[src];$img=$img[0];if(strlen($img)<3) $img="includes/images/noposter.jpg";								 	
							$uls=$description_sxml->xpath('//ul');
							foreach ( $uls as $ul ) {
								$ul=(array)$ul;$lis=$ul[li];
								foreach($lis as $li){
									$liT= explode(":", $li);$k=$liT[0];if($liT[1]!="") $B[$k]=$liT[1];
								}
							}								 									 	 
						 }
								  
							  
								  
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
								


		}

	
	} else { echo "NZBSdotOrg Feed Not Available<br>"; }

?>
		