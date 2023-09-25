function chargementDestination(depart, retour){
	$.ajax({
		type: "GET",
		url: "scripts/societe/gestionDestination.php",
		data: {table: "destination"},
		dataType: "json",
		async: false,
		success: function(data) {
			var html1 = '';
			var html2 = '';
			
			for(var r of data) {
				if(r.destination != depart){html1 += '<option value="' + r.destination + '">' + r.destination + ', ' + r.nomPays + '</option>' }
				else if(r.destination == depart){html1 += '<option value="' + r.destination + '" selected>' + r.destination + ', ' + r.nomPays + '</option>'}
				if(r.destination != retour){html2 += '<option value="' + r.destination + '">' + r.destination + ', ' + r.nomPays + '</option>' }
				else if(r.destination == retour){html2 += '<option value="' + r.destination + '" selected>' + r.destination + ', ' + r.nomPays + '</option>'}
			}				
			$("#departs").html(html1);
			$("#arrives").html(html2);
			chargementHotel(retour, '');
		},
		error: function(){
			$("#departs").html("ERROR");
		}
	});
}

function loadVol(){
	depart = document.getElementById('departs').value;
	destination = document.getElementById('arrives').value;
	dateDepart = document.getElementById('dateDepart').value;
	dateRetour = document.getElementById('dateRetour').value;
	
	$('#selectVolNum').html("Vol : ");
	$('#selectDateDepart').html("");
	$('#seletcDateRetour').html("");
	$('#selectDepart').html("");
	$('#selectArrive').html("");
	
	chargementHotel(destination, 0);
	
	if(!depart || !destination || !dateDepart || !dateRetour){
		return;
	}
	
	var date = dateDepart.slice(0, 3);
	if(date == "Jan"){mois = "01";}
	else if(date == "Fév"){mois = "02";}
	else if(date == "Mar"){mois = "03";}
	else if(date == "Avr"){mois = "04";}
	else if(date == "Mai"){mois = "05";}
	else if(date == "Jui"){mois = "06";}
	else if(date == "Juil"){mois = "07";}
	else if(date == "Aou"){mois = "08";}
	else if(date == "Sep"){mois = "09";}
	else if(date == "Nov"){mois = "10";}
	else if(date == "Oct"){mois = "11";}
	else if(date == "Déc"){mois = "12";}
	
	jour = dateDepart.slice(4, 6);
	annee = dateDepart.slice(8, 13);
	var dateComplet = (annee + '-' + mois + '-' + jour);

	$("#vols").html("");
	$("#vols option:selected").remove();
	
	chargementVol(depart, destination, dateComplet);
}

function chargementVol(depart, destination, dateDepart){
	$.ajax({
		type: "GET",
		url: "scripts/obtenirVol.php?depart=" + depart + "&destination=" + destination + "&dateDepart=" + dateDepart,
		data: {table: "vol"},
		dataType: "json",
		async: false,
		success: function(data) {
			var html = '<option value="Aucun"></option>';
			for(var r of data) {
				html += '<option value="' + r.numVol + '">' + r.numVol + ', départ le ' + r.dateDepart + '</option>'
			}				
			$("#vols").html(html);
		},
		error: function(){
			$("#vols").html("ERROR");
		}
	});
}

function selectVol(){
	vol = document.getElementById('vols').value;
	dateDepart = document.getElementById('dateDepart').value;
	dateRetour = document.getElementById('dateRetour').value;
	depart = document.getElementById('departs').value;
	arrive = document.getElementById('arrives').value;
	
	$('#selectVolNum').html("Vol : ");
	$('#selectDateDepart').html("");
	$('#seletcDateRetour').html("");
	$('#selectDepart').html("");
	$('#selectArrive').html("");
	
	if(!vol || !dateDepart || !dateRetour || !depart || !arrive){
		return;
	}
	
	$('#selectVolNum').html("Vol : " + vol);
	$('#selectDateDepart').html(dateDepart);
	$('#seletcDateRetour').html(dateRetour);
	$('#selectDepart').html(depart);
	$('#selectArrive').html(arrive);
	obtenirPrix();
}

function chargementHotel(destination, idHotel){
	$("#hotels").html("");
	$("#hotels option:selected").remove();
		
	$.ajax({
		type: "GET",
		url: "scripts/listeHotel.php?destination="+destination+"&limite=0",
		data: {table: "hotel"},
		dataType: "json",
		async: false,
		success: function(data) {
			var html = '<option value="Aucun">Aucun</option>';
			for(var r of data) {
				if(r.idHotel != idHotel){html += '<option value="' + r.idHotel + '">' + r.nom + '</option>' }
				else if(r.idHotel == idHotel){html += '<option value="' + r.idHotel + '" selected>' + r.nom + '</option>'}
			}				
			$("#hotels").html(html);
		},
		error: function(){
			$("#hotels").html("ERROR");
		}
	});
}

function chargementInfoHotel(){
	if(document.getElementById('hotels').value == "Aucun"){
		$('#nbNuitInfo').html("");
		$('#nbChambreInfo').html("");
		$('#nbAdulteInfo').html("");
		$('#nbEnfantInfo').html("");
		return;
	}
	
	$('#nbNuitInfo').html(document.getElementById('nbNuit').value);
	$('#nbChambreInfo').html(document.getElementById('nbChambre').value);
	$('#nbAdulteInfo').html(document.getElementById('nbAdulte').value);
	$('#nbEnfantInfo').html(document.getElementById('nbEnfant').value);
}

function chargementLocation(){
	$("#locations").html("");
	$("#locations option:selected").remove();
		
	$.ajax({
		type: "GET",
		url: "scripts/listeLocation.php?limite=0",
		data: {table: "location"},
		dataType: "json",
		success: function(data) {
			var html = '<option value="Aucun">Aucune</option>';
			for(var r of data) {
				html += '<option value="' + r.idLocation + '">' + r.marque + ' ' + r.modele + '</option>'
			}				
			$("#locations").html(html);
		},
		error: function(){
			$("#locations").html("ERROR");
		}
	});
}

function chargementPays(pays){
	$.ajax({
		type: "GET",
		url: "scripts/societe/obtenirPays.php",
		data: {table: "pays"},
		dataType: "json",
		async: false,
		success: function(data) {
			var html = '<label class="form-label" > Pays </label>';
			html+= '<select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" required id="listePays">';
			
			for(var r of data) {
				if(r.pays != pays){html += '<option value="' + r.pays + '">' + r.pays + '</option>' }
				else if(r.pays == pays){
					html += '<option value="' + r.pays + '" selected>' + r.pays + '</option>'
					$("#recapPays").html(r.pays);
				}
			}

			html+= '</select>';
			$("#lesPays").html(html);
		},
		error: function(){
			$("#lesPays").html("ERROR");
		}
	});
}

function chargementInfoClient(pseudo){
	$.ajax({
		type: "POST",
		url: "scripts/profil.php?pseudo=" + pseudo,
		data: {table: "client"},
		dataType: "json",
		async: false,
		success: function(data) {
			var html = "" ;
			for(var r of data) {
				chargementPays(r.pays);
				document.getElementById("prenom").value = r.prenom;
				document.getElementById("nom").value = r.nom;
				document.getElementById("mail").value = r.mail;
				document.getElementById("numTel").value = r.numTel;
				document.getElementById("province").value = r.province;
				document.getElementById("localite").value = r.localite;
				document.getElementById("cp").value = r.cp;
				document.getElementById("adresse").value = r.adresse;
				document.getElementById("numero").value = r.numero;
				document.getElementById("idClient").value = r.idClient;
				
				$("#recapPrenom").html(r.prenom);
				$("#recapNom").html(r.nom);
				$("#recapMail").html(r.mail);
				$("#recapAdresse").html(r.numero + ", " + r.adresse);
				$("#province").html(r.province);
				$("#recapVille").html(r.localite);
				$("#recapCp").html(r.cp);
			}							
		},
		error: function(){
			$("#hotel").html("ERROR");
		}
	});	
}

function obtenirPrix(){
	var total = 0;
	var sousTotal = 0;
	var prixHotel = 0;
	var prixVoiture = 0;
	
	// Prix Hotel
	if(document.getElementById('hotels').value != "Aucun"){
		$.ajax({
			type: "GET",
			url: "scripts/societe/obtenirHotel.php?hotel=" + document.getElementById('hotels').value,
			data: {table: "hotel"},
			dataType: "json",
			async: false,
			success: function(data) {
				$("#supp").html(0);
				for(var r of data) {
					prixHotel = (r.prix * document.getElementById('nbChambre').value) * document.getElementById('nbNuit').value;
				}
				
				$("#supp").html((parseInt(prixHotel) + parseInt(prixVoiture)).toFixed(2) + ' €');
			},
			error: function(){
			}
		});
	}
	
	// Prix voiture
	if(document.getElementById('locations').value != "Aucun"){
		$.ajax({
			type: "GET",
			url: "scripts/societe/obtenirLocation.php?locations=" + document.getElementById('locations').value,
			data: {table: "locations"},
			dataType: "json",
			async: false,
			success: function(data) {
				$("#supp").html(0);
				for(var r of data) {
					prixVoiture = r.prix;
				}
				console.log(prixHotel);
				$("#supp").html((parseInt(prixHotel) + parseInt(prixVoiture)).toFixed(2) + ' €');
			},
			error: function(){
			}
		});
	}
	
	// Total + vol
	if(document.getElementById('vols').value != "Aucun"){
		$.ajax({
			type: "GET",
			url: "scripts/societe/obtenirVol.php?vol=" + document.getElementById('vols').value,
			data: {table: "vol"},
			dataType: "json",
			async: false,
			success: function(data) {
				$("#total").html(0);
				$("#sousTotal").html(0);
				
				var html = '';
				nbPassager = parseInt(document.getElementById('nbEnfant').value) + parseInt(document.getElementById('nbAdulte').value);
				if(nbPassager <= 0) {nbPassager = 1};
				
				for(var r of data) {
					$("#sousTotal").html((r.prixP * nbPassager).toFixed(2) + ' €');
					
					sousTotal = r.prixP * nbPassager;
					
					$("#total").html((parseInt(sousTotal) + parseInt(prixHotel) + parseInt(prixVoiture)).toFixed(2) + ' €');
				}				
			},
			error: function(){
				$("#sousTotal").html("ERROR");
			}
		});
	}
}

function ajoutReservation(){
	var idClient				= document.getElementById("idClient").value;
	var numVol					= document.getElementById('vols').value;
	var idHotel					= document.getElementById('hotels').value;
	var idLocation				= document.getElementById('locations').value;

	if(!idClient  || !numVol) { 
		// Informe qu'il manque des données
		alert("Données manquantes.");
	} else {
		var url = 'scripts/operationReservation.php';
		var nbPassager = parseInt(document.getElementById('nbEnfant').value) + parseInt(document.getElementById('nbAdulte').value);
		var destination = document.getElementById('arrives').value;
		
		if(idHotel == "Aucun"){
			idHotel = 0;
		}
		if(idLocation == "Aucun"){
			idLocation = 0;
		}

		$.post( url, {idClient: idClient, numVol: numVol, idHotel: idHotel, idLocation: idLocation, nbPassager: nbPassager, destination: destination})
	}				
 }
