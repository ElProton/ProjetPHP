<?php
	$FORM = Array("Jour", "Mois");
	$MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");
 	$options = Array("pression","pointRosée", "hauteurNeige" );

	echo "<form action ='formulaireJour.php method = 'post'>";
	echo "<fieldset id = 'FormulaireJour'>";
	echo "<legend> Jour </legend>";
	echo "<label> Votre Station : </label>";
	$csvFile = fopen("../src/postesSynop.csv");
	$stationArray = fgetcsv( resource $csvFile [, int $length = 0 [, string $delimiter = ";" [, string $enclosure = '"' [, string $escape = "\n" ]]]] );
	while ($stationArray != NULL){
		echo "<option value = '".$stationArray[1]."' > ".$stationArray[1]."</option>";
	}
	echo "<select> </select>";
	echo "<label> Date : </label>";
	echo "<select>";
	for ($i = 1;i<= 31; i++){
		echo "<option value = '".$i."'>".$i."</option>";
	}
	echo "</select> <br />";
	echo "<select>";
	foreach ($MOUNTHS as $mounths){
		echo "<option value = '".$mounths."'> ".$mounths." </option>";
	}
	echo "</select> <br />";
	echo "<select>";
	for ($i = 1996; $i<= 2016; $i++){
		echo "<option value = '".$i."'> ".$i." </option>";
	}
	echo "</select> <br />";
	echo "<fieldset>";
	echo "<legend> Options </legend>";
	foreach ($optionsBase as $option){
		echo "<input type= 'checkbox' checked = 'true' value= '".$option."'>";
		echo "<label> ".$option."</label>";
	}
	foreach ($options as $option){
		echo "<input type= 'checkbox' checked = 'false' value= '".$option."'>";
		echo "<label> ".$option."</label>";
	}
?>
