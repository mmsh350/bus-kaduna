<?php
error_reporting(0);
include('includes/checklogin.php');
check_login();
// Code for deleting product from cart
if(isset($_GET['delid']))
{
  $rid=intval($_GET['delid']);
  $sql="delete from owner where id=:rid";
  $query=$dbh->prepare($sql);
  $query->bindParam(':rid',$rid,PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage_service.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
 
  <div class="container-scroller">
    
    <?php @include("includes/header.php");?>
    
    <div class="container-fluid page-body-wrapper">
      
      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Registered Franchise</h5>    
                   
                </div>
                
                <div id="editData" class="modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Make Payments</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update">
                      
                     </div>
                     <div class="modal-footer ">
                      
                    </div>
                    
                  </div>
                  
                </div>
                
              </div>
              
              <div class="card-body table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th>Franchise No</th>
					  <th>Owner Name</th>
                      <th>Vehicle Type</th>
                      <th>Driver Name</th>
					  <th class="text-center">Driver's Phone No.</th>
					  <th class="text-center">Driver's Photo</th>
                      <th class="text-center">Dated Registered</th>
                    </tr>
                  </thead>
               
`				<tbody>
                    <?php
					 $aid=$_SESSION['odmsaid'];
					 
                    $sql="SELECT *from owner where status='1' and pay_status='1'";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {    
                        ?>
                        <tr>
                          <td class="text-center"><?php echo htmlentities($cnt);?></td>
                          <td><?php  
						   $d = $row->franchiseno;
						  
						    if(strlen($d) == 1 )
									  echo htmlentities("KLT/0000".$d);
							   else if(strlen($d) == 2)
								  echo htmlentities("KLT/000".$d);
							  else if(strlen($d) == 3)
								  echo htmlentities("KLT/00".$d);
							   else if(strlen($d) == 4)
							  echo htmlentities("KLT/0".$d);
							   else
							    echo htmlentities("KLT".$d);
						 
						?>
						  </td>
                          <td class="text-left"><?php  echo htmlentities($row->ownername);?></td>
                       
                        
                          <td class=" ">
                            <span class=""><?php $vtype = $row->vtype; 
				   			$result = $conn->query("select name  from vehicletype where id='$vtype'");
							$rowfetch = $result->fetch_assoc();
							
							echo $rowfetch['name'];
							?></span>
                          </td> 
						  
					 
						    <td class=" ">
                            <span class=""><?php $id = $row->id; 
				   			$result = $conn->query("select name,phoneno,photo from driverinfo where ownerid='$id' and franchiseno='$d'");
							$rowfetch = $result->fetch_assoc();
							
							if(!empty($rowfetch['name'])){
								echo $rowfetch['name'];
							}else{echo "Not assigned";}
							
							?></span>
                          </td> 
						     <td class="text-center"><?php   
							 if(!empty($rowfetch['phoneno'])){
								echo $rowfetch['phoneno'];
							}else{echo "Not assigned";}
							 ?></td>
						     <td class="text-center"> 
							 <?php   if(!empty($rowfetch['photo'])){ ?>
							 <a href="<?php  echo "../upload/".htmlentities($rowfetch['photo']);?>" title="preview"> <img src="<?php  echo "../upload/".htmlentities($rowfetch['photo']);?>" width="70%" style="border-radius:50%"/> <br>Expand</a>
							 <?php
							 }else{
								 echo  "Not assigned";
							 }
							 ?>
							 </td>
						  <td class="text-center">
                            <span class=""><?php  echo htmlentities($row->regdate);?></span>
                          </td> 

                        </tr>
                        <?php 
                        $cnt=$cnt+1;
                      }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <?php @include("includes/footer.php");?>
      
    </div>
    
  </div>
  
</div>

<?php @include("includes/foot.php");?>
 

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data',function(){
      var edit_id=$(this).attr('id');
      $.ajax({
        url:"make_payments.php",
        type:"post",
        data:{edit_id:edit_id},
        success:function(data){
          $("#info_update").html(data);
          $("#editData").modal('show');
        }
      });
    });
  });
</script>
</body>
</html>
