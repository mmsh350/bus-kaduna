<?php
include('includes/checklogin.php');
check_login();
 if(isset($_GET['delid']))
 {
	 
    $rid=intval($_GET['delid']);
	 
     $sql="delete from trips where id='$rid'";
	 
	 
        
	if ($conn->query($sql) === true){
        
		
         echo "<script>alert('Deleted');</script>"; 
         echo "<script>window.location.href = 'trips.php'</script>";
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
                                <h5 class="modal-title" style="float: left;">Scheduled Trips / Payout</h5>    
                                <div class="card-tools" style="float: right;">
                                      
                                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#registeruser" ><i class="fas fa-plus" ></i>New Trip
                                    </button>
                                </div>      
                            </div>
                            
                            <div class="modal fade" id="registeruser">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Trip</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <?php @include("trip_form.php");?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
							
                            <div id="editData" class="modal fade">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Trip info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="info_update">
                                            <?php @include("update_trip.php");?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
							
							 <div id="checkData" class="modal fade">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pay for Trip</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="info_update1">
                                            <?php @include("payout_form.php");?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="card-body table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="">Route </th>
                                            <th class="">Vehicle</th>
                                            <th class="text-center">No. of Seats</th>
                                            <th class="text-center">Price (Per seat)</th>
                                            <th class="text-center">Total Trip Fare</th>
                                            <th class="text-center">Driver Details</th>
                                            <th class="text-center">Trip Status</th>
                                            <th class=" text-center">Departure Date/Time</th>
                                            <th class="text-center" style="width: 13%;">Action</th>
                                        </tr>
                                    </thead>   
									<tbody>                        
                                        <?php
										 $aid=$_SESSION['odmsaid'];
                                        $sql="SELECT * from trips ";
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
                                                     
                                                    <td><?php  echo htmlentities(ucwords($row->routeinfo));?></td>
                                                    <td>
													<?php 
														$d  = $row->frno;
													 
														 if(strlen($d) == 1 )
																  $d = htmlentities("KLT/0000".$d);
														   else if(strlen($d) == 2)
															  $d =htmlentities("KLT/000".$d);
														  else if(strlen($d) == 3)
															  $d =htmlentities("KLT/00".$d);
														   else if(strlen($d) == 4)
														  $d =htmlentities("KLT/0".$d);
														   else
															$d = htmlentities("KLT".$d);
													     echo $d;
													
													?></td>
													  <td class="text-center"><?php  echo htmlentities($row->seats);?></td>
                                                    <td><?php   
													$f = number_format(($row->price), 2, '.', ',');
																		echo "₦".htmlentities($f);
													?></td>
													<td><?php   
													$f = number_format(($row->amount), 2, '.', ',');
																		echo "₦".htmlentities($f);
													?></td>
                                                  
                                                    <td class="text-center"><?php  echo htmlentities($row->driverinfo);?></td>
                                                    
                                                    <?php  
													//get depature date 
													    $frno = $row->frno;
														$result = $conn->query("SELECT date from reserve where bus='$frno'");
														$rowfetch = $result->fetch_assoc();
													
													?>
                                                  
													<td class="text-center">
                                                        <span >
														</span>
														<?php   
																   if($row->status == 0)
																		echo "<span class='badge badge-warning' style='color:black'>Pending </span>";
																	else if($row->status == 1)
																		echo"<span class='badge badge-success' style='color:white'> Completed</span>";
																	else if($row->status == 2)
																		echo"<span class='badge badge-danger' style='color:black'> Cancelled</span>";
																	else 
																		echo"<span class='badge badge-success' style='color:white'> Completed</span>";
																  ?>
                                                    </td>
													  <td class="text-center">
                                                        <span ><?php  
														echo htmlentities(date("d-m-Y", strtotime($row->ddate)))."/".htmlentities($row->time);
														?></span>
                                                    </td>
                                                    <td class="text-center">
                                                   <?php if($row->status == 0){?>
														 <a href="#"  class=" edit_data btn btn-dark rounded" id="<?php echo  ($row->id); ?>" title="Update Trip status"><i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>
                                                         <a href="trips.php?delid=<?php echo ($row->id);?>" onclick="return confirm('Do you really want to Delete ?');" title="Delete Trip" class=" btn btn-danger rounded"><i class="mdi mdi-delete"></i></a>  
													<?php }elseif($row->status == 1){?>
															 <a href="#"  class="check_data btn btn-dark rounded" id="<?php echo  ($row->id); ?>" title="Payout"><i class="mdi mdi-account-check" aria-hidden="true"></i></a>			 
															 <a href="bookings.php?ddate=<?php echo ($rowfetch['date']);?>&bus=<?php echo ($row->frno);?>" title="Show Passengers" class=" btn btn-info rounded"><i class="mdi mdi-eye"></i></a>  
															
													<?php }elseif($row->status == 2){?>
													<a href="#"  class=" edit_data btn btn-dark rounded" id="<?php echo  ($row->id); ?>" title="Update Trip status"><i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i></a>
                                                         <a href="trips.php?delid=<?php echo ($row->id);?>" onclick="return confirm('Do you really want to Delete ?');" title="Delete Trip" class=" btn btn-danger rounded"><i class="mdi mdi-delete"></i></a>  
													<?php }else {?>
													<a href="bookings.php?ddate=<?php echo ($rowfetch['date']);?>&bus=<?php echo ($row->frno);?>" title="Show Passengers" class=" btn btn-info rounded"><i class="mdi mdi-eye"></i></a>  
													<?php }?>
													 </td>
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
                    url:"update_trip.php",
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
			
			 $(document).on('click','.check_data',function()
            {
				 
                var edit_id=$(this).attr('id');
                $.ajax(
                {
                    url:"payout_form.php",
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
                        $("#info_update1").html(data);
                        $("#checkData").modal('show');
                    }

                });
            });
        });
    </script>
</body>
 
</html>
