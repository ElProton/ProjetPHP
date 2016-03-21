<?php
    if(isset($_POST['submit_jour']) || isset($_POST['submit_mois']) || isset($_GET['stations']))
    {
        /*
         * Associate a moutnh in String with the number of the mounth in String (which is 
         *  characters)
         */
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
        /*
         * Associate an option with a int that represent its index in the csv file
         */              
        $options = Array("température" => 7,
                         "directionVent" => 5,
                         "vitesseVent" => 6,
                         "précipitations" => 40,
                         "humidité" => 9,
                         "nébulosité" => 14,
                         "pression" => 20,
                         "pointRosée" => 8,
                         "hauteurNeige" => 34);      
        /*
         * Associate an option with another String to display to the user
         */                        
        $optionsLabel = Array("température" => "Température",
                         "directionVent" => "Direction du vent",
                         "vitesseVent" => "Vitesse du vent",
                         "précipitations" => "Précipitations",
                         "humidité" => "Humidité",
                         "nébulosité" => "Nébulosité",
                         "pression" => "Pression",
                         "pointRosée" => "Point de rosée",
                         "hauteurNeige" => "Hauteur de neige"); 
        
        //If there is a post or a GET request that is a day request...
        if(isset($_POST['submit_jour']) || isset($_GET['type']) && $_GET['type'] == "jour")
        {
            //... So we check if there is the require POST or GET values
            if( (isset($_POST['day']) && isset($_POST['mounth']) && isset($_POST['year']) && isset($_POST['stations']))
            ||
                (isset($_GET['day'])&& isset($_GET['mounth'])&& isset($_GET['year'])&& isset($_GET['stations'])))
            {
                //We get the values
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
                
                //We download and use the file
                $filename = "compress.zlib://https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/Archive/synop.".$year.$date[$mounth].".csv.gz";
                echo "<!-- $filename -->";
                $csvFile = fopen($filename, "r");
                
                //If the CSV file is open
                if($csvFile)
                {
                    $infoArray = fgetcsv( $csvFile, 1000, ";");
                    $infoArray = fgetcsv( $csvFile, 1000, ";");
                    
                    echo "<p>Données disponibles pour la date du ".$day." ".$mounth." ".$year."</p>";
                    
                    echo "<table>\n";
                    
            
                    
                    //While there are datas in the array
                    while($infoArray != NULL)
                    {
                        //We check if the station and the day are correct as the user request...
                        if($infoArray[0] == $station && $day == substr($infoArray[1], 6, 2))
                        {
                            echo "<tr>\n";
                            echo "<td>".substr($infoArray[1], 8, 2)."h".substr($infoArray[1], 10, 2)."</td>";
                            echo "<td>";
                            
                            //... And if so, we display the requested option
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
                else //If the CSV file si not found..
                {
                    echo "<!-- csv file not found. -->";
                    echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
                }

            }
            else //If a POST or GET is missing
            {
                echo "<!-- All posts are not there -->";
                echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
            }
        }
        //... Else if there is a POST or GET for a mounth
        else if(isset($_POST['submit_mois']) || isset($_GET['type']) && $_GET['type'] == "mois")
        {
            //If there is the require datas
            if(isset($_POST['mounth']) && isset($_POST['year']))
            {
                //We get the datas
                $mounth  = $_POST['mounth'];
                $year    = $_POST['year'];
                $station = $_POST['stations'];
                
                
                //We download the csv file
                $filename = "compress.zlib://https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/Archive/synop.".$year.$date[$mounth].".csv.gz";
                $csvFile = fopen($filename, "r");
                
                //If the csv file is found
                if($csvFile)
                {
                    //And if so, we display datas
                    if($date[$mounth] != Date("m") || $year != Date("Y"))
                    { 
                        $infoArray = fgetcsv( $csvFile, 1000, ";");
                        $infoArray = fgetcsv( $csvFile, 1000, ";");
                        
                        echo "<br /><div id='onglets'><span id='releves_onglet' class='onglet'>Relevés</span> <span class='onglet' id='graph_onglet'>Graphiques</span></div>";
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
                            
                            if($day < 10)
                                $currentD = "".$year."".$date[$mounth]."0".$day."";
                            else
                                $currentD = "".$year."".$date[$mounth].$day."";
                                
                            $testD = substr($infoArray[1], 0, 8);
                            
                            while($currentD == $testD && $infoArray != NULL)
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
                                        
                                    
                                }
                                
                                $infoArray = fgetcsv( $csvFile, 1000, ";");
                                $testD = substr($infoArray[1], 0, 8);
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
                    else //If the mounth is not over, we display an error
                    {
                            echo "<!-- Mounth is not finish. $year == ".Date("Y")."-->";
                            echo "<p>Vous ne pouvez pas demander les rélévés d'un mois non terminé !<br/></p>";
                            echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";                    
                    }                
                }
                else //If there isn't the csv file
                
                {
                    echo "<!-- csv file not found. -->";
                    echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";  
                }

            }
            else // If there isn't all the require datas
            {
                echo "<!-- All posts are not there -->";
                echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";                
            }
        }
        else //If the type is not 'jour' (day) or 'mois' (mounth)
        {
            echo "<!-- Unknown type of form -->";
            echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";            
        }
        
    }
    else //If there isn't any POST or GET
    {
        echo "<!-- No posts were sent -->";
        echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
    }
    
    
    
?>
