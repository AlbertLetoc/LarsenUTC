<div class="col-md-12 carousel">
    Carousel
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
                    <div class="col-md-12 news">
                        <div class="row news-title">
                            <div class="col-md-2 news-date">
                                <div class="row">
                                 <?php echo '<div class="col-md-6"><span class="news-date-day">'.date('d', strtotime($post['post_date'])).'</span></div><div class="col-md-6"><span class="news-date-month">'.utf8_encode(strftime('%b', strtotime($post['post_date']))).'</span><span class="news-date-year">'.date('Y', strtotime($post['post_date'])).'</span></div>'; ?>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <h3><?php echo $post['post_title']; ?></h3>
                            </div>
                        </div>
                        <div class="row news-content">
                            <div class="col-md-2 news-author">
                                <div class="row">
                                    <div class="col-md-6 news-author-img">
                                        <img src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $post['post_author']; ?>" alt="Photo auteur"/>
                                    </div>
                                    <div class="col-md-6 news-author-name">
                                        <?php
                                        //  echo $post['post_author']; ?>
                                        <span>Clément</span> <span>Losser</span><!-- Temporaire tant que Ginger n'est pas installer -->
                                        <span>Président</span>
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

            echo $posts['links'];
        }
    ?>
    </div>
</div>