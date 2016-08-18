<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Larsen UTC - Accueil</title>
	    <link href="views/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <nav id="primary_nav_wrap">
            <?php include("/menu.php");?>
        </nav>


        <h1> Larsen fête ses 30 ans </h1>

<?php
if (is_array($posts['data']) || is_object($posts['data'])){ // evite les bugs en cas de résultat vide de la requete SQL, comme si pas d'articles rédigés dans la periode demandée par ex 
    if (empty($posts['data'])){
        echo "<h3>Aucun article pour la période demandée</h3>";
    }
    else{
        foreach ($posts['data'] as $post) {
        $i=0; // compteur de commentaires?> 

        <div class="news">
            <h2><?php echo $post['post_title']; ?></h2>
            <h3>le <?php echo $post['post_date']; ?></h3>
            <p><?php echo $post['post_content']; ?></p>
            <em> by <?php echo $post['post_author']; ?></em><br/><br/>
            <em><u>Commentaires :</u></em>
            <?php 
            if (is_array($comments) || is_object($comments)){
                while (isset($comments[$i]['comment_post_ID']) and $comments[$i]['comment_post_ID'] != $post['post_ID']){$i++;}
                do { 
                    if(isset($comments[$i]['comment_post_ID']) and $comments[$i]['comment_post_ID'] == $post['post_ID']){
                    echo "<p>".$comments[$i]['comment_author'].", le ".$comments[$i]['comment_date']."<br/>";
                    echo $comments[$i]['comment_content']."</p>"; 
                    $i++;
                    }
                } while(isset($comments[$i]['comment_post_ID']) and $comments[$i]['comment_post_ID'] == $post['post_ID']);
            }
            ?>
            <form class="post_comments" method="post" action="controllers/C_comments.php">
                <?php if (isset($_SESSION['user'])){
                    echo "<p>Nom : ".$_SESSION['user']['cas:attributes']['cas:displayName']."</p>";
                }
                else echo "<p>Nom : <input type=\"text\" name=\"author\" placeholder=\"Jean Dupond\" required /></p>"; ?>
                <textarea name="content" rows="4" cols="100" placeholder="Votre commentaire ici..." required ></textarea><br/>
                <input type="hidden" name="post_ID" value="<?php echo $post['post_ID'] ?>" />
                <input type="submit" name="submit" value="envoyer !" required/>
            </form>
            <p>____________________________________________________________________________________________________________________________________________________</p><?php
        }
    }
    
    echo $posts['links'];
}
?>

<?php include("/footer.php");?>
</body>
</html>