function page(name, param){
	document.cookie = "page= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
	document.cookie = "destination= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
	document.cookie = "hotel= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
	document.cookie = "locations= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
	document.cookie = "profil= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
	document.cookie = "vol= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
	
	document.cookie = "page=" + name;	
	
	param = param.replace(" ", "_");
	document.cookie = param;
}

function loadPage(){
	var path = "";
	var param = "";
	
	const pageName = "page";
	const profil = "profil";
	const destination = "destination";
	const hotel = "hotel";
	const locations = "locations";
	const vol = "vol";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(pageName) == 0) {
			var name = c.substring(pageName.length + 1, c.length);
			if (name.substring(0, 1) == 1){ path = 'user/'; }
			if (name.substring(0, 1) == 2){ path = 'admin/'; }
			if (name.substring(0, 1) == 3){ path = 'societe/'; }
		}
		if (c.indexOf(profil) == 0) {
			param = "?";
			param += c.substring(profil.length - profil.length, c.length);
		}
		if (c.indexOf(destination) == 0) {
			param = "?destination=";
			param += c.substring(destination.length + 1, c.length);
		}
		if (c.indexOf(hotel) == 0) {
			param = "?hotel=";
			param += c.substring(hotel.length + 1, c.length);
		}
		if (c.indexOf(locations) == 0) {
			param = "?locations=";
			param += c.substring(locations.length + 1, c.length);
		}
		if (c.indexOf(vol) == 0) {
			param = "?vol=";
			param += c.substring(vol.length + 1, c.length);
		}
	}
	$("#page").load('privee/' + path + name + '.php' + param);
}

$(document).ready(function(){
	loadPage();
});