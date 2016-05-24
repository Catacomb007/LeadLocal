<?php

require_once("DBConnector.php");

$id = $_SESSION['c_taskID'];
$type = $_POST['type'];

$lang = $_POST['lang'];
$reserv = $_POST['reserv'];
$tag = $_POST['tag'];
$detail = $_POST['detail'];
$tourist = $_POST['tourist'];



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

if(empty($id)){
     echo "error the task id didn't find.";

} else {
   
    $sql = "UPDATE task SET lang='$lang',loc='$loc',reserv='$reserv',tag='$tag',detail='$detail'  WHERE ID = '$id'";
 
}
$numRow = $db->affectRows($sql);
?>
