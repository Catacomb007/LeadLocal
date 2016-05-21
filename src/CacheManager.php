<?php 
require_once("Cache.php");
$cache = CacheHandler::getInstance();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $action = $_POST['action'];
    $jwt = $_POST['jwt'];
    $debug= array('POST'=> $_POST, 'ACTION'=>$action, 'RETURN'=>null);
        switch ($action){
            
            case "SET": 
                echo $cache->set('JWT', $jwt);
                $debug['RETURN'] = "DONE";
                break;

            case "GET":
            
                $return = $cache->get('JWT');
                $debug['RETURN'] = $return;
                break;
            case "DELETE":
                $cache->delete('JWT');
                break;
    }
    echo json_encode($debug);
}
?>