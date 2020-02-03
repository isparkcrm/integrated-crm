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
              
                  <h4 class="card-title">Quation Master</h4>                     
       <form action="<?php echo URLROOT; ?>/quatations/quatation_master/<?php echo $data['id'];?>" method="post" enctype="multipart/form-data">          
	   <div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lead ID<sup>*</sup></label>
                          <div class="col-sm-9">
                         <input type="text" readonly class="form-control" name="lead_id" value="<?php echo $data['lead_id'];?>">   
							</div>
                        </div>
                      </div>
					  </div>
					<div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Name<sup>*</sup></label>
                          <div class="col-sm-9">
                         <input type="text" readonly class="form-control" name="customername" value="<?php echo $data['customername'];?>">   
							</div>
                        </div>
                      </div>
					  </div>
					  <div class="row">
					<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Email<sup>*</sup></label>
                          <div class="col-sm-9">
                         <input type="text" readonly class="form-control" name="customeremail" value="<?php echo $data['customeremail'];?>">   
							</div>
                        </div>
                      </div>
					  </div>
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Quatation Upload<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="file" class="form-control" name="quatationupload"/>    
						  
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
                        <input type="submit"  class="btn btn-success mr-2" value="Save">
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
						  <th>Quatation Upload</th>				  
						  <th>Description</th>				  
						  <th>Date of Create</th>				  
					</tr>
              </thead`````>
              <tbody id="myTable">
			   <?php foreach($data['getquatationdetails'] as $quatation):?>
				 <tr>
					  <td><div class="wrap"><?php echo $quatation->id;?></div></td>
                    <td><div class="wrap"><?php echo $quatation->lead_id;?></div></td> 
                    <td><div class="wrap"><?php echo $quatation->customername;?></div></td>  
                    <td><div class="wrap"><?php echo $quatation->quatationupload;?></div></td>        
                    <td><div class="wrap"><?php echo $quatation->description;?></div></td>        
                    <td><div class="wrap"><?php echo $quatation->created_at;?></div></td>        
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
