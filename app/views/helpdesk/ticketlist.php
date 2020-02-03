
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
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
          <?php flash('campaign_message'); ?>
           <?php flash('assignee_message'); ?>
           <h4 class="card-title"> Client Master</h4>                 
              <div class="table-responsive">
                <table class="table table-hover dataTable table-striped" id="example" style="width:100%">
                  <thead>
                    <tr>
                     <th>clientName</th>   
                     <th>Number</th>                         
                     <th>Ticket Id</th>
                     <th>Severity</th>
                  <!--   <th>Department</th> -->                    
                     <th> Process</th>                     
                     <th>Created Date</th>
                     <th>Assignee</th>
                     <th>Manage Ticket</th>
                  </tr>                     
                            
                 </thead>
                 <tbody id="myTable">
                 <?php foreach($data['tickets'] as $tickets) : 
                   if($tickets->closing_status=="1") {  ?> 
                     
                   <tr style=" background-color: #9E9E9E; color: white;">                     
                    <td><?php echo $tickets->name; ?></td> 
                     <td><?php echo $tickets->number; ?></td>                     
                    <td><?php echo $tickets->ticketID; ?></td>                                          
                    <td><?php echo $tickets->severity; ?></td>
                  <!--  <td> <?php echo $tickets->campaignname;?></td>  -->          
                    <td><?php echo $tickets->process;?></td>     
                    <td><?php echo $tickets->created_at; ?></td>
                    <td><?php echo $tickets->assigned_to; ?> </td> 
                    <td>  
                    <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i>                                       
                    <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i>
                    <i class="menu-icon mdi mdi-arrow-up-bold-circle" data-toggle="tooltip" title="Update"> </i>
                
                   
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
                  <!--  <td> <?php echo $tickets->campaignname;?></td>  -->          
                    <td><?php echo $tickets->process;?></td>     
                    <td><?php echo $tickets->created_at; ?></td>
                    <td>
          <?php if($tickets->assigned_to =='Not Assigned') {?>
          <a href="<?php echo URLROOT; ?>/helpdesk/selfassign/<?php echo $tickets->ticketID; ?>"  class="btn btn-primary"> Assign </a>
          <?php  } else {
            echo $tickets->assigned_to;
          }  ?>         
           </td>
             <?php
             $email = 'santhiya@futurecalls.com';
             $number= $tickets->number;             
             $url="http://10.10.10.151:4575/CrmDial?exeUserName={$email}&phoneNumber={$number}&uniqueId={$number}&skill=OUTBOUND&dialCode=888&listId=1";
            ?> 
                  
          <td>  
                    <a href="<?php echo URLROOT; ?>/helpdesk/openUser/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i></a>                                         
                    <!--   <a href="<?php echo URLROOT; ?>/helpdesk/Reassign/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i></a>
                    <a href="<?php echo URLROOT; ?>/helpdesk/update/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-arrow-up-bold-circle" data-toggle="tooltip" title="Update"> </i></a>
                    <a href="<?php echo URLROOT; ?>/helpdesk/close/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-close-circle" data-toggle="tooltip" title="close"> </i></a>
                    <a href="<?php echo URLROOT; ?>/helpdesk/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-elevation-rise" data-toggle="tooltip" title="View Update"> </i></a> -->
                    <a href="<?php echo $url; ?>" target="_blank"> <i class="menu-icon mdi mdi-phone" data-toggle="tooltip" title="Call"> </i></a>
                    <a href="<?php echo URLROOT; ?>/helpdesk/sendmail/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-message-reply-text" data-toggle="tooltip" title="Send Email"> </i></a>
                    <a href="<?php echo URLROOT; ?>/tickets/email_comm/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-email-open-outline" data-toggle="tooltip" title="View Email"> </i></a>
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
 $(document).ready(function() {
 $('#example').DataTable();
});
 </script>

<style type="text/css"> .menu-icon {
    margin-right: 1.25rem;
    width: 16px;
    line-height: 1;
    font-size: 18px;
    color: black;
}
table td > .wrap {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap; 
  text-align:left;
  }  


</style>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>        
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>