<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="main-panel">	
	<div class="content-wrapper">
		<div class="row purchace-popup">
        </div>
		<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">               
                <?php flash('esclation_success'); ?>
                 <h4 class="card-title">Escalation Master</h4>                     
				<form action="<?php echo URLROOT; ?>/campaign/escalation_master" method="post">                                       
                    <div class="row" >
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					
						<div class="col-md-5">
							<div class="form-group row">
								<div class="input-group-prepend bg-primary border-primary">
									<span class="input-group-text bg-transparent">
											<i class="text-white">Campaign Name*</i>
											<?php	$groups = $this->campaignModel->getCampaignName();	?>
									</span>
								</div>
						
								<div class="col-sm-7">
									<select style="border:1px solid #1194f133 !important;" class='form-control <?php echo(!empty($data['campaign_err'])) ? 'is-invalid' : ''; ?>"' id='campaign' name='campaign'>
										<option value=""  selected="selected"> Select campaign Name.. </option>
												<?php foreach($groups as $each){ ?>
										<option value="<?php echo $each->id; ?>"><?php echo $each->campaignname; ?></option>';
											<?php } ?>       
									</select>                                                                                                          
								</div>
							</div>
						</div>                      
                      </div>                 
						<br> 
					  <div class="row">							
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Level </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;"  type="text"  class='form-control' name='level[]' value="L1" readonly>                  
										
										<span class="alert-danger">  </span>   
								</div> 
							 </div>
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">	
									</div>
										<input style="border:1px solid #1194f133 !important; " type="text" placeholder="Name*" class='form-control' name='name[]' required>                     
										<span class="alert-danger"> </span>                             
								</div> 
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
									
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  maxlength="10"  placeholder="Mobile Number*" name='number[]' class='form-control' required>                     
										<span class="alert-danger"> </span>                            
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  placeholder="Email*"  class='form-control' name='email[]' required>                     
										<span class="alert-danger">  </span>                      
								</div> 
							</div>					
						</div>  
						
						<br> 
						<div class="row">							
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Level </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;"  type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="L2" readonly>                  
										<span class="alert-danger">  </span>   
								</div> 
							 </div>
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">	
									</div>
										<input style="border:1px solid #1194f133 !important; " type="text" placeholder="Name*" class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"> </span>                             
								</div> 
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
									
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  maxlength="10"  placeholder="Mobile Number*"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"> </span>                            
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  placeholder="Email*"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger">  </span>                      
								</div> 
							</div>					
						</div>  
						    <br>   
						<div class="row">							
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Level </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;"  type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="L3" readonly>                  
										<span class="alert-danger">  </span>   
								</div> 
							 </div>
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">	
									</div>
										<input style="border:1px solid #1194f133 !important; " type="text" placeholder="Name*" class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"> </span>                             
								</div> 
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
									
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  maxlength="10"  placeholder="Mobile Number*"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"> </span>                            
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  placeholder="Email*"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger">  </span>                      
								</div> 
							</div>					
						</div>  
						    <br>   
						<div class="row">							
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										<span class="input-group-text bg-transparent">
											<i class="text-white">Level </i>
										</span>
									</div>
										<input style="border:1px solid #1194f133 !important; font-weight:700 !important;"  type="text"  class='form-control  <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' name='severity[]' value="L4" readonly>                  
										<span class="alert-danger">  </span>   
								</div> 
							 </div>
							 <div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">	
									</div>
										<input style="border:1px solid #1194f133 !important; " type="text" placeholder="Name*" class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"> </span>                             
								</div> 
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
									
									</div>
										<input type="text" style="border:1px solid #1194f133 !important;"  maxlength="10"  placeholder="Mobile Number*"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger"> </span>                            
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-prepend bg-primary border-primary">
										
									</div>
										<input type="text" style="border:1px solid #1194f133 !important; "  placeholder="Email*"  class='form-control <?php echo(!empty($data['l1_err'])) ? 'is-invalid' : ''; ?>"' name='l1[]' required>                     
										<span class="alert-danger">  </span>                      
								</div> 
							</div>					
						</div>  
							<br>   
						<div style=" margin-left: 450px !important;">	
                    <input type="submit"  class="btn btn-success mr-2" value="Submit">
                    <button type="reset" class="btn btn-light">Cancel</button>
					</div>
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
<script>
$(document).ready( function() {
    $('#example').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
})
 </script>
<script>
  // To ensure only valid mobile numbers(7000000000 to 9999999999) are entered
  $('body').on('keyup', '.js-input-mobile', function () {
    var $input = $(this),
        value = $input.val(),
        length = value.length,
        inputCharacter = parseInt(value.slice(-1));

    if (!((length > 1 && inputCharacter >= 0 && inputCharacter <= 9) || (length === 1 && inputCharacter >= 6 && inputCharacter <= 9))) {
        $input.val(value.substring(0, length - 1));
     }
  });
  
</script>              
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
<script>
  // To ensure only valid mobile numbers(7000000000 to 9999999999) are entered
  $('body').on('keyup', '.js-input-mobile', function () {
    var $input = $(this),
        value = $input.val(),
        length = value.length,
        inputCharacter = parseInt(value.slice(-1));

    if (!((length > 1 && inputCharacter >= 0 && inputCharacter <= 9) || (length === 1 && inputCharacter >= 6 && inputCharacter <= 9))) {
        $input.val(value.substring(0, length - 1));
     }
  });
</script>
<style>
input{
  border:1px solid #449AE2;
  
}

input::-webkit-input-placeholder {
    color: #449AE2;
}
input:focus::-webkit-input-placeholder {
    color: #449AE2;
}

/* Firefox < 19 */
input:-moz-placeholder {
    color: #999;
}
input:focus:-moz-placeholder {
    color: red;
}

/* Firefox > 19 */
input::-moz-placeholder {
    color: #449AE2;
}
input:focus::-moz-placeholder {
    color: #449AE2;
}

/* Internet Explorer 10 */
input:-ms-input-placeholder {
    color: #449AE2;
}
input:focus:-ms-input-placeholder {
    color: #449AE2;
}
</style>
<?php require APPROOT . '/views/inc/footer.php'; ?>

</div>

