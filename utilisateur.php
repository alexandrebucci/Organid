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
                    <div id="rappel_div">
                        <h4>Rappels</h4>
                        <p>Lorem</p>
                    </div>
                    <div class="span12">
                        <div class="span9">
                            <?php
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