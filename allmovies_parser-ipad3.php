


<?php

echo "
		<table  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
				<tr>
					<td>";
						
						foreach (range('A', 'Z') as $i) {
							echo "
							<a class='classpanel' href=\"#\" id='filterit{$i}' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 0px; padding-left: 2px; padding-right: 9px; padding-top: 1px; padding-bottom: 15px; color: #BEBEBE; -webkit-border-radius: 4px; border-radius: 4px;' >{$i}</a>";
						}			
echo "						
						<a class='classpanel' href=\"#\" id='filteritALL' style='font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; font-weight: bold; margin: 0px; padding-left: 2px; padding-right: 14px; padding-top: 1px; padding-bottom: 15px; color: #BEBEBE; -webkit-border-radius: 4px; border-radius: 4px;' >All</a>
					</td>
				</tr>
		</table>
<font color=#BF0005><b>Movie Collection</font></b><br>
		<div style=\" -moz-column-count: 4;
			-moz-column-gap: 6px;
			-webkit-column-count: 4;
			-webkit-column-gap: 6px;
			column-count: 4;
			column-gap: 6px; 
			
			width: 96%;
			margin-top: 1px;
			border-right-style: solid;
			border-right-width: 1px;
			border-right-color: #C1E0FF; \"	
			
			id=\"filteredmovies\">
";
/*  REMOVE THIS TO LOAD ALL MOVIES AT LOAD TIME
include('allmovies_parseit.php'); 
*/
	

echo  "</div >
<a href=\"#\" class=\"scrollup\">Scroll</a>

";

?>


