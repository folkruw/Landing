		<!-- Table -->
		<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
				
		<!-- Script de vols -->
		<script src="js/user/gestionReservation.js?v=<?= md5_file('../../js/user/gestionReservation.js'); ?>"></script>
		<main id="content" class="bg-gray space-1">		
			<div class="container space-bottom-1 space-top-lg-0">
				 <h3>Listes de nos réservations</h3>
				 <table id="tableau" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="th-sm">Numéro de réservation</th>
							<th class="th-sm">Numéro de vol</th>
							<th class="th-sm">Date de départ</th>
							<th class="th-sm">Destination</th>
							<th class="th-sm">Hôtel</th>
							<th class="th-sm">Location</th>
						</tr>
					</thead>
					<tbody id="liste"></tbody>
				</table>
			</div>
		</main>