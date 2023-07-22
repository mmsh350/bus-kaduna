<?php
error_reporting(1);
include('includes/checklogin.php');
check_login();
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
                  <h5 class="modal-title" style="float: left;">Payment Report</h5>    
                   
                </div>
                
              
              <div class="card-body table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th>Franchise No</th>
                      <th>Amount Paid</th>
                      <th class="text-center">Description</th>
					   <th class="text-center">Payment Type</th>
                      <th class="text-center">Dated</th>
                     
                    </tr>
                  </thead>
               
				<tbody>
                    <?php
					 $aid=$_SESSION['odmsaid'];
					 
                    $sql="SELECT *from payments where ownerid='$aid'";
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
                         
                          <td class="text-left">&#x20A6; <?php  
							 
								echo htmlentities(number_format(($row->amount), 2, '.', ','));
						  
						  ?></td>
						   <td class="text-left"><?php  echo htmlentities($row->description);?></td>
                          <td class="text-center"><?php 
						   $getLength = substr($row->paytype,1,7);
						    if($getLength == 'outward'){
						     
						  ?>
							<i class="mdi mdi-arrow-up-bold"> </i> <?php  echo htmlentities($row->paytype); }else{?>
							
							<i class="mdi mdi-arrow-down-bold"> </i> <?php  echo htmlentities($row->paytype); }?>
						  </td>
                          
                          <td class="text-center">
                            <span class=""><?php echo htmlentities(date($row->date)); ?></span>
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
 

 
</body>
 
</html>
