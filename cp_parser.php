

<SCRIPT LANGUAGE="JavaScript">
    function changeContent()
    {
        document.getElementById("mymovieDiv").innerHTML='<b>New Content</b>';  
    }
</SCRIPT>

<SCRIPT LANGUAGE="JavaScript">
    function changeContent2()
    {
        $("#mywanteddiv").load("cp_parsewanted.php");  
    }
</SCRIPT>

<link rel="stylesheet" type="text/css" href="tooltip.css" />


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

<script type="text/javascript">
function cpSearch(){
$("#cpsearchdiv").load("cpsearch.php",$("#yourFormId").serialize());
}
</script>

<script type="text/javascript">
function cpClear(){
 document.getElementById('moviename').value = "";
 document.getElementById("cpsearchdiv").innerHTML='';
 $("#mywanteddiv").load("cp_parsewanted.php");
}
</script>


<div id="mywanteddiv">

		<?php
		include('cp_parsewanted.php');

		?>	

</div>

<!--
	<br>
	
	
  <div id="mymovieDiv">
    Old Content	   
	
  </div>
  <a href="#" onclick="changeContent2()">Change Div Content</a>
  
  -->
  
  
  