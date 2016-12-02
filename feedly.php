<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<script language="JavaScript">
<!--
function resize_iframe()
{

	var height=window.innerWidth;//Firefox
	if (document.body.clientHeight)
	{
		height=document.body.clientHeight;//IE
	}
	//resize the iframe according to the size of the
	//window (all these should be on the same line)
	document.getElementById("glu").style.height=parseInt(height-document.getElementById("glu").offsetTop-18)+"px";
}

// this will resize the iframe every
// time you change the size of the window.
window.onresize=resize_iframe; 

//Instead of using this you can use: 
//	<BODY onresize="resize_iframe()">


//-->
</script>

<script>
$(window).load(function(){
  $('#feedmask').fadeIn(2500);
});
</script>


<style>


html,body {
    height:100%;
    overflow-y:hidden;

}
</style>

<div id="feedmask" style= "background-color: #FDFDFF;
	margin:20px:
	float: left;
	left: 274px;
	height: 95%;
	width: 66px;
	display: none;
	position: absolute;
	z-index: 99000; ">
	&nbsp;
</div>  
	

	
<div style="background-color: #fff; margin-left: 5px; margin-top: 2px; width: 98%; height:100%;  position:relative;"  id="rss" class="rss"  >

	
<iframe scrolling="yes" id="glu" frameborder="no" align="center" height="100%" width="100%"
   name="feedlyWidget" marginwidth="0" marginheight="0"
   src="http://feedly.com/index.html#category%2FMovie%20News" 
   noborder="true" onload="resize_iframe()">
   

	
</div>

