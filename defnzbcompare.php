


<?php


$myFile = "choice.txt";
$fh = fopen($myFile, 'w');

$stringData = "<?php\n\n\$choice = \"nzbcompare\";\n\n?>";
fwrite($fh, $stringData);

fclose($fh);
echo "Set to NZB Releases";
?>
