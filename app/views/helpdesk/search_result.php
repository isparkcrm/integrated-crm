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
      Keyword <strong> <?php echo $tickets->keyword; ?></strong>  Version <strong> <?php echo $tickets->version; ?></strong> 
      </div>
      <p class="card-text">  Message : <?php echo $tickets->description; ?></p>
     <!-- <a href="show_tickets.php" class="btn btn-dark">More</a> -->
     <p class="card-text">Date:<strong> <?php echo $tickets->created_at; ?></strong></p>
      <?php 
      if($tickets->attachment==''){
        ?>
       <p class="card-text">Attachment:<strong><?php echo " No attachments"; ?></strong></p>
       <?php
      }
      else{
        ?>
         <p class="card-text">Attachment:<strong><?php echo $tickets->attachment; ?> </strong>  <a href="<?php echo URLROOT; ?>/casestudy/<?php echo $tickets->attachment; ?>" style="padding-left: 10px;" target="_blank">Download</a>   </p>
         <?php
      }
     ?>
    </div>
  
    <?php  
endforeach; ?>    

              
<?php require APPROOT . '/views/inc/footer.php'; ?>
              
                         
         
        </div>