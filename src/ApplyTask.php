<?php
require_once("DBConnector.php");

$taskID = $_POST['id'];


       

 /*           
if ($user == null || $user.length == 0) {
    $valid = false;
}
if ($pass == null || $pass.length == 0) {                
    $valid = false;
}
if ($confirm == null || $confirm.length == 0) {                
    $valid = false;
}
if ($user.length < 6 || $user.length > 50) {                
    $valid = false;
}
if ($pass.length < 8 || $pass.length > 100) {                
    $valid = false;
}
if (pass !== confirm) {                
    $valid = false;
}
*/
$db = DBConnector::getInstance();




$sql= "UPDATE task SET taken=1 WHERE ID = '$taskID'";
    $numRow = $db->affectRows($sql);
    



?>
