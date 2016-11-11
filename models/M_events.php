<?php
require_once './incl/SPDO.class.php';
function get_events($offset = 0, $limit = 50) {
    $db = SPDO::getSPDO();
    $req = $db->prepare('SELECT * FROM events ORDER BY date_event DESC LIMIT :offset, :limit');
    $req->bindParam('offset', $offset, PDO::PARAM_INT);
    $req->bindParam('limit', $limit, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll();
}