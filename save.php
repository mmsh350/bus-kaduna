<?php
include('db.php');
function createRandomPassword() {
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}
$confirmation = createRandomPassword();
$fname=$_POST['fname'];
$qty=$_POST['qty'];
$lname=$_POST['lname'];
$busnum=$_POST['busnum'];
$routeid=$_POST['routeid'];
$setnum=$_POST['setnum'];
$sdate=$_POST['sdate'];

				 $date = str_replace('-', '/', $sdate);
				 $ssdate =   date('Y-m-d', strtotime($date));
				 
$contact=$_POST['contact'];
$address=$_POST['address'];
$result = mysqli_query($conn,"SELECT * FROM route WHERE id='$routeid'");
while($row = mysqli_fetch_array($result))
	{
	    $price=$row['price'];
	    $route=$row['route'];
	}
	$payable=$qty*$price;
	
mysqli_query($conn,"INSERT INTO customer (fname, lname, address, contact, bus, transactionum, payable, setnumber,ddate)
VALUES ('$fname', '$lname', '$address', '$contact', '$busnum', '$confirmation','$payable','$setnum','$ssdate')");

mysqli_query($conn,"INSERT INTO reserve (date, bus, seat_reserve, transactionnum, seat)
VALUES ('$ssdate', '$busnum', '$qty', '$confirmation','$setnum')");


//get available balance
  $result = $conn->query("select `balance`, `deductions`, `income` from account");                
			$row1 = $result->fetch_assoc();
			
			$balance = $row1['balance'] + $payable;
			$income = $row1['income'] + $payable;

 $sql1 = "UPDATE account SET `balance`='$balance', `income` = '$income'";
 $conn->query($sql1);
 
							$d = $busnum;
						    if(strlen($d) == 1 )
									  $dd ="KLT/0000".$d;
							   else if(strlen($d) == 2)
								 $dd = "KLT/000".$d ;
							  else if(strlen($d) == 3)
								  $dd = "KLT/00".$d;
							   else if(strlen($d) == 4)
							  $dd = "KLT/0".$d;
							   else
							   $dd ="KLT".$d;
						   
   $moredetails  = "Received from::(".$fname." ".$lname.")";
   $servicedes = "Payment for ticket Fee from ".$route." Bus No:". $dd;
   $sql2 = "INSERT INTO payment_flow (`rfrom`, `ddescription`, `amount`, `pmethod`, `status`)VALUES ('$moredetails','$servicedes','$payable', '(inward Payment - Card )','in')";  
	$conn->query($sql2);
header("location: print.php?id=$confirmation&setnum=$setnum&routeid=$routeid");
?>