<!DOCTYPE html>
<html lang="fr">
    <head>
		<title id="titre">Listes</title>	
		
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.reduce.php"); ?>
		<script src='js/liste/liste.js?v=<?= md5_file("js/liste/liste.js"); ?>'></script>
	</head>
	
	<body>
		<!-- Mise en page -->
        <main id="content" role="main">
            <div class="container pt-5 pt-xl-8">
                <div class="row mb-5 mb-lg-8 mt-xl-1">
                    <?php if($_GET['liste'] != 'location'){ ?>
					<div class="col-lg-4 col-xl-3 order-lg-1 width-md-50">
                        <div class="navbar-expand-lg navbar-expand-lg-collapse-block">
                            <button class="btn d-lg-none mb-5 p-0 collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
                                <span class="text-primary ml-2"></span>
                            </button>
                            <div id="sidebar" class="collapse navbar-collapse">
                                <div class="mb-6 w-100">
                                    <div class="pb-4 mb-2">
                                        <div class="sidebar border border-color-1 rounded-xs">
                                            <div class="p-4 mb-1">
                                                <div class="mb-4">
													<!-- Appel de la fonction -->
													<div class="input-group border-bottom border-width-2 border-color-1" id="searchDesti" <?php echo 'onchange="changeDestination(\''.$_GET['liste'].'\')"' ?>></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-8 col-xl-8 order-md-1 order-lg-2 pb-5 pb-lg-0">
					<?php } else { echo '<div class="col-lg-8 col-xl-12 order-md-1 order-lg-2 pb-5 pb-lg-0">'; }?>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1" id="comptage"></h3>
                            <ul class="nav tab-nav-shop flex-nowrap" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link font-size-22 p-0 ml-2 active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-th"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="u-slick__tab">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                                    <div class="row" id="listeVol"></div>
									<div class="row" id="listeHotel"></div>
									<div class="row" id="listeLocation"></div> 
									</div>
                                    <nav aria-label="Page navigation">
										<span id='numeroPage'>Page <?php if(isset($_GET['page'])){echo $_GET['page'];} ?></span>
                                        <ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2" id="navPage">
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
		
		<!-- Pré-requis -->
		<?php require_once ('require_plus.php'); ?>
		
		<script>
			// Fonction pour appeler la liste des destinations possibles
			// Propre à ce fichier
			function loadDestination(destination){
				$.ajax({
					type: "POST",
					url: "scripts/listeDestination.php",
					data: {table: "destination"},
					dataType: "json",
					async: false,
					success: function(data) {		
						var html2 = '<span class="d-block text-gray-1 font-weight-normal text-left mb-0">Destination</span>';
						html2 += '<select class="js-select selectpicker dropdown-select tab-dropdown col-12 pl-0 flaticon-pin-1 d-flex align-items-center text-primary font-weight-semi-bold" title="Où allez ?" data-style="" data-live-search="true" data-searchbox-classes="input-group-sm" id="obtenirDestination">'
						html2 += '<option class="border-bottom border-color-1" value="%" selected>Tout</option>'
						for(var r of data) {
							if(destination != r.destination){html2 += '<option class="border-bottom border-color-1" value="' + r.destination + '">' + r.destination + ', ' +  r.pays +  '</option>'}
							if(destination == r.destination){html2 += '<option class="border-bottom border-color-1" value="' + r.destination + '" selected>' + r.destination + ', ' +  r.pays +  '</option>'}
						}				
						html2 += '</select>';
						$("#searchDesti").html(html2);
					},
					error: function(){
						$("#searchDesti").html("ERROR") ;
					}
				});
			}
			function changeDestination(liste){
				location.replace("liste.php?liste="+liste+"&destination="+document.getElementById('obtenirDestination').value+"&page=1");
			}
			function load(type, destination, page){
				nombreResultat(type, destination);
				if(type == 'vol'){chargementVol(destination, "21", page);}
				else if(type == 'hotel'){chargementHotel(destination, "21", page);}
				else if(type == 'location'){chargementLocation("21", page);}
			}
		</script>
		<?php
			if(!isset($_GET['page'])){$page = "1";} else {$page = $_GET['page'];}
			if(!isset($_GET['destination'])){$destination = "%";} else {$destination = $_GET['destination'];}
			if($_GET['liste'] == 'vol'){echo "<script>load('vol', '".$destination."', ".$page.");</script>"; echo "<script>loadDestination('".$destination."');</script>";}
			if($_GET['liste'] == 'hotel'){echo "<script>load('hotel', '".$destination."', ".$page.");</script>"; echo "<script>loadDestination('".$destination."');</script>";}
			if($_GET['liste'] == 'location'){echo "<script>load('location', '".$destination."', ".$page.");</script>"; echo "<script>loadDestination('".$destination."');</script>";}
		?>
	</body>
	
	<footer>
		<!-- Récupère la barre de fin -->
		<?php include("public/footer.php"); ?>
	</footer>
</html>