<?php
header('Content-type: application/json'); //Json File Header
include('db.php'); //Database connection


$ownername =  test_input(ucwords(strtolower($_POST['ownername'])));
$plateno =  test_input(strtoupper($_POST['plateno']));
//$email =  test_input(strtolower($_POST['email']));
$phone_number =  test_input($_POST['phone']);
$email =  test_input(strtolower($_POST['email']));
$vtype =  test_input($_POST['vtype']);
$vmodel =  test_input(strtoupper($_POST['vmodel']));
$address =  test_input(ucwords(strtolower($_POST['address'])));
$chasisno =  test_input(strtoupper($_POST['chasisno']));
$acctno =  test_input($_POST['acctno']);
$bankname =  test_input(strtoupper($_POST['bankname']));
$bvn =  test_input($_POST['bvn']);
$nname =  test_input(ucwords(strtolower($_POST['nname'])));
$nphone =  test_input($_POST['nphone']);
$nrel =  test_input($_POST['nrel']);
$photo ="";
$fee =  test_input($_POST['fee']);


// Check and Test Data Function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Email Format Validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $emailErr = "Invalid email format, Please provide a valid Email Address";
    echo json_encode(array(
        "status" => $emailErr
    ));
    exit();
}

//Validate Phone Number
if (!validate_phone_number($phone_number) == true) {
	$phoneErr = "Invalid Phone Number format, Please provide a valid Phone Number";
    echo json_encode(array(
        "status" => $phoneErr
    ));
    exit();
	
}

//Validate Phone Number2
if (!validate_phone_number($nphone) == true) {
	$phoneErr = "Invalid Next of kin Phone Number format, Please provide a valid Phone Number";
    echo json_encode(array(
        "status" => $phoneErr
    ));
    exit();
	
}
// validate Phone Number function
function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 11 || strlen($phone_to_check) > 13) {
        return false;
     } else {
       return true;
     }
}
// now you have access to the file being uploaded
//perform the upload operation.
if (!empty($_FILES['docs']['tmp_name']) && file_exists($_FILES['docs']['tmp_name']))
{
    addslashes(file_get_contents($_FILES['docs']['tmp_name']));
    move_uploaded_file($_FILES["docs"]["tmp_name"], "upload/" . $_FILES["docs"]["name"]);
}

$dir = "upload/" . $_FILES["docs"]["name"];

if (empty($_POST["photo"]))
						{
						    $Err = "Passport Photograph is required"; 
							echo json_encode(array("status" => $Err));
							return;	
						}
						else{
							$photo = $_POST['photo'];
						}
		 					
$duplicate = mysqli_query($conn, "select *from owner where email='$email' OR phone ='$phone_number'");
if (mysqli_num_rows($duplicate) > 0)
{
    echo json_encode(array(
        "statusCode" => 201
    ));
}
else
{
			
			 $query = "SELECT max(id) as last_id FROM owner";
			 $result = $conn->query($query);
			 $row = $result->fetch_assoc();
			 
			 $last_id  = $row['last_id'];
			 $pass = md5('12345');
			  
	 $fno = $last_id + 1 ;
	 $sql = "INSERT INTO owner (`franchiseno`,`ownername`, `plateno`, `email`, `password`, `vtype`, `phone`, `vmodel`, `address`, `chasisno`, `acctno`, `bankname`, `bvn`, `nname`, `nrel`, `nphone`, `documents`, `photo`, `fee`)
				VALUES ('$fno','$ownername', '$plateno', '$email','$pass','$vtype', '$phone_number', '$vmodel', '$address', '$chasisno','$acctno', '$bankname',
				'$bvn','$nname','$nrel','$nphone','$dir','$photo','$fee')";

    if ($conn->query($sql) === true)
    {
        echo json_encode(array(
            "statusCode" => 200
        ));

    }
}

?>