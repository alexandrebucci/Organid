<?php
    session_start();
    require_once(__DIR__ . '/datas/parametres.php');
    setlocale (LC_TIME, 'fr-FR', 'fra'); 
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Organid - Home</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            //Inclusion de la navigation
            include('template/header.php');
            ?>
        <section class="main-home">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div id="rappel_div">
                        <h4>Rappels</h4>
                        <p>Lorem</p>
                    </div>
                    <div class="span12">
                        <div class="span9">
                            <p>Calendrier</p>
                        </div>
                        <?php
                            //Inclusion de la colone de droite
                            include('template/right.php');
                            ?>
                    </div>
                </div>
        </section>
        </div>
        <!-- En-tete de page -->
        <script src="js/jquery.js"></script>
        <!-- Script ajax pour verifier le formulaire -->
        <script type="text/javascript" src="js/ajax-form.js"></script>
        <script src="js/rappel_switch.js"></script>
    </body>
</html>