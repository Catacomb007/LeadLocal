<?php session_start()?>

     <?php
						 require_once('DBConnector.php');
						$db = DBConnector::getInstance();
				
						$sql="SELECT * FROM task WHERE id=$id";
						$result=$db->query($sql);
						$star_los=$_SESSION['los'];
						
						
						
		
					
?> 

	
	
			
			<?php for($i=0;$i<$star_los;$i++){
			echo '<img  src="../public/img/32X32_png/star.png" alt="star" height="20" width="20">';
			 }?>
			
	
