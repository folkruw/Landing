<?php
	header('Content-Type: text/html; charset=utf-8');

	require_once '../../configurationBDO.php';
	try {
		$destination = $_GET["destination"];
		$sql = "SELECT destination.*, pays.pays FROM destination INNER JOIN pays ON destination.pays = pays.idPays WHERE destination =:destination ORDER BY nbBilletVendu DESC LIMIT 6";	  
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;  //fermer la connexion pour libérer les ressources du serveur;
?>