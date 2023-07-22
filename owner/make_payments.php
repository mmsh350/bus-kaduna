<?php
session_start();

include('includes/dbconnection.php');
 
if(isset($_POST['submit']))
{
  $aid=$_SESSION['odmsaid'];
  $fno=$_POST['fno'];
  $amt=$_POST['amt'];
  $ownername=$_POST['ownername'];
  $servicedes=$_POST['servicedes'];
  $fnodetails=$_POST['fnodetails'];
  
  $moredetails = $ownername." FRNO:". $fnodetails;
 
  
  $sql = "INSERT INTO payments (`franchiseno`,`ownerid`, `amount`, `description`, `paytype`,`status`)VALUES ('$fno','$aid','$amt', '$servicedes', '(outward Payment - Card )','out')";
   
				
  
  //get available balance
  $result = $conn->query("select `balance`, `deductions`, `income` from account");                
			$row = $result->fetch_assoc();
			
			$balance = $row['balance'] + $amt;
			$income = $row['income'] + $amt;
			
			
			
  $sql1 = "UPDATE account SET `balance`='$balance', `income` = '$income'";
  $sql2 = "INSERT INTO payment_flow (`rfrom`, `ddescription`, `amount`, `pmethod`, `status`)VALUES ('$moredetails','$servicedes','$amt', '(inward Payment - Card )','in')";  
		
  if ($conn->query($sql) === true){
	  $sql3 = "UPDATE  owner SET pay_status='1' WHERE franchiseno='$fno'";
	   $conn->query($sql3);
	  
	  $conn->query($sql1);
	  $conn->query($sql2);
	  
	  
    echo '<script>alert("Payment has been updated")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
  
    echo "<script type='text/javascript'> document.location ='payment_history.php'; </script>";               
}		
 
?>
<div class="card-body">
  <h4 class="card-title">Make Payments </h4>
  <form class="forms-sample" method="post"  action="make_payments.php" class="form-horizontal">
    <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  owner where owner.id=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['edid']=$row->id;
        ?>        
		<img src="pay.jpg" width="">
		
        <div class="form-group mt-3">
          <label for="exampleInputName1">Card Number</label>
          <input type="text" name="servicename" class="form-control"pattern="[0-9]{16}" title="Only digits"   minlength="16"  maxlength="16" id="servicename" placeholder="Enter Card Number"required>
          <input type="hidden" name="ownername" class="form-control"   id="ownername" value="<?php  echo  $row->ownername;?>" placeholder="Enter Card Number"required>
        </div> 
		
		
        <div class="row">
		
		<div class="col-md-6">
		 <label for="exampleInputName1">Exp.Date</label>
          <input type="text" name="price" class="form-control" minlength="2"  pattern="[0-9]{2}" title="Only digits"  maxlength="2" id="price" placeholder="MM" required>
		  </div>
		  <div class="col-md-6">
		   <label for="exampleInputName1">&nbsp;</label>
          <input type="text" name="price" class="form-control  " id="price"  pattern="[0-9]{2}" title="Only digits"  minlength="2"  maxlength="2" placeholder="YY" required>
        </div>
		</div>
		
		  <div class="form-group mt-3">
          <label for="exampleInputName1">CVV</label>
          <input type="text" name="servicename" class="form-control" id="servicename"  placeholder="e.g 123" pattern="[0-9]{3}" title="Only digits"  minlength="3"  maxlength="3" value=""required>
        </div> 
		
		 <div class="form-group mt-3">
          <label for="exampleInputName1">Amount</label>
          <input type="text" readonly name="amtdesc" class="form-control" id="amtdes" value="&#x20A6; <?php  echo  number_format(($row->fee), 2, '.', ',');?>"required>
          <input type="hidden" readonly name="amt" class="form-control" id="amt" value="<?php  echo  $row->fee;?>"required>
          <input type="hidden" readonly name="fno" class="form-control" id="amt" value="<?php echo $row->franchiseno; ?>"required>
        </div> 
        <div class="form-group">
          <label for="exampleTextarea1">Service Description</label>
		  <?php           $d = $row->franchiseno;
						  
						    if(strlen($d) == 1 )
									  $dd ="KLT/0000".$d;
							   else if(strlen($d) == 2)
								 $dd = "KLT/000".$d ;
							  else if(strlen($d) == 3)
								  $dd = "KLT/00".$d;
							   else if(strlen($d) == 4)
							  $dd = "KLT/0".$d;
							   else
							   $dd ="KLT".$d; ?>
          <textarea class="form-control" readonly name="servicedes" id="servicedes" rows="2" style="line-height: 30px;" required>Registration fee of <?php echo number_format(($row->fee), 2, '.', ','); ?> for Franchise Number:##<?php echo $dd; ?></textarea>
         <input type="hidden" readonly name="fnodetails" class="form-control" id="fnodetails" value="<?php echo $dd; ?>"required>
		</div>
        <?php
        $cnt=$cnt+1;
      }
    } ?>
  <center>  
	<button type="submit" name="submit" class="btn btn-dark btn-fw mr-2">Continue</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</center>
  </form>
</div>