<?php
session_save_path('sess');
session_start();
require_once './incl/CAS.class.php';
require_once './incl/SPDO.class.php';
require_once './incl/Pear/Pager-2.4.9/examples/Pager_Wrapper.php';

define ('DATE_D_DEBUT' , "1970-01-01 00:00:00:000");
define ('DATE_D_FIN' , "2069-12-31 23:59:59:999");

$db = SPDO::getSPDO();

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