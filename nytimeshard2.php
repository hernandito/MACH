<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="includes/javascript/ddajaxsidepanel.js"></script>

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"51%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>

<script type="text/javascript" src="jquery.tooltipster.js"></script>
<script>
    $(document).ready(function() {

		$('.tooltipx').tooltipster({
		arrow: true,
		animation: 'fade',
		speed: 200,
		delay: 50,
		contentAsHTML: true,
		position: 'top',
		interactive: true,
		interactiveTolerance: 25,
		functionReady: function(origin, tooltip) {$(".iframe").colorbox({iframe:true, width:"99%", height:"80%"});$(".iframe2").colorbox({iframe:true, width:"85%", height:"95%"});},
		});

});			
</script> 


<?php
require 'config.php';
require 'functions.php';
?>


<SCRIPT LANGUAGE="JavaScript">
    function getTrailers(movieid)
    {
		$("#mytrailers").innerHTML="Please wait....";
        $("#mytrailers").load("trailersearch.php",$("#" + movieid).serialize()); 
 
	
		
    }
</SCRIPT>



<style type="text/css">
form { display: inline;
padding: 0px;
margin: 0px;
 }
</style>



<?php		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		//   Hardcover Fiction
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		$mydbTable = "bookshardfict";
		$myCategoryTitle = "Bestsellers Hardcover Fiction";
		$myDIVID = "nythardfict";

		parseNYTBooks($mydbTable, $myCategoryTitle, $myDIVID);

		$mydbTable = "";
		$myCategoryTitle = "";
		$myDIVID = "";
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
?>
		

<?php		
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		//   Bestsellers Hardcover Non-Fiction 
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		$mydbTable = "bookshardnon";
		$myCategoryTitle = "Bestsellers Hardcover Non-Fiction";
		$myDIVID = "nythardnon";

		parseNYTBooks($mydbTable, $myCategoryTitle, $myDIVID);

		$mydbTable = "";
		$myCategoryTitle = "";
		$myDIVID = "";
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
?>	
<?php
$mydbTable2 = "bookshardnon";
		NYTBooksTimestamp($mydbTable2);
$mydbTable2 = "";
?>
	
	
	

