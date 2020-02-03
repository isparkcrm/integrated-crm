<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
  
  $(".js-select2").select2();
  
  $(".js-select2-multi").select2();

  $(".large").select2({
    dropdownCssClass: "big-drop",
  });
  
});
</script>
    <style>
    .form-control {
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: none;
  margin-bottom: 15px;
}
.form-control:hover, .form-control:focus, .form-control:active {
  box-shadow: none;
}
.form-control:focus {
  border: 1px solid #34495e;
}

.select2.select2-container {
  width: 100% !important;
}

.select2.select2-container .select2-selection {
  border: 1px solid #1dc3d8;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  height: 34px;
  margin-bottom: 15px;
  outline: none;
  transition: all 0.15s ease-in-out;
}

.select2.select2-container .select2-selection .select2-selection__rendered {
  color: #333;
  line-height: 32px;
  padding-right: 33px;
}

.select2.select2-container .select2-selection .select2-selection__arrow {
  background: #ffffff;
  border-left: 1px solid #1dc3d8;
  border-right: 1px solid #1dc3d8;
  border-top: 1px solid #1dc3d8;
  border-bottom: 1px solid #1dc3d8;
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
  height: 32px;
  width: 33px;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
  background: #f8f8f8;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
}

.select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
  border: 1px solid #1dc3d8;
}

.select2.select2-container.select2-container--focus .select2-selection {
  border: 1px solid #1dc3d8;
}

.select2.select2-container .select2-selection--multiple {
  height: auto;
  min-height: 34px;
}

.select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
  margin-top: 0;
  height: 32px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__rendered {
  display: block;
  padding: 0 4px;
  line-height: 29px;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice {
  background-color: #f8f8f8;
  border: 1px solid #1dc3d8;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  margin: 4px 4px 0 0;
  padding: 0 6px 0 22px;
  height: 24px;
  line-height: 24px;
  font-size: 12px;
  position: relative;
}

.select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
  position: absolute;
  top: 0;
  left: 0;
  height: 22px;
  width: 22px;
  margin: 0;
  text-align: center;
  color: #1dc3d8;
  font-weight: bold;
  font-size: 16px;
}

.select2-container .select2-dropdown {
  background: transparent;
  border: none;
  margin-top: -5px;
}

.select2-container .select2-dropdown .select2-search {
  padding: 0;
}

.select2-container .select2-dropdown .select2-search input {
  outline: none;
  border: 1px solid #1dc3d8;
  border-bottom: none;
  padding: 4px 6px;
}

.select2-container .select2-dropdown .select2-results {
  padding: 0;
}

.select2-container .select2-dropdown .select2-results ul {
  background: #fff;
  border: 1px solid #34495e;
}

.select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
  background-color: #3498db;
}

.big-drop {
  width: 600px !important;
}

    </style>
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
                  <h4 class="card-title">Create Ticket</h4>
                  <?php
                  $usertype= $_SESSION['usertype'];               
                    ?>                     
        <form action="<?php echo URLROOT; ?>/helpdesk/oncall_ticket" method="post" enctype="multipart/form-data">  
         <?php 
         if(empty($data['number'])){
         ?>                                 
        <div class="row">
              <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Client Name<sup>*</sup></label>
                          <?php 
                                  $groups = $this->clientModel->getClientName();
								  
                           ?>
                          <div class="col-sm-9">
                        <select class='js-select2 <?php echo(!empty($data['client_err'])) ? 'is-invalid' : ''; ?>"' id="client" name='client' onchange="getservice(this.value)">
                          <option value=""  selected="selected"> Select client Name.. </option>
                          <?php foreach($groups as $each){ ?>
						  
                          <option value="<?php echo $each->client_ID; ?>"><?php echo $each->clientname; ?></option>';
                           <?php } ?>       
                        </select>                                      
                          <span class="alert-danger"><?php echo $data['client_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div> 

                 <div class="col-md-6">
                      <div class="form-group row">
                       <label class="col-sm-3 col-form-label">Support For<sup>*</sup></label>
                         <?php $groups = $this->campaignModel->getService(); ?>                     
                        <div class="col-sm-9">
						  <select class='js-select2 <?php echo(!empty($data['processtype_err'])) ? 'is-invalid' : ''; ?>"' name='service' onchange="getemail(this.value)" id="service">                     
                          </select>                                      
						 <span class="alert-danger"><?php echo $data['processtype_err']; ?></span>                                                
                        </div>
                      </div>
                    </div>                     
			    </div> 
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
						<select name="email" id="email" class="js-select2 <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  placeholder="email"  required>
					   </select>
					       <span class="alert-danger"><?php echo $data['email_err']; ?></span>                    
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                          <input type="number" name="number" class="form-control <?php echo(!empty($data['number_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['number']?>" required>                   
                          <span> <?php echo $data['number_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
               <?php
             }
             else{
             ?>
               <div class="row">
              <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Client Name<sup>*</sup></label>
                          <?php 
                                  $groups = $this->clientModel->getClientName();
                  
                           ?>
                          <div class="col-sm-9">
                        <select class='js-select2 <?php echo(!empty($data['client_err'])) ? 'is-invalid' : ''; ?>"' id="client" name='client' onchange="getservice(this.value)">
                          <option value=""  selected="selected"> Select client Name.. </option>
                                    
                          <option value="<?php echo $data['clientID']; ?>"><?php echo $data['clientname'] ?></option>';
                               
                        </select>                                      
                          <span class="alert-danger"><?php echo $data['client_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div> 

                 <div class="col-md-6">
                      <div class="form-group row">
                       <label class="col-sm-3 col-form-label">Support For<sup>*</sup></label>
                         <?php $groups = $this->campaignModel->getService(); ?>                     
                        <div class="col-sm-9">
              <select class='js-select2 <?php echo(!empty($data['processtype_err'])) ? 'is-invalid' : ''; ?>"' name='service' onchange="getemail(this.value)" id="service">                     
                          </select>                                      
             <span class="alert-danger"><?php echo $data['processtype_err']; ?></span>                                                
                        </div>
                      </div>
                    </div>                     
          </div> 
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
            <select name="email" id="email" class="form-control <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  placeholder="email"  required>
             </select>
                 <span class="alert-danger"><?php echo $data['email_err']; ?></span>                    
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                          <input type="number" name="number" class="form-control <?php echo(!empty($data['number_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['number']?>" required>                   
                          <span> <?php echo $data['number_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 






             <?php
           }
           ?>


                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject</label>
                          <div class="col-sm-9">
                          <input type="text" name="title" class="form-control <?php echo(!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"  placeholder="subject"  required>
                          <span ><?php echo $data['title_err']; ?></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                          <textarea name="description" class="form-control <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"  placeholder="description" required></textarea>                         
                          <span> <?php echo $data['description_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
                 <div class="row">           

                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Severity<sup>*</sup></label>
                          <?php  $groups = $this->ticketModel->getSeverity(); ?>
                          <div class="col-sm-9">
                        <select class='form-control <?php echo(!empty($data['severity_err'])) ? 'is-invalid' : ''; ?>"' id='severity' name='severity'>
                          <option value="" disabled="disabled" selected="selected"> Select severity.. </option>
                          <?php foreach($groups as $each){ ?>
                          <option value="<?php echo $each->severity_name; ?>"><?php echo $each->severity; ?></option>';
                          <?php } ?>       
                        </select>                                      
                          <span ><?php echo $data['severity_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>  

                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Document</label>
                          <div class="col-sm-9">
                            <!--   <input type="hidden" name="MAX_FILE_SIZE" value="50000000"/> -->
                            <input type="file" name="photo" class='form-control <?php echo(!empty($data['file_err'])) ? 'is-invalid' : ''; ?>"'/>
                            <span ><?php echo $data['file_err']; ?>  </span>       
                        </div>
                      </div>
                      </div>                   
                 </div>
               
                 <input type="hidden" name="status" class="form-control" Value="Open">
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
	var setEmail= $('#email');
	var data1,data2;
	$.ajax({
		 url :"<?php echo URLROOT;?>/clients/getservice/" + id,
		type: "POST",
        dataType: "JSON",
		
		success: function(data)
		{ 
		console.log('data',data);
		     var htmlOpt = [];
		   var htmlOpt1 = [];
		   var htmlOpt2 = [];
			data1=data.email;
			data2=data.service;
			html1 = '<option value="">Select</option>';
			htmlOpt1[htmlOpt1.length] = html1;
			 for(i=0;i<data2.length;i++){
				html = '<option value="' + data2[i].service_id + '" >' + data2[i].service + '</option>';
				htmlOpt[htmlOpt.length] = html;
              }
			   for(i=0;i<data1.length;i++){
				   console.log('data',data1[i].email);
			  html2= '<option value="' + data1[i].email + '" >' + data1[i].email + '</option>';
				htmlOpt2[htmlOpt2.length] = html2;
				   }
			  select.empty().append( htmlOpt1.join('') ).append( htmlOpt.join('') ); 
			  setEmail.empty().append( htmlOpt1.join('') ).append( htmlOpt2.join('') );  
			 
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