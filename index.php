<?php
session_save_path('sess');
session_start();
require_once './incl/CAS.class.php';
require_once './incl/SPDO.class.php';
require_once './incl/Pear/Pager-2.4.9/examples/Pager_Wrapper.php';
require_once './incl/formatHelperFunc.php';
require_once './incl/Router.php';
require_once './incl/UserInfo.class.php';

define ('DATE_D_DEBUT' , "1970-01-01 00:00:00:000");
define ('DATE_D_FIN' , "2069-12-31 23:59:59:999");

setlocale(LC_ALL, 'fr');

$db = SPDO::getSPDO();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Larsen UTC - Accueil</title>
	    <link href="/larsenUTC/style/css/app.css" rel="stylesheet" />
	    <link href="/larsenUTC/style/css/glyphicons.css" rel="stylesheet" />
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBMFzyntK3S-mDScGkBQ-xvZ3UYDHPuh4M"></script>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <nav class="nav">
			<ul>
				<img src="style/img/logo.png" height="44px" class="logo"/>
				<li><a href="/larsenUTC/">Accueil</a></li>
				<li class="dropdown">
					<a href="#">L'Association</a>
					<ul class="dropdown-menu">
						<li><a href="/larsenUTC/?section=trombi">Fonctionnement</a></li>
						<li><a href="/larsenUTC/?section=presentation">Historique</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#">Répéter</a>
					<ul class="dropdown-menu">
						<li><a href="/larsenUTC/?section=salles&act=bas">Salle du Pic</a></li>
						<li><a href="/larsenUTC/?section=salles&act=studio">Studio Décibels</a></li>
					</ul>
				</li>
				<li><a href="#">Contacts</a></li>
			</ul>
        </nav>
		<div class="container">
			<section class="row">
				<article class="col-lg-9">
				<?php
				$router = Router::getInstance();
				$router->setFolders('config', 'controllers', '');
				$router->loadRoutes();
				$router->matchRoute();
			?>
				</article>
				<aside class="col-lg-3">
					<div class="col-md-12">
						<?php 
							if (!isset($_GET['section'])){
								include('./controllers/side_bar/C_s_blog.php');
							}
							else{
								if(file_exists('./controllers/side_bar/C_s_'.$_GET['section'].'.php'))
								{
									include_once('./controllers/side_bar/C_s_'.$_GET['section'].'.php');
								}
								else {
									include('./views/404.php');
								}	
							}
						?>
					</div>
				</aside>
			</section>
			<footer>
				<ul>
					<li>Copyright © Larsen 2016 (Clément HENRY, Louis DUPRAT, Aladin TALEB)</li>
					<li><a href="index.php?section=asso"> L'association</a></li>
					<li><a href="https://www.facebook.com/larsen.utc"> facebook </a></li>
					<li><a href="index.php?section=partenaires"> Partenaires </a></li>
				</ul>
			</footer>
		</div>
		<script src="/larsenUTC/style/js/menu.js" type="text/javascript"></script>
	</body>
</html>