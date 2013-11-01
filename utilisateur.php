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
        <header>
            <nav>
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container">
                            <!-- <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button> -->
                            <ul class="nav">
                                <li id="home-menu">
                                    <a href="home.php"><img src="img/logo.svg" alt="logo" id="logo"></i> Organid</a>
                                </li>
                            </ul>
                            <ul class="nav menu">
                                <li>
                                    <a href="taches.php">Tâches</a>
                                </li>
                                <li>
                                    <a href="#">Messages<span id="nb_msg"><span></a>
                                </li>
                                <li>
                                    <a href="#" id="rappel_a">Rappels<span id="nb_rappels"><span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Menu de navigation -->
        </header>
        <section class="main-home">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div id="rappel_div">
                        <h4>Rappels</h4>
                        <p>Lorem</p>
                    </div>
                    <div class="span12">
                        <div class="span9">
                            <?php
                                if (!empty($_GET['utilisateur']))
                                {
                                    $i = $_GET['utilisateur'];
                                }
                               // echo $i;
                                $req0 = $PDO->prepare('SELECT * FROM `utilisateurs` WHERE `Id_U`= :id');
                                $req0->execute(array(
                                    ":id"=> $i
                                ));
                                
                                $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultat0 as $donnees) {
                                    echo "<h3>".ucfirst($donnees['Prenom'])." ".ucfirst($donnees['Nom'])."</h3>"; 
                                    if (!empty ($donnees['Nom'])){
                                         echo "Nom: ". ucfirst($donnees['Nom'])."<br>";
                                    }
                                    if (!empty ($donnees['Prenom'])){
                                         echo "Prénom: ". ucfirst($donnees['Prenom'])."<br>";
                                    }
                                    if (!empty ($donnees['Age'])){
                                        echo "Age: ". ucfirst($donnees['Age'])."<br>";
                                    }
                                    if (!empty ($donnees['Sexe'])){
                                        echo "Sexe: ". ucfirst($donnees['Sexe'])."<br>";
                                    }
                                    if (!empty ($donnees['Email'])){
                                        echo "Email: ". ucfirst($donnees['Email'])."<br>";
                                    }
                                    if (!empty ($donnees['Telephone'])){
                                         echo "Téléphone: ". ucfirst($donnees['Telephone'])."<br>";
                                    }
                                    if (!empty ($donnees['Handicap'])){
                                         echo "Handicap: ". ucfirst($donnees['Handicap']);
                                    }
                                   
                                }
                            ?>
                        </div>
                        <div class="span3">
                           <p><b>Utilisateurs</b></p>
                           <?php
                                //
                                $req1 = $PDO->prepare('SELECT * FROM `utilisateurs` WHERE `Id_U` NOT IN (SELECT `Id_U` FROM `utilisateurs` WHERE `Id_U`= :id )');
                                $req1->execute(array(
                                    ":id"=> $_SESSION['id']
                                ));
                                
                                $resultat1 = $req1->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultat1 as $donnees) {
                                    echo'
                                    <a href="utilisateur.php?utilisateur='.$donnees['Id_U'].'">'.ucfirst($donnees['Prenom'])." ".ucfirst($donnees['Nom']).'</a><br>';  
                                    
                                }
                                echo "<hr>";

                           ?>

                           <p><b>Tâches à venir</b></p>
                           <?php
                                //On selectionne les tache entre aujourd'hui: NOW() et NOW + 1semaine 
                                $req2 = $PDO->prepare('SELECT * FROM  `realise` ,  `taches` WHERE  `Id_U` =:id AND realise.Id_Tm = taches.Id_Tm AND  `Date` >= NOW( ) AND `Date` < (NOW() + INTERVAL 1 WEEK)');
                                $req2->execute(array(
                                    ":id"=> $_SESSION['id']
                                ));
                                
                                $resultat2 = $req2->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultat2 as $donnees) {
                                    $date = $donnees['Date'];
                                    //Date format 20/04/2013
                                    $formatDate = utf8_encode(strftime("%A %d %B %Y", strtotime($date)));   
                                   // print_r($donnees);
                                    echo "<b>".ucfirst($formatDate)."</b></br>".$donnees['Nom']."</br> ";
                                    
                                }
                           ?>

                        </div>
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