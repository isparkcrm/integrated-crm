<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<style>
.showhide {  
   display:none;
}
</style>
<body onload="test();">
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
                  <h4 class="card-title">Campaign Management</h4>   
<br>                  
<br>                  
			   <form action="<?php echo URLROOT; ?>/campaign/edit/<?php echo $data['id'];?>" method="post">                                       
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Campaign Type<sup>*</sup></label>
                          <div class="col-sm-9">
                          <select class='form-control <?php echo(!empty($data['campaigntype_err'])) ? 'is-invalid' : ''; ?>"' id="campaigntype" name='campaigntype' required="required" >
						  <option value="<?php echo $data['campaigntype'];?>"><?php echo $data['campaigntype'];?></option>
						  
						  <option  data-section="#moc1" value="Outbound">Outbound</option>
						  </select>
                          <span class="invalid-feedback"><?php echo $data['campaigntype_err']; ?></span></div>
                        </div>
                      </div>  
		            </div>
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Campaign Name</label>
								<div class="col-sm-9">
									<input type="text" class='form-control <?php echo(!empty($data['campaignname_err'])) ? 'is-invalid' : ''; ?>"' name="campaignname" placeholder="Campaign Name" value="<?php echo $data['campaignname'];?>">
									<span class="invalid-feedback"><?php echo $data['campaignname_err']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
							<label class="col-sm-3 col-form-label">Campaign Description</label>
								<div class="col-sm-9">
								<textarea class="form-control" id="campaigndescrip" name="campaigndescrip" placeholder="Campaign Description"><?php echo $data['campaigndescrip'];?></textarea>
								<span class="invalid-feedback"><?php echo $data['campaignname_err']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="moc">
					<div class="col-md-6">
					<div class="form-group row">
					<label class="col-sm-3 col-form-label">Mode of Communication</label>
					
					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" <?php echo ($data['modeofcomm']=='email')?'checked':'' ?> name="modeofcomm[]" id="email" value="email"> Email
					  </label>
					</div>
					</div>
					<div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" <?php echo ($data['modeofcomm']=='oncall')?'checked':'' ?> name="modeofcomm[]" id="oncall" value="oncall"> ON Call
					  </label>
					</div>
				  </div>
				  <div class="col-sm-3">
					<div>
					  <label class="form-label">
						<input type="checkbox" id="basic_checkbox_1" <?php echo ($data['modeofcomm']=='onweb')?'checked':'' ?> name="modeofcomm[]" id="onweb" value="onweb"> ON Web
					  </label>
					</div>
					</div>
					</div>
					</div>
					</div>
					
		<input type="submit"  class="btn btn-success mr-2" value="Update Campaign">
		<button type="reset" class="btn btn-light">Cancel</button>
      </form>            
		</div>
                  </div>
                </div> 
				</div>
				</div>
				</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
function test(){
	$('#moc1').hide();
}
</script>
  <script type="text/javascript">
$(function(){
    

		$('input[type="radio"]').on('change', function(){
        var $target = $('input[type="radio"]:checked');
        $(".showhide").hide();
        $( $target.attr('data-section') ).show();
		}).trigger('change');
		});
</script>
<script type="text/javascript">
$(function() {
    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'client') {
			$('#clientname').show();
			$('#processtype').hide();
			$('#processtype').val('');
			
        } else if($(this).attr('id') == 'process') {
		
			$('#processtype').show();
            $('#clientname').hide();
            $('#clientname').val('');
          
        }
    });
});
</script>
            

<script>
		$('#campaigntype').on('change', function() {
	  if ( this.value == 'Inbound'){
		$("#moc").show();     
		$("#moc1").hide();     
		}else if(this.value == 'Outbound'){
		$("#moc1").show();
		$("#moc").hide();
		}
		}).trigger("change"); 
	</script>


         


