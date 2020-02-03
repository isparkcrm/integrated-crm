<div class="container-scroller">
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="admindashboard.php">
          <img src="<?php echo URLROOT; ?>/images/logo2.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="admindashboard.php">
          <img src="<?php echo URLROOT; ?>/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
         
          <li class="nav-item active">
            <a href="greports.php" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
             </ul>
        <ul class="navbar-nav navbar-nav-right">    
        
          <li class="nav-item dropdown d-none d-sm-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php  echo $_SESSION['username'];?>!</span>
              <?php if($_SESSION['image']=='') { ?>
           <img class="img-xs rounded-circle" src="<?php echo URLROOT; ?>/images/faces/face1.jpg" alt="profile image">
          <?php  }  else { ?>
          
          <img class="img-xs rounded-circle" src=" <?php echo URLROOT; ?>/users/<?php echo $_SESSION['image'];?>">
           <?php } ?> 
             
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="UserDropdown">
              
              <a class="dropdown-item mt-2" href="#">
                Manage Accounts
              </a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/posts/change">
                Change Password
              </a>              
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/SetFlag">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                <?php if($_SESSION['image']=='') { ?>
           <img src="<?php echo URLROOT; ?>/images/faces/face1.jpg" alt="profile image">
          <?php  }  else { ?>
          <img  src="../salescrm/users/<?php echo $_SESSION['image'];?>" >
           <?php } ?> 
                 
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['username'];?></p>
                <!--  <div>
                    <small class="designation text-muted"><?php echo $_SESSION['role'];?></small>
                    <br>
                    <small class="designation text-muted"><?php echo $_SESSION['status'];?></small>
                    <span class="status-indicator online"></span>
                  </div> -->
                </div>
              </div>             
            </div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>       
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/showusers">
              <i class="menu-icon mdi mdi-account-multiple"></i>             
              <span class="menu-title">User Master</span>
            </a>
          </li>  
                 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/clientlist">
              <i class="menu-icon mdi mdi-account-circle"></i>             
              <span class="menu-title"> Client Master</span>
            </a>
          </li>           
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/role">
              <i class="menu-icon mdi mdi-flag-variant"></i>             
              <span class="menu-title">Role Master</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/slalist">
              <i class="menu-icon mdi mdi-trending-up"></i>             
              <span class="menu-title">SLA Master</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/campaign/campaignlist">
              <i class="menu-icon mdi mdi-more"></i>             
              <span class="menu-title"> Campaign Management</span>
            </a>
          </li> 
		  	     <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/service">
              <i class="menu-icon mdi mdi-server-security"></i>             
              <span class="menu-title"> Service Master</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/casestudy">
              <i class="menu-icon mdi mdi-desktop-mac"></i>             
              <span class="menu-title"> Knowledge Base</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/campaign/outboundlist">
              <i class="menu-icon mdi mdi-phone"></i>             
              <span class="menu-title"> Outbound Calls</span>
            </a>
          </li> 
         <li class="nav-item">     
           <a class="nav-link" href=""> 
           <i class="menu-icon mdi mdi-clipboard-check"></i></i>          
              <span class="menu-title"> Reports </span>
            </a>
            </li>
        </ul>
      </nav>
     