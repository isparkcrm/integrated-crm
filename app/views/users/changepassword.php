<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
            <img src="images/logo.jpg" alt="logo" />

            <form action="<?php echo URLROOT; ?>/users/changepassword" method="post">       
                         
                         <input type="hidden"  class='form-control' name='email' value="<?php echo $data['email']; ?>">
                                 
                                              
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
                          
                            <?php
                            date_default_timezone_set("Asia/Kolkata");
                            $curdatetime = date("Y-m-d H:i:s");
                            ?>  
                             <input type="hidden" name="updated_at" class="form-control"  Value="<?php echo $curdatetime;?>">   
                            <input type="submit"  class="btn btn-success mr-2" value="Submit">
                             <button type="reset" value="Reset" class="btn btn-light">Cancel</button>
                                   
                       </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  
    <style type="text/css">
   .error p {
   color:#FF0000;
   font-size:20px;
   font-weight:bold;
   margin:50px;
   }
</style>
