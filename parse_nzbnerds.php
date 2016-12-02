<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"51%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>

<script type="text/javascript" src="jquery.tooltipster.js"></script>
<script>
    $(document).ready(function() {

		$('.tooltipx').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		position: 'top',
		interactive: true,
		interactiveTolerance: 25,
		functionReady: function(origin, tooltip) {$(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});$(".iframe2").colorbox({iframe:true, width:"85%", height:"95%"});},
		});

});		

	
</script> 



<?php
require 'config.php';
?>


<script type="text/javascript">
function nzbtvRefresh2x(){
$("#nzbcatdiv").load("blank.php");
$("#nzbcatdiv").load("parse_nzbtv2db.php");
 
}
</script>

<SCRIPT LANGUAGE="JavaScript">
    function getTrailersnzbtv(movieid)
    {
		$("#mytrailersnzbcat").innerHTML="Please wait....";
        $("#mytrailersnzbcat").load("trailersearch.php",$("#dotorg" + movieid).serialize()); 
    }
	
    function addmovietomycart2(movieid2)
    {
		$("#mytrailersnzbcat").innerHTML="Please wait....";
        $("#mytrailersnzbcat").load("addtocart.php",$("#nzbtv" + movieid2).serialize()); 
    }	
	
	</SCRIPT>






				<div id="poster" class="poster">

				<table width="100%" border="0" cellspacing="0" cellpadding="0" >
					<tr valign="top">  					
						<td width=30px bgcolor=white height=76>	
							<?php
							
			
									$servername = $MysqlRSSServer;
									$username = $MysqlRSSUser;									$password = $MysqlRSSPassword;
									$dbname = "rssfeeds";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}
									
									//  The Time Calculation
									$thenow = date('Y/m/d H:i:s');
									$timeresult = mysql_query('SELECT timestamp from nzbnerds');		
									mysql_data_seek($timeresult, 1);	
									$row1 = mysql_fetch_assoc($timeresult);
									//
									
									
								//	$sql = "SELECT timestamp, mytrimtitle, descriptions, myimdbtt, myimdb, myfulltitle, mylink, img, items, attrList, myitemCnt FROM nzbsdotorg";	dog								
									$sql = "SELECT timestamp, mytrimtitle, myimdbtt, myimdb, myfulltitle, mylink, img, itemdetails, guid FROM nzbnerds";
									$result = $conn->query($sql);											
									if ($result->num_rows > 0) {
										echo "<a href={$NZBnerdsLandingPage} target=hrnew><img style=\"margin-top:5px; width: 28px; margin-left:3px;\" src=\"{$NZBnerdsLogoImage}\" >";
									}										
									
							?>
						</td>			
						<td rowspan=2>
						<div id='nzbnerdsdiv'>	
							<?php
		if ($result->num_rows > 0) {
		
$x = 0; 
			// output data of each row
//			while($row = $result->fetch_assoc()) {
while($x <= 27) {
$row = $result->fetch_assoc();

				$mytimestamp = $row["timestamp"];		
				
				$myfulltitle = $row["myfulltitle"];		
				$myfulltitle = str_replace('"',"",$myfulltitle);
				$myfulltitle = preg_replace('#\[[^[\]]*(?:(?R)|.*?)+\]#', '', $myfulltitle);
				$myfulltitle = str_replace("@"," ",$myfulltitle);
				$myfulltitle = htmlentities($myfulltitle, ENT_QUOTES, 'UTF-8');
				$myfulltitle = wordwrap($myfulltitle, 15, "\n", true);

				
				$mytrimtitle = $row["mytrimtitle"];
					$mytrimtitle = str_replace("."," ",$mytrimtitle);
					$mytrimtitle = str_replace("@"," ",$mytrimtitle);
					$mytrimtitle = preg_replace('#\[[^[\]]*(?:(?R)|.*?)+\]#', '', $mytrimtitle);
					$mytrimtitle = str_replace('"',"",$mytrimtitle);
					$mytrimtitle = htmlentities($mytrimtitle, ENT_QUOTES, 'UTF-8');				
				$mytrimtitle = wordwrap($mytrimtitle, 15, "\n", true);			
				
				
				if ($mytrimtitle == "") {
					$mytrimtitle = str_replace("."," ",$myfulltitle);
					$mytrimtitle = str_replace("@"," ",$myfulltitle);
					$mytrimtitle = preg_replace('#\[[^[\]]*(?:(?R)|.*?)+\]#', '', $mytrimtitle);
					$mytrimtitle = str_replace('"',"",$myfulltitle);
					$mytrimtitle = htmlentities($mytrimtitle, ENT_QUOTES, 'UTF-8');
						$mytrimtitle = wordwrap($mytrimtitle, 15, "\n", true);			
				}
				
				$myguid = $row["guid"];			

	
				$hrmovietitle2 =  str_replace("."," ",$mytrimtitle) ;								

				$addmycart = "http://nzbtv.net/api?t=cartadd&id={$myguid}&apikey=8321dad36cc40c94fd58bfb306217ad8";
				
			//	$descriptions = $row["descriptions"];										
				$myimdbtt = $row["myimdbtt"];		
				$myimdb = $row["myimdb"];					
				
				$mylink = $row["mylink"];						
				$img = $row["img"];						
			//	$items = $row["items"];		
			//	$attrList = $row["attrList"];		
				$mysize = $row["mysize"];	
				$itemdetails = $row["itemdetails"];
				
				$myimdblink = "<a href='http://imdb.com/title/{$myimdbtt}' target='_new'><img src='includes/images/minimdb.png' style='position: absolute; padding-bottom:-4px; margin-top: -18px; margin-left: 76px;'></a>";
	
				if ($img == "https://nzb.cat/covers/movies/0000000-cover.jpg") {
					$whattodisplay = "<table height=\"168\" width=\"112\"  background=\"includes/images/noposterblank.jpg \" border=\"0\" cellspacing=\"0\" cellpadding=\"8\" style=\"padding-top:20px; margin:0px; border:0px; margin-bottom: 4px; \">
										<tr >
											<td valign=top >      
											<div style=\"color: #EEEEEE; font-family: calibri, sans-serif; font-size: 13px; text-shadow: 1px 1px 0 #666666; \"><span class=\"tooltipx\"  ";
					$doweneedclosediv = "yes";
					
				}
				elseif ($img == "includes/images/noposter.jpg") {
					$whattodisplay = "<table height=\"168\" width=\"112\"  background=\"includes/images/noposterblank.jpg \" border=\"0\" cellspacing=\"0\" cellpadding=\"8\" style=\"padding-top:20px; margin:0px; border:0px; margin-bottom: 4px; \">
										<tr >
											<td valign=top >      
											<div style=\"color: #EEEEEE; font-family: calibri, sans-serif; font-size: 13px; text-shadow: 1px 1px 0 #666666; \"><span class=\"tooltipx\"  ";
					$doweneedclosediv = "yes";
				
				} else {
					$whattodisplay = "<img class=\"tooltipx\" height=\"168\" style=\"min-width: 112px; max-width: 112px; padding:0px; margin:0px; border:0px; \"  src='{$img}' ";
					$doweneedclosediv = "no";
					
				}	
	
				$addtocartbutton = "<a   href='{$addmycart}' target='_blank' style='	
													color: #8C0000;
													background-color: #ECECFB;
													border: 1px solid #BBBBBB;																		
													text-decoration: none;
													padding-top: 4px;
													padding-top: 1px;
													padding-right: 6px;
													padding-bottom: 1px;
													padding-left: 6px; 
													font-size: 8pt; 
													-webkit-border-radius: 3px;
													border-radius: 3px;
													margin-left: 0px; ' 
													>add to cart</a><br>";

				$inline_content = "hrnzbshiddencontent{$itemNr}";

									$itemCnt="<div id='postersingle' class='postersingle'><a href='{$mylink}' target=hrnew>"
									."{$whattodisplay} title=\"<img src='{$img}' height=170 align=right id=postersingle2 class=postersingle2 style='margin-left:5px; '>{$mytrimtitle} <br><font id=bubble class=bubble>";
			 	 					//$itemCnt2=	$myitemCnt;	
									$itemCnt1a="<br><hr><form action='JavaScript:getTrailersdotorg($myimdb)' method='POST' id='dotorg{$myimdb}' >
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
																>search trailer</a></form> {$myimdblink} 

														<div id='mytrailersnzbnerds'></div><hr><font color=#8A8A7B>{$myfulltitle}</font> </font>";


				if ($doweneedclosediv != "yes") {		
						$itemCnt2 = " \">";
				 } else {
						$itemCnt2 = " \"/><center>{$mytrimtitle}</center></span></div>
											</td>
										</tr>
								</table>";
				 }												
						
				$itemCnt3 = " </a></div>";				

			if (stripos($mytrimtitle,'one piece') !== false) {
			}	elseif (stripos($mytrimtitle,'at midnight') !== false) {
			}	elseif (stripos($mytrimtitle,'nightly show') !== false) {
			}	elseif (stripos($mytrimtitle,'part00') !== false) {	
			}	elseif (stripos($mytrimtitle,'m720p') !== false) {		
			}	elseif (stripos($mytrimtitle,'001/') !== false) {		
			}	elseif (stripos($mytrimtitle,'pittis/') !== false) {				
			} else {
				
				echo $itemCnt;		
			//	echo "<br>{$addtocartbutton}";				
				echo $itemdetails;	

			//	echo "<br>$img<br>";				
				echo $itemCnt1a;					
				echo $itemCnt2;	
				echo $itemCnt3;
				
			}
				
				
				$doweneedclosediv = "";															
$x++;
				}
		}
		else { 
				echo "<div style=\" padding-left: 10px; \"><font id=bubble class=bubble style=\"color: #888888; font-size: 9pt; \">Feed database is empty at the moment. It is possible the site is down.<br>
					<a href={$nzbnerdsLandingPage} target=hrnew title=\"Check the Site\"><img src=includes/images/crossbones.png height=60 style=\" opacity: 0.4;  \"></a></font></div>"; 
			}		
		?>
						</div></div>
							
						</td>
					</tr>
					<tr>
							<td  valign=top bgcolor=white >
								<center><img src="includes/images/refresh.png" >
								<br>
								<?php
									if ($mytimestamp != "") { 								
										$to_time = strtotime($thenow);
										$from_time = strtotime($mytimestamp);
										$timediff = round(abs($to_time - $from_time) / 60,0);
										
										
										if ($timediff > 30) {
											$timediff = "{$timediff}m";
											echo "<font id=bubble class=bubble style=\"color: #B30000; font-size: 8pt;\">{$timediff}</font>";
										} else {
											$timediff = "{$timediff}m";
											echo "<font id=bubble class=bubble style=\"color: #AAAAAA; font-size: 8pt;\">{$timediff}</font>";
										}
									}
								?>
								
								</center>
							</td>
					</tr>
					
			</table>				
					
				</div>			



