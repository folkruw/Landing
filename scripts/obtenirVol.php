<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../configurationBDO.php'); 
	try {
		$depart = $_GET["depart"];
		$destination = $_GET["destination"];
		$dateDepart = $_GET["dateDepart"];
		$sql = "SELECT * FROM vol WHERE depart = :depart AND destination = :destination AND DATE(dateDepart) >= :dateDepart ORDER BY dateDepart";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':depart', $depart, PDO::PARAM_STR, 50);
		$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
		$stmt->bindParam(':dateDepart', $dateDepart, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>