function chargementPays(pays){
	$.ajax({
		type: "GET",
		url: "scripts/societe/obtenirPays.php",
		data: {table: "pays"},
		dataType: "json",
		success: function(data) {
			var html = '';
			for(var r of data) {
				if(r.idPays != pays){html += '<option value="' + r.idPays + '">' + r.pays + '</option>' }
				else if(r.idPays == pays){html += '<option value="' + r.idPays + '" selected>' + r.pays + '</option>'}
			}				
			$("#pays").html(html);
		},
		error: function(){
			$("#pays").html("ERROR");
		}
	});
}

$(document).ready(function(){	
	const destinationParam = "destination";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(destinationParam) == 0) {
			var destination = c.substring(destinationParam.length + 1, c.length);
		}
	}
	destination = destination.replace("_", " ");
		
	if(destination == 'vide'){
		$.ajax({
			type: "GET",
			url: "scripts/societe/gestionDestination.php",
			data: {table: "destination"},
			dataType: "json",
			success: function(data) {
				var liste = "";
				
				for(var r of data) {
					liste += '<tr><td><a href="compte.php" onclick=\'page("3_gestionDestination", "destination='+ r.destination+'");\'>Gérer</a></td>'
					liste += '<td>' + r.nomPays + '</td>'
					liste += '<td>' + r.destination + '</td>'
					liste += '<td>' + r.nbBilletVendu + '</td>'
					liste += '<td><a href="destination.php?desti=' + r.destination + '">Accéder à sa page</a></td></tr>'
				}
				
				$("#liste").html(liste);
				$('#tableau').DataTable();
			},
			error: function(){
				$("#liste").html("ERROR");
			}
		});
	} else if (destination == 'nouveau') {
		chargementPays();
	} else {
		// Si une destination est présente
		$.ajax({
			type: "POST",
			url: "scripts/societe/obtenirDestination.php?destination=" + destination,
			data: {table: "destination"},
			dataType: "json",
			success: function(data) {
				var html = "" ;
				var i = 0;
				for(var r of data) {
					chargementPays(r.pays);
					document.getElementById("destination").value = r.destination;
					document.getElementById("nbBilletVendu").value = r.nbBilletVendu;
					document.getElementById("descrip").value = r.descrip;
					document.getElementById("photo").value = r.photo;
					$("#img").html('<img src="' + r.photo + '" width="600" height="350"></img>');
				}	
			}
		});
	}
})