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
                <?php flash('file_success'); ?>
                <?php flash('file_failure'); ?>
                <?php flash('register_success'); ?>
                  <h4 class="card-title">Edit SLA Config</h4>                     
        <form action="<?php echo URLROOT; ?>/clients/sla_edit/<?php echo $data['id'];?>" method="post">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Client Name<sup>*</sup></label>
                          <?php 
                          $client_ID=$data['client_ID'];
                         $groups = $this->clientModel->ClientName($client_ID);                ?>
                          <div class="col-sm-9">  
                          <input type="hidden"  class='form-control' name='id' value="<?php echo $data['id'];?>" >                                                 
                          <input type="text"  class='form-control' name='client_ID' value="<?php echo $groups;?>" readonly>                                           
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-6">
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Process Type<sup>*</sup></label>
                              <?php 
                               $service_id=$data['process'];
                              $service = $this->clientModel->ServicetName($service_id);           
                                ?>                     
                        <div class="col-sm-9">
                        <input type="text"  class='form-control' name='service' value="<?php echo $service;?>" readonly> 				                                            
                        </div>
                      </div>
                    </div>  
                      </div> 
                 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Severity<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity' value="<?php echo $data['severity'];?>" readonly>                      
                                                                  
                          </div>
                        </div>
                      </div>  
                      </div> 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">L1<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1' value="<?php echo $data['level1'];?>" required>                    
                                                                    
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">L2<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control <?php echo(!empty($data['l2_err'])) ? 'is-invalid' : ''; ?>"' name='l2' value="<?php echo $data['level2'];?>" required>                     
                                                                       
                          </div>
                        </div>
                      </div>   
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">L3<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control <?php echo(!empty($data['l3_err'])) ? 'is-invalid' : ''; ?>"' name='l3' value="<?php echo $data['level3'];?>" required>                                                           
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">L4<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control <?php echo(!empty($data['l4_err'])) ? 'is-invalid' : ''; ?>"' name='l4' value="<?php echo $data['level4'];?>" required>                           </div>
                        </div>
                      </div>   
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
              
<script type="text/javascript">
    function getservice(id){
	var select = $('#service');
	$.ajax({
		 url :"<?php echo URLROOT;?>/clients/getallservice/" + id,
		
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
				
				html = '<option value="' + data[i].service_id + '" >' + data[i].service + '</option>';
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
<?php require APPROOT . '/views/inc/footer.php'; ?>

</div>

