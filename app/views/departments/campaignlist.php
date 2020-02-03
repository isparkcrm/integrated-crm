<<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          <div class="col-md-8">
            <a href="<?php echo URLROOT; ?>/posts/index_new" class="btn btn-info"><i class="fa fa-backward"></i> Back <<</a>
            </div>
           
          </div>


<div class="col-12 grid-margin">
              
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
        <?php flash('campaign_message'); ?>
           <h4 class="card-title"> Campaign Management</h4> 
			<div class="table-responsive">
				<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
						         <th>Id</th>
                     <th>Campaign Type</th>                                 
                     <th>Campaign Name</th>                                                   
                     <th>Mode of Comm</th> 					        	 
                     <th>Add Agent</th>	
                     <th>Add Service</th>                   
              </tr>
                  </thead>
				
               <tbody id="myTable">
                      <?php foreach($data['campaign'] as $campaign) : ?>      
                 <tr>
				    <td><?php echo $campaign->id;?></td>
                    <td><?php echo $campaign->campaigntype; ?></td>                  
                    <td><?php echo $campaign->campaignname; ?></td>                      
                    <td><?php echo $campaign->modeofcomm; ?></td>            
						
          <td>
					<form method="post" role="form" action="<?php echo URLROOT; ?>/departments/agent/<?php echo $campaign->id; ?>">
					<div class="wrap"><input type="hidden" name="id" value="<?php echo $campaign->id;?>">
					<button type="submit" id="submit" name="agent" value="Agent" class="btn btn-info">Agent</button> </div>
					 </form>
           </td>
           <td>
           <form method="post" role="form" action="<?php echo URLROOT; ?>/departments/service/<?php echo $campaign->id; ?>">
					<div class="wrap"><input type="hidden" name="id" value="<?php echo $campaign->id;?>">          
					<button type="submit" id="submit" name="client" value="client" class="btn btn-info">Service</button> </div>
					 </form>
					</td>			
					</div>
					
      </tr> 
                <?php                    
               endforeach; ?>                               
            </tbody>
          </table>
        </div>
       </div>
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
 <style>
 table.dataTable.no-footer {
    border-bottom: 0px solid #111;
}
 </style>
 <?php require APPROOT . '/views/inc/footer.php'; ?>   
                         
         
