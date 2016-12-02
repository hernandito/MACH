<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="rss.css" />






<link rel="stylesheet" type="text/css" href="tooltip.css" />
<link rel="stylesheet" type="text/css" href="rss.css" />

<?php

require 'config.php';
require 'choice.txt';
?>

<?php


echo "

<iframe id='ifm' width=100% height=1280 style=\"margin: 0px; border: thin none #CCC;\"  src=\"http://{$myNZBMegaSearURL}\"></iframe>


";

?>



<script type="text/javascript">
var buffer = 20; //scroll bar buffer
var iframe = document.getElementById('ifm');

function pageY(elem) {
    return elem.offsetParent ? (elem.offsetTop + pageY(elem.offsetParent)) : elem.offsetTop;
}

function resizeIframe() {
    var height = document.documentElement.clientHeight;
    height -= pageY(document.getElementById('ifm'))+ buffer ;
    height = (height < 0) ? 0 : height;
    document.getElementById('ifm').style.height = height + 'px';
}

// .onload doesn't work with IE8 and older.
if (iframe.attachEvent) {
    iframe.attachEvent("onload", resizeIframe);
} else {
    iframe.onload=resizeIframe;
}

window.onresize = resizeIframe;

</script>