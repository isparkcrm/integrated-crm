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

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="addhead">Lead Postponed</h4>                    
				   <form action="<?php echo URLROOT; ?>/leads/leadpostponed/<?php echo $data['id']; ?>" method="POST"  enctype="multipart/form-data">
				   <input type="hidden" name="lead_id" value="<?php echo $data['lead_id'];?>" />
				   <input type="hidden" name="leadowner" value="<?php echo $data['leadowner'];?>" />
				   <input type="hidden" name="lname" value="<?php echo $data['lname'];?>" />
				   <input type="hidden" name="company" value="<?php echo $data['company'];?>" />
				   <input type="hidden" name="industry" value="<?php echo $data['industry'];?>" />
				   <input type="hidden" name="leadsource" value="<?php echo $data['leadsource'];?>" />
				   <input type="hidden" name="product" value="<?php echo $data['product'];?>" />
				   <input type="hidden" name="ordervalue" value="<?php echo $data['ordervalue'];?>" />
				   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postponed Date<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						 <input type="Date" name="postponeddate" class="form-control"/> 
						 <span class="alert-danger"><?php echo $data['postponeddate_err']; ?></span>
						 </div>
                        </div>
                      </div>                    
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postponed Reason</label>
						  <div class="col-sm-9"  >
						   <textarea class="form-control" name="postponedreason" placeholder="Postponed Reason" rows="4" cols="50"></textarea>
						    <span class="alert-danger"><?php echo $data['postponedreason_err']; ?></span>
                        </div>
                      </div>
                  </div>
				 <input type="hidden" name="status" value="Postponed" />
				 </div>
					<div class="row">
				  <div class="col-sm-6">
				  <div class="form-group row">
				   <label class="col-sm-3 col-form-label"></label>
				  <div class="col-sm-9">
			   <input type="submit" style="background-color:rgba(27, 82, 151, 1);"  class="btn btn-success mr-2" value="Save">
			   <button type="reset" class="btn btn-light">Cancel</button>
			    
            <a href="<?php echo URLROOT; ?>/leads/leadstatus" class="btn btn-info"><i class="fa fa-backward"></i> Back </a>
            
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

