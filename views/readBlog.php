<div class="row links">
    <div class="col-md-12">
        <a href="/larsenUTC/">Accueil</a> > <b>Articles</b>
    </div>
</div>
<div class="splitter">
</div>
<div class="article">
    <div class="row title">
        <div class="col-md-12">
            <h1>Article :</h1> C'est Rock 'n' Roll de lire
        </div>
    </div>
    <div class="col-md-12 card">
        <div class="row card-title">
            <div class="col-md-2 card-date">
                <div class="row">
                    <?php echo '<div class="col-md-6"><span class="card-date-day">'.date('d', strtotime($post['post_date'])).'</span></div><div class="col-md-6"><span class="card-date-month">'.utf8_encode(strftime('%b', strtotime($post['post_date']))).'</span><span class="card-date-year">'.date('Y', strtotime($post['post_date'])).'</span></div>'; ?>
                </div>
            </div>
            <div class="col-md-10">
                <h3><a href="<?php echo $router->getUrl('readBlog', array('id' => $post['post_ID'])); ?>"><?php echo $post['post_title']; ?></a></h3>
            </div>
        </div>
        <div class="row card-content">
            <div class="col-md-2 card-author">
                <div class="row">
                    <div class="col-md-6 card-author-img">
                        <img src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $post['post_author'] ?>" alt="Photo auteur"/>
                    </div>
                    <div class="col-md-6 card-author-name">
                        <span><?php echo UserInfo::getFirstName($post['post_author']); ?></span> <span><?php echo formatName(UserInfo::getLastName($post['post_author'])); ?></span>
                        <span><?php echo UserInfo::getRole($post['post_author'], 'Ancien'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <?php echo $post['post_content']; ?>
            </div>
        </div>
    </div>
</div>
<div class="comments">
    <div class="row title">
        <div class="col-md-12">
            <h1>Les Com' :</h1> <?php echo $post['nb_comments']; ?>, ça fait beaucoup de monde.
        </div>
    </div>
    <div class="col-md-12">
        <?php
        foreach($post['post_comments'] as $comment) {
        ?>   
        <div class="row card-content comment">
            <div class="col-md-1 card-author-img">
                <img src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $comment['comment_author']; ?>" alt="Photo auteur"/>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-4">
                        <div class="comment-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="comment-author"><?php echo UserInfo::getFirstName($comment['comment_author']).' '.formatName(UserInfo::getLastName($comment['comment_author'])); ?></span>
                                    <span class="comment-author-role"><?php echo UserInfo::getRole($comment['comment_author'], ''); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 comment-date">
                                    <?php echo date('d/m/y, H', strtotime($post['post_date'])).'h'.date('i', strtotime($post['post_date'])); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $comment['comment_content']; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        
        if(isset($_SESSION['user'])) { ?>
            <form class="form row comment" method="POST">
                <div class="col-md-1 card-author-img">
                    <img src="https://demeter.utc.fr/pls/portal30/portal30.get_photo_utilisateur?username=<?php echo $_SESSION['user']['cas:user']; ?>" alt="Photo auteur"/>
                </div>
                <div class="col-md-11 comment-textarea">
                    <textarea placeholder="Votre commentaire ici ..." name="comment_content"></textarea>
                </div>
                <input type="hidden" name="comment_token" value="<?php echo $token; ?>" />
            </form>
            <script>
                $('.comment-textarea > textarea').keydown(function(e) {
                    if(e.keyCode == 13 && !e.shiftKey) {
                        console.log(this.form);
                        $(this.form).submit();
                        return false;
                    }
                })
            </script>
        <?php
        }
        ?>
    </div>
<div>
