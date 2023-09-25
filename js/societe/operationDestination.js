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
	paramDestination = destination.replace("_", " ");
		
	$("#ajoutModif").submit(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var destination	= $('#destination').val();
		var pays		= $('#pays').val();
		var descrip 	= document.getElementById("descrip").value;
		var photo 		= $('#photo').val();
		  
		if(!destination || !pays  || !photo) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// Spécification de l'URL qui va ajouté à la DB
			// 1 = mise à jour
			// 2 = ajout
			if(paramDestination == "nouveau") {
				var url = 'scripts/societe/operationsDestination.php?action=2';
			} else if (paramDestination != "nouveau" && paramDestination != "vide") {
				var url = 'scripts/societe/operationsDestination.php?action=1';
			}
			$.post( url, {destination: destination, pays: pays, descrip: descrip, photo: photo})
			
			if(paramDestination == "nouveau") {
				page("3_gestionDestination", "destination=" + destination);
				loadPage();
			} else if (paramDestination != "nouveau" && paramDestination != "vide") {
				location.reload();
			}
		}				
	 });
	 
	 $("#suppression").click(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var destination	= $('#destination').val();
		var pays		= $('#pays').val();
		var descrip 	= $('descrip').val();
		var photo 		= $('#photo').val();
		
		if(!destination) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// 3 = suppression
			if(paramDestination != "nouveau") {
				var url = 'scripts/societe/operationsDestination.php?action=3';
				$.post( url, {destination: destination, pays: pays, descrip: descrip, photo: photo})
				page("3_gestionDestination", "destination=vide");
				loadPage();
			}
		}				
	 });
})