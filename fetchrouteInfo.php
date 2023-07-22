<?php 
include('db.php');

             $routeId=$_POST['routeId'];
             $selectedDate=$_POST['selectedDate'];
			 $sdate ="";
             if(empty($routeId || empty( $selectedDate))){
				  $res = 0;
				  echo  json_encode(array("res" => $res ));
			 }
			 
			 else{
				 $date = str_replace('/', '-', $selectedDate);
				 $sdate =   date('Y-m-d', strtotime($date));
	             
   
			 $query = "SELECT * FROM trips where routeid='$routeId' and ddate='$sdate' and status='0'";
			 $result = $conn->query($query);
			 
             $row = $result->fetch_assoc();
			 
			 if ($row  == !'') {
				  $busid =  $row['frno'];
				 //Check for availablity
				  $q2 = "SELECT * FROM reserve where bus='$busid' and date='$sdate'";
				  $res2 = $conn->query($q2);
				  $row2 = $res2->fetch_assoc();
				  
				   if ($row2  == !'') {
					   
					   $q3 = "SELECT sum(seat_reserve) as total_reserve FROM reserve where bus='$busid' and date='$sdate'";
				       $res3 = $conn->query($q3);
				       $row3 = $res3->fetch_assoc();
					   
					   $treserve = $row3['total_reserve'];
				       $aseatno = $row['seats'] - $treserve;
					   
					   if($aseatno <=0 ){
						   //not available
						   echo  json_encode(array("res"=>"2","msg"=>"We are Sorry! No more seat is available for  you!"));
					   }
					   else{
								//available with some sits reserve  
								echo  json_encode(array("res"=>"3","price" => $row['price'], "frno" => $row['frno'], "numseat" => $row['seats'],"aseatno" => $aseatno ));
					   }
					   
				   }
				   else{
					   //Bus not yet reserve
					   echo  json_encode(array("res"=>"3","price" => $row['price'], "frno" => $row['frno'], "numseat" => $row['seats'], "aseatno" =>$row['seats'] ));
				   }
				  
					 
				}
				else{
					
					echo  json_encode(array("res"=>"1","msg"=>"No Trips is schedule for the selected date!"));
				}
			
			 }
			  
		 
 
 
?>