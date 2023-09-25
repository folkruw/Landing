<!DOCTYPE html>
<HTML lang="fr">
    <head>
		<title>Accueil Landing</title>
	</head>
    
	<body>
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.php"); ?>
		
		<!-- Top -->
		<div class="hero-block hero-v1 bg-img-hero-bottom gradient-overlay-half-black-gradient text-center z-index-2" style="background-image: url(images/default/background.png);">
			<div class="container space-2 space-top-xl-8">
					<div class="py-2 py-xl-2 pb-5">
						<h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold">Prépare ton voyage de rêve</h1>
					</div>
				<div class="mb-lg-n16">
					<ul class="nav tab-nav-rounded flex-nowrap pb-2 pb-md-4 tab-nav" role="tablist">
						<li class="nav-item">
							<a class="nav-link font-weight-medium active pl-md-5 pl-3" id="pills-one-example2-tab" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="true">
								<div class="d-flex flex-column flex-md-row  position-relative  text-white align-items-center">
									<figure class="ie-height-40 d-md-block mr-md-3">
										<i class="icon flaticon-aeroplane font-size-3"></i>
									</figure>
									<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Vols</span>
								</div>
							</a>
						</li>
					</ul>
					<!-- Menu de recherche -->
					<?php include("rechercheVoyage.php"); ?>
				</div>
			</div>
		</div>

		<main class="content">			
			<!-- Destination -->
			<?php include('public/accueil/trendings.php'); ?>
			
			<!-- Destination -->
			<?php include('public/accueil/destinations.php'); ?>
			
			<script>
				document.getElementById("myDIV").style.display = "none";
				function hideTrending() {
				  var x = document.getElementById("myDIV");
				  if (x.style.display === "none") {
					x.style.display = "block";
				  } else {
					// x.style.display = "none";
				  }
				}
			</script>
		</main>
				
		<?php require_once ('require_plus.php'); ?>
	</body>
	
	<footer>
		<!-- Récupère la barre de fin -->
		<?php include("public/footer.php"); ?>
	</footer>
</html>