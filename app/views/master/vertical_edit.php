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
                <?php flash('register_success'); ?>
                  <h4 class="card-title">Vertical Master</h4>                     
                       <form action="<?php echo URLROOT; ?>/masters/vertical_edit/<?php echo $data['id']; ?>" method="post">                                       
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vertical Name<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='verticalname' required="required" value="<?php echo $data['verticalname']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                          
                    </div>                 
                     
                       <input type="submit"  class="btn btn-success mr-2" value="Update">
                        <button type="reset" class="btn btn-light">Cancel</button>
                              
                  </form>            
            </div>
                  </div>
                </div> 
                <script>
                $('#supporttype').on('change', function() {
  if ( this.value == 'Onsite')
    $("#support").show();     
  else
    $("#support").hide();
}).trigger("change"); 
                </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>