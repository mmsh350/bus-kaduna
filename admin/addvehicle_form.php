<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');

    if(isset($_POST['drive'])){
 
  
           $name=$_POST['name'];
           $fee=$_POST['fee'];
           

		$duplicate = mysqli_query($conn, "select *from vehicletype where name='$name' and registrationFee='$fee'");
	 
		if (mysqli_num_rows($duplicate) > 0)
		{
			   echo "<script>alert('Vehicle already exists. try another one');</script>";
		}
  
  else{
 
		 
						
			        $sql = "INSERT INTO vehicletype (name,registrationFee)VALUES ('$name','$fee')";
        
					  if ($conn->query($sql) === true){
				
					  echo "<script>alert('Vehicle Registered successfull.');</script>";
					  }
					  else 
					  {
					  echo "<script>alert('Something went wrong. Please try again');</script>";
				    }
					 
			 

 
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
			  <label for="exampleInputName1">Vehicle Name. <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" id="fullname" placeholder=""   required="required">
               
            </div>
           
        </div>
        <div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Registration Fees. <span class="required">*</span></label>
                <input type="text" class="form-control" name="fee"   pattern="[0-9]+" maxlength="7" required="required">
            </div>
        </div>
		 
        <div class="form-group">
            <input type="submit" value="Add" name="drive"   class="btn btn-info">
        </div>
    </form>
</div>