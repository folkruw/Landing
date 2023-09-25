<?php
	function connectDB($host, $bdname, $user, $pass){
		try {
			$conn = new PDO('mysql:host=' . $host .';dbname=' . $bdname . ';charset=utf8', $user, $pass);
		} catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
		return $conn;
	}
	
	$conn=connectDB("localhost","db_landing", "admin", "jDJOCfv41WM8BpMp");
?>