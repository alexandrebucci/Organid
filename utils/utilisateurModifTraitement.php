<html>
	<head>
		<meta charset="UTF-8">
	</head>
</html>
<?php
	session_start();
    require_once(__DIR__ . '../../datas/parametres.php');
    require_once(__DIR__ . '../../utils/classes/Utilisateur.php');
    require_once(__DIR__ . '../../utils/classes/UtilisateurManager.php');

    $utilisateur = new Utilisateur();
    $manager = new UtilisateurManager($PDO);

    //recuperation des donnees	
	$Nom = $_POST["Nom"];
	$Prenom = $_POST["Prenom"];	
	$Age = $_POST["Age"];
	$Sexe = $_POST["Sexe"];	
	$Handicap = $_POST["Handicap"];
	$Email = $_POST["Email"];
	$Pwd = $_POST["Pwd"];	
	$Telephone = $_POST["Telephone"];	
	//$Avatar = $_POST["Avatar"];

	//Hydratation de l'utilisateur

	$utilisateur->hydratation(array(
		'id'=> $_SESSION['id'],
		'nom' => $Nom,
        'prenom' => $Prenom,
        'age' =>$Age,
        'sexe' => $Sexe,
        'handicap' => $Handicap,
        'email' => $Email,
        'pwd' => $Pwd,
        'telephone' => $Telephone
	));
	//On update l'utilisateur dans la BDD
	$manager->update($utilisateur);

	echo "<script> alert('Vos modifications ont bien été enregistrées');
	window.location.replace('../utilisateurModif.php');
	</script> ";
?>