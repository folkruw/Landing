<!DOCTYPE HTML>
<html lang="en">
	<head>
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.min.php"); ?>
		
		<title>Page de connexion</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		

		<!-- Bootstrap -->
		<script src="assets/vendor/popper.js/dist/umd/popper.min.js?v=<?= md5_file('assets/vendor/popper.js/dist/umd/popper.min.js'); ?>"></script>
		<script src="assets/vendor/bootstrap/bootstrap.min.js?v=<?= md5_file('assets/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
		
		<!-- Police -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body class="img js-fullheight gradient-overlay-half-black-gradient text-center" style="background-image: url(images/default/login.webp);">
		<style>
			[class*="gradient-overlay-half"] {
			  position: unset;
			  z-index: 1;
			}
		</style>
		
		<!-- Menu de connexion -->
		<div>
			<div class="container space-1 space-top-xl-1">
				</br></br>
				<div class="row justify-content-center">
					<div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
						<div class="card rounded-xs">
						<!-- Connexion -->
						<?php include ('privee/pnlConnexion/connexion.php'); ?>
						<!-- Enregistremet -->
						<?php include ('privee/pnlConnexion/enregistrement.php'); ?>
						</div>
					</div>
				</div>
				
				<?php 	if(isset($_GET['erreur'])){ $erreur = $_GET['erreur'];} else { $erreur = 0; };
						if($erreur == 1) {echo "<br/><p class='text-white'>Nom d'utilisateur ou mot de passe incorrect.</p>";} 
						else if ($erreur == 2) {echo "<br/><p class='text-white'>Le compte existe déjà.</p>";}
						else if ($erreur == 3) {echo "<br/><p class='text-white'>Le compte n'est pas actif.</p>";}
				?>
				
			</div>
		</div>
		
		
		<?php require_once ('require_plus.php'); ?>
	</body>
</html>