function chargementVol(destination){
		$.ajax({
			type: "POST",
			url: "scripts/listeVol.php?destination=" + destination + "&limite=8",
			data: {table: "vol"},
			dataType: "json",
			success: function(data) {
				var html = "" ;
				for(var r of data) {
					html+= '<div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">'
					html+= '<div class="card mb-1 transition-3d-hover shadow-hover-2 tab-card h-100">'
					html+= '<div class="position-relative mb-2">'
					html+= '<a href="destination.php?desti='+ r.destination +'" class="d-block gradient-overlay-half-bg-gradient-v5">'
					html+= '<img class="card-img-top" src="images/default/plane.jpg" alt="img" width="100" height="200"></a>'
					html+= '<div class="position-absolute bottom-0 left-0 right-0">'
					html+= '<div class="justify-content-between align-items-center">'
					html+= '<div class="px-3 pb-2">'
					html+= '<span class="text-white font-weight-bold font-size-12">Numéro de vol</span><span class="text-white font-weight-bold font-size-16"><br>' + r.numVol + '</span>'
					html+= '<h2 class="h5 text-white mb-0 font-weight-bold"><small class="mr-2">Prix/passager : </small>' + r.prixP + ' €</h2></div></div></div></div>'
					html+= '<div class="card-body px-4 py-2">'
					html+= '<a class="d-block">'
					html+= '<div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">'
					html+= '<i class="icon flaticon-pin-1 mr-2 font-size-12"> De ' + r.lieuDepart + '<br> à ' + r.lieuDestination + '</i></div></a>'
					html+= '<div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">'
					html+= '<i class="icon mr-2 font-size-14"></i>Date du vol : ' + r.formatDate + '</div>'
					html+= '<div class="mb-1 d-flex align-items-center font-size-14 text-gray-1">'
					html+= '<i class="icon flaticon-clock-circular-outline mr-2 font-size-14"></i>' + r.dureeVol + '</div>'
					html+= '<a href="destination.php?desti='+ r.destination +'" class="card-title text-dark font-size-17 font-weight-bold">' + r.destination + ' </a></div></div></div>'
				}				
				$("#volTrending").html(html) ;
			},
			error: function(){
				$("#volTrending").html("ERROR") ;
			}
	});
}