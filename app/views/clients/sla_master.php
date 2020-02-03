<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
					<h4 class="card-title">SLA Master</h4>                     
					<form action="<?php echo URLROOT; ?>/clients/sla_master" method="post">                                       
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
								
									<label class="col-sm-3 col-form-label">Partner Name<sup>*</sup></label>
										<?php $groups = $this->clientModel->getClientName();  ?>
									<div class="col-sm-9">
										<select class='form-control <?php echo(!empty($data['ID_err'])) ? 'is-invalid' : ''; ?>"' id='client_ID' name='client_ID' onchange="getservice(this.value)">
											<option value=""  selected="selected"> Select client Name.. </option>
											<?php foreach($groups as $each){ ?>
											<option value="<?php echo $each->client_ID; ?>"><?php echo $each->clientname; ?></option>';
											<?php } ?>       
										</select>                                      
										<span class="alert-danger"><?php echo $data['ID_err']; ?>  </span>                                                  
									</div>
								</div>
							</div>  
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Process Type<sup>*</sup></label>
									<?php $groups = $this->campaignModel->getService();   ?>                     
									<div class="col-sm-9">
										<select  style="border:1px solid #1194f133 !important;"  																					class='form-control <?php echo(!empty($data['processtype_err'])) ? 'is-invalid' : ''; ?>"' name='service' id="service">                      
										</select>                                      
										<span class="alert-danger"><?php echo $data['processtype_err']; ?></span>                                                
									</div>
								</div>
							</div>  
						</div> 
						
					 
<br>						 
						<div class="row">									
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Severity * </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;" type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="P1" readonly>                  
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>   
								</div> 
							 </div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L1*</i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important;" type="number"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                             
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L2</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                            
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class=" text-white">L3</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                      
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L4</i>
										</span>
									</div>
											<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
											<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                       
								</div> 
							</div>
						</div>    
						<br> 
							<div class="row">
								
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Severity * </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;" type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="P2" readonly>                  
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>   
								</div> 
							 </div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L1*</i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important;" type="number"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                             
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L2</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                            
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class=" text-white">L3</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                      
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L4</i>
										</span>
									</div>
											<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
											<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                       
								</div> 
							</div>
						</div>  
						<br> 
							<div class="row">
								
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Severity * </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;" type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="P3" readonly>                  
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>   
								</div> 
							 </div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L1*</i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important;" type="number"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                             
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L2</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                            
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class=" text-white">L3</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                      
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L4</i>
										</span>
									</div>
											<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
											<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                       
								</div> 
							</div>
						</div>  
						<br> 
							<div class="row">	
								
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Severity * </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;" type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="P4" readonly>                  
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>   
								</div> 
							 </div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L1*</i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important;" type="number"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                             
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L2</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                            
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class=" text-white">L3</i>
										</span>
									</div>
										<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                      
								</div> 
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">L4</i>
										</span>
									</div>
											<input type="number" style="border:1px solid #1194f133 !important;"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
											<span class="alert-danger"><?php echo $data['l1_err']; ?>  </span>                       
								</div> 
							</div>
						</div>  
							 <br> <br>
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							&ensp;&ensp;&ensp;&emsp;&emsp;&emsp;
							&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
					
							
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

