<?php
class static Cache{
    private $input = array();

    function static push($value){
        $arrleng = count($input);
        $input[$arrleng] = $value;
    }

    function static push($key, $value){
        $input[$key] = $value;
    }

    function static get($key){
        return $input[$key];
    }
}
?>

