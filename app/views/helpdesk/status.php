<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/helpdesk.php'; ?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              
            </div>
          </div>
          <?php foreach($data['tickets'] as $tickets) : ?> 
          <div class="card card-body mb-3">
       <div class="bg-light p-2 mb-3">
       <strong> <?php echo $tickets->subject; ?></strong> <br>
      Ticket Number <strong> <?php echo $tickets->ticketID; ?></strong>  Created By <strong> <?php echo $tickets->name; ?></strong> on  <?php echo $tickets->created_at; ?>
      </div>
     <h6><span class="badge badge-pill badge-primary">Severity:  <?php echo $tickets->severity; ?></span>
      <span class="badge badge-pill badge-success">Status:  <?php echo $tickets->status; ?></span>
      </h6> 
     
      <p class="card-text"> Issue :  <?php echo $tickets->description; ?></p>
     <!-- <a href="show_tickets.php" class="btn btn-dark">More</a> -->
      <p class="card-text">Assignee:<strong> <?php echo $tickets->assigned_to; ?></strong></p>  
      <p class="card-text">Action Taken:<strong> <?php echo $tickets->action; ?></strong></p>
      <p class="card-text">Updated Date:<strong> <?php echo $tickets->updated_at; ?></strong></p>
    </div>
  
    <?php  
endforeach; ?>     
   

              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>