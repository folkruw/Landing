$(document).ready(function(){
	const cookieName = "pseudo";
	const cookieName2 = "role";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(cookieName) == 0) {
			var pseudo = c.substring(cookieName.length + 1, c.length);
		}
		if (c.indexOf(cookieName2) == 0) {
			var role = c.substring(cookieName2.length + 1, c.length);
		}
	}	
	
	$.ajax({
		type: "POST",
		url: "scripts/profil.php?pseudo=" + pseudo,
		data: {table: "client"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			var i = 0;
			for(var r of data) {
				document.getElementById("prenom").value = r.prenom;
				document.getElementById("responsable").value = r.responsable;
				document.getElementById("nom").value = r.nom;
				document.getElementById("mail").value = r.mail;
				document.getElementById("numTel").value = r.numTel;
				document.getElementById("pays").value = r.pays;
				document.getElementById("province").value = r.province;
				document.getElementById("localite").value = r.localite;
				document.getElementById("cp").value = r.cp;
				document.getElementById("adresse").value = r.adresse;
				document.getElementById("numero").value = r.numero;
				
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
		event.preventDefault();
				
		var serializedData = $(this).serialize();
				
		var nom  		= $('#nom').val();
		var prenom 		= $('#prenom').val();
		var responsable	= $('#responsable').val();
		var numTel  	= $('#numTel').val();
		var pays  		= $('#pays').val();
		var province  	= $('#province').val();
		var localite  	= $('#localite').val();
		var cp  		= $('#cp').val();
		var adresse  	= $('#adresse').val();
		var numero  	= $('#numero').val();
		  
		if(!nom || !mail) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// Spécification de l'URL qui va ajouté à la DB
			var url = 'scripts/update.php';
			$.post( url, {nom:nom, prenom: prenom, pseudo: pseudo, numTel: numTel, responsable: responsable, pays: pays, province: province, localite: localite, cp: cp, adresse: adresse, numero: numero, role: role})
			
			alert("Modifié !");
		}				
	 });
})