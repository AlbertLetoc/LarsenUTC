<?php
include_once ('./models/M_events.php');

class eventController
{
    public function listAction() {
        $events = get_events();

        include_once('./views/listEvent.php');
    }
}