<?php
    session_start();
    require_once(__DIR__ . '/datas/parametres.php');
    setlocale (LC_TIME, 'fr-FR', 'fra'); 
    // echo "<script>alert(".$_SESSION['id'].")</script>";
    //echo $_SESSION['id'];
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
                    
                    <div class="span12">
                        <div class="span9 user">
                            <h2>Taches</h2>
                            <p>Affichage des taches à effectuer pour les deux semaines à venir</p>
                            <?php
                                //Récupération des taches à venir entre la date actuelle et (date actuelle + 2 semaines)
                                $req0 = $PDO->prepare('SELECT * FROM  `realise` ,  `taches` WHERE  `Id_U` =:id AND realise.Id_Tm = taches.Id_Tm AND  `Date` >= NOW( ) AND `Date` < (NOW() + INTERVAL 2 WEEK)');
                                $req0->execute(array(
                                    ":id"=> $_SESSION['id']
                                ));
                                
                                $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC);
                                //Affichage des taches
                                foreach ($resultat0 as $donnees) {
                                    echo"<div class='tache'>";
                                        $date = $donnees['Date'];
                                        //Date format 20/04/2013
                                        $formatDate = utf8_encode(strftime("%A %d %B %Y", strtotime($date)));   
                                       // print_r($donnees);
                                        //On affiche la date, le nom de la tache et sa description
                                        echo "<h3>".ucfirst($formatDate)."</h3><h4>".$donnees['Nom']."</h4><p>".$donnees['Description']."</p>";
                                        echo "</div>";
                                }
                            ?>
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
    </body>
</html>