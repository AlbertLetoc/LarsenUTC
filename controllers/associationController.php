<?php
include_once('./incl/UserInfo.class.php');
class AssociationController {
	public function trombiAction() {
		$url="http://assos.utc.fr/asso/membres.json/larsen";
		$listUsers = json_decode(file_get_contents($url));
		$trombi = array();
		$sort = array();
		foreach($listUsers as $struct) {
				$filename= "https://demeter.utc.fr/portal/pls/portal30/portal30.get_photo_utilisateur?username=".$struct->login;
				if ($struct->role != "Membre"){
				$membre = array (
					"login" => $struct->login, 
					"role" => $struct->role,
					"photo" => $filename
					);
				array_push($trombi, $membre);
				array_push($sort, UserInfo::priorityRole($membre['role']));
				array_multisort($sort, $trombi);
				}
		}

		//appel de la vue
		include_once('./views/trombi.php');
	}

	public function presentationAction() {
		include_once('./views/presentation.php');
	}

	public function contactAction() {
		include_once('./views/contacts.php');
	}

	public function partenairesAction() {
		include_once('./views/partenaires.php');
	}

	public function adminAction() {
		if(!array_key_exists('user', $_SESSION) || !UserInfo::isBureau($_SESSION['user']['cas:user']))
		{
			$router = Router::getInstance();
			return $router->error403Redirection();
		}

		include_once('./views/admin.php');
	}
}
