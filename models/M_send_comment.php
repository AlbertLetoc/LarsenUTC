<?php 
require_once './incl/SPDO.class.php';

function send_comment($post_ID, $author, $content){
	$db = SPDO::getSPDO();
	try{
		$req = $db->prepare('INSERT INTO comments(comment_post_ID, comment_author, comment_date, comment_status, comment_content) values (:post_ID, :author, NOW(), "published", :content)');
		$req->bindParam(':post_ID', $post_ID, PDO::PARAM_INT);
		$req->bindParam(':author', $author, PDO::PARAM_STR);
		$req->bindParam(':content', $content, PDO::PARAM_STR);
		$res = $req->execute();
	}
	catch(PDOException $e){
		 echo $e->getMessage();
	}
	return $res;
}