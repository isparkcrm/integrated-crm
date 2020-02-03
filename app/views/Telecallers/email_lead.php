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
</style>
<div class="main-panel">
        <div class="content-wrapper">
   <div class="row">
   <div class="col-sm-3">
   <a href="<?php echo URLROOT;?>/EmailLeads/index_new" class="btn btn-primary">Check Mail</a>
   </div>
   </div>
   </div>

   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                          <th>S.No</th>
                          <th>Email</th>  
						     <th>Subject</th>   
                          <th>Description</th>                  
                         <th>Assigned</th>
							<th>Send Mail</th>						 
							<th>Generate Lead</th>						 
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['emailtolead'] as $leads):?>
			   
				 <tr>
				     <td><div class="wrap"><?php echo $leads->id;?></div></td>
                    <td><div class="wrap"><?php echo $leads->email;?></div></td> 
                    <td><div class="wrap"><?php echo $leads->subject;?></div></td>  
                    <td><div class="wrap"><?php echo $leads->description;?></div></td> 
					<?php if($leads->assignee=="Not Assign") {?>					
                    <td><a href="<?php echo URLROOT;?>/telecaller/updatestatus/<?php echo $leads->id;?>" class="btn btn-primary" value="Assign">Assign to Me</a></td>
					
					<?php } else {?>
					<td><div class="wrap"><?php echo $leads->assignee;?></div></td>
					<td><a href="<?php echo URLROOT;?>/telecaller/sendemail/<?php echo $leads->id;?>" class="mdi mdi-email-outline"></a>
						<a href="<?php echo URLROOT;?>/telecaller/email_comm/<?php echo $leads->id;?>" class="mdi mdi-email-open"></a>
					</td>
					<td><a href="<?php echo URLROOT;?>/telecaller/lead_master/<?php echo $leads->id;?>" class="mdi mdi-account-star"></a></td>
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