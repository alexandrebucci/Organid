<?php
	require_once(__DIR__ . '/Utilisateur.php')	;
	require_once(__DIR__ . '/UtilisateurManager.php');
	require_once(__DIR__ . '../../../datas/parametres.php');
	//Creation d'un utilisateur
	$util1 = new Utilisateur();
	//Hydratation de $util1
	$util1->hydratation(array(
		'nom' => 'Dupont',
		'prenom' => 'Toto',
		'age' => 30,
		'sexe' => 'M',
		'handicap' => 0,
		'avatar' =>'',
		'email' => '',
		'pwd' => '',
		'telephone' => ''
	));
	
	
	echo $util1->prenom();
	echo $util1->nom();
	
	//On associe un manager à la base de donnees
	$manager = new UtilisateurManager($PDO);
	//Ajout de l'utilisateur dans la bdd
	$manager->update($util1);
?>