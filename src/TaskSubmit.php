<?php
require_once("DBConnector.php");

$db = DBConnector::getInstance();

$taskData = json_decode($_POST[0]);

echo var_dump($taskData);
?>