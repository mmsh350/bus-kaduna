
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM owner WHERE email=:username and password=:password";
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
            $_SESSION['login']=$result->email;
            $_SESSION['permission']=$result->AdminName;
           
        }
        
                    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";                  

                
           
     
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
 
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth p-0">
                <div class="row flex-grow">
                    <div class="col-md-4 p-0">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo" align="center">
                                <img class="img-avatar mb-3" src="assets/images/bg.png" alt=""><br>
                                <h4 class="text-muted mt-4">
                                    Welcome, login using your email and password !
                                </h4>
                            </div>
                            <form role="form" id=""  method="post"  class="">  
                                <div class="form-group first">
                                    <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="Eamil ID" required>
                                </div>
                                <div class="form-group last">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="mt-5"><a href="../" class="btn btn-dark"><i class="mdi mdi-keyboard-backspace"> </i>Back To Main page</a></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 p-0">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="assets/images/images-removebg-preview.png" alt="First slide" >
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="assets/images/1607457409-97-kaduna-state-transport-authority.jpg" alt="Second slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
    <?php @include("includes/foot.php");?>
 
</body>
 
</html>