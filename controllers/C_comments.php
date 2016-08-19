<?php
session_save_path('./sess');
session_start();
include_once ('./models/M_send_comment.php'); // inclusion du modele


// ecriture d'un commentaire
if(isset($_POST['submit'])){ 
	if (isset($_SESSION['user']) and preg_match("/^[a-z]{8}$/", $_SESSION['user'])){
		$author = $_SESSION['user'];
	}
	else {
		if(isset($_POST['author'])){
			if (preg_match("/^[ ]*$/", $_POST['author'])){
				header('Location: ../index.php');
			}
			else{
				$author =$_POST['author'];
			}
		}
		else {
			$error[] = 'Merci de rentrer votre nom.';
		}
	}

	if (isset($_POST['content'])){
		if (preg_match("/^[ ]*$/", $_POST['content'])){
			header('Location: ../index.php');
		}
		else{
			$content = $_POST['content'];
		}
	}
	else{
		$error[] = 'Merci de rentrer le corps de votre commentaire.';
	}
	

	if(send_comment((int) $_POST['post_ID'], $author, $content)){
		header('Location: ../index.php');
	}
	else {
		echo "error SQL";
	}
}