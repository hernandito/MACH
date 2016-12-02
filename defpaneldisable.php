


<?php


$myFile = "choicepanel.txt";
$fh = fopen($myFile, 'w');

$stringData = "<?php\n\n\$choicepanel = \"disabled\";\n\n?>";
fwrite($fh, $stringData);

fclose($fh);

echo "Right Auto Panel Disabled";
?>
