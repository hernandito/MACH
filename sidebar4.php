
<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<!--
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-rotate.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-hover.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/custom.js"></script>

updatePhp

-->

<?php

require 'config.php';
require 'choice.txt';
require 'choicepanel.txt';
require 'choicerefresh.txt';
?>

<link rel="stylesheet" href="jquery2.css" type="text/css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>


<script type="text/javascript" src="jquery.tooltipster.js"></script>

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
		
		});

		$('.tooltip2').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: false,

		});	



		
	$("#tabs").tabs();
    $("#tabs").css("display", "block");

	
});			
</script> 

<script type="text/javascript">
function tab1refresh2x(){
 document.getElementById("recents").innerHTML='';
 document.getElementById("recents2").innerHTML='';
 document.getElementById("sblight").innerHTML='';
$("#recents").load("xbmc_parser2.php");
$("#recents2").load("xbmc_parse_albums2.php");
$("#sblight").load("sb_parser_light2.php");


}
</script>




<script>
  $(document).ready(function () {
      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
              $('.scrollup').fadeIn();
          } else {
              $('.scrollup').fadeOut();
          }
      });
      $('.scrollup').click(function () {
          $("html, body").animate({
              scrollTop: 0
          }, 600);
          return false;
      });
  });
</script>

<script>
$(document).ready(function(){
  $("#changetodelete").click(function(){
    $("#queueresult").load("parse_sabqueue2.php");
  });
});
</script>
			
<script type="text/javascript">
function rottenTomatoes(){
$("#bigdiv2").load("blank.php");
$("#bigdiv2").load("rt_main.php");
 
}
</script>

<script type="text/javascript">
function nzbReleases(){
$("#bigdiv2").load("blank.php");
$("#bigdiv2").load("nzbcompare2.php");
 
}
</script>		

<script type="text/javascript">
function myMovieNews(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("movienewz.php");
 
}
</script>	


<script type="text/javascript">
function myTrending(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("parse_trakt.php");
 
}
</script>	


<script type="text/javascript">
function newsLiveTVHome(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("iframelivetv.php");
}
</script>	

<script type="text/javascript">
function mynzbmegasearch(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("iframenzbmegasearch.php");
 
}
</script>	

<script type="text/javascript">
function myircsearch(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("iframeircsearch.php");
 
}
</script>	

<script type="text/javascript">
function myNYTimes(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("newyorktimes.php");
 
}
</script>	

<script type="text/javascript">
function myTorrentClients(){
	$("#bigdiv2").load("blank.php");
	$("#bigdiv2").load("torrentclients.php");
 
}
</script>	

	
<script type="text/javascript">
function mysubsonic(){
	$("#SubsonicContainer").load("blank.php");
	$("#SubsonicContainer").load("iframesubsonic.php");
 
}
</script>	


<script type="text/javascript">
function myplex(){
	$("#SubsonicContainer").load("blank.php");
	$("#SubsonicContainer").load("iframeplex.php");
 
}
</script>	

<script type="text/javascript">
function mymadsonic(){
	$("#SubsonicContainer").load("blank.php");
	$("#SubsonicContainer").load("iframemadsonic.php");
 
}
</script>	


<script type="text/javascript">
function myCalibre(){
	$("#CalibreContainer").load("blank.php");
	$("#CalibreContainer").load("iframecalibre.php");
 
}
</script>	


<script type="text/javascript">
function mylatestalbumsc(){
	$("#LatestAlbumsContainer").load("blank.php");
	$("#LatestAlbumsContainer").load("xbmc_parse_albumsfull2.php");
 
}
</script>	

	
<script type="text/javascript">
function mytrailers(){
	$("#TrailerContainer").load("blank.php");
	$("#TrailerContainer").load("parse_hdtrailers2.php");
 
}
</script>	


<script type="text/javascript">
function mybookmarks(){
	$("#Bookiemarkies").load("blank.php");
	$("#Bookiemarkies").load("bookmarks2.php");
 
}
</script>	

<script type="text/javascript">
function myruTorrents(){
	$("#TorrentContainer").load("blank.php");
	$("#TorrentContainer").load("ipcam2.php");
 
}
</script>	

<script type="text/javascript">
function myrtansmissionTorrents(){
	$("#TorrentContainer").load("blank.php");

 
}
</script>	


<script type="text/javascript">
function mySeedbox(){
	$("#TorrentContainer").load("blank.php");
	$("#TorrentContainer").load("iframeseedbox.php");
 
}
</script>	



<!--	
<script type="text/javascript">
function myrtansmissionTorrents(){
	$("#MyTorrentsContainer").load("blank.php");
	$("#MyTorrentsContainer").load("iframetransmission.php");
 
}
</script>	
-->
	
<table width="100%" border="0" cellspacing="3" cellpadding="0" >

	<tr valign="top">      

		<td >
		
			<div id="tabs" style="width: 100%; 	-webkit-box-shadow: 2px 2px 8px 3px rgba(0, 0, 0, .3); box-shadow: 2px 2px 8px 3px rgba(0, 0, 0, .3); display: none;">
				<div style="margin-bottom:4px; ">
					<div class="buttonmenu2" ><a href="#" onClick="rottenTomatoes()">R.Tomato</a></div>
					<div class="buttonmenu2" ><a href="Javascript:myTrending()" >Trend</a></div>		
					<div class="buttonmenu2" ><a href="Javascript:nzbReleases()" style="background-color: #9B2424; color: #FFE599; padding-left: 9px; padding-right: 9px; ">NZBs</a></div>	
					<div class="buttonmenu2" ><a href="Javascript:myMovieNews()" >News</a></div>	

	<?php	
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		//echo "the ip: {$ip}";
		
	//	if ($ip == "192.168.0.1") { 		
			echo "<div class=\"buttonmenu2\" ><a href=\"Javascript:newsLiveTVHome()\">TV</a></div>";
	//	} 
	 ?>							
					
					
					<div class="buttonmenu2" ><a href="Javascript:mynzbmegasearch()" style="font-weight: bold;" >?</a></div>		
					<div class="buttonmenu2" ><a href="Javascript:myircsearch()" style="font-weight: bold;" >irc</a></div>
		
					<!--
					<div class="buttonmenu2" ><a href="Javascript:myTorrentClients()" >Torrents</a></div>	
					-->

					<!--
					<div class="buttonmenu2" ><a href="Javascript:mysubsonic()" >rtv</a></div>	
					-->
					
					<div  id="updateDivIpad" class="updateDivIpad buttonmenu2" style=" position:absolute; margin-right: 5px; margin-top:6px;  text-align: right;"></div>
				</div>

				<ul >
						<li><a href="#tabs-1"><img src="includes/images/midstar.png" width="29" height="29" title="Latest" style="margin-left:6px; margin-right:6px; "></a></li>
						<li><a href="#tabs-2"><img src="includes/images/midreel.png" width="29" height="29" title="Movie Colletion" style="margin-left:6px; margin-right:6px; "></a></li>
						<!--
						<li><a href="#tabs-9"><img src="includes/images/midnzbget.png" width="29" height="29" title="SabNZBD" style="margin-left:6px; margin-right:6px; "></a></li>
						-->
						<li><a href="#tabs-3"><img src="includes/images/midsick.png" width="29" height="29" title="Sickbeard Shows" style="margin-left:6px; margin-right:6px; "></a></li>
						<li><a href="#tabs-4"><img src="includes/images/midcouch.png" width="29" height="29" title="Couchpotato" style="margin-left:6px; margin-right:6px; "></a></li>
						<li><a href="#tabs-5"><img src="includes/images/midxbmc.png" width="29" height="29" title="XBMC" style="margin-left:6px; margin-right:6px; "></a></li>	
						<li><a href="#tabs-6"><img src="includes/images/trailers29.png" width="29" height="29" title="Trailers" style="margin-left:1px; margin-right:1px; "></a></li>
						<li><a href="#tabs-14"><img src="includes/images/midcd.png" width="29" height="29" title="Latest CDs" style="margin-left:1px; margin-right:1px; "></a></li>
						<li><a href="#tabs-7"><img src="includes/images/midplex.png" width="29" height="29" title="Plex" style="margin-left:1px; margin-right:1px; "></a></li>
						<li><a href="#tabs-10"><img src="includes/images/shortcut.png" width="29" height="29" title="Shortcuts" style="margin-left:1px; margin-right:1px; "></a></li>
						<li><a href="#tabs-11"><img src="includes/images/book.png" width="29" height="29" title="eBooks" style="margin-left:1px; margin-right:1px; "></a></li>					
						<li><a href="#tabs-13"><img src="includes/images/midipcam.png" width="29" height="29" title="Torrent Clients" style="margin-left:1px; margin-right:1px; "></a></li>								
						<li style="margin-left:4px; background-color: #FFFBE1; "><a href="#tabs-12"><img src="includes/images/bookmarks29.png" width="29" height="29" title="Bookmarks" style="margin-left:8px; margin-right:8px; "></a></li>
				
				</ul>

			<div id="rss" class="rss" style="background-color: #fff;  " >				

						<div id="tabs-1" style="padding:0px; padding-left:0px; margin:0px; text-decoration: none; background: black; font-family: Arial, Helvetica, sans-serif; font-size: 11px; 	color: #737373; font-weight: normal; " >


								<!--  XBMC Recents and Upcoming TV  -->
								<a  href="#" title="Refresh" onClick="tab1refresh2x()" style="font-size: 9px; margin-top: 5px; margin-right:6px;padding-top: 0px;padding-right: 5px;padding-bottom: 0px;padding-left: 5px; position: absolute; right: 12px; "><img src="includes/images/refresh.png"></a>

								<div style=" font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; color: #FC0; text-decoration: none; margin-left: 7px; margin-bottom:3px; padding-top:2px;">
								Recent Movies:							
								</div>					

								<div id="recents" style="margin-left: 5px; margin-right: 10px; ">
									<?php include('xbmc_parser2.php');  ?> 
								</div>

								<div id="sblight" style="margin-left: 5px; margin-right: 10px; ">
									<?php include('sb_parser_light2.php'); ?> 
								</div>					

								<div id="recents2" style="margin-left: 5px; margin-right: 10px; ">
									<?php include('xbmc_parse_albums2.php');  ?> 
									

								</div>

			
								
						</div>

						
						
						<div id="tabs-2" style="padding:3px; padding-left:0px; margin:0px; text-decoration: none;	font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #737373; font-weight: normal;">
								<!--  Movie Collection-->
								<?php include('allmovies_parser-ipad3.php'); ?>
						</div>
						
						
						
						<div id="tabs-3" class="rss" style="margin=0; padding=4px; margin=0px ;line-height:13px;"> 
								<!--  Sickbeard  -->
								<a class='classpanel' target="hrnew" href="
								
								<?php echo $mySickbeardURL; ?>
								
								" style='font-family: Verdana, Geneva, sans-serif; font-size: 11px; font-style: normal;  font-weight: bold; padding-bottom: 6px;  padding-top: 3px; padding-right: 6px;  padding-left: 6px; color: #999999; -webkit-border-radius: 4px; border-radius: 4px;' > Post Process </a> <br>	
								
								<div  name="mysicklist" id="mysicklist" style="-moz-column-count: 3;
												-moz-column-gap: 12px;
												-webkit-column-count: 3;
												-webkit-column-gap: 12px;
												column-count: 3; ">
									<?php include('parse_mytvshows.php'); ?>
								</div >
						</div>
						

						<div id="tabs-4" style="padding:3px; padding-left:0px; margin:0px; text-decoration: none;	font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #737373; font-weight: normal; ">
								<!--  Couchpotato Wanted  -->
								<?php
									include('cp_searcher-ipad.php');
									include('cp_parser-ipad.php');
								?>
								
						<!-- 		<a href="#" class='classpanel3' style='font-size: 9px;'id='listprofile'>Profile IDs</a>  -->
								<div style="font-size: 10px;color:#535362;margin-left:0px;" id="divprofile"></div>
						</div>
						
						
						
						<div id="tabs-5" style="padding:0px; padding-left:0px; margin:0px; text-decoration: none; background: #333333; font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #737373; font-weight: normal; " >
								<!--  XBMC Control Panel  -->
								<?php include('xbmc-ipad.php'); ?>
						</div>	

						
						
						<div id="tabs-6" style="padding:3px; padding-left:0px; margin:0px; text-decoration: none;	font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #737373; font-weight: normal; ">
								<!--  HD Trailers  -->
						
							<div class="buttonmenu2" ><a href="#" onClick="mytrailers()" style="border: thin solid #CCC;" >Load Trailers</a></div><br><br>
							<div style="color:#B30000; margin-left: 5px;"><b>HD-Trailers</b></div>
							<div id="TrailerContainer" ></div>

						</div>


						
						<div id="tabs-7" style="padding:0px; padding-left:0px; margin:0px; text-decoration: none; background: white; font-family: Arial, Helvetica, sans-serif; font-size: 11px; 	color: #737373; font-weight: normal; " >
								<!--  The Subsonic Frame  -->						
								<div class="buttonmenu2" ><a href="#" onClick="myplex()" style="border: thin solid #CCC;" >Load Plex</a></div>
								<div class="buttonmenu2" ><a href="#" onClick="mymadsonic()" style="border: thin solid #CCC;" >Load Madsonic</a></div>
								<div id="SubsonicContainer" style=" height: 890px; "></div>
								<br>
						</div>						

						<div id="tabs-10" style="padding:3px; padding-left:0px; margin:0px; text-decoration: none;	font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #737373; font-weight: normal;">
								<!--  The Shortcuts  -->
								<div id="ShortcutsContainer" >
										<?php include('shortcuts.php'); ?>
								</div>
						</div>			

						<div id="tabs-11" style="padding:0px; padding-left:0px; margin:0px; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #737373; font-weight: normal; " >

								<div class="buttonmenu2" ><a href="#" onClick="myCalibre()" style="border: thin solid #CCC;" >Load Calibre</a></div>						
								<div class="buttonmenu2" ><a href="Javascript:myNYTimes()" style="border: 1px solid #CCCCCC; padding-left: 8px; padding-right: 8px;" >New York Times</a></div>

								<div id="CalibreContainer" style=" height: 930px; "></div>

						</div>	

						<div id="tabs-12" style="padding:0px; padding-left:0px; margin:0px; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 11px;	color: #737373; font-weight: normal; " >
								<div class="buttonmenu2" ><a href="#" onClick="mybookmarks()" style="border: thin solid #CCC;" >reload</a></div><br><br>
								<div id="Bookiemarkies">
								<?php include('bookmarks2.php'); ?>
								</div>
						</div>	
						
						<div id="tabs-13" style="padding:0px; padding-left:0px; margin:0px; text-decoration: none; background: white; font-family: Arial, Helvetica, sans-serif; font-size: 11px; 	color: #737373; font-weight: normal; " >
								<!--  The Torrents Frame  -->						
								<div class="buttonmenu2" ><a href="#" onClick="myruTorrents()" style="border: thin solid #CCC;" title="ruTorrent in Ubuntu Server">Webcams</a></div>
								<div class="buttonmenu2" style="margin-right: 30px;"><a href="#" onClick="myrtansmissionTorrents()" style="border: thin solid #CCC; " title="Transmission in unRAID Server">Clear</a></div>
								<div class="buttonmenu2" ><a href="http://192.168.0.201:81/portal/ipcam.php" target=_new style="border: thin solid #CCC;" title="Open Cameras in Own Tab">Open in New Tab</a></div>
								
								
								<!-- <div class="buttonmenu2" ><a href="#" onClick="mySeedbox()" style="border: thin solid #CCC;" title="My Seedbox from Seed.st">Seedbox</a></div>  -->	
								<div id="TorrentContainer" style=" height: 1200px; "></div>
								<br>
						</div>	
						

						<div id="tabs-14" style="padding-left:3px; padding-right: 8px; margin:0px; text-decoration: none; font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #737373; font-weight: normal; ">
							<!--  HD Trailers  -->
							<div class="buttonmenu2" ><a href="#" onClick="mylatestalbumsc()" style="border: thin solid #CCC;" >Load Latest Albums</a></div><br><br>
							<div id="LatestAlbumsContainer" ></div>
						</div>
						
						
		</td>	
	</tr>
</table>
