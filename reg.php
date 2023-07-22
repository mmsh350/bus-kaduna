<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php include("includes/title.php");?></title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="css/sweetalert.css">
 <script src="js/sweetalert2@11.js"></script>
      <style>
	 

* {
  margin: 0;
  padding: 0  
}
 
#contact {
  overflow: auto;
}
#contact #form {
  width:810px;
 
}
#contact #form h2 {
  font: 48px 'Bree Serif', Georgia, serif;
}
#contact #form span {
  display:block;
  float:left;
  width:100px;
  padding-top:5px;
  font: 14px/16px'Bree Serif', Georgia, serif;
}
#contact #form input {
  float:left;
  width:255px;
  border:0px;
  color:#F1F1F1;
  padding:10px 10px 10px 30px;
  font: 11px/20px'Open Sans', Verdana, Helvetica, sans-serif;
  margin-bottom:10px;
}
#contact #form textarea {
  float:left;
  border:0px;
  width:255px;
  height:140px;
  padding:10px 10px 10px 30px;
  font: 11px/20px'Open Sans', Verdana, Helvetica, sans-serif;
  color:#F1F1F1;
  resize: none;
}
#contact #form input.name {
  background:#222222 url(img/name.png) no-repeat 10px 8px;
}
#contact #form input.phone {
  background:#222222 url(img/phone.png) no-repeat 10px 8px;
}
#contact #form input.email {
  background:#222222 url(img/email.png) no-repeat 10px 9px;
}
#contact #form input.number {
  background:#222222 url(img/number-blocks.png) no-repeat 10px 9px;
}
#contact #form input.model {
  background:#222222 url(img/letter-i.png) no-repeat 10px 9px;
}
 
#contact #form textarea.message {
  background:#222222 url(img/phone-book.png) no-repeat 10px 8px;
}
#contact #form input.submit {
  cursor: pointer;
  width:135px;
  height:30px;
  float:right;
  padding:0px 0px 5px 0px;
  margin:10px 16px 10px 0px;
  background:#222222;
  color:#F1F1F1;
  font: 14px/16px'Bree Serif', Georgia, serif;
}
#contact #captcha span{
  width: 44px;
}

.upload-btn-wrapper {
  position: Relative;
  overflow: hidden;
  display: inline-block;
   margin-left:0%;
}

.btn-wrapper {
  border: 2px solid #363;
  color:  #000;
  background-color: white;
  padding: 3px 5px;
  border-radius: 8px;
  font-size: 10px;
  font-weight: bold;
  bottom:4px;
  
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  
    
}
 /* The alert message box */
.alert {
  padding: 20px;
  background-color: #000; /* Red */
  color: #fff;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
} 
	  </style>
</head>

<body>
<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="" /></a></h1>
        <ul id="mainnav">
			<li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="routes.php">Routes</a></li>
            <li><a href="location.php">location</a></li>
            <li class="current"><a href="contact.php">Contact Us</a></li>
    	</ul>
	</div>
    <div id="content"><p> 
    	<div id="gallerycontainer" >
		
			<div class="portfolio-area" style="margin:0 auto; padding:110px 20px 10px 20px; width:820px;">	
 <div style="color:#000;padding-bottom:10px;">
 <h3><b>Instructions</b></h3>
 
 <p> - Kindly complete the below Franchise registration form.
 <p> - Upload <b>Evidence of tax payment and Proof of funds </b>as a pdf documents
 <p> - Once Completed a Franchise number will be generated for you keep it safe.
 <p> - If your proposal is approved, you will need the Franchise number to process you payments.
  

 </div>
				  <div class="alert" style="text-align:center">
				  <!--<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>-->
				  FRANCHISE BIO DATA FORM
				</div> 
				<div id="contactleft" style="color:#000; border:2px; border-style: dotted;" style="text-align:center">
					
						<center>
						<div>
							<div id = "preview" class="rounded" style="margin-bottom:10px; margin-top:10px;width:150px; height:150px;">
								<img src="img/upload.jpg"  class="card  shadow-sm img-fluid" id="img2" style="width:150px; height:150px; border-radius: 50%; solid;">
							</div>
						</div>
						
							<div class="upload-btn-wrapper" style="margin-bottom:25px; text-align:center""> 
								<input type="button" class="btn-wrapper" id="bt1" value="UPLOAD PHOTO"> 
								<input accept="image/*" type='file' id="photo" src="" class="form-control"/>
							</div>  
							 </center>

<section id="contact" style="text-align:center">

          <div class="content">
            <div id="form">
              <form   id="register-form" >
                <span>Name</span>
                <input type="text" name="ownername"  class="name required input" placeholder="Enter your name" tabindex=1  />
					 <span>Plate No.</span>
                <input type="text" name="plateno"  class="number required input" placeholder="Enter Plate No." tabindex=5  />
                <span>Email</span>
                <input type="text" name="email" class="email required input" placeholder="Enter your email" tabindex=2   />
				
				 <span>Vehicle Type</span>
                 <div style="float:left;
				  width:255px;
				  border:0px;
				  color:#F1F1F1;
				  padding:10px 10px 10px 30px;
				  font: 11px/20px'Open Sans', Verdana, Helvetica, sans-serif;
				  margin-bottom:10px;">
				<select id="vtype" class="required input" name="vtype" style=" background-color: #000;
				  color: white;
				  padding: 12px;
				  width: 295px;
				  margin-left:-29px;
				  border: none;
				  font-size: 14px;
				  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
				  -webkit-appearance: button;
				  appearance: button;
				  outline: none;" tabindex=6 >
				<option>Choose an Option</option>
				</select>
					<h5  id="fdiv" style="color:red; display:none; font-size:12px; background-color:white; margin-top:5px;">You will have to pay the sum of:<b id="fee"> </b> on approval;</h5>
				</div>
				 <span>Phone No.</span>
                <input type="text" name="phone"  maxlength="11" class="phone required input" placeholder="Enter Phone No." tabindex=3  />
				
				 <span>Vehicle Model</span>
                <input type="text" name="vmodel" class="model" placeholder="Enter Vehicle Model" tabindex=7  />
				
				 <span>Address</span>
                <textarea class="message" name="address" placeholder="Enter your Address"  tabindex=4></textarea>
            
				
				 <span>Chasis No</span>
                <input type="text" name="chasisno"  class="number required input" placeholder="Enter Chasis No."  tabindex=8 />
				
			
				<span>Account Number</span>
                <input type="text" name="acctno"  maxlength="10" class="number required input" placeholder="Enter Account Number"  tabindex=9  />
				
					 <span>Bank Name</span>
                <input type="text" name="bankname"  class="name required input" placeholder="Enter your Account Name"  tabindex=10 />
			
				 <span>BVN Number</span>
                <input type="text" name="bvn" maxlength="11"  class="number required input" placeholder="Enter your BVN No."  tabindex=11 />
				
		
			
				 <span>Next of Kin</span>
                <input type="text" name="nname"  class="name required input" placeholder="Enter Next of Kin Name"  tabindex=12 />
				
				 <span>Phone No.</span>
                <input type="text" name="nphone"  class="phone required input" maxlength="11" placeholder="Enter Next of Kin Phone No."  tabindex=13 />
				 <span>Relationship</span>
                <div style="float:left;
				  width:255px;
				  border:0px;
				  color:#F1F1F1;
				  padding:10px 10px 10px 30px;
				  font: 11px/20px'Open Sans', Verdana, Helvetica, sans-serif;
				  margin-bottom:10px;">
				<select tabindex=14 name="nrel" class="required input" style=" background-color: #000;
				  color: white;
				  padding: 12px;
				  width: 295px;
				  margin-left:-29px;
				  border: none;
				  font-size: 12px;
				  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
				  -webkit-appearance: button;
				  appearance: button;
				  outline: none;">
				<option>Choose an Option</option>
				<option value="Father">Father</option>
				<option value="Mother">Mother</option>
				<option value="Daugther">Daugther</option>
				<option value="Husband">Husband</option>
				<option value="Wife">Wife</option>
				<option value="Sister">Sister</option>
				<option value="Brother">Brother</option>
				<option value="Friend">Friend</option>
				<option value="Relative">Relative</option>
				</select>
				</div>
				
				 <span>Uplaod Documents</span>
                <input type="file" name="docs"  class="name required input" placeholder="Enter Next of Kin Name" tabindex=15 />
				
				 <input  type='hidden' id="picUrl"  name='photo' class="form-control"  />
				 <input  type='hidden' id="fee2"  name='fee' class="form-control"  />
	
					 
                <input type="button" name="submit" id="register" value="Submit Proposal" class="submit" >
               
              </form>
            </div>
      </section>

   		
					 

				</div><br>
				 
               	<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
    

<?php include("includes/footer.php");?>
</div>
<script src="js/jquery-3.1.1.min.js"></script>

 <script src="js/sweetalert.js"></script>
<script>
 jQuery(document).ready(function() {
	   pic = jQuery('<img id = "image" class="shadow-sm" width = "100%" height = "100%" style="border-radius: 50%;"/>');
   jQuery("#photo").change(function(){

        var fd = new FormData();
        var files =  jQuery('#photo')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

          jQuery.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
			  dataType: "json", 
              success: function(response){
				  
				   var len = response.length;
                        for( var i = 0; i<len; i++)
						{
							var res = response[i]['res'];
							var name = response[i]['name'];
						}
                 if(res != 0){
                    jQuery("#img").attr("src",res); 
					pic.appendTo("#preview");
					jQuery("#image").attr("src", res);
                    jQuery(".preview img").show();
					jQuery("#img2").remove(); // Display image element
					jQuery("#picUrl").val(name); // Display image element
					jQuery("#bt1").val("CHANGE PHOTO"); // Display image element
					 
                 }else{
                    alert('Error Uploading file !');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });  
	
	/////another request
	     
        
	  
		 
        $.ajax({    //create an ajax request to get session data 
        type: "POST",
        url: "fetchvtype.php",
        dataType: "json",   //expect json File to be returned  	
		data: {getId:'null'},		
        success: function(response){                    
             var len = response.length;
            
                        $("#vtype").empty();
						$("#vtype").append("<option value=''>"+"Nothing Selected"+"</option>");
                        for( var i = 0; i<len; i++)
						{
                             
                           var id = response[i]['id'];
						   var name = response[i]['name'];
                      
						   $("#vtype").append("<option value='"+id+"'>"+name+"</option>");                            
                                            
                             
                            
                             
                        }
        }

    });
	 
	///on cahnge
	 $("#vtype").change(function(){
		   var getId = $(this).val();
		   
        $.ajax({    //create an ajax request to get session data 
        type: "POST",
        url: "fetchvtype.php",
        dataType: "json",   //expect json File to be returned  
	    data: {getId:getId},		
        success: function(response){       
         		
             
                 if(response['fee'] == '')
                        $("#fdiv").hide();
					
				else{
                        $("#fdiv").show();
                        $("#fee2").val(response['fee']);
						 $("#fee").html(' '+parseInt(response['fee']).toLocaleString('en-US', {
							 style: 'currency',
							  currency: 'NGN',
							}));
				}
                        
        }

    });
	 });
	

//register_shutdown_function
//Add profile Information
	$('#register').click(function(evt) {

		 var isFormValid = true;

    $(".required.input").each(function(){
        if ($.trim($(this).val()).length == 0){
            $(this).addClass("highlight");
            isFormValid = false;
        }
        else{
            $(this).removeClass("highlight");
        }
    });

    if (!isFormValid)
	 
				Swal.fire({
					  icon: 'error',
					  title: 'Required',
					  confirmButtonColor: '#000',
					  confirmButtonText: 'OKAY',
					  text: 'Note All fields required, kindly fill them up. !', 
				})
	else{
			// Stop the button from submitting the form:
			 evt.preventDefault();

			 // Serialize the entire form:
			 var data = new FormData(this.form);
			 $.ajax({
				 url: "register.php",
				 type: "POST",
				 data,
				 processData: false,
				 contentType: false,
				 cache: false,
				 success: function(dataResult) {
					
					 if (dataResult.statusCode == 200) {
						 document.getElementById("register-form").reset();
					  Swal.fire({
							  title: 'Good job!',
							  text: "Application Submitted Successfully! a default password of 12345 has been genereated for you",
							  icon: 'success',
							  showCancelButton: false,
							  confirmButtonColor: '#3085d6',
							  confirmButtonText: 'Proceed'
							}).then((result) => {
							  if (result.isConfirmed) {
								location = "http://localhost/bus/index.php";
							  }
							})
					 } else if (dataResult.statusCode == 201) {
						 Swal.fire({
								  icon: 'info',
								  title: 'System Message',
								  confirmButtonColor: '#000',
								  confirmButtonText: 'OKAY',
								  text: 'Dear Applicant, Our system Detects an existing proposal, kindly proceeds to make payments once approved !', 
						})
					 }
					 else
					 {
						   Swal.fire({
							  icon: 'error',
							  title: 'Error',
							  confirmButtonColor: '#000',
							  confirmButtonText: 'OKAY',
							  text: dataResult.status
							});
					 }


				 },
				 error: function(data) {
				 
					Swal.fire({
							  icon: 'error',
							  title: 'Error',
							  confirmButtonColor: '#000',
							  confirmButtonText: 'OKAY',
							  text: 'Error(502) Error Processing your request, Please contact the administrator!'
							});


				 }
			 });
	}

    return isFormValid;
		
		
		 
			
	});	
	});
</script>
</body>
</html>
