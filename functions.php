
<?php
require 'config.php';
function parseNYTBooks($thedbTable, $theCategoryTitle, $theDivID) {
	echo "
	<div style=\"
		font-size: 20px;
		font-style: normal;
		font-weight: bold;
		text-decoration: none;
		color: #514E4E;
		padding-left: 5px;\">{$theCategoryTitle} <br></div>

		<div id=\"poster\" class=\"poster\">

		<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >
			<tr valign=\"top\">  					
				<td >	";
				
					
				
						$servername = "192.168.0.201";
						$username = $MysqlRSSUser;
						$password = $MysqlRSSPassword;
						$dbname = "nytimes";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						//  The Time Calculation
						$thenow = date('Y/m/d H:i:s');
						$timeresult = mysql_query("SELECT timestamp from {$thedbTable}");		
						mysql_data_seek($timeresult, 1);	
						$row1 = mysql_fetch_assoc($timeresult);
						//

						$sql = "SELECT rank, title, author, isbn10, isbn13, image, amazonurl, weeks, descript, timestamp FROM {$thedbTable}";
						$result = $conn->query($sql);							
		
				
			
	echo "<div id='{$theDivID}'>";		
			
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$mytimestamp = $row["timestamp"];						
						$rank	= $row["rank"];		
						
						$title = $row["title"];
						$titlesearch =  str_replace(' ',"+",$title) ;
						
						
						$searchurl = "https://www.myanonamouse.net/tor/browse.php?tor%5Btext%5D={$titlesearch}&tor%5BsrchIn%5D%5Btitle%5D=true&tor%5BsrchIn%5D%5Bauthor%5D=true&tor%5BsearchType%5D=all&tor%5BsearchIn%5D=torrents&tor%5Bcat%5D%5B%5D=60&tor%5Bcat%5D%5B%5D=71&tor%5Bcat%5D%5B%5D=72&tor%5Bcat%5D%5B%5D=90&tor%5Bcat%5D%5B%5D=61&tor%5Bcat%5D%5B%5D=73&tor%5Bcat%5D%5B%5D=101&tor%5Bcat%5D%5B%5D=62&tor%5Bcat%5D%5B%5D=63&tor%5Bcat%5D%5B%5D=107&tor%5Bcat%5D%5B%5D=64&tor%5Bcat%5D%5B%5D=74&tor%5Bcat%5D%5B%5D=102&tor%5Bcat%5D%5B%5D=76&tor%5Bcat%5D%5B%5D=77&tor%5Bcat%5D%5B%5D=65&tor%5Bcat%5D%5B%5D=103&tor%5Bcat%5D%5B%5D=115&tor%5Bcat%5D%5B%5D=91&tor%5Bcat%5D%5B%5D=66&tor%5Bcat%5D%5B%5D=78&tor%5Bcat%5D%5B%5D=138&tor%5Bcat%5D%5B%5D=67&tor%5Bcat%5D%5B%5D=79&tor%5Bcat%5D%5B%5D=80&tor%5Bcat%5D%5B%5D=92&tor%5Bcat%5D%5B%5D=118&tor%5Bcat%5D%5B%5D=94&tor%5Bcat%5D%5B%5D=120&tor%5Bcat%5D%5B%5D=95&tor%5Bcat%5D%5B%5D=81&tor%5Bcat%5D%5B%5D=82&tor%5Bcat%5D%5B%5D=68&tor%5Bcat%5D%5B%5D=69&tor%5Bcat%5D%5B%5D=75&tor%5Bcat%5D%5B%5D=96&tor%5Bcat%5D%5B%5D=104&tor%5Bcat%5D%5B%5D=109&tor%5Bcat%5D%5B%5D=70&tor%5Bcat%5D%5B%5D=112&tor%5Bcat%5D%5B%5D=0&tor%5Bbrowse_lang%5D%5B%5D=1&tor%5Bbrowse_lang%5D%5B%5D=4&tor%5BbrowseFlags%5D%5B%5D=16&tor%5Bhash%5D=&tor%5BsortType%5D=default&tor%5BstartNumber%5D=0";
						
						$author = $row["author"];														
						$isbn10	= $row["isbn10"];
						$isbn13 = $row["isbn13"];
						$image = $row["image"];
						$amazonurl = $row["amazonurl"];
						$weeks = $row["weeks"];
						
						$descript = $row["descript"];
						if ($descript == "") { 	
							$descript = "No description available.";
						}
					
						$myamazonlink = "<a href='{$amazonurl}' target='_new'><img src='includes/images/miniamazon.png' style='padding-bottom:-4px; margin-bottom: -5px; margin-left: 0px;'></a>";
						
						
						$itemCnt="<div id='postersingle' class='postersingle'>"
						  ."<a href='{$amazonurl}' target=hrnew>"
						  ."<img class=\"tooltipx\" height=\"168\" style=\"min-width: 111px; max-width: 111px; padding:0px; margin:0px; border:0px \"  src=\"{$image}\" title=\"
								<table width=100% border=0 cellspacing=0 cellpadding=0 >
										<tr>

											<td width=127 align=left valign=top >
												<img src='{$image}' width=187 id=postersingle2 class=postersingle2 style='margin-left:0px'><br><br>
											</td>
										</tr>
										<tr>
											<td valign=top >
											
												{$title}<br>	
												<font id=bubble class=bubble>
												by <b>{$author}</b>
												<br>Rank: <b>{$rank}</b>, on list: <b>{$weeks} weeks</b><br><br>								
											
											
												<font id=bubble class=bubble>

												{$descript}<br><hr>
												
												{$myamazonlink}
												
												<a href='{$searchurl}' target='MyAnonamouse' style='	
																color: #FFF;
																text-decoration: none;
																background-color: #156199;
																padding-top: 2px;
																border-top-style: none;
																border-right-style: none;
																border-bottom-style: none;
																border-left-style: none;
																padding-right: 6px;
																padding-bottom: 2px;
																padding-left: 6px; 
																font-size: 9pt; 
																margin-left: 0px; '>Search MyAnonamouse</a>
												
												<div id='mytrailers'></div>
												<hr><font color=#8A8A7B>{$myfulltitle}
												</font></font>		
												
											</td>
										</tr>	
								</table>
								</font>								 
						 \"/>
						 </a></div>";
						echo $itemCnt;				
						
						
					}
				} 
				else { 
						echo "<div style=\" padding-left: 10px; \"><font id=bubble class=bubble style=\"color: #888888; font-size: 9pt; \">Feed database empty at the moment. It is possible the site is down.<br>
							<img src=includes/images/crossbones.png height=60 style=\" opacity: 0.4;  \"></font></div>"; 
					}		
				$conn->close();						
	echo "</div>

		</td>
	</tr>

	</table>				
		
	</div>	";		

}

function NYTBooksTimestamp($thedbTable) {
	
		$servername = "192.168.0.201";
		$username = $MysqlRSSUser;
		$password = $MysqlRSSPassword;
		$dbname = "nytimes";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		//  The Time Calculation
		$thenow = date('Y/m/d H:i:s');
		$timeresult = mysql_query("SELECT timestamp from {$thedbTable}");		
		mysql_data_seek($timeresult, 1);	
		$row1 = mysql_fetch_assoc($timeresult);
		//

		$sql = "SELECT rank, title, author, isbn10, isbn13, image, amazonurl, weeks, descript, timestamp FROM {$thedbTable}";
		$result = $conn->query($sql);							
			
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$mytimestamp = $row["timestamp"];			
				$old_date_timestamp = strtotime($mytimestamp);
				$mytimestamp2 = date('l F d, Y - g:ia', $old_date_timestamp);  				
				
				
				if ($mytimestamp != "") { 								
					$to_time = strtotime($thenow);
					$from_time = strtotime($mytimestamp);
					$timediff = round(abs($to_time - $from_time) / 60,0);
					//$timediff = round(abs($timediff /60,0) );
					
					if ($timediff > 1440) {
						
						$timediff = "{$timediff}m";
						echo "<div style=\"
										font-size: 10px;
										font-style: normal;
										font-weight: normal;
										font-family: Arial,Helvetica,sans-serif;
										text-decoration: none;
										color: #B32D00;
										padding-left: 5px;
										position: fixed;
										top: 66px;
										right: 20px;\">
									{$mytimestamp2}
								</div>";				

					} else {
						$timediff = "{$timediff}m";
						echo "<div style=\"
										font-size: 10px;
										font-style: normal;
										font-weight: normal;
										font-family: Arial, Helvetica, sans-serif;
										text-decoration: none;
										color: #999999;
										padding-left: 5px;
										position: fixed;
										top: 66px;
										right: 20px;\">
									{$mytimestamp2}
								</div>";	
					}
				}

			}
		}
		$conn->close();	
}
?>