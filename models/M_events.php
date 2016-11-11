<?php
require_once './incl/SPDO.class.php';

function get_events($offset = 0, $limit = 50) {
    $db = SPDO::getSPDO();
    $req = $db->prepare('SELECT * FROM events ORDER BY dateEvent DESC LIMIT :offset, :limit');
    $req->bindParam('offset', $offset);
    $req->bindParam('limit', $limit);
    $req->execute();
    return $req->fetchAll();
}
