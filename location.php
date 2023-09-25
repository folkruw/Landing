<!DOCTYPE html>
<html lang="fr">
    <head>
		<title id="titre">Véhicule</title>
		
		<script src='js/location/location.js?v=<?= md5_file("js/location/location.js"); ?>'></script>
	</head>
    
	<body onload="chargementLocation('<?php echo $_GET['idLocation']; ?>');">
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.reduce.php"); ?>
		
        <main id="content">
            <div class="container">
                <nav class="py-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="liste?liste=location">Locations</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page" id="pageNom"></li>
                    </ol>
                </nav>
            </div>
            <div class="mb-8">
                <div class="js-slick-carousel u-slick u-slick__img-overlay"
                    data-center-mode="true"
                    data-pagi-classes="d-md-none text-center u-slick__pagination mt-5 mb-0"
                    data-center-padding="450px" id="image">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="">
                            <div class="mb-3">
                                <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
                                    <h4 class="font-size-23 font-weight-bold mb-1 mr-3" id="titreLocation"></h4>
                                </div>
                                <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
                                    <span class="font-size-14 text-primary mr-2" id="note"></span>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 border-top border-bottom mb-4">
                            <ul class="list-group list-group-borderless list-group-horizontal flex-center-between text-center mx-md-4 flex-wrap">
                                <li class="list-group-item text-lh-sm ">
                                    <i class="flaticon-download-speed text-primary font-size-40 mb-1 d-block"></i>
                                    <div class="text-gray-1">57 359 km</div>
                                </li>
                                <li class="list-group-item text-lh-sm ">
                                    <i class="flaticon-gasoline-pump text-primary font-size-40 mb-1 d-block"></i>
                                    <div class="text-gray-1">Essence</div>
                                </li>
                                <li class="list-group-item text-lh-sm ">
                                    <i class="flaticon-gear text-primary font-size-40 mb-1 d-block"></i>
                                    <div class="text-gray-1">Automatique</div>
                                </li>
                                <li class="list-group-item text-lh-sm ">
                                    <i class="flaticon-calendar text-primary font-size-40 mb-1 d-block"></i>
                                    <div class="text-gray-1">2022</div>
                                </li>
                            </ul>
                        </div>
                        <div class="border-bottom position-relative">
                            <h5 class="font-size-21 font-weight-bold text-dark">
                                Description
                            </h5>
                            <p id="descrip"></p>
                        </div>
                        <div class="border-bottom py-4">
                            <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                                Specifications
                            </h5>
                            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark">Marque</div>
                                    <span class="text-gray-1" id="marque" ></span>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark">Modèle</div>
                                    <span class="text-gray-1" id="modele"></span>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark">Année de production</div>
                                    <span class="text-gray-1">2017</span>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark">Etat</div>
                                    <span class="text-gray-1">Nouveau</span>
                                </li>
                                <li class="col-md-4 mb-5 list-group-item py-0">
                                    <div class="font-weight-bold text-dark">Assurance</div>
                                    <span class="text-gray-1" id="assurance"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="border-bottom py-4">
                            <h5 class="font-size-21 font-weight-bold text-dark mb-4"> Notes de nos clients </h5>
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="border rounded flex-content-center py-5 border-width-2">
                                        <div class="text-center">
                                            <h2 class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm" id="note2"></h2>
                                            <div class="font-size-25 text-dark mb-3" id='avis'></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Propreté
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;" id="barre1"></div>
                                                <div class="ml-3 text-primary font-weight-bold" id="info1"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Rapport qualité/prix
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;" id="barre2"></div>
                                                <div class="ml-3 text-primary font-weight-bold" id="info2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Services
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;" id="barre3"></div>
                                                <div class="ml-3 text-primary font-weight-bold" id="info3"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="font-weight-normal text-gray-1 mb-1">
                                                Location
                                            </h6>
                                            <div class="flex-horizontal-center mr-6">
                                                <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;" id="barre4"></div>
                                                <div class="ml-3 text-primary font-weight-bold" id="info4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-4">
                            <h5 class="font-size-21 font-weight-bold text-dark mb-6"> Ecrire un avis </h5>
                            <form class="js-validate" novalidate="novalidate">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>		
				
		<!-- Pré-requis -->
		<?php require_once ('require_plus.php'); ?>
	</body>
	
	<footer>
		<!-- Récupère la barre de fin -->
		<?php include("public/footer.php"); ?>
	</footer>
</html>