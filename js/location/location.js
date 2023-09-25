function chargementLocationTrending(){
		$.ajax({
			type: "POST",
			url: "scripts/listeLocation.php?limite=0",
			data: {table: "location"},
			dataType: "json",
			success: function(data) {
				var tmp;
				var premium = "" ;
				var countP = 0;
				var berline = "" ;
				var countBe = 0;
				var utilitaire = "" ;
				var countU = 0;
				var busautocar = "" ;	
				var countBu = 0;
				
				for(var r of data) {
					tmp = "";
					
					tmp+= '<div class="col-md-6 col-lg-4 col-xl-3 mb-3 mb-md-4 pb-1">'
					tmp+= '<div class="card mb-1 transition-3d-hover shadow-hover-2 tab-card h-100">'
					tmp+= '<div class="position-relative mb-2">'
					tmp+= '<a href="location.php?idLocation='+ r.idLocation +'" class="d-block gradient-overlay-half-bg-gradient-v5">'
					tmp+= '<img class="card-img-top" src="' + r.image + '" alt="img" width="100" height="200"></a>'
					tmp+= '<div class="position-absolute bottom-0 left-0 right-0">'
					tmp+= '<div class="justify-content-between align-items-center">'
					tmp+= '<div class="px-3 pb-2">'
					tmp+= '<span class="text-white font-weight-bold font-size-16">' + r.marque + ' ' + r.modele + '</span>'
					tmp+= '<h2 class="h5 text-white mb-0 font-weight-bold"><small class="mr-2">A partir de</small>' + r.prix + ' €</h2></div></div></div></div>'
					tmp+= '<div class="card-body px-4 py-2">'
					tmp+= '<a href="location.php?idLocation='+ r.idLocation +'" class="card-title text-dark font-size-20 font-weight-bold">' + r.descrip + '</a></div></div></div>'
					
					if(r.classe == "Premium" && countP < 8){
						premium += tmp;
						countP++;
					} else if (r.classe == "Berline" && countBe < 8) {
						berline += tmp;
						countBe++;
					} else if (r.classe == "Utilitaire" && countU < 8) {
						utilitaire += tmp;
						countU++;
					} else if (r.classe == "Autocar" && countBu < 8) {
						busautocar += tmp;
						countBu++;
					}
				}				
				$("#premium").html(premium) ;
				$("#berline").html(berline) ;
				$("#utilitaire").html(utilitaire) ;
				$("#busautocar").html(busautocar) ;
			},
			error: function(){
				$("#premium").html("ERROR") ;
				$("#berline").html("ERROR") ;
				$("#utilitaire").html("ERROR") ;
				$("#busautocar").html("ERROR") ;
			}
	});
}

function chargementLocation(locations){
	$.ajax({
		type: "POST",
		url: "scripts/location/location.php?idLocation=" + locations,
		data: {table: "location"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {
				$("#titre").html(r.marque + ' ' + r.modele);
				$("#pageNom").html(r.marque + ' ' + r.modele);
				$("#titreLocation").html(r.marque + ' ' + r.modele);
				$("#note").html(r.note + "/5");
				$("#note2").html(r.note + "<span class='font-size-20'>/5</span>");
				
				if(r.note >= 0 && r.note <= 3){$("#avis").html("Pas bon");}
				else if(r.note > 3 && r.note <= 4){$("#avis").html("Bon");}
				else if(r.note > 4){$("#avis").html("Très bon");}
				
				$("#descrip").html(r.descrip);
				$("#marque").html(r.marque);
				$("#modele").html(r.modele);
				if(r.assurance == "1"){
					$("#assurance").html("Oui");
				} else if(r.typeChambre == "0"){
					$("#assurance").html("Non");		
				}
				$("#prix").html(r.prix + " €");
				
				if(r.note == 5){
					$("#barre1").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info1").html("5.0");
					$("#barre2").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info2").html("5.0");
					$("#barre3").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info3").html("5.0");
					$("#barre4").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info4").html("5.0");
				} else {
					var nb1, nb2, nb3, nb4;
					var moy = 0;
					var i = 0;
					var min = parseInt(parseInt(r.note).toFixed(0));
					var max = min + 1;
					while(moy != r.note){
						nb1 = Math.random() * (max - min) + min;
						nb2 = Math.random() * (max - min) + min;
						nb3 = Math.random() * (max - min) + min;
						nb4 = Math.random() * (max - min) + min;
						moy = ((nb1 + nb2 + nb3 + nb4) / 4).toFixed(2);
						if(i > 1000){
							moy = r.note;
						}
						i++;
					}
					if(i > 1000){console.log(moy);}
					var pc1, pc2, pc3, pc4;
					pc1 = ((nb1 / 5) * 100).toFixed(0);
					pc2 = ((nb2 / 5) * 100).toFixed(0);
					pc3 = ((nb3 / 5) * 100).toFixed(0);
					pc4 = ((nb4 / 5) * 100).toFixed(0);
					$("#barre1").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: '+pc1+'%;" aria-valuenow="'+pc1+'" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info1").html(nb1.toFixed(2));
					$("#barre2").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: '+pc2+'%;" aria-valuenow="'+pc2+'" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info2").html(nb2.toFixed(2));
					$("#barre3").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: '+pc3+'%;" aria-valuenow="'+pc3+'" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info3").html(nb3.toFixed(2));
					$("#barre4").html('<div class="progress-bar rounded-pill" role="progressbar" style="width: '+pc4+'%;" aria-valuenow="'+pc4+'" aria-valuemin="0" aria-valuemax="100"></div>');
					$("#info4").html(nb4.toFixed(2));					
				}
				
				$("#image").html('<div class="js-slide bg-img-hero min-height-550" style="background-image: url('+r.image+');background-size: 1000px 550px;"></div>');
			}							
		},
		error: function(){
			$("#location").html("ERROR");
		}
	});	
}