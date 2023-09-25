<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$numVol = $_POST["numVol"];
		$compagnie = $_POST["listeCompagnie"];
		$destination = $_POST["listeDestination"];
		$depart = $_POST["listeDestination2"];
		$dateDepart = $_POST["dateDepart"]. " " .$_POST["heureDepart"].":".$_POST["minuteDepart"].":00";
		$lieuDepart = $_POST["lieuDepart"];
		$lieuDestination = $_POST["lieuDestination"];
		$prixP = $_POST["prixP"];
		$nbPassager = $_POST["nbPassager"];
		$dureeVol = $_POST["heureDuree"].":".$_POST["minuteDuree"].":00";
		$escale = $_POST["escale"];
		$villeEscale = $_POST["villeEscale"];
		$dureeEscale = $_POST["dureeEscale"];
		$repas = $_POST["repas"];
				
		if($_POST["action"] == 1){
			$sql = "UPDATE `vol` SET `compagnie`=:compagnie, `dateDepart`=:dateDepart, `lieuDepart`=:lieuDepart,`lieuDestination`=:lieuDestination, `depart`=:depart, `destination`=:destination,`prixP`=:prixP, `nbPassager`=:nbPassager, `dureeVol`=:dureeVol, `escale`=:escale, `villeEscale`=:villeEscale, `dureeEscale`=:dureeEscale, `repas`=:repas WHERE numVol = :numVol";
		} else if ($_POST["action"] == 2){
			$sql = "INSERT INTO `vol`(`numVol`, `compagnie`, `dateDepart`, `lieuDepart`, `lieuDestination`, `depart`, `destination`, `prixP`, `nbPassager`, `dureeVol`, `escale`, `villeEscale`, `dureeEscale`, `repas`) VALUES (:numVol, :compagnie, :dateDepart, :lieuDepart, :lieuDestination, :depart, :destination, :prixP, :nbPassager, :dureeVol, :escale, :villeEscale, :dureeEscale, :repas)";
		} else if ($_POST['action'] == 3){
			$sql = "DELETE FROM `vol` WHERE `numVol` = :numVol";
		}
		
		$stmt = $conn->prepare($sql);

		if($_POST["action"] != 3){
			$stmt->bindParam(':numVol', $numVol, PDO::PARAM_STR, 50);
			$stmt->bindParam(':compagnie', $compagnie, PDO::PARAM_STR, 50);
			$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
			$stmt->bindParam(':depart', $depart, PDO::PARAM_STR, 50);
			$stmt->bindParam(':dateDepart', $dateDepart, PDO::PARAM_STR, 50);
			$stmt->bindParam(':lieuDepart', $lieuDepart, PDO::PARAM_STR, 50);
			$stmt->bindParam(':lieuDestination', $lieuDestination, PDO::PARAM_STR, 50);
			$stmt->bindParam(':prixP', $prixP, PDO::PARAM_STR, 50);
			$stmt->bindParam(':nbPassager', $nbPassager, PDO::PARAM_STR, 50);
			$stmt->bindParam(':dureeVol', $dureeVol, PDO::PARAM_STR, 50);
			$stmt->bindParam(':escale', $escale, PDO::PARAM_STR, 50);
			$stmt->bindParam(':villeEscale', $villeEscale, PDO::PARAM_STR, 50);
			$stmt->bindParam(':dureeEscale', $dureeEscale, PDO::PARAM_STR, 50);
			$stmt->bindParam(':repas', $repas, PDO::PARAM_STR, 50);
		} else {
			$stmt->bindParam(':numVol', $numVol, PDO::PARAM_STR, 50);
		}		
					
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo utf8_encode(json_encode($rs));
				
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>