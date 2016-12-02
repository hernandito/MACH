<?php
require 'config.php';
?>

<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

			
	<tr valign="top">      
		<td >
			<div id="rss" class="rss" style="
					-moz-column-count: 2;
					-moz-column-gap: 7px;
					-webkit-column-count: 2;
					-webkit-column-gap: 7px;
					column-count: 2;
					column-gap: 7px;
					font-size: 12px;">
						
						<img style="margin-bottom: 7px;" src="includes/images/omg.png" width="182" height="25">
						
						
						
						<?php 
								$servername = "localhost";
								$username = $MysqlRSSUser;								$password = $MysqlRSSPassword;
								$dbname = "rssfeeds";

								// Create connection
								$conn = new mysqli($servername, $username, $password, $dbname);
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								
								//  The Time Calculation
										$thenow = date('Y/m/d H:i:s');
										$timeresult = mysql_query('SELECT timestamp from omg');		
										mysql_data_seek($timeresult, 1);	
										$row1 = mysql_fetch_assoc($timeresult);
								//
								
								
					
								$sql = "SELECT timestamp, mytrimtitle, mylink FROM omg";
								$result = $conn->query($sql);				
								   
								  
								  
//								echo "<li><a href=\"{$mylink}\" target=\"newtab\" style=\"font-size: 12px; padding-top: 3px;\">{$mytrimtitle}</a></li>";  
//						if (++$i == 14) break;
//						}
						
						if ($result->num_rows > 0) {

							// output data of each row
							while($row = $result->fetch_assoc()) {
								$mytimestamp = $row["timestamp"];						
								$mytrimtitle = $row["mytrimtitle"];			
								$mylink = $row["mylink"];						

								echo "<li><a href=\"{$mylink}\" target=\"newtab\" style=\" padding-bottom: 6px; font-size: 12px; padding-top: 6px;\">{$mytrimtitle}</a></li>";

							if (++$i == 14) break;
							}
								
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
						}						
						
						
						?>
						
						
						
						
			</div> 	
		</td>
	</tr> 		


</table>


