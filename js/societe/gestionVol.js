Number.prototype.pad = function(size) {
    var s = String(this);
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
}

function chargementCompagnie(compagnie){
	$.ajax({
		type: "GET",
		url: "scripts/societe/obtenirCompagnie.php",
		data: {table: "client"},
		dataType: "json",
		success: function(data) {
			var html = '<option value="" disabled></option>';
			for(var r of data) {
				if(r.nom != compagnie){html += '<option value="' + r.nom + '">' + r.nom + '</option>' }
				else if(r.nom == compagnie){html += '<option value="' + r.nom + '" selected>' + r.nom + '</option>'}
			}				
			$("#listeCompagnie").html(html);
		},
		error: function(){
			$("#listeCompagnie").html("ERROR");
		}
	});
}

function chargementDestination(destination, depart){
	$.ajax({
		type: "GET",
		url: "scripts/societe/gestionDestination.php",
		data: {table: "destination"},
		dataType: "json",
		success: function(data) {
			var html = '';
			var html2 = '';
			for(var r of data) {
				if(r.destination != destination){html += '<option value="' + r.destination + '">' + r.destination + ', ' + r.nomPays + '</option>' }
				else if(r.destination == destination){html += '<option value="' + r.destination + '" selected>' + r.destination + ', ' + r.nomPays + '</option>'}
				if(r.destination != depart){html2 += '<option value="' + r.destination + '">' + r.destination + ', ' + r.nomPays + '</option>' }
				else if(r.destination == depart){html2 += '<option value="' + r.destination + '" selected>' + r.destination + ', ' + r.nomPays + '</option>'}
			}				
			$("#listeDestination").html(html);
			$("#listeDestination2").html(html2);
		},
		error: function(){
			$("#listeDestination").html("ERROR");
		}
	});
}

function dernierNumero(compagnie){
	$.ajax({
		type: "GET",
		url: "scripts/societe/obtenirDernierNumero.php?compagnie=" + compagnie,
		data: {table: "client"},
		dataType: "json",
		success: function(data) {
			if(data.length != 0){
				for(var r of data) {
					nomComp = compagnie.toUpperCase().replace(/\s/g, '')
					document.getElementById("numVol").value = nomComp.substring(0, 4) + '' + (parseInt(r.numVol.substring(4, 9)) + 1).pad(4);
				}
			} else {
				document.getElementById("numVol").value = compagnie.substring(0, 4).toUpperCase().replace(/\s/g, '') + '0001';
			}
		}, error: function(request, error){
			console.log(error);
		}
	});
}

function changementNumero(){
	dernierNumero(document.getElementById("listeCompagnie").value);
}

$(document).ready(function(){	
	const volParam = "vol";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(volParam) == 0) {
			var vol = c.substring(volParam.length + 1, c.length);
		}
	}
	vol = vol.replace("_", " ");
	
	if(vol == 'vide'){
		$.ajax({
			type: "GET",
			url: "scripts/societe/gestionVol.php",
			data: {table: "vol"},
			dataType: "json",
			success: function(data) {
				var liste = "";
				
				for(var r of data) {
					liste += '<tr><td><a href="compte.php" onclick=\'page("3_gestionVol", "vol='+ r.numVol +'");\'>Gérer</a></td>'
					liste += '<td>' + r.numVol + '</td>'
					liste += '<td>' + r.compagnie + '</td>'
					liste += '<td>' + r.dureeVol + '</td>'
					liste += '<td>' + r.dateDepart + '</td>'
					liste += '<td>' + r.heureDepart + '</td>'
					liste += '<td>' + r.depart + '</td>'
					liste += '<td>' + r.destination + '</td>'
					liste += '<td>' + r.nbPassager + '</td></tr>'
				}
				
				$("#liste").html(liste);
				$('#tableau').DataTable();
			},
			error: function(){
				$("#liste").html("ERROR");
			}
		});
	} else if (vol == 'nouveau') {
		chargementCompagnie('');
		chargementDestination('', '');		
	} else {
		// Si une vol est présente
		$.ajax({
			type: "POST",
			url: "scripts/societe/obtenirVol.php?vol=" + vol,
			data: {table: "vol"},
			dataType: "json",
			success: function(data) {
				var html = "" ;
				var i = 0;
				for(var r of data) {
					chargementCompagnie(r.compagnie);
					chargementDestination(r.destination, r.depart);
					document.getElementById("numVol").value = r.numVol;
					document.getElementById("listeCompagnie").value = r.compagnie;
					document.getElementById("nbPassager").value = r.nbPassager;
					document.getElementById("prixP").value = r.prixP;
					document.getElementById("listeDestination").value = r.destination;
					document.getElementById("dateDepart").value = r.dateDepart2;
					document.getElementById("heureDepart").value = r.heureDepart;
					document.getElementById("minuteDepart").value = r.minuteDepart;
					document.getElementById("heureDuree").value = r.heureDuree;
					document.getElementById("minuteDuree").value = r.minuteDuree;
					document.getElementById("lieuDepart").value = r.lieuDepart;
					document.getElementById("lieuDestination").value = r.lieuDestination;
					document.getElementById("lieuDestination2").value = r.lieuDestination2;
					document.getElementById("escale").value = r.escale;
					document.getElementById("villeEscale").value = r.villeEscale;
					document.getElementById("dureeEscale").value = r.dureeEscale;
					document.getElementById("repas").value = r.repas;
				}	
			}
		});
	}
})