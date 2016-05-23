
<?php session_start();
 include("../public/header.php");
 require("../src/jsoniss.php");
						 require_once('../src/DBConnector.php');
						$db = DBConnector::getInstance();
						
                        $response = $_GET['jwt'];
                        $JWT = str_replace('"', "", $response);
                        $data = TokenIssuer::getInstance()->check(trim($JWT));


						$phone="Please add your contact info";
						$intro="Please introduce yourself";

                        $type = $data['type'];
                        $name = $data['user'];

                        if ($data['type'] == 'c'){
                            $sql= "SELECT * FROM tourist WHERE username = '$name';";
                        } else if($data['type'] == 'e'){
                            $sql= "SELECT * FROM employee WHERE username = '$name';";
                        } else {
                            die('Access Denied. Invalid Authorization');
                        }

						
						$result=$db->query($sql);
                        
						
						$id=$result[0]['id'];
						$email=$result[0]['email'];
						$phone=$result[0]['contactInfo'];
						$intro=$result[0]['introInfo'];
						
						$pic=$result[0]['pic'];
						if($type="e")
						{
							$rating=$result[0]['rating'];
							$_SESSION['loc']=$rating;
						}
						
					    	
						
?>   
     
   <br>
<div class="container">
    <?php var_dump($data);
        var_dump($result);
 ?>
    	<div class="row">
		
	<div class="col-md-12 lead"><h2><?php echo $name?>&nbsp;&nbsp;<a href="profileEdit.php"><button class="btn btn-primary outline"> Edit</button></a></h2></div>
		
		</div>
  <div class="row">
    
         
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; margin:auto;" src="<?php echo $pic; ?>" height="150" width="150">
            
			  </div>
			</div>
	  <hr/>
	  <div class="row" >
	  		
			  
				   <div class="row form-group" >
					   <span class="col-xs-2 col-sm-2"></span>
					   <span class="col-xs-2 col-sm-2 text-right">
						   <i class="fa fa-envelope fa-2x" data-toggle="tooltip" data-placement="top" title="Email">:</i>
					   	</span>
                        <span class="col-xs-7 col-sm-7 text-left" >
							<b class="profileList"><?php echo (empty($email)?"Please add your email address": $email);?></b>
					   </span>
					   <span class="col-xs-offset-1 col-sm-offset-1"></span>
                    </div>
		   			<div class="row form-group">
						   <span class="col-xs-2 col-sm-2"></span>
					   <span class="col-xs-2 col-sm-2 text-right">
							<i class="fa fa-phone-square fa-2x" data-toggle="tooltip" data-placement="top" title="Contact">:</i>
			   			</span>
			   			<span class="col-xs-7 col-sm-7 text-left" align="left">
							<b class="profileList"><?php echo (empty($phone)?"Please introduce yourself": $phone)?> </b>
						</span>
						<span class="col-xs-offset-1 col-sm-offset-1"></span>
                    </div>
		  			<?php
							if($type="e")
							{
								echo '<div class="row form-group">
					   <span class="col-xs-2 col-sm-2"></span>
					   <span class="col-xs-2 col-sm-2 text-right">
							<i class="fa fa-star-o fa-2x" data-toggle="tooltip" data-placement="top" title="Contact">:</i>
			   			</span>
			   			<div class="col-xs-8 col-sm-8 text-left" align="left">
							<b class="profileList">'; ?>
		  				
		  					<?php include("../src/rankStars.php");?>
		  					<?php 
								echo '</b>
						</div>
                    </div>
					<span class="col-xs-offset-1 col-sm-offset-1"></span>';
							}
						
		  			?>
				  	<div class="row form-group">
						   <span class="col-xs-2 col-sm-2"></span>
					   <span class="col-xs-2 col-sm-2 text-right">
							<i class="fa fa-coffee fa-2x" data-toggle="tooltip" data-placement="top" title="Contact">:</i>
			   			</span>
			   			<span class="col-xs-7 col-sm-7 text-left">
							<b class="profileList"><?php echo (empty($intro)?"Please more about introduce yourself": $intro)?></b>
						</span>
						<span class="col-xs-offset-1 col-sm-offset-1"></span>
                    </div>
				 
			
</div>
						
			 			
			  </div>
			</div>

			  
            
    
   
 <script>
	 
</script>
		 

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
    i.text-right
	 {
		 text-align:right;
	 }
	   i.text-center
	   {
		   text-align:center;
	   }
    .bigicon {
        font-size: 35px;
        color: #000000;
		margin: auto;
    }
	.white {
		color:#ffffff;
	}
	.profileList
	   {
		   font-size:15px;
	   }
</style>

     
<?php include("../public/footer.php");?>
     