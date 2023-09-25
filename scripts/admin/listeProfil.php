<?php
	if(!isset($_SESSION)){session_start();}
	if(!isset($_SESSION['role'])){header('Location: ../../index.php');} 
	if($_SESSION['role'] != 2){header('Location: ../../index.php');} 
	
	header('Content-Type: text/html; charset=utf-8');
	require_once '../../configurationBDO.php';
	try {
		$sql = "SELECT * FROM client ORDER BY nom";	  
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);		
		echo utf8_encode(json_encode($rs));
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;
?>