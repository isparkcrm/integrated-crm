<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_plain.php'; ?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>

<?php
$email=$_SESSION['email'];
?>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <?php flash('post_message'); ?>
                  <h4 class="card-title">Change Password</h4>                     
                  <form action="<?php echo URLROOT; ?>/posts/change" method="post">       
                         
                    <input type="hidden"  class='form-control' name='email' value="<?php echo $email; ?>">
                            
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Old Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="old_password" class="form-control <?php echo(!empty($data['old_password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Old Password"  required>
                        <span class="invalid-feedback"><?php echo $data['old_password_err']; ?></span>
                          </div>
                        </div>
                      </div>
                    </div>                       
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">New Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="new_password" class="form-control <?php echo(!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number,one uppercase, One lowercase letter, minimum 8 characters and one special character" required>
                          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                          </div>
                        </div>
                      </div>                                          
                    </div>  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="cnfm_password" class="form-control <?php echo(!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Confirm Password">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>  
                          </div>
                        </div>
                      </div>                                          
                    </div>   
                       <input type="hidden" name="status" class="form-control"  Value="2">  
                       <?php
                       date_default_timezone_set("Asia/Kolkata");
                       $curdatetime = date("Y-m-d H:i:s");
                       ?>  
                        <input type="hidden" name="updated_at" class="form-control"  Value="<?php echo $curdatetime;?>">   
                       <input type="submit"  class="btn btn-success mr-2" value="Submit">
                        <button type="reset" value="Reset" class="btn btn-light">Cancel</button>
                              
                  </form>
                   <br>
                   <br>
         

                                        </div>
                  </div>
                </div>             
              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>