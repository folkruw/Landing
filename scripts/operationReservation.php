<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../configurationBDO.php'); 
	try {
		$idClient = $_POST["idClient"];
		$numVol = $_POST["numVol"];
		$idHotel = $_POST["idHotel"];
		$idLocation = $_POST["idLocation"];
		$nbPassager = $_POST["nbPassager"];
		$destination = $_POST["destination"];		
			
		$sql = "INSERT INTO `reservation`(`idClient`, `numVol`, `idHotel`, `idLocation`) VALUES (:idClient, :numVol, :idHotel, :idLocation)";
		
		$stmt = $conn->prepare($sql);
		
		$stmt->bindParam(':idClient', $idClient, PDO::PARAM_STR, 50);
		$stmt->bindParam(':numVol', $numVol, PDO::PARAM_STR, 50);
		$stmt->bindParam(':idLocation', $idLocation, PDO::PARAM_STR, 50);
		$stmt->bindParam(':idHotel', $idHotel, PDO::PARAM_STR, 50);
				
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo utf8_encode(json_encode($rs));
		
		$sql = "SET @p0=:nbPassager; SET @p1=:numVol; CALL `ajoutPassager`(@p0, @p1);";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':nbPassager', $nbPassager, PDO::PARAM_INT, 50);
		$stmt->bindParam(':numVol', $numVol, PDO::PARAM_STR, 50);
		$stmt->execute();
		
		
		$sql = "SET @p0=:nbPassager; SET @p1=:destination; CALL `ajoutClientDestination`(@p0, @p1);";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':nbPassager', $nbPassager, PDO::PARAM_INT, 50);
		$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
		$stmt->execute();
		
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	
	$conn = null;  

?>