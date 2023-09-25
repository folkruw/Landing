<?php

	header('Content-Type: text/html; charset=utf-8');

	require_once '../configurationBDO.php';  // contient le code de la fonction connectDB qui est appelée ci-dessous
	try {
		$destination = $_GET["destination"];
		$limite = $_GET["limite"];	
		
		if($limite != 0 && !isset($_GET['page'])){
			// Requête
			$sql = "SELECT * FROM hotel WHERE destination LIKE :destination ORDER BY prix DESC LIMIT :limite";
		} else if($limite != 0 && isset($_GET['page'])){
			// Requête
			$page = ($_GET['page']-1) * $limite;
			$sql = "SELECT * FROM hotel WHERE destination LIKE :destination ORDER BY prix DESC LIMIT :page, :limite";
		} else {
			// Requête
			$sql = "SELECT * FROM hotel WHERE destination LIKE :destination ORDER BY prix DESC";
		}
	  
	  
		$stmt = $conn->prepare($sql);
		
		$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
		if($limite != 0 && !isset($_GET['page'])){
			$stmt->bindParam(':limite', $limite, PDO::PARAM_INT, 50);
		} else if($limite != 0 && isset($_GET['page'])){
			$stmt->bindParam(':page', $page, PDO::PARAM_INT, 50);
			$stmt->bindParam(':limite', $limite, PDO::PARAM_INT, 50);
		}
		
		$stmt->execute();

		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  //fermer la connexion pour libérer les ressources du serveur;

?>