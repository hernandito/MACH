


<?php


$myFile = "choice.txt";
$fh = fopen($myFile, 'w');

$stringData = "<?php\n\n\$choice = \"deffeedly\";\n\n?>";
fwrite($fh, $stringData);

fclose($fh);

echo "Set to Feedly";
?>
