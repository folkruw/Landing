<script>
					function changeInfo(){
							setTimeout(() => {  
								nbChambre = document.getElementById('nbChambre').value;
								nbPassager = parseInt(document.getElementById('nbAdulte').value) + parseInt(document.getElementById('nbEnfant').value);
								$('#info').html(nbChambre + " chambres - " + nbPassager + " personnes");							
							}, 2);
						}
					</script>
					<div class="container">
						<div>
							<div class="card border-0 tab-shadow">
								<div class="card-body">
									<div class="tab-content hero-tab-pane">
										<div class="tab-pane fade pt-xl-4 active show" id="pills-one-example2" role="tabpanel" aria-labelledby="pills-one-example2-tab">
											<div class="row nav-select d-block d-lg-flex">
												<div class="col-sm-2 mb-4">
													<span class="d-block text-gray-1 text-left font-weight-normal mb-0">Partir de</span>
													<div class="js-focus-state">
														<div class="input-group border-bottom border-width-2 border-color-1" id="searchDesti">
															
														</div>
													</div>
												</div>
												<div class="col-sm-2 mb-4">
													<span class="d-block text-gray-1 text-left font-weight-normal mb-0">Arriver à</span>
													<div class="js-focus-state">
														<div class="input-group border-bottom border-width-2 border-color-1" id="searchDesti2">
														</div>
													</div>
												</div>
												<div class="col-sm-3 mb-4">
													<span class="d-block text-gray-1 text-left font-weight-normal mb-0">Aller-retour</span>
													<div class="border-bottom border-width-2 border-color-1">
														<div id="datepickerWrapperFromOne" class="u-datepicker input-group">
															<div class="input-group-prepend">
																<span class="d-flex align-items-center mr-2">
																  <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
																</span>
															</div>
															 <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date"
																 id="date"
																 data-rp-wrapper="#datepickerWrapperFromOne"
																 data-rp-type="range"
																 data-rp-date-format="M d / Y"
																 data-rp-default-date='["Jui 7 / 2022", "Jui 25 / 2022"]'>
														</div>
													</div>
												</div>
												<div class="col-sm-3 mb-4 dropdown-custom">
													<span class="d-block text-gray-1 text-left font-weight-normal mb-0">Infos</span>
													<a id="basicDropdownClickInvoker" class="dropdown-nav-link dropdown-toggle d-flex pt-3 pb-2" href="javascript:;" role="button"
														aria-controls="basicDropdownClick"
														aria-haspopup="true"
														aria-expanded="false"
														data-unfold-event="click"
														data-unfold-target="#basicDropdownClick"
														data-unfold-type="css-animation"
														data-unfold-duration="300"
														data-unfold-delay="300"
														data-unfold-hide-on-scroll="true"
														data-unfold-animation-in="slideInUp"
														data-unfold-animation-out="fadeOut">
														<i class="flaticon-plus d-flex align-items-center mr-3 font-size-18 text-primary font-weight-semi-bold"></i>
														<span class="text-black font-size-16 font-weight-semi-bold" id="info"></span>
													</a>
													<div id="basicDropdownClick" class="dropdown-menu dropdown-unfold col-11 m-0" aria-labelledby="basicDropdownClickInvoker">
														<div class="w-100 py-2 px-3 mb-3">
															<div class="js-quantity mx-3 row align-items-center justify-content-between">
																<span class="d-block font-size-16 text-secondary font-weight-medium">Chambres</span>
																<div class="d-flex">
																	<a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;" onclick="changeInfo();">
																		<small class="fas fa-minus btn-icon__inner"></small>
																	</a>
																	<input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="number" value="1" id="nbChambre">
																	<a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;" onclick="changeInfo();">
																		<small class="fas fa-plus btn-icon__inner"></small>
																	</a>
																</div>
															</div>
														</div>
														<div class="w-100 py-2 px-3 mb-3">
															<div class="js-quantity mx-3 row align-items-center justify-content-between">
																<span class="d-block font-size-16 text-secondary font-weight-medium">Adultes</span>
																<div class="d-flex">
																	<a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;" onclick="changeInfo();">
																		<small class="fas fa-minus btn-icon__inner"></small>
																	</a>
																	<input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="number" value="1" id="nbAdulte">
																	<a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;" onclick="changeInfo();">
																		<small class="fas fa-plus btn-icon__inner"></small>
																	</a>
																</div>
															</div>
														</div>
														<div class="w-100 py-2 px-3">
															<div class="js-quantity mx-3 row align-items-center justify-content-between">
																<span class="d-block font-size-16 text-secondary font-weight-medium">Enfants</span>
																<div class="d-flex">
																	<a class="js-minus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;" onclick="changeInfo();">
																		<small class="fas fa-minus btn-icon__inner"></small>
																	</a>
																	<input class="js-result form-control h-auto border-0 rounded p-0 max-width-6 text-center" type="number" value="0" id="nbEnfant">
																	<a class="js-plus btn btn-icon btn-medium btn-outline-secondary rounded-circle" href="javascript:;" onclick="changeInfo();">
																		<small class="fas fa-plus btn-icon__inner"></small>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>												
												<div class="text-left">
													<button onclick="envoiForm();" class="btn btn-primary text-white border-radius-2 font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover">Rechercher</button>
												</div>
											</div>
										</div>
									</div>
									<script>
										changeInfo();
									</script>
								</div>
							</div>
						</div>
					</div>
					<script>
						function loadDestination(){
							$.ajax({
								type: "POST",
								url: "scripts/listeDestination.php",
								data: {table: "destination"},
								dataType: "json",
								async: false,
								success: function(data) {		
									var html1 = '';
									var html2 = '';
									html1 += '<select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="" data-style="" data-live-search="true" data-searchbox-classes="input-group-sm" id="depart">'
									html2 += '<select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="" data-style="" data-live-search="true" data-searchbox-classes="input-group-sm" id="retour">'

									
									for(var r of data) {
										html1 += '<option class="border-bottom border-color-1" value="'+r.destination+'">' + r.destination + ', ' +  r.pays +  '</option>'
										html2 += '<option class="border-bottom border-color-1" value="'+r.destination+'">' + r.destination + ', ' +  r.pays +  '</option>'
									}				
									html2 += '</select>';
									
									$("#searchDesti").html(html1);
									$("#searchDesti2").html(html2);
								},
								error: function(){
									$("#searchDesti").html("ERROR") ;
								}
							});
						}
						loadDestination();
						
						function envoiForm(){
							var dateDepart = $('#date').val().slice(0, 13);
							var dateRetour = $('#date').val().slice(16);
							var destDepart = $('#depart').val();
							var destArr = $('#retour').val();
							var nbChambre = document.getElementById('nbChambre').value;
							var nbAdulte = document.getElementById('nbAdulte').value;
							var nbEnfant = document.getElementById('nbEnfant').value;
							
							
							window.location.replace("reserve.php?destDepart="+destDepart+"&destArr="+destArr+"&dateDepart="+dateDepart+"&dateRetour="+dateRetour+"&nbNuit=1&nbChambre="+nbChambre+"&nbAdulte="+nbAdulte+"&nbEnfant="+nbEnfant+"&vol=non&hotel=non&location=non");				
						}
					</script>