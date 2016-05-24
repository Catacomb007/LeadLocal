<?php session_start()?>
<?php include("header.php");
      require_once("../src/jsoniss.php");
      $data = TokenIssuer::getInstance()->check($_POST['JWT']);
      //$userID=$data['user'];
      
	
/*
 if($data['valid'] === TRUE && $data['type'] === 'c'){
   break;
 } else {
      echo '<META HTTP-EQUIV="refresh" content="1;URL=Login.php">';
      echo "<script type='text/javascript'>document.location.href='Login.php';</script>";
      }
	  */							 	   require_once('../src/DBConnector.php');
	  	$db = DBConnector::getInstance();
		$taskID=$_GET['taskid'];
		if(empty($taskID))
		{
	  	$sql="SELECT * FROM task WHERE id=1";
		}
		else
		{
		$sql="SELECT * FROM task WHERE id='$taskID'";	
		}
		$result=$db->query($sql);
		$id=$result[0]['ID'];
		$language=$result[0]['lang'];
		$location=$result[0]['loc'];
		$reservation=$result[0]['reserv'];
		$tag=$result[0]['tag'];
		$detail=$result[0]['detail'];
		$los=$result[0]['los'];
		$touristID=$result[0]['tourist'];
		
		$_SESSION['los']=$los;		
                
                $sql2="SELECT * FROM tourist wHERE id='$touristID'";
                $touristDB=$db->query($sql2);
                $name=$touristDB[0]['username'];
						
?> 

   <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<div class="container">
	<br/>
      <h1><?php echo $name;?>'s task</h1>
       <br/>
       
       <hr/>  
    
    
	    <hr/>
     <div class="row">
		 
		  <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-shield bigicon" data-toggle="tooltip" data-placement="top" title="ID"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $id;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-language bigicon" data-toggle="tooltip" data-placement="top" title="Language"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $language;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-map-marker bigicon" data-toggle="tooltip" data-placement="top" title="Location"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $location;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-clock-o bigicon" data-toggle="tooltip" data-placement="top" title="Reservation time"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $reservation;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-level-up bigicon" data-toggle="tooltip" data-placement="top" title="levels of service"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $los;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-tag bigicon" data-toggle="tooltip" data-placement="top" title="Tags"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $tag;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-user bigicon" data-toggle="tooltip" data-placement="top" title="UserID"></i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><?php echo $touristID;?></span>
           </div>
		 <div class="row form-group" >
			  <span class="col-xs-4 col-sm-4 text-right"><i>Detail:</i></span>
			  <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%"><p><?php echo $detail;?></p></span>
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
<script>
    
       
</script>

<!--<?php require_once("footer.php"); ?>-->