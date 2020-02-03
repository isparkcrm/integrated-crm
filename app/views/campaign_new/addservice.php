<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link href="<?php echo URLROOT;?>/public/css/jquery.multiselect.css" rel="stylesheet" type="text/css">
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
                  <h4 class="card-title">service Management</h4>         
			

			   <form action="<?php echo URLROOT; ?>/campaign/serviceinsert" method="post">  			  
			   <input type="hidden" name="id" value=" <?php echo $data['campaignID']; ?>">	
      	
							   
				<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select service<sup>*</sup></label>
                          <div class="col-sm-9">
                          <select multiple="multiple" class='form-control <?php echo(!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"' id="username" name='username[]' required="required" >
						 <?php foreach($data['processlist'] as $user) :?>
						<option value="<?php echo $user->id; ?>"><?php echo $user->servicename; ?></option>	
							<?php endforeach; ?>
						  </select>
                          <span class="invalid-feedback"><?php echo $data['user_err']; ?></span></div>
                        </div>
                      </div>  
		            </div>
				<input type="submit"  class="btn btn-success mr-2" value="Add service">
				<button type="reset" class="btn btn-light">Cancel</button>
			   </form>            
			</div>
		  </div>
			</div> 
			<div class="col-12 grid-margin">
              
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
	
           <div class="table-responsive">
				<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
						  <th>Id</th>
						  <th>Process</th>                       
						  <th>Action</th>
						  <th style="display:none;"></th>
				    </tr>
                  </thead>
				
               <tbody>
			     <?php foreach($data['process'] as $clients) : ?>      
                 <tr>
				    <td><?php echo $clients->id;?></td>
                    <td><?php echo $clients->service; ?></td>                    
                   <td>
					<a href="<?php echo URLROOT; ?>/Campaign/processedelete/<?php echo $clients->id; ?>" class="btn btn-info">Remove</a></div>
				  </td>
					<td style="display:none;"></td>
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
		</div>
		</div>
	</body>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo URLROOT;?>/public/js/jquery.multiselect.js"></script>
<script>
$('select[multiple]').multiselect({
	columns:1,
	placeholder: 'Select Options'
});
</script>
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


         


