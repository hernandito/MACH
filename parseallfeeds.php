
<?php
require 'config.php';

include('parseallfeedsnzbsdotorg.php');	
echo "Completed Nzbs.ORG<br>";	

include('parseallfeedsdog.php');	
echo "Completed DogNZB<br>";

include('parseallfeedsnzbtv.php');	
echo "Completed NZBtv<br>";	

include('parseallfeedsomg.php');	
echo "Completed OMG<br>";	

include('parseallfeedsnzbnerds.php');	
echo "Completed NZBNerds<br>";	

// Looks like site is DEAD!
include('parseallfeedsnzbndx.php');	
echo "Completed NZBNDX<br>";	


include('parseallfeedsoznzb.php');	
echo "Completed OZNzb\n";	

include('parseallfeedsnzbcat.php');	
echo "Completed NZBCat<br>";

include('parseallfeedsnzbfinder.php');	
echo "Completed NZBCat<br>";

?>