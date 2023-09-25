function chargementDestination(destination){
	$.ajax({
		type: "GET",
		url: "scripts/societe/gestionDestination.php",
		data: {table: "destination"},
		dataType: "json",
		success: function(data) {
			var html = '';
			for(var r of data) {
				if(r.destination != destination){html += '<option value="' + r.destination + '">' + r.destination + ', ' + r.nomPays + '</option>' }
				else if(r.destination == destination){html += '<option value="' + r.destination + '" selected>' + r.destination + ', ' + r.nomPays + '</option>'}
			}				
			$("#listeDestination").html(html);
		},
		error: function(){
			$("#listeDestination").html("ERROR");
		}
	});
}

$(document).ready(function(){	
	const hotelParam = "hotel";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(hotelParam) == 0) {
			var hotel = c.substring(hotelParam.length + 1, c.length);
		}
	}
	hotel = hotel.replace("_", " ");
	
	if(hotel == 'vide'){
		$.ajax({
			type: "GET",
			url: "scripts/societe/gestionHotel.php",
			data: {table: "hotel"},
			dataType: "json",
			success: function(data) {
				var liste = "";
				
				for(var r of data) {
					liste += '<tr><td><a href="compte.php" onclick=\'page("3_gestionHotel", "hotel='+ r.idHotel +'");\'>Gérer</a></td>'
					liste += '<td>' + r.destination + '</td>'
					liste += '<td>' + r.nom + '</td>'
					liste += '<td>' + r.adresse + '</td>'
					liste += '<td>' + r.typeChambre + '</td>'
					liste += '<td><a href="hotel.php?idHotel=' + r.idHotel + '">Accéder à sa page</a></td></tr>'
				}
				
				$("#liste").html(liste);
				$('#tableau').DataTable();
			},
			error: function(){
				$("#liste").html("ERROR");
			}
		});
	} else if (hotel == 'nouveau') {
		chargementDestination('');
	} else {
		// Si une hotel est présente
		$.ajax({
			type: "POST",
			url: "scripts/societe/obtenirHotel.php?hotel=" + hotel,
			data: {table: "hotel"},
			dataType: "json",
			success: function(data) {
				var html = "" ;
				var i = 0;
				for(var r of data) {
					chargementDestination(r.destination);
					document.getElementById("idHotel").value = r.idHotel;
					document.getElementById("hotel").value = r.nom;
					document.getElementById("adresse").value = r.adresse;
					document.getElementById("prix").value = r.prix;
					document.getElementById("typeChambre").value = r.typeChambre;
					document.getElementById("descrip").value = r.descrip;
					document.getElementById("nbPlace").value = r.nbPlace;
					document.getElementById("image").value = r.image;
					$("#img").html('<img src="' + r.image + '" width="600" height="350"></img>');
				}	
			}
		});
	}
})