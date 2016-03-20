<?php
    if(isset($_POST['submit_jour']) || isset($_POST['submit_mois']) || isset($_GET['stations']))
    {
        $date = Array("Janvier"   => "01", 
                      "Février"   => "02",
                      "Mars"      => "03",
                      "Avril"     => "04",
                      "Mai"       => "05",
                      "Juin"      => "06",
                      "Juillet"   => "07",
                      "Aout"      => "08",
                      "Septembre" => "09",
                      "Octobre"   => "10",
                      "Novembre"  => "11",
                      "Décembre"  => "12");
                      
        $options = Array("température" => 7,
                         "directionVent" => 5,
                         "vitesseVent" => 6,
                         "précipitations" => 36,
                         "humidité" => 9,
                         "nébulosité" => 14,
                         "pression" => 20,
                         "pointRosée" => 8,
                         "hauteurNeige" => 34);      
                                
        $optionsLabel = Array("température" => "Température",
                         "directionVent" => "Direction du vent",
                         "vitesseVent" => "Vitesse du vent",
                         "précipitations" => "Précipitations",
                         "humidité" => "Humidité",
                         "nébulosité" => "Nébulosité",
                         "pression" => "Pression",
                         "pointRosée" => "Point de rosée",
                         "hauteurNeige" => "Hauteur de neige"); 
                         
        if(isset($_POST['submit_jour']) || isset($_GET['type']) && $_GET['type'] == "jour")
        {
            if( (isset($_POST['day']) && isset($_POST['mounth']) && isset($_POST['year']) && isset($_POST['stations']))
            ||
                (isset($_GET['day'])&& isset($_GET['mounth'])&& isset($_GET['year'])&& isset($_GET['stations'])))
            {
                
                if(isset($_POST['day']))
                {
                    $day = $_POST['day'];
                    $mounth = $_POST['mounth'];
                    $year = $_POST['year'];
                    $station = $_POST['stations'];
                }
                else
                {
                    $day = $_GET['day'];
                    $mounth = $_GET['mounth'];
                    $year = $_GET['year'];           
                    $station = $_GET['stations'];         
                }
                
                $filename = "compress.zlib://https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/Archive/synop.".$year.$date[$mounth].".csv.gz";
                echo "<!-- $filename -->";
                $csvFile = fopen($filename, "r");
                
                if($csvFile)
                {
                    $infoArray = fgetcsv( $csvFile, 1000, ";");
                    $infoArray = fgetcsv( $csvFile, 1000, ";");
                    
                    echo "<p>Données disponibles pour la date du ".$day." ".$mounth." ".$year."</p>";
                    
                    echo "<table>\n";
                    
            
                    
                    
                    while($infoArray != NULL)
                    {
                        if($infoArray[0] == $station && $day == substr($infoArray[1], 6, 2))
                        {
                            echo "<tr>\n";
                            echo "<td>".substr($infoArray[1], 8, 2)."h".substr($infoArray[1], 10, 2)."</td>";
                            echo "<td>";
                            
                            foreach($options as $key => $value)
                            {
                                if($_POST[$key]
                                ||
                                (isset($_GET['day'])&&isset($_GET['mounth'])&& isset($_GET['year'])&& isset($_GET['stations']))
                                  )
                                {
                                    echo $optionsLabel[$key].": ";
                                    
                                    $info = $infoArray[$value];
                                    
                                    if($info == "mq")
                                        echo "Aucune donnée<br/>";
                                    else
                                    {
                                        switch($key)
                                        {
                                            case "température":
                                                echo sprintf("%7.2f" ,floatval($info) - 273.15);
                                                echo "°C";
                                            break;
                                            
                                            case "directionVent":
                                                echo $info."°";
                                            break;
                                            
                                            case "vitesseVent":
                                                echo sprintf("%7.2f", $info)." m/s";
                                            break;
                                            
                                            case "précipitations":
                                                echo $info." mm";
                                            break;
                                            
                                            case "humidité":
                                                echo $info." %";
                                            break;
                                            
                                            case "nébulosité":
                                                echo $info." octa";
                                            break;
                                            
                                            case "pression":
                                                echo $info." Pa";
                                            break;
                                            
                                            case "pointRosée":
                                                echo sprintf("%7.2f" ,floatval($info) - 273.15);
                                                echo "°C";
                                            break;
                                            
                                            case "hauteurNeige":
                                                echo $info." m";
                                            break;
                                        }
                                        echo "<br/>";
                                    }
                                }
                            }
                            
                            echo "</td>";
                            echo "</tr>\n";
                        }
                        
                        $infoArray = fgetcsv( $csvFile, 1000, ";");                        
                    }
                    echo "</table>\n";
                    
                }
                else
                {
                    echo "<!-- csv file not found. -->";
                    echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
                }

            }
            else
            {
                echo "<!-- All posts are not there -->";
                echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
            }
        }
        else if(isset($_POST['submit_mois']) || isset($_GET['type']) && $_GET['type'] == "mois")
        {
            //Mois
            if(isset($_POST['mounth']) && isset($_POST['year']))
            {
                $mounth  = $_POST['mounth'];
                $year    = $_POST['year'];
                $station = $_POST['stations'];
                
                $filename = "compress.zlib://https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/Archive/synop.".$year.$date[$mounth].".csv.gz";
                echo "<!-- $filename -->";
                echo "<!-- ".$mounth." - ".$date[$mounth]." -->";
                $csvFile = fopen($filename, "r");
                
                if($csvFile)
                {
                    if($date[$mounth] != Date("m") || $year != Date("Y"))
                    { 
                        $infoArray = fgetcsv( $csvFile, 1000, ";");
                        $infoArray = fgetcsv( $csvFile, 1000, ";");
                        
                        echo "<div id='onglets'><span id='releves_onglet' class='onglet'>Relevés</span> <span class='onglet' id='graph_onglet'>Graphiques</span></div>";
                        echo "<div id='releve' class='showed'>";
                        echo "<table>\n";
                            echo "<thead>\n";
                            echo "<tr>";
                                echo "<th></th>";
                                echo "<th>Température minimale</th>";
                                echo "<th>Température maximale</th>";
                                echo "<th>Cumul des précipitations</th>";
                            echo "</tr>";
                            echo "</thead>\n";
                        echo "<tbody>\n";
                        
                        $tmin =  10000000;
                        $tmax = -10000000;
                        $cumul = 0;
                        $tab = Array();
                                                    
                        
                        for($day = 1 ; $day != cal_days_in_month(CAL_GREGORIAN, intval($date[$mounth]), intval($year))+1 ; $day++)
                        {
                            echo "<td><a href=\"index.php?type=jour&stations=$station&day=$day&mounth=$mounth&year=$year\">".$day." ".$mounth." ".$year."</a></td>";
                            
                            $hour = "00h00";
                            
                            while($hour != "21h00")
                            {
                                if($infoArray[0] == $station)
                                {
                                    $temperature = floatval($infoArray[$options["température"]]) - 273.15 ;
                                    $precipitations = floatval($infoArray[$options["précipitations"]]);
                                    
                                    $cumul += $precipitations;
                                    
                                    if($temperature < $tmin)
                                        $tmin = $temperature;
                                    if($temperature > $tmax)
                                        $tmax = $temperature;
                                        
                                    $hour = substr($infoArray[1], 8, 2)."h".substr($infoArray[1], 10, 2);
                                    
                                    
                                }
                                $infoArray = fgetcsv( $csvFile, 1000, ";");
                            }
                            
                            echo "<td class='tmin'>".sprintf("%7.2f" ,floatval($tmin))."°C </td>";
                            echo "<td class='tmax'>".sprintf("%7.2f" ,floatval($tmax))."°C </td>";
                            echo "<td class='cumul'>".$cumul." mm</td>";
                            echo "</tr>";
                            $tmin =  10000000;
                            $tmax = -10000000;
                            $cumul = 0;
                            
                        }
                        
                        echo "</tbody>\n"; 
                        echo "</table>\n";            
                        echo "</div>";
                        
                        	echo "<div id='graphs' class='hidden'>";
                        	echo "<h2>Température minimum</h2>";
				echo '<svg id="graphtmin" xmlns="http://www.w3.org/2000/svg">
					</svg>';
						
				echo "<h2>Température maximum</h2>";
				echo '<svg id="graphtmax" xmlns="http://www.w3.org/2000/svg">
					</svg>';
				echo "<h2>Cumul des précipitations</h2>";
				echo '<svg id="graphcumul" xmlns="http://www.w3.org/2000/svg">
					</svg>';
			echo "</div>";
			
							 
                    }
                    else
                    {
                            echo "<!-- Mounth is not finish. $year == ".Date("Y")."-->";
                            echo "<p>Vous ne pouvez pas demander les rélévés d'un mois non terminé !<br/></p>";
                            echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";                    
                    }                
                }
                else
                {
                    echo "<!-- csv file not found. -->";
                    echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";  
                }

            }
            else
            {
                echo "<!-- All posts are not there -->";
                echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";                
            }
        }
        else
        {
            echo "<!-- Unknown type of form -->";
            echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";            
        }
        
    }
    else
    {
        echo "<!-- No posts were sent -->";
        echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
    }
    
    
    
?>
