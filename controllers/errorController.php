<?php 
class errorController {
    public function error404Action() {
        header("Status: 404 Not Found");
        include_once('./views/404.php');
    }
}