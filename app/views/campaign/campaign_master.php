<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<style>
.showhide {  
   display:none;
}
</style>
<body onload="test();">
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
                  <h4 class="card-title">Department Management</h4> 
									<span class="alert-danger"><?php echo $data['email_err']; ?></span>                       
			   <form action="<?php echo URLROOT; ?>/campaign/campaign_master" method="post"> 
				                                   
              	                                   
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Campaign Type<sup>*</sup></label>
                          <div class="col-sm-9">
                           <input type="hidden" name="campaigntype" id="campaigntype" value="Inbound" class="form-control" readonly>
                          <span class="invalid-feedback"><?php echo $data['campaigntype_err']; ?></span></div>
                        </div>
                      </div>  
		            </div>
		
			<!--		<div class="row">
					<div class="col-md-6">
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Process Type<sup>*</sup></label>
                              <?php 
                              $groups = $this->campaignModel->getService();           
                                ?>                     
                        <div class="col-sm-9">
												<select class='form-control <?php echo(!empty($data['processtype_err'])) ? 'is-invalid' : ''; ?>"' name='processtype'>
                          <option value="" disabled="disabled" selected="selected"> Select Process.. </option>
                          <?php foreach($groups as $each){ ?>
                            <option value="<?php echo $each->id; ?>"><?php echo $each->servicename; ?></option>;
                           <?php } ?>       
                           </select>                                      
													 <span class="invalid-feedback"><?php echo $data['processtype_err']; ?></span>                                                
                        </div>
                      </div>
                    </div>        
					</div> -->
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Department Name</label>
								<div class="col-sm-9">
									<input type="text" class='form-control <?php echo(!empty($data['campaignname_err'])) ? 'is-invalid' : ''; ?>"' name="campaignname" placeholder="Campaign Name">
									<span class="alert-danger"><?php echo $data['campaignname_err']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
							<label class="col-sm-3 col-form-label">Department Description</label>
								<div class="col-sm-9">
								<input type="text" class="form-control" id="campaigndescrip" name="campaigndescrip" placeholder="Campaign Description">
								<span class="alert-danger"><?php echo $data['campaignname_err']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row" >
					<div class="col-md-6">
					<div class="form-group row">
					<label class="col-sm-3 col-form-label"></label>

					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="radio" name="process" id="service" value="service"> Add service 					
					  </label>
					  
					</div>
					</div>
					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="radio" name="process" id="client" value="client"> Add Client
					  </label>
			
					</div>
				  </div>
					
					</div>
					</div>
					</div>	

					<div class="row" >
					<div class="col-md-6">
					<div class="form-group row">
					<label class="col-sm-3 col-form-label">Mode of Communication</label>

					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" name="modeofcomm[]" id="email" value="email"> Email
					
					  </label>
					  
					</div>
					</div>
					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" name="modeofcomm[]" id="oncall" value="oncall"> ON Call
					  </label>
			
					</div>
				  </div>
					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" name="modeofcomm[]" id="onweb" value="onweb"> ON Web
					  </label>
					</div>
				  </div>
					</div>
					</div>
					</div>	
					
					<div class="row" id="selectBox" style="display:none;" >
						<div class="col-md-6">
							<div class="form-group row">
							<label class="col-sm-3 col-form-label">Support MAIL </label>
								<div class="col-sm-9">
								<input type="email" class="form-control" id="email" name="email" placeholder="support mail ID">
								
								</div>
							</div>
						</div>
					</div>				
		<input type="submit"  class="btn btn-success mr-2" value="Add Campaign">
		<button type="reset" class="btn btn-light">Cancel</button>
      </form>            
		</div>
                  </div>
                </div> 
				</div>
				</div>
				</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>
          

<script>
	$('[name="modeofcomm[]" ]').click(function() {
		if($(this).attr('id') == 'email') {
   $("#selectBox").toggle(this.checked);
		}
});
	</script>


         


