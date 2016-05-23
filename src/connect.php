
<?php

require_once("DBConnector.php");
require_once("jsoniss.php");
$db = DBConnector::getInstance();

$user = $_POST['name'];
$pw = $_POST['pass'];

$sql = "SELECT * FROM users where username = '$user'";
$row = $db->query($sql);
$salt = $row[0]['salt'];
$baseuser = $row[0]['username'];
$basepass = $row[0]['password'];
$hashedpass = hash("sha512", $pw . $salt);
if($baseuser === $user && $basepass === $hashedpass)
{
    $type = $row[0]['type'];
    
    $tk = TokenIssuer::getInstance();
    
    $jwt = $tk->issue($user, $type);
    
    $jwt = trim($jwt);
    
    echo($jwt);
} else {

   echo "#Failed!#";
}
?>