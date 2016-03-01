<?php
	$MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");
 	$options = Array("pression","pointRosée", "hauteurNeige" );

	echo "<form action='index.php?type=jour' method='post'>";
	echo "<fieldset id = 'FormulaireJour'>";
	echo "<legend> Jour </legend>";
	echo "<label> Votre Station : </label>";
	echo "<select id=\"stations\">";
    
	$csvFile = fopen("https://donneespubliques.meteofrance.fr/donnees_libres/Txt/Synop/postesSynop.csv", "r");
	$stationArray = fgetcsv( $csvFile, 1000, ";");
    $stationArray = fgetcsv( $csvFile, 1000, ";");
    
	while ($stationArray != NULL){
		echo "<option data-insee='".$stationArray[0]."' data-lon='".$stationArray[3]."' data-lat='".$stationArray[2]."' value='".$stationArray[1]."' > ".$stationArray[1]."</option>";
		$stationArray = fgetcsv( $csvFile, 1000, ";");
	}
	echo " </select> <br />";
	echo "<label> Date : </label>";
	echo "<select class='modificationDate'>";
	for ($i = 1;$i<= 31; $i++){
		echo "<option value = '".$i."'>".$i."</option>";
	}
	echo "</select>";
	echo "<select>";
	foreach ($MOUNTHS as $mounths){
		echo "<option value = '".$mounths."'> ".$mounths." </option>";
	}
	echo "</select>";
	echo "<select>";
	for ($i = 1996; $i<= 2016; $i++){
		echo "<option value = '".$i."'> ".$i." </option>";
	}
	echo "</select> <br />";
	echo "<fieldset class='optionsMeteo'>";
	echo "<legend> Options </legend>";
    echo "<ul>";
	foreach ($optionsBase as $option){
        echo "<li>";
		echo "<input type= 'checkbox' checked value= '".$option."'>";
		echo "<label> ".$option."</label>";
        echo "</li>";
	}
echo "</ul>";
echo "<ul>";
	foreach ($options as $option){
        echo "<li>";
		echo "<input type= 'checkbox' value= '".$option."'>";
		echo "<label> ".$option."</label>";
        echo "</li>";
	}
echo "</ul>";
echo "<br />";
echo "</fieldset>";

echo "<input type ='submit' class = 'submitButton' value=\"Consulter !\"/>";
echo "</fieldset>";
?>
