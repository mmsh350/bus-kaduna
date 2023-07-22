<?php 
include('db.php');

         $id=$_POST['getId'];
if($id =='null')	{	 
		 
			$data_arr = array(); // Array created
            
			$query = "SELECT * FROM vehicletype";
			$result = $conn->query($query);
            while ($row = $result->fetch_assoc())
			{
			
			  $id = $row['id'];
			  $name = $row['name'];
			  $fee = $row['registrationFee'];
			  $data_arr[] = array(
			                      "id" => $id,
								  "name" => $name,					 
								  "fee" => $fee					 
						          );
     
			}
  echo   json_encode($data_arr);
  
}
else {
	$data_arr = array(); // Array created
            
			$query = "SELECT registrationFee FROM vehicletype where id='$id'";
			$result = $conn->query($query);
			$fee=0;
            while ($row = $result->fetch_assoc())
			{
			
			  
			  $fee = $row['registrationFee'];
			  
				
			}
			echo  json_encode(array("fee" => $fee ));
 
}
?>