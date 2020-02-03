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
                  <h4 class="card-title"> Create Knowledge Base</h4>
                                      
        <form action="<?php echo URLROOT; ?>/clients/knowledge_edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">  
                                          
        <input type="hidden" name="client" class="form-control" Value="<?php echo $usertype; ?>">
        <input type="hidden" name="email" class="form-control" Value="<?php echo $_SESSION['email']; ?>">
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject</label>
                          <div class="col-sm-9">
                          <input type="text" name="subject" class="form-control <?php echo(!empty($data['subject_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subject'];?>" >
                          
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                          <textarea name="description" class="form-control <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" ><?php echo $data['description'];?></textarea>                         
                          
                        </div>
                      </div>
                    </div>                       
                 </div> 
                 <div class="row">                

                 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keyword</label>
                          <div class="col-sm-9">
                          <input type="text" name="keyword" class="form-control <?php echo(!empty($data['keyword_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['keyword'];?>">
                         
                        </div>
                      </div>
                   </div>
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Document</label>
                          <div class="col-sm-9">
                            <!--   <input type="hidden" name="MAX_FILE_SIZE" value="50000000"/> -->
                            <input type="file" name="photo" class='form-control <?php echo(!empty($data['file_err'])) ? 'is-invalid' : ''; ?>"'/>
                          
                        </div>
                      </div>
                      </div>                   
                 </div>
                 <div class="row">       
                 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Version </label>
                          <div class="col-sm-9">
                          <?php
                          $version_new=$data['version']+0.1;
                          ?>
                          <input type="hidden" name="version" class="form-control"   value="<?php echo $version_new ;?>" required>                          
                          <input type="hidden" name="document" class="form-control"   value="<?php echo $data['file'];?>" required>
                        </div>
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
<?php require APPROOT . '/views/inc/footer.php'; ?>       
</div>