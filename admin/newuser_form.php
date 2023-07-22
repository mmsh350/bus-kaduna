<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');

      if(isset($_POST['drive'])){
		  
		  $route=$_POST['route'];
          $price=$_POST['price'];
          $numseats=$_POST['numseats'];
          $type=$_POST['type'];
          $time=$_POST['time'];
          $zone=$_POST['zone'];
           	
          $sql = "INSERT INTO route (`route`, `price`, `numseats`, `type`, `time`, `zone`)VALUES ('$route','$price','$numseats','$type','$time','$zone')";
        
					  if ($conn->query($sql) === true){
				
					  echo "<script>alert('Route Added successfull.');</script>";
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
			  <label for="exampleInputName1">Route. <span class="required">* e.g Kano - Lagos (Hummer Bus)</span></label>
                <input type="text" class="form-control" name="route" id="fullname" placeholder=""   required="required">
               
            </div>
           
        </div>
        <div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Price (per seat). <span class="required">*</span></label>
                <input type="text" class="form-control" pattern="[0-9]+" maxlength="7" name="price"   required="required">
            </div>
        </div>  
		<div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Number of Seats. <span class="required">*</span></label>
                <input type="text" class="form-control" pattern="[0-9]+" maxlength="2" name="numseats"   required="required">
            </div>
        </div>
		<div class="row">
        <div class="form-group col-md-12">  <label for="exampleInputName1">Type <span class="required">*</span></label>
				<select name="type" class="form-control" id="type" required>
					  <option value="">Choose an option </option>
					  <option>Deluxe</option>
					  <option>Air Con</option>
					  <option>Economy</option>
				</select>
        </div>
        </div>
		
		<div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Departure Time <span class="required">*</span></label>
                <input type="time" class="form-control" name="time"   required="required">
            </div>
        </div>
		 <div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Zone <span class="required">*</span></label>
                 <select name="zone" class="form-control" id="type" required>
			  <option value="">Choose an option </option>
			  <option value="NC">North Central</option>
			  <option value="NW">North West</option>
			  <option value="NE">North East</option>
			  <option value="SS">South South</option>
			  <option value="SE">South East</option>
			  <option value="SW">South West</option>
			  
		</select>
            </div>
        </div>
        
        
        <div class="form-group">
            <input type="submit" value="Add Route" name="drive"   class="btn btn-info">
        </div>
    </form>
</div>