<?php session_start() ?>
<?php
include("header.php");



/*
  if($data['valid'] === TRUE && $data['type'] === 'c'){
  break;
  } else {
  echo '<META HTTP-EQUIV="refresh" content="1;URL=Login.php">';
  echo "<script type='text/javascript'>document.location.href='Login.php';</script>";
  }
 */ require_once('../src/DBConnector.php');
$db = DBConnector::getInstance();

$taskID = $_SESSION['c_taskID'];
$sql = "SELECT * FROM tasklist WHERE task='$taskID';";
$result = $db->query($sql);
$name = $result[0]['employee'];
$sql = "SELECT * FROM employee WHERE username='$name';";
$result = $db->query($sql);
$rating = $result[0]['rating'];
$contact = $result[0]['contactInfo'];
$intro = $result[0]['introInfo'];
$pic =$result[0]['pic'];
$_SESSION['los'] = $rating;
?> 
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<div class="container-fluid">

    <br/>


    <hr/>  
    <div align="center">
         <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
                     display:block; margin:auto;" alt="Applicant's pic" src="<?php echo $pic; ?>" height="150" width="150">      
    <br /><br /><button class="btn btn-primary outline" style="font-size:20px">Accept</button>
    </div>

    <br/>
    <hr/>
    
        <div class="row text-center">
            <div class="row form-group" >
                <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-users fa-2x" data-toggle="tooltip" data-placement="top" title="Applicant"></i></span>
                <span class="col-xs-8 col-sm-8 taskFont text-left"><?php echo $name; ?></span>
            </div>
            <div class="row form-group" >
                <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-trophy fa-2x" data-toggle="tooltip" data-placement="top" title="Rating"></i></span>
                <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $rating; ?></span>
            </div>
            <div class="row form-group" >
                <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-phone fa-2x" data-toggle="tooltip" data-placement="top" title="contact"></i></span>
                <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $contact; ?></span>
            </div>
            <div class="row form-group" >
                <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-bullhorn fa-2x" data-toggle="tooltip" data-placement="top" title="Intro"></i></span>
                <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $intro; ?></span>
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