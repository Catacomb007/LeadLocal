<?php session_start() ?>
<?php
include("../public/header.php");
require("../src/jsoniss.php");
require_once('../src/DBConnector.php');
$db = DBConnector::getInstance();

$response = $_GET['jwt'];
$JWT = str_replace('"', "", $response);
$data = TokenIssuer::getInstance()->check(trim($JWT));


$name = $data['user'];



$sql = "SELECT * FROM task WHERE tourist='$name'";

$result = $db->query($sql);
$id = $result[0]['ID'];
$language = $result[0]['lang'];
$location = $result[0]['loc'];
$reservation = $result[0]['reserv'];
$tag = $result[0]['tag'];
$detail = $result[0]['detail'];
$los = $result[0]['los'];
$touristID = $result[0]['tourist'];
$taken = $result[0]['taken'];
$_SESSION['los'] = $los;
$_SESSION['c_taskID']=$id;

?> 

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<div class="container">
    <br/>
    <h3>My Task</h3>
    <br/>
    <div class="row" id="center"><t id="font"></t>&nbsp&nbsp&nbsp<?php require_once('../src/rankstars.php'); ?> &nbsp&nbsp&nbsp<a href="CustomerTaskEdit.php"><button class="btn btn-primary outline" style="font-size:15px">Edit</button></a></div>
    <hr/>  

    <div class="row text-center">
        <div class="col-xs-4 col-sm-4 col-xs-offset-4 col-sm-offset-4">
            <h4>Applicant</h4>
            <a href="ApplyerPage.php">
                <i class="fa fa-user" style="font-size:36px"></i>
                
            </a>
        </div>

    </div>
    <hr/>
    <div class="row">

        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-shield bigicon" data-toggle="tooltip" data-placement="top" title="ID"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $id; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-language bigicon" data-toggle="tooltip" data-placement="top" title="Language"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $language; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-map-marker bigicon" data-toggle="tooltip" data-placement="top" title="Location"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $location; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-clock-o bigicon" data-toggle="tooltip" data-placement="top" title="Reservation time"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $reservation; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-level-up bigicon" data-toggle="tooltip" data-placement="top" title="levels of service"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $los; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-tag bigicon" data-toggle="tooltip" data-placement="top" title="Tags"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $tag; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-user bigicon" data-toggle="tooltip" data-placement="top" title="UserID"></i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $touristID; ?></span>
        </div>
        <div class="row form-group" >
            <span class="col-xs-4 col-sm-4 text-right" ><i style="font-size:20px;" >Detail:</i></span>
            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><p><?php echo $detail; ?></p></span>
        </div>


    </div>

</div>	

<style>
    .header {
        color: #000000;
        font-size: 27px;
        padding: 10px;
    }

    #right {
        text-align: right;

    }
    #font {
        font-size: 22px;
    }
    #center {
        text-align: center;
    }

    .bigicon {
        font-size: 35px;
        color: #000000;
        margin: auto;
    }
    .white {
        color:#ffffff;
    }
</style>

<!--<?php require_once("footer.php"); ?>-->