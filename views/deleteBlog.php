<form method="POST">
    Êtes-vous sur de vouloir supprimer cette news ?
    <input type="hidden" name="news_token" value="<?php echo $token; ?>" />
    <input type="submit" value="Oui"/>
    <a href="<?php echo $router->getUrl('accueil'); ?>">Non</a>
</form>