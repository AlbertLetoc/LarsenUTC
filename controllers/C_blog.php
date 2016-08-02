<?php
include_once ('./models/M_get_posts.php'); // inclusion du modele

$posts = get_posts(0,15); // definit le nombre d'articles a afficher en index
//securisation de l'affichage
/*
$post est une copie du tableau $posts créée par le foreach. $post n'existe qu'à l'intérieur du foreach, il est ensuite supprimé. 
Pour éviter les failles XSS, il faut agir sur le tableau utilisé à l'affichage, c'est-à-dire $posts
*/
if (is_array($posts) || is_object($posts)){ // evite les bugs en cas de résultat vide de la requete SQL, comme si par d'articles rédigés dans la periode demandée par ex 
	foreach($posts as $key => $post){
		$posts[$key]['post_title']=htmlspecialchars($post['post_title']);
		$posts[$key]['post_content']=nl2br($post['post_content']);
		$posts[$key]['post_author']=htmlspecialchars($post['post_author']);
	}
}

//appel de la vue
include_once('./views/blog.php');