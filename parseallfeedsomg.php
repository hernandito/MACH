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



	$xml = simplexml_load_file($OMGRSS);
	
	if ($xml != "") { 		
	
			$sql = "DELETE FROM omg";
			
			mysqli_query($con, $sql) or die(mysqli_error());

			/////////////////////////////////////////////////////////////////////////////////	
			//		Set the Time Stamp
			/////////////////////////////////////////////////////////////////////////////////	

			$timestamp = "";
			$timestamp = date('Y/m/d H:i:s');	
	
			$items = $xml->xpath('//item');
			$i = 0;
			foreach ( $items as $item) {
					$mylink = $item->link;							  	  
					$mytitle = $item->title;
				  
					$mytitle = str_replace('- omgwtfnzbs.org','',$mytitle);
					$mytitle = str_replace('.',' ',$mytitle);
					$mytitle =  str_replace(':',"..",$mytitle) ;
					$mytrimtitle = substr($mytitle,0,52);								  


					// =======================================================================
					// 						Insert into DB 	
					// =======================================================================
					$link = mysqli_connect($MysqlRSSServer, $MysqlRSSUser, $MysqlRSSPassword, "rssfeeds");

					
					if($link === false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}		

					$query = "INSERT INTO omg (timestamp, mytrimtitle, mylink) VALUES ('$timestamp', '$mytrimtitle', '$mylink')";

					if(mysqli_query($link, $query)){
						//	echo "<br>Records added successfully.<br>";
					} else{
							echo "ERROR: Unable to execute query. " . mysqli_error($link) . "<br><br>";
					}		
					
				  
				//	echo "{$mylink}<br>{$mytrimtitle}<br><br>";  
					if (++$i == 14) break;
		}


} else { echo "OMG Feed Not Available<br>"; }
?>
						
						
						
						


