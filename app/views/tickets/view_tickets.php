
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/service_head.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>         
          <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> Ticket List</h4>                 
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                     <th>clientName</th>     
                     <th>Number</th>                        
                     <th>Ticket Id</th>
                     <th>Severity</th>
                     <th>Subject</th>
                     <th> Campaign Name</th>
                     <th> Process</th>                     
                     <th>Created Date</th>
                     <th>Assignee</th>
                     <th>Manage Ticket</th>                      
                   </tr>                       
                 </thead>
                 <tbody id="myTable">
                 <?php foreach($data['tickets'] as $tickets) :
                    if($tickets->closing_status=="1") {  
                  ?> 
                     
                   <tr style=" background-color: #9E9E9E; color: white;">                     
                    <td><?php echo $tickets->name; ?></td>      
                    <td><?php echo $tickets->number; ?></td>             
                    <td><?php echo $tickets->ticketID; ?></td>                                          
                    <td><?php echo $tickets->severity; ?></td>
                    <td> <?php echo $tickets->subject;?></td>   
                    <td> <?php echo $tickets->campaignname;?></td> 
                    <td><?php echo $tickets->process;?></td>     
                    <td><?php echo $tickets->created_at; ?></td>
                    <td><?php echo $tickets->assigned_to; ?></td> 
                    <td>  
                     <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i>                                   
                    <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i>
                    <i class="menu-icon mdi mdi-elevation-rise" data-toggle="tooltip" title="View Update"> </i>
                     <i class="menu-icon mdi mdi-message" data-toggle="tooltip" title="View emails"> </i>
                   </td>
                     
                   </tr>                  
                   <?php
                     }
                     else{
                     ?>
                    <tr>                     
                    <td><?php echo $tickets->name; ?></td>  
                    <td><?php echo $tickets->number; ?></td>                
                    <td><?php echo $tickets->ticketID; ?></td>                                          
                    <td><?php echo $tickets->severity; ?></td>
                    <td> <?php echo $tickets->subject;?></td>   
                    <td> <?php echo $tickets->campaignname;?></td> 
                    <td><?php echo $tickets->process;?></td>     
                    <td><?php echo $tickets->created_at; ?></td>
                    <td><?php echo $tickets->assigned_to; ?></td> 
                    <td>  
                    <a href="<?php echo URLROOT; ?>/tickets/open/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i></a>                                         
                    <a href="<?php echo URLROOT; ?>/tickets/assign/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i></a>
                    <a href="<?php echo URLROOT; ?>/helpdesk/status/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-elevation-rise" data-toggle="tooltip" title="View Update"> </i></a>
                    <a href="<?php echo URLROOT; ?>/tickets/email_comm/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-message" data-toggle="tooltip" title="View emails"> </i></a>
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
           

    <!--------------------------------------------------------------------------------------------------------- -->  
    <!--------------------------------------------------------------------------------------------------------- -->              
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      <script>
$(document).ready( function() {
    $('#example').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
})
 </script>

<style type="text/css"> .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}
</style>

<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>