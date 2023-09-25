<?php
	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		$destination = $_POST["destination"];
		$pays = $_POST["pays"];
		$descrip = $_POST["descrip"];
		$photo = $_POST["photo"];
		
		if($_GET["action"] == 1){
			$sql = "UPDATE `destination` SET `destination`=:destination, `pays`=:pays, `descrip`=:descrip, `photo`=:photo WHERE destination=:destination";
		} else if ($_GET["action"] == 2){
			$sql = "INSERT INTO `destination`(`destination`, `pays`, `nbBilletVendu`, `descrip`, `photo`) VALUES (:destination, :pays, 0, :descrip, :photo)";
		} else if ($_GET['action'] == 3){
			$sql = "DELETE FROM `destination` WHERE `destination` = :destination AND `pays` = :pays AND `descrip` = :descrip AND `photo` = :photo";
		}
		
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':destination', $destination, PDO::PARAM_STR, 50);
		$stmt->bindParam(':pays', $pays, PDO::PARAM_STR, 50);
		$stmt->bindParam(':descrip', $descrip, PDO::PARAM_STR, 50);
		$stmt->bindParam(':photo', $photo, PDO::PARAM_STR, 50);
					
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		echo utf8_encode(json_encode($rs));
				
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>