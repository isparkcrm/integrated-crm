<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
 
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
            <a href="<?php echo URLROOT; ?>/posts/showusers" class="btn btn-info"><i class="fa fa-backward"></i> Back >></a>
            </div>
          </div>
  <div class="card card-body bg-light mt-5"> 
    <h2>Edit User</h2>
    <p>Update a ticket with this form</p>   

    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['userID']; ?>" method="post">
    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Role<sup>*</sup></label>
                          <?php 
                $groups = $this->clientModel->getRole();
                ?>
                          <div class="col-sm-9">
                          <select class='form-control <?php echo(!empty($data['usertype_err'])) ? 'is-invalid' : ''; ?>"' id='usertype' name='usertype' required='required'> 
                          <option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>                        
                            <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->role; ?>"><?php echo $each->role; ?></option>';    <?php } ?>
                            </select>                              
                        <span class="invalid-feedback"><?php echo $data['usertype_err']; ?></span>                                                    
                          </div>
                        </div>
                      </div>                      
                    </div>                  
                  
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employee ID</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['emp_id_err'])) ? 'is-invalid' : ''; ?>"' name='emp_id' required="required" value="<?php echo $data['emp_id']; ?>">
                           <span class="invalid-feedback"><?php echo $data['emp_id_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['usernaame_err'])) ? 'is-invalid' : ''; ?>"' name='username' required="required" value="<?php echo $data['username']; ?>">
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
                           <input type="email"  class='form-control <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"' name='email'  required="required" value="<?php echo $data['email']; ?>">
                           <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                           <input type="text"  class='form-control <?php echo(!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"' name='name' required="required" value="<?php echo $data['name']; ?>">
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
                           <input type="text"  class='form-control <?php echo(!empty($data['number_err'])) ? 'is-invalid' : ''; ?>"' name='number' required="required" value="<?php echo $data['number']; ?>">
                           <span class="invalid-feedback"><?php echo $data['number_err']; ?></span>       
                        </div>
                      </div>
                      </div>
                      </div>        
                       <input type="submit"  class="btn btn-success mr-2" value="Update">
                        <button class="btn btn-light">Cancel</button>
                              
                  </form>                
                
  </div>


  </div>
                  </div>
                </div> 
  <?php require APPROOT . '/views/inc/footer.php'; ?>
 </div>
