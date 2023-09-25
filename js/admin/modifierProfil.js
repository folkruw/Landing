$(document).ready(function(){
	const paramName = "profil";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(paramName) == 0) {
			profil = c.substring(paramName.length + 1, c.length);
		}
	}
	
	$.ajax({
		type: "POST",
		url: "scripts/profil.php?pseudo=" + profil,
		data: {table: "client"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			var i = 0;
			for(var r of data) {
				document.getElementById("prenom").value = r.prenom;
				document.getElementById("responsable").value = r.responsable;
				document.getElementById("nom").value = r.nom;
				document.getElementById("pseudo").value = r.pseudo;
				document.getElementById("role").value = r.role;
				document.getElementById("mail").value = r.mail;
				document.getElementById("numTel").value = r.numTel;
				document.getElementById("pays").value = r.pays;
				document.getElementById("province").value = r.province;
				document.getElementById("localite").value = r.localite;
				document.getElementById("cp").value = r.cp;
				document.getElementById("adresse").value = r.adresse;
				document.getElementById("numero").value = r.numero;
				document.getElementById("actif").value = r.actif;
				
				if(r.role == 1){
					$("#roleTexte").html("Utilisateur");
					
					// Masque l'emplacement pour le responsable car ce n'est pas une société
					var x = document.getElementById("emplacementResponsable");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}	
				} else if (r.role == 2){
					$("#roleTexte").html("Administrateur");
					
					// Masque l'emplacement pour le responsable car ce n'est pas une société
					var x = document.getElementById("emplacementResponsable");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					} 	
				} else {
					$("#roleTexte").html("Société");
					
					// Masque l'emplacement pour le prénom car ce n'est pas un particulier
					var x = document.getElementById("emplacementPrenom");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}					
				}
			}	
		}
	});
	
	$("#miseajour").submit(function(event){
		// Pour empêcher que le formulaire soit posté de façon classique,
		// de cette façon, la page n'est pas automatiquement rechargée non plus.
		event.preventDefault();
		
		// "this" est dans ce contexte le formulaire     
		// Serialiser les données du formulaire		
		var serializedData = $(this).serialize();
		
		// Désactiver tous les champs d'entrée pendant le traitement
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var nom  		= $('#nom').val();
		var prenom 		= $('#prenom').val();
		var pseudo 		= $('#pseudo').val();
		var responsable	= $('#responsable').val();
		var role 		= $('#role').val();
		var numTel  	= $('#numTel').val();
		var pays  		= $('#pays').val();
		var province  	= $('#province').val();
		var localite  	= $('#localite').val();
		var cp  		= $('#cp').val();
		var adresse  	= $('#adresse').val();
		var numero  	= $('#numero').val();
		var actif  		= $('#actif').val();
		  
		if(!nom || !mail) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// Spécification de l'URL qui va ajouté à la DB
			var url = 'scripts/update.php';
			$.post( url, {nom: nom, prenom: prenom, pseudo: pseudo, responsable: responsable, numTel: numTel, pays: pays, province: province, localite: localite, cp: cp, adresse: adresse, numero: numero, role: role, actif: actif})
			location.reload();
		}				
	 });
})