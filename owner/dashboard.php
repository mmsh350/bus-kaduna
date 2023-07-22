<?php 
include('includes/checklogin.php');

check_login();
  $aid=$_SESSION['odmsaid'];
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
 
  <div class="container-scroller">
    
    <?php @include("includes/header.php");?>
    
    <div class="container-fluid page-body-wrapper">
      
      
      <div class="main-panel"><br>
 
        <div class="content-wrapper">

          <div class="row" >
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white"style="height: 130px;">
                <div class="card-body" >
                  <h4 class="font-weight-normal mb-3">Total Franchise
                  </h4>
                  <?php 
                   $sql ="SELECT franchiseno from owner where id='$aid' ";
                   $query = $dbh -> prepare($sql);
                   $query->execute();
                   $results=$query->fetchAll(PDO::FETCH_OBJ);
                   $totalnewbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalnewbooking);?></h2>
                </div>
              </div>
            </div>

            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3"> Funds Received
                  </h4>
                  <?php 
                   	$result = mysqli_query($conn,"SELECT SUM(amount) as amt1 FROM payments where ownerid='$aid' and status='in'");
						 $row = mysqli_fetch_array($result);
                    
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities(number_format(($row['amt1']), 2, '.', ','));?></h2>
				    <h2 class="mb-5" id="ramt"><?php echo htmlentities($row['amt1']);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-primary  card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Drivers
                  </h4>
                  <?php 
                  $sql ="SELECT franchiseno from  driverinfo  where ownerid='$aid' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalcanbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalcanbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Expenses
                  </h4>
                  <?php 
                    
					 	$result = mysqli_query($conn,"SELECT SUM(amount) as amt FROM payments where ownerid='$aid' and status='out'");
						 $row = mysqli_fetch_array($result);
                    
                  ?>
                  <h2 class="mb-5" i ><?php echo htmlentities(number_format(($row['amt']), 2, '.', ','));?></h2>
                  <h2 class="mb-5" id="eamt"><?php echo htmlentities($row['amt']);?></h2>
                </div>
              </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
               <div id="piechart" style="width:100%; height: 300px;"></div>
            </div>
                     <div class="col-lg-12 grid-margin stretch-card">
             
      </div>
          </div>
        </div>
        
        
        <?php @include("includes/footer.php");?>
        
      </div>
      
    </div>
    
  </div>
  
  <?php @include("includes/foot.php");?>
 
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
		let eamt = parseInt(document.getElementById("eamt").innerHTML);
		let ramt =  parseInt(document.getElementById("ramt").innerHTML);
		 
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Funds Recieved', 'Hours per Day'],
           ['Funds Recieved',      ramt],
		   ['Expenses',     eamt],
         
        ]);

        var options = {
          title: 'Franchise Statistics'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>
 
</html>


