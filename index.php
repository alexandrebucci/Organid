<?php
    //On verifie si l'utilisateur est deja connecté
    //include_once(__DIR__.'/utils/auth.php');
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
                                    <a href="Home"><img src="img/logo.svg" alt="logo" id="logo"></i> Organid</a>
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
                    <div class="span12">
                        <div class="span8">
                            <div class="span3">
                                <img src="img/oiseau.svg" alt="mascotte" class="oiseau">
                            </div>
                            <div class="span9">
                                <h1>Bienvenue</h1>
                                <p>Organid est un service qui va vous permettre de mettre un peu d'organisation dans votre nid.</p>
                                <p>La répartition des tâches dans votre logis est un problème ? Avec Organid ces dernières seront équitablement réparties et changeront chaque semaine.</p>
                                <p>Toute la famille peut participer, les tâches sont également attribuées selon la tranche d'âge et les difficultés.</p>
                                <p>En vous inscrivant vous pouvez créer un nid puis inviter les autres membres de votre maison ou en rejoindre un afin de retrouver les membres de votre foyer déjà inscrits.</p>
                            </div>
                        </div>
                        <div class="span4">
                            <div class"span12">
                                <form class="form-signin" method="POST" action="utils/verifAuthAd.php">
                                    <h2>Connexion</h2>
                                    <input type="text" class="input-block-level" placeholder="Adresse Email" name="Email" id="Email">
                                    <input type="password" class="input-block-level" placeholder="Mot de passe" name="Pwd" id="Pwd">
                                    <button class="bt_valid" type="submit">Se connecter</button>
                                    <a href="">Mot de passe oublié</a>
                                </form>
                                <!-- <form class="form-signin" method="POST" action="utils/deconnexion.php">
                                    <button class="btn btn-large btn-alert" type="submit">Se déconnecter</button>
                                    </form> -->
                            </div>
                            <div class"span12">
                                <form class="form-signin" method="POST" action="utils/inscription.php">
                                    <h2>Inscription</h2>
                                    <input type="text" class="input-block-level" placeholder="Nom" name="Nom" id="Nom">
                                    <input type="text" class="input-block-level" placeholder="Prénom" name="Prenom" id="Prenom">
                                    <input type="text" class="input-block-level" placeholder="Adresse Email" name="Email" id="Email">
                                    <input type="password" class="input-block-level" placeholder="Mot de passe" name="Pwd" id="Pwd">
                                    <button class="bt_valid" type="submit">S'inscrire</button>
                                </form>
                                <!-- <form class="form-signin" method="POST" action="utils/deconnexion.php">
                                    <button class="btn btn-large btn-alert" type="submit">Se déconnecter</button>
                                    </form> -->
                            </div>
                        </div>
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