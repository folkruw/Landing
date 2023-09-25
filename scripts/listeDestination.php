<?php
	header('Content-Type: text/html; charset=utf-8');

	require_once '../configurationBDO.php';
	try {
		$sql = "SELECT destination.*, pays.pays, COUNT(hotel.destination) AS countHotel FROM destination INNER JOIN pays ON destination.pays = pays.idPays LEFT JOIN hotel USING(destination) GROUP BY destination ORDER BY nbBilletVendu DESC";	  
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>