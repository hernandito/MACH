
<?php

echo "Snarf today<br>";
$teststring = "http://192.168.0.201:32400/status/sessions?X-Plex-Token=AxppRcgmqC6nfSQhisBp";


$string = '
<entry>
    <link href="http://192.168.0.201:32400/status/sessions?X-Plex-Token=AxppRcgmqC6nfSQhisBp" rel="alternate"/>
</entry>';

echo "<br>";
$simpleXML = simplexml_load_string($string);

echo $movies;
echo "<br>";

foreach($simpleXML->MediaContainer->Video as $category)
{
    echo $category['grandparentTitle'] . '<br />';
	    echo $category['parentThumb'] . '<br />';
		    echo $category['summary'] . '<br />';
			    echo $category['thumb'] . '<br />';
				
}

		
?>