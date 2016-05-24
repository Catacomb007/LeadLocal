<?php
require_once("DBConnector.php");

$task = $_POST['id'];
$employee=$_POST['employee'];

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

 
$sql= "INSERT INTO tasklist(task,employee) VALUES('$task','$employee');";
    $numRow = $db->affectRows($sql);
 $sql="UPDATE task SET taken=1 WHERE ID = '$task'";
  $numRow = $db->affectRows($sql);

?>
