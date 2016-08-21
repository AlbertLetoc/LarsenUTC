<?php
session_save_path('sess');
session_start();
require_once './incl/CAS.class.php';
require_once './incl/SPDO.class.php';
require_once './incl/Pear/Pager-2.4.9/examples/Pager_Wrapper.php';

define ('DATE_D_DEBUT' , "1970-01-01 00:00:00:000");
define ('DATE_D_FIN' , "2069-12-31 23:59:59:999");

$db = SPDO::getSPDO();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Larsen UTC - Accueil</title>
	    <link href="style/css/app.css" rel="stylesheet" />
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBMFzyntK3S-mDScGkBQ-xvZ3UYDHPuh4M"></script>
    </head>
    <body>
        <nav id="primary_nav_wrap">
        </nav>
		<?php 
		if (!isset($_GET['section'])){
			include('./controllers/C_blog.php');
		}
		else{
			if(file_exists('./controllers/C_'.$_GET['section'].'.php'))
			{
				include_once('./controllers/C_'.$_GET['section'].'.php');
			}
			else {
				include('./views/404.php');
			}	
		}
		?>
		<footer>
			<p>
			_________________________________________________________________________________________________________________________________________
			</p>
			<ul>
				<li>Copyright © Larsen 2016 (Clément HENRY, Louis DUPRAT, Aladin TALEB)</li>
				<li><a href="index.php?section=asso"> L'association</a></li>
				<li><a href="https://www.facebook.com/larsen.utc"> facebook </a></li>
				<li><a href="index.php?section=partenaires"> Partenaires </a></li>
			</ul>
		</footer>
	</body>
</html>