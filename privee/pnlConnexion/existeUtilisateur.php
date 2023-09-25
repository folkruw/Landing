<?php

	header('Content-Type: text/html; charset=utf-8');
	include ('../../configurationBDO.php'); 
	try {
		if(isset($_GET["motdepasse"])){
			$motdepasse = trim($_GET["motdepasse"]);
		} else {
			$motdepasse = trim($_GET["motdepasseU"]);
		}
		
		if(isset($_GET["pseudo"])){
			$pseudo = $_GET["pseudo"];
		} else if(isset($_GET["pseudoE"])) {
			$pseudo = $_GET["pseudoE"];
		} else {
			$pseudo = $_GET["pseudoU"];
		}
		// SQL 
		$sql = "SELECT * FROM client WHERE pseudo=:pseudo";

		// Prepare statement
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 50);
		
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// L'opérateur de résolution de portée "double deux-points" (::), fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.
		if($stmt->rowCount() != 0){
			if(password_verify($motdepasse, $rs['0']['motdepasse']) == 1){echo utf8_encode(json_encode($rs));}else{echo "[]";}
		} else {
			echo "[]";
		}
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>