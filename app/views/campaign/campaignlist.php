<?php require APPROOT . '/views/inc/header.php'; ?>
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
            <div class="col-md-4">
            <a href="<?php echo URLROOT; ?>/campaign/campaign_master" class="btn btn-success">Add</a>
            </div>
          </div>


<div class="col-12 grid-margin">
              
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
	
           <h4 class="card-title"> Department Management</h4> 
			<div class="table-responsive">
				<table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
						              <th>Id</th>
                      <!--   <th>Campaign Type</th>     -->                            
                          <th>Department Name</th>                                                   
                          <th>Mode of Comm</th> 
					        	 <th>Action</th>		
                     <th>Add Agent</th>	
                     <th>Add Service</th>                   
              </tr>
                  </thead>
				
               <tbody id="myTable">
                      <?php foreach($data['campaign'] as $campaign) : ?>      
                 <tr>
				    <td><?php echo $campaign->id;?></td>
               <!--     <td><?php echo $campaign->campaigntype; ?></td>             -->     
                    <td><?php echo $campaign->campaignname; ?></td>                      
                    <td><?php echo $campaign->modeofcomm; ?></td>            
					<?php if($campaign->campaigntype =="Outbound") { ?>
					<td>
					<form method="post" role="form" action="<?php echo URLROOT; ?>/campaign/importexcel" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $campaign->id;?>">
          <input type="hidden" name="callscript" value="<?php echo $campaign->callscript;?>">
					
					<div class="wrap">  
						<input  type="file" name="file" id="file" accept=".csv" style="margin-top:15px;" />
					</div>
					
					
					<div class="wrap">  
						<button type="submit" id="submit" name="import" value="Import" class="btn btn-info">Import</button> 
					</div>
					 </form>
					</td>
          <td>
					 <a href="<?php echo URLROOT; ?>/Campaign/edit/<?php echo $campaign->id; ?>" class="btn btn-primary">Edit</a>  </td>
			        <td></td>
          <td style="display:none"></td>
          <td style="display:none"></td>
					<?php } else {?>
					<td>
					 <a href="<?php echo URLROOT; ?>/Campaign/edit/<?php echo $campaign->id; ?>" class="btn btn-primary">Edit</a>  
					
          </td>
          <td>
					<form method="post" role="form" action="<?php echo URLROOT; ?>/Campaign/agent/<?php echo $campaign->id; ?>">
					<div class="wrap"><input type="hidden" name="id" value="<?php echo $campaign->id;?>">
					<button type="submit" id="submit" name="agent" value="Agent" class="btn btn-info">Agent</button> </div>
					 </form>
           </td>
           <td>
           <form method="post" role="form" action="<?php echo URLROOT; ?>/Campaign/service/<?php echo $campaign->id; ?>">
					<div class="wrap"><input type="hidden" name="id" value="<?php echo $campaign->id;?>">          
					<button type="submit" id="submit" name="client" value="client" class="btn btn-info">Service</button> </div>
					 </form>
					</td>
         
					
					</div>
					<?php }?>
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
                         
         
