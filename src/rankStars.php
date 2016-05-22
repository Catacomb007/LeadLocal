<?php session_start()?>

     <?php
						 require_once('DBConnector.php');
						$db = DBConnector::getInstance();
				
						$sql="SELECT * FROM task WHERE id=$id";
						$result=$db->query($sql);
						$star_los=$_SESSION['los'];
						
						
						
		
					
?> 

	
	
			
			<?php for($i=0;$i<$star_los;$i++){
			echo '<i class="fa fa-2x fa-star" style=" color:#898D9A;"></i>';
						
			 }?>
			
	
