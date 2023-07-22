<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if (strlen($_SESSION['odmsaid']==0)) 
{
  header('location:logout.php');
} else{
$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
  $adminid=$_SESSION['odmsaid'];
  $productname=$_POST['productName'];
  $productimage1=$_FILES["productimage1"]["name"];
  move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../upload/".$_FILES["productimage1"]["name"]);
  $sql="update  owner set photo=:productimage1 where id=:aid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':productimage1',$productimage1,PDO::PARAM_STR);
  $query->bindParam(':aid',$pid,PDO::PARAM_STR);
  $query->execute();
  $_SESSION['msg']="profile Image Updated Successfully !!";
  }
  ?>

<!DOCTYPE html>
<html lang="en">
  <?php @include("includes/head.php");?>
  <body>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
    <div class="container-scroller">
      
     <?php @include("includes/header.php");?>
      
      <div class="container-fluid page-body-wrapper">
        
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="card">
                   <div class="card-body">
                    <?php if(isset($_POST['submit']))
                    {?>
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                        </div>
                      <?php } ?>
                    <br/>
                    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
                      <?php
                      $adminid=$_SESSION['odmsaid'];
                      $sql="SELECT * from  owner where id=:aid";
                      $query = $dbh -> prepare($sql);
                      $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                      foreach($results as $row)
                      {
                      ?>
                      <div class="control-group">
                        <label class="control-label" for="basicinput">Names</label>
                        <div  class="col-6">
                          <input type="text"   class="form-control" name="productName"  readonly value="<?php  echo $row->ownername;?>" class="span6 tip" required>
                        </div>
                      </div>
                      <br>
                      <div class="control-group"> 
                        <label class="control-label" for="basicinput">Current Image</label>
                        <div class="controls">
                          <img src="../upload/<?php  echo $row->photo;?>" width="170" height="150"> 
                        
                        </div>
                      </div>
                      <br>
                       <div class="form-group col-md-6">
                        <label>New Image</label>
                        <input type="file" name="productimage1" id="productimage1" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <?php }} ?>
                      <br>
                      <div class="form-group row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-dark " name="submit">
                            <i class="fa fa-plus "></i> Update
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <?php @include("includes/footer.php");?>
          
        </div>
        
      </div>
      
    </div>
    
   <?php @include("includes/foot.php");?>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
  </body>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
</html>
<?php }  ?>