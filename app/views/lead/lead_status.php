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
			<table class="table table-hover dataTable table-striped" id="example">
                  <thead>
				  <tr style="background-color:#009688; color:white;">
							<th colspan="9" style="text-align: center;">Commits</th>
						</tr>
                    <tr>
                          <th>Lead Id</th>  						 
                          <th>Customer Name</th>  
						  <th>Product</th>                  
                          <th>Value</th>						 
						  <th>Lead Status</th>
						  <th>Assignee</th>	
						   <th>Closure Date</th>   
                          <th>Actions</th>	
                        <th></th>
						  
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['commitleadlist'] as $leads):?>
			   
			 <tr>
				    <td><div class="wrap"><?php echo $leads->lead_id;?></div></td>
					<td><div class="wrap"><?php echo $leads->customername;?></div></td> 
                    <td><div class="wrap"><?php echo $leads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->ordervalue;?></div></td>             
                    <td><div class="wrap"><?php echo $leads->leadstatus;?></div></td>	
                     <td><div class="wrap"><?php echo$leads->assignee;?></div></td>				
				          <?php  
				               date_default_timezone_set("Asia/Kolkata");
                                          $date1=date("Y-m-d");
                                          
                                          if($leads->closuredate < $date1)
                                          { 
                                          ?>      
                                           <td style="background:red; color:white"><?php echo $leads->closuredate; ?></div></td>   
                                           <?php
                                           } 

                                           else{
                                            ?>
                                             <td><?php echo $leads->closuredate ?></div></td>   
                                             <?php
                                           }
                                           ?>        
                  
                   <td><a href="<?php echo URLROOT;?>/leads/leadclose/<?php echo $leads->id; ?>"><i class=" icon fa fa-check-circle fa-1x" data-toggle="tooltip" title data-original-title="Close"></i></a> 

						<a href="<?php echo URLROOT;?>/leads/leaddrop/<?php echo $leads->id; ?>"><i class="icon1 fa fa-times-circle fa-1x" data-toggle="tooltip" title data-original-title="Drop"></i></a> 
								<a href="<?php echo URLROOT;?>/leads/leaddelete/<?php echo $leads->id; ?>"><i class="fa fa-trash fa-1x" data-toggle="tooltip" title data-original-title="Delete"></i></a> 
                     <a href="<?php echo URLROOT;?>/leads/leadlost/<?php echo $leads->id; ?>"><i class=" icon2 fa fa-exclamation-circle fa-1x" data-toggle="tooltip" title data-original-title="Lost"></i></a>
                     
						<a href="<?php echo URLROOT;?>/leads/leadpostponed/<?php echo $leads->id; ?>"><i class="fa fa-calendar fa-1x" data-toggle="tooltip" title data-original-title="Postponed"></i></a>
					  </td>
					 <td style="display: none;"></td> 
				 <?php endforeach;?>
			  </tbody>
          </table>
		 
		  <br>
<hr>

<br>
		  <table class="table table-hover dataTable table-striped" id="example1" >
                  <thead>
				  <tr style="background-color:#009688; color:white;">
							<th colspan="9" style="text-align: center;">Upside</th>
						</tr>
                    <tr>
                          <th>Lead Id</th>  
						  <th>Customer Name</th>  
						  <th>Product</th>                  
                          <th>Value</th>						 
						  <th>Lead Status</th>
						  <th>Assignee</th>	
						  <th>Closure Date</th>   
                          <th>Actions</th>	
                        <th></th>
						  
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['upsideleadlist'] as $leads):?>
			   
			   
			 <tr>
				    <td><div class="wrap"><?php echo $leads->lead_id;?></div></td>
					<td><div class="wrap"><?php echo $leads->customername;?></div></td> 
                    <td><div class="wrap"><?php echo $leads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->ordervalue;?></div></td>             
                    <td><div class="wrap"><?php echo $leads->leadstatus;?></div></td>	
                     <td><div class="wrap"><?php echo$leads->assignee;?></div></td>				
				          <?php  
				               date_default_timezone_set("Asia/Kolkata");
                                          $date1=date("Y-m-d");
                                          
                                          if($leads->closuredate < $date1)
                                          { 
                                          ?>      
                                           <td style="background:red; color:white"><?php echo $leads->closuredate; ?></div></td>   
                                           <?php
                                           } 

                                           else{
                                            ?>
                                             <td><?php echo $leads->closuredate ?></div></td>   
                                             <?php
                                           }
                                           ?>        
                   <td><a href="<?php echo URLROOT;?>/leads/leadclose/<?php echo $leads->id; ?>"><i class=" icon fa fa-check-circle fa-1x" data-toggle="tooltip" title data-original-title="Close"></i></a> 

						<a href="<?php echo URLROOT;?>/leads/leaddrop/<?php echo $leads->id; ?>"><i class="icon1 fa fa-times-circle fa-1x" data-toggle="tooltip" title data-original-title="Drop"></i></a> 

                     <a href="<?php echo URLROOT;?>/leads/leadlost/<?php echo $leads->id; ?>"><i class=" icon2 fa fa-exclamation-circle fa-1x" data-toggle="tooltip" title data-original-title="Lost"></i></a>
                     
						<a href="<?php echo URLROOT;?>/leads/leadpostponed/<?php echo $leads->id; ?>"><i class="fa fa-calendar fa-1x" data-toggle="tooltip" title data-original-title="Postponed"></i></a>
					  </td>
					 <td style="display: none;"></td> 
					 
                 </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table>
 <br>
<hr>

<br>
		  <table class="table table-hover dataTable table-striped" id="example2" >
                  <thead>
				  <tr style="background-color:#009688; color:white;">
							<th colspan="9" style="text-align: center;"> Lead</th>
						</tr>
                    <tr>
                          <th>Lead Id</th>  
						  <th>Customer Name</th>  
						  <th>Product</th>                  
                          <th>Value</th>
						
						  <th>Lead Status</th>
						  <th>Assignee</th>	
						    <th>Closure Date</th>   
                          <th>Actions</th>	
                          <th></th>
						  
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['leadleadlist'] as $leads):?>
			   
			   
			 <tr>
				    <td><div class="wrap"><?php echo $leads->lead_id;?></div></td>
					<td><div class="wrap"><?php echo $leads->customername;?></div></td> 
                    <td><div class="wrap"><?php echo $leads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->ordervalue;?></div></td>             
                    <td><div class="wrap"><?php echo $leads->leadstatus;?></div></td>	
                     <td><div class="wrap"><?php echo$leads->assignee;?></div></td>				
				          <?php  
				               date_default_timezone_set("Asia/Kolkata");
                                          $date1=date("Y-m-d");
                                          
                                          if($leads->closuredate < $date1)
                                          { 
                                          ?>      
                                           <td style="background:red; color:white"><?php echo $leads->closuredate; ?></div></td>   
                                           <?php
                                           } 

                                           else{
                                            ?>
                                             <td><?php echo $leads->closuredate ?></div></td>   
                                             <?php
                                           }
                                           ?>        
                    <td><a href="<?php echo URLROOT;?>/leads/leadclose/<?php echo $leads->id; ?>"><i class=" icon fa fa-check-circle fa-1x" data-toggle="tooltip" title data-original-title="Close"></i></a> 

						<a href="<?php echo URLROOT;?>/leads/leaddrop/<?php echo $leads->id; ?>"><i class="icon1 fa fa-times-circle fa-1x" data-toggle="tooltip" title data-original-title="Drop"></i></a> 

                     <a href="<?php echo URLROOT;?>/leads/leadlost/<?php echo $leads->id; ?>"><i class=" icon2 fa fa-exclamation-circle fa-1x" data-toggle="tooltip" title data-original-title="Lost"></i></a>
                     
						<a href="<?php echo URLROOT;?>/leads/leadpostponed/<?php echo $leads->id; ?>"><i class="fa fa-calendar fa-1x" data-toggle="tooltip" title data-original-title="Postponed"></i></a>
					  </td>
					<td style="display: none;"></td> 
					
                 </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table>
		  <br>
<hr>

<br>
		  <table class="table table-hover dataTable table-striped" id="example3" >
                  <thead>
				  <tr style="background-color:#009688; color:white;">
							<th colspan="9" style="text-align: center;">Cold </th>
						</tr>
                    <tr>
                          <th>Lead Id</th>  
						  <th>Customer Name</th>  
						  <th>Product</th>                  
                          <th>Value</th>
						
						  <th>Lead Status</th>
						  <th>Assignee</th>	
						    <th>Closure Date</th>   
                          <th>Actions</th>	
                          <th></th>
						  
					</tr>
                  </thead>
               <tbody id="myTable">
			   <?php foreach($data['coldleadlist'] as $leads):?>
			   
			   
			 <tr>
				    <td><div class="wrap"><?php echo $leads->lead_id;?></div></td>
					<td><div class="wrap"><?php echo $leads->customername;?></div></td> 
                    <td><div class="wrap"><?php echo $leads->product;?></div></td>            
                    <td><div class="wrap"><?php echo $leads->ordervalue;?></div></td>             
                    <td><div class="wrap"><?php echo $leads->leadstatus;?></div></td>	
                     <td><div class="wrap"><?php echo$leads->assignee;?></div></td>				
				          <?php  
				               date_default_timezone_set("Asia/Kolkata");
                                          $date1=date("Y-m-d");
                                          
                                          if($leads->closuredate < $date1)
                                          { 
                                          ?>      
                                           <td style="background:red; color:white"><?php echo $leads->closuredate; ?></div></td>   
                                           <?php
                                           } 

                                           else{
                                            ?>
                                             <td><?php echo $leads->closuredate ?></div></td>   
                                             <?php
                                           }
                                           ?>        
                    <td><a href="<?php echo URLROOT;?>/leads/leadclose/<?php echo $leads->id; ?>"><i class=" icon fa fa-check-circle fa-1x" data-toggle="tooltip" title data-original-title="Close"></i></a> 

						<a href="<?php echo URLROOT;?>/leads/leaddrop/<?php echo $leads->id; ?>"><i class="icon1 fa fa-times-circle fa-1x" data-toggle="tooltip" title data-original-title="Drop"></i></a> 

                     <a href="<?php echo URLROOT;?>/leads/leadlost/<?php echo $leads->id; ?>"><i class=" icon2 fa fa-exclamation-circle fa-1x" data-toggle="tooltip" title data-original-title="Lost"></i></a>
                     
						<a href="<?php echo URLROOT;?>/leads/leadpostponed/<?php echo $leads->id; ?>"><i class="fa fa-calendar fa-1x" data-toggle="tooltip" title data-original-title="Postponed"></i></a>
					  </td>
					<td style="display: none;"></td> 
					
                 </tr> 
				 <?php endforeach;?>
			  </tbody>
          </table>
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
 <script>
$(document).ready( function() {
    $('#example2').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
})
 </script> 
  <script>
$(document).ready( function() {
    $('#example3').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
})
 </script>
 <style>
 
table td > .wrap {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap; 
  text-align:left;
  }  

table{
    table-layout: fixed;
	 width:120% !important;
	 
}
       

 </style>
 
<?php require APPROOT . '/views/inc/footer.php'; ?>       