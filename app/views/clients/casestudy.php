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
            <a href="<?php echo URLROOT; ?>/clients/knowledge_base" class="btn btn-success">Add</a>
            </div>
          </div>



<?php flash('client_success'); ?>    
<?php flash('client_success1'); ?>    
<?php flash('client_message'); ?>    
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> Knowledge Base</h4>                 
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                          <th>Subject</th>
                          <th>Description</th>                           
                          <th>Keyword</th>   
                          <th>version</th>               
                         
<th>Action</th>						  
				  
                    </tr>
                  </thead>
              
               <tbody id="myTable">
                              <?php foreach($data['case_studies'] as  $case_studies) : ?> 
                 <tr>
                    <td><div class="wrap"><?php echo  $case_studies->subject; ?></div></td> 
                    <td><div class="wrap"><?php echo  $case_studies->description; ?></div></td>   
                    <td><div class="wrap"><?php echo  $case_studies->keyword; ?></div></td>  
                    <td><div class="wrap">Version<?php echo  $case_studies->version; ?></div></td>            
                     
                                                              
                    
                    <td><div class="wrap"> <a href="<?php echo URLROOT; ?>/clients/knowledge_edit/<?php echo  $case_studies->id; ?>" class="btn btn-primary">Edit</a>        
                    <a href="<?php echo URLROOT; ?>/clients/knowledge_delete/<?php echo  $case_studies->id; ?>" class="btn btn-danger">Delete</a>  </div></td>
                    
                                                                         
                  </tr> 
                 
                    </form>                                      
                                                                   
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
<?php require APPROOT . '/views/inc/footer.php'; ?>
    <script>
$(document).ready( function() {
    $('#example').dataTable({
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
}
  </style>   
      
         
        </div>