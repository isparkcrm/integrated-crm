<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

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
                  <h4 class="card-title">Client Master</h4>                     
                       <form action="<?php echo URLROOT; ?>/clients/edit/<?php echo $data['id']; ?>" method="post">                                       
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Client Name<sup>*</sup></label>
                          <div class="col-sm-9">    
                          <input type="hidden"  class='form-control' name='clientID' required="required" value="<?php echo $data['clientID']; ?>">        						  
                          <input type="text"  class='form-control' name='name' required="required" value="<?php echo $data['clientname']; ?>">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>   
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Person<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control ' name='person' required="required" value="<?php echo $data['contact_person']; ?>">                     
                          <span class="alert-danger"> </span>                                                   
                          </div>
                        </div>
                      </div>                    
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contract start date</label>
                          <div class="col-sm-9">
                          <input type="date" name="date1" class="form-control"  placeholder="start date"  required value="<?php echo $data['start_date']; ?>">
                          <span class="alert-danger"></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contract End Date</label>
                          <div class="col-sm-9">
                          <input type="date" name="date2" class="form-control "  placeholder="end date" value="<?php echo $data['end_date']; ?>">
                          <span class="alert-danger"></span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control' name='number' required="required" value="<?php echo $data['number']; ?>">                     
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>  
               </div>                                              
                   	<div class="row">
                        <div class="col-md-12">
                          <div class="form-group row"> 
                            <label class="col-sm-3 col-form-label">Service Type</label>
                          </div>
                        </div>
                  </div>
			    <div class="row">
                      <div class="col-md-12">
                       <div class="form-group row">
                       <?php $services=explode(",",$data['service']); $groups = $this->campaignModel->getService();?>  
						<?php foreach($groups as $each){ ?>                         
						<div class="col-sm-2">
						<div class="form-checkbox">
						<label for="service">
						 <input id="service" type="checkbox" name="service[]" value="<?=$each->servicename?>" <?php if(in_array($each->servicename, $services)) echo 'checked="checked"'; ?> /><?=$each->servicename?>
						</label>
						</div>
						</div>
					<?php } ?>    
                        </div>
                      </div>
                 </div> 
  <!-- ************************************************************************************** --> 
 
                 
                    <!-- ************************************************************************************** -->   
                   
                     <!-- <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Service type <sup>*</sup></label>
                          <div class="col-sm-9">
                          <select class='form-control <?php echo(!empty($data['support_err'])) ? 'is-invalid' : ''; ?>"' id='supporttype' name='supporttype' required='required'> 
                          <option value="" disabled="disabled" selected="selected"> Select catagory.. </option>
                            <option value="Onsite"> Onsite </option> 
                            <option value="Remote"> Remote </option>                             
                            </select>       
                            <span class="alert-danger"><?php echo $data['support_err']; ?></span>                                                    
                          </div>
                        </div>
                      </div> -->   
                     
                       <input type="submit"  class="btn btn-success mr-2" value="Update">
                        <button type="reset" class="btn btn-light">Cancel</button>
                              
                  </form>            
            </div>
                  </div>
                </div> 
                <script>
                $('#supporttype').on('change', function() {
  if ( this.value == 'Onsite')
    $("#support").show();     
  else
    $("#support").hide();
}).trigger("change"); 
                </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>