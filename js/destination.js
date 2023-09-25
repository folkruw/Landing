function topDestination(){
	$.ajax({
		type: "POST",
		url: "scripts/listeDestination.php",
		data: {table: "destination"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
						
			var i = 0;
			for(var r of data) {
				if(i < 2) {
					html += '<div class="col-md-6 mb-3 mb-md-4">'
					html += '<div class="min-height-350 bg-img-hero rounded-border p-5 gradient-overlay-half-bg-gradient transition-3d-hover shadow-hover-2 border-0 dropdown" style="background-image: url('+ r.photo +');">'
				} else {
					html += '<div class="col-md-6 col-xl-3 mb-3 mb-md-4">'
					html += '<div class="min-height-350 gradient-overlay-half-bg-gradient rounded-border p-5 bg-img-hero transition-3d-hover shadow-hover-2 border-0 dropdown" style="background-image: url('+ r.photo +');">'
				}
				
				html += '<header class="w-100 justify-content-between mb-2">'
				html += '<a href="destination.php?desti='+ r.destination +'" class="destination text-white font-weight-bold font-size-21 pb-3 mb-3 text-lh-1 d-block">'+ r.destination +'</a>'
				html += '<div class="destination-dropdown v1">'
				html += '<a class="dropdown-item" href="liste.php?liste=hotel&destination='+ r.destination +'&page=1">' + r.countHotel + ' hôtels</a>'
				html += '</div></header></div></div>'
								
				i++
				if(i == 6){break;}
			}				
			
			$("#topDesti").html(html);		
			
		},
		error: function(){
			$("#topDesti").html("ERROR");
		}
	});
}