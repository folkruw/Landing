<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once '../../configurationBDO.php';
	try {
		// Défini la langue française
		$sql =  "SET lc_time_names = 'fr_FR';";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		$sql = "SELECT numVol, compagnie, DATE_FORMAT(dureeVol, '%H heures %i') AS dureeVol, DATE_FORMAT(DATE(dateDepart), '%d %M %Y') AS dateDepart, TIME(dateDepart) AS heureDepart, depart, destination, prixP, nbPassager FROM vol WHERE dateDepart > NOW();";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>