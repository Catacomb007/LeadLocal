<?php 
require_once("Cache.php");

if($_SERVER['REQUEST_METHOD'] == "post"){
    $action = $_POST['action'];
    for($_POST as $item){
        switch ($action){
            if($item == $action)
                continue;
        
            case "PUSH": 
            Cache::push($item)
            break;

            case "GET"
            Cache::get($item)
            break;
        }
    }
}
?>