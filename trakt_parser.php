<!-- The Table that Renders Trakt Trending Movies -->	
<table width="100%" border="0" cellspacing="3" cellpadding="0" >	

	<tr valign="top">      
		<td>
			<div style="background-color: black" id="rss" class="rss">

		<!--		<div id="poster" class="poster" style="background-color: black; -webkit-box-shadow: 0 0 0 0 #0A0A0A; box-shadow: 0 0 0 0 #0A0A0A;" >
				-->	
				<table width="100%" border="0" cellspacing="0" cellpadding="0" >
					<tr valign="top">
					
						<td width=30px bgcolor=black >		
							<img style="margin-top:0px; margin-left:0px;" src="includes/images/trakt90.png" >
						</td>	
						
						<td width=30px bgcolor=black >		
							<a  class='classpanel' href="#" id='traktmovies' style="padding:1px; margin:2px;" ><img src="includes/images/minimovie.png" width="19" height="19"></a>
							<a  class='classpanel' href="#" onclick="getTV()"  style="padding:1px; margin:2px;" ><img src="includes/images/minitv.png" width="19" height="19"></a>
						</td>
						
						<td bgcolor=black >		
							<div id="divtrakt">
								<?php
									include('trakt_movies.php');
								?>								
							</div>
						</td>			
				
					</tr></table>		
					</div>			
			</div>   
		</td>
	</tr>    

 

</table>
<script type="text/javascript">
function getTV(){

 $("#divtrakt").load("trakttv.php");
}
</script>
<!-- End Of Table that Renders The Sidebar with Tabs -->	