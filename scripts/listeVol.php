<?php

	header('Content-Type: text/html; charset=utf-8');

	require_once '../configurationBDO.php';  // Contient le code de la fonction connectDB qui est appelée ci-dessous
	try {
		// Défini la langue française
		$sql =  "SET lc_time_names = 'fr_FR';";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		$destination = $_GET["destination"];
		$limite = $_GET["limite"];
		if($limite != 0 && !isset($_GET['page'])){
			// Requête
			$sql = "SELECT numVol, prixP, dateDepart, DATE_FORMAT(DATE(dateDepart), '%d %M %Y') AS formatDate, DATE_FORMAT(dureeVol, '%h heures %i minutes') AS dureeVol, lieuDepart, lieuDestination, destination FROM vol WHERE DATE(dateDepart) > DATE(NOW()) AND destination LIKE :destination ORDER BY `dateDepart` ASC LIMIT :limite";
		} else if($limite != 0 && isset($_GET['page'])){
			// Requête
			$page = ($_GET['page']-1) * $limite;
			$sql = "SELECT numVol, prixP, dateDepart, DATE_FORMAT(DATE(dateDepart), '%d %M %Y') AS formatDate, DATE_FORMAT(dureeVol, '%h heures %i minutes') AS dureeVol, lieuDepart, lieuDestination, destination FROM vol WHERE DATE(dateDepart) > DATE(NOW()) AND destination LIKE :destination ORDER BY `dateDepart` ASC LIMIT :page, :limite";
		} else {
			// Requête
			$sql = "SELECT numVol, prixP, dateDepart, DATE_FORMAT(DATE(dateDepart), '%d %M %Y') AS formatDate, DATE_FORMAT(dureeVol, '%h heures %i minutes') AS dureeVol, lieuDepart, lieuDestination, destination FROM vol WHERE DATE(dateDepart) > DATE(NOW()) AND destination LIKE :destination ORDER BY `dateDepart` ASC";
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
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null; 
?>