<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$hotel = $_GET["hotel"];
		$sql = "SELECT hotel.* FROM hotel WHERE idHotel = :hotel";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':hotel', $hotel, PDO::PARAM_STR, 50);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>