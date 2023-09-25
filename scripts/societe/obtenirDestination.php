<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$destination = $_GET["destination"];
		$sql = "SELECT destination.*, pays.pays AS 'nomPays' FROM destination INNER JOIN pays ON destination.pays = pays.idPays WHERE destination=:destination";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>