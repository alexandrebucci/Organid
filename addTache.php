<?php
    session_start();
    require_once(__DIR__ . '/datas/parametres.php');
    require_once(__DIR__ . '/utils/classes/Tache.php');
    setlocale (LC_TIME, 'fr-FR', 'fra'); 

    //Recupere les categories de taches pour les utiliser dans un menu deroulant
    $req0 = $PDO->prepare('SELECT * FROM `categories`');
    $req0->execute();
    $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Organid</title>
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
                            <h3>Ajouter une tache</h3>
                            <form class="form-signin" method="POST" action="utils/addTacheTraitement.php">
                                Nom:<input type="text" class="input-block-level" placeholder="Nom" name="Nom" id="Nom">
                                Difficulté:<input type="text" class="input-block-level" placeholder="Difficulté" name="Difficulte" id="Difficulte">
                                Description:<input type="text" class="input-block-level" placeholder="Description" name="Description" id="Description">
                                Catégorie:
                                <select class="input-block-level" name="Categorie" id="Categorie">
                                    <?php
                                        foreach ($resultat0 as $donnees) {
                                            echo "<option value='".$donnees['Id_Cat']."'>".$donnees['Nom']."</option>";
                                        }
                                    ?>
                                </select>

                                <button class="bt_valid" type="submit">Ajouter</button>
                            </form>
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