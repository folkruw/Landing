<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$compagnie = $_GET["compagnie"];
		$sql = "SELECT * FROM vol WHERE compagnie = :compagnie ORDER BY numVol";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':compagnie', $compagnie, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>