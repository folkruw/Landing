$(document).ready(function(){	
	const locationsParam = "locations";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(locationsParam) == 0) {
			var locations = c.substring(locationsParam.length + 1, c.length);
		}
	}
	locations = locations.replace("_", " ");
	
	if(locations == 'vide'){
		$.ajax({
			type: "GET",
			url: "scripts/societe/gestionLocation.php",
			data: {table: "locations"},
			dataType: "json",
			success: function(data) {
				var liste = "";
				
				for(var r of data) {
					liste += '<tr><td><a href="compte.php" onclick=\'page("3_gestionLocation", "locations='+ r.idLocation +'");\'>Gérer</a></td>'
					liste += '<td>' + r.classe + '</td>'
					liste += '<td>' + r.marque + '</td>'
					liste += '<td>' + r.modele + '</td>'
					liste += '<td>' + r.prix + '</td>'
					liste += '<td>' + r.caution + '</td>'
					liste += '<td><a href="location.php?idLocation=' + r.idLocation + '">Accéder à sa page</a></td></tr>'
				}
				
				$("#liste").html(liste);
				$('#tableau').DataTable();
			},
			error: function(){
				$("#liste").html("ERROR");
			}
		});
	} else if (locations == 'nouveau') {
		
	} else {
		// Si une locations est présente
		$.ajax({
			type: "POST",
			url: "scripts/societe/obtenirLocation.php?locations=" + locations,
			data: {table: "locations"},
			dataType: "json",
			success: function(data) {
				var html = "" ;
				var i = 0;
				for(var r of data) {
					document.getElementById("idLocation").value = r.idLocation;
					document.getElementById("note").value = r.note;
					document.getElementById("classe").value = r.classe;
					document.getElementById("prix").value = r.prix;
					document.getElementById("caution").value = r.caution;
					document.getElementById("assurance").value = r.assurance;
					document.getElementById("marque").value = r.marque;
					document.getElementById("modele").value = r.modele;
					document.getElementById("nbPlace").value = r.nbPlace;
					document.getElementById("image").value = r.image;
					document.getElementById("descrip").value = r.descrip;
					$("#img").html('<img src="' + r.image + '" width="600" height="350"></img>');
				}	
			}
		});
	}
})