

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
     
		<div class="col-md-12 lead"><h2><?php echo $UserName; ?> </h2></div>
		  
        <div class="col-md-12">
            
                <form class="form-horizontal" method="post">
                    <fieldset>
                      

                     
                      
                           

                        <div class="form-group">
							<labe for="email">  <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i>&nbsp;&nbsp;<span font-size="5px">New Email Address</span></span></labe>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Example@example.com" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
						<label for="phone">	<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i>&nbsp;&nbsp;<span font-size="5px"> New Phone Contact</span></span> </label>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control">
                            </div>
                        </div>
						 <div class="form-group">
							 <label for="newpassword">	<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-lock bigicon"></i>&nbsp;&nbsp;<span font-size="5px"> New Password</span></span></label>
                            <div class="col-md-8">
                                <input id="newpassword" name="newpassword" type="text" placeholder="Phone Number" class="form-control">
                            </div>
                        </div>
						<div class="form-group">
							<label for="repeatpassword"><span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-lock bigicon"></i>&nbsp;&nbsp;<span font-size="5px"> Repeat New Password</span></span></label>
                            <div class="col-md-8">
                                <input id="repeatpassword" name="repeatpassword" type="text" placeholder="Phone Number" class="form-control">
                            </div>
                        </div>
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
								<label for="message"><span font-size="5px"> Introduce Info:</span><textarea class="form-control" id="message" name="message" placeholder="Introduce more about yourself" cols="70" rows="7"></textarea></label>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary outline">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
   


					</form>
                 
				 	
                </div>
                <div class="col-md-6">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</div>
    
   
 <script>
	 
</script>
		 

   

     
<?php include("../public/footer.php");?>
     