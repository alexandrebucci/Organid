<?php
    $req1 = $PDO->prepare('SELECT * FROM `utilisateurs` WHERE `Id_U` = :id');
    $req1->execute(array(
    ":id"=> $_SESSION['id']
    ));
                                
    $resultat1 = $req1->fetchAll(PDO::FETCH_ASSOC);
?>        <header>
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
                            <ul class="nav menu">
                                <li>
                                    <a href="Taches-a-effectuer">Tâches</a>
                                </li>
                                <li>
                                    <a href="#">Messages<span id="nb_msg"><span></a>
                                </li>
                                <li>
                                    <a href="#" id="rappel_a">Rappels<span id="nb_rappels"><span></a>
                                </li>
                            </ul>
                            <ul class="nav pull-right""> 
                                <li class="dropdown">
                                    <?php
                                        foreach ($resultat1 as $donnees) {
                                            echo'<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> '.$donnees['Prenom'].' '.$donnees['Nom'].'<b class="caret"></b></a>                                    
                                            ';
                                        }
                                    ?>    
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../utils/deconnexion.php">Déconnexion</a>
                                            </li>
                                        </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Menu de navigation -->
        </header>
