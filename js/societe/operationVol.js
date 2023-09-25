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
	paramVol = vol.replace("_", " ");
		
	$("#ajoutModif").submit(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var numVol				= $('#numVol').val();
		var listeCompagnie		= $('#listeCompagnie').val();
		var listeDestination	= $('#listeDestination').val();
		var listeDestination2	= $('#listeDestination2').val();
		var heureDepart			= $('#heureDepart').val();
		var minuteDepart		= $('#minuteDepart').val();
		var heureDuree			= $('#heureDuree').val();
		var minuteDuree			= $('#minuteDuree').val();
		var nbPassager			= $('#nbPassager').val();
		var prixP				= $('#prixP').val();
		var dateDepart			= $('#dateDepart').val();
		dateDepart = dateDepart.substring(0, 4) + "-" + dateDepart.substring(5, 7) + "-" + dateDepart.substring(8, 10);
		var lieuDepart			= $('#lieuDepart').val();
		var lieuDestination		= $('#lieuDestination').val();
		var escale				= $('#escale').val();
		var villeEscale			= $('#villeEscale').val();
		var dureeEscale			= $('#dureeEscale').val();
		var repas				= $('#repas').val();

		if(!numVol  || !dateDepart) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// Spécification de l'URL qui va ajouté à la DB
			// 1 = mise à jour
			// 2 = ajout
			if(paramVol == "nouveau") {
				var url = 'scripts/societe/operationsVol.php?action=2';
			} else if (paramVol != "nouveau" && paramVol != "vide") {
				var url = 'scripts/societe/operationsVol.php?action=1';
			}
			
			$.post( url, {numVol: numVol, listeCompagnie: listeCompagnie, listeDestination: listeDestination, listeDestination2: listeDestination2, heureDepart: heureDepart, minuteDepart: minuteDepart, heureDuree: heureDuree, minuteDuree: minuteDuree, nbPassager: nbPassager, prixP: prixP, dateDepart: dateDepart, lieuDepart: lieuDepart, lieuDestination: lieuDestination, escale: escale, villeEscale: villeEscale, dureeEscale: dureeEscale, repas: repas})
			
			if(paramVol == "nouveau") {
				page("3_gestionVol", "vol=vide");
				loadPage();
			} else if (paramVol != "nouveau" && paramVol != "vide") {
				location.reload();
			}
		}				
	 });
	 
	 $("#suppression").click(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var numVol	= $('#numVol').val();
		
		if(!numVol) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// 3 = suppression
			if(paramVol != "nouveau") {
				var url = 'scripts/societe/operationsVol.php?action=3';
				$.post( url, {numVol: numVol})
				page("3_gestionVol", "vol=vide");
				loadPage();
			}
		}				
	 });
})