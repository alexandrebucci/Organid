<?php
    session_start();
    require_once(__DIR__ . '/datas/parametres.php');
    setlocale (LC_TIME, 'fr-FR', 'fra'); 
    ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Organid - Attribuer les taches</title>
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
                    <div class="span12">
                        <div class="span9">
                            <p>Attribution des tâches</p>

                            <?php
                                //Recupération des utilisateurs
                                $req0 = $PDO->prepare('SELECT * FROM `utilisateurs`');
                                $req0->execute();
                                $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC);
                                
                                //Récupération des taches
                                $req1 = $PDO->prepare('SELECT * FROM `taches`');
                                $req1->execute();

                                $resultat1 = $req1->fetchAll(PDO::FETCH_ASSOC);
                                //Affichage d'un entrée pour une date, des taches avec une liste deroulante contenant chaque utilisateur
                                foreach ($resultat1 as $donnees) {
                                    echo"<div class='span9'>";
                                    echo"<form method='POST' action='utils/traitementAttribution.php'>";
                                    //Choix de la date
                                    echo "<p><input type='date' name='date' id='date'> ".
                                    //Choix de l'utilisateur qui va devoir effectuer la tache
                                    " <SELECT name='id_U' id='id_U'>";
                                    foreach ($resultat0 as $donnees0) {
                                       echo "<option value='".$donnees0['Id_U']."'>".$donnees0['Nom']." ".$donnees0['Prenom'];
                                    }
                                    echo"</SELECT>";
                                    //Affichage du nom de la tache
                                    echo" <b>".$donnees['Nom']."</b>";
                                    echo"<input type='hidden' name='id_Tm' id='id_Tm' value='".$donnees['Id_Tm']."'>";
                                    echo"</div>";
                                    echo"<div class='span2 offset'><button class='bt_valid' type='submit'>Attribuer</button></div></p></form>";

                                }
                            ?>
                        </div>
                        <?php
                            //Inclusion de la colone de droite
                            include('template/right.php');
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- En-tete de page -->
        <script src="js/jquery.js"></script>
        <!-- Script ajax pour verifier le formulaire -->
        <script type="text/javascript" src="js/ajax-form.js"></script>
        <!-- Menu de navigation -->
    </body>
</html>