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
	
				
	<div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover dataTable table-striped" id="example1" style="width:100%">
                  <thead>
						<tr style="background-color:#009688; color:white;">
							<th colspan="6" style="text-align: center;">Cold & Lead</th>
						</tr>
						<tr>
						      <th>Lead Id</th>
							  <th>Assignee</th>
							  <th>Customer Name</th>  
							  <th>Product</th>                  
							  <th>Value</th>
							  <th>Closure Date</th>   
							  
							  				  
						</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['coldlead'] as $upsideleads):?>
			   
				 <tr>
				     <td><div class="wrap"><?php echo $upsideleads->lead_id;?></div></td>
					 <td><div class="wrap"><?php echo $upsideleads->assignee;?></div></td>
                    <td><div class="wrap"><?php echo $upsideleads->customername;?></div></td> 
                    <td><div class="wrap"><?php echo $upsideleads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $upsideleads->ordervalue;?></div></td>
					<?php $date1=date("Y-m-d"); 
					$date = $upsideleads->closuredate; 
 					if($date < $date1)
					{
					?>					
                    <td style="background:red; color:white"><div class="wrap"><?php echo $date;?></div></td>
                    <?php } else {?>
					<td><div class="wrap"><?php echo $date;?></div></td>
					<?php }?>
                 </tr> 
				 <?php endforeach;?>
				 
			  </tbody>
			   <tr style=" font-weight: bold; background-color: #4CAF50; color: white;">
					 <td></td>
					 <td></td>
					 <td></td>
					 <td> Total</td> 
					 
					 <td> <?php echo $data['coldandleadtotal'];?></td>
					 <td></td>
					 <td></td>
                 </tr>
          </table>
		 </div>    
		</div>
		</div>
	</div>
	</div> 

				<!-- Commit leads-->
				
   
  <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>  
 <script>
 $(document).ready(function() {
 $('#example1').DataTable();
});
 </script> 
 <script>
 $(document).ready(function() {
 $('#example2').DataTable();
});
 </script>  
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>       