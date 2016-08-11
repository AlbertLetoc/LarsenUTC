<?php 
require_once './incl/SPDO.class.php';


/**
   * get_posts
   * retourne un tableau contenant certains posts (selection en fonction des parametres)
   *
   * @param $offset : int qui définit un décalage dans la selection des posts (). ex : $offset=2 les 2 premiers posts (les plus récents) ne seront pas inclus
   * @param $limit : int qui définit le nombre max de posts a retourner
   * @param $semestre : str permettant de réduire la selection aux articles dont post_date est inclu dans un semestre.
   * La chaine doit être de la forme [aApP][0-9]{2} par ex : A12, p02. 
   * Debut de l'automne au 01-08 (00:00:00:000) et fin au 31-01 (23:59:59:999)
   * Debut du printemps au 01-02 (00:00:00:000) et fin au 31-07 (23:59:59:999)
   * @return $posts : retourne un tableau contenant une jointure left entre la table posts et comments sur la periode spécifiée
   */
function get_posts($offset, $limit, $semestre = NULL){
	$offset = (int) $offset; // offset : numero de post a partir duquel on retourne les posts
	$limit = (int) $limit; // limit: nombre de posts a recuperer au max
	$db=SPDO::getSPDO();

	if ($semestre==NULL){ //si pas de semestre specifié pas de restriction
		// selection des posts
		$req = $db->prepare('SELECT post_ID, post_title, post_date, post_content, post_author, comment_content, comment_author, comment_date FROM posts LEFT JOIN comments ON posts.post_ID = comments.comment_post_ID ORDER BY post_date DESC, comment_date ASC LIMIT :offset, :limit');
	}
	elseif(preg_match("/^[aApP]{1}[0-9]{2}$/", $semestre)){ //si semestre specifié restriction du select sur les dates du semestre
		$dates=semestre_to_datetime($semestre);
		$req = $db->prepare('SELECT post_ID, post_title, post_date, post_content, post_author, comment_content, comment_author, comment_date FROM posts LEFT JOIN comments ON posts.post_ID = comments.comment_post_ID WHERE post_date BETWEEN :debut AND :fin ORDER BY post_date DESC, comment_date ASC LIMIT :offset, :limit');
		$req->bindParam(':debut', $dates[0], PDO::PARAM_STR);
		$req->bindParam(':fin', $dates[1], PDO::PARAM_STR);
	}
	$req->bindParam(':offset', $offset, PDO::PARAM_INT);
	$req->bindParam(':limit', $limit, PDO::PARAM_INT);
	$req->execute();
	$posts = $req->fetchAll();

	return $posts;
}

/**
   * semestre_to_datetime
   * retourne un tableau avec la date (format str) de début et de fin du semestre passé en parametre
   *
   * @param $semestre : str de la forme [aApP][0-9]{2} par ex : A12, p02. 
   * Debut de l'automne au 01-08 (00:00:00:000) et fin au 31-01 (23:59:59:999)
   * Debut du printemps au 01-02 (00:00:00:000) et fin au 31-07 (23:59:59:999)
   * 70 a 99 =» 1970 a 1999
   * 00 a 69 =» 2000 a 2069
   * @return $array : tableau contenant la date de début et la date de fin au format str.
   */
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