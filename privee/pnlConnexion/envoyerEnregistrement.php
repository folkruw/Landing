<?php
	header('Content-Type: text/html; charset=utf-8');
	
	require_once '../../configurationBDO.php';  // contient le code de la fonction connectDB qui est appelée ci-dessous
	$nom = trim($_POST["nom"]);
	if(isset($_POST['prenom'])){
		$prenom = trim($_POST["prenom"]);
	} else {
		$responsable = trim($_POST["responsable"]);
	}
	$pseudo = trim($_POST["pseudo"]);
	$mail = trim($_POST["mail"]);
	$motdepasse = trim($_POST["motdepasse"]);
	$motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
	
	$role = trim($_POST["role"]);
	
	// Requête
	if(isset($_POST['prenom'])){
		$sql = "INSERT INTO `client`(`nom`, `prenom`, `pseudo`, `mail`, `motdepasse`, `role`, `cp`) VALUES (:nom, :prenom, :pseudo, :mail, :motdepasse, :role, 0)";
	} else {
		$sql = "INSERT INTO `client`(`nom`, `responsable`, `pseudo`, `mail`, `motdepasse`, `role`, `actif`, `cp`) VALUES (:nom, :responsable, :pseudo, :mail, :motdepasse, :role, '1', '0')";
	}
	
	// Prepare statement
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
	if(isset($_POST['prenom'])){
		$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
	} else {
		$stmt->bindParam(':responsable', $responsable, PDO::PARAM_STR, 50);
	}
	$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 50);
	$stmt->bindParam(':mail', $mail, PDO::PARAM_STR, 50);
	$stmt->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR, 50);
	$stmt->bindParam(':role', $role, PDO::PARAM_STR, 50);	
	
	// Exécute l'opération
	$stmt->execute();
	
	$conn = null;  //fermer la connexion pour libérer les ressources du serveur;
	
	session_start();
	$_SESSION["pseudo"] = $pseudo;
	$_SESSION["role"] = 0;	
?>