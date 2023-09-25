		<!-- Table -->
		<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
				
		<!-- Charge le script -->
		<script src='js/admin/listeProfil.js?v=<?= md5_file('../../js/admin/listeProfil.js'); ?>'></script>
		<main id="content" class="bg-gray space-1">		
			<div class="container space-bottom-1 space-top-lg-2">
				<ul class="nav tab-nav-rounded flex-nowrap pb-2 pb-md-4 tab-nav justify-content-lg-center" role="tablist">
					<li class="nav-item">
						<a class="nav-link font-weight-medium active pl-md-5 pl-3" id="pills-one-example-t1-tab" data-toggle="pill" href="#pills-one-example-t1" role="tab" aria-controls="pills-one-example-t1"  aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative  text-black align-items-center">
								<figure class="ie-height-40 d-md-block mr-md-3">
									<i class="icon flaticon-user font-size-3"></i>
								</figure>
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Utilisateur</span>
							</div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-medium"id="pills-two-example-t1-tab" data-toggle="pill" href="#pills-two-example-t1" role="tab" aria-controls="pills-two-example-t1" aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
								<figure class="ie-height-40 d-md-block mr-md-3">
									<i class="icon flaticon-building font-size-3"></i>
								</figure>
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Société</span>
							</div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-medium" id="pills-three-example-t1-tab" data-toggle="pill" href="#pills-three-example-t1" role="tab" aria-controls="pills-three-example-t1" aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
								<figure class="ie-height-40 d-md-block mr-md-3">
									<i class="icon flaticon-password font-size-3"></i>
								</figure>
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Administration</span>
							</div>
						</a>
					</li>
				</ul>
				<div class="tab-content" id="myDIV">
					<div class="tab-pane fade active show" id="pills-one-example-t1" role="tabpanel" aria-labelledby="pills-one-example-t1-tab">
						  <table id="tableUtil" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="th-sm">Nom</th>
									<th class="th-sm">Prénom</th>
									<th class="th-sm">Adresse mail</th>
									<th class="th-sm">Rôles</th>
									<th class="th-sm">Opérations</th>
								</tr>
							</thead>
							<tbody id="listeProfilUser"></tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="pills-two-example-t1" role="tabpanel" aria-labelledby="pills-two-example-t1-tab">
						<table id="tableSociete" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="th-sm">Nom</th>
									<th class="th-sm">Responsable</th>
									<th class="th-sm">Adresse mail</th>
									<th class="th-sm">Rôles</th>
									<th class="th-sm">Opérations</th>
								</tr>
							</thead>
							<tbody id="listeProfilSociete"></tbody>
						</table>
					</div>
					
					<!-- Panel pour les véhicules -->
					<div class="tab-pane fade" id="pills-three-example-t1" role="tabpanel" aria-labelledby="pills-three-example-t1-tab">
						<table id="tableAdmin" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="th-sm">Nom</th>
									<th class="th-sm">Prénom</th>
									<th class="th-sm">Adresse mail</th>
									<th class="th-sm">Rôles</th>
									<th class="th-sm">Opérations</th>
								</tr>
							</thead>
							<tbody id="listeProfilAdmin"></tbody>
						</table>
					</div>
				</div>
			</div>
        </main>
