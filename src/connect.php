
<?php
require_once("DBConnector.php");
require_once("jsoniss.php");
$db = DBConnector::getInstance();

$id = $_POST['name'];
$pw = $_POST['pass'];

$sql = "SELECT * FROM users where username = '$id'";
$row = $db->query($sql);
$salt = $row[0]['salt'];
$baseuser = $row[0]['username'];
$basepass = $row[0]['password'];
$hashedpass = hash("sha512", $pw . $salt);
if($baseuser === $id && $basepass === $hashedpass)
{
    $type = $row[0]['type'];
    $tk = TokenIssuer::getInstance();
    
    $jwt = $tk->issue($id, $type);
    $jwt = trim($jwt);
    
    echo($jwt);
} else {

   echo "Failed!";
}
?>