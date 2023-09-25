<?php

	header('Content-Type: text/html; charset=utf-8');

	require_once '../configurationBDO.php';  // Contient le code de la fonction connectDB qui est appelée ci-dessous
	try {		
		$table = $_GET["table"];
		$where = $_GET["where"];
		
		if($table == "vol"){
			$col = "numVol";
			// Requête
			$sql = "SELECT COUNT(:col) AS comptage, dateDepart FROM vol WHERE destination LIKE :where AND DATE(dateDepart) > DATE(NOW());";
		} else if($table == "hotel"){
			$col = "numVol";
			// Requête
			$sql = "SELECT COUNT(:col) AS comptage FROM hotel WHERE destination LIKE :where;";
		} else if($table == "location"){
			$col = "numVol";
			// Requête
			$sql = "SELECT COUNT(:col) AS comptage FROM location ORDER BY note;";
		}	
		
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':col', $col, PDO::PARAM_STR, 50);
		if($table != "location"){$stmt->bindParam(':where', $where, PDO::PARAM_STR, 50);}
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo utf8_encode(json_encode($rs));
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null; 
?>