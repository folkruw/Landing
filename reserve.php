<!DOCTYPE html>
<html lang="fr">
    <head>
		<title>Réservation</title>
		<script src='js/reservation.js?v=<?= md5_file('js/reservation.js'); ?>'></script>
	</head>
    
	<body onload='selectVol();loadVol();'>
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php if(!isset($_SESSION)){session_start();} ?>
		<?php if(!isset($_SESSION['pseudo'])){header('Location: pageConnexion.php');} ?>
		<?php include("public/navBar.reduce.php"); ?>		
		
        <main id="content" class="bg-gray space-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="mb-5 shadow-soft bg-white rounded-sm" id="InfoVoyage">
                            <div class="py-3 px-4 px-xl-12 border-bottom">
                                <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                    <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                        <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                            1
                                        </div>
                                        <div class="text-primary">Informations sur le voyage</div>
                                    </li>
                                    <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                        <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                            2
                                        </div>
                                        <div class="text-gray-1">Informations sur le client</div>
                                    </li>
                                    <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                        <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                            3
                                        </div>
                                        <div class="text-gray-1">Confirmation de réservation</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="pt-4 pb-5 px-5">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                                    Completez votre voyage
                                </h5>
								<div class="row">
									<div class="col-sm-6 mb-4">
										<div class="js-form-message">
											<?php if($_GET['dateDepart'] != "non"){$date = $_GET['dateDepart'];} else {$date = '';}?>
											<label class="form-label"> Date de départ </label>
											<div id="datepickerWrapperFromOne" class="u-datepicker input-group">
												<div class="input-group-prepend">
													<span class="d-flex align-items-center mr-2">
													  <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
													</span>
												</div>
												 <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0" type="date" id="dateDepart" onchange='loadVol();'
													 data-rp-wrapper="#datepickerWrapperFromOne"
													 data-rp-type="single"
													 data-rp-date-format="M d / Y"
													 data-rp-default-date='["<?php echo $date; ?>"]'>
											</div>
										</div>
									</div>
									
									<div class="col-sm-6 mb-4">
										<div class="js-form-message">
											<?php if($_GET['dateRetour'] != "non"){$date = $_GET['dateRetour'];} else {$date = '';}?>
											<label class="form-label"> Date de retour </label>
											<div id="datepickerWrapperFromTwo" class="u-datepicker input-group">
												<div class="input-group-prepend">
													<span class="d-flex align-items-center mr-2">
													  <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
													</span>
												</div>
												 <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0" type="date" id="dateRetour" onchange='loadVol();'
													 data-rp-wrapper="#datepickerWrapperFromTwo"
													 data-rp-type="single"
													 data-rp-date-format="M d / Y"
													 data-rp-default-date='["<?php echo $date; ?>"]'>
											</div>
										</div>
									</div>
									
									<div class="col-sm-6 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Départ de </label>
											<select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="" data-style="" data-live-search="true" data-searchbox-classes="input-group-sm" required id='departs' onchange='loadVol();'></select>
										</div>
									</div>
									
									<div class="col-sm-6 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Arrivé à </label>
											<select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="" data-style="" data-live-search="true" data-searchbox-classes="input-group-sm" required id='arrives' onchange='loadVol();'></select>
										</div>
									</div>
									
									<div class="col-sm-6 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Vol sélectionné </label>
											<select class='form-control dropdown-select' required id='vols' onchange='selectVol();'></select>
										</div>
									</div>
									
									<div class="w-100"></div>

									<div class="col-sm-4 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Choix de votre hôtel </label>
											<select class='form-control dropdown-select' required id='hotels' onchange='chargementInfoHotel();obtenirPrix();'></select>
										</div>
									</div>
									
									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Nb. de nuit </label>
											<input type="number" class="form-control" id="nbNuit" min="0" value="<?php echo $_GET['nbNuit']; ?>" placeholder="" onchange='chargementInfoHotel();obtenirPrix();' required>
										</div>
									</div>
									
									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Nb. chambres</label>
											<input type="number" class="form-control" id="nbChambre" min="0" value="<?php echo $_GET['nbChambre']; ?>" placeholder="" onchange='chargementInfoHotel();obtenirPrix();' required>
										</div>
									</div>
									
									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Adultes </label>
											<input type="number" class="form-control" id="nbAdulte" min="0" value="<?php echo $_GET['nbAdulte']; ?>" placeholder="" onchange='chargementInfoHotel();obtenirPrix();' required>
										</div>
									</div>
									
									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Enfants </label>
											<input type="number" class="form-control" id="nbEnfant" min="0" value="<?php echo $_GET['nbEnfant']; ?>" placeholder="" onchange='chargementInfoHotel();obtenirPrix();' required>
										</div>
									</div>
									
									<div class="w-100"></div>
																			
									<div class="col-sm-4 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Location d'un véhicule </label>
											<select class='form-control dropdown-select' required id='locations' onchange='obtenirPrix();'></select>
										</div>
									</div>
									
									<div class="col-sm-6 align-self-end">
										<div class="text-right">
											<button class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" onclick="hideTrending();">Suivant</button>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                        <div class="mb-5 shadow-soft bg-white rounded-sm" id="infoClient">
                            <div class="py-3 px-4 px-xl-12 border-bottom">
                                <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                                    <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                        <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                            1
                                        </div>
                                        <div class="text-gray-1">Informations sur le voyage</div>
                                    </li>
                                    <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                        <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                            2
                                        </div>
                                        <div class="text-primary">Informations sur le client</div>
                                    </li>
                                    <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                        <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                            3
                                        </div>
                                        <div class="text-gray-1">Confirmation de réservation</div>
                                    </li>
                                </ul>
                            </div>
                           <div class="pt-4 pb-5 px-5">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                                    Completez vos informations
                                </h5>
								
								<input type="hidden" id="idClient" value="0"></input>
								
								<div class="row">
									<div class="col-sm-3 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Nom </label>
											<input type="text" class="form-control" id="nom" placeholder="Nom" required>
										</div>
									</div>

									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Prénom </label>
											<input type="text" class="form-control" id="prenom" placeholder="Prénom" required>
										</div>
									</div>

									<div class="col-sm-4 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Adresse mail </label>
											<input type="email" class="form-control" id="mail" placeholder="Adresse mail" required>
										</div>
									</div>

									<div class="col-sm-3 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Téléphone </label>
											<input type="number" class="form-control" id="numTel" placeholder="Numéro de téléphone" required>
										</div>
									</div>
									
									<div class="col-sm-4 mb-4">
										<div class="js-form-message" id="lesPays">
										</div>
									</div>
																		
									<div class="col-sm-3 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Province </label>
											<input type="text" class="form-control" id="province" placeholder="Province" required>
										</div>
									</div>
									
									<div class="col-sm-3 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Localité </label>
											<input type="text" class="form-control" id="localite" placeholder="Localité" required>
										</div>
									</div>
									
									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Code postal </label>
											<input type="text" class="form-control" id="cp" placeholder="Code postal" required>
										</div>
									</div>
									
									<div class="col-sm-3 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Adresse </label>
											<input type="text" class="form-control" id="adresse" placeholder="Adresse" required>
										</div>
									</div>
									
									<div class="col-sm-2 mb-4">
										<div class="js-form-message">
											<label class="form-label"> Numéro </label>
											<input type="number" class="form-control" id="numero" placeholder="Numéro" required>
										</div>
									</div>
									
									<div class="col-sm-7 align-self-end">
										<div class="text-right">
											<button onclick="ajoutReservation();hideTrending();" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" id="Confirm">Confirmez la réservation</button>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                        <div class="mb-5 shadow-soft bg-white rounded-sm" id="resume">
							<div class="py-6 px-5 border-bottom">
                                <div class="flex-horizontal-center">
                                    <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                        <i class="flaticon-tick text-white font-size-24"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                            Merci. Votre réservation à été validée.
                                        </h3>
                                        <p class="mb-0">Un mail de confirmation vous à été envoyé.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4 pb-5 px-5 border-bottom">
                                <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
                                    Récapitulatif
                                </h5>
                                <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Numéro de réservation</span>
                                        <span class="text-secondary text-right">5784-BD245</span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Prénom</span>
                                        <span class="text-secondary text-right" id="recapPrenom"></span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Nom</span>
                                        <span class="text-secondary text-right" id="recapNom"></span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Adresse mail</span>
                                        <span class="text-secondary text-right" id="recapMail"></span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Adresse</span>
                                        <span class="text-secondary text-right" id="recapAdresse"></span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Ville</span>
                                        <span class="text-secondary text-right" id="recapVille"></span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Code postal</span>
                                        <span class="text-secondary text-right" id="recapCp"></span>
                                    </li>

                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium">Pays</span>
                                        <span class="text-secondary text-right" id="recapPays"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="shadow-soft bg-white rounded-sm">
                            <div class="pt-5 pb-3 px-5 border-bottom">
                                <a class="d-block mb-3"><img class="img-fluid rounded-xs" src="images/default/plane.jpg" alt="Image-Description"></a>
                                <a class="text-dark font-weight-bold pr-xl-1" id="selectVolNum">Aucun vol sélectionné</a>
								<div id="basicsCollapseThree" class="collapse show"
                                        aria-labelledby="basicsHeadingThree"
                                        data-parent="#basicsAccordion">
                                        <div class="card-body px-4 pt-0">
                                            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
												<li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Du</span>
                                                    <span class="text-secondary" id="selectDateDepart"></span>
                                                </li>
												
												<li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Au</span>
                                                    <span class="text-secondary" id="seletcDateRetour"></span>
                                                </li>

                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Départ</span>
                                                    <span class="text-secondary" id="selectDepart"></span>
                                                </li>

                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Arrivé</span>
                                                    <span class="text-secondary" id="selectArrive"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                            <div id="basicsAccordion">
                                <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                                    <div class="card-header acti card-collapse bg-transparent border-0" id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                                data-toggle="collapse"
                                                data-target="#basicsCollapseOne"
                                                aria-expanded="true"
                                                aria-controls="basicsCollapseOne">
                                                Détails de la réservation

                                                <span class="card-btn-arrow font-size-14 text-dark">
                                                    <i class="fas fa-chevron-down"></i>
                                                </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show"
                                        aria-labelledby="basicsHeadingOne"
                                        data-parent="#basicsAccordion">
                                        <div class="card-body px-4 pt-0">
                                            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Nombres de nuits</span>
                                                    <span class="text-secondary" id="nbNuitInfo"></span>
                                                </li>

                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Chambres</span>
                                                    <span class="text-secondary" id="nbChambreInfo"></span>
                                                </li>

                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Adultes</span>
                                                    <span class="text-secondary" id="nbAdulteInfo"></span>
                                                </li>
												
												 <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Enfants</span>
                                                    <span class="text-secondary" id="nbEnfantInfo"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
                                    <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour">
                                        <h5 class="mb-0">
                                            <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                                                data-toggle="collapse"
                                                data-target="#basicsCollapseFour"
                                                aria-expanded="false"
                                                aria-controls="basicsCollapseFour">
                                                Paiement

                                                <span class="card-btn-arrow font-size-14 text-dark">
                                                    <i class="fas fa-chevron-down"></i>
                                                </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseFour" class="collapse show"
                                        aria-labelledby="basicsHeadingFour"
                                        data-parent="#basicsAccordion">
                                        <div class="card-body px-4 pt-0">
                                            <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Sous-total</span>
                                                    <span class="text-secondary" id="sousTotal">0.00 €</span>
                                                </li>

                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="font-weight-medium">Suppléments</span>
                                                    <span class="text-secondary" id="supp" >0.00 €</span>
                                                </li>

                                                <li class="d-flex justify-content-between py-2 font-size-17 font-weight-bold">
                                                    <span class="font-weight-bold">Total</span>
                                                    <span class="" id="total">0.00 €</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

		<?php if($_GET['dateDepart'] != "non"){echo "<script>chargementDestination();</script>";} ?>
		<?php echo "<script>chargementLocation();</script>"; ?>
		<?php if($_GET['destDepart'] != "non" && $_GET['destArr'] != "non"){echo "<script>chargementDestination('".$_GET['destDepart']."', '".$_GET['destArr']."'); chargementVol('".$_GET['destDepart']."', '".$_GET['destArr']."', '".$_GET['dateDepart']."');</script>";} else {echo "<script>chargementDestination('', '')</script>";} ?>
		<?php if($_GET['destArr'] != "non" && $_GET['hotel'] != "non"){echo "<script>chargementHotel('".$_GET['destArr']."', '".$_GET['hotel']."');</script>";} ?>
		<?php echo "<script>chargementInfoClient('".$_SESSION['pseudo']."')</script>"; ?>		
		<script>
			document.getElementById("InfoVoyage").style.display = "block";
			document.getElementById("infoClient").style.display = "none";
			document.getElementById("resume").style.display = "none";
			function hideTrending() {
				var infoVoyage = document.getElementById("InfoVoyage");
				var infoClient = document.getElementById("infoClient");
				var resume = document.getElementById("resume");
				if(document.getElementById("vols").value != "Aucun"){
					if (infoClient.style.display == "none" && resume.style.display == "none" && infoVoyage.style.display == 'block') {
						infoVoyage.style.display = "none";
						infoClient.style.display = "block";
					} else if(infoClient.style.display == "block" && infoVoyage.style.display == 'none') {
						infoClient.style.display = "none";
						infoVoyage.style.display = "none";
						resume.style.display = "block";
					}
				}					
			}
		</script>
		<?php require_once ('require_plus.php'); ?>
	</body>
	
	<footer>
		<!-- Récupère la barre de fin -->
		<?php include("public/footer.php"); ?>
	</footer>
</html>