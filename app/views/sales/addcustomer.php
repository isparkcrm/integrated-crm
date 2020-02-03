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
                <?php flash('register_success'); ?>
                  <h4 class="card-title">Partner Master</h4>                     
                       <form action="<?php echo URLROOT; ?>/sales/addcustomer" method="post"  enctype="multipart/form-data">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Customer Name<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control <?php echo(!empty($data['customername_err'])) ? 'is-invalid' : ''; ?>"' name='name' required="required">                     
                          <span class="alert-danger"><?php echo $data['customername_err']; ?>  </span>                                                  
                          </div>
                        </div>
                      </div>   
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Person<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="text"  class='form-control <?php echo(!empty($data['person_err'])) ? 'is-invalid' : ''; ?>"' name='person' required="required">                     
                          <span class="alert-danger"><?php echo $data['person_err']; ?> </span>                                                   
                          </div>
                        </div>
                      </div>                    
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contract start date</label>
                          <div class="col-sm-9">
                          <input type="date" name="date1" class="form-control <?php echo(!empty($data['date1_err'])) ? 'is-invalid' : ''; ?>"  placeholder="start date"  required>
                          <span class="alert-danger"><?php echo $data['date1_err']; ?></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contract End Date</label>
                          <div class="col-sm-9">
                          <input type="date" name="date2" class="form-control <?php echo(!empty($data['date2_err'])) ? 'is-invalid' : ''; ?>"  placeholder="end date">
                          <span class="alert-danger"> <?php echo $data['date2_err']; ?> </span>   
                        </div>
                      </div>
                    </div>                       
                 </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number<sup>*</sup></label>
                          <div class="col-sm-9">
                          <input type="number"  class='form-control <?php echo(!empty($data['number_err'])) ? 'is-invalid' : ''; ?>"' name='number' required="required">                     
                          <span class="alert-danger"> <?php echo $data['number_err']; ?> </span>                                                  
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Document</label>
                          <div class="col-sm-9">
                          <input type="file" name="photo" class='form-control <?php echo(!empty($data['file_err'])) ? 'is-invalid' : ''; ?>"'/>
                            <span ><?php echo $data['file_err']; ?>  </span>       
                        </div>
                      </div>
                      </div>  
                      </div> 
  <!-- ************************************************************************************************** -->
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
                       <?php 
                              $groups = $this->campaignModel->getService();           
                                ?>  
                                <?php foreach($groups as $each){ ?>                         
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">                              
                             <input type="checkbox" name="service[]" value="<?php echo $each->servicename; ?>"/><?php echo $each->servicename; ?>
                           
                             </label>
                            </div>
                          </div>
                          <?php } ?>    
                          <span class="alert-danger"><?php echo $data['service_err']; ?></span>    
                        </div>
                      </div>
                 </div> 
                 <div class="row"> 
                 <div class="col-md-6">
                          <div class="form-group row">
                             <label class="col-sm-3 col-form-label">Support Time</label>                         
                           <div class="col-sm-9">                          
                              <select class='form-control <?php echo(!empty($data['time_err'])) ? 'is-invalid' : ''; ?>"' id='support_time' name='support_time' required> 
                              <option value="" disabled="disabled" selected="selected"> Select time.. </option>
                              <option value="24/7">24/7 </option> 
                              <option value="8/5"> 8/5 </option>                             
                              </select>  
                                                               
                          </div>
                        </div>
                       </div>  
                </div> 
                <!--******************************************************************************************** -->              
                   

                 
                       <input type="submit"  class="btn btn-success mr-2" value="Add Client">
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
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
<script>
function yesnoCheck() {
if (document.getElementById('yesCheck').checked) {
document.getElementById('ifYes').style.display = 'block';
}
else document.getElementById('ifYes').style.display = 'none';
}
</script>   

<script>
function addRow () {
  document.querySelector('#content').insertAdjacentHTML(
    'afterbegin',
    `
    <div class="row" id="support">      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Location</label>                         
                          <div class="col-sm-9">                          
                            <select class='form-control' id='location[]' name='location[]' required='required'> 
                            <option value="" disabled="disabled" selected="selected"> Select location.. </option>
                            <option value="Chennai"> Chennai </option> 
                            <option value=" Mumbai"> Mumbai </option> 
                            <option value="Bangaluru"> Bangaluru </option>
                            <option value="Madurai "> Madurai </option>
                            <option value="Coimbatore"> Coimbatore</option>
                            <option value="Delhi"> Delhi </option>
                            </select>                                                              
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group row">
                             <label class="col-sm-3 col-form-label">Support Time</label>                         
                           <div class="col-sm-9">                          
                              <select class='form-control ' id='time[]' name='time[]' required='required'> 
                              <option value="" disabled="disabled" selected="selected"> Select time.. </option>
                              <option value="24/7 ">24/7 </option> 
                              <option value="8/5"> 8/5 </option>                             
                              </select>  
                              <span class="alert-danger">  </span>                                    
                          </div>
                        </div>
                       </div>                       
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row"> 
                            <label class="col-sm-3 col-form-label">Support Days</label>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                       <div class="col-md-12">
                       <div class="form-group row">                          
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox" name="days[]" value="Sunday"/>Sunday
                             </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox"  name="days[]" value="Monday" />Monday
                             </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox" name="days[]" value="Tuesday" />Tuesday
                             </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox" name="days[]" value="Wednssday"  />Wednessday
                             </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox" name="days[]" value="Thursday"  />Thursday
                             </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox" name="days[]" value="Friday"  />Friday
                             </label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-checkbox">
                              <label class="form-check-label">
                             <input type="checkbox" name="days[]" value="Saturday "  />Saturday
                             </label>
                            </div>
                          </div>                                                 
                           <span class="invalid-feedback"></span>                     
                       </div>
                      </div>                       
                    </div>  
              
`      
  )
}

function removeRow (input) {
  input.parentNode.remove()
}
</script>

         
</div>

