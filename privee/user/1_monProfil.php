		<!-- Charge ses informations -->
		<script src="js/user/profil.js?v=<?= md5_file('../../js/user/profil.js'); ?>"></script>
		<main id="content" class="bg-gray space-1">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="mb-5 shadow-soft bg-white rounded-sm">
                            <div class="pt-4 pb-5 px-5">
								<h5 id="roleTexte" class="font-size-21 font-weight-bold text-dark mb-4"></h5>
								<form id="miseajour" class="js-validate">
                                    <div class="row">
                                        <div class="col-sm-6 mb-4" id="emplacementPrenom">
                                            <div class="js-form-message">
                                                <label class="form-label"> Prénom </label>
                                                <input type="text" class="form-control" id="prenom" placeholder="Prénom (si pas société)">
                                            </div>
                                        </div>
										
										<div class="col-sm-6 mb-4" id="emplacementResponsable">
                                            <div class="js-form-message">
                                                <label class="form-label"> Responsable </label>
                                                <input type="text" class="form-control" id="responsable" placeholder="Responsable (si société)">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-4">
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

										<div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Pays </label>
                                                <input type="text" class="form-control" id="pays" placeholder="Pays">
                                            </div>
                                        </div>
										
										<div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Province </label>
                                                <input type="text" class="form-control" id="province" placeholder="Province">
                                            </div>
                                        </div>
										
										<div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Localite </label>
                                                <input type="text" class="form-control" id="localite" placeholder="Localité">
                                            </div>
                                        </div>
										
										<div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Code postal </label>
                                                <input type="number" class="form-control" id="cp" placeholder="Code postal">
                                            </div>
                                        </div>
										
										<div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Adresse </label>
                                                <input type="text" class="form-control" id="adresse" placeholder="Adresse">
                                            </div>
                                        </div>
										
										<div class="col-sm-6 mb-4">
                                            <div class="js-form-message">
                                                <label class="form-label"> Numéro </label>
                                                <input type="number" class="form-control" id="numero" placeholder="Numéro">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-10"></div>

                                        <div class="col-sm-6 align-self-end">
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
