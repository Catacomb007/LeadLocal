<?php

require_once("DBConnector.php");

$id = $_POST['id'];
$type = $_POST['type'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$intro = $_POST['intro'];
$pic=$_POST['pic'];

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

if ($type == 'c') {
    $sql = "UPDATE tourist SET email='$email',contactInfo='$phone',introInfo='$intro',pic='$pic'  WHERE ID = '$id'";
    echo $id;
} else if ($type == 'e') {
    $sql = "UPDATE employee SET email='$email',contactInfo='$phone',introInfo='$intro',pic='$pic'  WHERE ID = '$id'";
    echo $id;
} else {
    echo "error the user type didn't find.";
}
$numRow = $db->affectRows($sql);
?>
