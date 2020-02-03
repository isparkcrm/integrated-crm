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
							<th colspan="12" style="text-align: center;">Payment List</th>
						</tr>
                    <tr>
                           <th>Company</th> 	 
                        <!--  <th>Customer Name</th>  -->
                           <th>Number</th>                          
						              <th>Product</th>                  
                          <th>Value</th>                        
						           <!--   <th>Assignee</th>	-->
						              <th>Order Closed</th>   
                          <th>Payment Term</th>	
                           <th>Completed Days</th>  
                           <th></th>
						  
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['payment'] as $leads):?>
			   
			 <tr>
				    <td><div class="wrap"><?php echo $leads->company;?></div></td>
					<!-- <td><div class="wrap"><?php echo $leads->customername;?></div></td> -->
          <td><div class="wrap"><?php echo $leads->number;?></div></td>
        
                    <td><div class="wrap"><?php echo $leads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->value;?></div></td>             
                   
                  <!--   <td><div class="wrap"><?php echo$leads->assignee;?></div></td> -->		
                      <td><div class="wrap"><?php echo $leads->closed_at;?></div></td> 		
                       <td style="text-align: center;"><div class="wrap"><?php echo $leads->payment;?></div></td>     
				          <?php  
				             date_default_timezone_set("Asia/Kolkata");
$curdatetime = date("Y-m-d H:i:s");
if($curdatetime > $leads->closed_at){
  $diff = abs(strtotime($curdatetime) - strtotime($leads->closed_at));
}else{
  $diff = abs(strtotime($leads->closed_at) - strtotime($curdatetime));
}
$duration=$diff/3600;
$hours= (int)round($duration);
$days=($hours/24);
$days1=(int)round($days);

                                          
                                          if($leads->payment < $days1)
                                          { 
                                          ?>      
                                           <td style="background:red; color:white;text-align: center;"><?php echo $days1; ?></div></td>   
                                           <?php
                                           } 

                                           else{
                                            ?>
                                             <td style="text-align: center;"><?php echo $days1 ?></div></td>   
                                             <?php
                                           }
                                           ?>        
                  
                   <td><a href="<?php echo URLROOT;?>/leads/paymentclose/<?php echo $leads->id; ?>"><i class=" icon fa fa-check-circle fa-1x" data-toggle="tooltip" title data-original-title="cose"></i></a> 
			
					  </td>
					 
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