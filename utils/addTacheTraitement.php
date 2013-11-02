<?php
	session_start();
    require_once(__DIR__ . '../../datas/parametres.php');
    require_once(__DIR__ . '../../utils/classes/Tache.php');
    require_once(__DIR__ . '../../utils/classes/TacheManager.php');

    $tache = new Tache();
    $manager = new TacheManager($PDO);

    //Recupération des données
    $Nom = $_POST["Nom"];
	$Difficulte = $_POST["Difficulte"];	
	$Description = $_POST["Description"];
	$Categorie = $_POST["Categorie"];	

	$tache->hydratation(array(
		'nom' => $Nom,
		'difficulte' => $Difficulte,
		'description' => $Description,
		'id_Cat' => $Categorie
 	));

 	$manager->add($tache);
 	echo "<script> alert('Votre nouvelle a été enregistrée');
	window.location.replace('../home.php');
	</script> ";
?>