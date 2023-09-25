<!DOCTYPE html>
<html lang="fr">
    <head>
		<title id="titre">Hôtel</title>

		<script src="js/hotel/hotel.js?v=<?= md5_file('js/hotel/hotel.js'); ?>"></script>
	</head>
    
	<body onload="chargementHotel('<?php echo $_GET['idHotel']; ?>');">
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.reduce.php"); ?>
		
        <main id="content">
            <div class="border-bottom mb-8">
                <div class="container">
                    <nav class="py-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Accueil</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="liste.php?liste=hotel">Hôtels</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page" id="pageNom"></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="d-block d-md-flex flex-center-between align-items-start mb-2">
                            <div class="mb-3">
                                <ul class="list-unstyled mb-2 d-md-flex flex-lg-wrap flex-xl-nowrap mb-2" id="infoChambre">
									
                                </ul>
                                <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
                                    <h4 class="font-size-23 font-weight-bold mb-1" id="titreHotel"></h4>
                                </div>
                                <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> <span id="adresse"></span>
                                </div>
                            </div>
                        </div>
                        <div class="pb-4 mb-2">
                            <div class="position-relative">
                                <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                                    data-infinite="true"
                                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                                    data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                                    data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                                    data-nav-for="#sliderSyncingThumb">
									<div class="js-slide" id="grandePhoto"></div>
                                    <div class="js-slide">
                                        <img class="img-fluid border-radius-3" src="images/hotel/exterieurdevant.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide">
                                        <img class="img-fluid border-radius-3" src="images/hotel/exterieurjour.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide">
                                        <img class="img-fluid border-radius-3" src="images/hotel/exterieurnuit.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide">
                                        <img class="img-fluid border-radius-3" src="images/hotel/chambre2.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide">
                                        <img class="img-fluid border-radius-3" src="images/hotel/activite.jpg" alt="Image Description">
                                    </div>
                                </div>

                                <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--gutters-4 u-slick--transform-off"
                                    data-infinite="true"
                                    data-slides-show="6"
                                    data-is-thumbs="true"
                                    data-nav-for="#sliderSyncingNav"
                                    data-responsive='[{
                                        "breakpoint": 992,
                                        "settings": {
                                            "slidesToShow": 4
                                        }
                                    }, {
                                        "breakpoint": 768,
                                        "settings": {
                                            "slidesToShow": 3
                                        }
                                    }, {
                                        "breakpoint": 554,
                                        "settings": {
                                            "slidesToShow": 2
                                        }
                                    }]'>									
                                    <div class="js-slide" style="cursor: pointer;" id="miniature"></div>
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid border-radius-3 height-110" src="images/hotel/exterieurdevant.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid border-radius-3 height-110" src="images/hotel/exterieurjour.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid border-radius-3 height-110" src="images/hotel/exterieurnuit.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid border-radius-3 height-110" src="images/hotel/chambre2.jpg" alt="Image Description">
                                    </div>
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid border-radius-3 height-110" src="images/hotel/activite.jpg" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom position-relative">
                            <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark">
                                Description de l'hôtel
                            </h5>
                            <p id="descrip"></p>
                        </div>
                        <div class="border-bottom py-4">
                            <h5 id="scroll-amenities" class="font-size-21 font-weight-bold text-dark mb-4">
                                Prenez votre chambre
                            </h5>
                            <div class="card border-color-7 mb-5 overflow-hidden">
                                <div class="product-item__outer w-100">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-5 col-xl-3dot5">
                                            <div class="pt-5 pb-md-5 pl-4 pr-4 pl-md-5 pr-md-2 pr-xl-2">
                                                <div class="product-item__header mt-2 mt-md-0">
                                                    <div class="position-relative">
                                                        <img class="img-fluid rounded-sm" src="images/hotel/chambre.jpg" alt="Image Description">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-md-7 col-lg-7 col-xl-5 flex-horizontal-center pl-xl-0">
                                            <div class="w-100 position-relative m-4 m-md-0">
                                                <a href="../hotels/hotel-booking.html" class="mb-2 d-inline-block">
                                                    <span class="font-weight-bold font-size-17 text-dark text-dark" id="typeChambre"></span>
                                                </a>
                                                <div class="mt-1 pt-2">
                                                    <div class="d-flex mb-1">
                                                        <div class="ml-0">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="media mb-3 text-gray-1">
                                                                    <small class="mr-2">
                                                                        <small class="flaticon-wifi-signal font-size-17 text-primary"></small>
                                                                    </small>
                                                                    <div class="media-body font-size-1 ml-1">
                                                                        Wi-Fi gratuit
                                                                    </div>
                                                                </li>
                                                                <li class="media mb-3 text-gray-1">
                                                                    <small class="mr-2">
                                                                        <small class="flaticon-plans font-size-17 text-primary"></small>
                                                                    </small>
                                                                    <div class="media-body font-size-1 ml-1" id="dimension"></div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="ml-7">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="media mb-3 text-gray-1">
                                                                    <small class="mr-2">
                                                                        <small class="flaticon-bed-1 font-size-17 text-primary"></small>
                                                                    </small>
                                                                    <div class="media-body font-size-1 ml-1">
                                                                        Un lit double
                                                                    </div>
                                                                </li>
                                                                <li class="media mb-3 text-gray-1">
                                                                    <small class="mr-2">
                                                                        <small class="flaticon-bathtub font-size-17 text-primary"></small>
                                                                    </small>
                                                                    <div class="media-body font-size-1 ml-1">
                                                                        Salle de bain avec douche
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-xl-3dot5 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                                            <div class="flex-content-center border-xl-left py-xl-5 ml-4 ml-xl-0 justify-content-start justify-content-xl-center">
                                                <div class="text-center my-xl-1">
                                                    <div class="mb-2 pb-1">
                                                        <span class="font-size-14">A partir </span>
                                                        <span class="font-weight-bold font-size-22 ml-1" id="prix"></span>
                                                        <span class="font-size-14"> / nuit</span>
                                                    </div>
                                                    <a href="reserve.php?destDepart=non&destArr=non&dateDepart=non&dateRetour=non&nbNuit=0&nbChambre=0&nbAdulte=1&nbEnfant=0&vol=non&hotel=<?php echo $_GET['idHotel']; ?>&location=non" class="btn btn-outline-primary border-radius-3 border-width-2 px-4 font-weight-bold min-width-200 py-2 text-lh-lg">Réserver maintenant</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="py-4">
                            <h5 class="font-size-21 font-weight-bold text-dark mb-6">
                               Ecrire un avis
                            </h5>
							<div class="row mb-5 mb-lg-0">
								<div class="col-sm-6 mb-5">
									<div class="js-form-message">
										<input type="text" class="form-control" name="name" placeholder="Nom" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
									</div>
								</div>

								<div class="col-sm-6 mb-5">
									<div class="js-form-message">
										<input type="email" class="form-control" name="email" placeholder="Mail" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
									</div>
								</div>
								<div class="col-sm-12 mb-5">
									<div class="js-form-message">
										<div class="input-group">
											<textarea class="form-control" rows="6" cols="77" name="text" placeholder="Commentaires" aria-label="Hi there, I would like to ..." required="" data-msg="Please enter a reason." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
										</div>
									</div>
								</div>
								<div class="col d-flex justify-content-center justify-content-lg-start">
									<button type="submit" class="btn rounded-xs bg-blue-dark-1 text-white p-2 height-51 width-190 transition-3d-hover">Envoyer votre avis</button>
								</div>
							</div>
                        </div>
                    </div>
					<div class="col-lg-4 col-xl-3">
                        <div class="mb-4">
                            <div class="flex-horizontal-center">
                                <div class="flex-horizontal-center">
									<div class="ml-0">
										<h4 class="text-primary font-size-17 font-weight-bold mb-0">Excellent</h4>
										<span class="text-gray-1 font-size-14">Recommandé par nos clients<span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled d-md-flex mb-5">
                            <li class="border border-violet-1 bg-violet-1 rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mb-2 mb-md-0">
                                <span class="font-weight-normal font-size-14 text-white">Petit prix</span>
                            </li>
                        </ul>
                        <div class="mb-4">
                            <div class="border border-color-7 rounded mb-5">
                                <div class="border-bottom">
                                    <div class="p-4">
                                        <span class="font-size-14">A partir de </span>
                                        <span class="font-size-24 text-gray-6 font-weight-bold ml-1" id="prix2"></span>
                                        <span class="font-size-14"> / nuit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-color-7 rounded px-4 pt-4 pb-3 mb-5">
                                <div class="px-2 pt-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="flaticon-placeholder-1 font-size-25 text-primary mr-3 pr-1"></i>
                                        <h6 class="mb-0 font-size-14 text-gray-1">
                                            L'un des meilleurs hôtels
                                        </h6>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="flaticon-home font-size-25 text-primary mr-3 pr-1"></i>
                                        <h6 class="mb-0 font-size-14 text-gray-1">
                                            Voisin adorable
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
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