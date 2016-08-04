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
        <h2> carousel d'images </h2>

<?php
if (is_array($posts) || is_object($posts)){ // evite les bugs en cas de résultat vide de la requete SQL, comme si par d'articles rédigés dans la periode demandée par ex 
    foreach($posts as $post){
?>
        <div class="news">
            <h2><?php echo $post['post_title']; ?></h2>
            <h3>le <?php echo $post['post_date']; ?></h3>
            <p><?php echo $post['post_content']; ?></p>
            <em> by <?php echo $post['post_author']; ?></em>
        </div>
        <?php
    }
}
?>
</body>
</html>