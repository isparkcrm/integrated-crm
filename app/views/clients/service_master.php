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
                  <h4 class="card-title">Service Master</h4>                     
               <form action="<?php echo URLROOT; ?>/clients/service_master" method="post">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Service Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control <?php echo(!empty($data['servicename_err'])) ? 'is-invalid' : ''; ?>"' name='servicename' required="required">                     
                          <span class="alert-danger"><!--<//?php echo $data['servicename_err']; ?>--></span>                                                  
                          </div>
                        </div>
                      </div>
											  
                     </div>
					 <div class="row">
					 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description<sup>*</sup></label>
                          <div class="col-sm-9">
						  <input type="text" class="form-control" name="description" <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"'>
						  <span class="alert-danger"><!--<//?php echo $data['description_err']; ?>--></span>                                                  
                          </div>
                        </div>
                      </div> 
					 </div>
                        <input type="submit"  class="btn btn-success mr-2" value="Add Service">
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
						  <th>Id</th>
						  <th>Name</th>
             <th>Description</th>
						  <th>Action</th>
						  <th style="display:none;"></th>
				    </tr>
                  </thead>
				
               <tbody>
			     <?php foreach($data['getservice'] as $service) : ?>      
                 <tr>
				    <td><?php echo $service->id;?></td>
                    <td><?php echo $service->servicename; ?></td> 
                    <td><?php echo $service->description; ?></td>   
                   <td>
					<div class="wrap"> <a href="<?php echo URLROOT; ?>/Clients/servicedit/<?php echo $service->id; ?>" class="btn btn-primary">Edit</a>  
				</div>
					</td>
					<td style="display:none;"></td>
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

         
</div>

