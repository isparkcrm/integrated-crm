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
 $(document).ready(function(){
	
	 $('#actiontaken').on('change', function() {
		  
      if ( this.value == '4')
      {
		$("#proposal").show();
      }
	 
	  else
	  {
		  $("#proposal").hide();
	  }
    });
	
	
 });
 </script>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="addhead">Update Status</h4>                    
				   <form action="<?php echo URLROOT; ?>/leads/leadupdate/<?php echo $data['id']; ?>" method="POST"  enctype="multipart/form-data">
				   <input type="hidden" name="lead_id" value="<?php echo $data['lead_id'];?>" />
				    <input type="hidden" name="customertype" value="<?php echo $data['customertype'];?>" />
				     <input type="hidden" name="customername" value="<?php echo $data['customername'];?>" />
				      <input type="hidden" name="leadowner" value="<?php echo $data['leadowner'];?>" />
				       <input type="hidden" name="company" value="<?php echo $data['company'];?>" />
				        <input type="hidden" name="industry" value="<?php echo $data['leadindustry'];?>" />
				         <input type="hidden" name="source" value="<?php echo $data['leadsource'];?>" />
				          <input type="hidden" name="phone" value="<?php echo $data['phone'];?>" />
				           <input type="hidden" name="mobile[]" value="<?php echo $data['mobile'][0];?>" />
				            <input type="hidden" name="email[]" value="<?php echo $data['email'][0];?>" />
				            <input type="hidden" name="assignee" value="<?php echo $data['assignee'];?>" />
				             <input type="hidden" name="leadstatus" value="<?php echo $data['leadstatus'];?>" />
				              <input type="hidden" name="status" value="<?php echo $data['status'];?>" />
				               <input type="hidden" name="oem" value="<?php echo $data['oem'];?>" />
				                <input type="hidden" name="vertical" value="<?php echo $data['leadvertical'];?>" />
				                 <input type="hidden" name="product" value="<?php echo $data['product'];?>" />
				                  <input type="hidden" name="ordervalue" value="<?php echo $data['ordervalue'];?>" />
				                   <input type="hidden" name="closuredate" value="<?php echo $data['closuredate'];?>" />
				                   <input type="hidden" name="created_at" value="<?php echo $data['created_at'];?>" />
				   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Action Taken<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						  
						 <select name="actiontaken" class="form-control" id="actiontaken">
						 <option value="--Select--" selected="selected" disabled="disabled">--Select--</option>
						 <?php foreach ($data['actiontaken'] as $actions) :?>
						 <option value="<?php echo $actions->id;?>"><?php echo $actions->actiontaken;?></option>
						<?php endforeach;?>						
						</select>
						 </div>
                        </div>
                      </div>                    
                    </div>
				<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row" style="display:none;" id="proposal">
                          <label class="col-sm-3 col-form-label">Upload Proposal</label>
						  <div class="col-sm-9"  >
						   <input type="file" name="proposal" class='form-control'/>
                        </div>
                      </div>
                  </div>
				 </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Next Action</label>
						  <div class="col-sm-4">
						   <textarea  rows="4" id="GFG" cols="43" class="form1" placeholder="Next Action"  name="nextaction"></textarea>
                        </div>
                      </div>
                  </div>
				 
				  </div> 
				  <div class="row">
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Next Action Date</label>
                          <div class="col-sm-9">
                          <input type="date" name="nextactiondate" class="form-control"  placeholder="Next Action Date">
                        </div>
                      </div>
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
				<div class="row">
				<div class="col-md-12">
				<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
              <thead>
					<tr>
						  <th>S.No</th>
						  <th>Lead ID</th>  
						  <th>Action Taken</th>   
						  <th>Next Action</th>                  
						  <th>Next Action Date</th>				  
					</tr>
              </thead`````>
              <tbody id="myTable">
			   <?php foreach($data['updatelist'] as $updates):?>
				 <tr>
					  <td><div class="wrap"><?php echo $updates->id;?></div></td>
                    <td><div class="wrap"><?php echo $updates->lead_id;?></div></td> 
                    <td><div class="wrap"><?php echo $updates->actiontaken;?></div></td>  
                    <td><div class="wrap"><?php echo $updates->nextaction;?></div></td>            
                    <td><div class="wrap"><?php echo $updates->nextactiondate;?></div></td>        
				 </tr> 
				<?php endforeach;?>
			  </tbody>
          </table>
        </div>           
	   </div>
		</div>
				</div>
				</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>            
</div>

