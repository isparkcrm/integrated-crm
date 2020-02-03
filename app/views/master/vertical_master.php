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
              
                  <h4 class="card-title">Vertical Master</h4>                     
               <form action="<?php echo URLROOT; ?>/masters/vertical_master" method="post">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vertical Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control <?php echo(!empty($data['verticalname_err'])) ? 'is-invalid' : ''; ?>"' name='verticalname' required="required">                     
                          <span class="alert-danger"><?php echo $data['verticalname_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>   
                     </div>
                        <input type="submit"  class="btn btn-success mr-2" value="Add Vertical">
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
						  <th>Vertical Name</th>                                 
						  <th>Action</th>
						  <th style="display:none;"></th>
						</tr>
					  </thead>
                      <tbody>
                       <?php foreach($data['verticals'] as $vertical) : ?>      
					  <tr>
					  <td><?php echo $vertical->id;?></td>
					  <td><?php echo $vertical->verticalname; ?></td>                               
					  <td><a href="<?php echo URLROOT; ?>/masters/vertical_edit/<?php echo $vertical->id; ?>" class="btn btn-primary">Edit</a>  
						<a href="<?php echo URLROOT; ?>/masters/vertical_delete/<?php echo $vertical->id;  ?>" class="btn btn-info">Delete</a>
					  
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

         
</div>

<script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script> 