						<div id="login" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
							<div class="card-header text-center">
								<h3 class="h5 mb-0 font-weight-semi-bold">Panel de connexion</h3>
							</div>
							<div class="card-body pt-6 pb-4">
								<form method="POST" id="connexion">
									<div class="form-group pb-1">
										<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
											<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
												<input type="text" class="form-control" name="pseudoU" id="pseudoU" placeholder="Nom d'utilisateur" required>
												<div class="input-group-append">
													<span class="input-group-text">
														<span class="far fa-user font-size-20"></span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group pb-1">
										<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
											<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
												<input type="password" class="form-control" name="motdepasseU" id="motdepasseU" placeholder="Mot de passe" required>
												<div class="input-group-prepend">
													<span class="input-group-text">
														<span class="flaticon-password font-size-20"></span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-3 pb-1">
										<button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Connexion</button>
									</div>
								</form>
							</div>

							<div class="card-footer p-0">
								<div class="card-footer__bottom p-4 text-center font-size-14">
									<span class="text-gray-1">Vous n'avez pas de compte?</span>
									<a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#signup" data-link-group="idForm" data-animation-in="fadeIn">Créez-le !</a>
								</div>
							</div>
						</div>
