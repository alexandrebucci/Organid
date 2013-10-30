<?php
    session_start();
    require_once(__DIR__ . '../../datas/parametres.php');
    //recuperation des donnees	
    $Nom=$_POST["Nom"];
    $Prenom=$_POST["Prenom"];
	$Email=$_POST["Email"];
	$Pwd=$_POST["Pwd"];		

	//Requete avec PDO
	$requete = $PDO->prepare ('SELECT `Email` FROM `Utilisateurs` WHERE `Email`=:email');
	$requete->execute(array(
		":email"=> $Email
	));
	//Retourne un tableau indexé par le nom de la colonne dans la BDD
	$resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

	//Si l'email existe deja dans la base de donnée, on indique qu'il y a deja un compte relié a cet email
	//count($resultat) == nombre d'elements dans le tableau;
	if(count($resultat) != 0){
		echo "<script> alert('Cette adresse mail est déjà attribué à un compte');
		window.location.replace('../index.html');
		</script> ";
	} else {
		//Sinon on ajoute l'utilisateur a la BDD
		$req = $PDO->prepare('INSERT INTO utilisateurs (`Nom`, `Prenom`, `Email`, `Pwd`) VALUES (:nom, :prenom, :email, :pwd)');
	 
	    $req->execute(array(
	      ":nom" => $Nom,
	      ":prenom" => $Prenom,
	      ":email" => $Email,
	      ":pwd" => $Pwd
	    ));
	    echo "<script> alert('Votre compte a été créé avec succès');
		window.location.replace('http://google.com');
		</script> ";
	}
?>