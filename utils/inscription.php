<?php
    session_start();
    //recuperation des donnees	
    $Nom=$_POST["Nom"];
    $Prenom=$_POST["Prenom"]
	$Email=$_POST["Email"];
	$Pwd=$_POST["Pwd"];		
	//connexion a la BD
	include_once("../datas/config.php");	
	$connect = mysql_connect($db_host,$db_user,$db_mdp)
	or die("probleme de connexion");
	$db = mysql_select_db($db_base,$connect);
	if (!$db)
	die ("Impossible de selectionner la base de donnees :".mysql_error());

	$verif="SELECT Email FROM Utilisateurs WHERE Email=$Email";
	$reqverif=mysql_query($verif);
	//Si le mail existe dans la BDD on dit qu'un utilisateur a déjà un compte
	if(mysql_num_rows($rep)==1)
	{
		echo "<script> alert('Cette adresse mail est déjà attribué à un compte');
	window.location.replace('../index.html');
	</script> ";
	}else{
		//insertion dans la BD
	$req="INSERT INTO Utilisateurs (Nom, Prenom, Email, Pwd) VALUES ($Nom, $Prenom, $Email, $Pwd);";
	$rep=mysql_query($req);
	window.location.replace('http:www.nba.com');
	}

	
	//Si le mail existe dans la BDD on dit qu'un utilisateur a déjà un compte
	if(mysql_num_rows($rep)!=0)
	{
		$ligne=mysql_fetch_row($rep);
//		Recupere l'id
		$id=$ligne[0];
//		Debut de la session
		$_SESSION['connecte']=1;
		
		$_SESSION['id']=$id;
		header("location:http://www.facebook.com");
		exit;
	}
	else
	echo "<script> alert('Mot de passe ou adresse e-mail incorrect');
	window.location.replace('../index.html');
	</script> ";
	
	mysql_close();
?>