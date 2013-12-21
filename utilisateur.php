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
                            <div class="span3">
                                <?php
                                    //On récupere le prenom si il existe
                                    if (!empty($_GET['prenom']))
                                    {
                                        $i = $_GET['prenom'];
                                    }
                                   // echo $i;
                                    $req0 = $PDO->prepare('SELECT * FROM `utilisateurs` WHERE `Prenom`= :id');
                                    $req0->execute(array(
                                        ":id"=> $i
                                    ));
                                    $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC);
                                    //On affiche son avatar si il en a un
                                    foreach ($resultat0 as $donnees) {
                                    if (!empty ($donnees['Avatar'])){
                                             echo "<img src='".$donnees['Avatar']."' alt='avatar'>";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="span9">
                                <?php
                                //On n'affiche que les infos qui existent
                                    echo "<h2>".ucfirst($donnees['Prenom'])." ".ucfirst($donnees['Nom'])."</h2>"; 
                                    echo "<div class='span4 noleft'>";
                                    if (!empty ($donnees['Nom'])){
                                         echo "<p> <span>Nom: </span> ". ucfirst($donnees['Nom'])."</p>";
                                    }

                                    if (!empty ($donnees['Prenom'])){
                                         echo "<p> <span>Prénom: </span>". ucfirst($donnees['Prenom'])."</p>";
                                    }
                                    if (!empty ($donnees['Age'])){
                                        echo "<p> <span>Age: </span>". ucfirst($donnees['Age'])."</p>";
                                    }
                                    echo "</div>";
                                    echo "<div class='span4 noleft'>";
                                    if (!empty ($donnees['Sexe'])){
                                        if (ucfirst($donnees['Sexe']) == "M"){
                                            echo "<p> <span>Sexe: </span>Homme </p>";
                                        }
                                        else{
                                            echo "<p> <span>Sexe: </span>Femme </p>";
                                        }
                                    }
                                    if (!empty ($donnees['Email'])){
                                        echo "<p> <span>Email: </span>". ucfirst($donnees['Email'])."</p>";
                                    }
                                    if (!empty ($donnees['Telephone'])){
                                         echo "<p> <span>Téléphone: </span>". ucfirst($donnees['Telephone'])."</p>";
                                    }
                                    echo "</div>";
                                    echo "<div class='span4 noleft'>";
                                             echo "<p> <span>Handicap: </span>". ucfirst($donnees['Handicap'])."</p>";
                                    echo "</div>";
                                ?>
                                
                            </div>
                            <div class="span4 list_tache_user">
                                    <h2>Tâches à venir</h2>
                                    <?php
                                    //on affiche les taches a venir pour l'utilisateur en question
                                    $req1 = $PDO->prepare('SELECT * FROM  `realise` , `taches` WHERE `Id_U` =:id AND realise.Id_Tm = taches.Id_Tm AND  `Date` >= NOW( ) AND `Date` < (NOW() + INTERVAL 1 WEEK)');
                                    $req1->execute(array(
                                        ":id"=> $donnees['Id_U']
                                        
                                    ));
                                    
                                    $resultat1 = $req1->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($resultat1 as $donnees) {
                                        echo"<div class='tache'>";
                                        $date = $donnees['Date'];
                                        //Date format 20/04/2013
                                        $formatDate = utf8_encode(strftime("%A %d %B %Y", strtotime($date)));   
                                       // print_r($donnees);
                                        echo "<h3>".ucfirst($formatDate)."</h3><h4>".$donnees['Nom']."</h4><p>".$donnees['Description']."</p>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
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