<?php
	$MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
	$optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");
 	$options = Array("pression","pointRosée", "hauteurNeige" );

	echo "<form action='index.php?type=jour' method='post'>";
	echo "<fieldset id = 'FormulaireJour'>";
	echo "<legend> Jour </legend>";
	echo "<label> Votre Station : </label>";
	echo "<select id=\"stations\" name=\"stations\">";
    
	$csvFile = fopen("https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/postesSynop.csv", "r");
	$stationArray = fgetcsv( $csvFile, 1000, ";");
    $stationArray = fgetcsv( $csvFile, 1000, ";");
    	
	// create the select to the stations
	while ($stationArray != NULL){
		echo "<option data-insee='".$stationArray[0]."' data-lon='".$stationArray[3]."' data-lat='".$stationArray[2]."' value='".$stationArray[0]."' > ".$stationArray[1]."</option>";
		$stationArray = fgetcsv( $csvFile, 1000, ";");
	}
	echo " </select> <br />";
	//
	// create the day's selected
	echo "<label> Date : </label>";
	echo "<select name='day' id='modificationDate'>";
	for ($i = 1;$i<= 28; $i++){
		echo "<option value = '".$i."'>".$i."</option>";
	}
	echo "</select>";
	echo "<select name='mounth' class='dateChange'>";
	foreach ($MOUNTHS as $mounths){
		echo "<option value = '".$mounths."'> ".$mounths." </option>";
	}
	echo "</select>";
	echo "<select name='year' class = 'dateChange'>";
	for ($i = 1996; $i<= 2016; $i++){
		echo "<option value = '".$i."'> ".$i." </option>";
	}
	echo "</select> <br />";
	//
	// gestion des options
	echo "<fieldset class='optionsMeteo'>";
	echo "<legend> Options </legend>";
	echo "<ul>";
	foreach ($optionsBase as $option){
        echo "<li>";
		echo "<input name='".$option."' type= 'checkbox' checked='checked' value= '".$option."' />";
		echo "<label> ".$option."</label>";
        echo "</li>";
	}
	echo "</ul>";
	echo "<ul>";
	foreach ($options as $option){
        echo "<li>";
		echo "<input name='".$option."' type= 'checkbox' value= '".$option."' />";
		echo "<label> ".$option."</label>";
        echo "</li>";
	}
	echo "</ul>";
//
echo "<br />";
echo "</fieldset>";

echo "<input type ='submit' class = 'submitButton' name='submit_jour' value=\"Consulter !\"/>";
echo "</fieldset>";
echo "</form>";
?>
