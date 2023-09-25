<!DOCTYPE html>
<html lang="fr">
    <head>
		<title id="titre">Destination</title>
		
		<script src='js/destination/destination.js?v=<?= md5_file("js/destination/destination.js"); ?>'></script>
		<script src='js/hotel/hotel.js?v=<?= md5_file("js/hotel/hotel.js"); ?>'></script>
		<script src='js/vol/vol.js?v=<?= md5_file("js/vol/vol.js"); ?>'></script>
	</head>
    
	<body onload="chargementDestination('<?php echo $_GET['desti']; ?>'); chargementHotelTrending('<?php echo $_GET['desti']; ?>');">
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.php"); ?>
			
        <main id="content">
            <div class="hero-block hero-v1 bg-img-hero-bottom gradient-overlay-half-black-gradient text-center z-index-2" id="imageFond"> 
                <div class="container space-2 space-top-xl-9">
                    <div class="text-center pb-xl-8">
                        <div class="pt-xl-6">
                            <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold" id="destination">DESTINATION</h1>
                        </div>
                    </div>
                    <div class="mb-lg-n16">
                        <ul class="nav tab-nav-rounded flex-nowrap pb-2 pb-md-4 tab-nav" role="tablist">
                           <li class="nav-item">
                                <a class="nav-link font-weight-medium active" id="pills-one-example2-tab" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="true">
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

            <div class="border-bottom border-color-8">
                <div class="container space-bottom-1 space-top-lg-3">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-4 mb-xl-7 pb-xl-1">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Quelques détails</h2>
                    </div>
                    <div class="w-lg-80 w-xl-60 mx-auto collapse_custom position-relative mb-4 pb-xl-1">
                        <h4 class="font-size-21 font-weight-semi-bold text-gray-6 pb-1">Il est temps de voyager</h4>
                        <span id="description"></span>
                    </div>
                </div>
            </div>
            <div class="tabs-block tab-v1">
                <div class="container space-lg-1">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Nos meilleurs expériences</h2>
                    </div>
                    <ul class="nav tab-nav-pill flex-nowrap pb-4 pb-lg-5 tab-nav justify-content-lg-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium" id="pills-one-example-t1-tab" data-toggle="pill" href="#pills-one-example-t1" role="tab" aria-controls="pills-one-example-t1" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Vols</span>
                                </div>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link font-weight-medium active" id="pills-two-example-t1-tab" data-toggle="pill" href="#pills-two-example-t1" role="tab" aria-controls="pills-two-example-t1" aria-selected="true">
                                <div class="d-flex flex-column flex-md-row  position-relative text-dark align-items-center">
                                    <span class="tabtext font-weight-semi-bold">Hôtels</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
						<div class="tab-pane fade" id="pills-one-example-t1" role="tabpanel" aria-labelledby="pills-one-example-t1-tab">
                            <div class="row" id="volTrending"></div>
                        </div>
						<div class="tab-pane fade active show" id="pills-two-example-t1" role="tabpanel" aria-labelledby="pills-two-example-t1-tab">
                            <div class="row" id="hotelTrending"></div>
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