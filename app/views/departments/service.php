<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>

<link href="<?php echo URLROOT;?>/public/css/jquery.multiselect.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
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
                  <h4 class="card-title">Service Management</h4>         
			

			   <form action="<?php echo URLROOT; ?>/departments/serviceinsert" method="post">  			  
			   <input type="hidden" name="id" value=" <?php echo $data['campaignID']; ?>">	
				
							   
				<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select Service<sup>*</sup></label>
                          <div class="col-sm-9">
                          <select multiple="multiple" class='form-control <?php echo(!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"' id="username" name='username[]' required="required" >
						 <?php foreach($data['servicelist'] as $user) :?>
						 
						<option value="<?php echo $user->id; ?>"><?php echo $user->servicename; ?>&nbsp;&nbsp;</option>	
						
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
						  <th>Department Name</th>
                          <th>Service</th>						  
						  <th>Action</th>
						  
				    </tr>
                  </thead>
				
               <tbody>
			     <?php foreach($data['agent'] as $agents) : ?>      
                 <tr>
				    <td><?php echo $agents->id;?></td>
                    <td><?php echo $agents->name; ?></td> 
                    <td><?php echo $agents->service; ?></td> 
                   
                   <td>
					<a href="<?php echo URLROOT; ?>/Campaign/servicedelete/<?php echo $agents->id; ?>" class="btn btn-info">Remove</a></div>
				  </td>
					
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
 <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>
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


         


