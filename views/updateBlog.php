<form method="POST">
    <input type="text" name="news_title" value="<?php echo $post['post_title']; ?>"/>
    <textarea name="news_text"><?php echo $post['post_content']; ?></textarea>
    <input type="hidden" name="news_token" value="<?php echo $token; ?>" />
    <input type="submit" />
</form>