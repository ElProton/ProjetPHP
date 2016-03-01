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
                    
                    $found = false;
                    echo "<table>\n";
                    
                    while(!$found && $infoArray != NULL)
                    {
                        if($infoArray[0] == $_POST['stations'] && $_POST['day'] == substr($infoArray[1], 6, 2))
                        {
                            $optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");
                            $options = Array("pression","pointRosée", "hauteurNeige" );
                            
                            
                            echo "<tr>\n";
                            echo "<td>".substr($infoArray[1], 8, 2)."h".substr($infoArray[1], 10, 2)."</td>";
                            echo "<td>".$infoArray[0]."</td>";
                            echo "</tr>\n";
                        }
                        
                        $infoArray = fgetcsv( $csvFile, 1000, ";");                        
                    }
                    echo "</table>\n";
                    
                }
                else
                {
                    echo "<!-- csvFile not found. -->";
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
        echo "<!-- -->";
        echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
    }
    
    
    
?>
