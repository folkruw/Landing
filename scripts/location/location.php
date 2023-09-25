<?php
	header('Content-Type: text/html; charset=utf-8');

	require_once '../../configurationBDO.php';
	try {
		$idLocation = $_GET["idLocation"];
		$sql = "SELECT * FROM location WHERE idLocation =:idLocation";	  
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':idLocation', $idLocation, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;  //fermer la connexion pour libérer les ressources du serveur;
?>