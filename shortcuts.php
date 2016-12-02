


	



<?php



echo "
<div style=\" 	margin-top: -1px; 
				background-color: #E9E9E9; 	
				font-size: 11px;
				font-family: Verdana, Geneva, sans-serif;
				color: #255181;
				border: thin solid #CCCCCC;
				padding: 5px;
				-webkit-border-radius: 0 4px 4px 4px;
				border-radius: 0 4px 4px 4px;
				
				\">
 ";
?> 

This page I use for CLI commands that I commonly use and keeps me from having to memorize them. <br>
Feel free to edit the file ''shortcuts.php'' for what is usefule to you.


	<table border="0" width="100%" cellpadding="5" cellspacing="0">
	
        <tr>				
			<td valign=top>
					<b>Launch Ubuntu Menu: </b> <br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										"  
					size="40" type="text" id="text1_text" value="cd /var/www/newznab/misc/testing && ./common.sh" />
					
					<br>
					<b>Restart Nginx: </b> <br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										"  
					size="40" type="text" id="text1_text" value="sudo service nginx restart" />
					
					<br>					
					<b>Check Mysql Tables:</b><font style="color: #D93600;" > requires sudo su  </font><br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										"  
					size="40" type="text" id="text3_text" value="myisamchk /var/lib/mysql/nzedb/*.MYI" />
					
					<br>
					
					<b>Repair Mysql Tables:</b><font style="color: #D93600;" > requires sudo su  </font><br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										font-family: 'Trebuchet MS';
										"  
					size="40" type="text" id="text5_text" value="cd /var/lib/mysql/nzedb/ && myisamchk -r -F *.MYI" />
					
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										font-family: 'Trebuchet MS';
										"  
					size="40" type="text" id="text5_text" value="cd /var/lib/mysql/nzedb/ && myisamchk -r -F *.MYI --sort_buffer_size=4G" />
					<br>

					<b>Setup Swapfile in unRAID:</b>
					<font style="color: #D93600;" > <br>assuming swapfile is in cache drive</font><br>
					To test if swapfile is running: <b>top -b | head<b> <br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										font-family: 'Trebuchet MS';
										"  
					size="40" type="text" id="text5_text" value="swapon /mnt/cache/.custom/swapfile" />
					<br>


					<b> unRADID Enter MySQL Docker:</b><br>
				You can get the container ID from the docker tab or by typing "docker ps" at the command line.
				<br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							docker exec -t -i "container id" /bin/bash<br><br>
							docker exec -t -i 37fcc75e886d /bin/bash<br>
							export TERM=xterm<br>
							mysql -u root -proot
						</div>			
				<br>
				if you get a "TERM environment variable not set" when trying to run mysql -u root -p
				<br>					
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							export TERM=xterm<br>
						</div>		



				
			</td>
			<td valign=top>
					<b>cd /testing:</b> <br \>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										"  
					size="40" type="text" id="text2_text" value="cd /var/www/nzedb/misc/testing" />
					
					<br>
					
										<b>cd /update-scripts:</b>  <br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										"  
					size="40" type="text" id="text4_text" value="cd /var/www/nzedb/misc/update" />
					
					<br>
					
					<b>cd /tmux:</b> <br>
					<input style="width: 320px; 
										padding: 4px; 
										color: #666666; 
										background: #FFFBE1; 
										font-size: 9px; 
										border: 0;
										display: block; 
										-webkit-border-radius: 4px; 
										border-radius: 4px; 
										margin-left:3px;
										border: thin solid #AAAAAA;
										font-family: 'Trebuchet MS';
										"  
					size="40" type="text" id="text6_text" value="cd /var/www/nzedb/misc/update/nix/tmux" />
					
					
			</td>
		</tr>



	
	</table>
 

<?php

echo "
</div >
 ";
?>

<br>
 
 <div style=" 	margin-top: -1px; 
				background-color: #E9E9E9; 	
				font-size: 11px;
				font-family: Verdana, Geneva, sans-serif;
				color: #255181;
				border: thin solid #CCCCCC;
				padding: 5px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				
				">
 


	<table border="0" width="100%" cellpadding="5" cellspacing="0">
	
        <tr>				
			<td valign=top>
				<font style="font-size: 13px" ><b>How to Backup and Restore the NN MySQL Database </b> </font> <br><br>
				<div style=" 	font-size: 11px;
								font-family: Verdana, Geneva, sans-serif;
								color: #777777;
								">
				<b> Backup the Database:</b><br>
				The code below will backup the <b> nzedb </b>database to the folder <b>/tower/downloads/nnbackup/</b> in the Ubuntu server. <br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							mysqldump -u root -pPASSWORD nzedb >  /mnt/tower/downloads/nzedbbackup/nzedbsql_backup.sql
						</div>
						<br>
				<b> Restore the Database:</b><br>
				In order to restore, first you must delete the existing database. Please make sure the backup is current and there is no chance to kill it.
				<br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							mysql -u root -pPASSWORD<br>
							show databases;<br>
							drop database nzedb;
						</div>
				<br>
				Now, to restore the backup use the following:
				<br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							create database nzedb;<br>
							exit<br>
							mysql -u root -pPASSWORD nzedb < mnt/tower/downloads/nzedbbackup/nzedbsql_backup.sql
						</div>

				</div>
			</td>
		</tr>
	</table>
	</div>
	
<br>	
 
 <div style=" 	margin-top: -1px; 
				background-color: #E9E9E9; 	
				font-size: 11px;
				font-family: Verdana, Geneva, sans-serif;
				color: #255181;
				border: thin solid #CCCCCC;
				padding: 5px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				
				">
	<table border="0" width="100%" cellpadding="5" cellspacing="0">
	
        <tr>				
			<td valign=top>
				<font style="font-size: 13px" ><b>Docker: <br>How to Save a Locally Modified Container and Make a Repository</b> </font> <br><br>
				<div style=" 	font-size: 11px;
								font-family: Verdana, Geneva, sans-serif;
								color: #777777;
								">
				<b> Save the Container to an Image:</b><br>
				The code below will create locally an image of the container<br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							 docker commit 3a09b2588478 mynewimage
						</div>
						<br>
				<b> Log into Docker</b><br>
				
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
									docker login
						</div>
				<br>
				On the Docker hub web site, create a NEW repository and name it <b>mynewimage</b>. Back at the command line:
				<br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 94%;
								margin-left: 10px;
								font-weight: bold;
								">
							docker tag mynewimage myuserid/mynewimage<br>
							docker push myuserid/mynewimage
						</div>

				</div>
			</td>
		</tr>
	</table>



</div >

<br>
 
 <div style=" 	margin-top: -1px; 
				background-color: #E9E9E9; 	
				font-size: 11px;
				font-family: Verdana, Geneva, sans-serif;
				color: #255181;
				border: thin solid #CCCCCC;
				padding: 5px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				">

	<table border="0" width="100%" cellpadding="5" cellspacing="0">
	
        <tr>				
			<td valign=top>
				<font style="font-size: 13px" ><b>How to Truncate the NN Parts Repair Tables </b> </font> <br><br>
				<div style=" 	font-size: 11px;
								font-family: Verdana, Geneva, sans-serif;
								color: #777777;
								">
				
				This will probably make you miss a few releases, but it will un-stick the processing stage. This will all be done inside mySQL. <br><br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 50%;
								margin-left: 10px;
								font-weight: bold;
								">
							mysql -u root -pPASSWORD<br>
							show databases;<br>
							use nzedb;<br>
							TRUNCATE `parts`;<br>
							//TRUNCATE `partrepair`;<br>
							TRUNCATE `binaries`;<br>
							exit
						</div>
				<br>

				</div>
			</td>
		</tr>
	</table>

</div >

<br>
 
 <div style=" 	margin-top: -1px; 
				background-color: #E9E9E9; 	
				font-size: 11px;
				font-family: Verdana, Geneva, sans-serif;
				color: #255181;
				border: thin solid #CCCCCC;
				padding: 5px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				">

	<table border="0" width="100%" cellpadding="5" cellspacing="0">
	
        <tr>				
			<td valign=top>
				<font style="font-size: 13px" ><b>How to Stop unRAID Array </b> </font> <br><br>
				<div style=" 	font-size: 11px;
								font-family: Verdana, Geneva, sans-serif;
								color: #777777;
								">
				
				When stuck at "Retry unmont drive" it is likely something still running on cache drive.<br><br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 50%;
								margin-left: 10px;
								font-weight: bold;
								">
										Type: <br>
										<b>lsof /mnt/cache<b><br>
										<br>
										<b>fuser -mv /mnt/cache</b>
										<br>
										<br>
										<b>kill PID<b></br>
										<font color=grey><i>where PID  is the process ID number.</i></font>
										
										<br><font color=grey>________________________</font><br><br>
										lsof /mnt/*
										<br>
										<br>
										fuser -mvk /mnt/cache<br>
										<font color=grey><i>kills all running from the cache drive</i></font>
										
						</div>
				<br>

				</div>
			</td>
		</tr>
	</table>

</div >

<br>
 
 <div style=" 	margin-top: -1px; 
				background-color: #E9E9E9; 	
				font-size: 11px;
				font-family: Verdana, Geneva, sans-serif;
				color: #255181;
				border: thin solid #CCCCCC;
				padding: 5px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				">

	<table border="0" width="100%" cellpadding="5" cellspacing="0">
	
        <tr>				
			<td valign=top>
				<font style="font-size: 13px" ><b>Useful MySQL Commands </b> </font> <br><br>
				<div style=" 	font-size: 11px;
								font-family: Verdana, Geneva, sans-serif;
								color: #777777;
								">
				
				<b>Copy a Table to a New Table</b> <br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 80%;
								margin-left: 10px;
								font-weight: bold;
								">
							mysql -u root -pPASSWORD<br>
							use <i>databasename</i>;<br>
							
							CREATE TABLE <i>newtablename</i> LIKE <i>originaltablename</i>;<br>
							INSERT <i>newtablename</i> SELECT * FROM <i>originaltablename</i><br>
						
							exit
						</div>
				<br><br>
				<b>Rename Table</b> <br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 80%;
								margin-left: 10px;
								font-weight: bold;
								">
							mysql -u root -pPASSWORD<br>
							use <i>databasename</i>;<br>
							RENAME TABLE `<i>originaltablename</i>` TO `<i>newtablename</i>`;
						</div>
				<br><br>
				<b>Reset Auto_Increment to 1</b> <br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 60%;
								margin-left: 10px;
								font-weight: bold;
								">

							ALTER TABLE <i>tablename</i> AUTO_INCREMENT = 1;
						
						</div>
				<br><br>				
				<b>Delete ALL Records in a Table</b> <br>
						<div style=" 	font-size: 11px;
								font-family: monospace;
								color: #008C23;
								background-color: #FFFBE1;
								border: thin solid #CCCCCC;
								padding: 5px;
								padding-left: 10px;
								-webkit-border-radius: 4px;
								border-radius: 4px;
								width: 60%;
								margin-left: 10px;
								font-weight: bold;
								">

							DELETE FROM <i>tablename</i>;
						</div>
				<br><br>				
				
				
				
				</div>
			</td>
		</tr>
	</table>

</div >


<!-- 
	</p><div style="background-color:#000; width:800px">
	<iframe height="600px"  width="800px" name="myshell" src="https://ruiz.sytes.net:4200"></iframe></div>
-->
	
