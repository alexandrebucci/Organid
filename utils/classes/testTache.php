<?php
	require_once(__DIR__ . '/Tache.php')	;
	require_once(__DIR__ . '/TacheManager.php');
	require_once(__DIR__ . '../../../datas/parametres.php');
	//Creation d'un utilisateur
	$tache1 = new Tache();
	//Hydratation de $tache1
	$tache1->hydratation(array(
		'nom' => 'Vaissel',
		'difficulte' => '1',
		'description' => 'Laver la vaissel',
		'id_Cat' => 1,
		'id_U' => 2,
	));
	
	
	echo $tache1->nom();
	echo $tache1->difficulte();
	echo $tache1->description();

	//On associe un manager à la base de donnees
	$manager = new TacheManager($PDO);
	//Ajout de la tache dans la bdd
	$manager->add($tache1);
?>