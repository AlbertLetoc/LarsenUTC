<?php
// CVS: $Id$
//
// Pager_Wrapper
// -------------
//
// Ready-to-use wrappers for paging the result of a query,
// when fetching the whole resultset is NOT an option.
// This is a performance- and memory-savvy method
// to use PEAR::Pager with a database.
// With this approach, the network load can be
// consistently smaller than with PEAR::DB_Pager.
//
// The following wrappers are provided: one for each PEAR
// db abstraction layer (DB, MDB and MDB2), one for
// PEAR::DB_DataObject, and one for the PHP Eclipse library
//
//
// SAMPLE USAGE
// ------------
//
// $query = 'SELECT this, that FROM mytable';
// require_once 'Pager_Wrapper.php'; //this file
// $pagerOptions = array(
//     'mode'    => 'Sliding',
//     'delta'   => 2,
//     'perPage' => 15,
// );
// $paged_data = Pager_Wrapper_MDB2($db, $query, $pagerOptions);
// //$paged_data['data'];  //paged data
// //$paged_data['links']; //xhtml links for page navigation
// //$paged_data['page_numbers']; //array('current', 'total');
//



/**
 * @param object PEAR::DB instance
 * @param string db query
 * @param array  PEAR::Pager options
 * @param boolean Disable pagination (get all results)
 * @param integer fetch mode constant
 * @param mixed  parameters for query placeholders
 *        If you use placeholders for table names or column names, please
 *        count the # of items returned by the query and pass it as an option:
 *        $pager_options['totalItems'] = count_records('some query');
 * @return array with links and paged data
 */
function Pager_Wrapper_SPDO($query, $pager_options = array())
{   
    $db = SPDO::getSPDO();

   if (!array_key_exists('totalItems', $pager_options)) {   // comptage du nombre d'items
        // count via fonction php sur le fetch du resultat sql
        $req = $db->prepare($query, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
        $req->execute();
        $res = $req->fetchall();
        $req->closeCursor();
        $totalItems = (int) count($res);
        $pager_options['totalItems'] = $totalItems;
    }

    require_once 'incl/Pear/Pager-2.4.9/Pager.php';
    $pager = Pager::factory($pager_options);

    $page = array();
    $page['totalItems'] = $pager_options['totalItems'];
    $page['links'] = $pager->links;
    $page['page_numbers'] = array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    );

    list($page['from'], $page['to']) = $pager->getOffsetByPageId();

        $i = $page['from']-1;
        $res2 = array();
        while ($i < $page['from']-1+ min($pager_options['perPage'], $page['totalItems'])){
            if(isset($res[$i]) && !is_null($res[$i])){array_push($res2, $res[$i]);}
            $i++;
        }
    $page['data'] = $res2;
    return $page;
}
?>