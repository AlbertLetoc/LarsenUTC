<?php 
require_once './incl/SPDO.class.php';

function send_comment($commentValue){
	$db = SPDO::getSPDO();
	try{
		$req = $db->prepare('INSERT INTO comments(comment_post_ID, comment_author, comment_date, comment_status, comment_content) values (:post_ID, :author, NOW(), "published", :content)');
		$req->bindParam(':post_ID', $commentValue['post_ID'], PDO::PARAM_INT);
		$req->bindParam(':author', $commentValue['comment_author'], PDO::PARAM_STR);
		$req->bindParam(':content', $commentValue['comment_content'], PDO::PARAM_STR);
		$res = $req->execute();
	}
	catch(PDOException $e){
		 echo $e->getMessage();
	}
	return $res;
}

function count_comments($post_ID) {
	$db = SPDO::getSPDO();
	try {
		$req = $db->prepare('SELECT COUNT(*) FROM comments WHERE id = :id');
		$req->bindParam(':id', $post_ID, PDO::PARAM_INT);
		$req->execute();
		return $req->fetchColumn();
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
}
