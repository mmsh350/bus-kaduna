<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include("includes/title.php");?></title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<script type="text/javascript" src="xres/js/saslideshow.js"></script>
<script type="text/javascript" src="xres/js/slideshow.js"></script>
<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vallenato/vallenato.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="vallenato/vallenato.css" type="text/css" media="screen" charset="utf-8">
<style>
.btn1 {
    background-color: #4CAF50;
    border: none;
    color: #FFFFFF;
    padding: 15px 32px;
    text-align: center;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    margin: 16px 0 !important;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
}
</style>
		<script type="text/javascript">
		$("#slideshow > div:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#slideshow');
		},  3000);
	</script>
	<!--sa calendar-->	
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		//<![CDATA[

		/*
				A "Reservation Date" example using two datePickers
				--------------------------------------------------

				* Functionality

				1. When the page loads:
						- We clear the value of the two inputs (to clear any values cached by the browser)
						- We set an "onchange" event handler on the startDate input to call the setReservationDates function
				2. When a start date is selected
						- We set the low range of the endDate datePicker to be the start date the user has just selected
						- If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

				* Caveats (aren't there always)

				- This demo has been written for dates that have NOT been split across three inputs

		*/

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
		</script> 
	<style>
		img.logo {
		    left: 216px;
		}
	</style>

</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo"/></a></h1>
        <ul id="mainnav">
			<li class="current"><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="routes.php">Routes</a></li>
            <li><a href="location.php">location</a></li>
            <li><a href="contact.php">Contact Us</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="rotator">
              <ul>
                    <li class="show"><img src="xres/images/jb2/01.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/02.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/04.jpg" width="861" height="379"  alt="" /></li>
					 <li><img src="xres/images/jb2/05.jpg" width="861" height="379"  alt="" /></li>
					  <li><img src="xres/images/jb2/06.jpg" width="861" height="379"  alt="" /></li>
              </ul>
			  
			  <div id="logo" style="left: 600px; height: auto; top: 23px; width: 260px; position: absolute; z-index:4;">
					
					<h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Ticket Booking</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						<form action="selectset.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Select Route: 
						<select name="route" id="routeid" required style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						<option value=""> Choose </option>
						<?php
						include('db.php');
						$result = mysqli_query($conn,"SELECT * FROM route where status='0'");
						while($row = mysqli_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'].'  :'.$row['type'];
								echo '</option>';
							}
						?>
						</select>
						</span><br>
						<span style="margin-right: 11px;">Date: 
						<input type="text" required class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" value="" maxlength="10" readonly="readonly" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						<input type="hidden" required class="" name="busid"  id="busid" value="" readonly="readonly"/>
						</span><br>
						<span style="margin-right: 11px;">No. of Passenger: 
						<select name="qty" id="quantity" class="myselect" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;" required/>
						<option value="">Choose</option>
						</select>
						</span><br><br>
						<input type="submit" id="submit2" value="Next" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
					<h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Admin Login</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						<form action="admin/index.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Username: <input type="text" name="username" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br>
						<span style="margin-right: 11px;">Password: <input type="password" name="password" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br><br>
						<input type="submit" name="login" id="submit" class="medium gray button" value="Login" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
				</div>
        </div>
		
    </div>
    <div id="content" style=" background: none; background-color: #fff;  border-style: dotted ; color:#000; ">
        
            <div class="item" style="padding-left:20px;"  >  
            <h3> Welcome to the Kaduna Line Transportation and Logistics Information Management System </h3><br/>
         <p style="text-align:justify">  Kaduna line limited runs a franchise model of business. Interested individual/company 
(franchisee) are expected to submit a detailed proposal to the company indicating interest in 
transportation business, knowledge of the business and partnering with the company. Attached to 
this proposal includes the following; 
<br><br> 
 
<ol style="margin-left:35px;">
<li>Vehicle Particulars (Originals will be requested for at the HQ Offline)</li>
<li>Proof of funds (Online) </li>
<li>Evidence of tax payment (Online)</li>
<li>A completed Bio Data Form (Online)</li>
<li>A copy of signed Franchise Agreement (Offline)</li>
<li>Car Health Check Result (Offline)</li>
<li>Receipt of payment (registration) - Online</li>
</ol> 

	<div style="text-align:center; padding-top:20px;">
			<button class="btn1" onclick="goto1();" style="border-radius: 12px;  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">Submit a Proposal</button>
			<button class="btn1" onclick="goto2();"  style="border-radius: 12px;  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); background-color:#000">Access Portal</button>
			</div>
</div>
		
			 
       
    </div>

	<?php include("includes/footer.php");?>
</div>
<script>
function goto1(){
	 window.location = 'reg.php';
}
function goto2(){
	 window.location = 'owner';
}
</script>
<script>
 
 jQuery(document).ready(function() {
	  $('#sd').change(function(evt) {
		    		   
		    var routeId =  $("#routeid option:selected").val();
		    selectedDate = $("#sd").val();
			
		   //Get Available Vehicle for route
		   $.ajax({     
				type: "POST",
				url: "fetchrouteInfo.php",
				dataType: "json",    
				data: {routeId,selectedDate},		
				success: function(response){ 
				 $('#quantity').empty().append('<option value="">Choose</option>');
				if(response['res'] == 0){
					alert ('Kindly select Route and date of travel/departure')
				}
				 else if(response['res'] == 1){
					alert (response['msg'])
					$("#routeid").val("").change();
				}
				//Availabilty of seats
				else if(response['res'] == 2){
					alert (response['msg'])
				}
				else if(response['res'] == 3 || response['res'] == 4 ){
					
					//$('#quantity option').remove();
					
					
					 var aseatno = response['aseatno'];
					     
						for (var index = 1; index <= aseatno; index++) {
							$('#quantity').append('<option value="' + index + '">' + index + '</option>');
						}
						$('#busid').val(response['frno'])		
				}
				   
				} 
			});
		
	  });
	  
 });
 

  
</script>
</body>
</html>
