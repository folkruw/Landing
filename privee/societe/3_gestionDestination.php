		<!-- Table -->
		<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
				
		<!-- Script de destinations -->
		<script src="js/societe/gestionDestination.js?v=<?= md5_file('../../js/societe/gestionDestination.js'); ?>"></script>
		<script src="js/societe/operationDestination.js?v=<?= md5_file('../../js/societe/operationDestination.js'); ?>"></script>
	
		<?php if($_GET['destination'] == "vide"){ ?>
			<main id="content" class="bg-gray">		
				<div class="container space-top-lg-0">
					<!-- Bouton -->
					<button class="btn btn-primary" href="compte.php" onclick="page('3_gestionDestination', 'destination=nouveau');loadPage();">Ajouter une destination</button>
				</div>
				
				<div class="container space-top-lg-0">
					 <table id="tableau" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">Gérer</th>
								<th class="th-sm">Pays</th>
								<th class="th-sm">Destination</th>
								<th class="th-sm">Nombres de billets vendues</th>
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
					<button class="btn btn-secondary" href="compte.php" onclick="page('3_gestionDestination', 'destination=vide');loadPage();">Retour</button>
				</div>			
				<div class="container">
					<div class="row">
						<div>
							<div class="mb-5 shadow-soft bg-white rounded-sm">						
								<div class="pt-4 pb-5 px-5">
									<form id="ajoutModif" class="js-validate">
										<div class="row">
											<div class="col-sm-6 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Destination </label>
													<input type="text" class="form-control" id="destination" placeholder="Destination" <?php if($_GET['destination'] != "nouveau"){ ?> disabled <?php } ?> required>
												</div>
											</div>
											
											<div class="col-sm-6 mb-4">
												<div class="js-form-message">
													<label class="form-label"> Pays </label>
													<select class='form-control js-select dropdown-select' required id='pays'></select>
												</div>
											</div>
										
											<div class="col-sm-6 mb-4" id="emplacementResponsable">
												<div class="js-form-message">
													<label class="form-label"> Illustration </label>
													<input type="text" class="form-control" id="photo" placeholder="Photo" required>
												</div>
											</div>
											
											<div class="col-sm-6 mb-4" id="emplacementPrenom">
												<div class="js-form-message">
													<label class="form-label"> Nombres de billets vendus </label>
													<input type="number" class="form-control" id="nbBilletVendu" placeholder="0" disabled>
												</div>
											</div>
											
											<div class="col-sm-6 mb-4">
												<div class="js-form-message" id="img">
													
												</div>
											</div>
											
											 <div class="col">
												<div class="js-form-message mb-6">
													<label class="form-label"> Description </label>

													<div class="input-group">
														<textarea class="form-control" rows="6" id="descrip" placeholder="Description" aria-label="" required></textarea>
													</div>
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">Valider</button>
													<?php if($_GET['destination'] != "nouveau"){ ?> <button class="btn btn-danger btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3" href="compte.php" id="suppression">Suppression</button> <?php } ?>
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