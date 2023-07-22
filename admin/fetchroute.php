<?php 
include('../db.php');

             $id=$_POST['getId'];
             if(empty($id)){
				  $res = 0;
				  echo  json_encode(array("res" => $res ));
			 }
			 
			 else{
	                   
			$query = "SELECT numseats, price FROM route where id='$id'";
			$result = $conn->query($query);
			 
            $row = $result->fetch_assoc();
			  $price = $row['price'];
			  $numseats = $row['numseats'];
			  $res1 =  $price;
			  $res2 =  $numseats;
			  $amt = $res1 * $res2;
			  echo  json_encode(array("price" => $res1, "amt" => $amt, "nos" => $numseats ));
			 }
			  
		 
 
 
?>