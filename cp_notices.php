<?php

$mynoticeurl = "{$myCouchpotatoURLinternal}/api/{$myCouchpotatoAPI}/notification.list/?limit_offset=50,68";

$response = file_get_contents($mynoticeurl);
$result = json_decode($response, true);

$result=$result['notifications'];
$result2= array_reverse($result);

$totality = count($result2);

$divstyle = "style='border-bottom-width: thin; padding:2px; font-size: 9pt;	border-bottom-style: solid;	border-bottom-color: #4CA6FF; list-style-type: none;	line-height: 9pt; ' ";

for ($i = 0; $i <$totality; $i++) {

	$hrnotice = $result2[$i]['message'];

	$hrnotice =  str_replace('"',"'",$hrnotice) ;
	$hrnotice =  str_replace('.'," ",$hrnotice) ;	
	$hrnotice =  str_replace('Downloaded',"<b><font color= #384A92>Downloaded:</font></b>",$hrnotice) ;
	$hrnotice =  str_replace('Snatched',"<b><font color= #238C00>Snatched:</font></b>",$hrnotice) ;	
	$hrnotice =  str_replace('A new update with hash',"<b><font color= #B30000>A new update with hash:</font></b>",$hrnotice) ;	
	$hrnotice = htmlentities($hrnotice, ENT_QUOTES, 'UTF-8');
	
	$myline = "<li {$divstyle}>{$hrnotice}</li>";
	$mylist = $mylist.$myline;

}



?>
