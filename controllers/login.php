<?php
	if (isset($_SESSION['user'])) require_once 'index.php';
	else
	{
		$user = CAS::authenticate();
		if ($user != -1)
		{
			$_SESSION['user'] = $user;
			$_SESSION['ticket'] = $_GET['ticket'];
			header('Location: ./');
		}
		else CAS::login();
	}
?>