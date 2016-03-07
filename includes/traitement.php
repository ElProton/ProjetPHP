<?php
    if(isset($_POST['submit_jour']) || isset($_POST['submit_jour']))
    {
        if(isset($_POST['submit_jour']))
        {
            if(isset($_POST['day']) 
            && isset($_POST['mounth']) 
            && isset($_POST['year'])
            && isset($_POST['stations']))
            {
                $date = Array("Janvier"   => "01", 
                              "Février"   => "02",
                              "Mars"      => "03",
                              "Avril"     => "04",
                              "Mai"       => "05",
                              "Juin"      => "06",
                              "Juillet"   => "07",
                              "Août"      => "08",
                              "Septembre" => "09",
                              "Octobre"   => "10",
                              "Novembre"  => "11",
                              "Décembre"  => "12");
                              
                $filename = "compress.zlib://https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/Archive/synop.".$_POST['year'].$date[$_POST['mounth']].".csv.gz";
                $csvFile = fopen($filename, "r");
                
                if($csvFile)
                {
                    $infoArray = fgetcsv( $csvFile, 1000, ";");
                    $infoArray = fgetcsv( $csvFile, 1000, ";");
                    
                    echo "<p>Données disponibles pour la date du ".$_POST['day']." ".$_POST['mounth']." ".$_POST['year']."</p>";
                    
                    $found = false;
                    echo "<table>\n";
                    
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
                    
                    
                    while(!$found && $infoArray != NULL)
                    {
                        if($infoArray[0] == $_POST['stations'] && $_POST['day'] == substr($infoArray[1], 6, 2))
                        {
                            echo "<tr>\n";
                            echo "<td>".substr($infoArray[1], 8, 2)."h".substr($infoArray[1], 10, 2)."</td>";
                            echo "<td>";
                            
                            foreach($options as $key => $value)
                            {
                                if($_POST[$key]){
                                    echo $optionsLabel[$key].": ";
                                    
                                    $info = $infoArray[$value];
                                    
                                    if($info == "mq")
                                        echo "Aucune donnée<br/>";
                                    else
                                    {
                                        switch($key)
                                        {
                                            case "température":
                                                echo sprintf("%7.2f" ,floatval($info) - 273,15);
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
                                                echo sprintf("%7.2f" ,floatval($info) - 273,15);
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
        else
        {
            //Mois
        }
        
    }
    else
    {
        echo "<!-- No posts were sent -->";
        echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
    }
    
    
    
?>
