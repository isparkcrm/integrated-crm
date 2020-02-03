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
              
                  <h4 class="card-title">OEM Master</h4>                     
               <form action="<?php echo URLROOT; ?>/masters/oem_master" method="post">     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">OEM Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control <?php echo(!empty($data['oemname_err'])) ? 'is-invalid' : ''; ?>"' name='oemname' required="required">                     
                          <span class="alert-danger"><?php echo $data['oemname_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>   
                     </div>
					 <label class="col-sm-2 col-form-label"></label>
                        <input type="submit"  class="btn btn-success mr-2" value="Add OEM">
                        <button type="reset" class="btn btn-light">Cancel</button>
                  </form>            
            </div>
        </div>
    </div> 
<div class="row">
               <div class="col-lg-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
					<div class="table-responsive">
                    <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>OEM Name</th>                                 
						  <th>Action</th>
						  <th style="display:none;"></th>
						</tr>
					  </thead>
                      <tbody>
                       <?php foreach($data['oems'] as $oem) : ?>      
					  <tr>
					  <td><?php echo $oem->id;?></td>
					  <td><?php echo $oem->oemname; ?></td>                               
					  <td><a href="<?php echo URLROOT; ?>/masters/oem_edit/<?php echo $oem->id; ?>" class="btn btn-primary">Edit</a>  
						<a href="<?php echo URLROOT; ?>/masters/oem_delete/<?php echo $oem->id;  ?>" class="btn btn-info">Delete</a>
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


    
              
             
               
               
<?php require APPROOT . '/views/inc/footer.php'; ?>
   </div>           
<script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>     
