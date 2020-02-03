<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<script>
$(function () {
  $("select").select2();
});
</script>

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
                  <h4 class="card-title">Client Management</h4>         
			

			   <form action="<?php echo URLROOT; ?>/campaign/clientinsert" method="post">  			  
			   <input type="hidden" name="id" value=" <?php echo $data['campaignID']; ?>">	
        
							   
				<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select Client<sup>*</sup></label>
                          <div class="col-sm-9">
                          <select  class='form-control <?php echo(!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"' id="username" name='username' onchange="getservice(this.value)" >
                          <option value=""  selected="selected"> Select client Name.. </option>
						 <?php foreach($data['clientlist'] as $user) :?>
						<option value="<?php echo $user->client_ID; ?>"><?php echo $user->clientname; ?></option>	
							<?php endforeach; ?>
						  </select>
                          <span class="alert-danger"><?php echo $data['username_err']; ?></span></div>
                        </div>
                      </div>  
		            </div>

                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select Process<sup>*</sup></label>
                          <div class="col-sm-9">
                          <select  class='form-control <?php echo(!empty($data['service_err'])) ? 'is-invalid' : ''; ?>"' name='service' id="service" >
												  </select>
                          <span class="alert-danger"><?php echo $data['service_err']; ?></span></div>
                        </div>
                      </div>  
		            </div>
				<input type="submit"  class="btn btn-success mr-2" value="Add client">
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
						  <th>client Name</th>
                          <th>contact person</th>
						  <th>Mobile Number</th>
						  <th>Action</th>
						  <th style="display:none;"></th>
				    </tr>
                  </thead>
				
               <tbody>
			     <?php foreach($data['client'] as $clients) : ?>      
                 <tr>
				    <td><?php echo $clients->id;?></td>
                    <td><?php echo $clients->clientname; ?></td> 
                    <td><?php echo $clients->contact_person; ?></td> 
                    <td><?php echo $clients->number; ?></td>   
                   <td>
					<a href="<?php echo URLROOT; ?>/Campaign/clientdelete/<?php  echo $clients->id;  ?>" class="btn btn-info">Remove</a></div>
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

<script>
function test(){
	$('#moc1').hide();
}
</script>
  
  <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>            

  <script type="text/javascript">
     function getservice(id){
	var select = $('#service');
	$.ajax({
		 url :"<?php echo URLROOT;?>/clients/getallservice/" + id,
		
		type: "POST",
        dataType: "JSON",
      
		success: function(data)
		{ 
		    var htmlOpt = [];
		   var htmlOpt1 = [];
			console.log('data',data);
			html1 = '<option value="">Select</option>';
			htmlOpt1[htmlOpt1.length] = html1;
			 for(i=0;i<data.length;i++){
				
				html = '<option value="' + data[i].service_id + '" >' + data[i].service + '</option>';
				htmlOpt[htmlOpt.length] = html;
				 
              }
			  select.empty().append( htmlOpt1.join('') ).append( htmlOpt.join('') ); 
	    },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

</script>

         


