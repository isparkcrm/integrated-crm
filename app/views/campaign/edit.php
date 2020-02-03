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
<br>                  
<br>                  
			   <form action="<?php echo URLROOT; ?>/campaign/edit/<?php echo $data['id'];?>" method="post">                                       
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
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Department Name</label>
								<div class="col-sm-9">
									<input type="text" class='form-control <?php echo(!empty($data['campaignname_err'])) ? 'is-invalid' : ''; ?>"' name="campaignname" placeholder="Campaign Name" value="<?php echo $data['campaignname'];?>">
									<span class="invalid-feedback"><?php echo $data['campaignname_err']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
							<label class="col-sm-3 col-form-label"> Description</label>
								<div class="col-sm-9">
								<textarea class="form-control" id="campaigndescrip" name="campaigndescrip" placeholder="Campaign Description"><?php echo $data['campaigndescrip'];?></textarea>
								<span class="invalid-feedback"><?php echo $data['campaignname_err']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php if ($data['email']!=""){
						?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
							<label class="col-sm-3 col-form-label">Support Mail ID</label>
								<div class="col-sm-9">
								<input type="email" class='form-control' name="email"  value="<?php echo $data['email'];?>" readonly>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>
					<div class="row" id="moc">
						<div class="col-md-6">
					<div class="form-group row">
					<label class="col-sm-3 col-form-label">Mode of Communication</label>
					
					<div class="col-sm-3">
					<div>
			  <label class="form-label">
				<input type="checkbox" <?php echo ($data['modeofcomm']=='email')?'checked':'checked' ?> name="modeofcomm[]" id="email" value="email"> Email
			  </label>
					</div>
					</div>
					<div class="col-sm-3">
					<div>
		  <label class="form-label">
			<input type="checkbox" <?php echo ($data['modeofcomm']=='oncall')?'checked':'checked' ?> name="modeofcomm[]" id="oncall" value="oncall"> ON Call
		  </label>
					</div>
				  </div>
				  <div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" id="basic_checkbox_1" <?php echo ($data['modeofcomm']=='onweb')?'checked':'' ?> name="modeofcomm[]" id="onweb" value="onweb"> ON Web
					  </label>
					</div>
					</div>
					</div>
					</div>
					</div>
					
		<input type="submit"  class="btn btn-success mr-2" value="Update Campaign">
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
         


