<?php
	if(!isset($_SESSION)){session_start();}
	if(!isset($_SESSION['role'])){header('Location: ../../index.php');} 
	if($_SESSION['role'] != 2){header('Location: ../../index.php');} 
	

	header('Content-Type: text/html; charset=utf-8');
	include ('../configurationBDO.php'); 
	try {
		$pseudo = $_GET["pseudo"];
				
		// SQL 
		$sql = "SELECT * FROM client WHERE pseudo=:pseudo";
		
		// Prepare statement
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR, 50);
				
		$stmt->execute();
		
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		echo utf8_encode(json_encode($rs));
				
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$conn = null;  

?>