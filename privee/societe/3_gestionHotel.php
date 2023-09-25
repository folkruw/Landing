		<!-- Table -->
		<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
				
		<!-- Script de hotels -->
		<script src="js/societe/gestionHotel.js?v=<?= md5_file('../../js/societe/gestionHotel.js'); ?>"></script>
		<script src="js/societe/operationHotel.js?v=<?= md5_file('../../js/societe/operationHotel.js'); ?>"></script>
	
		<?php if($_GET['hotel'] == "vide"){ ?>
			<main id="content" class="bg-gray">		
				<div class="container space-top-lg-0">
					<!-- Bouton -->
					<button class="btn btn-primary" href="compte.php" onclick="page('3_gestionHotel', 'hotel=nouveau');loadPage();">Ajouter une hotel</button>
				</div>
				
				<div class="container space-top-lg-0">
					 <table id="tableau" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">Gérer</th>
								<th class="th-sm">Destination</th>
								<th class="th-sm">Hotel</th>
								<th class="th-sm">Adresse</th>
								<th class="th-sm">Type de chambre</th>
								<th class="th-sm">Page sur le site</th>
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
					<button class="btn btn-secondary" href="compte.php" onclick="page('3_gestionHotel', 'hotel=vide');loadPage();">Retour</button>
				</div>			
				<div class="container">
					<div class="row">
						<div>
							<div class="mb-5 shadow-soft bg-white rounded-sm">						
								<div class="pt-4 pb-5 px-5">
									<form id="ajoutModif" class="js-validate">
										<div class="row">										
											<div class="col-sm-2 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Numéro de l'hôtel </label>
													<input type="text" class="form-control" id="idHotel" placeholder="Numéro de l'hôtel" value='null' disabled required>
												</div>
											</div>
											
											<div class="col-sm-4 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Hotel </label>
													<input type="text" class="form-control" id="hotel" placeholder="Hotel" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Type de chambre </label>
													<select class='form-control js-select dropdown-select' required id="typeChambre">
														<option value="Double">Double</option>
														<option value="Deluxe">Deluxe</option>
														<option value="Premium">Premium</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Prix </label>
													<input type="number" step="any" class="form-control" id="prix" placeholder="Prix" required>
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
													<label class="form-label"> Adresse </label>
													<input type="text" class="form-control" id="adresse" placeholder="Adresse" required>
												</div>
											</div>
											
											<div class="col-sm-6 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Nombre de place </label>
													<input type="number" class="form-control" id="nbPlace" placeholder="Nombre de place" required>
												</div>
											</div>
											
											<div class="col-sm-6 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Illustration </label>
													<input type="text" class="form-control" id="image" placeholder="Image" required>
												</div>
												
												<div class="js-form-message mb-6">
													<label class="form-label"> Description </label>

													<div class="input-group">
														<textarea class="form-control" rows="6" id="descrip" placeholder="Description" aria-label="" required></textarea>
													</div>
												</div>
												
												<div class="text-center space-1">
													<button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">Valider</button>
													<?php if($_GET['hotel'] != "nouveau"){ ?> <button class="btn btn-danger btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" href="compte.php" id="suppression">Suppression</button> <?php } ?>
												</div>
											</div>
											
											<div class="col-sm-6 mb-4">
												<div class="js-form-message" id="img">
													
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