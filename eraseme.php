	
						<?php 
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
			
			
				$myimdblink = "<a href='http://imdb.com/title/tt{$myimdb}' target='_new'><img src='includes/images/minimdb.png' style='padding-bottom:-4px; margin-bottom: -5px; margin-left:-3px;'></a>";
										

				$descriptions = $item->description;
				
				$myfulltitle = substr($item->title,0,43);
				
				$mytitle = $item->title;$mytrimtitle="";
				$mytitle = explode(".",$mytitle);foreach($mytitle as $mytitlepart) {if($mytitlepart>0){break; }else $mytrimtitle.=$mytitlepart." ";}
				$mytitle =  str_replace('"',"'",$mytitle) ;	
				$mytitle =  str_replace('&',"and",$mytitle) ;
				$mytrimtitle =  str_replace('-',' ',$mytrimtitle) ;
				
				$mytitle = htmlentities($mytitle, ENT_QUOTES, 'UTF-8');								  
				$mylink = $item->link;							  	

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
													$inline_content = "hrnzbshiddencontent{$itemNr}";

													$itemCnt="<div id='postersingle' class='postersingle'><a href='{$mylink}' target=hrnew>"
													."<img class=\"tooltipx\" id=\"demo-interact\" height=\"168\" src=\"{$img}\" style=\" max-width: 112px;\" title=\"
													
													<img src='{$img}' height=170 align=right id=postersingle2 class=postersingle2 style='margin-left:5px; '>{$mytrimtitle} <font id=bubble class=bubble>";
													foreach($A as$a){
															if($B[$a]) {
																$B[$a]=str_replace('"',"'",$B[$a]) ;	
																$B[$a]=str_replace('-'," ",$B[$a]) ;
																$B[$a] = htmlentities($B[$a], ENT_QUOTES, 'UTF-8');									 	 	
																$itemCnt.="<br>";
																if($a!="Plot")$itemCnt.=$a.":<b>"; else $itemCnt.="&nbsp;<br><br><br><br><br><br>";
																$itemCnt.=$B[$a];
																if($a!="Plot")$itemCnt.="</b>";
															}
															
													 }								
													$itemCnt.="<br>
													
																			<form action='JavaScript:getTrailersdotorg($myimdb)' method='POST' id='dotorg{$myimdb}' >
																					<input type='hidden' id='movieidtt' name='movieidtt' value='{$myimdbtt}'>
																					<input type='hidden' id='movieid' name='movieid' value='{$myimdb}'>
																					<input type='hidden' id='moviename' name='moviename' value='{$hrmovietitle}'>
																					<a  class='iframex classpanel2' href='javascript:;' onclick='parentNode.submit();' style='	
																							color: #FFF;
																							background-color: #156199;
																							padding-top: 1px;
																							border-top-style: none;
																							border-right-style: none;
																							border-bottom-style: none;
																							border-left-style: none;
																							padding-right: 4px;
																							padding-bottom: 1px;
																							padding-left: 4px; 
																							font-size: 8pt; 
																							margin-left: 0px; ' 
																							>search trailer</a>						
																			</form>								
													
													{$myimdblink}<div id='mytrailersdotorg'></div><hr><font color=#8A8A7B>{$myfulltitle}</font> </font> 



													\"/></a></div>";
													echo $itemCnt;
													$itemNr++;
													
													
												}
}
						?>
						</div>
						</td></tr>
					
						</table>				
					
				</div>			



