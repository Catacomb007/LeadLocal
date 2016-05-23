<?php
require_once("DBConnector.php");

$user = $_POST['user'];
$pass = $_POST['pass'];
$confirm = $_POST['confirm'];
$type = $_POST['type'];
$valid = TRUE;

$db = DBConnector::getInstance();
$salt = base64_encode(openssl_random_pseudo_bytes(64, $strong));
$salt = filter_var($salt, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = hash("sha512", $pass . $salt);

$sql = "INSERT INTO users(username, password, type, salt) VALUES('$user', '$pass', '$type', '$salt')";
if ($valid){
    $numRow = $db->affectRows($sql);
    
    if ($data['type'] == 'c'){
        $sql= "INSERT INTO tourist (username, password) VALUES($user, $pass);";
   } else if($data['type'] == 'e'){
        $sql= "INSERT INTO tourist (username, password) VALUES($user, $pass);";
   }
   $numRow .= $db->affectRows($sql);
}

?>
