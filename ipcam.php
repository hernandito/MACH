
<meta name="googlebot" content="noindex" />
<meta name="robots" content="noindex" />
<link rel="shortcut icon" href="ipcam.ico" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript">

// setTimeout(ClearAll, 10000) 60000 milliseconds = one minute

var auto_refresh = setInterval(
function ()
{
$('#CamContainer').load('blank-nogif.php?_=' +Math.random()).fadeIn("slow");
}, 600000); // refresh every 10000 milliseconds



function myruTorrents(){
	$("#CamContainer").load("blank.php");
	$("#CamContainer").load("ipcama.php");
 
}

function myruTorrents2(){
	
	$("#CamContainer").load("ipcamb.php");
 
}


function LoadAll(){
	$("#CamContainer").load("ipcamall.php");
}
function ClearAll(){
	$("#CamContainer").load("blank-nogif.php");
}

function LoadNVR(){
		$("#CamContainer").html('<object style="width:1280; height: 728;" data="http://192.168.0.111/dlink/live.html?1.0.48r6" />');
}

</script>	

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,600,700' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="includes/css/colorbox.css" />
<script src="includes/javascript/jquery.colorbox.js"></script>




<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">

</head> 

<style>

.myButton {

display: inline;
	background-color:#ffffff;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;

}
.myButton:hover {

	background-color:#ffc926;
	color:#111111;
}
.myButton:active {
	position:relative;
	top:1px;
}


</style>

<body topmargin="20" style="background-image: url('includes/images/grey_wash_wall.png');" onload="LoadAll()">

<div style="width:1320px; margin:0 auto; margin-bottom: 8px;">
<a style="margin-right:10px;" href="#" class="myButton" onClick="LoadAll()" >All</a>
<a href="#" class="myButton" onClick="myruTorrents()" >Kitchen</a>
<a href="#" class="myButton" onClick="myruTorrents2()" >Living Rooom</a>
<a style="margin-left:10px;" href="#" class="myButton" onClick="ClearAll()" >Clear</a>



</div>


<!-- --><div id="CamContainer" style="width:1314px; margin:0 auto;">
		
				
	<div style=" 	font-family: sans-serif;
					background-color: #C8C8C8;
					font-size: 10px;
					color: #B9B9B9;
					padding-top: 17px; 
					padding-bottom: 17px; 
					padding-left: 17px; 
					padding-right: 17px; 
					-webkit-border-radius: 3px;
					border-radius: 3px;
-webkit-box-shadow: 1px 1px 4px 4px #474747;
box-shadow: 1px 1px 4px 4px #474747;; >

			
	</div>
	
</div>
			


</body>
</html>


