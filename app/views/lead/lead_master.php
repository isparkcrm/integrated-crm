<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
 <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
 
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
				   <form action="<?php echo URLROOT;?>/leads/lead_master" method="POST"  enctype="multipart/form-data">
				   <?php flash('lead_success'); ?>
				   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lead Owner<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						  <?php echo $_SESSION['username'];?>
                          <input type="hidden" class='form-control' value="<?php echo $_SESSION['username']; ?>" name='leadowner' required="required">                     
                          <span class="alert-danger"><?php echo $data['leadowner_err']; ?> </span>
						  </div>
                        </div>
                      </div>
					</div>					  
					<div class="row">
						<div class="col-md-6">
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Type<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
						    <select class="form-control" name="customertype">
							<option selected="selected" disabled="disabled">--Select--</option>
							<option value="Existing">Existing</option>
							<option value="New">New</option>
							</select>
                          <span class="alert-danger"><?php echo $data['customertype_err']; ?> </span>
						  </div>
                        </div>
						</div>	
						<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Name</label>
                          <div class="col-sm-9">
                          <input type="text" name="customername" class="form-control"  placeholder="First Name">
                          <span class="alert-danger"> <?php echo $data['customername_err']; ?> </span>   
                        </div>
                      </div>
                    </div>						
						</div>						
                    <div class="row">
						<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Company<sup style="color:red;font-size:16px;">*</sup></label>
                          <div class="col-sm-9">
                          <input type="text" name="company" class='form-control' placeholder="Please Enter Company Name"/>
                            <span ><?php echo $data['company_err']; ?>  </span>       
                        </div>
                      </div>
                      </div>
					  		 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Industry</label>
                          <div class="col-sm-9">
							  <select class="form-control" id='industry' name="industry">
							  <option value="--Select--" selected="selected" disabled>--Select--</option>
							  <?php foreach($data['industry'] as $indus):?>
							  <option value="<?php echo $indus->id;?>" ><?php echo $indus->indus_name;?></option>
							  <?php endforeach;?>
							  </select>
								<span ><?php echo $data['industy_err']; ?>  </span>       
						  </div>
                        </div>
                      </div>			  
                        </div>
                      <div class="row">
                     
					 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lead Source</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="leadsource" name="leadsource">
						  <option value="--Select--" selected="selected" disabled>--Select--</option>
						  <option value="Advertisement" >Advertisement</option>
						  <option value="Customer Event" >Customer Event</option>
						  <option value="Employee Referral" >Employee Referral</option>
						  <option value="Google AdWords" >Google AdWords</option>
						  <option value="Other">Other</option>
						  <option value="Partner">Partner</option>
						  <option value="Purchased List">Purchased List</option>
						  <option value="Trade Show">Trade Show</option>
						  <option value="Webniar">Webniar</option>
						  <option value="Website">Website</option>						  
						  </select>
                            <span ><?php echo $data['leadsource_err']; ?>  </span>       
                        </div>
                      </div>
                      </div> 
					  <div class="col-md-6">
						<!--<div style="display:none;" class="form-group row" id="industryother">
						<label class="col-sm-3 col-form-label">Industy Others</label>
						<div  class="col-md-9">
						<input type="text" name="industryother" class="form-control" />
						</div>
						</div>-->
						<div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='phone' placeholder="Please Enter Landline Number"/>                     
                          <span class="alert-danger"> <?php echo $data['phone_err']; ?> </span>                                                  
                          </div>
                        </div>
						</div>
						 				  
                      </div>
						<!--<div class="row">
						
						<div  class="col-md-6">
						<div class="form-group row" style="display:none;" id="leadstatusother">
						<label class="col-sm-3 col-form-label">Lead Status Others</label>
						<div   class="col-md-9">
						<input type="text" name="leadsourceother" class="form-control" />
						</div>
						</div>
						</div>
						</div>	-->				  
					  <div class="row">
                        
                    
                      </div>
					<div>					  
					  <div class="row phone-list">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mobile</label>
                          <div class="col-sm-9">
                         	<div class="">
								<div class="input-group">
									<input type="number" name="mobile[]" id="mobile" class="form-control" placeholder="999 999 9999" />
								</div>
							</div>
							<span class="alert-danger"> <?php echo $data['mobile_err']; ?> </span>
						  </div>
                        </div>
                      </div>  
					  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                          <input type="email" id="email"  class='form-control' name='email[]' placeholder="Email">                     
                          <span class="alert-danger"> <?php echo $data['email_err']; ?> </span>     </div>
                        </div>
                      </div>  
                     </div>
					<button type="button" class="btn btn-success btn-sm btn-add-phone"><span class="glyphicon glyphicon-plus"></span> + Add More</button>					  
					  </div>
					  <div class="row">
					  <div class="col-md-6">
					<div class="form-group row">
                     <label class="col-sm-3 col-form-label">Vertical</label>	
					<div class="col-md-9">					 
					  <select name="vertical" id="vertical" class="form-control">
					  <option value="--Select--" disabled="disabled" selected="selected">--Select--</option>
					    <?php foreach($data['vertical'] as $verticals):?>
					  <option value="<?php echo $verticals->id ?>"><?php echo $verticals->verticalname; ?></option>
					    <?php endforeach;?>
					  </select>
					<span class="alert-danger"><?php echo $data['vertical_err'];?></span></div>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="form-group row">
                     <label class="col-sm-3 col-form-label">OEM</label>	
					<div class="col-md-9">					 
					  <select id="oem" name="oem" class="form-control">
					  <option value="--Select--" disabled="disabled" selected="selected">--Select--</option>
					    <?php foreach($data['oemmaster'] as $oem):?>
					  <option value="<?php echo $oem->id ?>"><?php echo $oem->oemname; ?></option>
					    <?php endforeach;?>
					  </select>
					<span class="alert-danger"><?php echo $data['oem_err'];?></span></div>
					</div>
					  </div>
					  </div>
				  	
					  <div class="row">
					  <div class="col-md-6">
					  <div class="form-group row">
					  <label class="col-sm-3 col-form-label">Product</label>
					  <div class="col-md-9">
					  <input type="text" name="product" class="form-control" placeholder="Please Enter Product"/>
					  <span class="alert-danger"><?php echo $data['product_err'];?></span>  </div>
					  </div>
					  </div>
					  <div class="col-md-6">
					  <div class="form-group row"> 
						<label class="col-sm-3 col-form-label">Lead Status</label>
						<div class="col-sm-9">
						<select name="leadstatus" class="form-control">
						<option value="--None--" selected="selected" disabled>--None--</option>
						<option value="Cold">Cold</option>
						<option value="Lead">Lead</option>
						<option value="Upside">Upside</option>
						<option value="Commit">Commit</option>
						</select>
						 <span ><?php echo $data['leadstatus_err']; ?>  </span> 
						</div>
					  </div>
					</div>
					  </div>
  <!-- ************************************************************************************************** -->

				<div class="row">
					  <div class="col-md-6">
					<div class="form-group row">
                     <label class="col-sm-3 col-form-label">Assignee</label>	
					<div class="col-md-9">					 
					  <select name="assignee" class="form-control">
					  <option value="--Select--" disabled="disabled" selected="selected">--Select--</option>
					    <?php foreach($data['assignee'] as $assign):?>
					  <option value="<?php echo $assign->email ?>"><?php echo $assign->username; ?></option>
					    <?php endforeach;?>
					  </select>
					<span class="alert-danger"><?php echo $data['assign_err'];?></span></div>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="form-group row">
                     <label class="col-sm-3 col-form-label">Order Value</label>	
					<div class="col-md-9">					 
					 <input type="text" name="ordervalue" class="form-control" placeholder="Please Enter Order value"/>
					<span class="alert-danger"><?php echo $data['ordervalue_err'];?></span></div>
					</div>
					  </div>
					  </div>
					   <div class="row">
					    <div class="col-md-6">
					<div class="form-group row">
                     <label class="col-sm-3 col-form-label">Closure Date</label>	
					<div class="col-md-9">					 
					 <input type="date" name="closuredate" class="form-control"/>
					<span class="alert-danger"><?php echo $data['closuredate_err'];?></span></div>
					</div>
					</div>
				</div>
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
				
<script>
  var placesAutocomplete = places({
    container: document.querySelector('#address-input')
  });
</script>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>            
</div>
