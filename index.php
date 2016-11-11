<?php
session_save_path('sess');
session_start();
require_once './incl/CAS.class.php';
require_once './incl/SPDO.class.php';
require_once './incl/Pear/Pager-2.4.9/examples/Pager_Wrapper.php';
require_once './incl/formatHelperFunc.php';
require_once './incl/Router.php';
require_once './incl/UserInfo.class.php';
require_once './incl/FormValidation.class.php';

define ('DATE_D_DEBUT' , "1970-01-01 00:00:00:000");
define ('DATE_D_FIN' , "2069-12-31 23:59:59:999");

setlocale(LC_ALL, 'fr');

$db = SPDO::getSPDO();
$router = Router::getInstance();
$router->setFolders('config', 'controllers', 'error');
$router->loadRoutes();
$sidebarFile = null;
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
			<ul class="container">
				<a href="<?php echo $router->getUrl('accueil'); ?>"><img src="/larsenUTC/style/img/logo.png" height="44px" class="logo"/></a>
				<li><a href="<?php echo $router->getUrl('accueil'); ?>">Accueil</a></li>
				<li class="dropdown">
					<a href="#">L'Association</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $router->getUrl('association_trombi'); ?>">Fonctionnement</a></li>
						<li><a href="<?php echo $router->getUrl('association_presentation'); ?>">Historique</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#">Répéter</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $router->getUrl('repet_salle', array('salle' => 'bas')); ?>">Salle du Pic</a></li>
						<li><a href="<?php echo $router->getUrl('repet_salle', array('salle' => 'studio')); ?>">Studio Décibels</a></li>
					</ul>
				</li>
				<li><a href="<?php echo $router->getUrl('association_contact'); ?>">Contact</a></li>
				<svg class="user-icon to-right" viewBox="0 0 97 144">
					<path fill="white" d="M 88.879,99.479 64.875,86.195 C 73.797,79.184 76.22,65.403 76.22,57.678 l 0,-16.083 c 0,-10.648 -14.163,-22.51 -28.389,-22.51 -14.223,0 -28.761,11.862 -28.761,22.51 l 0,16.083 c 0,7.026 2.975,21.239 11.989,28.458 L 6.434,99.479 c 0,0 -6.434,2.863 -6.434,6.435 l 0,9.651 C 0,119.117 2.885,122 6.434,122 l 82.445,0 c 3.552,0 6.438,-2.883 6.438,-6.436 l 0,-9.651 c -10e-4,-3.787 -6.438,-6.434 -6.438,-6.434 z m -1.188,14.904 -80.066,0 0,-6.811 c 0.547,-0.398 1.311,-0.859 1.914,-1.135 0.179,-0.082 0.357,-0.168 0.529,-0.264 L 34.693,92.831 c 2.246,-1.217 3.735,-3.475 3.961,-6.016 0.227,-2.54 -0.834,-5.028 -2.825,-6.624 -6.393,-5.122 -9.133,-16.462 -9.133,-22.514 l 0,-16.082 c 0,-5.471 10.324,-14.893 21.136,-14.893 11.013,0 20.764,9.292 20.764,14.893 l 0,16.083 c 0,5.966 -1.854,17.359 -8.433,22.529 -2.014,1.585 -3.098,4.073 -2.886,6.625 0.216,2.551 1.698,4.824 3.946,6.052 l 24.004,13.282 c 0.212,0.115 0.48,0.242 0.703,0.338 0.563,0.238 1.255,0.637 1.762,0.986 l 0,6.893 z"></path>
				</svg>
			</ul>
        </nav>
		<div class="user-overlay">
			<div class="user-box">
				<div class="user-box-close">
					<span class="glyphicon glyphicon-remove"></span>
				</div>
				<?php
					if(!isset($_SESSION['user'])) {
						?>
						
						<svg class="user-box-icon" viewBox="0 0 97 144">
							<path fill="white" d="M 88.879,99.479 64.875,86.195 C 73.797,79.184 76.22,65.403 76.22,57.678 l 0,-16.083 c 0,-10.648 -14.163,-22.51 -28.389,-22.51 -14.223,0 -28.761,11.862 -28.761,22.51 l 0,16.083 c 0,7.026 2.975,21.239 11.989,28.458 L 6.434,99.479 c 0,0 -6.434,2.863 -6.434,6.435 l 0,9.651 C 0,119.117 2.885,122 6.434,122 l 82.445,0 c 3.552,0 6.438,-2.883 6.438,-6.436 l 0,-9.651 c -10e-4,-3.787 -6.438,-6.434 -6.438,-6.434 z m -1.188,14.904 -80.066,0 0,-6.811 c 0.547,-0.398 1.311,-0.859 1.914,-1.135 0.179,-0.082 0.357,-0.168 0.529,-0.264 L 34.693,92.831 c 2.246,-1.217 3.735,-3.475 3.961,-6.016 0.227,-2.54 -0.834,-5.028 -2.825,-6.624 -6.393,-5.122 -9.133,-16.462 -9.133,-22.514 l 0,-16.082 c 0,-5.471 10.324,-14.893 21.136,-14.893 11.013,0 20.764,9.292 20.764,14.893 l 0,16.083 c 0,5.966 -1.854,17.359 -8.433,22.529 -2.014,1.585 -3.098,4.073 -2.886,6.625 0.216,2.551 1.698,4.824 3.946,6.052 l 24.004,13.282 c 0.212,0.115 0.48,0.242 0.703,0.338 0.563,0.238 1.255,0.637 1.762,0.986 l 0,6.893 z"></path>
						</svg>
						<h3>Vous n'êtes pas connecté</h3>
						<a href="<?php echo $router->getUrl('login'); ?>">Se connecter</a>
					<?php
					}
					else {
					?>
						<img class="user-box-icon" src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $_SESSION['user']['cas:user'] ?>"/>
						<?php
						if(UserInfo::isBureau($_SESSION['user']['cas:user'])) { ?>
							<a href="<?php echo $router->getUrl('admin'); ?>">Administration</a>
						<?php
						}
						?>
							<a href="<?php echo $router->getUrl('logout'); ?>">Se déconnecter</a>						
					<?php
					}
				?>
			</div>
		</div>
		<div class="container">
			<section class="row">
				<article class="col-lg-9">
				<?php
				$router->matchRoute();
			?>
				</article>
				<aside class="col-lg-3">
					<div class="col-md-12">
						<?php 
							if (!$sidebarFile){
								include('./controllers/side_bar/C_s_blog.php');
							}
							else{
								if(file_exists('./controllers/side_bar/C_s_'.$sidebarFile.'.php'))
								{
									include_once('./controllers/side_bar/C_s_'.$sidebarFile.'.php');
								}
								else if(file_exists('./views/side_bar/s_'.$sidebarFile.'.php'))
								{
									include_once('./views/side_bar/s_'.$sidebarFile.'.php');
								}
								else {
									include_once('./views/404.php');
								}	
							}
						?>
					</div>
				</aside>
			</section>
		</div>
		<footer>
			<div class="row">
				<div class="col-md-12">
					<div class="footer-title row">
						<div class="container">
							<div class="row">
								<ul class="col-md-12">
									<li><a href="index.php?section=asso">A propos</a></li>
									<li><a href="#">Contact</a></li>
									<li class="to-right">
										Suivez nous sur : <a href='https://www.facebook.com/larsen.utc'><img src="/larsenUTC/style/img/logo-fb.png" alt="logo-fb" class="embed-img"/></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="footer-body">
						<div class="container">
							<div class="row">
								<ul class="col-md-10">
									<li><a class="text-link" href="<?php echo $router->getUrl('partenaires'); ?>">Nos partenaires</a></li>
	    							<li><a href='https://assos.utc.fr/'><img src="/larsenUTC/style/img/logo-bde.jpg" alt="logo-bde"/></a></li>									
	    							<li><a href='https://assos.utc.fr/decibels/'><img src="/larsenUTC/style/img/logo-decibels.png" alt="logo-decibels"/></a></li>									
								</ul>
								<div class="col-md-2 to-right ">
									Site fait avec amour <3
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="/larsenUTC/style/js/menu.js" type="text/javascript"></script>
	</body>
</html>
