


<?php


$myFile = "choicepanel.txt";
$fh = fopen($myFile, 'w');

$stringData = "<?php\n\n\$choicepanel = \"enabled\";\n\n?>";
fwrite($fh, $stringData);

fclose($fh);

echo "Right Auto Panel Enabled";
?>
