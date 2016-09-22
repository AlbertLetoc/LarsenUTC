<?php
class repetController {
    public function sallesAction() {
        global $sidebarFile;
        $router = Router::getInstance();
        $salle = $router->getParameters()['salle'];
        include_once('./views/salles.php');
    }
}