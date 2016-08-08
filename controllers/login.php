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
	// // copie du tableau json dans la variable tableau
	// if (!$fd = fopen($url, 'r')){
	// 	echo "Echec de l'ouverture du fichier";
	// 	exit;
	// }
	// $tableau = NULL;
	// while(!feof($fd)) {
  	// 	$line = fgets($fd,1000);
  	// 	$tableau .= $line;
	// }

	// $regex="/{\"login\":\"".$user."\",\"role\":\"(.{6,40})\",\"/"; //paramétrage de la regex avec l'user a trouver dans le tableau json
	// if (preg_match($regex, $tableau, $matches)){ //si $user est dans larsen on extrait le role
	// 	$role=preg_replace("/\\\/", "", preg_replace("/[a-z]{1}0{2}e9/", "e",$matches[1])); // fix du probleme d'encodage du é. impossible a faire en un seul preg_replace.... car preg_replace ne supporte pas les caracteres UTF-8 ex: \\u00e9
	// 	$role=preg_replace("/\\\/", "", preg_replace("/[a-z]{1}0{2}e8/", "e",$role)); // fix du probleme d'encodage du è.
	// }
	// fclose($fd);
	// return $role;

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