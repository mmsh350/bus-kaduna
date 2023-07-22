<?php 
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
                   	$result = mysqli_query($conn,"SELECT *FROM account");
						 $row = mysqli_fetch_array($result);
                    
                  ?>
                   <h2 class="mb-5"  hidden id="bal"><?php echo htmlentities($row['balance']);?></h2>
                   <h2 class="mb-5"  hidden id="ded"><?php echo htmlentities($row['deductions']);?></h2>
                   <h2 class="mb-5"  hidden id="income"><?php echo htmlentities($row['income']);?></h2>
      
      <div class="main-panel"><br>
        <div class="content-wrapper">

          <div class="row" >
            <div class="col-md-6">
              <div class="row">
             <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white"style="height: 130px;">
                <div class="card-body" >
                  <h4 class="font-weight-normal mb-3">Income
                  </h4>
                  <h2 class="mb-5">&#x20A6;<?php echo htmlentities(number_format(($row['income'])));?></h2>
                </div>
              </div>
            </div>
			
			 <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-warning card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Expenditure
                  </h4>
                  <h2 class="mb-5">&#x20A6; <?php echo htmlentities(number_format(($row['deductions'])));?></h2>
                </div>
              </div>
            </div>
			

            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Current Balance
                  </h4>
                  <h2 class="mb-5">&#x20A6;<?php echo htmlentities(number_format(($row['balance'])));?></h2>
                </div>
              </div>
            </div>

			<div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-dark card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3"> Franchise
                  </h4>
                    <?php 
                  $sql ="SELECT *from  owner ";
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
              <div class="card bg-gradient-secondary card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3"> Trips
                  </h4>
                    <?php 
                  $sql ="SELECT *from  trips ";
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
              <div class="card bg-gradient-primary  card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Vehicle Type
                  </h4>
                  <?php 
                  $sql ="SELECT *from  vehicletype ";
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
                  <h4 class="font-weight-normal mb-3">Routes
                  </h4>
                 <?php 
                  $sql ="SELECT *from  route ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalcanbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalcanbooking);?></h2>
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
		let income =   parseInt(document.getElementById("income").innerHTML) ;
		 let ded =  parseInt(document.getElementById("ded").innerHTML);
	     let balance =  parseInt(document.getElementById("bal").innerHTML);
		 
		 
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Balance', 'Hours per Day'],
          ['Income',     income],
          ['Expenditure',      ded],
          ['Balance',      balance],
         
        ]);

        var options = {
          title: 'Statistics View (Funds Inflow)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>
 
</html>


