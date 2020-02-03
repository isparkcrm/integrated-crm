<!DOCTYPE html>
<html lang="en">
<head>   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITENAME; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style1.css">
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/sty.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/favicon.png"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Data Table Link -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/> 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>

</head>
<body>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <?php flash('register_success'); ?>
                  <h4 class="card-title">Create Ticket</h4>
        <form action="<?php echo URLROOT; ?>/tickets/create_webticket" method="post" enctype="multipart/form-data">  
			 <div class="row">
				  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">Subject</label>
					  <div class="col-sm-9">
					  <input type="text" name="title" class="form-control <?php echo(!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"  placeholder="subject"  required>
					</div>
				  </div>
			  </div>
			  <div class="col-md-6">
					<div class="form-group row">
					  <label class="col-sm-3 col-form-label">Description</label>
					  <div class="col-sm-9">
					  <textarea name="description" class="form-control <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"  placeholder="description" required></textarea>                         
					</div>
				  </div>
				</div>                       
			 </div> 
                 <div class="row">                
					<div class="col-md-6">
						<div class="form-group row">
						  <label class="col-sm-3 col-form-label">Severity<sup>*</sup></label>
						  <?php  $groups = $this->ticketModel->getSeverity(); ?>
						  <div class="col-sm-9">
						<select class='form-control <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' id='severity' name='severity'>
						  <option value="" disabled="disabled" selected="selected"> Select severity.. </option>
						  <?php foreach($groups as $each){ ?>
						  <option value="<?php echo $each->severity_name; ?>"><?php echo $each->severity; ?></option>';
						  <?php } ?>       
						</select>                                      
						  </div>
						</div>
					  </div>  
                 </div>
                 	<input type="hidden" name="status" class="form-control" Value="Open">
                    <input type="submit"  class="btn btn-success mr-2" value="Submit">
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>            
            </div>
		  </div>
		</div> 
	</div>