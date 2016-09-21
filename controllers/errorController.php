<?php 
class errorController {
    public function error404Action() {
        header("Status: 404 Not Found");
        return include_once('./views/404.php');
    }

    public function error403Action() {
        header('HTTP/1.0 403 Forbidden');
        include_once('./views/403.php');
    }
}