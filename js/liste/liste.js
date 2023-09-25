var nbPage;

function nombreResultat(table, where){
	$.ajax({
		type: "POST",
		url: "scripts/nombreResultat.php?table=" + table + "&where=" + where,
		data: {table: "*"},
		dataType: "json",
		success: function(data) {
			for(var r of data) {
				$("#comptage").html(r.comptage + " correspondances trouvées") ;
				nbPage = Math.round(r.comptage / 21);
			}
			return nbPage;
		},
		error: function(){
			$("#comptage").html("ERROR") ;
		}
	});
}

function chargementVol(destination, limite, page){
		$.ajax({
			type: "POST",
			url: "scripts/listeVol.php?destination=" + destination + "&limite=" + limite + "&page=" + page,
			data: {table: "vol"},
			dataType: "json",
			success: function(data) {
				$("#listeVol").html("");
				var html = "" ;
				for(var r of data) {
					html+= '<div class="col-md-6 col-lg-4 mb-3 mb-md-4 pb-1">'
					html+= '<div class="card transition-3d-hover shadow-hover-2 tab-card h-100">'
					html+= '<div class="position-relative">'
					html+= '<a href="destination.php?desti=' + r.destination + '" class="d-block gradient-overlay-half-bg-gradient-v5">'
					html+= '<img class="min-height-230 bg-img-hero card-img-top" src="images/test.jpg" alt="img"></a>'
					html+= '<div class="position-absolute bottom-0 left-0 right-0"><div class="px-4 pb-3">'
					html+= '<a href="destination.php?desti=' + r.destination + '" class="d-block">'
					html+= '<div class="d-flex align-items-center font-size-14 text-white">'
					html+= '<i class="icon flaticon-pin-1 mr-2 font-size-20"></i> ' + r.lieuDestination + ', ' + r.destination + '</div></a></div></div></div>'
					html+= '<div class="card-body pl-3 pr-4 pt-2 pb-3">'
					html+= '<a class="card-title font-size-17 font-weight-medium text-dark">De ' + r.lieuDepart + ' </a><div class="mt-2 mb-3">'
					html+= '<span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">Durée de vol : ' + r.dureeVol + '</span>'
					html+= '<span class="font-size-14 text-gray-1 ml-2">Départ le : ' + r.formatDate + ' </span></div>'
					html+= '<div class="mb-0">'
					html+= '<span class="mr-1 font-size-14 text-gray-1">A partir de </span>'
					html+= '<span class="font-weight-bold">' + r.prixP + ' € </span>'
					html+= '<span class="font-size-14 text-gray-1"> / passager</span></div></div>'
					html+= '</div></div>'
				}
				$("#listeVol").html(html);
				
				$("#navPage").html();
				var pages = '<ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2>';
				if((page - 2) > 1){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=vol&page=1">1</a></li>' }
				if((page - 3) > 1){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=vol&page=2">2</a></li>' }
				if((page - 4) > 1){ pages+= '<li class="page-item disabled"><a class="page-link font-size-14">...</a></li>' }
				for(let i = (page - 2); i < page; i++){
					if(i > 0 && i < nbPage) { pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=vol&page='+ i +'&destination='+ destination +'">'+ i +'</a></li>'  }
				}	
				for(let i = page; i < (page + 3); i++){
					if(i <= nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=vol&page='+ i +'&destination='+ destination +'">'+ i +'</a></li>' }
				}
				if((page + 4) < nbPage){ pages+= '<li class="page-item disabled"><a class="page-link font-size-14">...</a></li>' }
				if((page + 3) < nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=vol&page='+ (nbPage - 1) +'&destination='+ destination +'">'+  (nbPage - 1) +'</a></li>' }
				if((page + 2) < nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=vol&page='+ nbPage +'&destination='+ destination +'">'+ nbPage +'</a></li>' }
				pages+= '</ul>';
				$("#navPage").html(pages);
			},
			error: function(){
				$("#listeVol").html("ERROR") ;
			}
	});
}

function chargementHotel(destination, limite, page){	
		$.ajax({
			type: "POST",
			url: "scripts/listeHotel.php?destination=" + destination + "&limite=" + limite + "&page=" + page,
			data: {table: "hotel"},
			dataType: "json",
			success: function(data) {
				$("#listeHotel").html("");
				var html = "" ;
				for(var r of data) {
					html+= '<div class="col-md-6 col-lg-4 mb-3 mb-md-4 pb-1">'
					html+= '<div class="card transition-3d-hover shadow-hover-2 tab-card h-100">'
					html+= '<div class="position-relative">'
					html+= '<a href="hotel.php?idHotel=' + r.idHotel + '" class="d-block gradient-overlay-half-bg-gradient-v5">'
					html+= '<img class="bg-img-hero card-img-top" height="230" src="'+ r.image +'" alt="img"></a>'
					html+= '<div class="position-absolute bottom-0 left-0 right-0"><div class="px-4 pb-3">'
					html+= '<a href="hotel.php?idHotel=' + r.idHotel + '" class="d-block">'
					html+= '<div class="d-flex align-items-center font-size-12 text-white">'
					html+= '<i class="icon flaticon-pin-1 mr-2 font-size-20"></i> ' + r.adresse + '</div></a></div></div></div>'
					html+= '<div class="card-body pl-3 pr-4 pt-2 pb-3">'
					html+= '<a class="card-title font-size-17 font-weight-medium text-dark">' + r.nom + '</a><div class="mt-2 mb-3">'
					html+= '<span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">Place/chambre : ' + r.nbPlace + '</span></div>'
					html+= '<div class="mb-0">'
					html+= '<span class="mr-1 font-size-14 text-gray-1">A partir de </span>'
					html+= '<span class="font-weight-bold">' + r.prix + ' € </span>'
					html+= '<span class="font-size-14 text-gray-1"> / nuit</span></div></div>'
					html+= '</div></div>'
				}				
				$("#listeHotel").html(html);
				
				$("#navPage").html();
				var pages = '<ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2>';
				if((page - 2) > 1){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=hotel&page=1">1</a></li>' }
				if((page - 3) > 1){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=hotel&page=2">2</a></li>' }
				if((page - 4) > 1){ pages+= '<li class="page-item disabled"><a class="page-link font-size-14">...</a></li>' }
				for(let i = (page - 2); i < page; i++){
					if(i > 0 && i < nbPage) { pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=hotel&page='+ i +'&destination='+ destination +'">'+ i +'</a></li>'  }
				}	
				for(let i = page; i < (page + 3); i++){
					if(i <= nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=hotel&page='+ i +'&destination='+ destination +'">'+ i +'</a></li>' }
				}
				if((page + 4) < nbPage){ pages+= '<li class="page-item disabled"><a class="page-link font-size-14">...</a></li>' }
				if((page + 3) < nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=hotel&page='+ (nbPage - 1) +'&destination='+ destination +'">'+  (nbPage - 1) +'</a></li>' }
				if((page + 2) < nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=hotel&page='+ nbPage +'&destination='+ destination +'">'+ nbPage +'</a></li>' }
				pages+= '</ul>';
				$("#navPage").html(pages);
			},
			error: function(){
				$("#listeHotel").html("ERROR") ;
			}
	});
}

function chargementLocation(limite, page){
		$.ajax({
			type: "POST",
			url: "scripts/listeLocation.php?limite=" + limite + "&page=" + page,
			data: {table: "location"},
			dataType: "json",
			success: function(data) {
				$("#listeVol").html("");
				var html = "" ;
				for(var r of data) {
					html+= '<div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">'
					html+= '<div class="card transition-3d-hover shadow-hover-2">'
					html+= '<div class="position-relative">'
					html+= '<a href="location.php?idLocation='+ r.idLocation +'" class="d-block gradient-overlay-half-bg-gradient-v5">'
					html+= '<img class="card-img-top" height="230" src="'+ r.image +'"></a>'
					html+= '<div class="position-absolute bottom-0 left-0 right-0"><div class="px-3 pb-2">'
					html+= '<a href="location.php?idLocation='+ r.idLocation +'">'
					html+= '<span class="text-white font-weight-bold font-size-17">'+ r.marque +' ' + r.modele +' </span></a>'
					html+= '<div class="text-white my-2"><span class="mr-1 font-size-14">A partir de </span>'
					html+= '<span class="font-weight-bold font-size-19">'+ r.prix +' € </span>'
					html+= '<span class="mr-1 font-size-11">(+ '+ r.caution +' € de caution)</span></div></div></div>'
					html+= '</div><div class="card-body px-4 py-3 border-bottom"><div class="mt-1">'
					html+= '<span class="py-1 font-size-14 border-radius-3 font-weight-normal pagination-v2-arrow-color">Note des clients : </span>'
					html+= '<span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">'+ r.note +'/5</span></div></div>'
					html+= '<div class="px-4 pt-3 pb-2"><div class="row"><div class="col-12 text-center">'
					html+= '<a href="location.php?idLocation='+ r.idLocation +'"><button type="button" class="btn btn-info">Plus d\'informations</button></a>'
					html+= '</div></div></div></div></div>'
				}
				$("#listeLocation").html(html);
				
				$("#navPage").html();
				var pages = '<ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2>';
				if((page - 2) > 1){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=location&page=1">1</a></li>' }
				if((page - 3) > 1){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=location&page=2">2</a></li>' }
				if((page - 4) > 1){ pages+= '<li class="page-item disabled"><a class="page-link font-size-14">...</a></li>' }
				for(let i = (page - 2); i < page; i++){
					if(i > 0 && i < nbPage) { pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=location&page='+ i +'">'+ i +'</a></li>'  }
				}	
				for(let i = page; i < (page + 3); i++){
					if(i <= nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=location&page='+ i +'">'+ i +'</a></li>' }
				}
				if((page + 4) < nbPage){ pages+= '<li class="page-item disabled"><a class="page-link font-size-14">...</a></li>' }
				if((page + 3) < nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=location&page='+ (nbPage - 1) +'">'+  (nbPage - 1) +'</a></li>' }
				if((page + 2) < nbPage){ pages+= '<li class="page-item"><a class="page-link font-size-14" href="liste.php?liste=location&page='+ nbPage +'">'+ nbPage +'</a></li>' }
				pages+= '</ul>';
				$("#navPage").html(pages);
			},
			error: function(){
				$("#listeLocation").html("ERROR") ;
			}
	});
}