
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/customer.php'; ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>         
  
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                
                  <h4 class="card-title"><?php $_SESSION['username'];?></h4>
                
                
              
                  <div class="table-responsive">
                  <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                     <th>clientName</th>                     
                     <th>Ticket Id</th>
                     <th>Severity</th>
                     <th>Subject</th>
                     <th> Campaign Name</th>
                     <th> Process</th>                     
                     <th>Created Date</th>                    
                     <th>Manage Ticket</th>
                      
                   </tr>                     
                            
                 </thead>
                 <tbody id="myTable">
                      <?php foreach($data['tickets'] as $tickets) : ?> 
                      
                       <tr>                     
                    <td><?php echo $tickets->name; ?></td>                 
                    <td><?php echo $tickets->ticketID; ?></td>                                          
                    <td><?php echo $tickets->severity; ?></td>
                    <td> <?php echo $tickets->subject;?></td>   
                    <td> <?php echo $tickets->campaignname;?></td> 
                    <td><?php echo $tickets->process;?></td>     
                    <td><?php echo $tickets->created_at; ?></td>                  
                    <td>  
                    <a href="<?php echo URLROOT; ?>/customer/Reopen/<?php echo $tickets->ticketID; ?>"  class="btn btn-primary"> Reopen </a>
                                                             
                   
                   </td>
                     
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
           

    <!--------------------------------------------------------------------------------------------------------- -->  
    <!--------------------------------------------------------------------------------------------------------- -->              
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<style type="text/css">
 .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}

tr:nth-child( 2n ) {
  background-color:#ded3f6;
  font-weight: bold;
}
tr:nth-child( 2n + 1 ) {
  background-color: #b8f1d5;
font-weight: bold;
}
</style>

 <script>
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>