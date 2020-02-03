<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<div class="main-panel">
          <div class="content-wrapper">
          <div class="row purchace-popup">
          <div class="col-md-8">
          
          </div>
            <div class="col-md-4">
            
            </div>
          </div>


<div class="col-12 grid-margin">
<?php flash('client_success'); ?>    
<?php flash('client_success1'); ?>    
<?php flash('client_message'); ?>    
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> Quatation List</h4>                 
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
              <thead>
					<tr>
						  <th>S.No</th>
						  <th>Lead ID</th>  
						  <th>Customer Name</th>   
						  <th>Quatation Upload</th>				  
						  <th>Description</th>				  
						  <th>Date of Create</th>
                            <th>Quatation</th>									  
                          <th>download</th>								  
					</tr>
              </thead`````>
              <tbody id="myTable">
			   <?php foreach($data['getquatationdetails'] as $quatation):?>
				 <tr>
					  <td><div class="wrap"><?php echo $quatation->id;?></div></td>
                    <td><div class="wrap"><?php echo $quatation->lead_id;?></div></td> 
                    <td><div class="wrap"><?php echo $quatation->customername;?></div></td>                       
                    <td><div class="wrap"><?php echo $quatation->description;?></div></td>        
                    <td><div class="wrap"><?php echo $quatation->created_at;?></div></td> 
<td><div class="wrap"><?php echo $quatation->quatationupload;?></div></td>    					
<td><div class="wrap"></div> <a href="<?php echo URLROOT; ?>/quatation/<?php echo $mom->quatationupload; ?>" style="padding-left: 10px;" target="_blank">Download</a></td>						
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
   </div>
  </div>  
<?php require APPROOT . '/views/inc/footer.php'; ?>
    <script>
 $(document).ready(function() {
 $('#example').DataTable();
 
});
 </script>             
                         
         
        </div>