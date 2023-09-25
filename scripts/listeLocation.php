<?php

	header('Content-Type: text/html; charset=utf-8');

	require_once '../configurationBDO.php';  // contient le code de la fonction connectDB qui est appelée ci-dessous
	try {
		$limite = $_GET["limite"];	
		if($limite != 0 && !isset($_GET['page'])){
			// Requête
			$sql = "SELECT * FROM location ORDER BY note DESC LIMIT :limite";
		} else if($limite != 0 && isset($_GET['page'])){
			// Requête
			$page = ($_GET['page']-1) * $limite;
			$sql = "SELECT * FROM location ORDER BY note DESC LIMIT :page, :limite";
		} else {
			// Requête
			$sql = "SELECT * FROM location ORDER BY note DESC";
		}
			  
		// Prepare statement
		$stmt = $conn->prepare($sql);
		if($limite != 0 && !isset($_GET['page'])){
			$stmt->bindParam(':limite', $limite, PDO::PARAM_INT, 50);
		} else if($limite != 0 && isset($_GET['page'])){
			$stmt->bindParam(':page', $page, PDO::PARAM_INT, 50);
			$stmt->bindParam(':limite', $limite, PDO::PARAM_INT, 50);
		}
		$stmt->execute();

		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// L'opérateur de résolution de portée "double deux-points" (::), fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.

		echo utf8_encode(json_encode($rs));
		// echo ($stmt->rowCount() . " record correspond");
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  //fermer la connexion pour libérer les ressources du serveur;

?>