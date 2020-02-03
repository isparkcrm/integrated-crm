<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>

<script>
$(function(){
	$('#assignee').click(function(){
	 if ( this.value == 'Other')
      {
        $("#userlist").show();
      }
	  else 
	  {
		  $("#userlist").hide();
	  }
	});
});
</script>
<style>

.size1{
	font-size:20px;
}
</style>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          <div class="col-md-8">
            <a href="<?php echo URLROOT; ?>/posts/index_new" class="btn btn-info"><i class="fa fa-backward"></i> Back <<</a>
            </div>
            <div class="col-md-4">
            <a href="<?php echo URLROOT; ?>/leads/lead_master" class="btn btn-success">Add</a>
            </div>
          </div>
   </div>
   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
				  <tr style="background-color:#009688; color:white;">
							<th colspan="7" style="text-align: center;">Assigned Leads</th>
						</tr>
                    <tr>
                          <th style="text-align:center;">Customer Name</th>  
						  <th style="text-align:center;">Customer Number</th>   
                          <th style="text-align:center;">Lead Source</th>
						  <th style="text-align:center;" row="4">Actions</th>
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['assigedleads'] as $leads):?>
				<tr>
				    <td style="text-align:center;"><div class="wrap"><?php echo $leads->customername;?></div></td> 
                    <td style="text-align:center;"><div class="wrap"><?php echo $leads->mobile;?></div></td>  
                    <td style="text-align:center;"><div class="wrap"><?php echo $leads->leadsource;?></div></td>        
                    <td style="text-align:center;">
						<a href="<?php echo URLROOT;?>/leads/onlineleadedit/<?php echo $leads->id;?>" class="icon4 fa fa-pencil-square-o fa-1x size1" data-toggle="tooltip" title data-original-title="Edit"></a>
											
						<a href="<?php echo URLROOT;?>/Meeting/sendIcalEvent/<?php echo $leads->id;?>" class="mdi mdi-account-switch size1" data-toggle="tooltip" title data-original-title="Schedule Meeting"></a>

						<a href="<?php echo URLROOT;?>/Mom/mom_master/<?php echo $leads->id;?>" class="mdi mdi-gmail size1" data-toggle="tooltip" title data-original-title="Update MOM"></a>
						
					</td>
						<!--<//?php if($leads->assignee =="") {?>
					  <td>
						<a href="<//?php echo URLROOT;?>/saleshead/assignedto/<//?php echo $leads->id;?>" class="btn btn-primary" id="assignee" value="Assign">Assignee</a>
					  </td>
						<//?php } else {?>
					  <td>
						<div class="wrap"><//?php echo $leads->assignee;?></div>
					  </td>
					  <//?php }?>-->
					  
                 </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table>
		  
		 <!-- <table class="table table-hover dataTable table-striped" id="example1" style="width:100%">
                  <thead>
				  <tr style="background-color:#009688; color:white;">
							<th colspan="7" style="text-align: center;">Leads</th>
						</tr>
                    <tr>
                          <th style="text-align:center;">Customer Name</th>  
                          <th style="text-align:center;">Product</th>  
						  <th style="text-align:center;">Lead Status</th>  
						  <th style="text-align:center;">Order Value</th>   
                          <th style="text-align:center;">Closure Date</th>   
                          <th  style="text-align:center;"row="4">Actions</th>
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['leadlist'] as $leads):?>
			   <tr>
				    <td style="text-align:center;"><div class="wrap"><?php echo $leads->customername;?></div></td> 
                    <td style="text-align:center;"><div class="wrap"><?php echo $leads->product;?></div></td>        
                    <td style="text-align:center;"><div class="wrap"><?php echo $leads->leadstatus;?></div></td>
                    <td style="text-align:center;"><div class="wrap"><?php echo $leads->ordervalue;?></div></td>
                    <td style="text-align:center;"><div class="wrap"><?php echo $leads->closuredate;?></div></td>
					<td style="text-align:center;">
						<a href="<?php echo URLROOT;?>/leads/leadedit/<?php echo $leads->id;?>" class="icon4 fa fa-pencil-square-o fa-1x size1" data-toggle="tooltip" title data-original-title="Edit"></a>
						<?php if($leads->closuredate != "") {?>
						<a href="<?php echo URLROOT;?>/leads/leadupdate/<?php echo $leads->id;?>" class="icon3 fa fa-undo fa-1x size1" data-toggle="tooltip" title data-original-title="Update"></a>
						<a href="<?php echo URLROOT;?>/leads/leadupdatelist/<?php echo $leads->lead_id;?>" class="icon5 fa fa-bar-chart fa-1x size1" data-toggle="tooltip" title data-original-title="View Updates"></a>
						<?php }?>
						<?php if($leads->closuredate != "") {?>
						<a href="<?php echo URLROOT;?>/Meeting/sendIcalEvent/<?php echo $leads->id;?>" class="mdi mdi-account-switch size1"></a>
						<a href="<?php echo URLROOT;?>/Mom/mom_master/<?php echo $leads->id;?>" class="mdi mdi-gmail size1"></a>
						<a href="<?php echo URLROOT;?>/Quatations/quatation_master/<?php echo $leads->id;?>" class="mdi mdi-file-document-box size1"></a>
					</td>
						<!--<//?php if($leads->assignee =="") {?>
					  <td>
						<a href="<//?php echo URLROOT;?>/saleshead/assignedto/<//?php echo $leads->id;?>" class="btn btn-primary" id="assignee" value="Assign">Assignee</a>
					  </td>
						<//?php } else {?>
					  <td>
						<div class="wrap"><//?php echo $leads->assignee;?></div>
					  </td>
					  <//?php }?>-->
					  <?php }?>
               <!--  </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table> -->
		 </div>           
	   </div>
		</div>
	</div>
	
  </div>  
  <script>
$(document).ready( function() {
    $('#example').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
})
 </script> 
 <script>
$(document).ready( function() {
    $('#example1').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
})
 </script> 
<?php require APPROOT . '/views/inc/footer.php'; ?>       