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
                                    <a href="Home"><img src="img/logo.svg" alt="logo" id="logo"> Organid</a>
                                </li>
                            </ul>
                            <ul class="nav menu">
                                <li>
                                    <a href="Taches-a-effectuer">Tâches</a>
                                </li>
                                <!--<li>
                                    <a href="#">Messages<span id="nb_msg"><span></a>
                                </li>-->
                                <li>
                                    <a href="#" id="rappel_a">Rappels<span id="nb_rappels"><span></a>
                                    <div id="rappel_div">
                                        <h4>Rappels</h4>
                                        <?php
                                            /*$req0 = $PDO->prepare('SELECT * FROM  `rappel` ,  `taches` WHERE  `Id_U` =:id AND realise.Id_Tm = taches.Id_Tm AND  `Date` >= NOW( ) AND `Date` < (NOW() + INTERVAL 2 WEEK)');
                                            $req0->execute(array(
                                                ":id"=> $_SESSION['id']
                                            ));
                                            
                                            $resultat0 = $req0->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($resultat0 as $donnees) {
                                                echo"<div class='tache'>";
                                                    $date = $donnees['Date'];
                                                    //Date format 20/04/2013
                                                    $formatDate = utf8_encode(strftime("%A %d %B %Y", strtotime($date)));   
                                                   // print_r($donnees);
                                                    echo "<h3>".ucfirst($formatDate)."</h3><h4>".$donnees['Nom']."</h4><p>".$donnees['Description']."</p>";
                                                    echo "</div>";
                                            }*/
                                        ?>
                                    </div>
                                </li>
                            </ul>

                            <ul class="nav pull-right"> 
                                <li class="dropdown">
                                    <?php
                                        foreach ($resultat1 as $donnees) {
                                            echo'<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> '.$donnees['Prenom'].' '.$donnees['Nom']." ".'<b class="caret"></b></a>                                    
                                            ';
                                        }
                                    ?>    
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="Modifiez-votre-profil">Mon Profil</a>
                                            </li>
                                            <li>
                                                <a href="Ajouter-une-tache">Ajouter une tâche</a>
                                            </li>
                                            <li>
                                                <?php
                                                //On affiche ce lien seulement si la personne connecté est un admin
                                                    foreach ($resultat1 as $donnees) {
                                                        if($donnees['Admin'] == 1){
                                                            echo'<a href="Attribuer-les-taches">Attribuer les tâches</a>';
                                                        }
                                                    }
                                                ?>  
                                            </li>
                                            <li>
                                                <a href="utils/deconnexion.php">Déconnexion</a>
                                            </li>

                                        </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <script src="js/rappel_switch.js"></script>
        </header>
