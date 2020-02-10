
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('DD MMMM YYYY') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('hh:mm:ss A'));
    }, 100);
    });
</script>
<style>
.time-frame {
    background-color: #000000;
    color: #ffffff;
    width: 300px;
    font-family: Arial;
}

.time-frame > div {
    width: 100%;
    text-align: center;
}

#date-part {
    font-size: 0.80em;
}
#time-part {
    font-size: 0.80em;
}
</style>
      <!-- partial -->
      <div class="main-panel">
	  <div class="row">
		<div style="margin-left: 83.7%;" id='time-part'></div>
		<div style="margin-left: 82%;" id='date-part'></div>
	  </div>
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
                      <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="90 60" stroke-dashoffset="139" style="stroke: #e90000;"></circle>
							<g class="donut-text" transform="translate(20, 22)" >
								<text>
									<tspan  text-anchor="middle" class="donut-label">95%</tspan>   
								</text>
							</g>
						</svg>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Critical</p>
                      <div class="fluid-container">                                              
                         <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $data['critical'];?></h3> </a>                      
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
                       <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="90 70" stroke-dashoffset="139" style="stroke: #f18311;"></circle>
							<g class="donut-text" transform="translate(20, 22)">
								<text>
									<tspan  text-anchor="middle" class="donut-label">80%</tspan>   
								</text>
							</g>
						</svg>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">High</p>
                      <div class="fluid-container">                         
             <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
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
                       <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="69 69" stroke-dashoffset="118" style="stroke: #126a9d;"></circle>
							<g class="donut-text" transform="translate(20, 22)">
								<text>
									<tspan  text-anchor="middle" class="donut-label">60%</tspan>   
								</text>
							</g>
						</svg>  
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Medium</p>
                      <div class="fluid-container">   
                         
               <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
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
                      <svg width="40%" height="40%" viewBox="0 0 40 40" class="donut">
							<circle class="donut-segment" cx="20" cy="20" r="16" fill="transparent" stroke-width="6" stroke-dasharray="60 50" stroke-dashoffset="98" style="stroke: #1da2b0;"></circle>
							<g class="donut-text" transform="translate(20, 22)">
								<text>
									<tspan  text-anchor="middle" class="donut-label">40%</tspan>   
								</text>
							</g>
						</svg>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Low</p>
                      <div class="fluid-container"> 
                         
              <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
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
								   Campaign
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
									$number=$this->userModel->countcampaign();
									$Rows = 1; //Dynamic number for Rowss
									for($i=1;$i<=$Rows;$i++){ 
								?>
                         
								<td>
									<?php
										$campaignname=$this->userModel->campaignname($data['campaign']);
										echo $campaignname;            
									?>                          
								</td>

								<td style="text-align: center;">
								<a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
									<?php
										$open=$this->userModel->campaignopen($data['campaign']);
										echo $open;            
									?> 
                                 </a>									
								</td>

								<td style="text-align: center;"> 
								<a href="<?php echo URLROOT; ?>/departments/reports_close" style="color: black; text-decoration: none;">
									<?php
										$close=$this->userModel->campaignclose($data['campaign']);
										echo $close;                      
									?> 
									</a>
								</td>
								<td style="text-align: center;">
								<a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
									<?php 
										$opentoday=$this->userModel->campaignopentoday($data['campaign']);
										echo $opentoday;              
									?> 
									</a>
							</td>

                          <td style="text-align: center;">
						  <a href="<?php echo URLROOT; ?>/departments/reports_close" style="color: black; text-decoration: none;">
                           <?php 
						     $closetoday=$this->userModel->campaignclosetoday($data['campaign']);
                      
							echo $closetoday;
							
				            
              ?>
			  </a>
                          </td>


                          <td  style="text-align: center;">
						  <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
                              <?php 
									  $critical=$this->userModel->campaigncritical($data['campaign']);
                      
							echo $critical;
					
              ?> 
			  </a>
                          </td>
						   <td  style="text-align: center;">
						   <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
                              <?php 
									  $high=$this->userModel->campaignhigh($data['campaign']);
                      
							echo $high;
						
              ?> 
			  </a>
                          </td>

                          <td style="text-align: center;">
						  <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
                           <?php 
									  $medium=$this->userModel->campaignmedium($data['campaign']);
                      
							echo $medium;
						   
					
             
                         
              ?>
                   
</a>				   </td>

                          <td style="text-align: center;">
						  <a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
                        <?php 
								$low=$this->userModel->campaignlow($data['campaign']);
                      
							echo $low;
				           
              ?> 
			  </a>
                         </td>    
						    <td style="text-align: center;">
							<a href="<?php echo URLROOT; ?>/departments/reports" style="color: black; text-decoration: none;">
                        <?php
							$sla=$this->userModel->campaignsla($data['campaign']);
                      
							echo $sla;
				           
              ?> 
			  </a>
                         </td> 

                         
                              </tr>
                       <?php 

                         }  ?>
                       
                     
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
 <script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
<style>
@keyframes donut-chart-fill {
  to { stroke-dasharray: 0 100; }
}

.svg-item {
  width: 60px;
  height: 60px;
  font-size: 16px;
}

.donut-segment {
  animation: donut-chart-fill 1s reverse ease-in;
  transform-origin: center;
  stroke: #FF6200;
}

.donut-label {
  font-size: 0.4em;
  font-weight: bold;
  fill: #FF6200;
  line-height: 1;
  transform: translateY(0.5em);
}
</style>
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