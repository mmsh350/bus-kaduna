<?php
include('includes/checklogin.php');
check_login();
 if(isset($_GET['delid']))
 {
	 
    $rid=intval($_GET['delid']);
	 
     $sql="Update driverinfo set status='0', franchiseno='' where id='$rid'";
	 
	 
        
	if ($conn->query($sql) === true){
          $filename = $_GET['file'];
		if (file_exists($filename)) {
			unlink($filename);
			
		  } else {
			//do nothing
		  }
		
         echo "<script>alert('Driver Deleted');</script>"; 
         echo "<script>window.location.href = 'userregister.php'</script>";
     }else{
         echo '<script>alert("update failed! try again later")</script>';
     }
    
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
                                <h5 class="modal-title" style="float: left;">Registered Drivers</h5>    
                                <div class="card-tools" style="float: right;">
                                      <button type="button" class="btn btn-sm btn-warning text-dark" data-toggle="modal" data-target="#payout" ></i> Payout
                                    </button>
                                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#registeruser" ><i class="fas fa-plus" ></i> Register Driver
                                    </button>
                                </div>      
                            </div>
                            
                            <div class="modal fade" id="registeruser">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">New Driver</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <?php @include("newuser_form.php");?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
							
							  <div class="modal fade" id="payout">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Payout to Driver</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <?php @include("payout_form.php");?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                           
                            
                            
                            <div id="editData" class="modal fade">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Driver info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="info_update">
                                            <?php @include("update_user.php");?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="card-body table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Franchise No</th>
                                            <th class="">Name</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">Mobile number</th>
                                            <th class="text-center">Photo</th>
                                            <th class=" text-center">Date registered</th>
                                            <th class="text-center" style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                   
<tbody>
                                        <?php
										 $aid=$_SESSION['odmsaid'];
                                        $sql="SELECT * from driverinfo where ownerId='$aid' and status='1'";
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
                                                    <td class="text-center"><?php
													
													 $d = $row->franchiseno;
						  
													if(strlen($d) == 0 )
															  echo htmlentities("Not assigned");
													else if(strlen($d) == 1 )
															  echo "<span class='badge badge-success'>KLT/0000".$d."</span>"; 
													   else if(strlen($d) == 2)
														  echo htmlentities("KLT/000".$d);
													  else if(strlen($d) == 3)
														  echo htmlentities("KLT/00".$d);
													   else if(strlen($d) == 4)
													  echo htmlentities("KLT/0".$d);
													   else
														echo htmlentities("KLT".$d);
													
													
													?></td>
                                                    <td><?php  echo htmlentities(ucwords($row->name));?></td>
                                                    <td><?php  echo htmlentities(ucwords($row->address));?></td>
                                                    <td class="text-center"><?php  echo htmlentities($row->phoneno);?></td>
                                                    <td class="text-center">
													
													  <a href="<?php  echo "../upload/".htmlentities($row->photo);?>" title="preview"> <img src="<?php  echo "../upload/".htmlentities($row->photo);?>" width="70%" style="border-radius:50%"/><br>Preview</a>
													</td>
                                                    <td class="text-center">
                                                        <span ><?php  echo htmlentities(date("d-m-Y", strtotime($row->dreg)));?></span>
                                                    </td>
                                                    <td class=" text-center">
                                                        <a href="#"  class=" edit_data btn btn-dark rounded" id="<?php echo  ($row->id); ?>" title="click for edit"><i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>
                                                        <a href="userregister.php?delid=<?php echo ($row->id);?>&file=<?php  echo "../upload/".htmlentities($row->photo);?>" onclick="return confirm('Do you really want to Delete ?');" title="Delete Drive" class=" btn btn-danger rounded"><i class="mdi mdi-delete"></i></a> </td>
                                                    </tr>
                                                    <?php $cnt=$cnt+1;
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
            $(document).on('click','.edit_data',function()
            {
                var edit_id=$(this).attr('id');
                $.ajax(
                {
                    url:"update_user.php",
                    type:"post",
                    data:{edit_id:edit_id},
                    beforeSend: function(){
                        $(".se-pre-con").show();
                    },
                    complete:function(){
                        $(".se-pre-con").hide();
                    },

                    success:function(data)
                    {
                        $("#info_update").html(data);
                        $("#editData").modal('show');
                    }

                });
            });
        });
    </script>
</body>
 
</html>
