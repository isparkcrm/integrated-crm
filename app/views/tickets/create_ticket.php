<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/customer.php'; ?>

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
                  <?php
                  $usertype= $_SESSION['usertype'];   
                  $number= $_SESSION['number'];                
                    ?>                     
        <form action="<?php echo URLROOT; ?>/tickets/create_ticket" method="post" enctype="multipart/form-data">  
                                          
        <input type="hidden" name="client" class="form-control" Value="<?php echo $usertype; ?>">
        <input type="hidden" name="email" class="form-control" Value="<?php echo $_SESSION['email']; ?>">
        <input type="hidden" name="number" class="form-control" Value="<?php echo $_SESSION['number']; ?>">
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject</label>
                          <div class="col-sm-9">
                          <input type="text" name="title" class="form-control <?php echo(!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"  placeholder="subject"  required>
                          <span ><?php echo $data['title_err']; ?></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                          <textarea name="description" class="form-control <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"  placeholder="description" required></textarea>                         
                          <span> <?php echo $data['description_err']; ?> </span>   
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
                          <span ><?php echo $data['severity_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>  

                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Document</label>
                          <div class="col-sm-9">
                            <!--   <input type="hidden" name="MAX_FILE_SIZE" value="50000000"/> -->
                            <input type="file" name="photo" class='form-control <?php echo(!empty($data['file_err'])) ? 'is-invalid' : ''; ?>"'/>
                            <span ><?php echo $data['file_err']; ?>  </span>       
                        </div>
                      </div>
                      </div>                   
                 </div>
                 <div class="row">
					<div class="col-md-6">
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Support For<sup>*</sup></label>
                              <?php 
                            $groups = $this->ticketModel->ServicenameByid($usertype);  
                                ?>                     
                        <div class="col-sm-9">
												<select class='form-control <?php echo(!empty($data['processtype_err'])) ? 'is-invalid' : ''; ?>"' name='processtype'>
                          <option value="" disabled="disabled" selected="selected"> Select Process.. </option>
                          <?php foreach($groups as $each){ ?>
                            <option value="<?php echo $each->service_id; ?>"><?php echo $each->service; ?></option>;
                           <?php } ?>       
                           </select>                                      
													 <span class="alert-danger"><?php echo $data['processtype_err']; ?></span>                                                
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
               <!-- <script>
                $('#supporttype').on('change', function() {
  if ( this.value == 'Onsite')
    $("#support").show();     
  else
    $("#support").hide();
}).trigger("change"); 
                </script> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>       
</div>