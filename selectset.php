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
					 
					 	<h3 style="color:#000; font-weight:bold; background-color:#FFC000; text-align:center"> Booking  </h3><br>
						<center><span>Enter your Information Below</span></center>
					<br>
					 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<style>
body{
font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:400px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
border:solid 2px #b7ddf2;
background:#ebf4fb;
}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}
#stylized button{
clear:both;
margin-left:150px;
width:125px;
height:31px;
background:#666666 url(img/button.png) no-repeat;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
}
</style>
<?php
include('db.php');
$busnum=$_POST['busid'];
$routeid=$_POST['route'];
$selectedDate=$_POST['date'];
$qty=$_POST['qty'];

				 $date = str_replace('/', '-', $selectedDate);
				 $sdate =   date('Y-m-d', strtotime($date));
				 
$result = mysqli_query($conn,"SELECT * FROM route WHERE id='$routeid'");
while($row = mysqli_fetch_array($result))
	{
		$numofseats=$row['numseats'];
		$query = mysqli_query($conn,"SELECT sum(seat_reserve) FROM reserve where date = '$sdate' and bus='$busnum'");
							while($rows = mysqli_fetch_array($query))
							  {
							    $inogbuwin=$rows['sum(seat_reserve)'];
							  }
		$avail=$numofseats-$inogbuwin;
		$setnum=$inogbuwin+1;
	}
?>
<?php
if ($avail < $qty){
echo 'Qty reserve exced the available seat of the bus';
}
else if($avail > 0)
{
?>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["form"]["fname"].value;
if (x==null || x=="")
  {
  alert("First Name must be filled out");
  return false;
  }
var y=document.forms["form"]["lname"].value;
if (y==null || y=="")
  {
  alert("Last Name must be filled out");
  return false;
  }
var a=document.forms["form"]["address"].value;
if (a==null || a=="")
  {
  alert("Address must be filled out");
  return false;
  }
var b=document.forms["form"]["contact"].value;
if (b==null || b=="")
  {
  alert("Contact Number must be filled out");
  return false;
  }

}
</script>
<div id="stylized" class="myform">

<form id="form" name="form" action="save.php" method="post"  onsubmit="return validateForm()">
<input type="hidden" value="<?php echo $routeid ?>" name="routeid" />
<input type="hidden" value="<?php echo $busnum ?>" name="busnum" />
<input type="hidden" value="<?php echo $sdate ?>" name="sdate" />
<input type="hidden" value="<?php echo $qty ?>" name="qty" />
<label>Seat Number
<span class="small">Auto Generated <a rel="facebox" href="seatlocation.php?id=<?php echo $routeid; ?>">view seat</a></span>
</label>
<input type="text" name="setnum" value="
<?php
$N = $qty;
for($i=0; $i < $N; $i++)
{
echo $i+$setnum.', ';
} 
 ?>
" id="name" readonly/><br>
<label>First Name
<span class="small">Enter first name</span>
</label>
<input type="text" name="fname"  id="name"/><br>
<label>Last Name
<span class="small">Enter last name</span>
</label>
<input type="text" name="lname"  id="name"/><br>
<label>Address
<span class="small">Enter Address</span>
</label>
<input type="text" name="address"  id="name"/><br>
<label>Contact
<span class="small">Enter Contact Number</span>
</label>
<input type="text" name="contact"  id="name"/><br>
<button type="submit">Confirm</button>
</form>
</div>
<?php
}
else if($avail <= 0)
{
echo 'no available sets';
}
?>
					 
					 
				 
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
