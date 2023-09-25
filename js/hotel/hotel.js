function chargementHotel(hotel){
	$.ajax({
		type: "POST",
		url: "scripts/hotel/hotel.php?idHotel=" + hotel,
		data: {table: "hotel"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {
				$("#titre").html(r.nom);
				$("#pageNom").html(r.nom);
				$("#titreHotel").html(r.nom);
				$("#adresse").html(r.adresse);
				$("#descrip").html(r.descrip);
				$("#typeChambre").html("Chambre " + r.typeChambre);
				if(r.typeChambre == "Double"){
					$("#dimension").html("30 m²");
					
					$("#infoChambre").html('<li class="border border-blue bg-blue rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0 mb-md-0">                    <span class="font-weight-normal font-size-14 text-white">Chambre double</span></li>');
				} else if(r.typeChambre == "Deluxe"){
					$("#dimension").html("40 m²");
					
					$("#infoChambre").html('<li class="border border-brown bg-brown rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0">                    <span class="font-weight-normal text-white font-size-14">Chambre deluxe</span></li>');				
				} else if(r.typeChambre == "Premium"){
					$("#dimension").html("50 m²");
					
					$("#infoChambre").html('<li class="border border-maroon bg-maroon rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0 mb-md-0"><span class="font-weight-normal font-size-14 text-white">Chambre premium</span></li>');
				} else {
					$("#dimension").html("20 m²");
				}
				$("#prix").html(r.prix + " €");
				$("#prix2").html(r.prix + " €");
				$("#miniature").html('<img class="img-fluid border-radius-3 height-110" src="'+r.image+'" alt="Image Description">');
				$("#grandePhoto").html('<img class="img-fluid border-radius-3" src="'+r.image+'" alt="Image Description">');
			}							
		},
		error: function(){
			$("#hotel").html("ERROR");
		}
	});	
}

function chargementHotelTrending(destination){
		$.ajax({
			type: "POST",
			url: "scripts/listeHotel.php?destination=" + destination + "&limite=8",
			data: {table: "hotel"},
			dataType: "json",
			success: function(data) {
				var html = "" ;
				for(var r of data) {
					html+= '<div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">'
					html+= '<div class="card mb-1 transition-3d-hover shadow-hover-2 tab-card h-100">'
					html+= '<div class="position-relative mb-2">'
					html+= '<a href="hotel.php?idHotel='+ r.idHotel +'" class="d-block gradient-overlay-half-bg-gradient-v5">'
					html+= '<img class="card-img-top" src="' + r.image + '" alt="img" width="100" height="200"></a>'
					html+= '<div class="position-absolute bottom-0 left-0 right-0">'
					html+= '<div class="justify-content-between align-items-center">'
					html+= '<div class="px-3 pb-2">'
					html+= '<span class="text-white font-weight-bold font-size-16">' + r.nom + '</span>'
					html+= '<h2 class="h5 text-white mb-0 font-weight-bold"><small class="mr-2">Prix par nuit</small>' + r.prix + ' €</h2></div></div></div></div>'
					html+= '<div class="card-body px-4 py-2">'
					html+= '<a href="hotel.php?idHotel='+ r.idHotel +'" class="d-block">'
					html+= '<div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">'
					html+= '<i class="icon flaticon-pin-1 mr-2 font-size-15"></i>' + r.adresse + '</div></a>'
					html+= '<a href="hotel.php?idHotel='+ r.idHotel +'" class="card-title text-dark font-size-20 font-weight-bold">Chambre : ' + r.typeChambre + '</a></div></div></div>'
				}				
				$("#hotelTrending").html(html) ;
			},
			error: function(){
				$("#hotelTrending").html("ERROR") ;
			}
	});
}