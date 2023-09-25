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
	paramHotel = hotel.replace("_", " ");
		
	$("#ajoutModif").submit(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var idHotel		= $('#idHotel').val();
		var hotel		= $('#hotel').val();
		var listeDestination	= $('#listeDestination').val();
		var adresse		= $('#adresse').val();
		var prix		= $('#prix').val();
		var typeChambre	= $('#typeChambre').val();
		var descrip		= document.getElementById("descrip").value;
		var nbPlace		= $('#nbPlace').val();
		var image		= $('#image').val();

		if(!hotel || !idHotel  || !listeDestination) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// Spécification de l'URL qui va ajouté à la DB
			// 1 = mise à jour
			// 2 = ajout
			if(paramHotel == "nouveau") {
				var url = 'scripts/societe/operationsHotel.php';
				var action = 2;
			} else if (paramHotel != "nouveau" && paramHotel != "vide") {
				var url = 'scripts/societe/operationsHotel.php';
				var action = 1;
			}
			$.post( url, {action: action, idHotel: idHotel, hotel: hotel, listeDestination: listeDestination, adresse: adresse, prix: prix, typeChambre: typeChambre, descrip: descrip, nbPlace: nbPlace, image: image})
			
			if(paramHotel == "nouveau") {
				page("3_gestionHotel", "hotel=vide");
				loadPage();
			} else if (paramHotel != "nouveau" && paramHotel != "vide") {
				location.reload();
			}
		}				
	 });
	 
	 $("#suppression").click(function(event){
		event.preventDefault();
		var serializedData = $(this).serialize();
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);
				
		var idHotel	= $('#idHotel').val();
		
		if(!idHotel) { 
			// Informe qu'il manque des données
			alert("Données manquantes.");
		} else {
			// 3 = suppression
			if(paramHotel != "nouveau") {
				var url = 'scripts/societe/operationsHotel.php';
				var action = 3;
				$.post( url, {action: action, idHotel: idHotel})
				page("3_gestionHotel", "hotel=vide");
				loadPage();
			}
		}				
	 });
})