<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="rss.css" />


<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />



<script type="text/javascript">
function nytCombo(){
	$("#NNYTimesContainer").load("blank.php");
	$("#NNYTimesContainer").load("nytimescombo2.php");
}
</script>		

<script type="text/javascript">
function nytHard(){
	$("#NNYTimesContainer").load("blank.php");
	$("#NNYTimesContainer").load("nytimeshard2.php");
}
</script>	

<script type="text/javascript">
function nytPaper(){
	$("#NNYTimesContainer").load("blank.php");
	$("#NNYTimesContainer").load("nytimespaper2.php");
}
</script>	




<center>
<img src="includes/images/nytlogo.png" height=50 border=0 style=" margin-bottom: -8px; opacity: .8; ">
</center>
<hr>
<div style="display: inline-block; margin-bottom:8px; ">

	<div class="newsbuttonmenu" ><a href="Javascript:nytCombo()">Bestsellers Print & E-Book</a></div>
	
	<div class="newsbuttonmenu" ><a href="Javascript:nytHard()">Hardcover</a></div>	
	<div class="newsbuttonmenu" ><a href="Javascript:nytPaper()">Paperback</a></div>	


	
</div>	
	

<div id="NNYTimesContainer" >
	<?php	
		include('nytimescombo2.php'); 
		
		
		
		
	?>
</div>

<a href="#" class="scrollup">Scroll</a>


