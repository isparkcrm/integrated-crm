 <?php  require APPROOT . '/views/inc/header.php'; ?>
<?php //require APPROOT . '/views/inc/navbar_plain.php'; ?> 

<div class="main-panel">
        <div class="content-wrapper">   
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>

       
   
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <?php flash('accept_success'); ?>
                  <h4 class="card-title">Close Ticket</h4>                     
                       <form action="<?php echo URLROOT; ?>/helpdesk/customer_accept/<?php echo $data['ticketID']; ?>" method="post">  
                                             
                       <input type="hidden" class='form-control' name='number'  value="<?php echo $data['number']; ?>">
                       <input type="hidden" class='form-control' name='client'  value="<?php echo $data['clientID']; ?>">                   
                       <input type="hidden" class='form-control' name='severity'  value="<?php echo $data['severity']; ?>">
                       <input type="hidden" class='form-control' name='campaignID'  value="<?php echo $data['campaign']; ?>">         
                       <input type="hidden" class='form-control' name='process'  value="<?php echo $data['process']; ?>">               
                       <input type="hidden" class='form-control' name='status_new'  value="Close">
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                        
                          <label class="col-sm-3 col-form-label">Email<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='email' required="required" value="<?php echo $data['email']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>        
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ticket ID<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='ticketID'  value="<?php echo $data['ticketID']; ?>" readonly>                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                             
                    </div>
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='subject' required="required" value="<?php echo $data['subject']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>        
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ticket ID<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='ticketID'  value="<?php echo $data['ticketID']; ?>" readonly>                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                             
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <textarea  class='form-control' name='description' required="required"><?php echo $data['description']; ?></textarea>                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>        
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Severity<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='severity' required="required" value="<?php echo $data['severity']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                
                    </div>
                
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Assigned To<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text" class='form-control' name='assigned_to'  value="<?php echo $data['assigned_to']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>        
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Created Date<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text" class='form-control' name='date'  value="<?php echo $data['created_at']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                
                    </div>
                     
                       <input type="submit"  class="btn btn-success mr-2" value="Accept">
                      
                              
                  </form>            
            </div>
                  </div>
                </div> 
              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>