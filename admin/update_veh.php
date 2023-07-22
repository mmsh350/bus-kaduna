
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['saveupdates']))
{
	
	       $name=$_POST['name'];
           $regfee=$_POST['regfee'];
           
		   $vid=$_SESSION['editid2'];
		   $dir ="";
		   
		  
		   
			   
				$sql2 = "UPDATE vehicletype SET name='$name', registrationFee='$regfee' WHERE id='$vid'";
				
				if ($conn->query($sql2) === true){
						echo '<script>alert("Vehicle has been updated");  document.location ="vehicle.php";</script>';
				}else{
						echo '<script>alert("update failed! try again later")</script>';
				}
}
?>
<style>
.required{
	color:red;
}
</style>
<div class="card-body">
  <!--<h4 class="card-title">Update User Form </h4>-->
  <form class="forms-sample" method="post"  enctype="multipart/form-data"  class="form-horizontal">
    <?php
	
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  vehicletype where vehicletype.id=:eid";
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
        ?>        
        <div class="form-group">
          <label for="exampleInputName1">Vehicle Name. <span class="required">*</span></label>
          <input type="text" name="name" class="form-control" id="firstname2" value="<?php  echo $row->name;?>" required>
          <input type="hidden" name="vid" class="form-control" id="firstname2" value="<?php  echo  $_SESSION['editid2'];?>" required>
        </div>
        
        <div class="form-group">
          <label for="exampleInputName1">Registration Fees <span class="required">*</span></label>
           <input type="text" name="regfee" pattern="[0-9]+" maxlength="7" class="form-control" id="firstname2" value="<?php  echo $row->registrationFee;?>" required>
        </div>
		
		
        <?php $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="saveupdates" class="btn btn-dark btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </form>
</div>