<?php 
class TestController {
    public function testAction() {
        $router = Router::getInstance();
        echo 'test';
    }
}