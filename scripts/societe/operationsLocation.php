<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$idLocation = $_POST["idLocation"];
		$classe = $_POST["classe"];
		$prix = $_POST["prix"];
		$assurance = $_POST["assurance"];
		$caution = $_POST["caution"];
		$marque = $_POST["marque"];
		$modele = $_POST["modele"];
		$nbPlace = $_POST["nbPlace"];
		$descrip = $_POST["descrip"];
		$note = $_POST["note"];
		$image = $_POST["image"];
		
		if($_GET["action"] == 1){
			$sql = "UPDATE `location` SET `classe`=:classe, `prix`=:prix, `assurance`=:assurance, `caution`=:caution, `marque`=:marque,`modele`=:modele,`nbPlace`=:nbPlace,`descrip`=:descrip,`note`=:note,`image`=:image WHERE idLocation = :idLocation";
		} else if ($_GET["action"] == 2){			
						
			$tmpMarque = strtolower($marque);
			$tmpMarque = str_replace(' ', '_', $tmpMarque);
			$tmpModele = strtolower($modele);
			$tmpModele = str_replace(' ', '_', $tmpModele);
			$complet = $tmpMarque.'_'.$tmpModele.'.png';
				
			// Image path
			$img = 'images/locations/'. $complet;
			
			// Save image 
			file_put_contents($img, file_get_contents($image));

			$sql = "INSERT INTO `location`( `classe`, `prix`, `assurance`, `caution`, `marque`, `modele`, `nbPlace`, `descrip`, `note`, `image`) VALUES (:classe, :prix, :assurance, :caution, :marque, :modele, :nbPlace, :descrip, :note, :image)";
			
		} else if ($_GET['action'] == 3){
			$sql = "DELETE FROM `location` WHERE `idLocation` = :idLocation";
		}
		
		$stmt = $conn->prepare($sql);
	
		if($_GET['action'] == 3){
			$stmt->bindParam(':idLocation', $idLocation, PDO::PARAM_STR, 50);
			$stmt->bindParam(':classe', $classe, PDO::PARAM_STR, 50);
			$stmt->bindParam(':prix', $prix, PDO::PARAM_STR, 50);
			$stmt->bindParam(':assurance', $assurance, PDO::PARAM_STR, 50);
			$stmt->bindParam(':caution', $caution, PDO::PARAM_STR, 50);
			$stmt->bindParam(':marque', $marque, PDO::PARAM_STR, 50);
			$stmt->bindParam(':modele', $modele, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nbPlace', $nbPlace, PDO::PARAM_STR, 50);
			$stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR, 50);
			$stmt->bindParam(':note', $note, PDO::PARAM_STR, 50);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR, 50);
		} else if ($_GET['action'] == 2){ 
			$stmt->bindParam(':classe', $classe, PDO::PARAM_STR, 50);
			$stmt->bindParam(':prix', $prix, PDO::PARAM_STR, 50);
			$stmt->bindParam(':assurance', $assurance, PDO::PARAM_STR, 50);
			$stmt->bindParam(':caution', $caution, PDO::PARAM_STR, 50);
			$stmt->bindParam(':marque', $marque, PDO::PARAM_STR, 50);
			$stmt->bindParam(':modele', $modele, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nbPlace', $nbPlace, PDO::PARAM_STR, 50);
			$stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR, 50);
			$stmt->bindParam(':note', $note, PDO::PARAM_STR, 50);
			$stmt->bindParam(':image', $image, PDO::PARAM_STR, 50);
		} else if($_GET['action'] == 3) {
			$stmt->bindParam(':idLocation', $idLocation, PDO::PARAM_STR, 50);
		}
		
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo utf8_encode(json_encode($rs));
				
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>