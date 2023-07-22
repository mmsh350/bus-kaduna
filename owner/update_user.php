
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['saveupdates']))
{
	       $aid=$_SESSION['odmsaid'];
	       $fname=ucwords(strtolower($_POST['fullname']));
           $mobile=$_POST['mobileno'];
           $addr=ucwords(strtolower($_POST['addr']));
           $frno=$_POST['frno'];
           $prephoto=$_POST['prephoto'];
		   $driverid=$_SESSION['editid2'];
		   $dir ="";
		   
		   if (!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name']))
			{
				
					$filename = "../upload/".$prephoto;
					unlink($filename);
					echo $filename;
				
				     addslashes(file_get_contents($_FILES['image']['tmp_name']));
				  	 move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
					 
					 $dir = $_FILES["image"]["name"];	
			}
			else{
				$dir = $prephoto;
			}
		   
		   
		   
		   if(empty($frno)){
			   
				$sql2 = "UPDATE driverinfo SET name='$fname', address='$addr', phoneno='$mobile', photo='$dir' WHERE id='$driverid'";
				
				if ($conn->query($sql2) === true){
						echo '<script>alert("Driver has been updated");  document.location ="userregister.php";</script>';
				}else{
						echo '<script>alert("update failed! try again later")</script>';
				}
			   
		   }
		   else{
			   
			    $sql = "UPDATE driverinfo SET franchiseno='' WHERE ownerId='$aid'";
				$conn->query($sql);
			   
			   	$sql2 = "UPDATE driverinfo SET franchiseno='$frno', name='$fname', address='$addr', phoneno='$mobile', photo='$dir' WHERE id='$driverid'";
				
				if ($conn->query($sql2) === true){
						echo '<script>alert("Driver has been updated");document.location ="userregister.php";</script>';
				}else{
						echo '<script>alert("update failed! try again later")</script>';
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
  <!--<h4 class="card-title">Update User Form </h4>-->
  <form class="forms-sample" method="post"  enctype="multipart/form-data"  class="form-horizontal">
    <?php
	
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  driverinfo where driverinfo.id=:eid";
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
          <label for="exampleInputName1">Full Name. <span class="required">*</span></label>
          <input type="text" name="fullname" class="form-control" id="firstname2" value="<?php  echo $row->name;?>" required>
        </div>
        
        <div class="form-group">
          <label for="exampleInputName1">Mobile No. <span class="required">*</span></label>
          <input type="text" name="mobileno" class="form-control" pattern="[0-9]{11}" title="Only digits 11" minlength="11" maxlength="11" id="phone2" value="<?php  echo $row->phoneno;?>"  required>
          <input type="hidden" name="prephoto" class="form-control"  value="<?php  echo $row->photo;?>"  required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Address. <span class="required">*</span></label>		  
		   <textarea class="form-control" name="addr" id="addr" placeholder="Address" required="required"><?php  echo $row->address;?></textarea>
        </div>
		
            <div class="form-group">
			 <label for="exampleInputName1">Photo. <span class="required">(Select only if you want to change photo)</span></label>
			
                <input type="file"  class="form-control" name="image">
            </div>
        
		
		 <div class="form-group">
          <label for="exampleInputName1">Assign Franchise</label>
		 <?php 
			$aid=$_SESSION['odmsaid'];
			 
			$result = $conn->query("select franchiseno,plateno from owner where id='$aid'");
    
		 
			echo "<select name='frno' class='form-control'>";
                
			while ($row = $result->fetch_assoc()) {
				 $d = $row['franchiseno'];
				 
														if(strlen($d) == 1 )
															$d="KLT/0000".$d;
													   else if(strlen($d) == 2)
														$d="KLT/000".$d;
													  else if(strlen($d) == 3)
														$d="KLT/00".$d;
													   else if(strlen($d) == 4)
													$d="KLT/0".$d;
													   else
														$d="KLT".$d;  
			   $id=  $row['franchiseno'];
			  $name = $d; 
			  echo '<option value=""> Select Franchise</option>'; 
			  echo '<option value="'.htmlspecialchars($id).'">'.htmlspecialchars($name).'</option>';
			}
			echo "</select>";
			 ?>
   
        </div>
		
		
        <?php $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="saveupdates" class="btn btn-dark btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </form>
</div>