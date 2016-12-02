<?php
				
				
				// Checking for Missing Episodes
				$feedmissed = "http://ruiz.sytes.net:8081//api/757ff4b9adaefacf24b2df5d495cce5f/?cmd=future&sort=date&type=missed";
				$sbJSON = json_decode(file_get_contents($feedmissed));

				$i = 0;
				foreach($sbJSON->{data}->{missed} as $show) {
					$i = $i + 1;
				}
				//echo "Missed: {$i}<br>";

				if ($i >= 1) {
				
					echo "<font color=\"#BF0005\"><b>Missed:</b></font><br>";
					foreach($sbJSON->{data}->{missed} as $show) {

							// Reformat date
							 $newdate = date("l, m/d/y", strtotime($show->{airdate}));
							// Show Details
							$episodio = " s" .sprintf("%02s",$show->{season}). "e".sprintf("%02s",$show->{episode});
							$theid = $show->{tvdbid};
							$thebanner = "http://ruiz.sytes.net:8081//api/757ff4b9adaefacf24b2df5d495cce5f/?cmd=show.getbanner&tvdbid=" .$theid;
							$showname = $show->{show_name};
							$episodename = $show->{ep_name};
							
							$theplot = $show->{ep_plot};
							$theplot =  str_replace('"',"'",$theplot) ;	
							$theplot = htmlentities($theplot, ENT_QUOTES, 'UTF-8');
							

							//echo $show->{show_name} . $episodio . " " .$newDate . "<br />";
							//echo $theid;
							//echo "<br>";
							echo "<a href=\"http://ruiz.sytes.net:8081/home/displayShow?show={$theid}\" rel='ajaxpanel'><img src=\"" .$thebanner ."\" style=\"height:45px; border: 3px solid #F00; padding-bottom:0px;\" class=\"tooltip\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}</font>   \" ></a>";
							//echo "<br>";		
							}						
				}
				
				$feedtoday = "http://ruiz.sytes.net:8081//api/757ff4b9adaefacf24b2df5d495cce5f/?cmd=future&sort=date&type=today";
				$sbJSON = json_decode(file_get_contents($feedtoday));

				echo "Today:<br>";
				foreach($sbJSON->{data}->{today} as $show) {

						// Reformat date
						 $newdate = date("l, m/d/y", strtotime($show->{airdate}));
						// Show Details
						$episodio = " s" .sprintf("%02s",$show->{season}). "e".sprintf("%02s",$show->{episode});
						$theid = $show->{tvdbid};
						$thebanner = "http://ruiz.sytes.net:8081//api/757ff4b9adaefacf24b2df5d495cce5f/?cmd=show.getbanner&tvdbid=" .$theid;
						$showname = $show->{show_name};
						$episodename = $show->{ep_name};
						
						$theplot = $show->{ep_plot};
						$theplot =  str_replace('"',"'",$theplot) ;	
						$theplot = htmlentities($theplot, ENT_QUOTES, 'UTF-8');
						

						//echo $show->{show_name} . $episodio . " " .$newDate . "<br />";
						//echo $theid;
						//echo "<br>";
						echo "<a href=\"http://ruiz.sytes.net:8081/home/displayShow?show={$theid}\" rel='ajaxpanel'><img src=\"" .$thebanner ."\" style=\"width:206px; border: 3px solid #FFFFAE; padding-bottom:0px; \" class=\"tooltip\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}</font>   \" ></a>";
						//echo "<br>";		
				}


				$feedsoon = "http://ruiz.sytes.net:8081//api/757ff4b9adaefacf24b2df5d495cce5f/?cmd=future&sort=date&type=soon";
				$sbJSON = json_decode(file_get_contents($feedsoon));

				echo "Soon:";
				foreach($sbJSON->{data}->{soon} as $show) {

						// Reformat date
						 $newdate = date("l, m/d/y", strtotime($show->{airdate}));
						// Show Details
						$episodio = " s" .sprintf("%02s",$show->{season}). "e".sprintf("%02s",$show->{episode});
						$theid = $show->{tvdbid};
						$thebanner = "http://ruiz.sytes.net:8081//api/757ff4b9adaefacf24b2df5d495cce5f/?cmd=show.getbanner&tvdbid=" .$theid;
						$showname = $show->{show_name};
						$episodename = $show->{ep_name};
						
						$theplot = $show->{ep_plot};
						$theplot =  str_replace('"',"'",$theplot) ;	
						$theplot = htmlentities($theplot, ENT_QUOTES, 'UTF-8');

						//echo $show->{show_name} . $episodio . " " .$newDate . "<br />";
						//echo $theid;
						//echo "<br>";
						echo "<a href=\"http://ruiz.sytes.net:8081/home/displayShow?show={$theid}\" rel='ajaxpanel'><img src=\"" .$thebanner ."\" style=\"height:45px; padding-bottom:0px;\" class=\"tooltip\" title=\"{$showname}<br><font id=bubble class=bubble> Air Date: <b>{$newdate}</b> <br>Episode: <b>{$episodio}</b><br>Title: <b>{$episodename}</b><br>{$theplot}</font>   \" ></a>";

				}

				?>
				