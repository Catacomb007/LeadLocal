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
		
		if(empty($taskID))
		{
	  	$sql="SELECT * FROM employee WHERE id=3";
		}
		else
		{
		$sql="SELECT * FROM employee WHERE id='$taskID'";	
		}
		$result=$db->query($sql);
		$applyerName=$result[0]['username'];
		$rating=$result[0]['rating'];
		$contact=$result[0]['contactInfo'];
		$_SESSION['los']=$rating;
		
				
						
?> 
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<div class="container-fluid">

	<br/>
   
        <div align="center"><?php //require_once('../src/rankstars.php') ;?> 
	</div>
       <hr/>  
    <div align="center"><i class="fa fa-user" style="font-size:48px"></i> <br /><br /><button class="btn btn-primary outline" style="font-size:20px">Accept</button></div>
  
    
	 <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
		 <div class="row">
			 
		
		   <section id="pricing-table">
		  <div class="pricing">
		  	  <div class="pricing-list">
                                    <ul>
                                        <li><i class="fa fa-users" data-toggle="tooltip" data-placement="top" title="Mr/Mrs">&nbsp Applyer:</i><?php echo $applyerName;?></li>
                                        <li><i class="fa fa-trophy" data-toggle="tooltip" data-placement="top" title="Service Quality"> Level:</i><?php echo $rating;?></li>
                                        <li><i class="fa fa-phone" data-toggle="tooltip" data-placement="top" title="contact"></i><?php echo $contact;?></li>
                                        <li><i class="fa fa-bullhorn" data-toggle="tooltip" data-placement="top" title="Intro">&nbspIntro:</i><?php echo $reservation;?></li>
										
                                    </ul>
                         </div>
		  </div>
		  </section>
			 
			 </div>
			 </div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
</div>


<!--<?php require_once("footer.php"); ?>-->