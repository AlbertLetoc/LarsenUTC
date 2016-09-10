<?php
class repetController {
    public function sallesAction() {
        $router = Router::getInstance();
        $salle = $router->getParameters()['salle'];
        include_once('./views/salles.php');
    }
}