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
function dognzbRefresh2x(){
$("#dogdiv").load("blank.php");
$("#dogdiv").load("parse_dognzb-ipaddb.php");
 
}
</script>

<SCRIPT LANGUAGE="JavaScript">
    function getTrailersdog(movieid)
    {
		$("#mytrailersdog").innerHTML="Please wait....";
        $("#mytrailersdog").load("trailersearch.php",$("#dog" + movieid).serialize()); 
 
	
		
    }
</SCRIPT>





				<div id="poster" class="poster">

				<table width="100%" border="0" cellspacing="0" cellpadding="0" >
					<tr valign="top">  					
						<td width=30px bgcolor=white height=76>		
							<?php
									$servername = "localhost";
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
									$timeresult = mysql_query('SELECT timestamp from dogbzb');		
									mysql_data_seek($timeresult, 1);	
									$row1 = mysql_fetch_assoc($timeresult);
									//
									
									
								//	$sql = "SELECT timestamp, mytrimtitle, descriptions, myimdbtt, myimdb, myfulltitle, mylink, img, items, attrList, myitemCnt FROM nzbsdotorg";	dog								
									$sql = "SELECT timestamp, mytrimtitle, myimdbtt, myimdb, myfulltitle, mylink, img, itemdetails FROM dogbzb";
									$result = $conn->query($sql);											
									if ($result->num_rows > 0) {
										echo "<a href={$DogNzbLandingPage} rel='ajaxpanel'><img style=\"margin-top:5px; margin-left:3px;\" src=\"{$DogNzbLogoImage}\" >";
									}
							
								
							?>
						</td>			
						<td rowspan=2 >
							<div id='dogdiv'>
							<?php
							if ($result->num_rows > 0) {
							
								$itemNr = 0;
								// output data of each row
								while($row = $result->fetch_assoc()) {
									$mytimestamp = $row["timestamp"];						
									$mytrimtitle = $row["mytrimtitle"];			
								//	$descriptions = $row["descriptions"];										
									$myimdbtt = $row["myimdbtt"];		
									$myimdb = $row["myimdb"];					
									$myfulltitle = $row["myfulltitle"];						
									$mylink = $row["mylink"];						
									$img = $row["img"];						
								//	$items = $row["items"];		
								//	$attrList = $row["attrList"];		
									$mysize = $row["mysize"];	
									$itemdetails = $row["itemdetails"];
									
									$myimdblink = "<a href='http://imdb.com/title/{$myimdbtt}' target='_new'><img src='includes/images/minimdb.png' style='padding-bottom:-4px; margin-bottom: -5px; margin-left:-3px;'></a>";
	

								  	$inline_content = "hrdoghiddencontent{$itemNr}";
								  
									$itemCnt="<div id='postersingle' class='postersingle'>
									
									<a href=\"#{$inline_content}\" class='inline' >"
									."<img height=\"180\" style=\" padding:0px; margin:0px; border:0px; min-width: 122px; max-width: 122px;  \" src=\"{$img}\" ></a>
									
									<div style=\"display:none\">
										<div id='{$inline_content}' style=\"padding:10px; background-color: #FFF1C1;
												border: 1px solid #BBBBBB;
												-webkit-border-radius: 4px;
												border-radius: 4px;
												font-family: Arial, Helvetica, sans-serif;
												font-size: 12px;
												font-style: normal;
												line-height: normal;
												font-weight: normal;
												color: #666;
												text-decoration: none;\">
									
											<img src='{$img}' width=180 align=right id=postersingle2 class=postersingle2 style='margin-left:5px; '>
											<font style=\"font-size: 22px; font-weight: bold; \">
												{$mytrimtitle} 
											</font>
											<font id=bubble-ipad class=bubble-ipad>";
			 	 							
									$itemCnt3="<br>
									
														<a  class=\"iframex classpanel2\" href=\"{$mylink}\" target=newtab style=\"	
															color: #009800;
															background-color: #fff;
															border: thin solid #888888;
															padding-top: 4px;
															padding-right: 8px;
															padding-bottom: 4px;
															padding-left: 8px; 
															font-size: 10pt; 
															font-weight: normal;
															margin-top: 6px;
															margin-left: 0px; \">
														open in <b>DogNZB</b></a>
														<br><br>
														<form action='JavaScript:getTrailersdog($myimdb)' method='POST' id='dog{$myimdb}' >
																<input type='hidden' id='movieidtt' name='movieidtt' value='{$myimdbtt}'>
																<input type='hidden' id='movieid' name='movieid' value='{$myimdb}'>
																<input type='hidden' id='moviename' name='moviename' value='{$hrmovietitle}'>
				
														</form>{$myimdblink}

											<br><br><br><br><br><font color=#8A8A7B>{$myfulltitle}</font></font>
										</div>
									</div>										
									</div>";
		
										echo $itemCnt;	
										echo $itemdetails;				
										echo $itemCnt3;										
									$itemNr++;
								}
							} else { 
									echo "<div style=\" padding-left: 10px; \"><font id=bubble class=bubble style=\"color: #888888; font-size: 9pt; \">Feed database is empty at the moment. It is possible the site is down.<br>
										<a href={$DogNzbLandingPage} target=hrnew title=\"Check the Site\"><img src=includes/images/crossbones.png height=60 style=\" opacity: 0.4;  \"></a></font></div>"; 
								}
							?>
							</div>
						</td></tr>
						
							<tr>
									<td  valign=top bgcolor=white >
										<center><a  href="#" title="Refresh" onClick="dognzbRefresh2x()" ><img src="includes/images/refresh.png"></a>
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



