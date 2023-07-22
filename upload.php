<?php
 
$data_arr = array(); // Array created
$name='';
if(isset($_FILES['file']['name'])){

   /* Getting file name */
   $filename = $_FILES['file']['name'];

   /* Location */
   $location = "upload/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
		 $name=$filename;
      }
   }
   
   $data_arr[] = array("res" => $response,"name" => $name,);


// encoding array to json format
echo json_encode($data_arr);
exit;
}

echo 0;