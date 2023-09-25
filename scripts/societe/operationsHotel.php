<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$action = $_POST["action"];
		$idHotel = $_POST["idHotel"];
		$nom = $_POST["hotel"];
		$destination = $_POST["listeDestination"];
		$adresse = $_POST["adresse"];
		$prix = $_POST["prix"];
		$typeChambre = $_POST["typeChambre"];
		$descrip = $_POST["descrip"];
		$nbPlace = $_POST["nbPlace"];
		$image = $_POST["image"];
		
		if($action == 1){
			$sql = "UPDATE `hotel` SET `nom`= :nom, `destination`= :destination, `adresse`= :adresse, `prix`= :prix, `nbPlace`= :nbPlace, `typeChambre`= :typeChambre, `descrip`= :descrip, `image`=:image WHERE idHotel = :idHotel";
		} else if ($action == 2){
			$sql = "INSERT INTO `hotel`(`destination`, `nom`, `adresse`, `prix`, `typeChambre`, `descrip`, `nbPlace`, `image`) VALUES (:destination, :nom, :adresse, :prix, :typeChambre, :descrip, :nbPlace, :image)";
		} else if ($action == 3){
			$sql = "DELETE FROM `hotel` WHERE `idHotel` = :idHotel";
		}
		
		$stmt = $conn->prepare($sql);

		if($action == 1){
			$stmt->bindParam(':idHotel', $idHotel, PDO::PARAM_STR, 50);
			$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
			$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR, 50);
			$stmt->bindParam(':typeChambre', $typeChambre, PDO::PARAM_STR, 50);
			$stmt->bindParam(':prix', $prix, PDO::PARAM_STR, 50);
			$stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nbPlace', $nbPlace, PDO::PARAM_STR, 50);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR, 50);
		} else if ($action == 2){
			$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
			$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR, 50);
			$stmt->bindParam(':typeChambre', $typeChambre, PDO::PARAM_STR, 50);
			$stmt->bindParam(':prix', $prix, PDO::PARAM_STR, 50);
			$stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nbPlace', $nbPlace, PDO::PARAM_STR, 50);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR, 50);
		}	else if($action == 3) {
			$stmt->bindParam(':idHotel', $idHotel, PDO::PARAM_STR, 50);
		}		
					
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo utf8_encode(json_encode($rs));
				
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>