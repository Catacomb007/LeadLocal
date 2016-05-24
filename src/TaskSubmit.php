<?php
session_start();
require_once("DBConnector.php");

$db = DBConnector::getInstance();



$lang = implode(",", $_POST['lang']);
$loc = implode(",", $_POST['loc']);
$reserve = implode(",", $_POST['reserv']);
$tag = implode(",", $_POST['tag']);
$detail = $_POST['detail'];
$star = substr($_POST['star'], -1);
$id = $_POST['id'];

$lang = htmlentities($lang);
$loc = htmlentities($loc);
$reserve = htmlentities($reserve);
$tag = htmlentities($tag);
$detail = htmlentities($detail, ENT_QUOTES);
$star = (int) $star;

$sql = "INSERT INTO task(lang, loc, reserv, tag, detail, los, tourist) 
    VALUES('$lang', '$loc', '$reserve', '$tag','$detail', '$star', '$id');";





    if($_SERVER['REMOTE_ADDR'] != $_SERVER['SERVER_ADDR'] || ($_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != '::1'))
            die('Access Denied');
        else {
            $numRows = $db->affectRows($sql);
        }
?>