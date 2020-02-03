<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/superadmin.php'; ?>

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
                  <h4 class="card-title">Super Admin</h4>                     
        <form action="<?php echo URLROOT; ?>/clients/super_admin" method="post">                                       
        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Client Name<sup>*</sup></label>
                          <div class="col-sm-9">                  
                          <input type="text" name="client_name" class="form-control <?php echo(!empty($data['client_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Client name"  required>                                              
                          <span class="alert-danger"><?php echo $data['client_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>  
                      </div>  
                 
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Total Users</label>
                          <div class="col-sm-9">
                          <input type="number" name="total" class="form-control <?php echo(!empty($data['total_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Total Users"  required>
                          <span class="alert-danger"><?php echo $data['total_err']; ?></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Concurrent Users</label>
                          <div class="col-sm-9">
                          <input type="number" name="concurrent" class="form-control <?php echo(!empty($data['concurrent_err'])) ? 'is-invalid' : ''; ?>"  placeholder="concurrent users" required>
                          <span class="alert-danger"> <?php echo $data['concurrent_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Inbound Campaign</label>
                          <div class="col-sm-9">
                          <input type="number" name="inbound" class="form-control <?php echo(!empty($data['inbound_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Total inbound campaigns"  required>
                          <span class="alert-danger"><?php echo $data['inbound_err']; ?></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Outbound Campaign</label>
                          <div class="col-sm-9">
                          <input type="number" name="outbound" class="form-control <?php echo(!empty($data['outbound_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Total Outbounnd campaigns" required>
                          <span class="alert-danger"> <?php echo $data['outbound_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
                
                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Role<sup>*</sup></label>
                              <?php 
                              $groups = $this->clientModel->getRole();           
                                ?>                     
                        <div class="col-sm-9">
                          <select class="form-control <?php echo(!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" id='role[]' name='role[]'>
                          <option value="" disabled="disabled" selected="selected"> Select role.. </option>
                          <?php foreach($groups as $each){ ?>
                            <option value="<?php echo $each->role; ?>"><?php echo $each->role; ?></option>;
                           <?php } ?>       
                           </select>                                      
                          <span class="alert-danger"><?php echo $data['role_err']; ?>  </span>                                                  
                        </div>
                      </div>
                    </div>  
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Total Users</label>
                        <div class="col-sm-9">
                          <input type="number" name="role_total[]" class="form-control <?php echo(!empty($data['total1_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Total Users"  required>
                          <span class="alert-danger"><?php echo $data['total1_err']; ?></span>
                       </div>
                     </div>
                   </div>                                  
                 </div> 
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                       <input type="button" class="btn btn-success" value="Add" onclick="addRow()">
                         <!--<input type="button" class="btn btn-danger btn-remove" value="Remove"> -->  
                    </div>
                </div>
                     <br>
                 <div id="content" class="role">
                     <br> 
                  </div>
                    
                    <input type="submit"  class="btn btn-success mr-2" value="Submit">
                    <button type="reset" class="btn btn-light">Cancel</button>
                              
            </form>            
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
function addRow () {
  document.querySelector('#content').insertAdjacentHTML(
    'afterbegin',
    `
    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Role<sup>*</sup></label>
                     
                        <div class="col-sm-9">
                          <select class="form-control <?php echo(!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" id='role[]' name='role[]'>
                          <option value="" disabled="disabled" selected="selected"> Select role.. </option>
                          <?php foreach($groups as $each){ ?>
                         <option value="<?php echo $each->role; ?>"><?php echo $each->role; ?></option>;
                           <?php } ?>       
                          </select>                                      
                          <span class="alert-danger"><?php echo $data['role_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Total Users</label>
                          <div class="col-sm-9">
                          <input type="number" name="role_total[]" class="form-control <?php echo(!empty($data['total1_err'])) ? 'is-invalid' : ''; ?>"  placeholder="Total Users"  required>
                          <span class="alert-danger"><?php echo $data['total_err']; ?></span>
                        </div>
                      </div>
                  </div>                            
                 </div> 
                 <div class="row">
                    <div class="col-md-4 offset-md-4">
                    <input type="button" class="btn btn-success" value="Add" onclick="addRow()">                    
                    </div>
                     </div>  
                     <br>
`      
  )
}

</script>


<script>
$(document).ready(function(){
	$(document).on('click','.btn-remove',function(e){
	e.preventDefault();
    $(this).closest('.row').remove();
	});	
});
</script>        
</div>