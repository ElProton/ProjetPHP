<?php
	$MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");

	echo "<form action ='formulaireMois.php method = 'post'>";
	echo "<fieldset id = 'FormulaireMois'>";
	echo "<legend> Jour </legend>";
	echo "<label> Votre Station : </label>";
	echo "<select>";
	$csvFile = fopen("src/postesSynop.csv", "r");
	$stationArray = fgetcsv( $csvFile, 1000, ";");
	while ($stationArray != NULL){
		echo "<option value = '".$stationArray[1]."' > ".$stationArray[1]."</option>";
		$stationArray = fgetcsv( $csvFile, 1000, ";");
	}
	echo " </select> <br />";
	echo "<label> Date : </label>";
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
echo "<button type ='button' class = 'submitButton'> Consulter! </button> ";
?>
