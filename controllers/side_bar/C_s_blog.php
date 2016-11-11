<?php
include_once('./models/side_bar/M_events.php');
$events = get_events(0,3);

$records = array(
    array(
        "name" => "Californication",
        "artist" => "Ananas Reggae Machine",
        "type" => "audio"
    ),
    array(
        "name" => "Soirée des Finaux P16",
        "artist" => "ChillPunk",
        "type" => "video"
    )
);

include_once('./views/side_bar/s_blog.php');
