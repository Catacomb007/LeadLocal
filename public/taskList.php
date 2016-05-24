


<?php
session_start();
include("../public/header.php");
require("../src/jsoniss.php");
require_once('../src/DBConnector.php');
$db = DBConnector::getInstance();

$response = $_GET['jwt'];
$JWT = str_replace('"', "", $response);
$data = TokenIssuer::getInstance()->check(trim($JWT));

$type = $data['type'];
$name = $data['user'];

$_SESSION['jwt']=$JWT;
$sql = "SELECT * FROM task";
$result = $db->query($sql);

$value = sizeof($result);
?> 
<div  class="container">
    <br/>
    <h3>Tasks List</h3>
    <hr/>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="list-group">
            <?php
            $tasklist = $value;
//$tasklist= tasklist[].length

            for ($i = 1; $i <= $tasklist; $i++) {
                $los = $result[$i - 1]['los'];
                $tourist = $result[$i - 1]['tourist'];
                $star_los = $result[$i - 1]['los'];
                echo '<div class="row form-group" >
				 	 <a class="ctask" href="E_ApplyTask.php?taskid=' . $i . '">
							 
							 <span class="col-xs-2 col-sm-2 text-right">
							 <i class="fa fa-square fa-2x" data-toggle="tooltip" data-placement="top" title="task"></i>
							 </span>
                            <span class="col-xs-10 col-sm-10 text-left" style="font-size:15px" ><b>Task Owner:' . $tourist . '&nbsp</b>';

                for ($j = 0; $j < $star_los; $j++) {
                    echo '<i class="fa fa-2x fa-star" style=" color:#898D9A;"></i>';
                }

                echo
                '</span>
			 			</a>
		</div>';
            }
            ?>


        </ul> 
    </div>		 
</div>	










<?php include("../public/footer.php"); ?>
     