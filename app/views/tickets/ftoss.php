
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_tickets.php'; ?>

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
                
                  <h4 class="card-title">FTOSS Tickets</h4>
                
                 <div class="row">
                  <div class="col-md-12">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  </div>
                </div>
                <br>
                <br>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                       <thead>
                         <tr style="background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB); font-weight:bold; color: white;">
                     <th style="text-align: center;">Name</th>                     
                     <th style="text-align: center;">Ticket Id</th>
                     <th style="text-align: center;">Severity</th>
                     <th style="text-align: center;">Title</th>
                     <th style="text-align: center;"> Created Date</th>
                     <th style="text-align: center;">Assigned to</th>
                     <th colspan="2" style="text-align: center;">Manage Ticket</th>
                      
                   </tr>                     
                            
                      </thead>
                      <?php foreach($data['tickets'] as $tickets) : ?> 
                       <tbody id="myTable">
                   <tr>                       
                    <td><div class="wrap"><?php echo $tickets->name; ?></div></td>                 
                    <td><div class="wrap"><?php echo $tickets->ticketNumber; ?></div></td>                                          
                    <td><div class="wrap"><?php echo $tickets->severity; ?></div></td>
                    <td><div class="wrap"> <?php echo $tickets->title;?></div></td>     
                    <td><div class="wrap"><?php echo $tickets->created_at; ?></div></td>
                    <td><div class="wrap"><?php echo $tickets->assigned_to; ?></div></td>
                    <td colspan="2">  <a href='reassign.php? id=<?php echo $generated_id ;?>'><i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Re-Assign"></i></a> 
                    <a href='update.php? id=<?php echo $generated_id ;?>'><i class="menu-icon mdi mdi-arrow-up-bold-circle" data-toggle="tooltip" title="Update"></i></a> 
                    <a href='close.php? id=<?php echo $generated_id ;?>' ><i class="menu-icon mdi mdi-close-circle" data-toggle="tooltip" title="Close"></i></a>        
                    <a href='status.php? ticket_id=<?php echo $ticket_id ;?>' ><i class="menu-icon mdi mdi-elevation-rise" data-toggle="tooltip" title="View Updates"></i></a>
                    <a href='view.php? ticket_id=<?php echo $ticket_id ;?>' ><i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i></a> </td>
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
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>