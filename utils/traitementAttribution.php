<html>
	<head>
		<meta charset="UTF-8">
	</head>
</html>
<?php
    session_start();
    require_once(__DIR__ . '../../datas/parametres.php');
    //recuperation des donnees	
    /*echo $_POST["id_U"];
    echo $_POST["id_Tm"];
    echo $_POST["date"];*/
   //On verifie que la date est renseignée
    if (isset($_POST["date"])){
    	$id_U = $_POST["id_U"];
    	$id_Tm = $_POST["id_Tm"];
		$date = $_POST["date"];
    }

	//Requete avec PDO
	$requete = $PDO->prepare ('INSERT INTO realise (`Date`,`Check`,`Id_U`,`id_Tm`) VALUES (:dates, 0, :id_U, :id_Tm)');
	$requete->execute(array(
		":dates"=> $date,
		":id_U"=> $id_U,
		":id_Tm"=> $id_Tm
	));
	//on se redirige vers la page d'attribution des taches
	echo "<script> alert('La tâche à été attribuée.');
	window.location.replace('../Attribuer-les-taches');
	</script> ";

?>