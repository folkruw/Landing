<?php
	include("../../configurationBDO.php");
	$sql= "TRUNCATE `db_landing`.`vol`;";
	// $conn->query($sql);
	
	
	$compagnie = ['United Airlines', 'Air France', 'Air Belgique', 'Emirates Fly'];
	$listDest = ['Casablanca', 'Dubaï', 'Malé', 'New York', 'Port-Au-Prince', 'Rome', 'Bruxelles', 'Londres', 'San Francisco'];
	$listArr = ['Mohammed V Airport', 'Dubai International Airport', 'Malé Airport', 'John F. Kennedy International Airport', 'Port-Au-Prince Airport', 'Rome Airport', 'Bruxelles Airport', 'London Airport', 'San Francisco International Airport'];
	$date; 
	$dep;
	$arr;
	$dest;
		
	function info(){
		global $compagnie;
		global $listDest;
		global $listArr;
		global $date, $dep, $arr, $dest, $depp;
	
					// mois			// Jour			// heure	// minute	// seconde
		$date = "2022-".rand(5, 8).'-'.rand(1, 30). ' '.rand(1, 23).':'.rand(1, 59).':00';
		$max = 8;
		$choix = rand(0, $max);
		$choix2 = rand(0, $max);
		if($choix != $choix2) {
			$dep = $listArr[$choix];
			$arr = $listArr[$choix2];
			$depp = $listDest[$choix];
			$dest = $listDest[$choix2];
		} else {
			while($choix == $choix2){
				$choix = rand(0, $max);
				$choix2 = rand(0, $max);
			}
			$dep = $listArr[$choix2];
			$arr = $listArr[$choix];
			$depp = $listDest[$choix2];
			$dest = $listDest[$choix];
		}
	}
	
	for($i = 1; $i <= 1200; $i++){	
		
		info();
		echo $sql1 = "INSERT INTO `vol`(`numVol`, `compagnie`, `dateDepart`, `lieuDepart`, `lieuDestination`, `depart`, `destination`, `prixP`, `nbPassager`, `dureeVol`, `escale`, `villeEscale`, `dureeEscale`, `repas`) VALUES ('AIRF".sprintf("%04d", $i)."','".$compagnie[1]."', '".$date."', '".$dep."', '".$arr."', '".$depp."', '".$dest."', '".rand(10, 450)."', '".rand(25, 450)."','".rand(1, 23).':'.rand(1, 59).':00'."','0','','00:00:00','".rand(0, 1)."');";
		
		info();
		echo $sql2 = "INSERT INTO `vol`(`numVol`, `compagnie`, `dateDepart`, `lieuDepart`, `lieuDestination`, `depart`, `destination`, `prixP`, `nbPassager`, `dureeVol`, `escale`, `villeEscale`, `dureeEscale`, `repas`) VALUES ('AIRB".sprintf("%04d", $i)."','".$compagnie[2]."', '".$date."', '".$dep."', '".$arr."', '".$depp."', '".$dest."', '".rand(10, 450)."', '".rand(25, 450)."','".rand(1, 23).':'.rand(1, 59).':00'."','0','','00:00:00','".rand(0, 1)."');";
		
		info();
		echo $sql3 = "INSERT INTO `vol`(`numVol`, `compagnie`, `dateDepart`, `lieuDepart`, `lieuDestination`, `depart`, `destination`, `prixP`, `nbPassager`, `dureeVol`, `escale`, `villeEscale`, `dureeEscale`, `repas`) VALUES ('UNIT".sprintf("%04d", $i)."','".$compagnie[0]."', '".$date."', '".$dep."', '".$arr."', '".$depp."', '".$dest."', '".rand(10, 450)."', '".rand(25, 450)."','".rand(1, 23).':'.rand(1, 59).':00'."','0','','00:00:00','".rand(0, 1)."');";
		
		info();
		echo $sql4 = "INSERT INTO `vol`(`numVol`, `compagnie`, `dateDepart`, `lieuDepart`, `lieuDestination`, `depart`, `destination`, `prixP`, `nbPassager`, `dureeVol`, `escale`, `villeEscale`, `dureeEscale`, `repas`) VALUES ('EMIR".sprintf("%04d", $i)."','".$compagnie[3]."', '".$date."', '".$dep."', '".$arr."', '".$depp."', '".$dest."', '".rand(10, 450)."', '".rand(25, 450)."','".rand(1, 23).':'.rand(1, 59).':00'."','0','','00:00:00','".rand(0, 1)."');";
		
		
		// $conn->query($sql1);
		// $conn->query($sql2);
		// $conn->query($sql3);
		// $conn->query($sql4);
		
	}
	
	$sql = "DELETE FROM `vol` WHERE dateDepart = '0000-00-00 00:00:00'";
	//	$conn->query($sql);
?>