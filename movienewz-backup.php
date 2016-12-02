<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="rss.css" />


<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<?php

require 'config.php';
require 'choice.txt';
?>


<script type="text/javascript">
function newsFSRejects(){
	$("#NewsContainer").load("blank.php");
	$("#NewsContainer").load("rejects2.php");
}
</script>		

<script type="text/javascript">
function newsCinemaBlend(){
	$("#NewsContainer").load("blank.php");
	$("#NewsContainer").load("cinemablend.php");
}
</script>	

<script type="text/javascript">
function newsScreenRant(){
	$("#NewsContainer").load("blank.php");
	$("#NewsContainer").load("screenrant.php");
}
</script>	



<script type="text/javascript">
function newsGeekBinge(){
	$("#NewsContainer").load("blank.php");
	$("#NewsContainer").load("geekbinge.php");
}
</script>	


<script type="text/javascript">
function newsTasteofCinema(){
	$("#NewsContainer").load("blank.php");
	$("#NewsContainer").load("tasteofcinema.php");
}
</script>	

<script type="text/javascript">
function newsFirstShowing(){
	$("#NewsContainer").load("blank.php");
	$("#NewsContainer").load("firstshowing.php");
}
</script>	


<?php


echo "
<div style=\"display: inline-block; margin-bottom:3px; \">

	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:newsFSRejects()\">Film School Rejects</a></div>
	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:newsCinemaBlend()\">Cinema Blend</a></div>
	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:newsTasteofCinema()\">Taste of Cinema</a></div>	
	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:newsFirstShowing()\">First Showing</a></div>	
	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:newsScreenRant()\">Screen Rant</a></div>
	<div class=\"newsbuttonmenu\" ><a href=\"Javascript:newsGeekBinge()\">Geek Binge</a></div>	

	
	</div>	
	

<div id=\"NewsContainer\" >";
	include('rejects2.php');
echo "</div>

<a href=\"#\" class=\"scrollup\">Scroll</a>
";

?>