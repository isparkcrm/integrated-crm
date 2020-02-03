<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>

          <div class="card card-body mb-3">
       <div class="bg-light p-2 mb-3">
       <strong> <?php echo $data['subject']; ?></strong> <br>
      Ticket Number <strong> <?php echo $data['ticketID']; ?></strong>  Created By <strong> <?php echo $data['clientID']; ?></strong> on  <?php echo $data['created_at']; ?>
      </div>
     <h6><span class="badge badge-pill badge-primary">Severity:  <?php echo $data['severity']; ?></span>
      <span class="badge badge-pill badge-success">Status:  <?php echo $data['status']; ?></span>
      </h6> 
     
      <p class="card-text"> Issue :  <?php echo $data['description']; ?></p>
     <!-- <a href="show_tickets.php" class="btn btn-dark">More</a> -->
      <p class="card-text">Assignee:<strong> <?php echo $data['assigned_to']; ?></strong></p>
      <?php 
      if($data['attachment']==''){
        ?>
       <p class="card-text">Attachment:<strong><?php echo " No attachments"; ?></strong></p>
       <?php
      }
      else{
        ?>
         <p class="card-text">Attachment:<strong><?php echo $data['attachment']; ?> </strong>  <a href="<?php echo URLROOT; ?>/uploads/<?php echo $data['attachment']; ?>" style="padding-left: 10px;" target="_blank">Download</a>   </p>
         <?php
      }
     ?>


    </div>
    <?php
    $ticketID=$data['ticketID'];
    ?>
       <a href="<?php echo URLROOT; ?>/departments/Reassign/<?php echo $ticketID; ?>"  class="btn btn-primary"> Assign </a>
       <a href="<?php echo URLROOT; ?>/departments/update/<?php echo $ticketID; ?>"  class="btn btn-info"> Update </a>
       <a href="<?php echo URLROOT; ?>/departments/close/<?php echo $ticketID; ?>" class="btn btn-success"> Close</a>
       <a href="<?php echo URLROOT; ?>/departments/status/<?php echo $ticketID; ?>" class="btn btn-dark"> View Updates</a>

       <br>
       <br>
       
   
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
               
                  <h4 class="card-title">Close Ticket</h4>                     
                       <form action="<?php echo URLROOT; ?>/departments/close/<?php echo $data['ticketID']; ?>" method="post" enctype="multipart/form-data">  
                       <input type="hidden" class='form-control' name='title'  value="<?php echo $data['subject']; ?>">
                       <input type="hidden" class='form-control' name='email'  value="<?php echo $data['email']; ?>">
                       <input type="hidden" class='form-control' name='number'  value="<?php echo $data['number']; ?>">
                       <input type="hidden" class='form-control' name='client'  value="<?php echo $data['clientID']; ?>">
                       <input type="hidden" class='form-control' name='ticketID'  value="<?php echo $data['ticketID']; ?>">
                       <input type="hidden" class='form-control' name='description'  value="<?php echo $data['description']; ?>">
                       <input type="hidden" class='form-control' name='severity'  value="<?php echo $data['severity']; ?>">
                       <input type="hidden" class='form-control' name='campaignID'  value="<?php echo $data['campaign']; ?>">         
                       <input type="hidden" class='form-control' name='process'  value="<?php echo $data['process']; ?>">
                       <input type="hidden" class='form-control' name='assigned_to'  value="<?php echo $data['assigned_to']; ?>">
                       <input type="hidden" class='form-control' name='date'  value="<?php echo $data['created_at']; ?>">
                       <input type="hidden" class='form-control' name='status_new'  value="Close">
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
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Action Taken<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <textarea class='form-control' name='action' required="required"> </textarea>                     
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">                                            
                        <label class="col-md-12 col-form-label">Do you want to Enter knowledge based informatiom?</label>              

                       <div class="col-md-9">
                        <div class="form-group row">                          
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="info" id="yesCheck" value="yes" onclick="javascript:yesnoCheck();"> Yes
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label"></label>
                               <input type="radio" class="form-check-input" name="info" id="noCheck" value="no" onclick="javascript:yesnoCheck();"> No
                              
                            </div>
                          </div>
                        </div>
                      </div>              
                                            

<div id="ifYes" style="display:none">
<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject</label>
                          <div class="col-sm-9">
                          <input type="text" name="title1" class="form-control <?php echo(!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"  placeholder="subject">
                          <span ><?php echo $data['title_err']; ?></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                          <textarea name="description1" class="form-control <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"  placeholder="description"></textarea>                         
                          <span> <?php echo $data['description_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
                 <div class="row">                

                 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keyword</label>
                          <div class="col-sm-9">
                          <input type="text" name="keyword" class="form-control <?php echo(!empty($data['key_err'])) ? 'is-invalid' : ''; ?>"  placeholder="subject">
                          <span ><?php echo $data['key_err']; ?></span>
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
                          <div class="col-sm-9">
                          <input type="hidden" name="version" class="form-control"  placeholder="version" value="1.0">                          
                        </div>
                      </div>
                      </div>                   
                 </div>
</div>
<script>
function yesnoCheck() {
if (document.getElementById('yesCheck').checked) {
document.getElementById('ifYes').style.display = 'block';
}
else document.getElementById('ifYes').style.display = 'none';

}
</script>

                           </div>
                           </div>    
                        
                     
                       <input type="submit"  class="btn btn-success mr-2" value="Close">
                      
                              
                  </form>            
            </div>
                  </div>
                </div> 
              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>