function chargementDestination(destination){
	$.ajax({
		type: "POST",
		url: "scripts/destination/destination.php?destination=" + destination,
		data: {table: "destination"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			
			for(var r of data) {
				$("#titre").html(r.destination);
				$("#destination").html(r.destination);
				$("#description").html("<p>" + r.descrip + "</p>");
				$("#titre").html(r.destination);
				document.getElementById("imageFond").style.backgroundImage ="url('" + r.photo + "')";
			}							
		},
		error: function(){
			$("#destination").html("ERROR");
		}
	});
	
	chargementVol(destination);
	chargementHotel(destination);
}