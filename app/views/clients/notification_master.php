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
                  <h4 class="card-title">Create Notification Rule</h4>                     
               <form action="<?php echo URLROOT; ?>/clients/notification_master" method="post">                                       
                   
               <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Activity</label>
                          <div class="col-sm-9">
                          <select class="form-control"  name="activity" id="activity">    
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
                                <input type="radio" class="form-check-input" name="cust_notification" id="sms" value="sms"> SMS
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cust_notification" id="email" value="email"> Email
                              </label>
                            </div>
                          </div>
                        <!--  <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cust_notification" id="whatsapp" value="whatsapp"> Whatsapp
                              </label>
                            </div>
                          </div> --> 
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Helpdesk Notification</label>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hd_notification" id="sms" value="sms"> SMS
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hd_notification" id="email" value="email"> Email
                              </label>
                            </div>
                          </div>
                        <!--  <div class="col-sm-2">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="hd_notification" id="whatsapp" value="whatsapp"> Whatsapp
                              </label>
                            </div>
                          </div> -->
                        </div>
                      </div>                     
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer SMS Message</label>
                          <div class="col-sm-9">
                           <textarea name="message2" class="form-control" required="required"></textarea>
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Email Message</label>
                          <div class="col-sm-9">
                           <textarea name="message1" class="form-control" required="required"></textarea>
                          </div>                          
                        </div>
                      </div>                        
                      </div>      
                            <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Helpdesk SMS Message</label>
                          <div class="col-sm-9">
                           <textarea name="message4" class="form-control" required="required"></textarea>
                        </div>
                      </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Helpdesk Email Message</label>
                          <div class="col-sm-9">
                           <textarea name="message3" class="form-control" required="required"></textarea>
                          </div>                          
                        </div>
                      </div>                        
                      </div> 
                        <input type="submit"  class="btn btn-success mr-2" value="Add">
                        <button type="reset" class="btn btn-light">Cancel</button>
                              
                  </form>            
            </div>
        </div>
    </div> 
	<div class="col-12 grid-margin">
              
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
	
           <div class="table-responsive">
				<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                    <th>S.NO</th>
                          <th>Activity</th>
                          <th>HD-Notificatin</th>    
                          <th>cust-Notification</th>
                          <th>Cust-email</th>  
                          <th>Cust-SMS</th>    
                           <th>HD-email</th>  
                          <th>HD-SMS</th> 
                          <th style="display:none;"></th> 
				    </tr>
                  </thead>
				
               <tbody>
			     <?php foreach($data['getnotification'] as $service) : ?>      
                 <tr>
				    <td><div class="wrap"><?php echo $service->id;?></div></td>
                    <td><div class="wrap"><?php echo $service->activity; ?></div></td> 
                    <td><div class="wrap"><?php echo $service->hd_notification; ?></div></td>   
                    <td><div class="wrap"><?php echo $service->cust_notification; ?></div></td>   
                    <td><div class="wrap"><?php echo $service->email; ?></div></td>   
                    <td><div class="wrap"><?php echo $service->sms; ?></div></td>   
                    <td><div class="wrap"><?php echo $service->email1; ?></div></td>   
                    <td><div class="wrap"><?php echo $service->sms1; ?></div></td>   
                   <td>
					<div class="wrap"> <a href="<?php echo URLROOT; ?>/Clients/notification_edit/<?php echo $service->id; ?>" class="btn btn-primary">Edit</a>  
				</div>
					</td>
				
					</tr> 
                <?php endforeach; ?>                               
            </tbody>
          </table>
        </div>
       </div>
     </div>
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

