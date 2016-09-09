<?php
class UserInfo {

    const key = "F854CjBWe7zQ256zA8Mwdmsv5niF23CL";

    public static function getFullName($login) {
        if(substr(get_headers("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key)[0], 9, 3) == "200") {
            $infos = json_decode(file_get_contents("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key));
            return $infos->prenom." ".$infos->nom;
        }
        else {
            return "Inconnu";
        }
    }

    public static function getLastName($login) {
        if(substr(get_headers("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key)[0], 9, 3) == "200") {
            $infos = json_decode(file_get_contents("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key));
            return $infos->nom;
        }
        else {
            return "Inconnu";
        }
    }

    public static function getFirstName($login) {
        if(substr(get_headers("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key)[0], 9, 3) == "200") {
            $infos = json_decode(file_get_contents("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key));
            return $infos->prenom;
        }
        else {
            return "Inconnu";
        }
    }

    public static function getRole($login) {
        $listUsers = json_decode(file_get_contents('http://assos.utc.fr/asso/membres.json/larsen'));
		
		$membre = null;
		foreach($listUsers as $struct) {
			if ($login == $struct->login) {
				$membre = $struct;
				break;
			}
		}
        if($membre) {
            return $membre->role;
        }
        else {
            return "Ancien";
        }
    }
}