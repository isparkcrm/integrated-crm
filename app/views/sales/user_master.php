<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function () {
  $("#usertype").select2();
});
</script>


<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/showusers" class="btn btn-info"><i class="fa fa-backward"></i> Back <<</a>
            </div>
            <div class="col-12">
              
            </div>
          </div>


<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <?php flash('register_failure'); ?>
                <?php flash('register_success'); ?>
                  <h4 class="card-title">Create User</h4>                     
                       <form action="<?php echo URLROOT; ?>/posts/user_master" method="post">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Type<sup>*</sup></label>
                          <?php 
                $groups = $this->clientModel->getClientName();
                ?>
                          <div class="col-sm-9">
                          <select class='form-control <?php echo(!empty($data['usertype_err'])) ? 'is-invalid' : ''; ?>"' id='usertype' name='usertype' required='required'> 
                          <option value="" disabled="disabled" selected="selected"> Select catagory.. </option>
                            <option value="Internal User"> Internal User </option> 
                            <option value="OEM"> OEM </option> 
                            <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->client_ID; ?>"><?php echo $each->clientname; ?></option>';    <?php } ?>
                            </select>                              
                        <span class="invalid-feedback"><?php echo $data['usertype_err']; ?></span>                                                    
                          </div>
                        </div>
                      </div> 
					  <div class="col-md-6">
                        <div class="form-group row" style="display:none;" id="oem2">
                          <label class="col-sm-3 col-form-label">OEM Name<sup>*</sup></label>
                          <?php $groups = $this->masterModel->getOem(); ?>
                          <div class="col-md-9">
                          <select class='form-control' id='oemname' name='oemname'> 
                          <option value="" disabled="disabled" selected="selected"> Select OEM.. </option>
                            <?php foreach($groups as $each){ ?>
							<option value="<?php echo $each->id; ?>"><?php echo $each->oemname; ?></option>    
							<?php } ?>
                            </select>                              
							</div>
                        </div>
                      </div>
                    </div> 
										
                    <div class="row" style="display:none;" id="support">       
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Resource Type</label>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="resource" id="yesCheck" value="remote" onclick="javascript:yesnoCheck();"> Remote Support
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="resource" id="noCheck" value="onsite" onclick="javascript:yesnoCheck();"> Onsite Support
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                       <div class="col-md-6" id="ifYes" style="display:none">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Resource Location</label>
                         
                              <div class="col-sm-9">
                          
                                       <select class='form-control <?php echo(!empty($data['location_err'])) ? 'is-invalid' : ''; ?>"' id='location' name='location' > 
                                              <option>Chennai </option> 
                                               <option> Mumbai </option> 
                                                <option> Bengaluru</option> 
                                                <option> Delhi</option> 
                                        </select> 
                                        <span class="invalid-feedback"><?php echo $data['location_err']; ?></span>                                      
                          </div>
                        </div>
                      </div>                                   
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employee ID</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['emp_id_err'])) ? 'is-invalid' : ''; ?>"' name='emp_id' required="required">
                           <span class="invalid-feedback"><?php echo $data['emp_id_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['usernaame_err'])) ? 'is-invalid' : ''; ?>"' name='username' required="required">
                           <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>       
                        </div>
                      </div>
                      </div>                       
                      </div>      
                              <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email ID</label>
                          <div class="col-sm-9">
                           <input type="email"  class='form-control <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"' name='email'  required="required">
                           <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"' name='name' required="required">
                           <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>       
                        </div>
                      </div>
                      </div>                       
                      </div>    
                         <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile Number</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['number_err'])) ? 'is-invalid' : ''; ?>"' name='number' required="required">
                           <span class="invalid-feedback"><?php echo $data['number_err']; ?></span>       
                        </div>
                      </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Role<sup>*</sup></label>
                              <?php 
                              $groups = $this->clientModel->getRole();           
                                ?>                     
                        <div class="col-sm-9">
                          <select class="form-control <?php echo(!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" id='role[]' name='role'>
                          <option value="" disabled="disabled" selected="selected"> Select role.. </option>
                          <?php foreach($groups as $each){ ?>
                            <option value="<?php echo $each->role; ?>"><?php echo $each->role; ?></option>;
                           <?php } ?>       
                           </select>                                      
                          <span class="alert-danger"><?php echo $data['role_err']; ?>  </span>                                                 
                        </div>
                      </div>
                    </div>        
                      </div>    
                     
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="password" class="form-control <?php echo(!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number,one uppercase, One lowercase letter, minimum 8 characters and one special character" required>
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="confirm_password" class="form-control <?php echo(!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Confirm Password">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>    
                        </div>
                      </div>
                      </div>                       
                      </div>    
                      <input type="hidden" name="status" class="form-control"  Value="1">     
                       <input type="submit"  class="btn btn-success mr-2" value="Add">
                        <button class="btn btn-light">Cancel</button>
                              
                  </form>                
                

                 

                </div>
                  </div>
                </div> 
            
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
function yesnoCheck() {
if (document.getElementById('yesCheck').checked) {
document.getElementById('ifYes').style.display = 'block';
}
else document.getElementById('ifYes').style.display = 'none';
}
</script>           
                  <script>
 $(document).ready(function(){
	
	 $('#usertype').on('change', function() {
		  
      if ( this.value == 'OEM')
      {
		$("#oem2").show();
		$("#support").hide();
      }
	  else if(this.value == 'Internal User')
	  {
		  $("#oem2").hide();
		  $("#support").show();
	  }
	  else
	  {
		  $("#oem2").hide();
		$("#support").hide();
	  }
    });
	
	
 });
 </script>       
         
        </div>