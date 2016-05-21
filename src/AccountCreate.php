<?php
require_once("DBConnector.php");

$user = $_POST['user'];
$pass = $_POST['pass'];
$confirm = $_POST['confirm'];
$type = $_POST['type'];

       
$valid = true;
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
$salt = base64_encode(openssl_random_pseudo_bytes(64, $strong));
$salt = filter_var($salt, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = hash("sha512", $pass . $salt);

$sql = "INSERT INTO users(username, password, type, salt) VALUES('$user', '$pass', '$type', '$salt')";
if ($valid){
    $numRow = $db->affectRows($sql);
    
}
echo var_dump($salt, $pass, $sql, $numRow);

?>
