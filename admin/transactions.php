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
      <?php 
					$title ="Transaction Reports";
					$sql="";
					if(isset($_POST['min'])){
						 $min = $_POST['min']; $max = $_POST['max'];
						 
						 $sql="SELECT *from payment_flow where  ddate  BETWEEN '" . $min . "' AND  '" . $max . "'ORDER by id DESC ";
						 $title = "Transaction Reports From: <span style='color:red'>".date("d-m-Y", strtotime($min))."</span> To <span style='color:red'>".date("d-m-Y", strtotime($max))."</span>";
					 }
					 else{
					  $sql="SELECT *from payment_flow";
					  
					  }
					
					
	  ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;"><?php echo $title;?></h5>    
                   
                </div>
                
              
              <div class="card-body table-responsive p-3">
			  
			  <form method="post">
				  <table border="0" cellspacing="5" cellpadding="5">
						<tbody>
							<tr>
								<td>Minimum date:</td>
								<td><input type="date" class="form-control" id="min" name="min"></td>
								<td>Maximum date:</td>
								<td><input type="date" class="form-control" id="max" name="max"></td>
								<td><input type="submit" class="form-control" id="max" name="submit"></td>
							</tr>
						</tbody>
					</table>
			   </form>
	
	
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th>Received From</th>
                      <th width="25%">Description</th>
                      <th class="text-center">(&#x20A6;) Amount</th>
					   <th class="text-center">Pay Method</th>
					   <th class="">(&#x20A6;) Trip Fare</th>
					   <th class="text-center">Deductions</th>
                       <th class="text-center">Dated</th>
                    </tr>
                  </thead>
				<tbody>
                    <?php
                   
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
                          <td><?php echo $row->rfrom; ?></td>
                          <td><?php echo $row->ddescription; ?></td>
                         
                          <td class="text-left"> <?php  echo htmlentities(number_format(($row->amount), 2, '.', ','));?></td>
						 
                          <td class="text-center"><?php 
						   $getLength = substr($row->pmethod,1,7);
						    if($getLength == 'outward'){
						     
						  ?>
							 <span style="font-size:13px"><i class="mdi mdi-arrow-up-bold"> </i> <?php  echo htmlentities(strtoupper($row->pmethod)); }else{
?>								</span>
							
							 <span style="font-size:13px"> <i class="mdi mdi-arrow-down-bold"> </i> <?php  echo htmlentities(strtoupper($row->pmethod)); }?>
							</span>
						  </td>
						   <td><?php  if($row->tfare)
							   echo  htmlentities(number_format(($row->tfare), 2, '.', ',')); else echo"NA"; ?></td>

						   <td><?php  if($row->ddeductions)
							   echo  htmlentities(number_format(($row->ddeductions), 2, '.', ',')); else echo"NA"; ?></td>
                          
                          <td class="">
                            <span class=""><?php echo date("d-m-Y", strtotime($row->ddate)); ?></span>
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
