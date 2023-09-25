<?php
	session_start();
	$_SESSION["idClient"] = $_GET['idClient'];
	$_SESSION["pseudo"] = $_GET['pseudo'];
	$_SESSION["role"] = $_GET['role'];
	header('Location: ../../index.php');  
?>