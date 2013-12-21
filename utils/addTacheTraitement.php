<html>
	<head>
		<meta charset="UTF-8">
	</head>
</html>
<?php
	session_start();
    require_once(__DIR__ . '../../datas/parametres.php');
    require_once(__DIR__ . '../../utils/classes/Tache.php');
    require_once(__DIR__ . '../../utils/classes/TacheManager.php');
    require_once(__DIR__ . '../../utils/classes/Categorie.php');
    require_once(__DIR__ . '../../utils/classes/CategorieManager.php');
    //Création des objets qui vont être utilisé
    $tache = new Tache();
    $manager = new TacheManager($PDO);
    $categorie = new Categorie();
    $catManager = new CategorieManager($PDO);

    //Recupération des données
    $Nom = $_POST["Nom"];
	$Difficulte = $_POST["Difficulte"];	
	$Description = $_POST["Description"];
	$Categorie = $_POST["Categorie"];
	$NewCategorie = $_POST["AutreCategorie"];

	//Si la catégorie existe l'utilisateur selectionne dans le <select>
	//Sinon l'utilisateur ajoute la tache avec un input
	if ($_POST["Categorie"] != "vide"){
		$Categorie = $Categorie;
	}else{
		//On selectionne les Id_cat de categories
		$req1 = $PDO->prepare('SELECT Id_Cat FROM `categories`');
        $req1->execute();
        //Compte le nombre de resultat
        $count = $req1->rowCount();
       	//Nb resultat +1 pour avoir l'id de la catégorie qui va etre ajouté afin de l'utilisé dans l'ajout de la tache 
        $id_next = $count + 1;
        $Categorie = $id_next;

        $categorie->hydratation(array(
		'nom' => $NewCategorie
		));
		//Ajout de la categorie dans la base
		$catManager->add($categorie);
	}

	$tache->hydratation(array(
		'nom' => $Nom,
		'difficulte' => $Difficulte,
		'description' => $Description,
		'id_Cat' => $Categorie
 	));
	//Ajout de la tache dans la base
 	$manager->add($tache);
 	echo "<script> alert('Votre nouvelle a été enregistrée');
	window.location.replace('../home.php');
	</script> ";
?>