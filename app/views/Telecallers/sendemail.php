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
                  <h4 class="addhead">Send Email</h4>                    
				   <form action="<?php echo URLROOT; ?>/telecaller/sendemail/<?php echo $data['id']; ?>" method="POST"  enctype="multipart/form-data">
           
				   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email To<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						 <label > <?php echo $data['email'];?></label>
						 <input type="hidden" name="email" value="<?php echo $data['email'];?>" class="form-control"/> 
						 </div>
                        </div>
                      </div>                    
                    </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						  <label><?php echo $data['subject'];?></label>
						 <input type="hidden" name="subject" value="<?php echo $data['subject'];?>" class="form-control"/> 
						 
						 </div>
                        </div>
                      </div>                    
                    </div>
					<input type="hidden" name="lead_id" value="<?php echo $data['lead_id'];?>">
					<input type="hidden" name="campaign_ID" value="<?php echo $data['campaign_ID'];?>">
					<input type="hidden" name="assignee" value="<?php echo $data['assignee'];?>">
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
						  <div class="col-sm-9"  >
						   <textarea class="form-control" name="description"  rows="4" cols="50"></textarea>
						   
                        </div>
                      </div>
                  </div>
				 </div>
				<div class="row">
				<div class="col-sm-6">
				<div class="form-group row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">
			   <input type="submit" style="background-color:rgba(27, 82, 151, 1);"  class="btn btn-success mr-2" value="Send Email">
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

