<div class="col-md-12 carousel">
    <img src="/larsenUTC/style/img/slide1.png" />
</div>
<div class="jumbotron col-md-12">
    <div class="row">
        <div class="col-md-9">
            <h2>Larsen, l'association qui réunit les musiciens de l'UTC depuis 30 ans</h2>
        </div>
        <div class="col-md-3">
            <a>Découvrir l'Association</a>
        </div>
    </div>
</div>
<div class="splitter">
</div>
<div class="row title">
    <div class="col-md-12">
        <h1>Les dernières news :</h1>
        <a href="#" class="to-right">Voir toutes les news</a>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
    <?php
        if (is_array($posts['data']) || is_object($posts['data'])) { // evite les bugs en cas de résultat vide de la requete SQL, comme si pas d'articles rédigés dans la periode demandée par ex
            if (empty($posts['data'])) {
                echo "<h3>Aucun article pour la période demandée</h3>";
            }
            else{
                foreach ($posts['data'] as $post) {
                ?>
                    <div class="col-md-12 card">
                        <div class="row card-title">
                            <div class="col-md-2 card-date">
                                <div class="row">
                                 <?php echo '<div class="col-md-6"><span class="card-date-day">'.date('d', strtotime($post['post_date'])).'</span></div><div class="col-md-6"><span class="card-date-month">'.utf8_encode(strftime('%b', strtotime($post['post_date']))).'</span><span class="card-date-year">'.date('Y', strtotime($post['post_date'])).'</span></div>'; ?>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <h3><?php echo $post['post_title']; ?></h3>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-md-2 card-author">
                                <div class="row">
                                    <div class="col-md-6 card-author-img">
                                        <img src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $post['post_author']; ?>" alt="Photo auteur"/>
                                    </div>
                                    <div class="col-md-6 card-author-name">
                                        <span><?php echo UserInfo::getFirstName($post['post_author']); ?></span> <span><?php echo formatName(UserInfo::getLastName($post['post_author'])); ?></span>
                                        <span><?php echo UserInfo::getRole($post['post_author']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
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