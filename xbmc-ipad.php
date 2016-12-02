<script type="text/javascript">
function bedSendNotice(){
$("#div1").load("show_notificationbed.php",$("#myBedMessage").serialize());
}
</script>

<script type="text/javascript">
function livingSendNotice(){
$("#div1").load("show_notificationliving.php",$("#myLivingMessage").serialize());
}
</script>
<link rel="stylesheet" type="text/css" href="rss.css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr>
				<td valign="top" width="35%">
							<div style="margin-left: 10px;">
									<div id="topbar2" class="topbar2" style="margin:0px; padding-left: 2px;">
										<strong>Video:</strong><br>
											<a class='classpanel ' href="#" id='updatevideo' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Update</a>
											<a class='classpanel' href="#" id='cleanvideo' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Clean</a>
											<br>
											<a class='classpanel ' href="#" id='updatevideotv' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 5px; padding: 8px; color: #999999;' >Update TV</a>
											<a class='classpanel ' href="#" id='updatevideomovies' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 5px; padding: 8px; color: #999999;' >Update Movies</a>											
											<br>
											<?php echo"<div style=' font-size: 11px; font-style: normal; margin-left: 28px;  color: #99ccff;'>";
											echo $xbmcprefix;
											echo "</div>";
											?>											
											<br>
											<a class='classpanel ' href="#" id='updatevideo2' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Update Kodi Docker</a>
											<br>
											
										<strong>Music:</strong><br>
											<a class='classpanel' href="#" id='updatemusic' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Update</a>
											<a class='classpanel' href="#" id='cleanmusic' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Clean</a>
											<br>

											<strong>Artwork Downloader:</strong><br>
											<a class='classpanel' href="#" id='artmovies' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Movies</a>
											<a class='classpanel' href="#" id='arttv' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >TV</a>
											<br>

										<hr style="width:90%;  border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);">
											
											<a class='classpanel' href="#" id='rescancp' style='font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #999999;' >Run Couchpotato Scan</a>
											
											<!--
											<a href="http://192.168.0.201:5000/api/d543bf596a9f415db52d11f0a9ab7fbf/renamer.scan" target="_new" style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 8px; padding: 8px; color: #ffc926;' >Run Couchpotato Scan</a>
											<br>
											-->
	
											<hr style="width:90%;  border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);">
<!--											<br>	
											<strong>Autoload Right Panel:</strong><br>											
											<a class='classpanel' href="#" id='defpanenable'  >Enable</a>
											<a class='classpanel' href="#" id='defpandisable'>Disable</a>											
											<br>
											<div style="font-size: 10px;color:#737373;margin-left:0px;">Currently: <b><font style="color:#D9A300;">
												<?php
												if ($choicepanel == "enabled") {
													echo "enabled";
												} elseif ($choicepanel == "disabled") {
													echo "disabled";
												}
												?>
												</b></font>
											</div> <br>
											
											<strong>Default View:</strong><br>
											<a class='classpanel' href="#" id='defrotten'  >Rotten Tomatoes</a>
											<a class='classpanel' href="#" id='defnzbcompare'>NZBs</a>
											<a class='classpanel' href="#" id='deffeedly'>Newz</a>
											<div style="font-size: 10px;color:#737373;margin-left:0px;">Currently set to: <b><font style="color:#D9A300;">
												<?php
												if ($choice == "deffeedly") {
													echo "Movie News";
												} elseif ($choice == "rotten") {
													echo "Rotten Tomatoes";
												} else {
													echo "NZB Releases";
												}
												?>
												</b></font>
											
											</div> <br>

											<strong>Auto-Refresh</strong><br>
											<a class='classpanel' href="#" id='defrefreshyes'  >Yes</a>
											<a class='classpanel' href="#" id='defrefreshno'>No</a>

											<div style="font-size: 10px;color:#737373;margin-left:0px;">Currently set to: <b><font style="color:#D9A300;">
												<?php
												if ($choicerefreshme == "yes") {
													echo "Autorefresh Enabled";
												} else  {
													echo "Autorefresh Disabled";
												} 
												?>
												</b></font>
											
											</div> <br>


											
										<hr style="width:90%;  border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);">
-->
											<br>	
											<strong>Bedroom:</strong><br>
												<a class='classpanel' href="#" id='rebootbed' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 4px; padding: 4px; color: #999999;' >Reboot</a>

												<a class='classpanel' href="#" id='shutdownbed' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 4px; padding: 4px; color: #999999;' >Shutdown</a>
										<br><br>

										<strong>Living Room:</strong><br>
											<a class='classpanel' href="#" id='rebootliving' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 4px; padding: 4px; color: #999999;' >Reboot</a>

											<a class='classpanel' href="#" id='shutdownliving' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 4px; padding: 4px; color: #999999;' >Shutdown</a>

										<div style="font-size: 14px; color:#B7E7F9; margin-left:0px; font-weight: bold;" id="div1"></div>
																
										<br>
									</div>			
								</div>		
				</td>
				<td valign="top" width="65%">
					<div id="topbar2" class="topbar2" style="margin:0px; padding-left: 2px;">
						<strong><font style="font-size: 14px;">Bedroom:</strong></font>
						
						
						<a class='classpanel' href="#" id='testxbmc' style='font-family: Verdana, Geneva, sans-serif; font-size: 10px; font-style: normal; font-weight: normal; margin-left: 4px; margin-top: 2px; padding-bottom: 0px; padding-top: 0px; padding-left:10px; padding-right:10px; color: #999999;' >refresh</a>
						<br><br>		

						<strong>Notification:</strong><br>										
						<div style="padding: 5px; 
								border: thin solid #4A4A4A; 
								width:95%; 
								margin-left: 4px;
								-webkit-border-radius: 4px;
								border-radius: 4px;" >		
								
							<form action="JavaScript:bedSendNotice()" method="POST" id="myBedMessage" >
								Title:<br>
								<input type="text" id="messagetitle" value="" name="messagetitle" style="width: 180px; 
										padding: 2px; color: #E2E2E2; 
										background: #606060; 
										font-size: 10px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 2px; 
										border-radius: 2px; 
										margin-bottom:5px; " >
								Message:<br>
								<input type="text" id="messagebody" value="" name="messagebody" style="width: 440px; 
										padding: 2px; 
										color: #E2E2E2; 
										background: #606060; 
										font-size: 10px; 
										border: 0; 
										display: block; 
										-webkit-border-radius: 2px; 
										border-radius: 2px; 
										margin-bottom:5px;" >
								<input type="submit" name="submit" value="Send"  style="font-size: 10px; padding: 2px; width: 58px; height: 22px; color: #D9A300; background: #212121;  ">
							</form>											
						</div>			

						<br>
						<div style="font-size: 20px; color:#FFD24C; margin-left:0px; font-weight: bold;" id="div2">
						
							<?php include('json_bed.php'); ?>
							
						</div>
					</div>
					
					<hr style="width:98%;  border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 3px solid rgba(255, 255, 255, 0.3);">
					
					<div id="topbar2" class="topbar2" style="margin:0px; padding-left: 2px;">
						<strong><font style="font-size: 14px;">Living Room:</strong></font>
						<br><br>

						<strong>Notification:</strong><br>										
						<div style="padding: 5px; 
								border: thin solid #4A4A4A; 
								width:95%; 
								margin-left: 4px;
								-webkit-border-radius: 4px;
								border-radius: 4px;" >		
								
							<form action="JavaScript:livingSendNotice()" method="POST" id="myLivingMessage" >
								Title:<br>
								<input type="text" id="messagetitleliving" value="" name="messagetitleliving" style="width: 180px; 
										padding: 2px; color: #E2E2E2; 
										background: #606060; 
										font-size: 10px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 2px; 
										border-radius: 2px; 
										margin-bottom:5px; " >
								Message:<br>
								<input type="text" id="messagebodyliving" value="" name="messagebodyliving" style="width: 440px; 
										padding: 2px; 
										color: #E2E2E2; 
										background: #606060; 
										font-size: 10px; 
										border: 0; 
										display: block; 
										-webkit-border-radius: 2px; 
										border-radius: 2px; 
										margin-bottom:5px;" >
								<input type="submit" name="submit" value="Send"  style="font-size: 10px; padding: 2px; width: 58px; height: 22px; color: #D9A300; background: #212121;  ">
							</form>											
						</div>			

						<br>	
						<div style="font-size: 20px; color:#FFD24C; margin-left:0px; font-weight: bold;" id="div3">
						
							<?php include('json_living.php'); ?>
							
						</div>

						<br>	

						</div>
					
					
				</td>
		</tr>

</table>		
						<div style="font-size: 20px; color:#FFD24C; margin-left:8px; font-weight: bold;" id="div3">
						
							 <iframe height="580" width="720" frameBorder="0" src="http://192.168.0.201:84/plugins/dynamix.vm.manager/vnc.html?autoconnect=true&host=192.168.0.201&port=5700"></iframe> 
							
						</div>

<!--
<div class="buttonmenu2" ><a href="#" style="border: thin solid #CCC;" >reload</a></div><br>


<div class="snarf" >
<a href="#" > Test Me rss</a>

</div>
-->