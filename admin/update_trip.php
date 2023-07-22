<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['saveupdates']))
{
          $action=$_POST['action'];
          $routeid=$_POST['routeid'];
		  $id=$_SESSION['editid2'];
		   
		   $sql2 = "UPDATE trips SET status='$action' WHERE id='$id'";
				
				if ($conn->query($sql2) === true){
					 $sql3 = "UPDATE route SET status='$action' WHERE id='$routeid'";
					 $conn->query($sql3);
						echo '<script>alert("Trip has been updated");  document.location ="trips.php";</script>';
						
						
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
        ?>        
           
     
		 <div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Update Trip <span class="required">*</span></label>
                 <select name="action" class="form-control" id="type" required>
			  <option value="">Choose an option </option>
			  <option value="1">Completed</option>
			   <option value="0" >Pending</option>			 
			  <option value="2" >Cancelled</option>			  
			 
				</select>
				<input type="hidden" name="routeid" value="<?php echo $row->routeid; ?>">
            </div>
        </div>		
        <?php $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="saveupdates" class="btn btn-dark btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </form>
</div>