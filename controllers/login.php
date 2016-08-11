<?php
	if (isset($_SESSION['user'])) require_once 'index.php';
	else
	{
		$user = CAS::authenticate();
		if ($user != -1)
		{
			$_SESSION['user'] = $user;
			$_SESSION['ticket'] = $_GET['ticket'];
			$_SESSION['role'] = get_role($_SESSION['user'],"larsen");
			
			header('Location: ./');
		}
		else CAS::login();
	}

  /**
   * get_role
   * Retourne le role d'un user tel que définit sur le portail des assos (https://assos.utc.fr/asso/trombi/larsen)
   * @param $user : user au sens login CAS de le l'UTC (8 lettres). Doit faire partie de l'association passée en 2nd parametre
   * @param $asso : nom de l'asso dans lequel chercher l'user.
   * @return $role : role dans l'association de l'user
   */
function get_role($user, $asso){
	$url="http://assos.utc.fr/asso/membres.json/".$asso;
	$listUsers = json_decode(file_get_contents($url));
	$membre = null;
	foreach($listUsers as $struct) {
		if ($user == $struct->login) {
			$membre = $struct;
			break;
		}
	}
	return $membre->role;
}