<?php 
require_once './incl/SPDO.class.php';

function get_posts($offset, $limit, $semestre = NULL){
	$offset = (int) $offset; // offset : numero de post a partir duquel on retourne les posts
	$limit = (int) $limit; // limit: nombre de posts a recuperer au max
	$db=SPDO::getSPDO();

	if ($semestre==NULL){ //si pas de semestre specifié pas de restriction
		$req = $db->prepare('SELECT post_ID, post_title, post_date, post_content, post_author FROM posts ORDER BY post_date DESC LIMIT :offset, :limit');
		$req->bindParam(':offset', $offset, PDO::PARAM_INT);
		$req->bindParam(':limit', $limit, PDO::PARAM_INT);
		$req->execute();
		$posts = $req->fetchAll();
		return $posts;
	}
	elseif(preg_match("/^[aApP]{1}[0-9]{2}$/", $semestre)){ //si semestre specifié restriction du select sur les dates du semestre
		$dates=semestre_to_datetime($semestre);
		$req = $db->prepare('SELECT post_ID, post_title, post_date, post_content, post_author FROM posts WHERE post_date BETWEEN :debut AND :fin ORDER BY post_date DESC LIMIT :offset, :limit');
		$req->bindParam(':offset', $offset, PDO::PARAM_INT);
		$req->bindParam(':limit', $limit, PDO::PARAM_INT);
		$req->bindParam(':debut', $dates[0], PDO::PARAM_STR);
		$req->bindParam(':fin', $dates[1], PDO::PARAM_STR);
		$req->execute();
		$posts = $req->fetchAll();
		return $posts;
	}
}


function semestre_to_datetime($semestre){
	$param= array($semestre);
	if (preg_match("/^[aApP]{1}[0-9]{2}$/", $semestre)){ // verification de l'argument

		$annee=substr($semestre, 1, 2); // annee au format 08
		if($annee >= 70 and $annee<=99){
			$anneestr= "19" . (string)$annee; // annee au format 1970 a 1999 string
			$annee=(int)$anneestr; // annee au format 1970 a 1999 int
		}
		else{
			$anneestr= "20" . (string)$annee; // annee au format 2000 a 2069 string
			$annee=(int)$anneestr; //annee au format 2000 a 2069 int
		}


		if(preg_match("/^[aA]/", $semestre)){ // si semestre d'automne
			$debut=$anneestr."-08-01"; // définit le jour de début du semestre
			$fin=(string)($annee+1)."-01-31"; //définit le jour de fin du semestre
		}
		else{ // si semestre de printemps
			$debut=$anneestr."-02-01"; // définit le jour de début du semestre
			$fin=(string)$annee."-07-31"; //définit le jour de fin du semestre
		}

		return array ($debut, $fin);

	}
}