<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/service_head.php'; ?>
<script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <?php flash('email_message'); ?>
                  <h4 class="card-title">Management Message</h4>                     
                       <form action="<?php echo URLROOT; ?>/Emailcampaign/management_info" method="post" enctype="multipart/form-data">  
                     
                   <!--   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <input type="text"  class='form-control' name='title' required="required">                      
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                  
                    </div> -->
             <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Message<sup>*</sup></label>                          
                        </div>
                      </div>                                  
                    </div>  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row" style="padding-left:90px;">
                         
                          <textarea name="editor1" class="form-control" placeholder="page Body">
                           </textarea>                                                    
                          <span class="alert-danger"> </span>                                                  
                       </div>
                      </div>                                  
                    </div>  
                  <!--  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Message<sup>*</sup></label>
                          <div class="col-sm-9">                         
                          <textarea class='form-control' name='description' required="required"> </textarea>                     
                          <span class="alert-danger"> </span>                                                  
                          </div>
                        </div>
                      </div>                                  
                    </div>   -->  

                 <br />
                 &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                       <input type="submit"  class="btn btn-success mr-2" value="Send">  
                              
                  </form>            
            </div>
                  </div>
                </div> 
              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
<script>
        CKEDITOR.replace( 'editor1')
      </script>              
         
        </div>