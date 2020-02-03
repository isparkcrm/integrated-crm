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
         <div class="row purchace-popup">
          <div class="col-md-8">
          
          </div>
            <div class="col-md-4">
            
            </div>
          </div>
   
   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
		<h4 class="card-title"> Meeting List</h4>
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
              <thead>
					<tr>
						  <th>S.No</th>
						  <th>Lead ID</th>  
						  <th>From Date & Time</th>   
						  <th>To Date & Time</th>                  
						  <th>Subject</th>				  
						  <th>Description</th>				  
						  <th>Location</th>				  
					</tr>
              </thead`````>
              <tbody id="myTable">
			   <?php foreach($data['getmeeting'] as $meeting):?>
				 <tr>
					  <td><div class="wrap"><?php echo $meeting->id;?></div></td>
                    <td><div class="wrap"><?php echo $meeting->lead_id;?></div></td> 
                    <td><div class="wrap"><?php echo $meeting->startTime;?></div></td>  
                    <td><div class="wrap"><?php echo $meeting->endTime;?></div></td>            
                    <td><div class="wrap"><?php echo $meeting->subject;?></div></td>        
                    <td><div class="wrap"><?php echo $meeting->description;?></div></td>        
                    <td><div class="wrap"><?php echo $meeting->location;?></div></td>        
				 </tr> 
				<?php endforeach;?>
			  </tbody>
          </table>
		 </div>           
	   </div>
		</div>
	</div>
	</div>
	
  </div>  
  <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>  
<?php require APPROOT . '/views/inc/footer.php'; ?>       