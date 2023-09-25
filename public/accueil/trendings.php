<!-- Appel pour affichage -->
<script src='js/location/location.js?v=<?= md5_file("js/location/location.js"); ?>'></script>
<script src='js/hotel/hotel.js?v=<?= md5_file("js/hotel/hotel.js"); ?>'></script>
<script src='js/vol/vol.js?v=<?= md5_file("js/vol/vol.js"); ?>'></script>

<script>
$(document).ready(function(){
	chargementVol('%');
	chargementHotelTrending('%');
	chargementLocationTrending();
});
</script>

<!-- Trending -->
<div class="container space-bottom-1 space-top-lg-3">
	<ul class="nav tab-nav-rounded flex-nowrap pb-2 pb-md-4 tab-nav justify-content-lg-center" role="tablist">
		<li class="nav-item" onclick="hideTrending()">
			<a class="nav-link font-weight-medium pl-md-5 pl-3" id="pills-one-example-t1-tab" data-toggle="pill" href="#pills-one-example-t1" role="tab" aria-controls="pills-one-example-t1"  aria-selected="true">
				<div class="d-flex flex-column flex-md-row  position-relative  text-black align-items-center">
					<figure class="ie-height-40 d-md-block mr-md-3">
						<i class="icon flaticon-aeroplane font-size-3"></i>
					</figure>
					<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Vols</span>
				</div>
			</a>
		</li>
		<li class="nav-item" onclick="hideTrending()">
			<a class="nav-link font-weight-medium"id="pills-two-example-t1-tab" data-toggle="pill" href="#pills-two-example-t1" role="tab" aria-controls="pills-two-example-t1" aria-selected="true">
				<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
					<figure class="ie-height-40 d-md-block mr-md-3">
						<i class="icon flaticon-hotel font-size-3"></i>
					</figure>
					<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Hôtels</span>
				</div>
			</a>
		</li>
		<li class="nav-item" onclick="hideTrending()">
			<a class="nav-link font-weight-medium" id="pills-three-example-t1-tab" data-toggle="pill" href="#pills-three-example-t1" role="tab" aria-controls="pills-three-example-t1" aria-selected="true">
				<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
					<figure class="ie-height-40 d-md-block mr-md-3">
						<i class="icon flaticon-sedan font-size-3"></i>
					</figure>
					<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Véhicules</span>
				</div>
			</a>
		</li>
	</ul>


	<div class="tab-content" id="myDIV">
		<div class="tab-pane fade active show" id="pills-one-example-t1" role="tabpanel" aria-labelledby="pills-one-example-t1-tab">
			<div class="row" id="volTrending">
			
			</div>
		</div>
		<div class="tab-pane fade" id="pills-two-example-t1" role="tabpanel" aria-labelledby="pills-two-example-t1-tab">
			<div class="row" id="hotelTrending">
				
			</div>
		</div>
		
		<!-- Catégorie de véhicule -->
		<div class="tab-pane fade" id="pills-three-example-t1" role="tabpanel" aria-labelledby="pills-three-example-t1-tab">
				<ul class="nav tab-nav-rounded flex-nowrap pb-2 pb-md-4 tab-nav justify-content-lg-center" role="tablist">
					<li class="nav-item">
						<a class="nav-link font-weight-medium active pl-md-5 pl-3" id="pills-four-example-t1-tab" data-toggle="pill" href="#pills-four-example-t1" role="tab" aria-controls="pills-four-example-t1"  aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative  text-black align-items-center">
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Berline</span>
							</div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-medium"id="pills-five-example-t1-tab" data-toggle="pill" href="#pills-five-example-t1" role="tab" aria-controls="pills-five-example-t1" aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Premium</span>
							</div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-medium" id="pills-six-example-t1-tab" data-toggle="pill" href="#pills-six-example-t1" role="tab" aria-controls="pills-six-example-t1" aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Utilitaire</span>
							</div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-medium" id="pills-seven-example-t1-tab" data-toggle="pill" href="#pills-seven-example-t1" role="tab" aria-controls="pills-seven-example-t1" aria-selected="true">
							<div class="d-flex flex-column flex-md-row  position-relative text-black align-items-center">
								<span class="tabtext mt-2 mt-md-0 font-weight-semi-bold">Bus / Autocar</span>
							</div>
						</a>
					</li>
				</ul>
				
				<div class="tab-content" id="myDIV">
					<div class="tab-pane fade active show" id="pills-four-example-t1" role="tabpanel" aria-labelledby="pills-four-example-t1-tab">
						<div class="row" id="berline">
						</div>
					</div>
					<div class="tab-pane fade" id="pills-five-example-t1" role="tabpanel" aria-labelledby="pills-five-example-t1-tab">
						<div class="row" id="premium">
						</div>
					</div>
					<div class="tab-pane fade" id="pills-six-example-t1" role="tabpanel" aria-labelledby="pills-six-example-t1-tab">
						<div class="row" id="utilitaire">
						</div>
					</div>
					<div class="tab-pane fade" id="pills-seven-example-t1" role="tabpanel" aria-labelledby="pills-seven-example-t1-tab">
						<div class="row" id="busautocar">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>