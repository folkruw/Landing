<!DOCTYPE html>
<html lang="fr">
    <head>
		<title>Contactez-nous</title>
	</head>
    
	<body>
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.php"); ?>
		
		<main id="content">
            <div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url(images/default/background2.jpg);">
                <div class="container space-top-xl-3 py-6 py-xl-0">
                    <div class="row justify-content-center py-xl-4">
                        <div class="py-xl-10 py-5">
                            <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">Contactez-nous</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom border-color-8 pb-6 pb-lg-8 mb-5 mb-lg-7">
                <div class="container pb-1">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="mb-5 mb-lg-0 text-center text-md-left">
                                <h6 class="text-gray-3 font-weight-bold font-size-21">Bruxelles</h6>
                                <div class="mb-3 mb-md-5">
                                    <p class="mb-1 text-gray-1">Place Poelaert 1,</p>
                                    <p class="mb-0 text-gray-1">1000 Bruxelles, Belgique</p>
                                </div>
                                <div class="mb-0">
                                    <p class="mb-1 text-gray-1">+32 494/15.22.34</p>
                                    <p class="mb-0 text-gray-1">info@landing.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom border-color-8 pb-6 pb-lg-9 mb-6 mb-lg-8">
                <div class="container mb-10">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-5 pb-xl-1">Votre message</h2>
                    </div>
                    <div class="comment-section max-width-810 mx-auto">
                        <form class="js-validate" novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-6 mb-5">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" id="nom" placeholder="Votre nom" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    <div class="js-form-message">
                                        <input type="email" class="form-control" id="mail" placeholder="Adresse mail" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-5">
                                    <div class="js-form-message">
                                        <div class="input-group">
                                            <textarea class="form-control" rows="6" cols="77" id="messsage" placeholder="Votre message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-lg-start">
                                    <button type="submit" class="btn rounded-xs bg-blue-dark-1 text-white height-51 width-190 transition-3d-hover">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
		
		<?php require_once ('require_plus.php'); ?>
	</body>
	
	<footer>
		<!-- Récupère la barre de fin -->
		<?php include("public/footer.php"); ?>
	</footer>
</html>