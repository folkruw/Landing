					<div id="signup" style="opacity: 0; display: none;" data-target-group="idForm">
						<div class="card-header text-center">
							<h3 class="h5 mb-0 font-weight-semi-bold">Création de compte</h3>
						</div>
						<div class="card-body pt-5 pb-4">
							<ul class="nav nav-default nav-pills nav-white nav-justified nav-rounded-pill font-weight-medium px-6 pb-5" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-one-code-sample-tab" data-toggle="pill" href="#pills-one-code-sample" role="tab" aria-controls="pills-one-code-sample" aria-selected="true">Utilisateur</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-two-code-sample-tab" data-toggle="pill" href="#pills-two-code-sample" role="tab" aria-controls="pills-two-code-sample" aria-selected="false">Société</a>
								</li>
							</ul>
							
							<div class="tab-content">
								<div class="tab-pane fade active show" id="pills-one-code-sample" role="tabpanel" aria-labelledby="pills-one-code-sample-tab">
									<form method="POST" id="enregistrement" action="javascript:checkPasswordBefore('enregistrement');">
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Nom d'utilisateur" required>
													<div class="input-group-append">
														<span class="input-group-text" id="username">
															<span class="flaticon-user font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required>
													<div class="input-group-append">
														<span class="input-group-text" id="normalname">
															<span class="flaticon-browser-1 font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>										
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required>
													<div class="input-group-append">
														<span class="input-group-text" id="normalname">
															<span class="flaticon-browser-1 font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="email" class="form-control" name="mail" id="mail" placeholder="Adresse mail" required>
													<div class="input-group-append">
														<span class="input-group-text" id="signupEmail">
															<span class="far fa-envelope font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="password" class="form-control" name="motdepasse" id="motdepasse" placeholder="Mot de passe" required>
													<div class="input-group-prepend">
														<span class="input-group-text" id="signupPassword">
															<span class="flaticon-password font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
											<p><br>Min. 6 caractères, contenant une lettre minuscule, <br>majuscule, un chiffre et un caractères spécial</p>
										</div>
										<div class="mb-3 pb-1">
											<button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Enregistrement</button>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="pills-two-code-sample" role="tabpanel" aria-labelledby="pills-two-code-sample-tab">
									<form method="POST" id="enregistrementSociete">
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="text" class="form-control" name="pseudoE" id="pseudoE" placeholder="Entreprise (sans espace)" required>
													<div class="input-group-append">
														<span class="input-group-text" id="partnerusername">
															<span class="flaticon-user font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="text" class="form-control" name="entreprise" id="entreprise" placeholder="Nom de l'entreprise" required>
													<div class="input-group-append">
														<span class="input-group-text" id="partnerusername">
															<span class="flaticon-user font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="text" class="form-control" name="responsable" id="responsable" placeholder="Nom du responsable" required>
													<div class="input-group-append">
														<span class="input-group-text" id="partnername">
															<span class="flaticon-browser-1 font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="email" class="form-control" name="email" id="email" placeholder="Adresse mail" required>
													<div class="input-group-append">
														<span class="input-group-text" id="signupPartnerEmail">
															<span class="far fa-envelope font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<input type="password" class="form-control" name="emotdepasse" id="emotdepasse" placeholder="Mot de passe" required>
													<div class="input-group-prepend">
														<span class="input-group-text" id="signupPartnerPassword">
															<span class="flaticon-password font-size-20"></span>
														</span>
													</div>
												</div>
											</div>
											<p>Min. 6 caractères, contenant une lettre minuscule, <br>majuscule, un chiffre et un caractères spécial</p>
										</div>
										<div class="form-group pb-1">
											<div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
												<div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
													<select class="form-control dropdown-select" required id="role">
														<option value="3">Compagnie aérienne</option>
														<option value="4">Hôtelier</option>
														<option value="5">Voiturier</option>
													</select>
												</div>
											</div>
										</div>
										<div class="mb-3 pb-1">
											<button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Enregistrement</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="card-footer p-0">
							<div class="card-footer__bottom p-4 text-center font-size-14">
								<span class="text-gray-1">Vous avez déjà un compte ?</span>
								<a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#login" data-link-group="idForm" data-animation-in="fadeIn">Se connecter</a>
							</div>
						</div>
					</div>