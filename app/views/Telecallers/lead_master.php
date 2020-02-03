<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>-->
 <style>
 .addhead {
	 background-color:rgb(243, 242, 242);
	 display: flex;
     border: 1px solid transparent;
     border-radius: .25rem;
     font-size: .875rem;
 }
 </style>
 <script>
 $(document).ready(function(){
	
	 $('#industry').on('change', function() {
		  
      if ( this.value == '26')
      {
		$("#business").show();
      }
	  else 
	  {
		  $("#business").hide();
	  }
    });
	
	
 });
 </script>
 <script>
  $(document).ready(function(){
	$('#vertical').on('change', function() {
	
      if ( this.value == '6')
      {
		$("#vertical1").show();
      }
	  else 
	  {
		  $("#vertical1").hide();
	  }
    });  
   });	  
 </script>
 <script>
 $(document).ready(function(){
	$('#oem').on('change', function() {
		  
      if ( this.value == '22')
      {
		$("#oem1").show();
      }
	  else 
	  {
		  $("#oem1").hide();
	  }
    }); 
 });		 
 </script>
 <script>
 $(document).ready(function(){
    $('#leadsource').on('change', function() {
      if ( this.value == 'Other')
      {
        $("#business1").show();
      }
	  else 
	  {
		  $("#business1").hide();
	  }
    });
	 
});
	$(function(){
		
			$(document.body).on('click', '.changeType' ,function(){
				$(this).closest('.phone-input').find('.type-text').text($(this).text());
				$(this).closest('.phone-input').find('.type-input').val($(this).data('type-value'));
			});
			
			$(document.body).on('click', '.btn-remove-phone' ,function(){
				$(this).closest('.phone-input').remove();
			});
			
		$('.btn-add-phone').click(function(){
			
			var index = $('.phone-input').length + 1;
				$('.phone-list').append(''+
				        '<div class="input-group phone-input">'+
						    ' <label style="font-size:13px;" class="col-sm-2 col-form-label">Mobile</label>'+
							 '<div class="col-sm-4">'+
							'<input type="number" name="mobile[]" class="form-control" placeholder="999 999 9999" />'+
							'</div>'+
							' <label style="font-size:13px;" class="col-sm-2 col-form-label">Email</label>'+
							'<div class="col-sm-3">'+
							'<input type="email" name="email[]" class="form-control" placeholder="Email"/>'+
							'</div>'+
							'<span class="input-group-btn">'+
							'<button class="btn btn-danger btn-remove-phone" type="button"><span class="menu-icon mdi mdi-minus-circle-outline"></span></button>'+
							'</span>'+
						'</div>'
				);
				
			});
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
                  <h4 class="addhead">Lead Information</h4>                    
				   <form action="<?php echo URLROOT;?>/telecaller/lead_master/<?php echo $data['id'];?>" method="POST"  enctype="multipart/form-data">
				   
				   <input type="hidden" readonly id="id" value="<?php echo $data['id'];?>" class="form-control" name="id">	
				      <div class="row">
					  <div class="col-md-6">
					  <div class="form-group row">
						<label class="col-sm-3 col-form-label">Lead ID</label>
						<div class="col-sm-9">
						<input type="text" readonly id="lead_id" value="<?php echo $data['lead_id'];?>" class="form-control" name="lead_id">	
						</div>
						</div>
					  </div>
                      
				 
				  </div> 
				  <div class="row">
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Name</label>
                          <div class="col-sm-9">
                          <input type="text" name="customername" class="form-control"  placeholder="First Name" required>
                          
                        </div>
                      </div>
                    </div>					
					</div>
					<div class="row">
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lead Source</label>
                          <div class="col-sm-9">
					<select name="leadsource" class="form-control" required>
						<option value="--None--" selected="selected" disabled>--None--</option>
						<option value="Cold">Email</option>
						<option value="Lead">Website</option>
						<option value="Upside">SMS</option>						
						</select>
</div>
                      </div>
                    </div>					
					</div>
					  <div class="row">
						<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Company<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" name="company" class='form-control' placeholder="Please Enter Company Name" required/>
                          
                        </div>
                      </div>
                      </div>
					  					  
                        </div>
                     
						<div class="row">
						<div class="col-md-6">
						<div class="form-group row">
						<label class="col-sm-3 col-form-label"></label>
						<div style="display:none;" id="business" class="col-md-9">
						<input type="text" name="other" class="form-control" />
						</div>
						</div>
						</div>
						<div  class="col-md-6">
						<div class="form-group row">
						<label class="col-sm-3 col-form-label"></label>
						<div style="display:none;" id="business1" class="col-md-9">
						<input type="text" name="other1" class="form-control" />
						</div>
						</div>
						</div>
						</div>					  
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='phone' placeholder="Please Enter Landline Number" required/>                     
                          
                          </div>
                        </div>
                      </div>  
                     
                      </div>
					<div>					  
					  <div class="row phone-list">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile</label>
                          <div class="col-sm-9">
                         	<div class="">
								<div class="input-group">
									<input type="number" name="mobile[]" id="mobile" class="form-control" placeholder="999 999 9999" required />
								</div>
							</div>
							
						  </div>
                        </div>
                      </div>  
					  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                          <input type="email" id="email" readonly class='form-control' name='email[]' value="<?php echo $data['email'];?>" placeholder="Email" required>                     
                              </div>
                        </div>
                      </div>  
                     </div>
					<button type="button" class="btn btn-success btn-sm btn-add-phone"><span class="glyphicon glyphicon-plus"></span> + Add More</button>					  
					  </div>
	<!-- ************************************************************************************************** -->
				  <input type="hidden" name="status" class="form-control" value="Open"/>
				  <div class="row">
				  <div class="col-sm-6">
				  <div class="form-group row">
				   <label class="col-sm-3 col-form-label"></label>
				  <div class="col-sm-9">
			   <input type="submit" style="background-color:rgba(27, 82, 151, 1);"  class="btn btn-success mr-2" value="Save">
			   <button type="reset" class="btn btn-light">Cancel</button>
			   </div>
			   </div>
			   </div>
			   </div>
          </form>            
            </div>
                  </div>
                </div> 
<?php require APPROOT . '/views/inc/footer.php'; ?>            
</div>

