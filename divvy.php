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




<style>


html,body {
    height:100%;
    overflow-y:hidden;

}
</style>


	

	
<div style="background-color: #fff; margin-left: 5px; margin-top: 2px; width: 98%; height:100%;  position:relative;"  id="rss" class="rss"  >

	
<iframe scrolling="yes" id="glu" frameborder="no" align="center" height="100%" width="100%"
   name="feedlyWidget" marginwidth="0" marginheight="0"
   src="http://nzbs.org/browse?t=2040" 
   noborder="true" onload="resize_iframe()">
   

	
</div>

