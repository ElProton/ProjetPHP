<?php
    
    $MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
    $datetime = Date("Y-m-d");
    $time = Date("d ").$MOUNTHS[intval(Date('n'))-1].Date(" Y"); 
       
    echo "<header>\n";
    echo "<p>Vary-Météo<br/>\n";
    echo "<time datetime=\"$datetime\">$time</time>\n";
    echo "</p>\n";
    echo "</header>\n";
?>
