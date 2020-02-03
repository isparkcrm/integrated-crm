
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
  
    
    
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT;?>/public/css/summernote/dist/summernote.css">
<style>
.popover-content
{
	display:none;
}
</style>

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
               
                  <h4 class="card-title">Send Email</h4>                     
                       <form action="<?php echo URLROOT; ?>/departments/sendmail/<?php echo $data['ticketID']; ?>" method="post" enctype="multipart/form-data">    
                     
                       <input type="hidden" class='form-control' name='email'  value="<?php echo $data['email']; ?>">
                       
                       <input type="hidden" class='form-control' name='ticketID'  value="<?php echo $data['ticketID']; ?>">
                      
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                       
                          <div class="col-sm-9">                         
                          <input type="hidden"  class='form-control' name='title' value="<?php echo $data['subject']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                  
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Message<sup>*</sup></label>
                          <div class="col-sm-12">                         
                          <textarea class="form-control summernote" rows="4" cols="5" name='description' required="required"> </textarea>                     
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                  
                    </div>                       
                     
                    <div class="row">                     
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Attachment</label>
                          <div class="col-sm-9">
                            <!--   <input type="hidden" name="MAX_FILE_SIZE" value="50000000"/> -->
                            <input type="file" name="photo" class='form-control <?php echo(!empty($data['file_err'])) ? 'is-invalid' : ''; ?>"'/>
                            <span ><?php echo $data['file_err']; ?>  </span>       
                        </div>
                      </div>
                      </div>                   
                 </div>
                       <input type="submit"  class="btn btn-success mr-2" value="Send">
                      
                              
                  </form>            
            </div>
                  </div>
                </div> 
              
<?php require APPROOT . '/views/inc/footer.php'; ?>




<script src="<?php echo URLROOT;?>/public/css/summernote/dist/summernote.min.js"></script>

   
         
		  <script type="text/javascript">
      (function(jQuery){
           $('input').iCheck({
              checkboxClass: 'icheckbox_flat-red',
              radioClass: 'iradio_flat-red'
            });

              $('.summernote').summernote({
                height: 300
				
              });
        })(jQuery);
     </script>
        </div>