<?php include("../public/header.php"); ?>
<?php
require_once('../src/DBConnector.php');
require_once("../src/jsoniss.php");

$db = DBConnector::getInstance();
$response = $_GET['jwt'];
$JWT = str_replace('"', "", $response);
$data = TokenIssuer::getInstance()->check(trim($JWT));

$type = $data['type'];
$name = $data['user'];


if ($data['valid'] === TRUE ) {
    //do nothing. Continue page load.
} else {
    echo '<META HTTP-EQUIV="refresh" content="1;URL=Login.php?fail=wrong-account">';
    echo "<script type='text/javascript'>document.location.href='Login.php?fail=wrong-account';</script>";
}

if ($data['type'] == 'c') {
    $sql = "SELECT * FROM tourist WHERE username = '$name';";
} else if ($data['type'] == 'e') {
    $sql = "SELECT * FROM employee WHERE username = '$name';";
} else {
    die('Access Denied. Invalid Authorization');
}


$result = $db->query($sql);
$id = $result[0]['ID'];
$pic = $result[0]['pic'];
//$Email=$result[0]['email'];
//$Contact=$result[0]['contact'];
?>       

<div class="container">

    <h3>Tasks Management</h3>

    <ul class="list-group">
        <?php
        if ($type == 'c') {
            echo
            '
		 <li class="list-group-item"><a href="TaskTest.php">Create a Task</a></li>
                 <li class="list-group-item"><a href="CustomerTask.php">My Task</a></li>';
        }
        ?>
        <?php
        if ($type == 'e') {
            echo
            '
       
        <li class="list-group-item"><a href="taskList.php">Task Lists</a></li>
        <li class="list-group-item"><a href="wonTask.php">Won Task</a></li>';
        }
        ?>
    </ul>


    <br/>
    <br/>
    <br/>
</div>


<hr>
<?php include("../public/footer.php"); ?>