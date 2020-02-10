<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>

  <style>
 .addhead {
	 background-color:rgb(243, 242, 242);
	 display: flex;
     border: 1px solid transparent;
     border-radius: .25rem;
     font-size: .875rem;
 }
 .form1 {
	 border: 2px solid #efeaea !important;
}
 </style>
 <script>
 $(function() {
    $('#row_dim').hide(); 
    $('#type').change(function(){
        if($('#type').val() == 'parcel') {
            $('#row_dim').show(); 
        } else {
            $('#row_dim').hide(); 
        } 
    });
});
 </script>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
               <a href="<?php echo URLROOT; ?>/leads/leadstatus" class="btn btn-info"><i class="fa fa-backward"></i> Back </a>
            </div>
          </div>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="addhead">Lead Close</h4>                    
				   <form action="<?php echo URLROOT; ?>/leads/leadclose/<?php echo $data['id']; ?>" method="POST"  enctype="multipart/form-data">
				  <input type="hidden" name="lead_id" value="<?php echo $data['lead_id'];?>" />
            <input type="hidden" name="customertype" value="<?php echo $data['customertype'];?>" />
             <input type="hidden" name="customername" value="<?php echo $data['customername'];?>" />
              <input type="hidden" name="leadowner" value="<?php echo $data['leadowner'];?>" />
               <input type="hidden" name="company" value="<?php echo $data['company'];?>" />
                <input type="hidden" name="industry" value="<?php echo $data['industry'];?>" />
                 <input type="hidden" name="source" value="<?php echo $data['leadsource'];?>" />
                  <input type="hidden" name="phone" value="<?php echo $data['phone'];?>" />
                   <input type="hidden" name="mobile[]" value="<?php echo $data['mobile'][0];?>" />
                    <input type="hidden" name="email[]" value="<?php echo $data['email'][0];?>" />
                    <input type="hidden" name="assignee" value="<?php echo $data['assignee'];?>" />
                     <input type="hidden" name="leadstatus" value="<?php echo $data['leadstatus'];?>" />
                      <input type="hidden" name="status" value="<?php echo $data['status'];?>" />
                       <input type="hidden" name="oem" value="<?php echo $data['oem'];?>" />
                        <input type="hidden" name="vertical" value="<?php echo $data['vertical'];?>" />
                         <input type="hidden" name="product" value="<?php echo $data['product'];?>" />
                          <input type="hidden" name="ordervalue" value="<?php echo $data['ordervalue'];?>" />
                           <input type="hidden" name="closuredate" value="<?php echo $data['closuredate'];?>" />
						   <input type="hidden" name="period" value="<?php echo $data['period'];?>" />
                           <input type="hidden" name="created_at" value="<?php echo $data['created_at'];?>" />
				   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Closure Value<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						 <input type="number" name="closure_value" class="form-control" required="required"/> 
						 <span class="alert-danger"><?php echo $data['closedvalue_err']; ?></span>
						 </div>
                        </div>
                      </div>                    
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type Of Confirmation<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						  <select class="form-control" name="confirmation" required="required">
						  <option value="--Select--" disabled="disabled" selected="selected"></option>
						  <option value="PO Collected">PO Collected</option>
						  <option value="Email Received">Email Confirmation Received</option>
						  </select>
						 <span class="alert-danger"><?php echo $data['confirmation_err']; ?></span>
						 </div>
                        </div>
                      </div>                    
                    </div>
                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Payment Mode<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
              <select class="form-control" name="payment" required="required">
              <option value="--Select--" disabled="disabled" selected="selected">--Select--</option>
              <option value="30">30 days</option>
              <option value="60">60 days</option>
              <option value="90">90 days</option>
              </select>
             <span class="alert-danger"><?php echo $data['payment_err']; ?></span>
             </div>
                        </div>
                      </div>                    
                    </div>
					
				 <input type="hidden" name="status" value="Close" />
        
           
                    <div class="form-group row">
                        <div class="col-sm-8">                                            
                        <label class="col-md-12 col-form-label">Do you want to move this customer to service?</label>              

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
                          <label class="col-sm-3 col-form-label">AMC start Date</label>
                          <div class="col-sm-9">
                          <input type="date" name="date1" class="form-control"  placeholder="stary date">
                         
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">AMC End Date</label>
                          <div class="col-sm-9">
                         <input type="date" name="date2" class="form-control"  placeholder="end date">                  
                        </div>
                      </div>
                    </div>                       
                 </div> 
                
             <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row"> 
                            <label class="col-sm-3 col-form-label"> Required Service </label>
                          </div>
                        </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                       <div class="form-group row">
                       <?php 
                              $groups = $this->campaignModel->getService();           
                                ?>  
                                <?php foreach($groups as $each){ ?>                         
                          <div class="col-sm-3">
                            <div class="form-checkbox">
                              <label class="form-check-label">                              
                             <input type="checkbox" name="service[]" value="<?php echo $each->servicename; ?>"/><?php echo $each->servicename; ?>
                           
                             </label>
                            </div>
                          </div>
                          <?php } ?>    
                          <span class="alert-danger"><?php echo $data['service_err']; ?></span>    
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
         
					<div class="row">
				  <div class="col-sm-6">
				  <div class="form-group row">
				   <label class="col-sm-3 col-form-label"></label>
				  <div class="col-sm-9">
			   <input type="submit" style="background-color:rgba(27, 82, 151, 1);"  class="btn btn-success mr-2" value="Save">
			   <button type="reset" class="btn btn-light">Cancel</button>
			  
			   </div>
			   </div>
			   </div>
			   </div>
          </form>            
            </div>
                  </div>
                </div> 
<?php require APPROOT . '/views/inc/footer.php'; ?>            
</div>

