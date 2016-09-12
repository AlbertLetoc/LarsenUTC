<form method="POST">
    <input type="text" name="news_title"/>
    <textarea name="news_text"> </textarea>
    <input type="hidden" name="news_token" value="<?php echo $token; ?>" />
    <input type="submit" />
</form>