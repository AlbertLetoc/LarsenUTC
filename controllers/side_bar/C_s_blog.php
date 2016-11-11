<?php
include_once('./models/M_events.php');
$events = get_events(0,3);
$records = array(
    array(
        "name" => "<a href='https://soundcloud.com/d-cibels-utc/too-close-cover'>Too Close</a>",
        "artist" => "LCB",
        "type" => "audio"
    ),
    array(
        "name" => "<a href='https://soundcloud.com/d-cibels-utc/manouchette-song'>Manouchette Song</a>",
        "artist" => "Manouchette",
        "type" => "audio"
    )
);
include_once('./views/side_bar/s_blog.php');
