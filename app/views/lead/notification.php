<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/basic.css">
        
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Notifications</h1>
                        <h1 class="page-subhead-line">Overdue Notifications </h1>
					</div>
                </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Overdue Alerts
                        </div>
                        <div class="panel-body">                 
                            <div class="alert alert-danger">
                              <p>
									<strong>
									  Assignee:     
                                   Customer : 
                                   Product  : 
                                   Value : 
                                   Closure Date : 
								    </strong>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
                   
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Closed Orders
                        </div>
			<div class="panel-body">
					<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<p>
							<strong> 
							   Created By:
							   Customer : 
							   Product  : 
							   Value : 
							   Closure Date : 
						   </strong>
					  </p>
					</div>  
				</div>
                    </div>
                </div>
            </div>
			
   </div>
   <?php require APPROOT . '/views/inc/footer.php'; ?>    
