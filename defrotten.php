


<?php


$myFile = "choice.txt";
$fh = fopen($myFile, 'w');

$stringData = "<?php\n\n\$choice = \"rotten\";\n\n?>";
fwrite($fh, $stringData);

fclose($fh);
echo "Set to Rotten Tomatoes";
?>
