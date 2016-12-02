
<?php



require 'includes/required/errorreporting.php';
require 'includes/required/defaults.php';
require 'includes/required/header.php';

require 'config.php';
require 'choice.txt';
require 'choicepanel.txt';
require 'choicerefresh.txt';
 
?>
<meta name="googlebot" content="noindex" />
<meta name="robots" content="noindex" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>


<meta name="viewport" content="width=device-width, initial-scale=.90, maximum-scale=0.90, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">


<link type="text/css" rel="apple-touch-icon-precomposed" href="cherry-4.png" />

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,600,700' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="includes/css/colorbox.css" />
<script src="includes/javascript/jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements

				$(".iframeq").colorbox({iframe:true, width:"760px", height:"900px"});

			});
		</script>



<?php
/*============================================  */
/*    Do we want to Auto Refresh???  updatePhp updatevideo*/
/*============================================  */

	if ($choicerefreshme == "yes") {
		echo "<meta http-equiv=\"refresh\" content=\"5400\">";
	} 

/*============================================  */


/*===================================================================================================================
	Code Below Parses the Sickbeard TV Show List and counts Wanted and Snatched Episodes
  ===================================================================================================================*/
	
$feedshows123 = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=shows&sort=name";
$sbJSON123 = json_decode(file_get_contents($feedshows123));

foreach($sbJSON123->{data} as $show) {
	$thesbshowid = $show->{tvdbid};
	$hrsbshowname = substr($show->{show_name}, 0, 29);
		
	$thebanner = "{$mySickbeardURL}/api/{$mySickbeardAPI}/?cmd=show.getbanner&tvdbid=" .$thesbshowid;
	
	$thesbtotal = "{$mySickbeardURLinternal}/api/{$mySickbeardAPI}/?cmd=show.stats&tvdbid=" .$thesbshowid;
	$sbcountTotal = json_decode(file_get_contents($thesbtotal));
	$thefinaltotal = $sbcountTotal->{data}->{downloaded}->{total};
	$thefinaltotal2 = $sbcountTotal->{data}->{snatched}->{total};
	$thefinaltotal3 = $sbcountTotal->{data}->{wanted};
	
	$processstatus ="";
	$snatchtotal = $snatchtotal + $thefinaltotal2;
	$wantedtotal = $wantedtotal + $thefinaltotal3;
	
	if ($thefinaltotal2 > 0) { 
		$processstatus = " - <font style=\"font-weight: bolder; color: #008000; font-size:14px;\">S:{$thefinaltotal2} </font>";
		}
		
	if ($thefinaltotal3 > 0) { 
		$processstatus = "{$processstatus}- <font style=\" color: #B30000; font-weight: bolder; font-size:14px;\">W:{$thefinaltotal3}</font>";
		}	
	
	$sbparseresults =  "{$sbparseresults}

		<li style=\"font-size:8px; font-weight: bold; line-height: 8pt; padding-top: 6px;	padding-left: 4px; padding-bottom: 3px; \">
			<a rel='ajaxpanel' class=tooltip href=\"{$mySickbeardURLinternal}/home/displayShow?show={$thesbshowid}\" 
						title=\"<img src={$thebanner} height=45 id=postersingle3 class=postersingle3 >
						\" >
			<font style=\" font-size:13px; \"><b>{$hrsbshowname}</b> {$processstatus}</font>
			</a>
		</li>
	";
}
/*===================================================================================================================*/



?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">
<!--
<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function() {
          $("#bigdiv2").load("nzbcompare2.php");
        }, 10000);
    });

</script>
-->


<script type="text/javascript">
function cpSearchInline(){
$("#cpsearchdivin").load("cpsearchinline.php",$("#yourCPFormId").serialize());
}
</script>

<script type="text/javascript">
function cpClearInline(){
 document.getElementById('moviename').value = "";
 document.getElementById("cpsearchdivin").innerHTML='';
  

}
</script>


<script>
	$(document).ready(function() {


		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: true,
		interactiveTolerance: 15,
		maxWidth: 280		
		});

		$('.tooltip2').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,
		maxWidth: 280
		});	

		$('.tooltiptable').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,
		maxWidth: 400
		});	


		
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
</script> 

				<script>
				$(document).ready(function(){
				  $("#filteritALL").click(function(){
					$("#filteredmovies").load("allmovies_parseit.php");
				  });
				});
				</script>
<?php

	foreach (range('A', 'Z') as $i) {
		echo "		<script>
					$(document).ready(function(){
					  $(\"#filterit{$i}\").click(function(){
						$(\"#filteredmovies\").load(\"allmovies_parseit.php?filterphpvar={$i}\");
					  });
					});
					</script>
			";				
	}
?>

				
				
<script>
	$(document).ready(function () {    
				var refreshId = setInterval(function()
				{            
					
					 $('#thetimeis').load('currenttime.php');
					 
				}, 5000);            
			});
</script>

<script>
	$(document).ready(function () {    
				var refreshId = setInterval(function()
				{            
					 $('#updateDivIpad').load('updatePhpIpad.php');
					 					 
				}, 600000);            
			});
</script>


<script>
	$(document).ready(function () {    
				var refreshId = setInterval(function()
				{            
					
					$('#nzbsdiv').load('parse_nzbsdotorg2db.php');
					
					 
				}, 1200000);            
			});
</script>


<script type="text/javascript">
function domaxspeed() {
    $.get("http://myserver.com:88/api?mode=config&name=speedlimit&value=12000&ma_username=USERNAMEHERE&ma_password=PASSWORDHERE&apikey=SABAPIHERE");
    return false;

}
</script>

<script type="text/javascript">
function dospeed() {
    $.get("http://myserver.com:88/api?mode=config&name=speedlimit&value=400&ma_username=USERNAMEHERE&ma_password=PASSWORDHERE&apikey=SABAPIHERE");
    return false;

}
</script>



<script>
$(document).ready(function(){
  $("#updatevideo").click(function(){
    $("#div1").load("update_video.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#updatevideotv").click(function(){
    $("#div1").load("update_videotv.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#updatevideomovies").click(function(){
    $("#div1").load("update_videomovies.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#cleanvideo").click(function(){
    $("#div1").load("clean_video.php");
  });
});
</script>
<script>
$(document).ready(function(){
  $("#updatevideo2").click(function(){
    $("#div1").load("update_video2.php");
  });
});
</script>


<script>
<script>
$(document).ready(function(){
  $("#updatemusic").click(function(){
    $("#div1").load("update_music.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#cleanmusic").click(function(){
    $("#div1").load("clean_music.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#rebootbed").click(function(){
    $("#div2").load("reboot_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#testxbmc").click(function(){
    $("#div2").load("json_bed.php");
	$("#div3").load("json_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pauseplaybed").click(function(){
    $("#div2a").load("playpause_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#playstopbed").click(function(){
    $("#div2a").load("playstop_bed.php");
	$("#div2").load("json_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#pauseplayliving").click(function(){
    $("#div3a").load("playpause_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#playstopliving").click(function(){
    $("#div3a").load("playstop_living.php");
	$("#div3").load("json_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#shutdownbed").click(function(){
    $("#div1").load("shutdown_bed.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#rebootliving").click(function(){
    $("#div1").load("reboot_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#shutdownliving").click(function(){
    $("#div1").load("shutdown_living.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#artmovies").click(function(){
    $("#div1").load("artmovies.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#arttv").click(function(){
    $("#div1").load("arttv.php");
  });
});
</script>
<!-- -->
<script>
$(document).ready(function(){
  $("#rescancp").click(function(){
    $("#div1").load("rescancp.php");
  });
});
</script>


<script>
$(document).ready(function(){
  $("#allflicks").click(function(){
    $("#bigdiv").load("allmovies.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#listprofile").click(function(){
    $("#cpsearchdiv").load("list_profileid.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#allnzb").click(function(){
    $("#bigdiv").load("nzbcompare.php?technology=0,1,2,3,4,5,6,7,8?v=1#");
  });
});
</script>


<script>
$(document).ready(function(){
  $("#trakttv2").click(function(){
    $("#divtrakt").load("trakt_tv.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#traktmovies").click(function(){
    $("#divtrakt").load("trakt_movies.php");
  });
});
</script>

<script type="text/javascript">
function ruizRefresh(){
$("#ruizdiv").load("parse_ruiz2.php");
 
}
</script>

<script type="text/javascript">
function ruizRefresh2(){
$("#ruizdiv").load("parse_ruiz2.php");
 
}
</script>



<script>
$(document).ready(function(){
  $("#clickrotten").click(function(){
	$("#bigdiv2").load("blank.php");
    $("#bigdiv2").load("rt_main.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#clicknzb").click(function(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("nzbcompare2.php");
  });
});
</script>


<script type="text/javascript">
function myrotten(){
$("#bigdiv2").load("blank.php");
$("#bigdiv2").load("rt_main.php.php");
 
}
</script>




<script type="text/javascript">
function myMedia(){
$("#bigdiv").load("blank.php");
$("#bigdiv").load("sidebar-ipad.php");
 
}
</script>

<script>
$(document).ready(function(){
  $("#defrotten").click(function(){
    $("#div1").load("defrotten.php");
  });
});
</script>


<script>
$(document).ready(function(){
  $("#defnzbcompare").click(function(){
    $("#div1").load("defnzbcompare.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#deffeedly").click(function(){
    $("#div1").load("deffeedly.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#defpanenable").click(function(){
    $("#div1").load("defpanelenable.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#defpandisable").click(function(){
    $("#div1").load("defpaneldisable.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#defrefreshyes").click(function(){
    $("#div1").load("defrefreshyes.php");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#defrefreshno").click(function(){
    $("#div1").load("defrefreshno.php");
  });
});


function RefreshRuizDB(){
$("#ruizreload").load("blank.php");
$("#ruizreload").load("parseallfeedsruiztv2.php");
 
}


</script>


</script>


<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>
</head> 


<script>
$(window).load(function(){
  $('#dvLoading').fadeOut(1000);
<!--  $('#bigdiv').fadeIn(3000);  -->
<!--  $('#rss2').fadeIn(1000); -->
  
$('#updateDivIpad').load('updatePhpIpad.php');  
  
  
});
</script>



<body topmargin="0" >
<!-- The Spinning Circle -->	
	<div id="dvLoading" style="   background:#EAEAEA url(includes/images/loading5.gif) no-repeat center center;
		background-size: 40px 40px;
			-webkit-box-shadow: 1px 1px 9px 1px #2B2B2B;
			box-shadow: 1px 1px 9px 1px #2B2B2B;
			-webkit-border-radius: 8px;
			border-radius: 8px; 			
			height: 46px;
			width: 50px;
			position: fixed;
			font-family: Verdana, Geneva, sans-serif;	
			font-size: 9px;	
			font-weight: normal;	
			text-align: center;	
			vertical-align: middle; 						
			color: #999;		
			padding-top: 4px;			
			z-index: 1000;
			left: 50%;
			top: 50%;
			border: 1px solid #444444;
			margin: -27px 0 0 -25px;" > </div>


			
				
	<div style=" 	font-family: sans-serif;
					background-color: #E6E6E6;
					font-size: 10px;
					color: #B9B9B9;

					padding-top: 0px; 
					padding-bottom: 0px; 
					padding-left: 7px; 
					padding-right: 5px; 
					
					-webkit-border-radius: 3px;
					border-radius: 3px;
					
					 -webkit-box-shadow: 1px 1px 2px 1px #5D5D5D; 
					 box-shadow: 1px 1px 2px 1px #5D5D5D;			
 


					
					width: auto;
					position: fixed;
					z-index: 1200;
					left: 14px;
					top: 7px; " >

					<table width="100%" border="0" cellspacing="0" cellpadding="0" >
						<tr>

							<td  valign=middle >
								<?php echo "
									<a  href=\"{$nzbgetURL}\" title='nzbGet' target='newnzbGet' ><img src='includes/images/midnzbget.png' height=20 width=20 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>";
								?> 
							</td>

							<td  valign=middle >
								<?php echo "
									<a  href=\"{$mySickbeardURL}\" title='Sickrage' target='newSick' ><img src='includes/images/midsick.png' height=20 width=20 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>";
								?> 
							</td>

							<td  valign=middle >
								<?php echo "
									<a  href=\"{$myCouchpotatoURL}\" title='Couchpotato' target='newCouch' ><img src='includes/images/midcouch.png' height=20 width=20 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>";
								?> 
							</td>							

							<?php 
								if($myUseHeadphones == "yes"):
								echo "
									<td  valign=middle >
										<a  href=\"{$myHeadphonesURL}\" title='Headphones' target='newHeadphones' ><img src='includes/images/midheadp.png' height=20 width=20 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>
									</td>";	
								endif; 
							?> 
							
							<td  valign=middle >
								<?php echo "
									<a  href=\"{$myRutorrentURL}\" title='rTorrent' target='newrTorrent' ><img src='includes/images/midrtorrent.png' height=20 width=20 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>";
								?> 
							</td>	
							
							<td  valign=middle >
								<?php echo "
									<a  href=\"{$myPlexURL}\" title='Plex Media Server' target='newPlex' ><img src='includes/images/midplex.png' height=20 width=20 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>";
								?> 
							</td>								

							<td  valign=middle >
								<?php echo "
									<a  href=\"{$calibreURL}\" title='eBooks' target='newCalib' ><img src='includes/images/book.png' height=24 width=24 style='margin-top: 1px; margin-right: 4px; margin-left: 4px;'></a>";
								?> 
							</td>								
							
						<!--
							<td  valign=top >
								<a  href="#" title="Rescan R.tv" onClick="RefreshRuizDB()" ><img src="includes/images/refresh.png" height=18 width=9 style="margin-top: 1px; margin-right: 3px; margin-left: -3px; border: 1px solid #999999; border-radius: 3px;"></a>
							</td>
						-->	
							<td valign=middle>
								<div  style="font-family: sans-serif;
										font-size: 10px;
										line-height: 10px;
										color: #888888;
										text-align: left;
										padding-right: 4px;
										border-right-width: 1px;
										border-right-style: solid;
										border-right-color: #BBBBBB;										
">
									<?php echo "
										Want: <b> {$wantedtotal}</b><br>
										Snatch: <b>{$snatchtotal}</b> ";	
										$wantedtotal = "";										
										?>
								</div>
							</td>						
						
							<td valign=middle>
								
									<img height="19" style="padding-top: 2px ;padding-left: 5px; padding-right:5px; margin:0px; border:0px;" src="includes/images/midcouch.png" >
								
							</td>
							<td valign=middle>
								<form action="JavaScript:cpSearchInline()" method="POST" id="yourCPFormId" style="margin: 0; " >
									<input type="text" id="moviename"  name="moviename" style="width: 78px; margin: 0; font-size: 11px; background-color: #FFFBE1;">
									<input type="submit" name="submit" value="Search"  style="width: 54px; margin: 0; font-size: 11px;">
									<input type="button" value="Clear" onClick="cpClearInline()" style="width: 42px; margin: 0; font-size: 11px;" />
								</form>
								<center>
									<div id="cpsearchdivin"></div>
								</center>
							</td>	

							<td valign=middle>
								<?php echo "<a target=\"hrHead\" href=\"{$myHeadphonesURL}\" >"; ?>
						<!--	<?php echo "<a rel='ajaxpanel' href=\"{$myHeadphonesURL}\" >"; ?>  -->
									<img height="19" style="padding-top: 2px; padding-left:3px; padding-right:1px; margin:0px; border:0px;" src="includes/images/minihp.png" >
								</a>
							</td>

							
							<td valign=middle>
								
									<img height="19" style="padding-top: 2px; padding-left:-3px; padding-right:3px; margin:0px; border:0px;" src="includes/images/transmission29.png"  class="tooltip" 
									title="
										<table width='100%' border='0' cellspacing='0' cellpadding='0' >
										<tr>
											<td valign=top style='border-right-width: 1px; border-right-style: solid; border-right-color: #AAAAAA; padding-top: 5px; '>
												<img height='70' src='includes/images/transmission-logo.png' >
											</td>
									
											<td valign=top style='padding-left: 5px; padding-top: 2px; '>
												<a href='http://rtorrent.server/com/' target='hrnew' style='	
																					color: #FFF;
																					background-color: #598AAE;
																					padding: 4px;
																					margin: 5px;
																					width: 290px;
																					font-size: 8pt; 
																					-webkit-border-radius: 3px;
																					border-radius: 3px;
																					font-weight: bold;
																					text-decoration: none;	'																	' 
																					>ruTorrent in Ubuntu</a>
												<br><br>
												
												<a href='http://server.com:9091/transmission/web/#upload' target='hrnew' style='	
																					color: #FFF;
																					background-color: #598AAE;
																					padding: 4px;
																					margin: 5px;
																					width: 290px;
																					font-size: 8pt; 
																					-webkit-border-radius: 3px;
																					border-radius: 3px;
																					font-weight: bold;
																					text-decoration: none;		'
																					>Transmission in unRAID</a>
												<br><br>
												
												<a href='https://otherserver.com/rutorrent/' target='hrnew' style='	
																					color: #FFF;
																					background-color: #598AAE;
																					padding: 4px;
																					margin: 5px;
																					width: 290px;
																					font-size: 8pt; 
																					-webkit-border-radius: 3px;
																					border-radius: 3px;
																					font-weight: bold;
																					text-decoration: none;		'
																					>Seedbox</a>
												<br>
											</td>

										</tr>
									</table>	
									">
							</td>							

							
							<?php 
								if ($snatchtotal >= 1) {
										echo "
										<td valign=middle style=\"
													font-family: Verdana, Geneva, sans-serif;
													font-size: 11px;
													font-weight: bold;
													color: #333;
													text-decoration: none;
													background-color: #FC0;
													-webkit-border-radius: 0px;
													border-radius: 0px;
													padding-left: 8px;
													padding-right: 8px;
													border-left: 1px solid #BBBBBB;
													border-right: 1px solid #BBBBBB;
												\">
													Snatch: {$snatchtotal}
										</td>";
								} else {
								
								 echo "<td valign=middle>
											<div id=\"thetimeis\"  style=\"
												margin-left: 3px;
												margin-right: 3px;
												margin-top: 0px;
												font-family: 'Exo 2', sans-serif;
												font-size: 14px;
												font-weight: 700;
												color: #AAAAAA;
												text-decoration: none;\">";
									
										
												include('currenttime.php');
											
									
								echo "</div>
					
								</td>";						
								
								
								}
							?>

							<td valign=middle align=center>
								<div  id="updatewicon" class="updatewicon" style="background-color: #444444; color: #444444; ">...</div>
							
							</td>							
							<!--
							<td valign=middle>
								<div id="nzbstatus"  style="
									margin-left: 6px;
									margin-right: 1px;
									margin-top: 3px;
									font-family: 'Exo 2', sans-serif;
									font-size: 14px;
									font-weight: 700;
									color: #AAAAAA;
									text-decoration: none;">

										<img src='includes/images/middown.png' height=20 width=20 class="tooltiptable" title="
											<?php 

											$myurl = "{$myNZBGetURL}jsonrpc/listgroups";
											$response = file_get_contents($myurl);
											$myscan = json_decode($response, true);
											$myscan= $myscan['result'];
											$totality = count($myscan);

											if($totality > 0){
												echo "<div style='font-size: 12px; font-weight: bold; color: #666666; '>Queue<br></div>";
												
													echo "<div style='font-size: 10px; font-weight: normal; color: #333333; '>";
													echo "<table width=100% cellpadding=0 cellspacing=0 border=0>";

													for ($i = 0; $i <$totality; $i++) {	
														$nzbname = $myscan[$i]['NZBName'];
														$nzbname =  str_replace('.',' ',$nzbname) ;	
														$nzbname = htmlentities($nzbname, ENT_QUOTES, 'UTF-8');	

														$filesize= $myscan[$i]['FileSizeLo'];
														$fileremain= $myscan[$i]['RemainingSizeLo'];	

														$mypercentleft = $fileremain / $filesize * 100;
														$mypercentleft = round($mypercentleft,0);
													
														$nzbname = substr($nzbname,0,31);
														
														$nzbcategory = $myscan[$i]['Category'];	
												
														echo "
															<tr>
																<td style='color: #0000FF;  font-weight: bold; border-bottom: 1px solid #BBBBBB;'>{$mypercentleft}%</td>
																<td style='padding-right: 4px; color: #B32D00; border-bottom: 1px solid #BBBBBB;'>{$nzbcategory}</td>
																<td style='color: #555555; border-bottom: 1px solid #BBBBBB;'>{$nzbname}</td>
															</tr>	
															";
													}
													echo "</table></div><br>";	

											}  else {
												echo "<div style='font-size: 10px; font-weight: normal; color: #3F71BC; '>queue empty<br></div>";
											}

											echo "<div style='font-size: 12px; font-weight: bold; color: #666666; '>History</div>";

											$myurl = "{$myNZBGetURL}jsonrpc/history";
											$response = file_get_contents($myurl);

											$myscan = json_decode($response, true);
											$myscan= $myscan['result'];

											$totality = count($myscan);
													echo "<div style='font-size: 10px; font-weight: normal; color: #333333; '>";
													echo "<table width=100% cellpadding=0 cellspacing=0 border=0>";

													for ($i = 0; $i <$totality; $i++) {	
														$nzbname = $myscan[$i]['Name'];
														$nzbname =  str_replace('.',' ',$nzbname) ;	
														$nzbname = htmlentities($nzbname, ENT_QUOTES, 'UTF-8');	
														
														$nzbname = substr($nzbname,0,38);
														
														$nzbcategory = $myscan[$i]['Category'];
														
														echo "
															<tr>
																<td style='padding-right: 4px; color: #B32D00; border-bottom: 1px solid #BBBBBB;'>{$nzbcategory}</td>
																<td style='color: #555555; border-bottom: 1px solid #BBBBBB;'>{$nzbname}</td>
															</tr>	
															";
													}
													echo "</table></div>";

											?>
										
										">
			
								</div>
					
							</td>							
							-->
							
							
					</table>
					

					
	</div>
	

			
	<div id="mainrss">   
	<!-- The Main Table that Renders ALL -->
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<?php
					//Detect whether we are using an iPad to browse
					// $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
					//do something with this information
					if($iPad){
						//iPad Detected
						echo "		<td width=\"100%\" valign=\"top\">
										<table width=\"99%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >
											<tr>
												<td valign=top>
													<div style=\"height:32px; \" ></div>
												</td>
											</tr>
											<tr>
												<td valign=top>
													<div id=\"bigdiv\" style=\"height:100%;\" >";
															include('sidebar4ipad.php');
						echo "						</div>
												</td>
											</tr>
										</table>
									</td>";		
					}
					else {
						// Not and iPad - rendering normal
						echo "		<td width=\"765\" valign=\"top\">
										<table width=\"750\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >
											<tr>
												<td valign=top>
													<div style=\"height:32px; \" ></div>
												</td>
											</tr>
											<tr>
												<td valign=top>
													<div id=\"bigdiv\" style=\"height:100%;\" >";
														include('sidebar4.php');
						echo "						</div>
												</td>
											</tr>
										</table>
									</td>	
									<td valign=\"top\">
										<div id=\"bigdiv\" style=\"height:100%; \" >
											<div id=\"rss2\" class=\"rss2\" style=\"background-color: #fff; \" >	
												<div id=\"bigdiv2\" >";
														include('nzbcompare2.php');
						echo "					</div>
											</div>
										</div>
									</td>	";
				}?> 			  
			  

			  </tr>
			</table>	
		
</div>

</body>
</html>


