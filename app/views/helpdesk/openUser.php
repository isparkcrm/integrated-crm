
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
        
          <div class="card card-body mb-3">
       <div class="bg-light p-2 mb-3">
       <strong> <?php echo $data['subject']; ?></strong> <br>
      Ticket Number <strong> <?php echo $data['ticketID']; ?></strong>  Created By <strong> <?php echo $data['clientID']; ?></strong> on  <?php echo $data['created_at']; ?>
      </div>
     <h6><span class="badge badge-pill badge-primary">Severity:  <?php echo $data['severity']; ?></span>
      <span class="badge badge-pill badge-success">Status:  <?php echo $data['status']; ?></span>
      </h6> 
     
      <p class="card-text"> Issue :  <?php echo $data['description']; ?></p>
     <!-- <a href="show_tickets.php" class="btn btn-dark">More</a> -->
      <p class="card-text">Assignee:<strong> <?php echo $data['assigned_to']; ?></strong></p>
      <?php 
      if($data['attachment']==''){
        ?>
       <p class="card-text">Attachment:<strong><?php echo " No attachments"; ?></strong></p>
       <?php
      }
      else{
        ?>
         <p class="card-text">Attachment:<strong><?php echo $data['attachment']; ?> </strong>  <a href="<?php echo URLROOT; ?>/uploads/<?php echo $data['attachment']; ?>" style="padding-left: 10px;" target="_blank">Download</a>   </p>
         <?php
      }
     ?>


    </div>
    <?php
    $ticketID=$data['ticketID'];
    ?>
       <a href="<?php echo URLROOT; ?>/helpdesk/Reassign/<?php echo $ticketID; ?>"  class="btn btn-primary"> Assign </a>
       <a href="<?php echo URLROOT; ?>/helpdesk/update/<?php echo $ticketID; ?>"  class="btn btn-info"> Update </a>
       <a href="<?php echo URLROOT; ?>/helpdesk/close/<?php echo $ticketID; ?>" class="btn btn-success"> Close</a>
       <a href="<?php echo URLROOT; ?>/helpdesk/status/<?php echo $ticketID; ?>" class="btn btn-dark"> View Updates</a>
   
           

    <!--------------------------------------------------------------------------------------------------------- -->  
    <!--------------------------------------------------------------------------------------------------------- -->              
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
   

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

<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
              </div>