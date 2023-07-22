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
					$title ="All Passenger Reports";
					if(isset($_GET['ddate'])){
						 $busid = $_GET['bus']; $deptDate = $_GET['ddate'];
						 
													  $d  = $busid;
													 
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
													      
						 
						 $sql="SELECT *from customer where bus='$busid' and ddate='$deptDate'";
						 $title = "Passenger Reports for Bus No: <span style='color:red'>".$d."</span> Departed on <span style='color:red'>".date("d-m-Y", strtotime($deptDate))."</span>";
					 }
					 else{
					 $sql="SELECT *from customer";}
					
					
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
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
					  <th>Transaction No.</th>
                      <th>Passenger Name</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Bus</th>
                       <th class=" ">Amount(&#x20A6;)</th>
					   <th class="text-center">Seat Numbers</th>
					   
                       <th class="text-center">Booked on</th>
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
                          <td class=""><?php echo strtoupper($row->transactionum);?></td>
                          <td><?php echo ucwords(strtolower($row->fname." ".$row->lname)); ?></td>
                          <td><?php echo $row->contact; ?></td>
                          <td><?php echo ucwords(strtolower($row->address)); ?></td>
                          <td><?php 
						   $d  = $row->bus; 
													 
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
                         
                          <td class="text-left"> <?php  echo htmlentities(number_format(($row->payable), 2, '.', ','));?></td>                          
                          <td class="text-center">
                            <span class=""><?php echo htmlentities(date($row->setnumber)); ?></span>
                          </td>
                          <td class="text-center">
                            <span class=""><?php echo htmlentities(date("d-m-Y", strtotime($row->date))); ?></span>
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
