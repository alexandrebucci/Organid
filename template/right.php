                        <div class="span3" id="rightbar">
                           <h2>Utilisateurs</h2>
                           <?php
                                //
                                $req1 = $PDO->prepare('SELECT * FROM `utilisateurs` WHERE `Id_U` NOT IN (SELECT `Id_U` FROM `utilisateurs` WHERE `Id_U`= :id )');
                                $req1->execute(array(
                                    ":id"=> $_SESSION['id']
                                ));
                                
                                $resultat1 = $req1->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultat1 as $donnees) {
                                    echo'
                                    <a href="'.$donnees['Prenom'].'-'.$donnees['Nom'].'">'.ucfirst($donnees['Prenom'])." ".ucfirst($donnees['Nom']).'</a><br>';  
                                    
                                    /*echo'
                                    <a href="utilisateur.php?prenom='.$donnees['Prenom'].'&nom='.$donnees['Nom'].'">'.ucfirst($donnees['Prenom'])." ".ucfirst($donnees['Nom']).'</a><br>';  
                                    */
                                }
                                echo "<hr>";

                           ?>

                           <h2>Tâches à venir</h2>
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