<?php
session_start();
	if (isset ($_SESSION['connecte']))
		header("location: home.php");
	if ($_SESSION['connecte']=1)
		header("location: home.php");	
?>