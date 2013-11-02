<?php
    session_start();
    require_once(__DIR__ . '/datas/parametres.php');
    require_once(__DIR__ . '/utils/classes/Utilisateur.php');
    require_once(__DIR__ . '/utils/classes/UtilisateurManager.php');
    setlocale (LC_TIME, 'fr-FR', 'fra'); 

    $utilisateur = new Utilisateur();
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
                               // echo $i;
                                $req0 = $PDO->prepare('SELECT * FROM `utilisateurs` WHERE `Id_U`= :id');
                                $req0->execute(array(
                                    ":id"=> $_SESSION['id']
                                ));
                                
                                $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultat0 as $donnees) {
                                    $utilisateur->hydratation(array(
                                        'nom' => $donnees['Nom'],
                                        'prenom' => $donnees['Prenom'],
                                        'age' => $donnees['Age'],
                                        'sexe' => $donnees['Sexe'],
                                        'handicap' => $donnees['Handicap'],
                                        'avatar' => $donnees['Avatar'],
                                        'email' => $donnees['Email'],
                                        'pwd' => $donnees['Pwd'],
                                        'telephone' => $donnees['Telephone'],
                                        'avatar' => $donnees['Avatar']
                                    ));

                                    echo "<h3>".ucfirst($donnees['Prenom'])." ".ucfirst($donnees['Nom'])."</h3>"; 
                            ?>
                            <form class="form-signin" method="POST" action="utils/utilisateurModifTraitement.php">
                                Nom:<input type="text" class="input-block-level" value="<?php echo $utilisateur->nom();?>" name="Nom" id="Nom">
                                Prenom:<input type="text" class="input-block-level" value="<?php echo $utilisateur->prenom();?>" name="Prenom" id="Prenom">
                                Age:<input type="text" class="input-block-level" value="<?php echo $utilisateur->age();?>" name="Age" id="Age">
                                Sexe:<input type="text" class="input-block-level" value="<?php echo $utilisateur->sexe();?>" name="Sexe" id="Sexe">
                                Handicap<input type="text" class="input-block-level" value="<?php echo $utilisateur->handicap();?>" name="Handicap" id="Handicap">
                                Email:<input type="text" class="input-block-level" value="<?php echo $utilisateur->email();?>" name="Email" id="Email">
                                Mot de passe:<input type="text" class="input-block-level" value="<?php echo $utilisateur->pwd();?>" name="Pwd" id="Pwd">
                                Téléphone:<input type="text" class="input-block-level" value="<?php echo $utilisateur->telephone();?>" name="Telephone" id="Telephone">

                                <button class="bt_valid" type="submit">Enregistrer</button>
                            </form>
                            <?php
                                }//Fin foreach ligne 72
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