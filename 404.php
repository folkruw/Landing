<!DOCTYPE html>
<html lang="fr">
    <head>
		<title>Accueil Landing</title>
	</head>
    
	<body>
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.min.php"); ?>
		
        <main id="content">
            <div class="border-bottom border-color-8 mb-8">
                <div class="container">
                    <div class="row mb-5 mb-md-7 mb-lg-0">
                        <div class="col-lg-5 col-xl-3dot5">
                            <div class="space-lg-1 space-xl-3 mt-xl-2 mb-5 mb-md-7 mb-lg-0">
                                <div class="font-weight-bold font-size-xs-160 font-size-lg-120 font-size-200 text-gray-3 text-md-center text-lg-left">404</div>
                                <h6 class="font-size-21 font-weight-bold text-gray-3 mb-3 mt-n3 mt-xl-n5 text-center text-lg-left">Votre avion n'a pas trouvé sa direction</h6>
                                <p class="text-gray-1 mb-3 mb-lg-5 pb-lg-1 text-center text-lg-left">Revenez sur le droit chemin</p>
                                <a href="index.php" class="btn btn-primary rounded-xs transition-3d-hover font-weight-bold min-width-190 min-height-60 d-inline-flex flex-content-center">Revenir à la page</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-8dot5">
                            <div class="space-lg-2 space-xl-3 mt-lg-5 mt-xl-7 mb-xl-4">
                                <img class="js-svg-injector" src="assets/404.svg" alt="Image-Description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
	</body>
</html>