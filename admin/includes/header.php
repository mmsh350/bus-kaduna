 <!--<div id="loading"></div>  -->
    <div id="page">
    </div>
    <div class="bg-white topbar">
      <div class="row">
        <div class="col-md-4 d-flex align-items-center">
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100 pl-4" action="#">
              <div class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                  <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
              </div>
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
              </div>
               
            </form>
          </div> 
        </div>
        <div class="col-md-4">
           <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo " href="dashboard.php"><img class="img-avatar" style="height: 70px; width: auto;" src="assets/images/bg.png" alt=""></a>
            

          </div>          
        </div>
        <div class="col-md-4">
          <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row bg-white">
          <div class="navbar-menu-wrapper d-flex align-items-stretch w-100 ">
          <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item nav-profile dropdown">
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  admin where id=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $row)
          { 
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                
                  <img class="img-avatar" src="../upload/<?php  echo $row->photo;?>" alt=""> 
                 
              </div>
              <div class="nav-profile-text ">
                <p class="mb-1 text-dark"><?php  echo $row->name;?></p>
              </div>
            </a>
            <?php
          }
        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-key mr-2 text-success"></i> Change Password </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
              <i class="mdi mdi-logout mr-2 text-danger"></i> Signout </a>
            </div>
          </li>
        </ul>
        </div>
      </nav>
      </div>
  
     
    </div>
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">

  <div class="navbar-menu-wrapper d-flex align-items-stretch w-100">
   
   
    <ul class="navbar-nav navbar-nav-left">
        <li class="nav-item dropdown">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
		  
		   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Franchise</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="manage_proposal.php">Manage Proposals</a>
              <a class="dropdown-item" href="manage_franchise.php">Manage Franchise</a>
            </div>
          </li>
		  
           
		   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vehicle</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="vehicle.php">Vehicle Type</a>
              <a class="dropdown-item" href="userregister.php">Manage Routes</a>
            </div>
          </li>
		  
		    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trips</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="trips.php">Schedule a Trip</a>
            </div>
          </li>
		  
		   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="transactions.php">Transactions</a>
			  <a class="dropdown-item" href="bookings.php">Passengers</a>
            </div>
          </li>
        </ul>

         <ul class="navbar-nav navbar-nav-right">

      
      
      
        </ul>
      </div>
    </nav>


<script>
  $(window).scroll(function () {
  console.log($(window).scrollTop())
  if ($(window).scrollTop() > 63) {
    $('.navbar').addClass('navbar-fixed');
  }
  if ($(window).scrollTop() < 64) {
    $('.navbar').removeClass('navbar-fixed');
  }
});
</script>
<style>
  .navbar-fixed {
  top: 0;
  z-index: 100;
  position: fixed;
  width: 100%;
}
</style>

