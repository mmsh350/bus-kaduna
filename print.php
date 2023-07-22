<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include("includes/title.php");?></title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo"  /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li class="current"><a href="history.php">History</a></li>
            <li><a href="routes.php">Routes</a></li>
            <li><a href="location.php">location</a></li>
            <li><a href="contact.php">Contact Us</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div class="portfolio-area" style="margin:0 auto; padding:140px 20px 20px 20px; width:820px; color:#000;" >	
					 
					 	<h3 style="color:#000; font-weight:bold; background-color:#FFC000; text-align:center"> Print and present this details upon boarding the bus </h3><br>
					<br>
					 
					 <script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=600, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
   setTimeout(function(){
   	docprint.close()
   },750)
}
</script>


<div id="print_content" style="width: 400px; border-style: dotted; background-color:white; margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;">
<strong>Ticket Reservation Details</strong><br><br>
<?php
include('db.php');
$id=$_GET['id'];
$routeid=$_GET['routeid'];
$setnum=$_GET['setnum'];
$result = mysqli_query($conn,"SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysqli_fetch_array($result))
	{
		echo 'Transaction Number: '.$row['transactionum'].'<br>';
		echo 'Name: '.$row['fname'].' '.$row['lname'].'<br>';
		echo 'Address: '.$row['address'].'<br>';
		echo 'Contact: '.$row['contact'].'<br>';
		
		
		$f = number_format(($row['payable']), 2, '.', ',');
		 
		echo 'Payable: '."₦".htmlentities($f).'<br>';
	}
$results = mysqli_query($conn,"SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysqli_fetch_array($results))
	{
		 
		echo 'Route and Type of Bus: ';
		$resulta = mysqli_query($conn,"SELECT * FROM route WHERE id='$routeid'");
		while($rowa = mysqli_fetch_array($resulta))
			{
			echo $rowa['route'].'     :'.$rowa['type'];
			$time=$rowa['time'];
			}
		echo 'Time of Departure: '.$time;
		echo '<br>';
		echo 'Seat Number: '.$setnum.'<br>';
		echo 'Date Of Travel: '.$rows['date'].'<br>';
		
	}
?><center><a href="javascript:Clickheretoprint()" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Print</a></center>
</div>

					 
				 
					<br>
				<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
    
<?php include("includes/footer.php");?>

</div>
</body>
</html>
