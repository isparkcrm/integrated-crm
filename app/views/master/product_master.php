<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function getoem(id){
	var select = $('#oemname');
	$.ajax({
		 url :"<?php echo URLROOT;?>/masters/getalloem/" + id,
		
		type: "POST",
        dataType: "JSON",
		
		success: function(data)
		{ 
		    var htmlOpt = [];
		   var htmlOpt1 = [];
			console.log('data',data);
			html1 = '<option value="">Select</option>';
			htmlOpt1[htmlOpt1.length] = html1;
			 for(i=0;i<data.length;i++){
				
				html = '<option value="' + data[i].id + '" >' + data[i].oemname + '</option>';
				htmlOpt[htmlOpt.length] = html;
				 
              }
			  select.empty().append( htmlOpt1.join('') ).append( htmlOpt.join('') ); 
	    },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
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
              
                  <h4 class="card-title">Product Master</h4>                     
               <form action="<?php echo URLROOT; ?>/masters/product_master" method="post">                                       
                   
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control <?php echo(!empty($data['productname_err'])) ? 'is-invalid' : ''; ?>"' name='productname' id="productname" required="required">                     
                          <span class="alert-danger"><?php echo $data['productname_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>   
                     </div>
					 <label class="col-sm-2 col-form-label"></label>
                        <input type="submit"  class="btn btn-success mr-2" value="Add Product">
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
						  <th>Product Name</th>                                 
						  <th>Action</th>
						  <th style="display:none;"></th>
						</tr>
					  </thead>
                      <tbody>
                       <?php foreach($data['products'] as $product) : ?>      
					  <tr>
					  <td><?php echo $product->id;?></td>
					                           
					  <td><?php echo $product->productname; ?></td>                               
					  <td><a href="<?php echo URLROOT; ?>/masters/product_edit/<?php echo $product->id; ?>" class="btn btn-primary">Edit</a>  
						<a href="<?php echo URLROOT; ?>/masters/product_delete/<?php echo $product->id;  ?>" class="btn btn-info">Delete</a>
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
