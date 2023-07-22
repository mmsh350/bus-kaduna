<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include("includes/title.php");?></title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="history.php">History</a></li>
            <li class="current"><a href="routes.php">Routes</a></li>
            <li><a href="location.php">location</a></li>
            <li><a href="contact.php">Contact Us</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div class="portfolio-area" style="margin:0 auto; padding:140px 20px 20px 20px; width:820px;">	
			<span style="color:#000; font-weight:bold; background-color:#FFC000; text-align:center">Route Table By Zone</span><br>
			
		<table class="table table-striped table-hover caption-top table-sm table-bordered"> 
		 <caption class="text-dark fw-bold"> <i class="fa fa-map-marker "></i> North Central</caption>
						<thead class="bg-warning">
							<tr class="fw-bold">
							<th> SN. </th>
							<th> DESTINATION </th>
							<th> BUS TYPE </th>
							<th> PRICE </th>
							<th> DEPARTURE </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('db.php');
							$result = mysqli_query($conn,"SELECT * FROM route where zone='NC'");
							$count = 1;
							while($row = mysqli_fetch_array($result))
								{
									
									echo '<tr>';
								    echo '<td>'.$count++.'</td>';
									echo '<td>'.$row['route'].'</span></div></td>';
									echo '<td><span style="color: #000000;">'.$row['type'].'</span></td>';
									echo '<td>'.$row['price'].'</span></div></td>';									
									echo '<td>'.$row['time'].'</span></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
					
					 
				 
		<table class="table table-striped table-hover caption-top table-sm table-bordered"> 
				 <caption class="text-dark fw-bold"><i class="fa fa-map-marker "></i> North East</caption>
					<thead class="bg-warning">
							<tr>
							<th> SN. </th>
							<th> DESTINATION </th>
							<th> BUS TYPE </th>
							<th> PRICE </th>
							<th> DEPARTURE </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('db.php');
							$result = mysqli_query($conn,"SELECT * FROM route where zone='NE'");
							$count = 1;
							while($row = mysqli_fetch_array($result))
								{
									echo '<tr>';
								    echo '<td>'.$count++.'</td>';
									echo '<td>'.$row['route'].'</span></div></td>';
									echo '<td><span style="color: #000000;">'.$row['type'].'</span></td>';
									echo '<td>'.$row['price'].'</span></div></td>';									
									echo '<td>'.$row['time'].'</span></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>

	<table class="table table-striped table-hover caption-top table-sm table-bordered"> 
			 <caption class="text-dark fw-bold"><i class="fa fa-map-marker "></i> North West</caption>
					<thead class="bg-warning">
							<tr>
							<th> SN. </th>
							<th> DESTINATION </th>
							<th> BUS TYPE </th>
							<th> PRICE </th>
							<th> DEPARTURE </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('db.php');
							$result = mysqli_query($conn,"SELECT * FROM route where zone='NW'");
							$count = 1;
							while($row = mysqli_fetch_array($result))
								{
									echo '<tr>';
								    echo '<td>'.$count++.'</td>';
									echo '<td>'.$row['route'].'</span></div></td>';
									echo '<td><span style="color: #000000;">'.$row['type'].'</span></td>';
									echo '<td>'.$row['price'].'</span></div></td>';									
									echo '<td>'.$row['time'].'</span></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
			
		<table class="table table-striped table-hover caption-top table-sm table-bordered"> 
			 <caption class="text-dark fw-bold"><i class="fa fa-map-marker "></i> South East</caption>
					<thead class="bg-warning">
							<tr>
							<th> SN. </th>
							<th> DESTINATION </th>
							<th> BUS TYPE </th>
							<th> PRICE </th>
							<th> DEPARTURE </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('db.php');
							$result = mysqli_query($conn,"SELECT * FROM route where zone='SE'");
							$count = 1;
							while($row = mysqli_fetch_array($result))
								{
									echo '<tr>';
								    echo '<td>'.$count++.'</td>';
									echo '<td>'.$row['route'].'</span></div></td>';
									echo '<td><span style="color: #000000;">'.$row['type'].'</span></td>';
									echo '<td>'.$row['price'].'</span></div></td>';									
									echo '<td>'.$row['time'].'</span></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
			
	<table class="table table-striped table-hover caption-top table-sm table-bordered"> 
		 <caption class="text-dark fw-bold"><i class="fa fa-map-marker "></i> South West</caption>
					<thead class="bg-warning">
							<tr>
							<th> SN. </th>
							<th> DESTINATION </th>
							<th> BUS TYPE </th>
							<th> PRICE </th>
							<th> DEPARTURE </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('db.php');
							$result = mysqli_query($conn,"SELECT * FROM route where zone='SW'");
							$count = 1;
							while($row = mysqli_fetch_array($result))
								{
									echo '<tr>';
									echo '<td>'.$count++.'</td>';
									echo '<td>'.$row['route'].'</span></div></td>';
									echo '<td><span style="color: #000000;">'.$row['type'].'</span></td>';
									echo '<td>'.$row['price'].'</span></div></td>';									
									echo '<td>'.$row['time'].'</span></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
					 
			
	<table class="table table-striped table-hover caption-top table-sm table-bordered"> 
		 <caption class="text-dark fw-bold"><i class="fa fa-map-marker "></i> South South</caption>
					<thead class="bg-warning">
							<tr>
							<th> SN. </th>
							<th> DESTINATION </th>
							<th> BUS TYPE </th>
							<th> PRICE </th>
							<th> DEPARTURE </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('db.php');
							$result = mysqli_query($conn,"SELECT * FROM route where zone='SS'");
							$count = 1;
							while($row = mysqli_fetch_array($result))
								{
									echo '<tr>';
									echo '<td>'.$count++.'</td>';
									echo '<td>'.$row['route'].'</span></div></td>';
									echo '<td><span style="color: #000000;">'.$row['type'].'</span></td>';
									echo '<td>'.$row['price'].'</span></div></td>';									
									echo '<td>'.$row['time'].'</span></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
				 
				<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
    
 <?php include("includes/footer.php");?>
</div>
</body>
</html>
