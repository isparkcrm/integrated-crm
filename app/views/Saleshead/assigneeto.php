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
                  <h4 class="addhead">Assign To Account Manager</h4>                    
				   <form action="<?php echo URLROOT; ?>/saleshead/assignedto/<?php echo $data['id']; ?>" method="POST"  enctype="multipart/form-data">
				   <input type="hidden" name="lead_id" value="<?php echo $data['lead_id'];?>" />
				   <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
				   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select User<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						 <select name="users" class="form-control">
						 <option value="--Select--" selected="selected" readonly="readonly">--Select--</option>
						 <?php foreach($data['users'] as $user):?>
						 <option value="<?php echo $user->email?>"><?php echo $user->username?></option>
						 <?php endforeach;?>
						 </select>
						 </div>
                        </div>
                      </div>                    
                    </div>
				 <input type="hidden" name="status" value="Assigned" />
					<div class="row">
				  <div class="col-sm-6">
				  <div class="form-group row">
				   <label class="col-sm-3 col-form-label"></label>
				  <div class="col-sm-9">
			   <input type="submit" style="background-color:rgba(27, 82, 151, 1);"  class="btn btn-success mr-2" value="Assign">
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

