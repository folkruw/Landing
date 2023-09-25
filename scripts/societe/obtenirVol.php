<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$vol = $_GET["vol"];
		$sql = "SELECT numVol, compagnie, DATE_FORMAT(dureeVol, '%H heures %i') AS dureeVol, DATE_FORMAT(DATE(dateDepart), '%d %M %Y') AS dateDepart, DATE_FORMAT(DATE(dateDepart), '%Y-%m-%d') AS dateDepart2, HOUR(dateDepart) AS heureDepart, MINUTE(dateDepart) AS minuteDepart, HOUR(dureeVol) AS heureDuree, MINUTE(dureeVol) AS minuteDuree, lieuDepart, lieuDestination, depart, destination, prixP, nbPassager, villeEscale, dureeEscale, escale, repas FROM vol WHERE numVol = :vol";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':vol', $vol, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>