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
                $csvFile = fopen("compress.zlib://https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/Archive/synop.".$_POST['year'].$_POST['mounth'].".csv.gz","r");
                $infoArray = fgetcsv( $csvFile, 1000, ";");
                $infoArray = fgetcsv( $csvFile, 1000, ";");
                $found = false;
                
  
            }
            else
            {
                echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
            }
        }
        else
        {
            
        }
        
    }
    else
    {
        echo "<p>Veuillez faire une recherche dans le formulaire de gauche.</p>";
    }
    
    
    
?>
