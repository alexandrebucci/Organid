<?php

	require_once(__DIR__ . '/datas/parametres.php');

	$req = $PDO->prepare('SELECT * FROM `realise` , `taches` WHERE  `Id_U`= :id AND realise.Id_Tm = taches.Id_Tm AND `Date`>= NOW()');
	$req->execute(array(
		":id"=> 1
	));
	
	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach ($resultat as $donnees) {
		print_r($donnees);
		echo $donnees["Date"]." ".$donnees['Nom']." ".$donnees['Description'];
	}

?>