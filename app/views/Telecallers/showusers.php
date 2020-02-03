<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar1.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          <div class="col-md-8">
            <a href="<?php echo URLROOT; ?>/posts/index_new" class="btn btn-info"><i class="fa fa-backward"></i> Back <<</a>
            </div>
            <div class="col-md-4">
            <a href="<?php echo URLROOT; ?>/posts/user_master" class="btn btn-success">Add</a>
            </div>
          </div>


<div class="col-12 grid-margin">
              
  <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
        <?php flash('post_message1'); ?>
        <?php flash('post_message'); ?> 
           <h4 class="card-title"> User Master</h4>                 
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                          <th>Sno</th>
                          <th>User Type</th>
                          <th>Resource Type</th>
                          <th>Location</th>    
                          <th>Emp ID</th>                                               
                           <th>Name</th>  
                          <th>Number</th>                           
                          <th>Current status</th>                                        
                          <th>Action</th>  
<th style="display:none;"></th>						  
				  
                    </tr>
                  </thead>
               
               <tbody id="myTable">
			    <?php foreach($data['users'] as $users) : ?> 
               <?php
               if($users->status!=5){
               ?>
              
                 <tr>
                    <td></td>
                    <td><div class="wrap"><?php echo $users->usertype; ?></div></td> 
                    <td><div class="wrap"><?php echo $users->resource; ?></div></td> 
                    <td><div class="wrap"><?php echo $users->location; ?></div></td>     
                    <td><div class="wrap"><?php echo $users->emp_id; ?></div></td>                             
                    <td><div class="wrap"><?php echo  $users->name; ?></div></td>    
                    <td><div class="wrap"><?php echo $users->number; ?></div></td>                                       
                    <td>
                     <?php
                       if($users->status!=5){
                          echo "<p>Enable</p>";                                            
                        } 
                      else {
                        echo "<p>Disable</p>";
                            } 
                     ?> 
					</td>					 
                    <td><div class="wrap"> <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $users->userID; ?>" class="btn btn-primary">Edit</a>  </div></td>         
                    <td><form action="<?php echo URLROOT; ?>/posts/disable" method="post"> 
                    <input type="hidden"  name='id' value="<?php echo $users->userID; ?>">
                    <input type="hidden"  name='status' value="5">  
                    <input type="submit"  class="btn btn-success mr-2" value="Disable">      
                    </form>   
                                                              
                    </td>                                                             
                  </tr> 
                  <?php
               }
               else{                               
               ?> 
               <tr style="pointer-events: none;cursor: default; background-color: #9e9e9e;" >
               <td></td>
                    <td><div class="wrap"><?php echo $users->usertype; ?></div></td> 
                    <td><div class="wrap"><?php echo $users->resource; ?></div></td> 
                    <td><div class="wrap"><?php echo $users->location; ?></div></td>     
                    <td><div class="wrap"><?php echo $users->emp_id; ?></div></td>                             
                    <td><div class="wrap"><?php echo  $users->name; ?></div></td>    
                    <td><div class="wrap"><?php echo $users->number; ?></div></td>                                       
                    <td>
                     <?php
                       if($users->status!=5){
                          echo "<p>Enable</p>";                                            
                        } 
                      else {
                        echo "<p>Disable</p>";
                            } 
                     ?>  
					</td>					 
                    <td><div class="wrap"> <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $users->userID; ?>" class="btn btn-primary">Edit</a>  </div></td>         
                    <td><form action="<?php echo URLROOT; ?>/posts/disable" method="post"> 
                    <input type="hidden"  name='id' value="<?php echo $users->userID; ?>">
                    <input type="hidden"  name='status' value="5">  
                    <input type="submit"  class="btn btn-success mr-2" value="Disable">      
                    </form>   
                                                              
                    </td> 
					
                  </tr> 
                <?php  
               }           
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
<?php require APPROOT . '/views/inc/footer.php'; ?>
 <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>             
                         
         
        </div>