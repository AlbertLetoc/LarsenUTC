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
// affichage du carousel uniquement sur la page d'accueil
if((!isset($_GET['sem'])) and (!isset($_GET['annee']))){ echo "<h2> carousel d'images </h2>";} 


if (is_array($posts_comments) || is_object($posts_comments)){ // evite les bugs en cas de résultat vide de la requete SQL, comme si pas d'articles rédigés dans la periode demandée par ex 
    $current_post_ID = NULL;
    foreach($posts_comments as $post){ 
        if ($current_post_ID != $post['post_ID']){ // premier commentaire de n'importe quel article (premier ou pas)
            if(!is_null($current_post_ID)){ // premier commentaire de l'article suivant : on affiche d'abord le formulaire de post de commentaire de l'article précédent. ?> 
                </div> <!-- Fin du div de la class "news" l.43 -->
                <form class="post_comments" method="post" action="controllers/C_comments.php">
                    <?php if (isset($_SESSION['user'])){
                        echo "<p>Nom : ".$_SESSION['user']."</p>";
                    }
                    else echo "<p>Nom : <input type=\"text\" name=\"author\"/></p>"; ?>
                    <textarea name="content" rows="4" cols="100">Votre commetaire ici.</textarea><br/>
                    <input type="submit" value="envoyer !"/>
                </form>
            <?php
            }

            // Que l'article soit le tout premier ou l'article suivant on l'affiche avec son premier commentaire
            $current_post_ID = $post['post_ID'];
            ?>
            <div class="news">
                <h2><?php echo $post['post_title']; ?></h2>
                <h3>le <?php echo $post['post_date']; ?></h3>
                <p><?php echo $post['post_content']; ?></p>
                <em> by <?php echo $post['post_author']; ?></em><br/><br/>
                <em><u>Commentaires :</u></em>
                <?php if (!is_null($post['comment_content'])) { ?>
                    <p><?php echo $post['comment_author'].", le ".$post['comment_date']; ?> <br/>
                    <?php echo $post['comment_content']; ?></p>
                <?php }
        }
        elseif ($current_post_ID == $post['post_ID']){  // [2, n] commentaire ?>
            <p><?php echo $post['comment_author'].", le ".$post['comment_date']; ?> <br/>
            <?php echo $post['comment_content']; ?></p>
            
        <?php
        }
    }
} ?>
</body>
</html>