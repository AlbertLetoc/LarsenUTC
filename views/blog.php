<?php $router = Router::getInstance(); ?>
<div class="col-md-12 carousel hidden-md-down">
    <img src="/larsenUTC/style/img/slide1.png" />
</div>
<div class="jumbotron col-md-12 hidden-md-down">
    <div class="row">
        <div class="col-md-9">
            <h2>Larsen, l'association qui réunit les musiciens de l'UTC depuis 30 ans</h2>
        </div>
        <div class="col-md-3">
            <a href='<?php echo $router->getUrl('association_presentation'); ?>'>Découvrir l'Association</a>
        </div>
    </div>
</div>
<div class="splitter hidden-md-down">
</div>
<div class="row title">
    <div class="col-xs-12">
        <h1>Les dernières news :</h1>
        <a href="<?php echo $router->getUrl('listAllBlog'); ?>" class="to-right">Voir toutes les news</a>
    </div>
</div>
<div class="col-xs-12">
    <div class="row">
    <?php
        if (is_array($posts['data']) || is_object($posts['data'])) { // evite les bugs en cas de résultat vide de la requete SQL, comme si pas d'articles rédigés dans la periode demandée par ex
            if (empty($posts['data'])) {
                echo "<h3>Aucun article pour la période demandée</h3>";
            }
            else{
                foreach ($posts['data'] as $post) {
                ?>
                    <div class="col-xs-12 card">
                        <div class="row card-title">
                            <div class="col-xs-2 card-date">
                                <div class="row">
                                 <?php echo
                                     '<div class="col-sm-6">
                                        <svg height="100%" viewBox="0 0 100 100">
                                            <polygon points="0 0, 50 50, 0 100" fill="#ffffff" stroke="#ffffff"></polygon>
                                        </svg>
                                        <span class="card-date-day">'.date('d', strtotime($post['post_date'])).'</span>
                                     </div>
                                     <div class="col-sm-6">
                                        <div class="row">
                                            <span class="card-date-month col-xs-12">'.utf8_encode(strftime('%b', strtotime($post['post_date']))).'</span>
                                            <span class="card-date-year col-xs-12">'.date('Y', strtotime($post['post_date'])).'</span>
                                        </div>
                                     </div>'; ?>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <h3><a href="<?php echo $router->getUrl('readBlog', array('id' => $post['post_ID'])); ?>"><?php echo $post['post_title']; ?></a></h3>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-2 card-author">
                                <div class="row">
                                    <div class="col-md-6 hidden-sm-down card-author-img">
                                        <img src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $post['post_author']; ?>" alt="Photo auteur"/>
                                    </div>
                                    <div class="col-sm-12 col-md-6 card-author-name">
                                        <div class="row">
                                            <span class="col-xs-12"><?php echo UserInfo::getFirstName($post['post_author']); ?></span><span class="col-xs-12"><?php echo formatName(UserInfo::getLastName($post['post_author'])); ?></span>
                                            <span class="col-xs-12"><?php echo UserInfo::getRole($post['post_author'], 'Ancien'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-10">
                                <?php echo trim_text($post['post_content'], 400); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
        }
    ?>
    </div>
</div>