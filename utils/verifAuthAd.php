<?php
    session_start();
    require_once(__DIR__ . '../../datas/parametres.php');
    //recuperation des donnees	
	$Email=$_POST["Email"];
	$Pwd=$_POST["Pwd"];	

	//Requete avec PDO
	$requete = $PDO->prepare ('SELECT * FROM `Utilisateurs` WHERE `Email`=:email AND `Pwd`=:pwd');
	$requete->execute(array(
		":email"=> $Email,
		":pwd"=> $Pwd
	));
	//Retourne un tableau indexé par le nom de la colonne dans la BDD
	$resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

	//Si l'email et le pwd existent dans la BDD
	//count($resultat) == nombre d'elements dans le tableau;
	if(count($resultat) != 0){
		//Recupere l'id dans la base de donnée
		$id = $resultat["Id_U"];
		//Debut de la session
		$_SESSION['connecte']=1;
		$_SESSION['id']=$id;
		header("location:http://www.google.com");
		exit;
	} else {
		echo "<script> alert('Mot de passe ou adresse e-mail incorrect');
		window.location.replace('../index.html');
		</script> ";
	}
?>