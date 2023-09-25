<!DOCTYPE html>
<html lang="fr">
    <head>
		<title>A propos</title>
	</head>
    
	<body>
		<!-- Récupère la barre de navigation ainsi que les modules nécessaires -->
		<?php include("public/navBar.php"); ?>
		
        <main id="content">
            <div class="bg-img-hero text-center mb-1" style="background-image: url(images/default/background2.jpg);">
                <div class="container space-top-xl-3 py-6 py-xl-0">
                    <div class="row justify-content-center py-xl-4">
                        <div class="py-xl-10 py-5">
                            <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">A propos de nous</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider border-bottom border-color-3">
                <div class="container space-1">
                    <div class="w-md-80 w-lg-70 text-center mx-md-auto mb-5 mt-3">
                        <h2 class="section-title text-black font-size-xs-28 font-weight-bold mb-0">Nous sommes dédiés à rendre votre expérience de voyage aussi simple et amusante que possible !</h2>
                     </div>
                     <section class="w-lg-80 mx-auto mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="font-size-21 font-weight-bold text-center text-md-left ">Notre histoire</h2>
                                <p class="text-gray-1">Initialement prévu pour être un site de voyage comme tant d'autre, Landing a réussi à devenir plus qu'un simple site, en devenant la référence de voyage.</p>
                            </div>

                            <div class="col-md-6">
                                <h2 class="font-size-21 font-weight-bold text-center text-md-left ">Notre mission</h2>
                                <p class="text-gray-1">Vous offrir une expérience de voyage moderne, confortable et connectée est l'une de nos plus grandes priorités et c'est pourquoi nous essayons continuellement d'améliorer votre expérience lorsque vous réservez quelque chose avec nous. Nous apprécions vraiment et accueillons toutes les suggestions que vous pourriez avoir pour nous, alors n'hésitez pas à nous écrire à tout moment.</p>
                            </div>
                        </div>
                    </section>
                    <div class="js-slick-carousel u-slick pb-2"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                         data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-9"
                         data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-9"
                         data-pagi-classes="text-center u-slick__pagination mt-5">
                        <div class="js-slide bg-img-hero-center rounded-xs" style="background-image: url(images/slider/img1.jpg);">
                            <div class="space-5">
                            </div>
                        </div>
                        <div class="js-slide bg-img-hero-center rounded-xs" style="background-image: url(images/slider/img2.jpg);">
                            <div class="space-5">
                            </div>
                        </div>
                        <div class="js-slide bg-img-hero-center rounded-xs" style="background-image: url(images/slider/img3.jpg);">
                            <div class="space-5">
                            </div>
                        </div>
                        <div class="js-slide bg-img-hero-center rounded-xs" style="background-image: url(images/slider/img4.jpg);">
                            <div class="space-5">
                            </div>
                        </div>
                        <div class="js-slide bg-img-hero-center rounded-xs" style="background-image: url(images/slider/img5.jpg);">
                            <div class="space-5">
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
           
            <div class="container">
                <div class="pt-7 pb-8">
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Nos clients parlent de nous !</h2>
                    </div>
                    <div class="js-slick-carousel u-slick u-slick-zoom u-slick--gutters-3" data-infinite="    true" data-autoplay="true" data-speed="3000" data-fade="true"
                    data-pagi-classes="text-center u-slick__pagination mb-0 mt-4"
                        data-responsive='[{
                        "breakpoint": 992,
                           "settings": {
                             "slidesToShow": 1
                           }
                        }]'>

                        <div class="js-slide">
                            <div class="d-flex justify-content-center mb-6">
                                <div class="position-relative">
                                    <img class="img-fluid mx-auto" src="images/clients/img1.jpg" alt="Image-Descrition">
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">C'est la troisième fois que j'utilise Landing et, pour vous dire la vérité, leurs services sont toujours fiables et il ne faut que quelques minutes pour planifier et finaliser.</p>
                                <h6 class="font-size-17 font-weight-bold text-gray-11 mb-0">Noelle Harquin</h6>
                                <span class="text-blue-lighter-1 font-size-normal">Client</span>
                            </div>
                        </div>

                        <div class="js-slide">
                            <div class="d-flex justify-content-center mb-6">
                                <div class="position-relative">
                                    <img class="img-fluid mx-auto" src="images/clients/img2.jpg" alt="Image-Descrition">
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">Besoin de voyager ? Prenez Landing sans héister !</p>
                                <h6 class="font-size-17 font-weight-bold text-gray-11 mb-0">Roslyn Savoie</h6>
                                <span class="text-blue-lighter-1 font-size-normal">Client</span>
                            </div>
                        </div>

                        <div class="js-slide">
                            <div class="d-flex justify-content-center mb-6">
                                <div class="position-relative">
                                    <img class="img-fluid mx-auto" src="images/clients/img3.jpg" alt="Image-Descrition">
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">Dubaï, New York, Rome... autant de destination qu'on ne sait plus où aller !</p>
                                <h6 class="font-size-17 font-weight-bold text-gray-11 mb-0">Raymond Levasseur</h6>
                                <span class="text-blue-lighter-1 font-size-normal">Client</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<hr>
            <!-- Equipe -->
            <div class="">
                <div class="container space-top-1">
                    <div class="w-md-80 w-lg-70 text-center mx-md-auto mb-5 mt-3">
                        <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Notre équipe</h2>
                    </div>
                    <div class="row text-center pb-2">
                        <div class="col-lg-4  col-md-6 inner-right inner-bottom-sm inner-left">
                            <div class="pb-3">
                                <figure class="d-inline-block u-avatar-image rounded-circle overflow-hidden">
                                    <img src="images/teams/shaima.png" width="200" height="200" alt="Image-Descrition">
                                </figure>
                            </div>
                            <h6 class="font-size-17 font-weight-bold text-gray-11 mb-0">Shaïma Bouhmadi</h6>
                            <span class="text-blue-lighter-1 font-size-normal">Fondatrice</span>
                        </div>
						<div class="col-lg-4  col-md-6 inner-right inner-bottom-sm inner-left">
                        </div>
						<div class="col-lg-4  col-md-6 inner-right inner-bottom-sm inner-left">
                            <div class="pb-3">
                                <figure class="d-inline-block u-avatar-image rounded-circle overflow-hidden">
                                    <img src="images/teams/nicolas.png" width="200" height="200" alt="Image-Descrition">
                                </figure>
                            </div>
                            <h6 class="font-size-17 font-weight-bold text-gray-11 mb-0">Nicolas Da Nazaret</h6>
                            <span class="text-blue-lighter-1 font-size-normal">Fondateur</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
				
		<?php require_once ('require_plus.php'); ?>
	</body>
	
	<footer>
		<!-- Récupère la barre de fin -->
		<?php include("public/footer.php"); ?>
	</footer>
</html>