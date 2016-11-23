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
            switch($membre->role) {
                case "Resp Communication":
                    return "Resp Comm'";
                case "Vice-président":
                    return "Vice-prez'";
                default:
                    return $membre->role;
            }
        }
        else {
            return $errorMessage;
        }
    }

    public static function priorityRole($role){
        switch ($role) {
            case 'Président':
                $priority=1;
                break;
            
             case 'Vice-président':
                $priority=2;
                break;
            
             case 'Trésorier':
                $priority=3;
                break;
            
             case 'Secrétaire':
                $priority=4;
                break;
            
             case 'Resp Communication':
                $priority=5;
                break;
            
             case 'Resp Logistique':
                $priority=6;
                break;
            
             case 'Resp Anim\'':
                $priority=7;
                break;
            
             case 'Resp Partenariat':
                $priority=8;
                break;
            
             case 'Resp Matos':
                $priority=9;
                break;
            
             case 'Resp\' Bières':
                $priority=10;
                break;
            
            default:
                $priority=1000;
                break;
        }

        return $priority;
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