<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once '../../configurationBDO.php';
	try {
		session_start();
		
		$sql = "SELECT idReservation, idHotel, idLocation, idClient, numVol, DATE(vol.dateDepart) AS dateDepart, vol.destination, vol.lieuDestination, COALESCE(hotel.nom, '') AS nom, COALESCE(location.marque, '') AS marque, COALESCE(location.modele, '') AS modele FROM `reservation` 
		LEFT JOIN vol USING(numVol)
		LEFT JOIN hotel USING(idHotel)
		LEFT JOIN location USING(idLocation)
		WHERE idClient = :idClient";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':idClient', $_SESSION['idClient'], PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>