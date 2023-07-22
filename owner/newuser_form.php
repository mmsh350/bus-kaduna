<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');

    if(isset($_POST['drive'])){
 
  
           $fname = ucwords(strtolower($_POST['fullname']));
           $mobile = $_POST['mobileno'];
           $addr = ucwords(strtolower($_POST['addr']));

		$duplicate = mysqli_query($conn, "select *from driverinfo where phoneno='$mobile'");
	 
		if (mysqli_num_rows($duplicate) > 0)
		{
			   echo "<script>alert('Driver already exists. try another one');</script>";
		}
  
  else{
 
			 $aid=$_SESSION['odmsaid'];
			if (!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name']))
			{
					 addslashes(file_get_contents($_FILES['image']['tmp_name']));
					 move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
					 
					 $dir = $_FILES["image"]["name"];

						
			        $sql = "INSERT INTO driverinfo (ownerId,name,address,phoneno,photo)VALUES ('$aid','$fname',  '$addr', '$mobile','$dir')";
        
					  if ($conn->query($sql) === true){
				
					  echo "<script>alert('Driver Registered successfull.');</script>";
					  }
					  else 
					  {
					  echo "<script>alert('Something went wrong. Please try again');</script>";
				    }
					 
					 
			}
			else{
				
				  echo "<script>alert('Invalid Image. try again');</script>";
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
			  <label for="exampleInputName1">Full Name. <span class="required">*</span></label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder=""   required="required">
               
            </div>
           
        </div>
        <div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Mobile No. <span class="required">*</span></label>
                <input type="text" class="form-control" pattern="[0-9]{11}" title="Only digits 11" minlength="11" name="mobileno"   maxlength="11" required="required">
            </div>
        </div>
		 <div class="row">
           
            <div class="form-group col-md-12">
			   <label for="exampleInputName1">Address. <span class="required">*</span></label>	
                <textarea class="form-control" name="addr" id="addr" placeholder=" " required="required"></textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-12">
			 <label for="exampleInputName1">Photo. <span class="required">*</span></label>
                <input type="file"  class="form-control" name="image"   required="required">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" name="drive"   class="btn btn-info">
        </div>
    </form>
</div>