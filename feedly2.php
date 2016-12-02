<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Iframe with 100% height - atguy.com</TITLE>
<META NAME="Author" CONTENT="Guy Malachi">
<META NAME="Keywords" CONTENT="100% iframe resize javascript one hundred percent ">
<META NAME="Description" CONTENT="">
<script language="JavaScript">
<!--

function resize_iframe()
{
	

	var height=window.innerWidth;//Firefox
	if (document.body.clientHeight)
	{
		height=document.body.clientHeight;//IE
	}

	document.getElementById("glu").style.height=parseInt(height-document.getElementById("glu").offsetTop-18)+"px";//resize the iframe according to the size of the window
	//document.getElementById("glu").height=document.body.offsetHeight-document.getElementById("glu").offsetTop-26;
}

/*
	//Here is another way to define the function (this function reloads the page whenever the user resizes the page)
	window.onresize=
	function (e) 
	{
		location.reload();
	};
*/

window.onresize=resize_iframe; //instead of using this you can use: <BODY onresize="resize_iframe()">
//-->
</script>

</HEAD>

<BODY>
<iframe id='glu' frameborder="no" width=99% onload='resize_iframe()' src="http://feedly.com/index.html#latest" noborder="true"></iframe>
</BODY>
</HTML>
