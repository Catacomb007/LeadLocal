
<?php session_start()?>


<?php include("../public/header.php");?>
     <?php
						 require_once('../src/DBConnector.php');
						$db = DBConnector::getInstance();
				
						$sql="SELECT * FROM task";
						$result=$db->query($sql);
						
						$value=sizeof($result);
						
						
?> 
    <div  class="container">
		<br/>
	<h3>Tasks List</h3>
		<hr/>
	 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 <ul class="list-group">
   <?php
$tasklist=$value;
//$tasklist= tasklist[].length

for($i=1;$i<=$tasklist;$i++)
{
  $los=$result[$i-1]['los'];
  echo	'<div class="row form-group" >
							 <a class="ctask" href="E_ApplyTask.php?taskid='.$i.'">
							 <span class="col-xs-4 col-sm-4 text-right"><i class="fa fa-square bigicon" data-toggle="tooltip" data-placement="top" title="Email"></i></span>
                            <span class="col-xs-8 col-sm-8 taskFont text-left" font-size="5px" >Task&nbsp'.$i.'&nbsp Tasklevel:&nbsp'.$los.'</span> 
							</a>
                    </div>';
 
		 
	
 
}
?>
			  </ul> 
		 	 </div>		 
 </div>	
   
   
    

 
		 

   

     
<?php include("../public/footer.php");?>
     