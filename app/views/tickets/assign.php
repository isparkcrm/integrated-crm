<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/service_head.php'; ?>

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
       <a href="<?php echo URLROOT; ?>/tickets/assign/<?php echo $ticketID; ?>"  class="btn btn-primary"> Assign </a>
       <a href="<?php echo URLROOT; ?>/tickets/status/<?php echo $ticketID; ?>" class="btn btn-primary"> View Update</a>
   <br>
   <br>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
               
                  <h4 class="card-title">Assign Ticket</h4>                     
                       <form action="<?php echo URLROOT; ?>/tickets/assign/<?php echo $data['ticketID']; ?>" method="post">                                       
                       <input type="hidden" class='form-control' name='ticketID'  value="<?php echo $data['ticketID']; ?>">
                       <input type="hidden" class='form-control' name='campaign'  value="<?php echo $data['campaign']; ?>">
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
                            <label class="col-sm-3 col-form-label">Select Assignee<sup>*</sup></label>
                              <?php 
                              $campaignID=$data['campaign'];
                            $groups = $this->ticketModel->getCampaignAgent($campaignID);  
                                ?>                     
                        <div class="col-sm-9">
						<select class='form-control' name='assigned_to'>
                          <option value="" disabled="disabled" selected="selected"> Select asslgnee.. </option>
                          <?php foreach($groups as $each){ ?>
                            <option value="<?php echo $each->username; ?>"><?php echo $each->username; ?>&nbsp;&nbsp;(<?php echo $each->role; ?>)</option>
                           <?php } ?>       
                           </select>                                      
                           <input type="hidden" name="role" value="<?php echo $each->role;?>"/>                      
                        </div>
                      </div>
                    </div>                                          
                 </div> 
                    <input type="submit"  class="btn btn-success mr-2" value="Assign">
                      
                              
                  </form>            
            </div>
                  </div>
                </div> 
              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>