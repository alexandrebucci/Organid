<?php
    session_start();
    //recuperation des donnees	
	$Email=$_POST["Email"];
	$Pwd=$_POST["Pwd"];		
	//connexion a la BD
	include_once("../datas/config.php");	
	$connect = mysql_connect($db_host,$db_user,$db_mdp)
	or die("probleme de connexion");
	$db = mysql_select_db($db_base,$connect);
	if (!$db)
	die ("Impossible de selectionner la base de donnees :".mysql_error());
	//requete a la BD
	$req="Select `Email`,`Pwd` from `Utilisateurs` where `Email`='$Email' and `Pwd`='$Pwd'";
	$rep=mysql_query($req);
	//Si le mail et le mot de passe existent dans la BD
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