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
.size1 {
	font-size:21px!important;
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
			<table class="table table-hover dataTable table-striped" id="example" >
                  <thead>
				  <tr style="background-color:#009688; color:white;">
						<td></td> <td></td>
                                       <td> </td> 	<td style="text-align: center;">Commits</td><td></td> <td></td>
                                       <td> </td> <td> </td> <td></t
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
                  
                    <td>
					  <a href="<?php echo URLROOT;?>/leads/leadupdatelist/<?php echo $leads->lead_id;?>" class="  icon5 fa fa-bar-chart fa-1x size1" data-toggle="tooltip" title data-original-title=" View Updates"></a>
					  
						<a href="<?php echo URLROOT;?>/leads/leadupdate/<?php echo $leads->id;?>" class="icon3 fa fa-undo fa-1x size1" data-toggle="tooltip" title data-original-title="Update"></a> 
						
						<a href="<?php echo URLROOT;?>/Meeting/meetinglist/<?php echo $leads->lead_id;?>" class="mdi mdi-account-switch size1" data-toggle="tooltip" title data-original-title="Meeting List"></a>
					  
					  
						<a href="<?php echo URLROOT;?>/Mom/momlist/<?php echo $leads->lead_id;?>" class="mdi mdi-gmail size1" data-toggle="tooltip" title data-original-title="MOM List"></a>
					  
						<a href="<?php echo URLROOT;?>/Quatations/quatationlist/<?php echo $leads->id;?>" class="mdi mdi-file-document-box size1" data-toggle="tooltip" title data-original-title="Quatation List"></a>
					  </td>
					 <td style="display: none;"></td> 
					 
                 </tr> 
				 <?php endforeach;?>
				 <tr style=" font-weight: bold; background-color: #4CAF50; color: white;"><td></td> <td></td>
                                       <td> Total</td> 
                                     <td> <?php echo $data['committotal'];?></td>
                                     <td></td><td></td><td></td><td></td> <td></td></tr>
			  </tbody>
          </table>
		 
		  <br>
<hr>

<br>
		  <table class="table table-hover dataTable table-striped" id="example1" >
                  <thead>
				   <tr style="background-color:#009688; color:white;">
						<td></td> <td></td>
                                       <td> </td> 	<td style="text-align: center;">Upside</td><td></td> <td></td>
                                       <td> </td> <td> </td> <td> </td>
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
                  
                    <td>
					  <a href="<?php echo URLROOT;?>/leads/leadupdatelist/<?php echo $leads->lead_id;?>" class="  icon5 fa fa-bar-chart fa-1x size1" data-toggle="tooltip" title data-original-title=" View Updates"></a>
					  
						
						<a href="<?php echo URLROOT;?>/Meeting/meetinglist/<?php echo $leads->lead_id;?>" class="mdi mdi-account-switch size1" data-toggle="tooltip" title data-original-title="Meeting List"></a>
					  
					  
						<a href="<?php echo URLROOT;?>/Mom/momlist/<?php echo $leads->lead_id;?>" class="mdi mdi-gmail size1" data-toggle="tooltip" title data-original-title="MOM List"></a>
					  
						<a href="<?php echo URLROOT;?>/Quatations/quatationlist/<?php echo $leads->lead_id;?>" class="mdi mdi-file-document-box size1" data-toggle="tooltip" title data-original-title="Quatation List"></a>
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
						<td></td> <td></td>
                                       <td> </td> 	<td style="text-align: center;">Cold & Lead</td><td></td> <td></td>
                                       <td> </td> <td> </td> <td> </td>
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
                  
                    <td>
					  <a href="<?php echo URLROOT;?>/leads/leadupdatelist/<?php echo $leads->lead_id;?>" class="  icon5 fa fa-bar-chart fa-1x size1" data-toggle="tooltip" title data-original-title=" View Updates"></a>
					  
						
						<a href="<?php echo URLROOT;?>/Meeting/meetinglist/<?php echo $leads->lead_id;?>" class="mdi mdi-account-switch size1" data-toggle="tooltip" title data-original-title="Meeting List"></a>
					  
					  
						<a href="<?php echo URLROOT;?>/Mom/momlist/<?php echo $leads->lead_id;?>" class="mdi mdi-gmail size1" data-toggle="tooltip" title data-original-title="MOM List"></a>
					  
						<a href="<?php echo URLROOT;?>/Quatations/quatationlist/<?php echo $leads->lead_id;?>" class="mdi mdi-file-document-box size1" data-toggle="tooltip" title data-original-title="Quatation List"></a>
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
 <style>
 
table td > .wrap {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap; 
  text-align:left;
  }  

table{
    table-layout: fixed;
	 width:100% !important;
	 
}
       

 </style>
 
 
<?php require APPROOT . '/views/inc/footer.php'; ?>       