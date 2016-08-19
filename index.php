<?php
session_save_path('sess');
session_start();
require_once './incl/CAS.class.php';
require_once './incl/SPDO.class.php';
require_once './incl/Pear/Pager-2.4.9/examples/Pager_Wrapper.php';

define ('DATE_D_DEBUT' , "1970-01-01 00:00:00:000");
define ('DATE_D_FIN' , "2069-12-31 23:59:59:999");

$db = SPDO::getSPDO();

if (!isset($_GET['section']) OR $_GET['section'] == 'index'){
	include('./controllers/C_blog.php');
}
elseif($_GET['section'] == 'logout'){
	include('./controllers/C_logout.php');
}
elseif($_GET['section'] == 'login'){
	include('./controllers/C_login.php');
}
elseif($_GET['section'] == 'asso'){
	include('./controllers/C_asso.php');
}
elseif($_GET['section'] == 'contact'){
	include('./controllers/C_contacts.php');
}
elseif($_GET['section'] == 'partenaires'){
	include('./controllers/C_partenaires.php');
}
elseif($_GET['section'] == 'salles'){
	include('./controllers/C_salles.php');
}
else{
	include('./views/404.php');
}
?>