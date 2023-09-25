		<!-- Table -->
		<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
				
		<!-- Script de vols -->
		<script src="js/societe/gestionVol.js?v=<?= md5_file('../../js/societe/gestionVol.js'); ?>"></script>
		<script src="js/societe/operationVol.js?v=<?= md5_file('../../js/societe/operationVol.js'); ?>"></script>
	
		<?php if($_GET['vol'] == "vide"){ ?>
			<main id="content" class="bg-gray">		
				<div class="container space-top-lg-0">
					<!-- Bouton -->
					<button class="btn btn-primary" href="compte.php" onclick="page('3_gestionVol', 'vol=nouveau');loadPage();">Ajouter un vol</button>
				</div>
				
				<div class="container space-top-lg-0">
					 <table id="tableau" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">Gérer</th>
								<th class="th-sm">Numéro de vol</th>
								<th class="th-sm">Compagnie</th>
								<th class="th-sm">Durée</th>
								<th class="th-sm">Date</th>
								<th class="th-sm">Heure</th>
								<th class="th-sm">Départ</th>
								<th class="th-sm">Destination</th>
								<th class="th-sm">Places</th>
							</tr>
						</thead>
						<tbody id="liste"></tbody>
					</table>
				</div>
			</main>
		<?php } else { ?>
			<main id="content" class="bg-gray space-1">	
				<div class="container space-bottom-1 space-top-lg-0">
					<!-- Bouton -->
					<button class="btn btn-secondary" href="compte.php" onclick="page('3_gestionVol', 'vol=vide');loadPage();">Retour</button>
				</div>			
				<div class="container">
					<div class="row">
						<div>
							<div class="mb-5 shadow-soft bg-white rounded-sm">						
								<div class="pt-4 pb-5 px-5">
									<form id="ajoutModif" class="js-validate">
										<div class="row">										
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Numéro de vol </label>
													<input type="text" class="form-control" id="numVol" placeholder="Numéro du vol" disabled required>
												</div>
											</div>
																				
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Nombre de place </label>
													<input type="number" class="form-control" id="nbPassager" placeholder="Nombre de place" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Compagnie </label>
													<select class='form-control js-select dropdown-select' required id='listeCompagnie' onchange='changementNumero();'></select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Repas compris </label>
													<select class='form-control js-select dropdown-select' required id="repas">
														<option value="0" selected>Non</option>
														<option value="1">Oui</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Durée de vol : heures, </label>
													<input type="text" class="form-control" id="heureDuree" placeholder="Heures" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> minutes </label>
													<input type="text" class="form-control" id="minuteDuree" placeholder="Minutes" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Départ </label>
													<select class='form-control js-select dropdown-select' required id='listeDestination2'></select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Destination </label>
													<select class='form-control js-select dropdown-select' required id='listeDestination'></select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Prix / personne </label>
													<input type="text" step="any" class="form-control" id="prixP" placeholder="Prix / personne" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Date </label>
													<div class="border-bottom border-width-2 border-color-1">
														<div class="u-datepicker input-group">
															<div class="input-group-prepend">
																<span class="d-flex align-items-center mr-2">
																  <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
																</span>
															</div>
															<input class="js-range-datepicker font-size-16 shadow-ntwo font-weight-medium form-control hero-form bg-transparent border-0" type="date" id="dateDepart">
														</div>
													</div>
												</div>
											</div>
																						
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Aéroport de départ </label>
													<input type="text" class="form-control" id="lieuDepart" placeholder="Aéroport de départ" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Aéroport de destination </label>
													<input type="text" class="form-control" id="lieuDestination" placeholder="Aéroport de destination" required>
												</div>
											</div>
											
											<div class="col-sm-2 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Départ : heure </label>
													<input type="text" class="form-control" id="heureDepart" placeholder="Heures" required>
												</div>
											</div>
											<div class="col-sm-1 mb-4">
												<div class="js-form-message">
													<label class="form-label"> minute </label>
													<input type="text" class="form-control" id="minuteDepart" placeholder="Minutes" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Escale </label>
													<select class='form-control js-select dropdown-select' id="escale">
														<option value="0">Non</option>
														<option value="1">Oui</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Ville d'escale </label>
													<input type="text" class="form-control" id="villeEscale" placeholder="Ville de l'escale">
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Durée de l'escale (HH:MM:SS) </label>
													<input type="text" class="form-control" id="dureeEscale" placeholder="Durée de l'escale" value="00:00:00">
												</div>
											</div>
																						
											<div class="col-sm-12 align-self-end">
												<div class="text-center">
													<button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">Valider</button>
													<?php if($_GET['vol'] != "nouveau"){ ?> <button class="btn btn-danger btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" href="compte.php" id="suppression">Suppression</button> <?php } ?>
												</div>
											</div>
										</div>									
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		<?php } ?>