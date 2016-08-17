<?php

$trombi = get_actual_trombi();

//appel de la vue
include_once('./views/asso.php');


function get_actual_trombi(){
	$url="http://assos.utc.fr/asso/membres.json/larsen";
	$listUsers = json_decode(file_get_contents($url));
	$trombi = array();
	foreach($listUsers as $struct) {
		if ($struct->bureau == "true") {
			$membre = array (
				"login" => $struct->login, 
				"role" => $struct->role,
				"photo" => "https://demeter.utc.fr/portal/pls/portal30/portal30.get_photo_utilisateur?username=".$struct->login
				);
			array_push($trombi, $membre);
		}
	}
	return $trombi;
}