<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');

    if(isset($_POST['pay'])){
 
		   $oid=$_POST['owerid'];
		   $fno=$_POST['fno'];
		   $tfare=$_POST['tfare'];
		   $fullname="Paid to ". $_POST['fullname'];
		   $routeid=  $_SESSION['editid2'];
           
           $amt=$_POST['payable'];
           $tdeduc=$_POST['tdeduc'];
          
           $desc=$_POST['servicedes'];
           $ptype=$_POST['ptype'];
		   
		   $type = "(inward Payment - ".$ptype." )"; 

	$sql = "INSERT INTO payments (`ownerid`, `franchiseno`, `amount`, `description`, `paytype`,`status` )VALUES ('$oid','$fno','$amt', '$desc','$type','in')";
	
	
	//get available balance
  $result = $conn->query("select `balance`, `deductions`, `income` from account");                
			$row = $result->fetch_assoc();
			
			$balance = $row['balance'] - $amt;
			$deductions = $row['deductions'] + $tdeduc;
						
			
			 
  $sql4 = "UPDATE account SET `balance`='$balance', `deductions` = '$deductions'";
  $sql3 = "INSERT INTO payment_flow (`rfrom`, `ddescription`, `amount`, `pmethod`, `status`,`tfare`,`ddeductions`)
  VALUES ('$fullname','$desc','$amt', '(outward Payment - $ptype )','out','$tfare','$tdeduc')";  
		
	
       
					  if ($conn->query($sql) === true){
						   $sql2 = "UPDATE trips SET status='3' WHERE id='$routeid'";
						   $conn->query($sql2);
						   $conn->query($sql3);
						   $conn->query($sql4);
				
					  echo "<script>alert('Payment Record Added Successfully.');  document.location ='trips.php';</script>";
					  }
					  else 
					  {
					  echo "<script>alert('Something went wrong. Please try again');</script>";
				    }
		
	}


?>
 
 <style>
.required{
	color:red;
}
</style>
<div class="card-body">
    <form  method="POST"  name="signup"  >
       <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from trips where trips.id=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['editid2']=$row->id;
		
		$frno= $row->frno;
		
		$query = "SELECT id,ownername FROM owner where franchiseno='$frno'";
			$res = $conn->query($query);
			 
            $rowf = $res->fetch_assoc();
        ?>     
	    <div class="row">
            <div class="form-group col-md-12">
			  <label for="exampleInputName1">Payee <span class="required">*</span></label>
			  <?php 
															$d  = $frno;
													 
														 if(strlen($d) == 1 )
																  $d = htmlentities("KLT/0000".$d);
														   else if(strlen($d) == 2)
															  $d =htmlentities("KLT/000".$d);
														  else if(strlen($d) == 3)
															  $d =htmlentities("KLT/00".$d);
														   else if(strlen($d) == 4)
														  $d =htmlentities("KLT/0".$d);
														   else
															$d = htmlentities("KLT".$d);
			  ?>
                <input type="text" readonly class="form-control" name="fullname"   value="<?php  echo $rowf['ownername']." #".$d;?>"   required="required">
                  <input type="hidden" readonly class="form-control" name="owerid"   value="<?php echo $rowf['id'];?>"   required="required">
				  <input type="hidden" readonly name="fno" class="form-control" value="<?php echo $frno; ?>"required>
            </div>
           
        </div> 
										 
	    <div class="row">
	    <div class="form-group col-md-6 mt-3">
          <label for="exampleInputName1">Total Trip fare</label>
           <span><?php  
						   $f = number_format(($row->amount), 2, '.', ',');
						   echo "₦".htmlentities($f);
		   ?></span>
          <input type="hidden"  name="tfare" class="form-control" id="tfare" value="<?php echo  $row->amount; ?>"required>
        </div>
		
		<div class="form-group col-md-6  mt-3">	
		 <label for="exampleInputName1">Company Fee (20%) inclusive of VAT</label>
		 <span><?php  
		          $cp = 0.2 * $row->amount;
		          $f = number_format(($cp), 2, '.', ',');
				  echo "₦".htmlentities($f);
		   ?>
		 </span>
		  <input type="hidden"  name="cp" class="form-control" id="cp" value="<?php echo  $cp; ?>"required>
        </div> 
        </div> 
		<div class="row">
            <div class="form-group col-md-12">
			  <label for="exampleInputName1">Expenses  <span class="required">* (Fuel, Brake pad etc.)</span></label>
                <input type="text"   class="form-control" name="deduc" id="deduc" placeholder="Enter deductions here"   required="required">
            </div>
        </div> 
		<div class="row">
		<div class="form-group col-md-6  mt-3">	
		 <label for="exampleInputName1" class="text-success">Payable Amount</label>
		 <span id="tamount"><?php  
		         $pamt = $row->amount-$cp;
				 $f = number_format(($pamt), 2, '.', ',');
				  echo "₦".htmlentities($f);
		   ?>
		 </span>
		      <input type="hidden" class="form-control" name="payable" id="payable"   required="required">
        </div>
		
		<div class="form-group col-md-6  mt-3">	
		 <label for="exampleInputName1" class="required">Total Deductions</label>
		 <span id="deductions"><?php  
		         
				 $f = number_format(($cp), 2, '.', ',');
				  echo "₦".htmlentities($f);
		   ?>
		 </span>
		      <input type="hidden" class="form-control" name="tdeduc" id="tdeduc" value="<?php echo $cp;?>"  required="required">
        </div>
		
        </div>
		 <div class="form-group mt-1">
          <label for="exampleInputName1">Payment Type</label>
           <select required name="ptype" class="form-control" id="type">
			  <option value="">Choose</option>
			  <option>Transfer</option>
			  <option>Cash</option>
			  <option>POS/Others</option>
		</select>
        </div> 
		
        <div class="form-group">
          <label for="exampleTextarea1">Service Description</label>
		  
          <textarea readonly class="form-control" name="servicedes" id="servicedes" placeholder="e.g. Monthly Payment (January)" rows="2" style="line-height: 30px;" required>Payment for Trip from #<?php echo htmlentities($row->routeinfo)." on ". htmlentities(date("d-m-Y", strtotime($row->ddate)));?></textarea>
        </div>
		  <?php $cnt=$cnt+1;
      }
    } ?>
        <div class="form-group">
            <input type="submit" value="Pay for Trip" name="pay"   class="btn btn-dark">
        </div>
    </form>
</div>

<script type="text/javascript">
$(document).on("keyup", function() {
 
   let tfare = $("#tfare").val();
   let cpfare = $("#cp").val();
   let total = tfare - cpfare;
   
   let deduc = $("#deduc").val();
   let grandtoltal = 0;
   if(deduc > total){
		grandtoltal = total;
		$("#deduc").val(null);
   }
	else
      grandtoltal = total - deduc;
  
  $("#tamount").html(' '+parseInt(grandtoltal).toLocaleString('en-US', {
							 style: 'currency',
							  currency: 'NGN',
							}));
							
						    $("#payable").val(grandtoltal);
							
							
  
   //let d = $("#tdeduc").val();
   let totalDeduc = tfare - grandtoltal ;
   
	 $("#tdeduc").val(totalDeduc);
     $("#deductions").html(' '+parseInt(totalDeduc).toLocaleString('en-US', {
						 	 style: 'currency',
							   currency: 'NGN',
							 }));


							
						 
						
 
});
</script>