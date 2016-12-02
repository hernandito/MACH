


<?php


$myFile = "choicerefresh.txt";
$fh = fopen($myFile, 'w');

$stringData = "<?php\n\n\$choicerefreshme = \"yes\";\n\n?>";
fwrite($fh, $stringData);

fclose($fh);

echo "Refresh Enabled";
?>
