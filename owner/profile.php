<?php
include('includes/checklogin.php');
check_login();
error_reporting(1);
 if(isset($_POST['submit']))
 {
   $adminid=$_SESSION['odmsaid'];
   $AName=$_POST['username'];
   $fName=$_POST['firstname'];
   $lName=$_POST['lastname'];
   $mobno=$_POST['mobilenumber'];
   $email=$_POST['email'];
   $sql="update owner set ownername=:adminname,phone=:mobilenumber,Email=:email where ID=:aid";
   $query = $dbh->prepare($sql);
   $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
  
   $query->bindParam(':email',$email,PDO::PARAM_STR);
   $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
   $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
   $query->execute();
   echo '<script>alert("Profile has been updated")</script>';
 }
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
 
    <div class="container-scroller">
        
        <?php @include("includes/header.php");?>
        
        <div class="container-fluid page-body-wrapper">
            
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
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
                                            <form method="post">
                                               
                                                <div class="form-group row">
                                                    <label class="col-12" for="register1-email">Full Names:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="username" value="<?php  echo $row->ownername;?>" required='true' >
                                                    </div>
                                                </div>
                                               
                                           
                                           <div class="form-group row">
                                            <label class="col-12" for="register1-password">Email:</label>
                                            <div class="col-12">
                                              <input type="email" class="form-control" name="email" value="<?php  echo $row->email;?>"readonly  required='true'>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-12" for="register1-password">Contact Number:</label>
                                        <div class="col-12">
                                         <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row->phone;?>" required='true' maxlength='11'>
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                  <label class="col-12" for="register1-password">Registration Date:</label>
                                  <div class="col-12">
                                   <input type="text" class="form-control" id="email2" name="" value="<?php  echo $row->regdate;?>" readonly="true">
                               </div>
                           </div>
                           <div class="control-group">
                            <label class="control-label" for="basicinput">Profile Image</label>
                            <div class="controls">
                             
                              <img src="../upload/<?php  echo $row->photo;?>" width="150" height="150">
                            
                          <a href="update_image.php?id=<?php echo $adminid;?>">Change Image</a>
                      </div>
					    <div class="control-group">
						&nbsp;
						&nbsp;
						&nbsp;
						&nbsp;
						&nbsp;
						</div>
                  </div>       
                  <?php 
              }
          } ?>
          <br>
          <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
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