<?php
class UserInfo {

    const key = "F854CjBWe7zQ256zA8Mwdmsv5niF23CL";

    public static function getFullName($login) {
        $content = @file_get_contents("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key);
        if($content !== FALSE) {
            $infos = json_decode($content);
            return $infos->prenom." ".$infos->nom;
        }
        else {
            return "Inconnu";
        }
    }

    public static function getLastName($login) {
        $content = @file_get_contents("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key);
        if($content !== FALSE) {
            $infos = json_decode($content);
            return $infos->nom;
        }
        else {
            return "Inconnu";
        }
    }

    public static function getFirstName($login) {
        $content = @file_get_contents("https://assos.utc.fr/ginger/v1/".$login."?key=".self::key);
        if($content !== FALSE) {
            $infos = json_decode($content);
            return $infos->prenom;
        }
        else {
            return "Inconnu";
        }
    }

    public static function getRole($login, $errorMessage) {
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
            return $errorMessage;
        }
    }

    public static function isBureau($login) {
        $listUsers = json_decode(file_get_contents('http://assos.utc.fr/asso/membres.json/larsen'));
		
		$membre = null;
		foreach($listUsers as $struct) {
			if ($login == $struct->login) {
				$membre = $struct;
				break;
			}
		}
        if($membre) {
            return $membre->bureau;
        }
        else {
            return false;
        }
    }
}