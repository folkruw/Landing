function checkPassword(inputtxt) {
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
	if(inputtxt.match(passw)) {
		// alert('Valide')
		return true;
	} else { 
		alert('Mot de passe invalide, doit contenir min. 6 caractères, contenant une lettre minuscule, majuscule, un chiffre et un caractères spécial !')
		return false;
	}
}

function checkPasswordBefore(formulaire){
	if(formulaire == "enregistrement"){
		passwd = $('#motdepasse').val();
	} else {
		passwd = $('#emotdepasse').val();
	}

	if(checkPassword(passwd)){
		if(formulaire == "enregistrement"){
			enregistrement();
		} else {
			enregistrementSociete();
		}
	} else {
		return false;
	}
}

function enregistrement(){
	var serializedData = $("#enregistrement").serialize();
		
	// Désactiver tous les champs d'entrée pendant le traitement
	var $inputs = $("#enregistrement").find("input, select, button, textarea");
	$inputs.prop("disabled", true);
			
	$.get("privee/pnlConnexion/existeUtilisateur.php", serializedData, function(){}, "json").done(function(data) {
		// Indique le nombre de retour
		if(data.length == 0){
			// Récupère les données
			var nom  		= $('#nom').val();
			var prenom 		= $('#prenom').val();
			var pseudo   	= $('#pseudo').val();
			var mail   		= $('#mail').val();
			var motdepasse  = $('#motdepasse').val();

			var role = "1";
			  
			if(!nom || !prenom || !pseudo || !mail || !motdepasse) { 
				// Informe qu'il manque des données
				alert("Données manquantes.");
			} else {
				// Spécification de l'URL qui va ajouté à la DB
				var url = 'privee/pnlConnexion/envoyerEnregistrement.php';
				$.post( url, {nom:nom, prenom: prenom, pseudo: pseudo, mail: mail, motdepasse: motdepasse, role: role})
				document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
				
				window.location.replace("privee/pnlConnexion/connecte.php?pseudo=" + pseudo + "&role=" + role);				
			}				
		} else {
			window.location.replace("pageConnexion.php?erreur=2");
		}
	})
};
 
function enregistrementSociete(){
	// Pour empêcher que le formulaire soit posté de façon classique,
	// de cette façon, la page n'est pas automatiquement rechargée non plus.
	event.preventDefault();
	
	// "this" est dans ce contexte le formulaire     
	// Serialiser les données du formulaire		
	var serializedData = $("#enregistrementSociete").serialize();
	
	// Désactiver tous les champs d'entrée pendant le traitement
	var $inputs = $("#enregistrementSociete").find("input, select, button, textarea");
	$inputs.prop("disabled", true);
			
	$.get("privee/pnlConnexion/existeUtilisateur.php", serializedData, function(){}, "json").done(function(data) {
		if(data.length == 0){
			var nom  		= $('#entreprise').val();
			var responsable = $('#responsable').val();
			var pseudo   	= $('#pseudoE').val();
			pseudo = pseudo.replace(/\s/g, '');
			var mail   		= $('#email').val();
			var motdepasse  = $('#emotdepasse').val();
			var role 		= $('#role').val();;

			if(!nom || !responsable || !pseudo || !mail || !motdepasse) {
				alert("Données manquantes.");
			} else {
				var url = 'privee/pnlConnexion/envoyerEnregistrement.php';
				$.post( url, {nom:nom, responsable: responsable, pseudo: pseudo, mail: mail, motdepasse: motdepasse, role: role})
				document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
				
				document.cookie = "pseudo=" + pseudo;
				document.cookie = "role=" + role;
				
				window.location.replace("privee/pnlConnexion/connecte.php?pseudo=" + pseudo + "&role=" + role);				
			}				
		} else {
			window.location.replace("pageConnexion.php?erreur=2");
		}
	})
 };
 
$(document).ready(function(){
	 $("#connexion").submit(function(event){
		// Pour empêcher que le formulaire soit posté de façon classique,
		// de cette façon, la page n'est pas automatiquement rechargée non plus.
		event.preventDefault();
		
		// "this" est dans ce contexte le formulaire     
		// Serialiser les données du formulaire		
		var serializedData = $(this).serialize();
		
		// Désactiver tous les champs d'entrée pendant le traitement
		var $inputs = $(this).find("input, select, button, textarea");
		$inputs.prop("disabled", true);

		$.get("privee/pnlConnexion/existeUtilisateur.php?action=2", serializedData, function(){}, "json").done(function(data) {			
			if(data.length == 1){
				var pseudo   	= $('#pseudoU').val();
				var motdepasse  = $('#motdepasseU').val();
				  
				if(!pseudo || !motdepasse) { 
					alert("Données manquantes.");
				} else {
					for(var r of data) {
						if(r.actif == 1) {
							document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
							
							document.cookie = "idClient=" + r.idClient;
							document.cookie = "pseudo=" + r.pseudo;
							document.cookie = "role=" + r.role;
							
							window.location.replace("privee/pnlConnexion/connecte.php?idClient=" + r.idClient + "&pseudo=" + pseudo + "&role=" + r.role);
						} else {
							window.location.replace("pageConnexion.php?erreur=3");
						}
					}
				}
			} else {
				window.location.replace("pageConnexion.php?erreur=1");
			}
		})
	 });
});


