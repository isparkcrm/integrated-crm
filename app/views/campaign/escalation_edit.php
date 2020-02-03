<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function () {
  $("select").select2();
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
               
                <?php flash('esclation_success'); ?>
                  <h4 class="card-title">Edit Escalation Master</h4>                                     
        <form action="<?php echo URLROOT; ?>/campaign/escalation_edit/<?php echo $data['id']; ?> " method="post">                                       
        <input type="hidden"  class='form-control' name='id' value="<?php echo $data['id'];?>" readonly> 
        <input type="hidden"  class='form-control' name='campaign' value="<?php echo $data['campaign'];?>" readonly>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='level' value="<?php echo $data['level'];?>" readonly>                      
                                                                   
                          </div>
                        </div>
                      </div>  
                      </div> 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='name' value="<?php echo $data['name'];?>" required>                     
                                                                    
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='email' value="<?php echo $data['email'];?>" required>                     
                                                                  
                          </div>
                        </div>
                      </div>   
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='number' value="<?php echo $data['number'];?>" minlength="10" required>                     
                                                                   
                          </div>
                        </div>
                      </div>                        
                      </div> 
                      <br>                    
                                     
                    <input type="submit"  class="btn btn-success mr-2" value="Submit">
                    <button type="reset" class="btn btn-light">Cancel</button>
                              
            </form>            
            </div>
                  </div>
               
<!--  ********************************************  List Table ******************************************* -->

              
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

