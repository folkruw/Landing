<?php
	if(!isset($_SESSION)){session_start();}
	if(!isset($_SESSION['role'])){header('Location: ../../index.php');} 
	if($_SESSION['role'] != 2){header('Location: ../../index.php');} 
	
	header('Content-Type: text/html; charset=utf-8');
	include ('../configurationBDO.php'); 
	try {
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$pseudo = $_POST["pseudo"];
		$responsable = $_POST["responsable"];
		$numTel = $_POST["numTel"];
		$pays = $_POST["pays"];
		$province = $_POST["province"];
		$localite = $_POST["localite"];
		$cp = $_POST["cp"];
		$adresse = $_POST["adresse"];
		$numero = $_POST["numero"];
		$role = $_POST["role"];
		
		// SQL 
		$sql = "UPDATE `client` SET `nom`=:nom, `prenom`=:prenom, `responsable`= :responsable, `numTel`=:numTel, `pays`=:pays, `province`=:province, `localite`=:localite, `cp`=:cp, `adresse`=:adresse, `numero`=:numero, `role`=:role, `actif`=1 WHERE pseudo=:pseudo";
		
		// Prepare statement
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
		$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR, 50);
		$stmt->bindParam(':responsable', $responsable, PDO::PARAM_STR, 50);
		$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 50);
		$stmt->bindParam(':numTel', $numTel, PDO::PARAM_STR, 50);
		$stmt->bindParam(':pays', $pays, PDO::PARAM_STR, 50);
		$stmt->bindParam(':province', $province, PDO::PARAM_STR, 50);
		$stmt->bindParam(':localite', $localite, PDO::PARAM_STR, 50);
		$stmt->bindParam(':cp', $cp, PDO::PARAM_STR, 50);
		$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR, 50);
		$stmt->bindParam(':numero', $numero, PDO::PARAM_STR, 50);
		$stmt->bindParam(':role', $role, PDO::PARAM_STR, 50);
					
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		echo utf8_encode(json_encode($rs));
				
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>