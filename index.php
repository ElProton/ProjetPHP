<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link type="text/css" rel="stylesheet" href="css/index.css" />
        <link type="text/css" rel="stylesheet" href="css/leaflet.css" />
        
        <script src="js/leaflet.js"></script>
        <script src="js/formChoice.js"></script>
        <script src="js/index.js"></script>
    </head>
    <body>
        <?php
            require("includes/header.php");
        ?>
        <section>
            <h2>Réponse de la demande</h2>
            <p>
               <?php require("includes/traitement.php"); ?>
            </p>
        </section>
        <section>
            <h2>Formulaires</h2>
            <p>
                <select>
                <?php
                    if(isset($_GET['type']))
                    {
                        $type = $_GET['type'];
                        
                        if($type == "jour" || ($type != "jour" && $type != "mois"))
                        {
                            echo '<option selected value = "jour"> Jour </option>';
                            echo '<option value = "mois"> Mois </option>';
                        }
                        else if($type == "mois")
                        {
                            echo '<option value = "jour"> Jour </option>';
                            echo '<option selected value = "Mois"> mois </option>';
                        }                        
                    }
                    else
                    {
                            $type = "jour";
                            echo '<option selected value = "jour"> Jour </option>';
                            echo '<option value = "mois"> Mois </option>';
                    }
                ?>
               </select>
            </p>
            
            
            <div id="map-leaflet">
            </div>
            <div id="formulaire">
                
                <?php
                    switch($type)
                    {
                        case "jour":
                            require('includes/formulaireJour.php');
                        break;
                        
                        case "mois":
                            require('includes/formulaireMois.php');
                        break;
                        
                        default:
                            require('includes/formulaireJour.php');
                        break;
                    }
                ?>
            </div>
            
        </section>
        
        <footer>
            <span class="center">Réalisé par Valentin VAMOUR et Ryan LEFEBVRE - Tous droits réservés ©</span>
            
        </footer>
    </body>
</html
