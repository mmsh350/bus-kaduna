<?php 
include('../db.php');

             $id=$_POST['getId'];
             if(empty($id)){
				  $res = 0;
				  echo  json_encode(array("res" => $res ));
			 }
			 
			 else{
	                   
			$query = "SELECT name, phoneno FROM driverinfo where franchiseno='$id'";
			$result = $conn->query($query);
			 
            $row = $result->fetch_assoc();
			 
			if ($row && $row["name"] == !'') {
			 
					$res = $row['name']." - ".$row['phoneno'];
					echo  json_encode(array("res" => $res ));
			}
			else{
					$res = 1;
					echo  json_encode(array("res" => $res ));
				}
			 }
			  
		 
 
 
?>