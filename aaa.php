



<?php

require 'config.php';




$xml = wget('http://api.nzb.su/rss?t=2040&dl=1&i=127565&r=4921020f39adabf5785f76f769f3ffd3');

   if ($xml != "") {       

          echo "Not Empty!<br>"; 
      } else {
echo "Empty!<br>"; 
}




/*

$str = 'This is a test to remove nested [[s]q[u]a[r]e] brackets [[from [t[hi]s] source [string]!]]';
echo $str = preg_replace('#\[[^[\]]*(?:(?R)|.*?)+\]#', '', $str);
echo "<br><br>";

	echo "RUIZ<br><br>";
	$xml = simplexml_load_file($DogNzbRSS);	

   if ($xml != "") {       
      if (strlen($xml->asXML()) > 600) {
          echo "over 600!<br>"; 
      }
	  echo "not empty.<br>";
	  $count = strlen($xml->asXML());
	  echo  $count;
   }
*/	


?>