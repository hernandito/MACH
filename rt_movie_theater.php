
		<script src="jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){

				$(".iframe").colorbox({iframe:true, width:"99%", height:"78%"});

			});
		</script>
		
<SCRIPT LANGUAGE="JavaScript">
    function getTrailer(movieid)
    {

		 $.colorbox({width:"99%", height:"60%", iframe:true, href:$("#" + moviename).serialize()});
    }
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
    function rtAdd720(movieid)
    {
		$("#snarfola").innerHTML="Please wait....";
        $("#snarfola").load("cp720add.php",$("#" + movieid).serialize());  
		
		
    }
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
    function rtAdd1080(movieid)
    {
		$("#snarfola").innerHTML="Please wait....";
        $("#snarfola").load("cp1080add.php",$("#1080" + movieid).serialize());  
		
    }
</SCRIPT>

<style type="text/css">
form { display: inline;
padding: 0px;
margin: 0px;
 }
 
#toolinker a {

color: red;

}

#toolinker a {

color: green;

}
 
 
 
</style>

<?php

require 'config.php';


$myurl = "http://api.rottentomatoes.com/api/public/v1.0/lists/movies/box_office.json?apikey={$RottenTomatoesAPI}&page_limit=14";


$response = file_get_contents($myurl);
$result = json_decode($response, true);
$result=$result['movies'];

$totality = count($result);

	
	for ($i = 0; $i <$totality; $i++) {
		$hrmovietitle = $result[$i]['title'];
		$hrmovietitle =  str_replace('"',"'",$hrmovietitle) ;	
		$hrmovietitle = htmlentities($hrmovietitle, ENT_QUOTES, 'UTF-8');

		
		
		$hrmpaa = $result[$i]['mpaa_rating'];	
		$hrrating = "Critics:<b> " . $result[$i]['ratings']['critics_score'] . "</b><br>Audience:<b> " . $result[$i]['ratings']['audience_score'] . "</b>";		
		
		$hrimdb = $result[$i]['alternate_ids']['imdb'];
		$hrimdblink = "http://www.imdb.com/title/tt{$hrimdb}";
		
		$hrthumbnail = $result[$i]['posters']['profile'];
		$hrlinks = $result[$i]['links']['alternate'];
		$hrlinkstrailer = "{$hrlinks}/trailer";
		
		$hrplot = $result[$i]['synopsis'];
		$hrplot =  str_replace('"',"'",$hrplot) ;	
		$hrplot = htmlentities($hrplot, ENT_QUOTES, 'UTF-8');
		
		$plotlength = strlen($hrplot);
		
		if ($plotlength >= 400) $hrplot = substr($hrplot,0, 400) . "... <a class=\"iframe2\" href=\"{$hrlinks}\" style=\"text-decoration: none; \" ><b>more</b></a>";
	

		

		echo "<div id='postersingle' class='postersingle' style=\"-webkit-box-shadow: 0 0 0 0 #000000; box-shadow: 0 0 0 0 #000000;\"><a class=\"tooltip3\" rel=\"ajaxpanel\" href=\"{$hrlinks}\" title= 
		'<table width=100% border=0 cellspacing=0 cellpadding=0 >
			<tr>
				<td valign=top >
					{$hrmovietitle}<br><br>	
					<font id=bubble class=bubble>
					Rated: <b>{$hrmpaa}</b> <br>				
					{$hrrating}<br>	
						

					<br>				
				
					
				</td>
				<td width=107 align=right valign=top >
					<img src=\"{$hrthumbnail}\" width=100 id=postersingle2 class=postersingle2 style=\"margin-left:10px\"> 
				</td>
			</tr>
			<tr>
				<td valign=top colspan=2>
					<font id=bubble class=bubble>

					{$hrplot}<br>
					<hr>
					<a href=\"{$hrimdblink}\" target=\"_new\"><img src=\"includes/images/minimdb.png\" style=\"padding-bottom:-4px; margin-bottom: -5px; margin-left:-3px;\"></a>
					<a class=\"iframe classpanel2\" href=\"{$hrlinkstrailer}\" title=\"{$hrmovietitle}\" style=\"
																		color: #FFF;
																		background-color: #156199;
																		padding-top: 2px;
																		border-top-style: none;
																		border-right-style: none;
																		border-bottom-style: none;
																		border-left-style: none;
																		padding-right: 7px;
																		padding-bottom: 2px;
																		padding-left: 7px; 
																		font-size: 8pt; 
																		margin-left: 2px;	
																		
					
					\"
					
					>trailer</a>
									<form action=JavaScript:rtAdd720(\"{$hrimdb}\") method=POST id=\"{$hrimdb}\" >
											<img src=includes/images/minicp.png width=19 height=19 style=\"padding-bottom:-4px; margin-left: 8px; margin-right:0px; margin-bottom: -4px;\">
											<input type=\"hidden\" id=\"movieid\"  name=\"movieid\" value=\"tt{$hrimdb}\">
											<input type=\"hidden\" id=\"moviename\"  name=\"moviename\" value=\"{$hrmovietitle}\">
											<a  class=\"classpanel2\" href=\"javascript:;\" onclick=\"parentNode.submit();\" style=\"padding:1px; 
												font-size: 10px;
												font-style: normal;
												font-weight: normal;
												color: #666;
												margin-left: 1px;
												margin-top: -9px;
												padding-top: 1px;
												padding-right: 5px;
												padding-bottom: 1px;
												padding-left: 5px;
											
											\" >
											720p
											</a>						
									</form>

									<form action=JavaScript:rtAdd1080(\"{$hrimdb}\") method=POST id=\"1080{$hrimdb}\" >
											<input type=\"hidden\" id=\"movieid\"  name=\"movieid\" value=\"tt{$hrimdb}\">
											<input type=\"hidden\" id=\"moviename\"  name=\"moviename\" value=\"{$hrmovietitle}\">
											<a  class=\"classpanel2\" href=\"javascript:;\" onclick=\"parentNode.submit();\" style=\"padding:1px; 
												font-size: 10px;
												font-style: normal;
												font-weight: normal;
												color: #666;
												margin-left: 1px;
												margin-top: -9px;
												padding-top: 1px;
												padding-right: 5px;
												padding-bottom: 1px;
												padding-left: 5px;
											
											\" >
											1080p
											</a>						
									</form><br>									

							
									<div id=\"snarfola\"></div>					

					</font>	
				</td>
			</tr>	
		</table>' ><img src=\"{$hrthumbnail}\" height=100 ></a><br>

		</div>";
		

		
	}		

		

?>
