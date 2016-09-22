<?php
include_once ('./models/M_posts.php'); // inclusion du modele

class BlogController{
	public function listAction() {
		$per_page = 5; // definition du nombre d'articles a afficher par page

		// selection des articles
		if ((!isset($_GET['sem'])) and (!isset($_GET['annee']))){ // index
			$comments = get_comments(0, 15*$per_page, array());
			$posts = get_pagination($per_page, array()); 
		}

		elseif(isset($_GET['annee'])){ // retourne les posts de l'annee passée en parametre
			if(preg_match("/^[0-9]{4}$/",$_GET['annee'])){ //securisation de la variable
				$annee = substr($_GET['annee'],2,2);
				$datesP = semestre_to_datetime("P".$annee);
				$datesA = semestre_to_datetime("A".$annee);
				$dates['debut'] = $datesP['debut'];
				$dates['fin'] = $datesA['fin'];
				$comments = get_comments(0, 15*$per_page, $dates);
				$posts = get_pagination($per_page, $dates);
			}
			else{
				header('Location: ./404.php');
			}
		}
		elseif(isset($_GET['sem'])){ // retourne les posts du semestre passé en parametre
			if(preg_match("/^[aApP]{1}[0-9]{2}$/",$_GET['sem'])){ //securisation de la variable
				$dates = semestre_to_datetime($_GET['sem']);
				$comments = get_comments(0, 15*$per_page, $dates);
				$posts = get_pagination($per_page, $dates);
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
		if (is_array($posts) || is_object($posts)){ // evite les bugs en cas de résultat vide de la requete SQL, comme si par d'articles rédigés dans la periode demandée par ex 
			//var_dump($posts['data']);
			foreach($posts['data'] as $key => $post){
				$posts['data'][$key]['post_title']=secured_OUT_string($post['post_title']);
				$posts['data'][$key]['post_content']=$post['post_content'];
				$posts['data'][$key]['post_author']=secured_OUT_string($post['post_author']);
				$posts['data'][$key]['post_date']= $post['post_date'];
			}
		}
		if (is_array($comments) || is_object($comments)){ // evite les bugs en cas de résultat vide de la requete SQL, comme si par d'articles rédigés dans la periode demandée par ex 
			//var_dump($posts['data']);
			$key=0;
			while (isset($comments[$key])){
				$comments[$key]['comment_author']=secured_OUT_string($comments[$key]['comment_author']);
				$comments[$key]['comment_date']=secured_OUT_string($comments[$key]['comment_date']);
				$comments[$key]['comment_content']=secured_OUT_string($comments[$key]['comment_content']);
				$key++;
			}
		}

		if (isset($_POST['submit'])){
			include_once('./controllers/C_comments.php');
		}

		//appel de la vue
		include_once('./views/blog.php');
	}

	public function newPostAction() {
		if(!array_key_exists('user', $_SESSION) || UserInfo::getRole($_SESSION['user']['cas:user']) != "Resp Comm'")
		{
			$router = Router::getInstance();
			return $router->error403Redirection();
		}

		$formValidation = new FormValidation();

		$rules = array(
			array(
				"name" => "title",
				"regex" => ".+",
				"error" => "Le titre doit contenir du texte"
			),
			array(
				"name" => "text",
				"regex" => ".+",
				"error" => "Le contenu doit contenir du texte"
			)
		);

		if($_SERVER['REQUEST_METHOD'] === "POST") {
			$formValues = $_POST;
			if($formValidation->validateForm($formValues, 'news', $rules)) { //ajoute l'entrée que si le formulaire est valide selon les règles établies
				if(send_post($formValues)) {
					header('Location: '.Router::getInstance()->getUrl('accueil')); //redirection vers l'accueil
				}
				else {
					$errors = array("Il y a eu une erreur lors de l'insertion veuillez réessayer plus tard");
				}
			}
			else {
				$errors = $formValidation->getErrors();
			}
		}
		$token = $formValidation->generateToken('news'); //protection CRSF
		
		include_once('./views/newBlog.php');
	}

	public function updatePostAction() {
		if(!array_key_exists('user', $_SESSION) || UserInfo::getRole($_SESSION['user']['cas:user']) != "Resp Comm'")
		{
			$router = Router::getInstance();
			return $router->error403Redirection();
		}

		$formValidation = new FormValidation();

		$router = Router::getInstance();

		$post = get_post($router->getParameters()['id']);

		$rules = array(
			array(
				"name" => "title",
				"regex" => ".+",
				"error" => "Le titre doit contenir du texte"
			),
			array(
				"name" => "text",
				"regex" => ".+",
				"error" => "Le contenu doit contenir du texte"
			)
		);

		if($_SERVER['REQUEST_METHOD'] === "POST") {
			$formValues = $_POST;
			if($formValidation->validateForm($formValues, 'news', $rules)) { //ajoute l'entrée que si le formulaire est valide selon les règles établies
				$post['post_title'] = $formValues['news_title'];
				$post['post_content'] = $formValues['news_text'];
				if(update_post($post)) {
					header('Location: '.Router::getInstance()->getUrl('accueil')); //redirection vers l'accueil
				}
				else {
					$errors = array("Il y a eu une erreur lors de l'actualisation veuillez réessayer plus tard");
				}
			}
			else {
				$errors = $formValidation->getErrors();
			}
		}
		$token = $formValidation->generateToken('news'); //protection CRSF
		
		include_once('./views/updateBlog.php');
	}

	public function deletePostAction() {
		if(!array_key_exists('user', $_SESSION) || UserInfo::getRole($_SESSION['user']['cas:user']) != "Resp Comm'")
		{
			$router = Router::getInstance();
			return $router->error403Redirection();
		}
		$formValidation = new FormValidation();

		$router = Router::getInstance();

		$id = $router->getParameters()['id'];

		$rules = array();

		if($_SERVER['REQUEST_METHOD'] === "POST") {
			$formValues = $_POST;
			if($formValidation->validateForm($formValues, 'news', $rules)) {
				if(delete_post($id)) {
					header('Location: '.Router::getInstance()->getUrl('accueil')); //redirection vers l'accueil					
				}
				else {
					$errors = array("Il y a eu une erreur lors de la suppression veuillez réessayer plus tard");
				}
			}
			else {
				$errors = $formValidation->getErrors();
			}
		}
		
		$token = $formValidation->generateToken('news'); //protection CRSF
		
		include_once('./views/deleteBlog.php');		
	}

	public function readPostAction() {
		$router = Router::getInstance();
		$post = get_post($router->getParameters()['id']);

		if(!empty($post)) {
			include_once('./views/readBlog.php');
		}
		else {
			$router->error404Redirection();
		}
	}
}
