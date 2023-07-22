<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql ="SELECT * FROM admin WHERE username=:username and password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['odmsaid']=$result->id;
            $_SESSION['login']=$result->username;
            $_SESSION['permission']=$result->AdminName;
           
        }
        
                    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";                  
     
    } else{
        echo "<script>alert('Invalid Details');</script>";
		 echo "<script type='text/javascript'> document.location ='../'; </script>";                  
    }
}
?>
<!DOCTYPE html>
