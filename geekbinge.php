
<script type="text/javascript" src="includes/javascript/jquery-1.7.0.min.js"></script>
<script src="includes/javascript/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="rss.css" />

<script type="text/javascript">
(function ($) {
  $.fn.FeedEk = function (opt) {
		var def = {
			FeedUrl: '',
			MaxCount: 5,
			ShowDesc: true,
			ShowPubDate: true
		};
		if (opt) {
			$.extend(def, opt)
		}
		var idd = $(this).attr('id');
		if (def.FeedUrl == null || def.FeedUrl == '') {
			$('#' + idd).empty();
			return
		}
		var pubdt;
		$('#' + idd).empty().append('<div style="text-align:left; padding:3px;"><img src="loader.gif" /></div>');
		$.ajax({
			url: 'http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=' + def.MaxCount + '&output=json&q=' + encodeURIComponent(def.FeedUrl) + '&callback=?',
			dataType: 'json',
			success: function (data) {
				$('#' + idd).empty();
				$.each(data.responseData.feed.entries, function (i, entry) {
					$('#' + idd).append('<div class="ItemTitle"><a href="' + entry.link + '" target="_blank" >' + entry.title + '</a></div>');
					if (def.ShowPubDate) {
						pubdt = new Date(entry.publishedDate);
						$('#' + idd).append('<div class="ItemDate">' + pubdt.toLocaleDateString() + '</div>')
					}
					if (def.ShowDesc) $('#' + idd).append('<div class="ItemContent">' + entry.content + '</div>')
				})
			}
		})
	}
})(jQuery);
</script> 

<script type="text/javascript" >
$(document).ready(function(){

   $('#divRss2X').FeedEk({
   FeedUrl : 'http://feeds.feedburner.com/geekbinge?v=1',
   MaxCount : 45,
   ShowDesc : true,
   ShowPubDate: true
  });
  
});

</script>
<style type="text/css">
#divRss2X {
	width: 98%;
	padding: 0px 3px 3px 5px;
	background-color: #FFF;
	border: 1px solid #D3CAD7;
	margin-top: 3px;
	margin-left: 12x;
	margin-right: 12px;
	line-height: normal;
	text-align: left;
}

.ItemTitle{
 font-weight:bold;
 margin:5px 0px 0px 0px;
 padding-top:3px;
}
.ItemTitle a{
	font-family: Calibri, Arial, Helvetica, sans-serif;
	color: #2B5E84;
	text-decoration: none;
	font-size: 24px;
	font-weight: bold;
}

.ItemTitle a:visited {
	color: #999999;
}

.ItemTitle a:hover {
	color: #C43F3C;
}
.ItemContent{
	padding: 1px 3px 3px 3px;
	border-bottom: 1px solid #D3CAD7;
	color: #666666;
	font-family: Calibri, Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: normal;
	font-weight: normal;
}

.ItemContent a{
	color: #2B5E84;
}

.ItemDate{
font-size:10px;
color:#AAA;
}
</style>



<?php


echo "
<a href=\"http://geekbinge.com/\" target=\"hrnew\"><img style=\" margin-left:0px; margin-top:2px; height:50px; margin-bottom:0px;\" src=\"includes/images/geekbinge.jpg\"></a>

<div id=\"divRss2X\" ></div>";

?>
