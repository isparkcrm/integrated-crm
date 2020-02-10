<?php
if(!isset($_SESSION['id'])){
  redirect('users/index_new');
}
?>
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
            <a href="" class="nav-link">
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
         
         
          <?php
            if($_SESSION['role']=="Service Head"){           
           ?>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Tickets">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Tickets/view_tickets">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">View Tickets</span>
            </a>
          </li>         
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Tickets/sla_notification">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">SLA Notifications</span>
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Emailcampaign">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">EmailCampaign</span>
            </a>
          </li>  
           <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Emailcampaign/management_info">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Management Info</span>
            </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
             <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">      
                 
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/tickets/reports">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Open Tickets</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/tickets/reports_close">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Close Tickets</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/tickets/userwise_report">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Userwise Report</span>
            </a>
          </li> 

     
              </ul>
            </div>
          </li>
          <?php
            }
             else  if($_SESSION['role']=="Team leader") {
          ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/departments/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/departments/campaign_tickets">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Tickets</span>
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/oncall_ticket">
              <i class="menu-icon mdi  mdi-border-color"></i>             
              <span class="menu-title">Create Ticket</span>
            </a>
          </li>   
     <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/departments/sla_notification">
              <i class="menu-icon mdi mdi-bell"></i>             
              <span class="menu-title">SLA Notification</span>
            </a>
          </li>  
      <!-- *********************************************  Client Setup**************************************************************   -->
       <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
             <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Client Setup</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">               
                 
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/showusers">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">User Master</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/clientlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Client Master</span>
            </a>
          </li> 

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/slalist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">SLA Master</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/departments/campaignlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Manage Campaign </span>
            </a>
          </li> 
              </ul>
            </div>
          </li>
          <li class="nav-item">     
           <a class="nav-link" href=""> 
           <i class="menu-icon mdi mdi-elevation-rise"></i></i>          
              <span class="menu-title"> Reports </span>
            </a>
            </li>
        <!-- *********************************************  Client Setup**************************************************************   -->
         <?php 
         }
          else  if($_SESSION['role']=="Administrator") {
          ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>       
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/showusers">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">User Master</span>
            </a>
          </li>  
                 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/clientlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Partner Master</span>
            </a>
          </li>           
         
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/slalist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">SLA Master</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/campaign/campaignlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Department Management</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/campaign/escalation">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Escalation Config</span>
            </a>
          </li> 
             <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/service">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Service Master</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/notification">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Notification Master</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/casestudy">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Knowledge Base</span>
            </a>
          </li> 
           
       <!--   <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/campaign/outboundlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Outbound Calls</span>
            </a>
          </li>   -->
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
             <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">      
                 
		    <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/reports">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Open Tickets</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Posts/reports_close">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Closed Tickets</span>
            </a>
          </li> 
           <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/tickets/userwise_report">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Userwise Report</span>
            </a>
          </li> 
              </ul>
            </div>
          </li>
         <?php 
         }
            else  if($_SESSION['role']=="Customer"){
            ?>
             <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/customer/view_tickets">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">View Tickets</span>
            </a>
          </li> 
          <?php
            }
            
  else{        
         ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/ticketlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Assigned  Tickets</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/oncall_ticket">
              <i class="menu-icon mdi  mdi-border-color"></i>             
              <span class="menu-title">Create Ticket</span>
            </a>
          </li> 
      <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/sla_notification">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">SLA Notification</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/search">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Knowledge Search </span>
            </a>
          </li> 
           
               <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
             <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
              <ul class="nav flex-column sub-menu">               
                 
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/reports">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Open Tickets</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/helpdesk/reports_close">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Closed Tickets</span>
            </a>
          </li> 
 
        
              </ul>
            </div>
          </li>
       
          <?php
         }
         ?>            
        
        </ul>
      </nav>
     
     