<?php 
require_once __DIR__ . '../../CONNECT/database.php';
class MEMBRE{
    function get_AllMembres(){
        global $db;

        $query = 'SELECT * FROM membre';
        $request = $db->query($query);
    
        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }
}