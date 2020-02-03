<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

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
                  <h4 class="card-title">Edit Notification Rule</h4>                     
               <form action="<?php echo URLROOT; ?>/clients/notification_edit/<?php echo $data['id']; ?>" method="post">                                       
                   
               <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Activity</label>
                          <div class="col-sm-9">
                          <select class="form-control"  name="activity" id="activity">   
                          <option><?php echo $data['activity']?> </option> 
                           <option> Create </option>
                           <option> Update </option>
                             <option>Close </option>
                             <option>Re-Assign</option>
                             <option>SLA Violations</option>
                             </select>                          
                          </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Notification</label>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cust_notification" id="sms" value="sms" <?php echo ($data['customer']== 'sms') ?  "checked" : "" ;  ?>> SMS
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cust_notification" id="email" value="email"<?php echo ($data['customer']== 'email') ?  "checked" : "" ;  ?>> Email
                              </label>
                            </div>
                          </div>
              <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cust_notification" id="whatsapp" value="whatsapp"<?php echo ($data['customer']== 'whatsapp') ?  "checked" : "" ;  ?>>Whats App
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Helpdesk Notification</label>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hd_notification" id="sms" value="sms" <?php echo ($data['helpdesk']== 'sms') ?  "checked" : "" ;  ?>> SMS
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hd_notification" id="email" value="email" <?php echo ($data['helpdesk']== 'email') ?  "checked" : "" ;  ?>> Email
                              </label>
                            </div>
                          </div>
              <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hd_notification" id="whatsapp" value="whatsapp" <?php echo ($data['helpdesk']== 'whatsapp') ?  "checked" : "" ;  ?>>Whats App
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>                     
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer SMS Message</label>
                          <div class="col-sm-9">
                           <textarea name="message2" class="form-control" required="required"><?php echo $data['sms']?></textarea>
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Email Message</label>
                          <div class="col-sm-9">
                           <textarea name="message1" class="form-control" required="required"><?php echo $data['email']?></textarea>
                          </div>                          
                        </div>
                      </div>                        
                      </div>      
                            <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Helpdesk SMS Message</label>
                          <div class="col-sm-9">
                           <textarea name="message4" class="form-control" required="required"><?php echo $data['sms1']?></textarea>
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Helpdesk Email Message</label>
                          <div class="col-sm-9">
                           <textarea name="message3" class="form-control" required="required"><?php echo $data['email1']?></textarea>
                          </div>                          
                        </div>
                      </div>                        
                      </div> 
                        <input type="submit"  class="btn btn-success mr-2" value="Update">
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
              
   

<script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>  
<style type="text/css">
  table td > .wrap { 
    text-overflow:ellipsis;
  overflow: hidden;
  white-space: nowrap; 
  text-align: left;
  }  
table{
    table-layout: fixed;
}
</style>
         
</div>

