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
                  <h4 class="card-title">Escalation Master</h4>                     
        <form action="<?php echo URLROOT; ?>/campaign/escalation_master" method="post">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Campaign Name<sup>*</sup></label>
                          <?php 
                $groups = $this->campaignModel->getCampaignName();
                ?>
                          <div class="col-sm-9">
                          <select class='form-control <?php echo(!empty($data['campaign_err'])) ? 'is-invalid' : ''; ?>"' id='campaign' name='campaign'>
                          <option value=""  selected="selected"> Select campaign Name.. </option>
                          <?php foreach($groups as $each){ ?>
        <option value="<?php echo $each->id; ?>"><?php echo $each->campaignname; ?></option>';
    <?php } ?>       
         </select>                                      
                                                                      
                          </div>
                        </div>
                      </div>                      
                      </div> 
                 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='level[]' value="L1" readonly>                      
                                                                   
                          </div>
                        </div>
                      </div>  
                      </div> 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='name[]' required>                     
                                                                    
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='email[]' required>                     
                                                                  
                          </div>
                        </div>
                      </div>   
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='number[]' required>                     
                                                                   
                          </div>
                        </div>
                      </div>                        
                      </div> 
                      <br>                    
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='level[]' value="L2" readonly>                      
                                                                     
                          </div>
                        </div>
                      </div>  
                      </div> 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='name[]' required>                     
                                                                         
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='email[]' required>                     
                                                                     
                          </div>
                        </div>
                      </div>   
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='number[]' required>                     
                                                                        
                          </div>
                        </div>
                      </div> 
                      </div>  
                      <br>     
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='level[]' value="L3" readonly>    
                          </div>
                        </div>
                      </div>  
                      </div> 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='name[]' required>                     
                                                                      
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='email[]' required>                     
                                                                         
                          </div>
                        </div>
                      </div>   
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='number[]' required>                     
                            
                          </div>
                        </div>
                      </div> 
                      </div> 
                      <br>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='level[]' value="L4" readonly>                      
                                                                       
                          </div>
                        </div>
                      </div>  
                      </div> 
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='name[]' required>                     
                                                                      
                          </div>
                        </div>
                      </div> 

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control' name='email[]' required>                     
                                                                         
                          </div>
                        </div>
                      </div>   
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='number[]' required>                     
                            
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
                </div> 

<!--  ********************************************  List Table ******************************************* -->

                <div class="col-12 grid-margin">
              
              <div class="row">
               <div class="col-lg-12 grid-margin stretch-card">
                 <div class="card">
                    <div class="card-body">
                
                       <div class="table-responsive">
                            <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                              <thead>
                                <tr>
                                <th>S.NO</th>
                                      <th>Campaign</th>
                                      <th>Level</th>    
                                      <th>Name</th>
                                      <th>Email</th>  
                                      <th>Number</th>                                
                                      <th style="display:none;"></th> 
                                </tr>
                              </thead>
                            
                           <tbody>
                             <?php foreach($data['getcommunication'] as $service) : ?>      
                             <tr>
                                <td><div class="wrap"><?php echo $service->id;?></div></td>
                                <td><div class="wrap"><?php echo $service->campaign;?></div></td>
                                <td><div class="wrap"><?php echo $service->level; ?></div></td>         
                                <td><div class="wrap"><?php echo $service->name; ?></div></td>   
                                <td><div class="wrap"><?php echo $service->email; ?></div></td>   
                                <td><div class="wrap"><?php echo $service->number; ?></div></td>   
                               <td>
                                <div class="wrap"> <a href="<?php echo URLROOT; ?>/campaign/escalation_edit/<?php echo $service->id; ?>" class="btn btn-primary">Edit</a>  
                            </div>
                                </td>
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

