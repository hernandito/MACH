
<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />
<!--
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-rotate.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/jquery-ui-tabs-hover.js"></script>
<script type="text/javascript" charset="utf-8" src="includes/javascript/custom.js"></script>
-->

<?php

require 'config.php';
require 'choice.txt';
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
function tab1refresh(){
 document.getElementById("recents").innerHTML='';
 document.getElementById("recents2").innerHTML='';
 document.getElementById("sblight").innerHTML='';
$("#recents").load("xbmc_parser-ipad2.php");
$("#recents2").load("xbmc_parse_albums-ipad.php");
$("#sblight").load("sb_parser_light-ipad.php");
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
			

<script>
$(document).ready(function(){
  $("#loadmysicklist").click(function(){
    $("#mysicklist").load("parse_mytvshows.php");
  });
});
</script>		



<?php		

/*  Code for this is on index2.php at the top of the page.  */
echo $sbparseresults;

$sbparseresults = "";
$snatchtotal = "";

?>
