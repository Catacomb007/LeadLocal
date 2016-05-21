

 <?php include("../public/header.php");?>
 <?php
						 require_once('../src/DBConnector.php');
						$db = DBConnector::getInstance();
				
						$sql="SELECT * FROM tourist WHERE username='Pizza Man'";
						$result=$db->query($sql);
						$UserName=$result[0]['username'];
						//$Email=$result[0]['email'];
						//$Contact=$result[0]['contact'];
						
?>   
   <script>
</script>	   
   <br>
<div class="container">
	<div class="row">
		
	<div class="col-md-12 lead"><h2>Profile&nbsp;&nbsp;<a href="profileEdit.php"><button class="btn btn-primary outline"> Edit</button></a></h2></div>
		
		</div>
  <div class="row">
    
         
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; margin:auto;" src="img/userImg/pizza_man.jpg" height="150" width="150">
            
			  </div>
			</div>
	  <hr/>
	  <div class="row" >
	  		
			  
				   <div class="row form-group" >
							 <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-envelope bigicon" data-toggle="tooltip" data-placement="top" title="Email">:&nbsp;&nbsp;</i></span>
                            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" line-height="50%">email@test.com</span>
                    </div>
		   <div class="row form-group">
							 <span class="col-xs-4 col-md-1 text-right"> <i class="fa fa-phone-square bigicon" data-toggle="tooltip" data-placement="top" title="Contact">:&nbsp;&nbsp;</i></span>
                            
			   				<span class="col-xs-8 text-left taskFont" font-size="5px">604-1234-5678</span>
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
    
    .bigicon {
        font-size: 35px;
        color: #000000;
		margin: auto;
    }
	.white {
		color:#ffffff;
	}
</style>

     
<?php include("../public/footer.php");?>
     