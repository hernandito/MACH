<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
        	$(document).ready(function() {
		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,
		});
		
    $("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 

<SCRIPT LANGUAGE="JavaScript">
    function cpAdd720(movieid)
    {
		$("#cpsearchdivin").innerHTML="Please wait....";
        $("#cpsearchdivin").load("cp720add.php",$("#" + movieid).serialize());  
		
		
    }
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
    function cpAdd1080(movieid)
    {
		$("#cpsearchdivin").innerHTML="Please wait....";
        $("#cpsearchdivin").load("cp1080add.php",$("#1080" + movieid).serialize());  
		
    }
</SCRIPT>

<style type="text/css">
form { display: inline;
padding: 0px;
margin: 0px;
 }
</style>


<?php
require 'config.php';
					$themovie = $_GET["moviename"];
					$themovie = str_replace(' ', '%20', $themovie);
					$myurl = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/search/?q={$themovie}";

					$response = file_get_contents($myurl);
					$result = json_decode($response, true);
					$result=$result['movies'];

					
					$totality = count($result);
					echo "<div class=cpsearch name=cpsearch id=cpsearch>";
					for ($i = 0; $i <$totality; $i++) {

							$hrmovietitle = $result[$i]['original_title'];
							$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
							$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');
							$hrmovietitle = substr($hrmovietitle, 0, 39);
							
							$hrposter = $result[$i]['images']['poster_original'][0];
							$hrimdb = $result[$i]['imdb'];
							$hryear = $result[$i]['year'];
							$imdbrating = round($result[$i]['rating'][imdb][0], 2);
							$imdbvotes = $result[$i]['rating'][imdb][1];
							
							$imdbvotes = number_format($imdbvotes);
							
							$hrmpaa = $result[$i]['mpaa'];
							$hrduration = $result[$i]['runtime'];
						
							$imdburl = "http://www.imdb.com/title/{$hrimdb}";
						


							$hrlibraryid = $result[$i]['in_library']['library_id'];
							$hrlibraryrez2 = "";
							$hrlibraryrez2 = $result[$i]['in_library']['releases'][0]['quality']['identifier'];
							
							$hrwantedid = $result[$i]['in_wanted']['library_id'];
							$hrwantedrez2 = "";
							$hrwantedrez2 = $result[$i]['in_wanted']['profile']['label'];
							
							$hrplot = $result[$i]['plot'];
							$hrplot =  str_replace('"',"'",$hrplot) ;	
							$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');
							
				
									
						// id3 is for 720p... id2 is for 1080
						
					echo "
						
						<table bgcolor=#FFFAD9 width=230 border=0 cellspacing=0 cellpadding=3 style='margin-bottom:9px;	margin-left:-2px; -webkit-box-shadow: 1px 1px 2px 1px #828282; box-shadow: 1px 1px 2px 1px #828282;'>
							<tr>
								<td rowspan=2 width=60>
								<img class=tooltip src={$hrposter} width=58 
									title=\"		
										<table width=100% border=0 cellspacing=0 cellpadding=0 >
											<tr>
												<td valign=top >
													{$hrmovietitle}<br><br>	
													<font id=bubble class=bubble>
													Year: <b>{$hryear}</b> <br>	
													Rating: <b>{$imdbrating}</b> <br>
													Duration: <b>{$hrduration}</b> <br>
											


													
													Rated: <b>{$hrmpaa}</b> <br>				

												</td>
												<td width=127 align=right valign=top >
													<img src='{$hrposter}' width=130 id=postersingle2 class=postersingle2 style='margin-left:10px'> 
												</td>
											</tr>
											<tr>
												<td valign=top colspan=2>
													<font id=bubble class=bubble>
													{$hrplot}</font>	
												</td>
											</tr>	
										</table>
										\" >
									
								</td>
								<td valign=top>
									<font style='font-size: 14px; 
										font-family: Arial, Geneva, sans-serif;
										color: #686859;
										margin: 0px;
										padding-left: 0px;
										font-weight: bold; '>
									{$hrmovietitle}</font>
									<font style='font-size: 11px; 
										font-family: Arial, Geneva, sans-serif;
										color: #686859;
										margin: 0px;
										padding-left: 0px;
										font-weight: normal; '><br>
									Year: <b>{$hryear}</b>	<br>
									Rating: <b>{$imdbrating}</b> - {$imdbvotes} votes	<br>
									
									
								</td>
							</tr>
							<tr>
								<td valign=bottom>
								<font style='font-size: 10px; 
									font-family: Verdana, Geneva, sans-serif;
									color: #686859;
									margin: 0px;
									padding-left: 0px;
									font-weight: normal; '>
								
									<form action='JavaScript:cpAdd720(\"{$hrimdb}\")' method='POST' id='{$hrimdb}' >
											<img src='includes/images/minicp.png' width='19' height='19' style='padding-bottom:-4px; margin-bottom: -4px;'>
											<input type='hidden' id='movieid'  name='movieid' value='{$hrimdb}'>
											<input type='hidden' id='moviename'  name='moviename' value='{$hrmovietitle}'>
											<a  class='classpanel2' href='javascript:;' onclick='parentNode.submit();' style='padding:1px; margin-left: 0px' >720p</a>						
									</form>
		
									<form action='JavaScript:cpAdd1080(\"{$hrimdb}\")' method='POST' id='1080{$hrimdb}' >
											<input type='hidden' id='movieid'  name='movieid' value='{$hrimdb}'>
											<input type='hidden' id='moviename'  name='moviename' value='{$hrmovietitle}'>
											<a  class='classpanel2' href='javascript:;' onclick='parentNode.submit();' style='padding:1px; margin-left:-1px;' >1080p</a>
											<a href={$imdburl} target=_blank title='See IMDB Page for this Movie'><img src='includes/images/minimdb.png' width='19' height='19' style='padding-bottom:-4px; margin-bottom: -5px; margin-left:-3px;'></a>";
												
											if ($hrlibraryid >=  1) {

												echo "<a href=\"#\"  class=\"tooltip\" title=\"<font id=bubble class=bubble>This movie is already in your library  in <b>{$hrlibraryrez2} </b> resolution. </font>\"><img src='includes/images/inlibrary.png' width='19' height='19' style='padding-bottom:-4px; margin-bottom: -5px; margin-left: 4px;' ></a>";
											}											
											
											if ($hrwantedid >=  1) {

												echo "<a href=\"#\"  class=\"tooltip\" title=\"<font id=bubble class=bubble>This movie is already in your Couchpotato wanted queue at <b>{$hrwantedrez2} </b> resolution. </font>\"><img src='includes/images/inwanted.png' width='19' height='19' style='padding-bottom:-4px; margin-bottom: -5px; margin-left: 4px;' ></a>";
											}													

									echo " </form>									
									</font>
									
								</td>
							</tr>
							
						</table>
						

						 ";
					
						}
					echo "</div>";
 

?>



