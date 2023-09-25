<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once '../../configurationBDO.php';
	try {
		$sql = "SELECT destination.*, pays.pays AS 'nomPays' FROM destination INNER JOIN pays ON destination.pays = pays.idPays ORDER BY destination";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>