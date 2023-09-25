<?php
include('configurationBDO.php');
if(!isset($_SESSION)){session_start();}
?>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="favicon.ico">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/default.css">

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&amp;display=swap" rel="stylesheet">

<!---- JS ---->
<!-- Bootstrap / Jquery -->
<script src="js/jquery-3.6.0.min.js?v=<?= md5_file('js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript" src="assets/vendor/bootstrap-table/jquery.dataTables.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js?v=<?= md5_file('assets/vendor/bootstrap-table/dataTables.bootstrap4.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-table/dataTables.bootstrap4.min.css">
		
<!-- Nos JS -->
<script src='js/page.js?v=<?= md5_file('js/page.js'); ?>'></script> <!-- Gestion des pages -->
<script src="js/existeUtilisateur.js?v=<?= md5_file('js/existeUtilisateur.js'); ?>"></script> <!-- Script connexion -->

<!---- CSS ---->
<link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="assets/vendor/font-awesome/css/fontawesome-all.min.css"> <!-- Logo et polices d'écritures -->
<link rel="stylesheet" href="assets/css/font-mytravel.css"> <!-- Polices d'écritures -->
<link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
<link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
<link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="assets/vendor/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
<link rel="stylesheet" href="assets/css/theme.css"> <!-- CSS propre -->