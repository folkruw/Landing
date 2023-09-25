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
	idLocation = locations.replace("_", " ");
	paramLocation = locations.replace("_", " ");
		
	$("#ajoutModif").submit(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var idLocation		= $('#idLocation').val();
		var classe			= $('#classe').val();
		var prix			= $('#prix').val();
		var assurance		= $('#assurance').val();
		var caution			= $('#caution').val();
		var marque			= $('#marque').val();
		var modele			= $('#modele').val();
		var nbPlace			= $('#nbPlace').val();
		var descrip			= $('#descrip').val();
		var note			= $('#note').val();
		var image			= $('#image').val();
		
		if(!idLocation  || !prix || !marque || !modele) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// Spécification de l'URL qui va ajouté à la DB
			// 1 = mise à jour
			// 2 = ajout
			if(paramLocation == "nouveau") {
				var url = 'scripts/societe/operationsLocation.php?action=2';
			} else if (paramLocation != "nouveau" && paramLocation != "vide") {
				var url = 'scripts/societe/operationsLocation.php?action=1';
			}
			$.post( url, {idLocation: idLocation, classe: classe, prix: prix, assurance: assurance, caution: caution, marque: marque, modele: modele, nbPlace: nbPlace, descrip: descrip, note: note, image: image})
			
			if(paramLocation == "nouveau") {
				page("3_gestionLocation", "locations=vide");
				loadPage();
				location.reload();
			} else if (paramLocation != "nouveau" && paramLocation != "vide") {
				location.reload();
			}
		}				
	 });
	 
	 $("#suppression").click(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var idLocation	= $('#idLocation').val();
		
		if(!idLocation) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// 3 = suppression
			if(paramLocation != "nouveau") {
				var url = 'scripts/societe/operationsLocation.php?action=3';
				$.post( url, {idLocation: idLocation})
				page("3_gestionLocation", "locations=vide");
				loadPage();
			}
		}				
	 });
})