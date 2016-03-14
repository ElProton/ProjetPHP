<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link id="main_style" type="text/css" rel="stylesheet" href="css/index.css" />
        <link type="text/css" rel="stylesheet" href="css/leaflet.css" />
        
        <script src="js/leaflet-src.js"></script>
        <script src="js/formChoice.js"></script>
        <script src="js/index.js"></script>
        <script src="js/formDateChange.js"></script>
        <script src="js/woof.js"></script>
    </head>
    <body>
        <?php
            require("includes/header.php");
        ?>
        <section id="result">
            <h2>Réponse de la demande</h2>
            <p>
               <?php 
                    require("includes/proxy.php");
                    require("includes/traitement.php");
                ?>
            </p>
        </section>
        <section id="formulaire">
            <h2>Formulaires</h2>
            <p>
                Vous souhaitez des données pour un 
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
               
               <br/><br>
               Vous pouvez selectionner une station en cliquant sur un marqueur !
            </p>
            
            
            
            <div>
                <div id="map-leaflet">
                </div>
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
        
        <div class="clear"></div>
        <footer>
            <span>Réalisé par Valentin VAMOUR et Ryan LEFEBVRE - Tous droits réservés ©</span>
        </footer>
    </body>
</html
