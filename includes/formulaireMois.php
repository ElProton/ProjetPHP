<?php
	$MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
	$optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");

	echo "<form action ='index.php?type=mois' method='post'>";
	echo "<fieldset id = 'FormulaireMois'>";
	echo "<legend> Jour </legend>";
	echo "<label> Votre Station : </label>";
	echo "<select id=\"stations\" name=\"stations\">";
    
	$csvFile = fopen("https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/postesSynop.csv", "r");
	$stationArray = fgetcsv( $csvFile, 1000, ";");
	$stationArray = fgetcsv( $csvFile, 1000, ";");
	// create select to the stations    
	while ($stationArray != NULL){
		echo "<option data-insee='".$stationArray[0]."' data-lon='".$stationArray[3]."' data-lat='".$stationArray[2]."' value='".$stationArray[0]."' > ".$stationArray[1]."</option>";
		$stationArray = fgetcsv( $csvFile, 1000, ";");
	}
	echo " </select> <br />";
	//
	// create the day's selected
	echo "<label> Date : </label>";
	echo "<select name='mounth'>";
	foreach ($MOUNTHS as $mounths){
		echo "<option value = '".$mounths."'> ".$mounths." </option>";
	}
	echo "</select>";
	echo "<select name='year'>";
	for ($i = 1996; $i<= 2016; $i++){
		echo "<option value = '".$i."'> ".$i." </option>";
	}
	echo "</select> <br />";
	//
	echo "<B> Relevés proposés par la requête :</B>";
    echo "<ul>";
        echo "<li>";
		echo "<I>température minimale</I>";
        echo "</li>";
        echo "<li>";
		echo "<I>température maximale</I>";
        echo "</li>";
        echo "<li>";
		echo "<I>cumul quotidien des précipitations</I>";
        echo "</li>";
echo "</ul>";
echo "<br />";
echo "<input type ='submit' name='submit_mois' class = 'submitButton' value='Consulter !'/>";
?>
