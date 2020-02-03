<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>
<style>
a {
	    padding: 10%;
}
#docs {
    display: block;
    position: fixed;
    bottom: 0;
    right: 0;
}
</style>
<div class="main-panel">
        <div class="content-wrapper">
   <div class="row">
  	<form id="myform" class="form-horizontal well" action="<?php echo URLROOT;?>/telecaller/outboundcall" method="POST" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV File:</label>
							</div>
							<div class="controls">
								<input type="file" accept=".csv" name="file" id="file" class="form-control">
								<input type="hidden" value="Not Assign" name="assignee" class="form-control"/>
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
   </div>
   </div>

   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                  <tr>
                          <th>Customer Name</th>  
						     <th>Mobile</th>   
                           <th>Email</th>                  
                           <th>Assigned</th>
						     <th>Send Mail</th>						 
							 <th>Generate Lead</th>						 
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['outboundlead'] as $outbound):?>
			     <tr>
				 
				     <td><?php echo $outbound->name;?></td>
                    <td><?php echo $outbound->mobile;?></td> 
                    <td><?php echo $outbound->email;?></td>  
                    <?php if($outbound->assignee=="Not Assign") {?>					
                    <td><a href="<?php echo URLROOT;?>/telecaller/updateoutboundcall/<?php echo $outbound->id;?>" class="btn btn-primary" value="Assign">Assign to Me</a></td>
					
					<?php } else {?>
					<td><div class="wrap"><?php echo $outbound->assignee;?></div></td>
					<td><a href="<?php echo URLROOT;?>/telecaller/outboundsendemail/<?php echo $outbound->id;?>" class="mdi mdi-email-outline"></a>
						<a href="<?php echo URLROOT;?>/telecaller/email_comm/<?php echo $outbound->lead_id;?>" class="mdi mdi-email-open"></a>
					</td>
					<td><a href="<?php echo URLROOT;?>/telecaller/lead_master/<?php echo $outbound->id;?>" class="mdi mdi-account-star"></a></td>
				     <?php }?>
					  
				   </tr> 
				   <?php endforeach;?>
				</tbody>
          </table>
		 </div>           
	   </div>
		</div>
	</div>
	
  </div>  
  
  
<?php require APPROOT . '/views/inc/footer.php'; ?>       