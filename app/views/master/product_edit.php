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
              
                  <h4 class="card-title">Product Master</h4>                     
               <form action="<?php echo URLROOT; ?>/masters/product_edit/<?php echo $data['id'];?>" method="post">                                       
                    
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" value="<?php echo $data['productname'];?>"  class='form-control' name='productname' required="required">                     
                            </span>                                                  
                          </div>
                        </div>
                      </div>   
                     </div>
					 <label class="col-sm-2 col-form-label"></label>
                        <input type="submit"  class="btn btn-success mr-2" value="Update Product">
                        <button type="reset" class="btn btn-light">Cancel</button>
                  </form>            
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
