$(document).ready(function(){	
	$.ajax({
		type: "GET",
		url: "scripts/user/gestionReservation.php",
		data: {table: "reservation"},
		dataType: "json",
		success: function(data) {
			var liste = "";
			
			for(var r of data) {
				liste += '<tr><td>' + r.idReservation + '</td>'
				liste += '<td>' + r.numVol + '</td>'
				liste += '<td>' + r.dateDepart + '</td>'
				liste += '<td><a href="destination.php?desti=' + r.destination + '">' + r.destination + '</a>, ' + r.lieuDestination + '</td>'
				liste += '<td><a href="hotel.php?idHotel=' + r.idHotel + '">' + r.nom + '</a></td>'
				liste += '<td><a href="location.php?idLocation=' + r.idLocation + '">' + r.marque + ' ' + r.modele + '</a></td></tr>'
			}

			$("#liste").html(liste);
			console.log(liste);
			$('#tableau').DataTable();
		},
		error: function(){
			$("#liste").html("ERROR");
		}
	});
})