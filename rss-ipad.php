

<?php


require 'includes/required/errorreporting.php';
require 'includes/required/defaults.php';
require 'includes/required/header.php';
require 'config.php';
require 'choice.txt';
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">


<head>



<link rel="stylesheet" href="jquery2.css" type="text/css" />


<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>

<meta http-equiv="refresh" content="1800">

<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<!--
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-rotate.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-hover.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/custom.js"></script>
-->


<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>



<script type="text/javascript" src="jquery.tooltipster.js"></script>

<script>
	$(document).ready(function() {


		$('.tooltip').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: true,
		interactiveTolerance: 15,
		
		});

		$('.tooltip2').tooltipster({
		arrow: true,
		animation: 'grow',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		interactive: true,
		});	



		
	$("#tabs").tabs();
    $("#tabs").css("display", "block");
			
});			
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
  $("#cleanvideo").click(function(){
    $("#div1").load("clean_video.php");
  });
});
</script>

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
    $("#div1").load("reboot_bed.php");
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
$("#ruizdiv").load("parse_ruiz.php");
 
}
</script>

<script type="text/javascript">
function rottenTomatoes(){
$("#bigdiv").load("blank.php");
$("#bigdiv").load("rt_main.php");
 
}
</script>



<script type="text/javascript">
function nzbReleases(){
$("#bigdiv").load("blank.php");
$("#bigdiv").load("nzbcompare.php");
 
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


<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>
</head> 

<!-- -->
<script>
$(window).load(function(){
  $('#dvLoading').fadeOut(1000);
});
</script>



<body topmargin="0" >
<!-- -->	<div id="dvLoading" style="   background:#EAEAEA url(includes/images/loading5.gif) no-repeat center center;
						-webkit-box-shadow: 1px 1px 9px 1px #2B2B2B;
						box-shadow: 1px 1px 9px 1px #2B2B2B;
						-webkit-border-radius: 15px;
						border-radius: 15px; 			
						height: 100px;
						width: 80px;
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
						border: 2px solid #666;
						margin: -25px 0 0 -25px;" >loading
	</div>

<div id="mainrss">   
<!-- The Main Table that Renders ALL -->

<table width="100%" border="0" cellspacing="0" cellpadding="0" >


	<tr>
		<td valign=top>
			<div style="height:40px; " >
			
			
<div id="navios" class="navios">


<ul>

<li>
<a href="ipad.php" >My Media</a>
</li>

<li>
	<a class='ajax2' href=\"{$myRutorrentURL}\"  target=\"myiframe\">hello 3</a>
</li>

<li>
	<a class='ajax2' href=\"{$myRutorrentURL}\"  target=\"myiframe\">hello 4</a>
</li>



</ul>

</div>	
			
			

			</div>
		</td>
	</tr>


	<tr>
		<td valign=top>
			<div id="bigdiv" style="height:100%;" >
				<!-- The Table that Renders All The NZB Locations -->	
				<?php
				if ($choice == "deffeedly") {
					include('feedly.php');
				} elseif ($choice == "rotten") {
					include('rt_main.php');
				} else {
					include('nzbcompare.php');
				}
					
				?>
			</div>
		</td>
	</tr>
	
	
</table>

</div>




</body>
</html>


