<?php
session_save_path('sess');
session_start();
require_once 'incl/CAS.class.php';
require_once 'incl/SPDO.class.php';

if (!isset($_GET['section']) OR $_GET['section'] == 'index'){
	include('controllers/C_blog.php');
}
elseif($_GET['section'] == 'logout'){
	include('controllers/logout.php');
}
elseif($_GET['section'] == 'login'){
	include('controllers/login.php');
}

?>