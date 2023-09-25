$(document).ready(function(){
	$.ajax({
		type: "POST",
		url: "scripts/admin/listeProfil.php",
		data: {table: "client"},
		dataType: "json",
		success: function(data) {
			var user = "" ;
			var admin = "";
			var societe = "";
			var tmp = "";
			
			for(var r of data) {
				tmp = ""
				tmp += '<tr><td>' + r.nom + '</td>'
				
				if(r.role == 1 || r.role == 2) {tmp += '<td>' + r.prenom + '</td>'}
				else if(r.role > 2) {tmp += '<td>' + r.responsable + '</td>'}
				
				
				tmp += '<td>' + r.mail + '</td>'
				
				if(r.role == 1) {tmp += '<td>Utilisateur</td>'}
				else if(r.role == 2) {tmp += '<td>Administrateur</td>'}
				else if(r.role > 2) {tmp += '<td>Société</td>'}
				tmp += '<td><span class="fa-stack"><a class="fa fa-edit fa-stack-2x" href="compte.php" onclick=\'page("2_modifierProfil", "profil='+ r.pseudo +'");\'></a></span></td></tr>'
				
				if(r.role == 1) {user += tmp;}
				else if(r.role == 2) {admin += tmp;}
				else if(r.role > 2) {societe += tmp;}
			}
			
			$("#listeProfilUser").html(user);
			$("#listeProfilAdmin").html(admin);	
			$("#listeProfilSociete").html(societe);
			
			
			$('#tableUtil').DataTable();
			$('#tableSociete').DataTable();
			$('#tableAdmin').DataTable();
		},
		error: function(){
			$("#listeProfilUser").html("ERROR");
			$("#listeProfilAdmin").html("ERROR");	
			$("#listeProfilSociete").html("ERROR");
		}
	});
})