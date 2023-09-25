		<!-- Charge ses informations -->
		<script src="js/admin/modifierProfil.js?v=<?= md5_file('../../js/admin/modifierProfil.js'); ?>"></script>
		<main id="content" class="bg-gray space-0">
            <div class="container space-bottom-1 space-top-lg-1">
				<!-- Bouton -->
				<button class="btn btn-secondary" href="compte.php" onclick="page('2_listeCompte', '');loadPage();">Retour</button>
			</div>
			<div class="container">
                <div class="row">
                    <div>
                        <div class="mb-5 shadow-soft bg-white rounded-sm">
                            <div class="pt-4 pb-5 px-5">
								<h5 id="roleTexte" class="font-size-21 font-weight-bold text-dark mb-4"></h5>
								<form id="miseajour" class="js-validate">
                                    <div class="row">
										<div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Pseudo </label>
                                                <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" disabled required>
                                            </div>
                                        </div>
										
										<div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Rôle </label>
												<select class="form-control js-select dropdown-select" required id="role">
													<option value="1">Utilisateur</option>
													<option value="3">Compagnie aérienne</option>
													<option value="4">Hôtelier</option>
													<option value="5">Voiturier</option>
													<option value="2">Administrateur</option>
                                                </select>
                                            </div>
                                        </div>
									
                                        <div class="col-sm-3 mb-4" id="emplacementPrenom">
                                            <div class="js-form-message">
                                                <label class="form-label"> Prénom </label>
                                                <input type="text" class="form-control" id="prenom" placeholder="Prénom (si pas société)">
                                            </div>
                                        </div>
										
										<div class="col-sm-3 mb-4" id="emplacementResponsable">
                                            <div class="js-form-message">
                                                <label class="form-label"> Responsable </label>
                                                <input type="text" class="form-control" id="responsable" placeholder="Responsable (si société)">
                                            </div>
                                        </div>

                                        <div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Nom </label>
                                                <input type="text" class="form-control" id="nom" placeholder="Nom" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Adresse mail </label>
                                                <input type="email" class="form-control" id="mail" placeholder="Adresse mail" required disabled>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Numéro de téléphone </label>
                                                <input type="text" class="form-control" id="numTel" placeholder="0400/00.00.00" required>
                                            </div>
                                        </div>

										<div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Pays </label>
                                                <input type="text" class="form-control" id="pays" placeholder="Pays">
                                            </div>
                                        </div>
										
										<div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Province </label>
                                                <input type="text" class="form-control" id="province" placeholder="Province">
                                            </div>
                                        </div>
										
										<div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Localité </label>
                                                <input type="text" class="form-control" id="localite" placeholder="Localité">
                                            </div>
                                        </div>
										
										<div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Code postal </label>
                                                <input type="number" class="form-control" id="cp" value="0" placeholder="Code postal">
                                            </div>
                                        </div>
										
										<div class="col-sm-5 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Adresse </label>
                                                <input type="text" class="form-control" id="adresse" placeholder="Adresse">
                                            </div>
                                        </div>
										
										<div class="col-sm-1 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Numéro </label>
                                                <input type="number" class="form-control" id="numero" placeholder="Numéro">
                                            </div>
                                        </div>

                                        <div class="col-sm-3 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Actif </label>
												<select class="form-control js-select dropdown-select" required id="actif">
													<option value="0">Désactivé</option>
													<option value="1">Activé</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 align-self-end">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">Valider</button>
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
