<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['saveupdates']))
{
	
	      $route=$_POST['route'];
          $price=$_POST['price'];
          $numseats=$_POST['numseats'];
          $type=$_POST['type'];
          $time=$_POST['time'];
          $zone=$_POST['zone'];
		  $driverid=$_SESSION['editid2'];
		   
		   $sql2 = "UPDATE route SET route='$route', price='$price', numseats='$numseats', type='$type', time='$time', zone='$zone' WHERE id='$driverid'";
				
				if ($conn->query($sql2) === true){
						echo '<script>alert("Route has been updated");  document.location ="userregister.php";</script>';
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
    $sql="SELECT * from  route where route.id=:eid";
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
            <div class="form-group col-md-12">
			  <label for="exampleInputName1">Route. <span class="required">* e.g Kano - Lagos</span></label>
                <input type="text" class="form-control" name="route" id="fullname" value="<?php echo $row->route;?>"   required="required">
               
            </div>
           
        </div>
        <div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Price. <span class="required">*</span></label>
                <input type="text" class="form-control" pattern="[0-9]+" maxlength="7"  name="price" value="<?php echo $row->price;?>"  required="required">
            </div>
        </div>  
		<div class="row">
           
            <div class="form-group col-md-12">  <label for="exampleInputName1">Number of Seats. <span class="required">*</span></label>
                <input type="text" class="form-control" name="numseats"  pattern="[0-9]+" maxlength="2"  value="<?php echo $row->numseats;?>" required="required">
            </div>
        </div>
		<div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Type <span class="required">*</span></label>
              <select style="backgroud-color:#eee;" name="type" class="form-control" id="type" required>
			  <option value="">Choose an option </option>
			  <option <?php if($row->type == 'Deluxe') echo "selected='selected'";?>>Deluxe</option>
			  <option <?php if($row->type == 'Air Con') echo "selected='selected'";?> >Air Con</option>
			  <option <?php if($row->type == 'Economy') echo "selected='selected'";?>>Economy</option>
		</select>
            </div>
        </div>
		
		<div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Departure Time <span class="required">*</span></label>
                <input type="time" class="form-control" name="time"   value="<?php echo $row->time;?>"  required="required">
            </div>
        </div>
		 <div class="row">
            <div class="form-group col-md-12">  <label for="exampleInputName1">Zone <span class="required">*</span></label>
                 <select name="zone" class="form-control" id="type" required>
			  <option value="">Choose an option </option>
			  <option <?php if($row->zone == 'NC') echo "selected='selected'";?> value="NC">North Central</option>
			  <option <?php if($row->zone == 'NW') echo "selected='selected'";?> value="NW">North West</option>
			  <option <?php if($row->zone == 'NE') echo "selected='selected'";?> value="NE">North East</option>
			  <option <?php if($row->zone == 'SS') echo "selected='selected'";?> value="SS">South South</option>
			  <option <?php if($row->zone == 'SE') echo "selected='selected'";?> value="SE">South East</option>
			  <option <?php if($row->zone == 'SW') echo "selected='selected'";?> value="SW">South West</option>
			  
		</select>
            </div>
        </div>		
        <?php $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="saveupdates" class="btn btn-dark btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </form>
</div>