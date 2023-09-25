<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {			
		$sql = "SELECT * FROM pays;";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;  
?>