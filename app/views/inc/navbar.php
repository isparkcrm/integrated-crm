<div class="container-scroller">
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="admindashboard.php">
          <img src="<?php echo URLROOT; ?>/images/logo2.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="admindashboard.php">
          <img src="<?php echo URLROOT; ?>/images/logo2.png" alt="logo" />
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
        $role=$_SESSION['role'];
       
        if($role=="Team leader"){
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
            <a class="nav-link" href="<?php echo URLROOT; ?>/departments/campaignlist">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Manage Campaign </span>
            </a>
          </li> 
              </ul>
            </div>
          </li>
		    <!-- *********************************************  Client Setup**************************************************************   -->
			  <li class="nav-item">     
           <a class="nav-link" href=""> 
           <i class="menu-icon mdi mdi-elevation-rise"></i></i>          
              <span class="menu-title"> Reports </span>
            </a>
            </li>
        <?php
        } else if ($role =="Account Manager") {?>
			 <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/sales/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">DASHBOARD</span>
            </a>
          </li>
		 <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi fa-file-o"></i>
              <span class="menu-title">LEAD MANAGEMENT</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
				  <ul class="nav flex-column sub-menu">
				   <li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/leads/salesleadlist">
					  <i class="menu-icon mdi mdi-account-check"></i>             
					  <span class="menu-title">ASSIGNED CUSTOMER</span>
					</a>
				   </li> 
					<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/Leads/salesleadlist_new">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> VIEW LEADS </span>
				</a>
					</li> 
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URLROOT; ?>/Leads/leadstatus">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title">MANAGE LEADS</span>
				</a>
			  </li> 
			  <!--
            <li class="nav-item">
				<a class="nav-link" href="</?php echo URLROOT; ?>/Quatations/quatation_master">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> Quatation Master</span>
				</a>
			  </li>	
			<li class="nav-item">
				<a class="nav-link" href="</?php echo URLROOT; ?>/mom/mom_master">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> Mom Master</span>
				</a>
			  </li>	-->			  
				  </ul>
            </div>
          </li> 
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/leads/lead_master">
            <i class="menu-icon mdi mdi-account-check"></i>             
            <span class="menu-title">CREATE LEAD</span>
          </a>
           </li> 
           </li> 
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/leads/paymentlist">
            <i class="menu-icon mdi mdi-account-check"></i>             
            <span class="menu-title">PAYMENT STATUS</span>
          </a>
           </li> 
            <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/leads/amclist">
            <i class="menu-icon mdi mdi-account-check"></i>             
            <span class="menu-title">AMC RENEWALS</span>
          </a>
           </li> 
		  
		 <!-- <li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/leads/commit_lead">
					  <i class="menu-icon mdi mdi-account-check"></i>             
					  <span class="menu-title">COMMIT</span>
					</a>
				   </li> 
					<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/Leads/upside_lead">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> UPSIDE</span>
				</a>
					</li> 
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URLROOT; ?>/Leads/cold_lead">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title">COLD & LEAD</span>
				</a>
			  </li>--> 
		   
			<?php } else if($role == "Sales Head") { ?>
		 	 <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
		  <!--<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/leads/notification">
					  <i class="menu-icon mdi mdi-account-check"></i>             
					  <span class="menu-title">Notification</span>
					</a>
				   </li> -->
				 
				    
					<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/Leads/adminleadlist">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> View Leads</span>
				</a>
					</li> 
		 <li class="nav-item">
				<a class="nav-link" href="<?php echo URLROOT; ?>/Saleshead/leadenquiry">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> Lead  Enquiries</span>
				</a>
			  </li> 
        <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/Saleshead/paymentlist">
          <i class="menu-icon mdi mdi-account-plus"></i>             
          <span class="menu-title"> Payment status</span>
        </a>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/Saleshead/amclist">
          <i class="menu-icon mdi mdi-account-plus"></i>             
          <span class="menu-title"> AMC Renewals</span>
        </a>
        </li> 
       <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi fa-file-o"></i>
              <span class="menu-title">Customer Payment Status</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
          <ul class="nav flex-column sub-menu">
           <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/leads/salesleadlist">
            <i class="menu-icon mdi mdi-account-check"></i>             
            <span class="menu-title">Payment list</span>
          </a>
           </li> 
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/Leads/salesleadlist_new">
          <i class="menu-icon mdi mdi-account-plus"></i>             
          <span class="menu-title"> </span>
        </a>
          </li> 
        <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/Leads/leadstatus">
          <i class="menu-icon mdi mdi-account-plus"></i>             
          <span class="menu-title">MANAGE LEADS</span>
        </a>
        </li> 
        
          </ul>
            </div>
          </li>  -->

 	    <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/leads/lead_master">
            <i class="menu-icon mdi mdi-account-check"></i>             
            <span class="menu-title">Generate Lead</span>
          </a>
           </li> 
			<li class="nav-item">     
           <a class="nav-link" href="<?php echo URLROOT; ?>/Report/index_new"> 
           <i class="menu-icon mdi mdi-clipboard-text"></i></i>          
              <span class="menu-title"> Reports </span>
            </a>
            </li>
			<?php } else if($role =="Sales Admin") {?>
<li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/showusers">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">User Master</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi fa-file-o"></i>
              <span class="menu-title">Masters</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
					<li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/Masters/vertical_master"><i class="menu-icon mdi mdi-elevation-rise"></i><span class="menu-title">Vertical Master</span></a></li>
                </li>
                <li class="nav-item">
					<li class="nav-item"><a class="nav-link"href="<?php echo URLROOT; ?>/Masters/oem_master"><i class="menu-icon mdi mdi-elevation-rise"></i><span class="menu-title">OEM Master</span></a></li>
                </li>
                <li class="nav-item">
					<li class="nav-item"><a class="nav-link"href="<?php echo URLROOT; ?>/Masters/product_master"><i class="menu-icon mdi mdi-elevation-rise"></i><span class="menu-title">Product Master</span></a></li>
                </li>
              </ul>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi fa-file-o"></i>
              <span class="menu-title">Business Rules</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
					<li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/Masters/individualtarget"><i class="menu-icon mdi mdi-elevation-rise"></i><span class="menu-title">Individual Target</span></a></li>
                </li>
                <li class="nav-item">
					<li class="nav-item"><a class="nav-link"href="<?php echo URLROOT; ?>/Masters/verticaltarget"><i class="menu-icon mdi mdi-elevation-rise"></i><span class="menu-title">Vertical Target</span></a></li>
                </li>
              </ul>
            </div>
          </li>
		  <!-- <li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/leads/notification">
					  <i class="menu-icon mdi mdi-account-check"></i>             
					  <span class="menu-title">Notification</span>
					</a>
				   </li> -->			
<?php } else if($role == "Telecaller") {?>
		
		 <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/telecaller/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
		 <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi fa-file-o"></i>
              <span class="menu-title">Lead List</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
				  <ul class="nav flex-column sub-menu">
				   <li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/telecaller/allleadlist">
					  <i class="menu-icon mdi mdi-account-check"></i>             
					  <span class="menu-title">Email Leads</span>
					</a>
				   </li> 
					<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/telecaller/website_lead">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> Website Leads</span>
				</a>
					</li> 
					<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/telecaller/outboundcall">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> Inbound Call Leads</span>
				</a>
					</li> 
					<li class="nav-item">
					<a class="nav-link" href="<?php echo URLROOT; ?>/telecaller/smsleads">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> SMS Leads</span>
				</a>
					</li> 
					<!--<li class="nav-item">
					<a class="nav-link" href="<//?php echo URLROOT; ?>/telecaller/outboundcall_lead">
				  <i class="menu-icon mdi mdi-account-plus"></i>             
				  <span class="menu-title"> Outbound Call Leads</span>
				</a>
					</li>--> 
			</ul>
            </div>
          </li> 		
			 <li class="nav-item">     
           <a class="nav-link" href=""> 
           <i class="menu-icon mdi mdi-clipboard-text"></i></i>          
              <span class="menu-title"> Reports </span>
            </a>
            </li>			
        <?php } else if($role=="OEM"){  ?>
		<li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/oems/index_new">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>       
		 <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/leads/lead_master">
              <i class="menu-icon mdi mdi-account-check"></i>             
              <span class="menu-title">Lead Management</span>
            </a>
          </li> 		
		 <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Leads/leadlist">
              <i class="menu-icon mdi mdi-account-plus"></i>             
              <span class="menu-title"> Update Action</span>
            </a>
          </li> 
		<li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Leads/leadstatus">
              <i class="menu-icon mdi mdi-account-plus"></i>             
              <span class="menu-title"> Update Status</span>
            </a>
          </li> 		  
          <li class="nav-item">     
           <a class="nav-link" href=""> 
           <i class="menu-icon mdi mdi-elevation-rise"></i></i>          
              <span class="menu-title"> Reports </span>
            </a>
            </li>

		<?php } else {?>
           <!-- Else Part  -->

        
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
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/role">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title">Role Master</span>
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
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts/reports_close">
              <i class="menu-icon mdi mdi-receipt"></i>             
              <span class="menu-title"> Close Tickets</span>
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
    