<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>

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
                  <h4 class="card-title">Agent Management</h4>         
			

			   <form action="<?php echo URLROOT; ?>/departments/agentinsert" method="post">  			  
			   <input type="hidden" name="id" value=" <?php echo $data['campaignID']; ?>">	
				
							   
				<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select User<sup>*</sup></label>
                          <div class="col-sm-9">
                          <select multiple="multiple" class='form-control <?php echo(!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"' id="username" name='username[]' required="required" >
						 <?php foreach($data['userlist'] as $user) :?>
						<option value="<?php echo $user->email; ?>"><?php echo $user->username; ?>&nbsp;&nbsp;(<?php echo $user->role; ?>)</option>	
							<?php endforeach; ?>
						  </select>
						  <span class="invalid-feedback"><?php echo $data['user_err']; ?></span></div>
						  <input type="hidden" name="role" value="<?php echo $user->role; ?>">
                        </div>
                      </div>  
		            </div>
				<input type="submit"  class="btn btn-success mr-2" value="Add User">
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
						  <th>User Name</th>
                          <th>Email Id</th>
						  <th>Mobile Number</th>
						  <th>Action</th>
						  <th style="display:none;"></th>
				    </tr>
                  </thead>
				
               <tbody>
			     <?php foreach($data['agent'] as $agents) : ?>      
                 <tr>
				    <td><?php echo $agents->agent_id;?></td>
                    <td><?php echo $agents->username; ?></td> 
                    <td><?php echo $agents->email; ?></td> 
                    <td><?php echo $agents->number; ?></td>   
                   <td>
					<a href="<?php echo URLROOT; ?>/departments/agentdelete/<?php echo $agents->agent_id; ?>" class="btn btn-info">Remove</a></div>
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


         


