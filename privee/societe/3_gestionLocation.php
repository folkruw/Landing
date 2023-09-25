		<!-- Table -->
		<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
				
		<!-- Script de locationss -->
		<script src="js/societe/gestionLocation.js?v=<?= md5_file('../../js/societe/gestionLocation.js'); ?>"></script>
		<script src="js/societe/operationLocation.js?v=<?= md5_file('../../js/societe/operationLocation.js'); ?>"></script>
		
		<?php if($_GET['locations'] == "vide"){ ?>
			<main id="content" class="bg-gray">		
				<div class="container space-top-lg-0">
					<!-- Bouton -->
					<button class="btn btn-primary" href="compte.php" onclick="page('3_gestionLocation', 'locations=nouveau');loadPage();">Ajouter une location</button>
				</div>
				
				<div class="container space-top-lg-0">
					 <table id="tableau" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">Gérer</th>
								<th class="th-sm">Classe</th>
								<th class="th-sm">Marque</th>
								<th class="th-sm">Modèle</th>
								<th class="th-sm">Prix</th>
								<th class="th-sm">Caution</th>
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
					<button class="btn btn-secondary" href="compte.php" onclick="page('3_gestionLocation', 'locations=vide');loadPage();">Retour</button>
				</div>			
				<div class="container">
					<div class="row">
						<div>
							<div class="mb-5 shadow-soft bg-white rounded-sm">						
								<div class="pt-4 pb-5 px-5">
									<form id="ajoutModif" class="js-validate">
										<div class="row">										
											<div class="col-sm-3 mb-2">
												<div class="js-form-message">
													<label class="form-label"> Identifiant du véhicule </label>
													<input type="text" class="form-control" id="idLocation" placeholder="Identifiant du véhicule" value='null' disabled required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-2">
												<div class="js-form-message">
													<label class="form-label"> Classe </label>
													<select class='form-control js-select dropdown-select' required id="classe">
														<option value="Berline">Berline</option>
														<option value="Premium">Premium</option>
														<option value="Utilitaire">Utilitaire</option>
														<option value="Autocar">Autocar</option>
													</select>
												</div>
											</div>
																				
											<div class="col-sm-3 mb-2">
												<div class="js-form-message">
													<label class="form-label"> Marque </label>
													<input type="text" class="form-control" id="marque" placeholder="Marque" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-2">
												<div class="js-form-message">
													<label class="form-label"> Modèle </label>
													<input type="text" class="form-control" id="modele" placeholder="Modèle" required>
												</div>
											</div>
											
											<div class="col-sm-2 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Note (/5) </label>
													<input type="number" step="any" class="form-control" id="note" placeholder="Note" required>
												</div>
											</div>
													
											<div class="col-sm-2 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Prix </label>
													<input type="number" step="any" class="form-control" id="prix" placeholder="Prix" required>
												</div>
											</div>
											
											<div class="col-sm-2 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Caution </label>
													<input type="number" step="any" class="form-control" id="caution" placeholder="Caution" required>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Assurance </label>
													<select class='form-control js-select dropdown-select' required id="assurance">
														<option value="0">Non</option>
														<option value="1">Oui</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-3 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Nombre de place </label>
													<input type="number" class="form-control" id="nbPlace" placeholder="Nombre de place" required>
												</div>
											</div>
																						
											<div class="col">
												<div class="js-form-message mb-6">
													<label class="form-label"> Description </label>
													<div class="input-group">
														<textarea class="form-control" rows="4" id="descrip" placeholder="Description" aria-label="" required></textarea>
													</div>
												</div>
												<div class="js-form-message">
													<label class="form-label"> Illustration </label>
													<input type="text" class="form-control" id="image" placeholder="Image" required>
												</div>
												<div class="text-center space-1">
													<button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">Valider</button>
													<?php if($_GET['locations'] != "nouveau"){ ?> <button class="btn btn-danger btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" href="compte.php" id="suppression">Suppression</button> <?php } ?>
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