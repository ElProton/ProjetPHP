<?php
	$FORM = Array("Jour", "Mois");
	$MOUNTHS = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$optionsBase = Array("température", "directionVent", "vitesseVent", "précipitations", "humidité", "nébulosité");
 	$options = Array("pression","pointRosée", "hauteurNeige" );

	echo "<form action ='formulaireJour.php method = 'post'>";
	echo "<fieldset id = 'FormulaireJour'>";
	echo "<legend> Jour </legend>";
	echo "<label> Vous voulez des données pour un : </label>";
	echo "<select selected = 'Jour'>";
	foreach ($FORM as $typeForm){
		echo "<option value = '".$typeForm."'> ".$typeForm." </option>";
	}
	echo "</select> <br />";
	echo "<label> Votre Station : </label>";
	echo "<select> </select>";
	echo "<label> Date : </label>";
	echo "<select>";
	
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
		echo "<label> ".$option." :</label>";
		echo "<input type= 'checkbox' checked = 'true' value= '".$option."'>";
	}
	foreach ($options as $option){
		echo "<label> ".$option." :</label>";
		echo "<input type= 'checkbox' checked = 'false' value= '".$option."'>";
	}
?>
