<?php
include_once ('./models/M_get_posts.php'); // inclusion du modele


if ((!isset($_GET['sem'])) and (!isset($_GET['annee']))){ // retourne les 100 derniers posts
	$posts_comments = get_posts(0,100); // definit le nombre d'articles a afficher en index
}
elseif(isset($_GET['annee'])){ // retourne les posts de l'annee passée en parametre
	if(preg_match("/^[0-9]{4}$/",$_GET['annee'])){ //securisation de la variable
		$annee = substr($_GET['annee'],2,2);
		$posts_commentsP = get_posts(0,50,"P".$annee);
		$posts_commentsA = get_posts(0,50,"A".$annee);
		$posts_comments = array_merge($posts_commentsA,$posts_commentsP);
	}
	else{
		header('Location: ./404.php');
	}
}
elseif(isset($_GET['sem'])){ // retourne les posts du semestre passé en parametre
	if(preg_match("/^[aApP]{1}[0-9]{2}$/",$_GET['sem'])){ //securisation de la variable
		$posts_comments = get_posts(0,50,$_GET['sem']);
	}
	else{
		header('Location: ./404.php');
	}
}
//securisation de l'affichage
/*
$post est une copie du tableau $posts créée par le foreach. $post n'existe qu'à l'intérieur du foreach, il est ensuite supprimé. 
Pour éviter les failles XSS, il faut agir sur le tableau utilisé à l'affichage, c'est-à-dire $posts
*/
if (is_array($posts_comments) || is_object($posts_comments)){ // evite les bugs en cas de résultat vide de la requete SQL, comme si par d'articles rédigés dans la periode demandée par ex 
	foreach($posts_comments as $key => $post){
		$posts[$key]['post_title']=htmlspecialchars($post['post_title']);
		$posts[$key]['post_content']=nl2br($post['post_content']);
		$posts[$key]['post_author']=htmlspecialchars($post['post_author']);
		$posts[$key]['comment_author']=htmlspecialchars($post['comment_author']);
		$posts[$key]['comment_content']=htmlspecialchars(nl2br($post['comment_content']));
	}
}

//appel de la vue
include_once('./views/blog.php');