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
         
          </div>
   </div>

   <div class="col-12 grid-margin">
		<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			 <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
          <tr style="background-color:#009688; color:white;">
              <th colspan="12" style="text-align: center;">Postponed Leads</th>
            </tr>
                    <tr>
                           <th>Lead ID</th>    
                          <th>Customer</th>                                                    
                          <th>Product</th>                  
                          <th>Value</th>                        
                          <th>Assignee</th> 
                           <th>Post Date</th> 
                            <th>Reason</th> 
                          <th>Order Dropped</th>                  
                          
          </tr>
                  </thead>
               <tbody id="myTable">
         <?php foreach($data['payment'] as $leads):?>
         
       <tr>
                <td><div class="wrap"><?php echo $leads->lead_id;?></div></td>
                 <td><div class="wrap"><?php echo $leads->company;?></div></td>       
                    <td><div class="wrap"><?php echo $leads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->value;?></div></td>                
                    <td><div class="wrap"><?php echo$leads->assignee;?></div></td>
                    
                      <td><div class="wrap"> <?php echo$leads->whom;?></div></td>
                        <td><div class="wrap"><?php echo$leads->reason;?></div></td>
                      <td><div class="wrap"><?php echo $leads->closed_at;?></div></td>           
         <?php endforeach;?>
        </tbody>
          </table>
		

<br>
		 
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

 
<?php require APPROOT . '/views/inc/footer.php'; ?>       