<?php
$trombi = get_actual_trombi();

function get_actual_trombi(){
	$url="http://assos.utc.fr/asso/membres.json/larsen";
	$listUsers = json_decode(file_get_contents($url));
	$trombi = array();
	foreach($listUsers as $struct) {
			$filename= "https://demeter.utc.fr/portal/pls/portal30/portal30.get_photo_utilisateur?username=".$struct->login;
			if ($struct->role != "Membre"){
			$membre = array (
				"login" => $struct->login, 
				"role" => $struct->role,
				"photo" => $filename
				);
			array_push($trombi, $membre);
			}
	}
	return $trombi;
}

//appel de la vue
include_once('./views/trombi.php');