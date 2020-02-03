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
                                      
        <form action="<?php echo URLROOT; ?>/clients/knowledge_base" method="post" enctype="multipart/form-data">  
                                          
        <input type="hidden" name="client" class="form-control" Value="<?php echo $usertype; ?>">
        <input type="hidden" name="email" class="form-control" Value="<?php echo $_SESSION['email']; ?>">
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
                          <label class="col-sm-3 col-form-label">Keyword</label>
                          <div class="col-sm-9">
                          <input type="text" name="keyword" class="form-control <?php echo(!empty($data['key_err'])) ? 'is-invalid' : ''; ?>"  placeholder="subject"  required>
                          <span ><?php echo $data['key_err']; ?></span>
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
                 <div class="row">       
                 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Version </label>
                          <div class="col-sm-9">
                          <input type="hidden" name="version" class="form-control"  placeholder="version" value="1.0" required>                          
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