
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/datatables/dataTables.bootstrap.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/public/datatables/jquery.dataTables.min.js"></script>
<style>
.table-striped tbody tr:nth-of-type(odd)
{
	background-color: rgb(170, 205, 230);
}
.count {
	position: absolute;
    left: 92%;
    width: 1rem;
    height: 1rem;
    border-radius: 100%;
    background: #FF0017;
    color: #ffffff;
    font-size: 11px;
    top: 44px;
    font-weight: 600;
    line-height: 1rem;
    border: none;
    text-align: center;
}
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>   
          <?php flash('email_message'); ?>      
          <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
     <div class="card">
        <div class="card-body">
           <h4 class="card-title"> SMS Tickets</h4>                 
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="example" style="width:100%">
                  <thead>
                    <tr>
                     <th>clientName</th>     
                     <th>Number</th>                    
                     <th>Ticket Id</th>
                     <th>Severity</th>
                    <!-- <th>Subject</th>  -->                  
                     <th>Created Date</th>
                     <th>Assignee</th>
                     <th>Manage Ticket</th>
					
                      
                   </tr>                     
                            
                 </thead>
                 <tbody id="myTable">
                 <?php foreach($data['tickets'] as $tickets) : 
				 
												
                     if($tickets->closing_status=="1") {  ?> 
                   <tr style=" background-color: #9E9E9E; color: white;">                     
                    <td><div class="wrap"><?php echo $tickets->name; ?></div></td>  
                    <td><div class="wrap"><?php echo $tickets->number; ?></div></td>                   
                    <td><div class="wrap"><?php echo $tickets->ticketID; ?></div></td>                                     
                    <td><div class="wrap"><?php echo $tickets->severity; ?></div></td>
                  <!--  <td><div class="wrap"> <?php echo $tickets->subject;?></div></td> -->                  
                    <td><div class="wrap"><?php echo $tickets->created_at; ?></div></td>
                    <td><div class="wrap"><?php echo $tickets->assigned_to; ?></div></td> 
					
                    <td>  
                     <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i>                                     
                    <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i>
                     <i class="menu-icon mdi mdi-arrow-up-bold-circle" data-toggle="tooltip" title="Update"> </i>
                   
                   
                
					<?php
						$ticketid = $tickets->ticketID;
						$EmailCount  = $this->departmentModel->getunreadEmails($ticketid);
						
						?>
                   <a href="<?php echo URLROOT; ?>/tickets/email_comm/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon count-indicator mdi mdi-email-open-outline" data-toggle="tooltip" title="View Email"> <sup style="color:red;"><?php echo $EmailCount; ?></sup></i>
					</a>
						
                   </td>
                   </tr>                  
                <?php
                     }
                     else{
                     ?>
					 <?php if($tickets->read_status!="2"){?>
                      <tr>  
										  
                    <td><div class="wrap"><?php echo $tickets->name; ?></div></td>      
                    <td><div class="wrap"><?php echo $tickets->number; ?></div></td>                            
                    <td><div class="wrap"><?php echo $tickets->ticketID; ?></div></td>                                
                    <td><div class="wrap"><?php echo $tickets->severity; ?></div></td>
                   <!-- <td><div class="wrap"> <?php echo $tickets->subject;?></div></td>  -->            
                    <td><div class="wrap"><?php echo $tickets->created_at; ?></div></td>
                    <td><div class="wrap"><?php echo $tickets->assigned_to; ?></div></td> 
					
                    <td> 
                    <?php
						 $email = 'santhiya@futurecalls.com';
						 $number= $tickets->number;	 						
						 $url="http://10.10.10.151:4575/CrmDial?exeUserName={$email}&phoneNumber={$number}&uniqueId={$number}&skill=OUTBOUND&dialCode=888&listId=1";
						?> 
                    <a href="<?php echo URLROOT; ?>/departments/openUser/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i></a>                                         
                 <!--   <a href="<?php echo URLROOT; ?>/departments/Reassign/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i></a>
                    <a href="<?php echo URLROOT; ?>/departments/update/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-arrow-up-bold-circle" data-toggle="tooltip" title="Update"> </i></a>
                    <a href="<?php echo URLROOT; ?>/departments/close/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-close-circle" data-toggle="tooltip" title="close"> </i></a>
                    <a href="<?php echo URLROOT; ?>/departments/status/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-elevation-rise" data-toggle="tooltip" title="View Update"> </i></a> -->
                    <a href="<?php echo $url; ?>" target="_blank"> <i class="menu-icon mdi mdi-phone" data-toggle="tooltip" title="Call"> </i></a>
                    <a href="<?php echo URLROOT; ?>/departments/sendmail/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-message-reply-text" data-toggle="tooltip" title="Send Email"> </i></a>
					
					<?php
						$ticketid = $tickets->ticketID;
						$EmailCount  = $this->departmentModel->getunreadEmails($ticketid);
						
						?>
                   <a href="<?php echo URLROOT; ?>/tickets/email_comm/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon count-indicator mdi mdi-email-open-outline" data-toggle="tooltip" title="View Email"><sup style="color:red;"><?php echo $EmailCount; ?></sup> </i>
					</a>
						
                   </td>
				   </tr>
                     
					 
					 
					 <?php } 
					 else {?>
					 <tr>
					 <td><strong><?php echo $tickets->name;?></strong></td>                 
					 <td><strong><?php echo $tickets->number;?></strong></td>                 
						<td><strong><?php echo $tickets->ticketID;?></strong></td>
						<td><strong><?php echo $tickets->severity;?></strong></td>            
						<td><strong><?php echo $tickets->created_at;?></strong></td>
						<td><strong><?php echo $tickets->assigned_to;?></strong></td>
						
						<td> 
						<?php
							 $email = 'santhiya@futurecalls.com';
							 $number= $tickets->number;	 						
							 $url="http://10.10.10.151:4575/CrmDial?exeUserName={$email}&phoneNumber={$number}&uniqueId={$number}&skill=OUTBOUND&dialCode=888&listId=1";
							?> 
						<a href="<?php echo URLROOT; ?>/departments/openUser/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-eye" data-toggle="tooltip" title="View Ticket"> </i></a>                                         
					 <!--   <a href="<?php echo URLROOT; ?>/departments/Reassign/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-account-circle" data-toggle="tooltip" title="Assign"> </i></a>
						<a href="<?php echo URLROOT; ?>/departments/update/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-arrow-up-bold-circle" data-toggle="tooltip" title="Update"> </i></a>
						<a href="<?php echo URLROOT; ?>/departments/close/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-close-circle" data-toggle="tooltip" title="close"> </i></a>
						<a href="<?php echo URLROOT; ?>/departments/status/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-elevation-rise" data-toggle="tooltip" title="View Update"> </i></a> -->
						<a href="<?php echo $url; ?>" target="_blank"> <i class="menu-icon mdi mdi-phone" data-toggle="tooltip" title="Call"> </i></a>
						<a href="<?php echo URLROOT; ?>/departments/sendmail/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon mdi mdi-message-reply-text" data-toggle="tooltip" title="Send Email"> </i></a>
						
					<?php
						$ticketid = $tickets->ticketID;
						$EmailCount  = $this->departmentModel->getunreadEmails($ticketid);
						
						?>
                   <a href="<?php echo URLROOT; ?>/tickets/email_comm/<?php echo $tickets->ticketID; ?>"> <i class="menu-icon count-indicator mdi mdi-email-open-outline" data-toggle="tooltip" title="View Email"><sup style="color:red;"><?php echo $EmailCount; ?></sup> </i>
					</a>
						
                   </td>
                  
				    </tr>     
<?php }
                     }         
               endforeach; ?>  
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> 
           

    <!-- ------------------------------------------------------------------------------------------------------- -->  
    <!-- ------------------------------------------------------------------------------------------------------- -->              
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
table td > .wrap {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap; 
  text-align:left;
  }  


</style>

<?php require APPROOT . '/views/inc/footer.php'; ?>
              
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>                     
         
              </div>