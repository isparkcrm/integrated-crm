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
    

   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                  <tr>
                             <th>Mobile</th>
								<th>Message</th>							 
                           <th>Assigned</th>
						     <th>Send Mail</th>						 
							 <th>Generate Lead</th>						 
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['smslead'] as $outbound):?>
			   
			     <tr>
				 
				    <td><?php echo $outbound->mobile;?></td> 
				    <td><?php echo $outbound->message;?></td> 
                    <?php if($outbound->assignee=="Not Assignee") {?>					
                    <td><a href="<?php echo URLROOT;?>/telecaller/updatesmslead/<?php echo $outbound->id;?>" class="btn btn-primary" value="Assign">Assign to Me</a></td>
					
					<?php } else {?>
					<td><div class="wrap"><?php echo $outbound->assignee;?></div></td>
					<td><a href="<?php echo URLROOT;?>/telecaller/websitesendemail/<?php echo $outbound->id;?>" class="mdi mdi-email-outline"></a>
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