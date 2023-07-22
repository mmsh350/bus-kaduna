<?php
session_start();

include('includes/dbconnection.php');
 
if(isset($_POST['submit']))
{
  
  $aid=$_POST['eid'];
  $fno=$_POST['action'];
  
  	
  
	  $sql = "UPDATE  owner SET status='$fno' WHERE id='$aid'";
	if ($conn->query($sql) === true){
    echo '<script>alert("Update Succesful")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
  
    echo "<script type='text/javascript'> document.location ='manage_proposal.php'; </script>";               
}		
 
?>
<div class="card-body">
   
 
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
		
		<table class=" table "  style="width:50%">
        <thead>
            <tr class="">
                <th></th>
                <th></th>
                <th colspan="3"><center>Passport Photograph</center> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> </td>
                <td> </td>
                <td> 
				  <center><a href="<?php  echo "../upload/".htmlentities($row->photo);?>" title="preview"> <img src="<?php  echo "../upload/".htmlentities($row->photo);?>" height="100%" style="width:20%; height:20%; border-radius:50%" /> <br/> Click to expand</a></center>
				</td> 
            </tr>
			
        </tbody>
    </table>
		<table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th colspan="2">Personal Information</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Full Name</td>
                <td><?php echo $row->ownername; ?></td>
            </tr>
			<tr>
                <td>Email Address</td>
                <td><?php echo $row->email; ?></td> 
            </tr>
			 
			<tr>
                <td>Phone no.</td>
                <td><?php echo $row->phone; ?></td> 
            </tr>
			<tr>
                <td>Address</td>
                <td><?php echo $row->address; ?></td> 
            </tr>
			<tr>
                <td>BVN</td>
                <td><?php echo $row->bvn; ?></td> 
            </tr>
			<tr>
                <td>Bank Name</td>
                <td><?php echo $row->bankname; ?></td> 
            </tr>
			<tr>
                <td>Account Number</td>
                <td><?php echo $row->acctno; ?></td> 
            </tr>
			 
        </tbody>
    </table>
	<br/>
	<table class="table table-striped table-bordered pt-5" style="width:100%">
        <thead>
            <tr class="">
                <th colspan="2">Vehicle Information</th>
            </tr>
        </thead>
        <tbody>
			<tr>
                <td>Vehicle Type</td>
                <td>
				<?php $vtype = $row->vtype; 
				   			$result = $conn->query("select name  from vehicletype where id='$vtype'");
							$rowfetch = $result->fetch_assoc();
							
							echo $rowfetch['name'];
				?>
				
				</td> 
            </tr>
            <tr>
                <td>Plate Number</td>
                <td><?php echo $row->plateno; ?></td>
                
            </tr>
			
			<tr>
                <td>Vehicle Model</td>
                <td><?php echo $row->vmodel; ?></td> 
            </tr>
			<tr>
                <td>Chasis No.</td>
                <td><?php echo $row->chasisno; ?></td> 
            </tr>
			 
        </tbody>
    </table>
		
		<br/>
	<table class="table table-striped table-bordered pt-5" style="width:100%">
        <thead>
            <tr class="">
                <th colspan="2">Next of Kin Information</th>
            </tr>
        </thead>
        <tbody>
			<tr>
                <td>Next of Kin Name</td>
                <td><?php echo $row->nname; ?></td> 
            </tr>
            <tr>
                <td>Next of Kin Phone</td>
                <td><?php echo $row->nphone; ?></td> 
            </tr> <tr>
                <td>Relationship</td>
                <td><?php echo $row->nrel; ?></td> 
            </tr>
			
        </tbody>
    </table>
	<br/>
	<table class="table table-striped table-bordered pt-5" style="width:100%">
        <thead>
            <tr class="">
                <th colspan="2">Required Documents </th>
            </tr>
        </thead>
        <tbody>
			<tr>
                <td>Documents</td>
                <td> 
				 <a href="<?php  echo "../".htmlentities($row->documents);?>" title="preview"><img src="../images/file.png">Click to preview </a>
				</td> 
            </tr>
           
        </tbody>
    </table>
		
	
        <?php
        $cnt=$cnt+1;
      }
    } ?>
	 <form class="forms-sample" method="POST" action="update_proposal.php"  class="form-horizontal">
	<br>
  <center> 
	 <div class="form-group mt-3">
          <label for="exampleInputName1">Action</label>
		  <input type="hidden" name="eid" value="<?php echo $_SESSION['edid'];?>"/>
           <select name="action" class="form-control" id="type" required>
			  <option value="">Choose an option </option>
			  <option value="1">Approve</option>
			  <option value="2">Reject</option>
		</select>
        </div> 
	<button type="submit" name="submit" class="btn btn-dark btn-fw mr-2">Continue</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	</center>
  </form>
</div>