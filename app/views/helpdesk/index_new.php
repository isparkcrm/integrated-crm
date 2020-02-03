
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>         
  
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/high1.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Critical</p>
                      <div class="fluid-container">                                              
                         <a href="" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['critical'];?> </h3> </a>                      
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                     Severity-critical
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/medium.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">High</p>
                      <div class="fluid-container">                         
              <a href="" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['high'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    Severity-High
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo URLROOT; ?>/images/low.png" alt="profile image">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Medium</p>
                      <div class="fluid-container">   
                         
               <a href="low.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['medium'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                     Severity-Medium
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Low</p>
                      <div class="fluid-container"> 
                         
              <a href="customers.php" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['low'];?></h3> </a>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                   Severity-Low
                  </p>
                </div>
              </div>
            </div>
          </div>
         
           <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> <?php  echo $_SESSION['username'];?> &nbsp;&nbsp; <?php echo $data['title']; ?></h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
							<thead>
								<tr style="background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB); font-weight:bold; color: white;">
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   Username
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   Open 
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
									Closed 
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   Open <br> Today
								  </th>
								  <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
									Closed <br> Today
								  </th>
								  <th colspan="4" style="text-align: center; border-right: 2px solid #f2f2f2 !important; vertical-align: middle;">
									Tickets Severity                             
								  </th>                         
									 <th rowspan="2" style="border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">
								   SLA Violations                          
								  </th> 
								</tr>
								<tr>  
									  <td style=" background-color: #546E7A; color: white; border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Critical</td>
									  <td style=" background-color: #546E7A; color: white; border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">High</td>
									  <td style=" background-color: #546E7A; color: white;  border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Medium</td>
									  <td style="background-color: #546E7A; color: white; border-right: 2px solid #f2f2f2 !important; vertical-align: middle; text-align: center;">Low</td>
								</tr>
							</thead>             
						<tbody>
							<style>
							tr:nth-child( 2n ) {
							background-color:#ded3f6;
							font-weight: bold;
							}
							tr:nth-child( 2n + 1 ) {
							  background-color: #b8f1d5;
							font-weight: bold;
							}
							</style>
                            <tr> 
								<?php
									$client=$_SESSION['email'];
								
									$Rows = 1; //Dynamic number for Rowss
									for($i=1;$i<=$Rows;$i++){ 
								?>
                         
								<td>
									<?php
										$clientname=$this->helpdeskModel->clientname($client);
										echo $clientname;            
									?>                          
								</td>

								<td style="text-align: center;">
									<?php
										$clientopen=$this->helpdeskModel->clientopen($client);
										echo $clientopen;            
									?>             
								</td>

								<td style="text-align: center;"> 
									<?php
										$clientclose=$this->helpdeskModel->clientclose($client);
										echo $clientclose;                      
									?> 
								</td>
								<td style="text-align: center;">
									<?php 
										$opentoday=$this->helpdeskModel->campaignopentoday($client);
										echo $opentoday;              
									?> 
								</td>

								<td style="text-align: center;">  
									<?php 
										$closetoday=$this->helpdeskModel->campaignclosetoday($client);
										echo $closetoday;	            
									?>
								</td>

								<td  style="text-align: center;">
									<?php 
										$critical=$this->helpdeskModel->campaigncritical($client);                      
										echo $critical;					
									?> 
								</td>
								
								<td  style="text-align: center;">
									<?php 
										$high=$this->helpdeskModel->campaignhigh($client);                      
										echo $high;				
									?> 
								</td>

								<td style="text-align: center;">
									<?php 
										$medium=$this->helpdeskModel->campaignmedium($client);						  
										echo $medium;                  
									?>
								</td>

								<td style="text-align: center;">
									<?php 
										$low=$this->helpdeskModel->campaignlow($client);
										echo $low;	           
									?> 
								</td>   
								
								<td style="text-align: center;">
									<?php
										$sla=$this->helpdeskModel->campaignsla($client);
										echo $sla;	           
									?> 
								</td> 
							</tr>
									<?php   }  ?>
                       
                     
						</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>     

   <div class="row">
       <div class="col-md-12">
       <div class="card">
       <h4 class="todo-title text-primary"><i class="fa fa-warning"></i> <strong>Management Information</strong> </h4>
        <?php 
              $groups = $this->emailcampaignModel->getMessage();
           ?>
       <hr class="hr-panel-heading-dashboard">
        <?php foreach($groups as $information) : ?> 
          <div class="card card-body mb-3">
       <div class="bg-light p-2 mb-3">
       Message Sent From:<strong> <?php echo $information->name; ?></strong> <br>
     Date<strong> <?php echo $information->created_at; ?></strong>  
      </div>
      <p class="card-text">  Message : <?php echo $information->description; ?></p>
          
     
    </div>
  
    <?php  
endforeach; ?>    
       </div>
       </div>
      
       </div> 

             


          </div>                     
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<style type="text/css">
 .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}

tr:nth-child( 2n ) {
  background-color:#ded3f6;
  font-weight: bold;
}
tr:nth-child( 2n + 1 ) {
  background-color: #b8f1d5;
font-weight: bold;
}
</style>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>