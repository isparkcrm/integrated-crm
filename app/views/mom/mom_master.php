<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
		  
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Minutes of Meeting</h4>                     
       <form action="<?php echo URLROOT; ?>/mom/mom_master/<?php echo $data['id'];?>" method="post" enctype="multipart/form-data">          
	   
				<input type="hidden"  value="<?php echo $data['username'];?>" name="username" class="form-control" />  
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lead ID<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" readonly value="<?php echo $data['lead_id'];?>" name="lead_id" class="form-control" />  
							</div>
                        </div>
                      </div>
					  </div>
					  <div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" readonly value="<?php echo $data['customername'];?>" name="customername" class="form-control" />  
							</div>
                        </div>
                      </div>
					  </div>
					  <div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" readonly value="<?php echo $data['customeremail'];?>" name="customeremail" class="form-control" />  
							</div>
                        </div>
                      </div>
					  </div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Meeting Name<sup>*</sup></label>
                          <div class="col-sm-9">
							<select name="meetingname" class="form-control">
								<option readonly value="--Select--" selected="selected" >--Select--</option>
								<?php foreach($data['getmeetinginfo'] as $meeting):?>
								<option><?php echo $meeting->subject;?></option>
								<?php endforeach;?>
							</select>
							</div>
                        </div>
                      </div>
					  </div>
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">MoM Upload<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="momupload"/>    
						  
                          </div>
                        </div>
                      </div>   
                     </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description<sup>*</sup></label>
                          <div class="col-sm-9">
                          <textarea rows="3" class="form-control" name="description" cols="50" placeholder="Description"></textarea>
													  
                          </div>
                        </div>
                      </div>   
                     </div>
				         <label class="col-sm-2 col-form-label"></label>
                        <input type="submit"  class="btn btn-success mr-2" value="Send Mail">
                        <button type="reset" class="btn btn-light">Cancel</button>
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
						  <th>Customer Name</th>   
						  <th>Meeting Name</th>				  
						  <th>MoM</th>				  
						  <th>Description</th>				  
					</tr>
              </thead`````>
              <tbody id="myTable">
			   <?php foreach($data['getmomdetails'] as $mom):?>
				 <tr>
					  <td><div class="wrap"><?php echo $mom->id;?></div></td>
                    <td><div class="wrap"><?php echo $mom->lead_id;?></div></td> 
                    <td><div class="wrap"><?php echo $mom->customername;?></div></td>  
                    <td><div class="wrap"><?php echo $mom->meetingname;?></div></td>        
                    <td><div class="wrap"><?php echo $mom->momupload;?></div></td>        
                    <td><div class="wrap"><?php echo $mom->description;?></div></td>        
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
<script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>     
