<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');

      if(isset($_POST['drive'])){
		  
		  $frno=$_POST['frno'];
          $routeinfo=$_POST['routeinfo'];
          $driverinfo=$_POST['driver'];
          $numseats=$_POST['seat'];
          $route=$_POST['route'];
          $time= strtotime($_POST['time']);
          $price=$_POST['price'];
          $amt=$_POST['amt'];
          $ddate=$_POST['ddate'];
		  
		    $time = date ( 'h:i a' , $time );
           	
          $sql = "INSERT INTO trips (`routeid`, `routeinfo`, `frno`, `price`, `ddate`, `driverinfo`, `amount`, `seats`,`time` )
		  VALUES ('$route','$routeinfo','$frno','$price','$ddate','$driverinfo','$amt','$numseats','$time')";
        
					  if ($conn->query($sql) === true){
						$sql = "UPDATE route set status='0' where id='$route'";
						$conn->query($sql);
						echo "<script>alert('Trip Added successfull.');</script>";
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
    <form  method="POST"  name="signup"  enctype="multipart/form-data"  >
       
        <div class="row">
            <div class="form-group col-md-12">
			  <label for="exampleInputName1">Vehicle <span class="required">*</span></label>
			  <?php  $result = mysqli_query($conn,"SELECT * FROM owner where status='1' and pay_status='1'"); ?>
                  <select name="frno" id="frno" class="form-control" id="type" required>
					  <option value="">Choose an option </option>
					  <?php 
							while($row = mysqli_fetch_array($result)){
								$d = $row['franchiseno'];
						  
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
							
							$vtype = $row['vtype']; 
				   			$res2 = $conn->query("select name  from vehicletype where id='$vtype'");
							$rowfetch = $res2->fetch_assoc();
								?>
							   <option value="<?php echo $row['franchiseno'];?>"><?php echo $d."::". $row['plateno']." - ".$row['ownername']."(". $rowfetch['name'] .")"?> </option>';
							<?php
							};
						  ?>
				</select>
							 
            </div>
			
				<div class="form-group col-md-12" id="div1" style="display:none;">  <label for="exampleInputName1">Driver Contact Information <span class="required">*</span></label>
                <input type="text" readonly class="form-control" name="driver" id="driverinfo" required>
            </div>
           
        </div>
		
	
        <div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Route. <span class="required">*</span></label>
                <?php  $result = mysqli_query($conn,"SELECT * FROM route "); ?>
                  <select name="route" id="route" class="form-control" id="type" required>
					  <option value="">Choose an option </option>
					  <?php 
							while($row = mysqli_fetch_array($result)){
								?>
							   <option value="<?php echo $row['id'];?>"><?php echo $row['route']." : ".$row['type'];?> </option>';
							<?php
							};
						  ?>
				</select>
				<input type="hidden" readonly class="form-control" name="routeinfo" id="routeinfo" required="required" /> 
            </div>
			
        </div>  
		<div class="row" id="div2" style="display:none;">
			<div class="form-group col-md-5" >  <label for="exampleInputName1">Price (Per seat)</label>
			<input type="hidden" readonly class="form-control" name="price" id="price" required="required" /> 
				<span id="price1"></p>
            </div>
			<div class="form-group col-md-2">  <label for="exampleInputName1">No. Seats </label>
			<input type="hidden" readonly class="form-control" name="seat" id="seat" required="required" /> 
				 <span id="seat1"></p>
            </div>
			<div class="form-group col-md-5">  <label for="exampleInputName1">Trip Amount </label>
				<input type="hidden" readonly class="form-control" name="amt" id="amt" required="required" /> 
				 
				<span id="amt1"></p>
            </div>
          </div>  
		<div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Departure Date. <span class="required">*</span></label>
                <input type="date" class="form-control" name="ddate"   required="required">
				
				
            </div>
        </div>
	 
		
		<div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Departure Time <span class="required">*</span></label>
                <input type="time" class="form-control" name="time"   required="required">
            </div>
        </div>        
        <div class="form-group">
            <input type="submit" value="Add Trip" name="drive"   class="btn btn-info">
        </div>
    </form>
</div>

<script>
 jQuery(document).ready(function() {
 $("#frno").change(function(){
		   var getId = $(this).val();
		  
		  
        $.ajax({    //create an ajax request to get session data 
        type: "POST",
        url: "fetchowner.php",
        dataType: "json",   //expect json File to be returned  
	    data: {getId:getId},		
        success: function(response){       
         		
        if(response['res'] == 0){
					 $("#div1").hide();
					 $("#driverinfo").val(null);
				}
				else if(response['res'] == 1)
				{
					 alert("This vehicle has not been assign a driver pls do to proceed!."); 
					 $("#frno").val("").change();
				}
				else
				{
					$("#div1").show();
                        $("#driverinfo").val(response['res']);      
				}
                      
                      
				 
                        
        }

    });
	 }); 
	 
	    $("#route").change(function(){
		   var getId = $(this).val();
		   var option =  $("#route option:selected").text();
		    $("#routeinfo").val(option);
		   
        $.ajax({    //create an ajax request to get session data 
        type: "POST",
        url: "fetchroute.php",
        dataType: "json",   //expect json File to be returned  
	    data: {getId:getId},		
        success: function(response){       
         		
        if(response['res'] == 0){
					 $("#div2").hide();
					 $("#routeinfo").val(null);
					 $("#amt").val(null);
				}else{
					$("#div2").show();
                       
						 $("#price1").html(' '+parseInt(response['price']).toLocaleString('en-US', {
							 style: 'currency',
							  currency: 'NGN',
							}));
							
					     $("#price").val(response['price']);
						 
					     $("#seat1").html(response['nos']);
					     $("#seat").val(response['nos']);
						 
					    $("#amt").val(response['amt']); 
					   // $("#bos").val(response['res']); 
					   
					    $("#amt1").html(' '+parseInt(response['amt']).toLocaleString('en-US', {
							 style: 'currency',
							  currency: 'NGN',
							}));
				}
                  
                      
				 
                        
        }

    });
	 });
	 
	 
	 });

</script>