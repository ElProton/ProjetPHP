<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link type="text/css" rel="stylesheet" href="css/index.css" />
        <script src="js/leaflet-src.js"></script>
        <script src="js/formChoice.js"></script>
    </head>
    <body>
        <?php
            require("includes/header.php");
        ?>
        <section>
            <h2>Réponse de la demande</h2>
        </section>
        <section>
            <h2>Formulaires</h2>
            <p>
               <select>
                <option value = "jour"> Jour </option>
                <option value = "mois"> mois </option>
               </select>
            </p>
            
            <div id="map-leaflet">
            </div>
            
            <div id="formulaire">
                
                <?php
                    include("includes/formulaires.php");
                ?>
            </div>
            
        </section>
    </body>
</html
