<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                          <select class='js-select2 <?php echo(!empty($data['usertype_err'])) ? 'is-invalid' : ''; ?>"' id='usertype' name='usertype' required='required'> 
                          <option value="" disabled="disabled" selected="selected"> Select catagory.. </option>
                            <option value="Internal User"> Internal User </option> 
                            <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->client_ID; ?>"><?php echo $each->clientname; ?></option>';    <?php } ?>
                            </select>                              
                        <span class="alert-danger"><?php echo $data['usertype_err']; ?></span>                                                    
                          </div>
                        </div>
                      </div>                      
                    </div>                  
                    <div class="row" id="support">       
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
                           <span class="alert-danger"><?php echo $data['emp_id_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['usernaame_err'])) ? 'is-invalid' : ''; ?>"' name='username' required="required">
                           <span class="alert-danger"><?php echo $data['username_err']; ?></span>       
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
                           <span class="alert-danger"><?php echo $data['email_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control' name='name'>
                           <span class="alert-danger"><?php echo $data['name_err']; ?></span>       
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
                           <span class="alert-danger"><?php echo $data['number_err']; ?></span>       
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
                        <span class="alert-danger"><?php echo $data['password_err']; ?></span>
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="confirm_password" class="form-control <?php echo(!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Confirm Password">
                        <span class="alert-danger"><?php echo $data['confirm_password_err']; ?></span>    
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
			
                <script>
  $('#usertype').on('change', function() {
  if ( this.value == 'Internal User')
    $("#support").show();     
  else
    $("#support").hide();
}).trigger("change"); 
                </script>
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
$(document).ready(function() {
  
  $(".js-select2").select2();
  
  $(".js-select2-multi").select2();

  $(".large").select2({
    dropdownCssClass: "big-drop",
  });
  
});
</script>
		<style>
		.form-control {
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: none;
  margin-bottom: 15px;
}
.form-control:hover, .form-control:focus, .form-control:active {
  box-shadow: none;
}
.form-control:focus {
  border: 1px solid #34495e;
}

.select2.select2-container {
  width: 100% !important;
}

.select2.select2-container .select2-selection {
  border: 1px solid #1dc3d8;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  height: 34px;
  margin-bottom: 15px;
  outline: none;
  transition: all 0.15s ease-in-out;
}

.select2.select2-container .select2-selection .select2-selection__rendered {
  color: #333;
  line-height: 32px;
  padding-right: 33px;
}

.select2.select2-container .select2-selection .select2-selection__arrow {
  background: #ffffff;
  border-left: 1px solid #1dc3d8;
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
  height: 32px;
  width: 33px;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
  background: #f8f8f8;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
  border: 1px solid #1dc3d8;
}

.select2.select2-container.select2-container--focus .select2-selection {
  border: 1px solid #1dc3d8;
}

.select2.select2-container .select2-selection--multiple {
  height: auto;
  min-height: 34px;
}

.select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
  margin-top: 0;
  height: 32px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__rendered {
  display: block;
  padding: 0 4px;
  line-height: 29px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice {
  background-color: #f8f8f8;
  border: 1px solid #1dc3d8;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  margin: 4px 4px 0 0;
  padding: 0 6px 0 22px;
  height: 24px;
  line-height: 24px;
  font-size: 12px;
  position: relative;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
  position: absolute;
  top: 0;
  left: 0;
  height: 22px;
  width: 22px;
  margin: 0;
  text-align: center;
  color: #1dc3d8;
  font-weight: bold;
  font-size: 16px;
}

.select2-container .select2-dropdown {
  background: transparent;
  border: none;
  margin-top: -5px;
}

.select2-container .select2-dropdown .select2-search {
  padding: 0;
}

.select2-container .select2-dropdown .select2-search input {
  outline: none;
  border: 1px solid #1dc3d8;
  border-bottom: none;
  padding: 4px 6px;
}

.select2-container .select2-dropdown .select2-results {
  padding: 0;
}

.select2-container .select2-dropdown .select2-results ul {
  background: #fff;
  border: 1px solid #34495e;
}

.select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
  background-color: #3498db;
}

.big-drop {
  width: 600px !important;
}

		</style>
         
        </div>